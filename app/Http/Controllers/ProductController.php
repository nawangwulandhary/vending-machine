<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        // Ambil data semua produk
        $products = Product::all();

        // Tampilkan ke view
        return view('products', compact('products'));
    }
}
