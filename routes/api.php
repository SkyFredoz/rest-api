<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\RawDataController;
use App\Http\Controllers\Api\LoginController;
use App\Http\Controllers\Api\RegisterController;
use App\Http\Controllers\Api\LogoutController;

// Public routes
Route::post('/register', RegisterController::class);
Route::post('/login', [LoginController::class, 'login']);
Route::apiResource('RawData', RawDataController::class);
Route::put('/raw-data/{id}', [RawDataController::class, 'update']);

// Protected routes (require JWT token)
Route::middleware('auth:api')->group(function () {
    Route::post('/logout', LogoutController::class);
    Route::post('/refresh', [LoginController::class, 'refresh']);
    Route::get('/user', [LoginController::class, 'me']);
    Route::put('/user', [LoginController::class, 'update']);
    Route::delete('/user', [LoginController::class, 'destroy']);
});
