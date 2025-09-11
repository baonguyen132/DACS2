<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\User;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Exception;
use Illuminate\Database\Query\JoinClause;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class APICart extends Controller
{
    function getCartWithItems($iduser)
    {
        $carts = DB::table("cart")
            ->where("cart.iduser", $iduser)
            ->orderByDesc("cart.id")
            ->get();

        $carts->map(function ($cart) {
            $items = DB::table("detail")
                ->join("batterys", "detail.idbatterys", "=", "batterys.id")
                ->select(
                    "batterys.name_battery",
                    "batterys.size",
                    "batterys.shape",
                    "batterys.point",
                    "detail.count"
                )
                ->where("detail.idcart", $cart->id)
                ->get();
            $cart->items = $items;
            return $cart;
        });

        return response(["data" => $carts]);
    }

    function getAll()
    {
        $data = Cart::where("token", "<>", value: "NULL")->orderByDesc("id")->get();
        return response([
            "data" => $data
        ]);
    }


    function getconfirmed($id)
    {
        $data = Cart::where("iduser", "=", $id)->where("token", "=", "NULL")->orderByDesc("id")->get();
        return response([
            "data" => $data
        ]);
    }
    function getnotconfirm($id)
    {
        $data = Cart::where("iduser", "=", $id)->where("token", "<>", "NULL")->orderByDesc("id")->get();
        return response([
            "data" => $data
        ]);
    }
    //
    function storeCart(Request $request)
    {

        try {
            $cart = json_decode($request->data);
            $user = json_decode($request->user);
            $address = $request->address;
            $token = $request->token;
            $namefile = $request->namefile;

            $total = 0;
            $sql = [];
            $keys = [];

            foreach ($cart as $item) {
                $keys[] = $item->battery->id;
                $total += $item->count * $item->battery->point;
            }

            $idcart = Cart::create([
                "iduser" => $user->id,
                "address" => $address,
                "total"   => $total,
                "token"   => $token,
                "image"   => $namefile,
            ])->id;

            foreach ($cart as $item) {
                $sql[] = "($idcart," . $item->battery->id . "," . $item->count . ")";
            }
            $sql = implode(",", $sql);
            DB::insert("insert into detail(idcart, idbatterys, count) values $sql");

            return response()->json([
                "status"  => "success",
                "idcart"  => $idcart,
                "token"   => $token,
                "total"   => $total,
                "date"    => date("Y/m/d"),
                "namefile" => $namefile,
            ]);
        } catch (Exception $th) {
            return response()->json([
                "status" => "error",
                "message" => "NotSuccessful",
                "error"  => $th->getMessage()
            ], 500);
        }
    }

    function sendEmailConfirm(Request $request)
    {

        $cart = json_decode($request->data);
        $user = json_decode($request->user);


        Mail::send('APIDACS3.mail', ["cart" => $cart, "fullname" => $user->name], function ($email) use ($user) {
            $email->subject("Thông tin thu gom pin");
            $email->to($user->email);
        });
    }


    function confirmcart(Request $request)
    {
        try {
            $token = $request->token;
            $cart = Cart::where("token", "=", $token)->selectRaw("image, iduser, total")->get();
            json_decode($cart, true);
            $image = $cart[0]["image"];
            $iduser = $cart[0]["iduser"];
            $total = $cart[0]["total"];



            if ($image == "NULL" || $image == NULL) {
                echo "NotSuccessful";
            } else {
                DB::update("UPDATE `users` SET `point`=`point` + $total  WHERE id =  $iduser");
                Cart::where("token", "=", "$token")->update(["token" => "NULL", "image" => "NULL"]);
                Storage::delete("public/image/User/Confrim/" . $image . ".jpg");
                Storage::delete("public/image/User/QRCode/" . $image . ".xml");
                echo "Successful";
            }
        } catch (\Throwable $th) {
            echo "Failed";
        }
    }
}
