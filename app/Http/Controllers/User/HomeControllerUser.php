<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class HomeControllerUser extends Controller
{

    public function __construct()
    {

    }

    public function index()
    {

        $user = (Auth::user());
        $title = "Trang chủ";

        return redirect()->route("login.get");

    }

}