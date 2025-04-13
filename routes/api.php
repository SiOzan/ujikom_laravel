<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\SaranController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// auth route
Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);

Route::get('saran', [SaranController::class, 'indexFlutter'])->middleware('auth:sanctum');

Route::middleware('auth:sanctum')->group(function () {
    // Route::get('saran', [SaranController::class, 'indexFlutter']);
    Route::post('saran/', [SaranController::class, 'storeFlutter']);
    Route::post('logout', [AuthController::class, 'logout']);
});
