<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class ApiLogin extends Controller
{
    public function login(LoginRequest $loginRequest)
    {
        $credentials = [
            'email' => $loginRequest->gmail,
            'password' => $loginRequest->passwords
        ];

        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            return response()->json([
                'result' => true,
                'user' => $user,
            ], 200);
        }

        return response()->json([
            'result' => false,
            'message' => 'Invalid credentials'
        ], 401);
    }

}
