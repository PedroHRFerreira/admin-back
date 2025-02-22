<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\SaleController;

Route::get('/sales', [SaleController::class, 'index']);



