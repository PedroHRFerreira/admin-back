<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\YourControllerNameController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/data', [YourControllerNameController::class, 'index']);

Route::post('/data', [YourControllerNameController::class, 'store']);



