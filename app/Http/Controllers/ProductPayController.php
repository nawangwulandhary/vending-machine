<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Http;

class ProductPayController extends Controller
{
    public function pay($id)
    {
        $product = Product::findOrFail($id);

        // Endpoint Midtrans (example Snap QRIS)
        $midtransUrl = "https://api.sandbox.midtrans.com/v2/charge";

        $payload = [
            "payment_type" => "qris",
            "transaction_details" => [
                "order_id" => "ORDER-" . uniqid(),
                "gross_amount" => (int) $product->price
            ],
            "item_details" => [
                [
                    "id" => $product->id,
                    "price" => (int) $product->price,
                    "quantity" => 1,
                    "name" => $product->name
                ]
            ]
        ];

        $response = Http::withBasicAuth('YOUR SERVER KEY', '')
            ->post($midtransUrl, $payload);

        if (!$response->successful()) {
            return "Midtrans error: ". $response->body();
        }

        $data = $response->json();

        // QR URL ada di sini
        $qrUrl = $data['actions'][0]['url'] ?? null;

        return view('pay', compact('product', 'qrUrl'));
    }
}
