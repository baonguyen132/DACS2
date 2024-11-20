<?php

namespace App\Http\Controllers\APIDACS3;

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
    function get($id){
        $data = Cart::where("iduser", "=" , $id)->orderByDesc("id")->get() ;
        return response([
            "data" => $data 
        ]);
    }

    function getAll(){
        $data = Cart::where("token" , "<>" , "NULL")->orderByDesc("id")->get() ;
        return response([
            "data" => $data 
        ]);
    }
    function getItem($idcart){
        $data = DB::table("cart")->join("users" , function(JoinClause $joinClause){
            $joinClause->on("cart.iduser" , "=" , "users.id");
        })
        ->selectRaw("users.name , users.cccd , cart.total , users.point , cart.token")
        ->where("cart.id" , "=" , $idcart)->get();

        return response(["data" => $data ]);
    }

    function getconfirmed($id){
        $data = Cart::where("iduser", "=" , $id)->where("token" , "=" , "NULL")->orderByDesc("id")->get() ;
        return response([
            "data" => $data 
        ]);
    }
    function getnotconfirm($id){
        $data = Cart::where("iduser", "=" , $id)->where("token" , "<>" , "NULL")->orderByDesc("id")->get() ;
        return response([
            "data" => $data 
        ]);
    }
    //
    function storeCart(Request $request){
         
        try {
            //Lấy request
            $cart = json_decode($request->data) ;
            $user = json_decode($request->user) ;
            $address = ($request->address) ;
            $token = $request->token ;

            //Tạo tên file
            $namefile = $request->namefile ;
            
            //set thông số
            $total = 0;
            $sql = array();
            $keys = [];
            
            foreach ($cart as $item) {
                $keys[] = $item->batteryData->id;
                $total = $total + $item->quantity*$item->batteryData->point;
            }
            $keys = implode(",", $keys);
            
            $idcart = Cart::create([
                "iduser" => $user->id,
                "address" =>  $address,
                "total" => $total,
                "token" => $token,
                "image" => $namefile,
            ])->id;

            // thêm detail
            foreach ($cart as $item) {
                $sql[] = "($idcart,".$item->batteryData->id.",".$item->quantity.")";
            }
            $sql = implode(",", $sql);
            DB::insert("insert into  detail(idcart, idbatterys, count) values  $sql");

            
            echo $idcart."@".$token."@".$total."@".date("Y/m/d")."@".$namefile ;
        } catch (Exception $th) {
            //throw $th;
            echo "NotSuccessful" ;
        }
        
    }

    function sendEmailConfirm(Request $request){

        $cart = json_decode($request->data) ;
        $user = json_decode($request->user) ;
            
        
        Mail::send('APIDACS3.mail', ["cart" => $cart, "fullname" => $user->name], function ($email) use ($user) {
                $email->subject("Thông tin thu gom pin");
                $email->to($user->email);
            });
    } 
    
    function detail($id){
        $detail = DB::table("detail")->join("batterys", "idbatterys", "=", "batterys.id")->where("detail.idcart", "=", $id)->get();
        return ["data" => $detail] ;
    }
    function number_detail($id){
        $total = DB::table("cart")
                    ->select(DB::raw('count(iduser) as countCart'))
                    ->where("iduser" , "=" , $id)
                    ->get();
        $notConfirm = DB::table("cart")
                    ->select(DB::raw('count(iduser) as countCart'))
                    ->where("iduser" , "=" , $id)
                    ->where("token" , "=" , "NULL")
                    ->get();
        
        return response([
            "total" => $total[0]->countCart,
            "notConfirm" => $total[0]->countCart - $notConfirm[0]->countCart ,
            "Confirmed" => $notConfirm[0]->countCart

        ]);
    }

    function confirmcart(Request $request){
        try {
            $token = $request->token ;
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
