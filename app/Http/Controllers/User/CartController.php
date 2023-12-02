<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Services\CartServices;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    //
    private $cartServices;
    function __construct(CartServices $cartServices)
    {
        $this->cartServices = $cartServices;
    }
    public function index()
    {
        $user = Auth::user();
        $title = "Giỏ hàng";
        return view("User.layout.Cart", compact("user", "title"));
    }
    public function store(Request $request)
    {

        if ($this->cartServices->confirmCart($request)) {
            return redirect(route("historyuser.index", ["page" => 1]));

        } else {
            return redirect()->back();
        }
    }
    public function viewQR($id)
    {
        return view("User.layout.Cart.viewQR", compact("id"));
    }
}