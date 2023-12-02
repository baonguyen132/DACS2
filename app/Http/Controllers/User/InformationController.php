<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InformationController extends Controller
{
    //
    function __construct()
    {

    }

    function index()
    {
        $title = "Tài khoản";
        $user = Auth::user();
        return view("User.layout.Information", compact("title", "user"));
    }

    function update(Request $request)
    {
        $id = Auth::user()->id;

        User::where("id", "=", $id)->update(["name" => $request->fname, "dob" => $request->dob, "pob" => $request->pob, "address" => $request->address, "gender" => $request->gender_information]);

        return redirect()->back();

    }
}