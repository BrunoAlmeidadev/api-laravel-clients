<?php

namespace App\Http\Controllers;

use App\Services\ApiResponse;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function Login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $email = $request->input('email');
        $password = $request->input('password');
        $attempt = auth()->attempt(['email' => $email, 'password' => $password]);

        if (!$attempt) {
            return ApiResponse::unauthorized();
        }

        $user = auth()->user();

        // Assume o tempo de expiração do token que está configurado no sanctum
        //$token = $user->createToken($user->name, ['*'], now()->addHour())->plainTextToken;

        $token = $user->createToken($user->name)->plainTextToken;

        return ApiResponse::succes([
            'user' => $user->name,
            'email' => $user->email,
            'token' => $token
        ]);
    }

    public function Logout(Request $request)
    {
        $request->user()->tokens()->delete();
        return ApiResponse::succes('Logout with success');
    }
        
}
