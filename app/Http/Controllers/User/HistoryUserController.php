<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Detail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HistoryUserController extends Controller
{
    //
    public function __construct()
    {

    }

    function index($pageHistory)
    {
        $user = Auth::user();
        $title = "Lịch sử";
        $page = "History";
        $soluong = 3;
        $start = ($pageHistory - 1) * $soluong;

        $count = ceil(Cart::where("iduser", "=", $user->id)->count() / $soluong);

        $cart = (Cart::where("iduser", "=", $user->id)->offset($start)->limit($soluong)->orderBy('id', 'desc')->get());

        return view("User.layout.History", compact("user", "title", "page", "count", "cart", "pageHistory"));
    }

    function detail($id)
    {
        $user = Auth::user();
        $title = "Lịch sử";
        $page = "Detail";

        $detail = DB::table("detail")->join("batterys", "idbatterys", "=", "batterys.id")->where("detail.idcart", "=", $id)->selectRaw("name_battery, size, shape, image, count")->get();
        $cart = Cart::where("id", "=", $id)->get();

        return view("User.layout.History", compact("user", "title", "page", "detail", "cart"));
    }
}
