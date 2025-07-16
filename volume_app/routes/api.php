<?php

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