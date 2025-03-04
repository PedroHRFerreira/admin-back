<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\SaleController;
use App\Http\Controllers\Api\productsController;
use App\Http\Controllers\Api\expensesController;
use App\Http\Controllers\Api\goalController;
use App\Http\Controllers\Api\monthlyValueController;
use App\Http\Controllers\Api\goalMonthController;


Route::get('/sales', [SaleController::class, 'index']);

Route::get('/products', [ProductsController::class, 'index']);
Route::post('/products', [ProductsController::class, 'store']);
Route::delete('/products/{id}', [ProductsController::class, 'destroy']);

Route::get('/expenses', [expensesController::class, 'index']);
Route::post('/goal', [goalController::class, 'store']);

Route::post('/monthly', [monthlyValueController::class, 'store']);

Route::get('/goal-month', [goalMonthController::class, 'index']);
Route::put('/goal-month', [goalMonthController::class, 'store']);




