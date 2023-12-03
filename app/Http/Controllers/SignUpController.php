<?php

namespace App\Http\Controllers;

use App\Http\Requests\Client\SignUpRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class SignUpController extends Controller
{
    function __construct()
    {

    }
    public function index()
    {
        return view("loginsignup.layout.signup", ["title" => "Sign Up"]);
    }
    public function signUp(SignUpRequest $request)
    {

        User::create([
            'name' => $request->firstname . " " . $request->lastname,
            'email' => $request->emails,
            'password' => Hash::make($request->password),
            'cccd' => $request->cid,
            'dob' => $request->date,
            'token' => $request->_token,
            'pob' => "",
            'gender' => ucfirst($request->gender),
            'address' => $request->address,
            'status' => "50"
        ]);

        Mail::send('LoginSignUp.layout.mail', ["token" => $request->_token, 'fullname' => $request->firstname . " " . $request->lastname, 'username' => $request->emails, 'password' => $request->password, 'cccd' => $request->cid, 'dob' => $request->date], function ($email) use ($request) {
            $email->subject("Xác nhận tài khoản");
            $email->to($request->emails);
        });

        return redirect()->back();
    }

    function logout(Request $request)
    {


        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect(route("login.get"));
    }
}
