<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         Product::create([
        'name' => 'Banana Chips',
        'price' => 25000,
        'stock' => 50,
        'image' => 'product1.jpg',
        'description' => 'Keripik pisang manis renyah.'
    ]);

    Product::create([
        'name' => 'Keripik Pisang Asin',
        'price' => 19000,
        'stock' => 60,
        'image' => 'product2.jpg',
        'description' => 'Keripik pisang asin gurih.'
    ]);
    
    Product::create([
        'name' => 'Keripik Pisang ',
        'price' => 16000,
        'stock' => 60,
        'image' => 'product3.jpg',
        'description' => 'Keripik pisang .'
    ]);
    }
}
