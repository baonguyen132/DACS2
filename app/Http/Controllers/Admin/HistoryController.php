<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Detail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class HistoryController extends Controller
{
    //
    function index()
    {
        $page = "index";
        $user = Auth::user();

        $cart = DB::table("cart")->join("users", "cart.iduser", "=", "users.id")->where("cart.token", "<>", "NULL")->selectRaw("cart.id as idcart , iduser , total , cart.token as tokencart , cart.image as imagecart , name , cart.address as addresscart")->get();



        return view("Admin.Main.layout.History", compact("page", "user", "cart"));
    }
    function selectCart($id, $imageCart)
    {
        $page = "select";
        $user = Auth::user();

        $detail = DB::table("detail")->join("batterys", "idbatterys", "=", "batterys.id")->where("detail.idcart", "=", $id)->selectRaw("name_battery, size, shape, image, count")->get();

        return view("Admin.Main.layout.History", compact("page", "user", "detail", "imageCart"));

    }
    function deleteCart($id)
    {
        $cart = Cart::where("id", "=", $id)->selectRaw("image")->get();
        json_decode($cart, true);
        $image = $cart[0]["image"];


        Detail::where("idcart", "=", $id)->delete();
        Cart::where("id", "=", $id)->delete();

        Storage::delete("public/image/User/Confrim/" . $image . ".jpg");
        Storage::delete("public/image/User/QRCode/" . $image . ".txt");

        return redirect()->back();
    }

    function confirm($token)
    {


        try {
            $cart = Cart::where("token", "=", $token)->selectRaw("image, iduser, total")->get();
            json_decode($cart, true);
            $image = $cart[0]["image"];
            $iduser = $cart[0]["iduser"];
            $total = $cart[0]["total"];



            if ($image == "NULL" || $image == NULL) {
                echo "not successful";
            } else {
                DB::update("UPDATE `users` SET `point`=`point` + $total  WHERE id =  $iduser");
                Cart::where("token", "=", "$token")->update(["token" => "NULL", "image" => "NULL"]);
                Storage::delete("public/image/User/Confrim/" . $image . ".jpg");
                Storage::delete("public/image/User/QRCode/" . $image . ".txt");
                echo "successful";
            }
        } catch (\Throwable $th) {
            echo "not successful";
        }






    }
}