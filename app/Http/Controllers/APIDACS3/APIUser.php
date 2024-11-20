<?php

namespace App\Http\Controllers\APIDACS3;

use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class APIUser extends Controller
{
    //
    function getUser($id)  {
        $user = User::where("id" , $id)->first();
        return response([
            "status" => 200 ,
            "data"=> $user

        ]);
    }
    function checkUser(Request $request) {
       
        Auth::attempt(["email"=> $request->email ,"password"=> $request->password]);
        $user = Auth::user();
        Auth::logout();
        if($user != null){
             $id = $user->getAuthIdentifier() ;
        }
        else {
            $id = 0;
        }
    
        echo $id ; 
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

    public function replaceAddress(Request $request){
        try {
            User::where("id" , "=" , $request->id)->update(["address" => $request->address]);
            echo "sucessful" ;
        } catch (Exception $e) {
            echo "notSucessful" ;
        }
    }
    public function replacePassword(Request $request){
        try {
            $user = User::where("id" , "=" , $request->id)->selectRaw("password")->get();
            json_decode($user) ;
            $password = $user[0]["password"] ;

            if (Hash::check($request->oldpassword, $password)) {

                User::where("id" , "=" , $request->id)->update(["password" => Hash::make($request->newpassword)]);
                echo "sucessful" ;
    
            } else {
                echo "failPassword" ;
            }

            
        } catch (Exception $e) {
            echo "notSucessful" ;
        }
    }
}
