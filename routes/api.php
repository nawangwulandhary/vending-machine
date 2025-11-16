<?php

use App\Http\Controllers\ProcessPaymentController;
use Illuminate\Support\Facades\Route;

Route::post('/share', ProcessPaymentController::class);
