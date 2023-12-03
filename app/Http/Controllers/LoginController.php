<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\Client\UpdateInformationRequest;
use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Laravel\Socialite\Facades\Socialite;

class LoginController extends Controller
{
    function __construct()
    {

    }

    function getLogin()
    {

        return view("LoginSignUp.layout.login", [

            'title' => "Login"
        ]);
    }

    function login(LoginRequest $loginRequest)
    {
        if (
            Auth::attempt([
                "email" => $loginRequest->gmail,
                "password" => $loginRequest->passwords
            ])
        ) {

            $loginRequest->session()->regenerate();

            return redirect(route("login.optionLogin"));
        }

        Session::flash('result', 'Login fail');

        return redirect()->back();
    }
    function loginGmail()
    {
        return Socialite::driver('google')->redirect();
    }
    function loginGmailCallback()
    {
        $userPovider = Socialite::driver('google')->user();

        $user = User::where("email", "=", $userPovider->getEmail())->first();

        if ($user == null) {

            $user = User::create([
                "name" => $userPovider->getName(),
                "email" => $userPovider->getEmail(),
                'password' => Hash::make("Bae-12345"),
                "token" => $userPovider->getId(),
                'status' => '50'
            ]);
        }

        Auth::login($user);

        return redirect(route("login.optionLogin"));
    }



    public function optionLogin()
    {
        return view("LoginSignUp.layout.optionLogin", ["title" => "option"]);
    }

    function confirm($token, $cccd)
    {
        if (User::where("token", "=", "$token")->where("cccd", "=", "$cccd")->where("status", "=", 0)->update(["status" => 1, "token" => null])) {

            mkdir($_SERVER['DOCUMENT_ROOT'] . "./storage/upload/" . $cccd);


            Session::flash('result', 'thành công');
        } else {
            Session::flash('result', 'thất bại');
        }

        return redirect(route("login.get"));
    }

    function confirmuser($token, $cccd)
    {
        if (User::where("token", "=", "$token")->where("cccd", "=", "$cccd")->where("status", "=", 50)->update(["status" => 5, "token" => null])) {

            Session::flash('result', 'thành công');
        } else {
            Session::flash('result', 'thất bại');
        }

        return redirect(route("login.get"));
    }

    function updateInformation()
    {
        return view("loginsignup.layout.updateInformation", ["title" => "Sign Up"]);
    }
    function storeInformation(UpdateInformationRequest $request)
    {
        $user = Auth::user();
        User::where("id", "=", $user->id)->update([
            "cccd" => $request->cid,
            "dob" => $request->date,
            "gender" => ucfirst($request->gender),
            "address" => $request->address,
            "status" => 5,
            "token" => null
        ]);
        return redirect(route("login.get"));
    }

}
