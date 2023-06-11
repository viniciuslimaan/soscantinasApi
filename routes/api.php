<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
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

// Auth routes
Route::post('/admin/login', [AuthController::class, 'adminLogin']);
Route::post('/user/login', [AuthController::class, 'userLogin']);
Route::post('/client/login', [AuthController::class, 'clientLogin']);

Route::post('/logout', [AuthController::class, 'logout']);

// Admins routes
Route::prefix('/admin')->group(function () {
    Route::get('/all', [AdminController::class, 'index']);
    Route::get('/{id}', [AdminController::class, 'show']);
    Route::post('', [AdminController::class, 'store']);
    Route::put('/{id}', [AdminController::class, 'update']);
    Route::delete('/{id}', [AdminController::class, 'destroy']);
});

// Users routes
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

    // Products routes
    Route::get('/{user_id}/product/all', [ProductController::class, 'index']);
    Route::get('/{user_id}/product/visible', [ProductController::class, 'indexVisible']);
    Route::get('/{user_id}/product/{id}', [ProductController::class, 'show']);
    Route::post('/product', [ProductController::class, 'store']);
    Route::put('/{user_id}/product/{id}', [ProductController::class, 'update']);
    Route::delete('/{user_id}/product/{id}', [ProductController::class, 'destroy']);
});

// Clients routes
Route::prefix('/client')->group(function () {
    Route::get('/all', [ClientController::class, 'index']);
    Route::get('/{id}', [ClientController::class, 'show']);
    Route::post('', [ClientController::class, 'store']);
    Route::put('/{id}', [ClientController::class, 'update']);
    Route::delete('/{id}', [ClientController::class, 'destroy']);
});

// Orders routes
Route::get('/client/{client_id}/order/all', [OrderController::class, 'index']);
Route::get('/client/{client_id}/order/{id}', [OrderController::class, 'show']);
Route::post('/order', [OrderController::class, 'store']);
Route::put('/client/{client_id}/order/{id}', [OrderController::class, 'update']);
Route::delete('/client/{client_id}/order/{id}', [OrderController::class, 'destroy']);

// Order_items routes
Route::get('/order/{order_id}/item/all', [OrderItemController::class, 'index']);
Route::post('/order/item', [OrderItemController::class, 'store']);
Route::put('/order/{order_id}/item/{id}', [OrderItemController::class, 'update']);
Route::delete('/order/{order_id}/item/{id}', [OrderItemController::class, 'destroy']);
