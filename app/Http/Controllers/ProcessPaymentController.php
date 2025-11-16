<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ProcessPaymentController extends Controller
{
    public function __invoke(Request $request)
    {

        // 2. SIMPAN TRANSAKSI AWAL DI DATABASE
        $transaction = Transaction::create([
            'inv_number' => 'INV-' . time() . rand(100, 999),
            'amount' => $request->amount,
            'name' => $request->name,
            'email' => $request->email,
            'status' => 'CREATED'
        ]);

        // 3. PANGGIL MIDTRANS QRIS API
        $serverKey = env('MIDTRANS_SERVER_KEY');

        $base64Auth = base64_encode($serverKey . ':');

        $response = Http::timeout(10)->withHeaders([
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
            'Authorization' => 'Basic ' . $base64Auth
        ])->post('https://api.sandbox.midtrans.com/v2/charge', [
            'payment_type' => 'qris',
            'transaction_details' => [
                'order_id' => $transaction->inv_number,
                'gross_amount' => $transaction->amount
            ],
            'customer_details' => [
                'first_name' => $transaction->name,
                'email' => $transaction->email,
            ],
            'qris' => [
                'acquirer' => 'gopay'
            ]
        ]);

        // 4. TANGANI RESPONSE MIDTRANS
        if ($response->successful() && $response->json('status_code') == '201') {

            // MIDTRANS QRIS API BARU: qr_url langsung dari response
            $qrUrl = $response->json('qr_url');

            // Perbarui status dan simpan transaction_id dari Midtrans
            $transaction->update([
                'status' => 'PENDING',
                'midtrans_transaction_id' => $response->json('transaction_id')
            ]);

            // Kembalikan ke FE (dipakai ProductPayController)
            return response()->json([
                'message' => 'Transaksi QRIS berhasil dibuat.',
                'order_id' => $transaction->inv_number,
                'qr_url' => $qrUrl
            ], 201);
        }

        // 5. ERROR HANDLING MIDTRANS
        return response()->json([
            'message' => 'Gagal menghubungi Midtrans atau transaksi ditolak.',
            'midtrans_message' => $response->json('status_message') ?? $response->body(),
            'status_code' => $response->status()
        ], $response->status() ?: 500);
    }
}
