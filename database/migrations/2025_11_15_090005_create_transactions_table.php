<?php
// database/migrations/YYYY_MM_DD_HHMMSS_create_transactions_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->string('inv_number')->unique()->comment('Nomor unik transaksi/Order ID Midtrans');
            $table->string('name');
            $table->string('email');
            $table->decimal('amount', 10, 2);
            $table->string('status')->default('CREATED')->comment('Status: CREATED, PENDING, PAID, FAILED');
            $table->string('midtrans_transaction_id')->nullable()->comment('ID Transaksi dari Midtrans');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};