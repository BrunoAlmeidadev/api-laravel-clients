<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClientController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/status', function () {
    return response()->json(
        [
        'status' => 'Ok', 
        'message' => 'API is running'
        ],
        200
    );
});

Route::apiResource('Clients', ClientController::class);
Route::post('/login', [AuthController::class, 'Login']);
    