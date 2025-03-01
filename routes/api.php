<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\SaleController;
use App\Http\Controllers\Api\productsController;

Route::get('/sales', [SaleController::class, 'index']);
Route::get('/products', [ProductsController::class, 'index']);
Route::post('/products', [ProductsController::class, 'store']);
Route::delete('/products/{id}', [ProductsController::class, 'destroy']);




