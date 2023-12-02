<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ApiBlogController extends Controller
{
    function __construct()
    {

    }
    function index()
    {
        $blogs = DB::table("blogs")->join("users", "blogs.idUser", "=", "users.id")->selectRaw("blogs.id as ID , idUser as IDClient , users.name as Fullname , content")->get();
        return $blogs;
    }
}