<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PaymentMethodController;
use App\Http\Controllers\OpeningHoursController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderItemController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Admin routes
Route::prefix('/admin')->group(function () {
    Route::get('/all', [AdminController::class, 'index']);
    Route::get('/{id}', [AdminController::class, 'show']);
    Route::post('', [AdminController::class, 'store']);
    Route::put('/{id}', [AdminController::class, 'update']);
    Route::delete('/{id}', [AdminController::class, 'destroy']);
});

// User routes
Route::prefix('/user')->group(function () {
    Route::get('/all', [UserController::class, 'index']);
    Route::get('/{id}', [UserController::class, 'show']);
    Route::post('', [UserController::class, 'store']);
    Route::put('/{id}', [UserController::class, 'update']);
    Route::delete('/{id}', [UserController::class, 'destroy']);

    // Payment Methods
    Route::get('/{user_id}/paymentmethod/all', [PaymentMethodController::class, 'index']);
    Route::get('/{user_id}/paymentmethod/{id}', [PaymentMethodController::class, 'show']);
    Route::post('/paymentmethod', [PaymentMethodController::class, 'store']);
    Route::put('/{user_id}/paymentmethod/{id}', [PaymentMethodController::class, 'update']);
    Route::delete('/{user_id}/paymentmethod/{id}', [PaymentMethodController::class, 'destroy']);

    // Opening Hours
    Route::get('/{user_id}/openinghours/all', [OpeningHoursController::class, 'index']);
    Route::get('/{user_id}/openinghours/{id}', [OpeningHoursController::class, 'show']);
    Route::post('/openinghours', [OpeningHoursController::class, 'store']);
    Route::put('/{user_id}/openinghours/{id}', [OpeningHoursController::class, 'update']);
    Route::delete('/{user_id}/openinghours/{id}', [OpeningHoursController::class, 'destroy']);

    // Product routes
    Route::get('/{user_id}/product/all', [ProductController::class, 'index']);
    Route::get('/{user_id}/product/{id}', [ProductController::class, 'show']);
    Route::post('/product', [ProductController::class, 'store']);
    Route::put('/{user_id}/product/{id}', [ProductController::class, 'update']);
    Route::delete('/{user_id}/product/{id}', [ProductController::class, 'destroy']);
});

// Client routes
Route::prefix('/client')->group(function () {
    Route::get('/all', [ClientController::class, 'index']);
    Route::get('/{id}', [ClientController::class, 'show']);
    Route::post('', [ClientController::class, 'store']);
    Route::put('/{id}', [ClientController::class, 'update']);
    Route::delete('/{id}', [ClientController::class, 'destroy']);
});

// Order routes
Route::get('/client/{client_id}/order/all', [OrderController::class, 'index']);
Route::get('/client/{client_id}/order/{id}', [OrderController::class, 'show']);
Route::post('/order', [OrderController::class, 'store']);
Route::put('/client/{client_id}/order/{id}', [OrderController::class, 'update']);
Route::delete('/client/{client_id}/order/{id}', [OrderController::class, 'destroy']);

// Order_item routes
Route::get('/order/{order_id}/item/all', [OrderItemController::class, 'index']);
Route::post('/order/item', [OrderItemController::class, 'store']);
Route::put('/order/{order_id}/item/{id}', [OrderItemController::class, 'update']);
Route::delete('/order/{order_id}/item/{id}', [OrderItemController::class, 'destroy']);
