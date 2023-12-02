<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    //
    function __construct()
    {

    }

    function index(Request $request)
    {
        $user = (Auth::user());

        $Cbattery = DB::select("SELECT COUNT(id) as count FROM `batterys`");

        $Cbattery = $Cbattery[0]->count;

        $Cvoucher = DB::select("SELECT COUNT(id) as count FROM `voucher` WHERE IDClient = 0 ");

        $Cvoucher = $Cvoucher[0]->count;

        $Cuser = DB::select("SELECT COUNT(id) as count FROM `users` ");

        $Cuser = $Cuser[0]->count;


        return view("Admin.Main.layout.HomeAdmin", compact("user", "Cbattery", "Cvoucher", "Cuser"));
    }



    function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect(route("login.get"));
    }


}
