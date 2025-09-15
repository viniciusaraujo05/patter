<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrdersController;

Route::get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/orders', [OrdersController::class, 'createOrder']);
Route::get('/orders', [OrdersController::class, 'getAllOrders']);
