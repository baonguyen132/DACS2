<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{
    //
    function __construct()
    {

    }
    function index()
    {
        $user = Auth::user();
        $title = "Blog";
        return view("User.layout.Blog", compact("user", "title"));
    }
    function store(Request $request)
    {
        $s = explode("\r\n", $request->contentBlog);

        $contentBlog = implode("", $s);

        Blog::create(["content" => $contentBlog, "idUser" => Auth::user()->id]);
        return redirect()->back();



    }
}
