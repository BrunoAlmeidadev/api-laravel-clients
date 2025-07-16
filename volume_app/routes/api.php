<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClientController;
use App\Services\ApiResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/status', function () {
    return ApiResponse::succes('API is running');
})->middleware('auth:sanctum');

Route::get('clients', [ClientController::class, 'index'])->middleware('auth:sanctum');
Route::post('clients', [ClientController::class, 'store'])->middleware('auth:sanctum');
Route::get('clients/{client}', [ClientController::class, 'show'])->middleware('auth:sanctum');
Route::put('clients/{client}', [ClientController::class, 'update'])->middleware('auth:sanctum');
Route::delete('clients/{client}', [ClientController::class, 'destroy'])->middleware('auth:sanctum');



//auth routes
Route::apiResource('Clients', ClientController::class)->middleware('auth:sanctum');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout']);
    