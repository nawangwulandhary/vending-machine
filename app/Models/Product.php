<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products'; // nama tabel di database

    protected $fillable = [
        'name',
        'price',
        'stock',
        'image',
        'description'
    ];
}
