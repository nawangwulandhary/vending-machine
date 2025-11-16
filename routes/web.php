<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductPayController;
use App\Http\Controllers\ProductController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/products', [ProductController::class,'index'])
->name('products');

Route::get('/bayar/{id}', [ProductPayController::class, 'pay'])->name('bayar.product');
