<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Mail;

class ApiUser extends Controller
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

    public function signup(Request $request){
        
        try {
            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'cccd' => $request->cid,
                'dob' => $request->date,
                'pob' => "",
                'token' => "",
                'gender' => ucfirst($request->gender),
                'address' => $request->address,
                'status' => "5"
            ]);
            echo "sucessful" ;
        } catch (Exception $th) {
            echo $th ;
        }

    }

    public function sendOtp(Request $request){
        try {
            Mail::send("APIDACS3.sendOTP" ,["codeOTP"=>$request->codeOtp] , function($email) use ($request) {
                $email->to($request->email) ;
                $email->subject("Your code Otp");
            });
            echo "Kiểm tra mail của bạn" ;
        } catch (Exception $e) {
            echo $e ;
        }
       
    }

    



}
