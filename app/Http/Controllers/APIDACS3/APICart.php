<?php

namespace App\Http\Controllers\APIDACS3;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\User;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Exception;
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
    //
    function storeCart(Request $request){
         
        try {
            //Lấy request
            $cart = json_decode($request->data) ;
            $user = json_decode($request->user) ;
            $address = ($request->address) ;
            $token = $request->token ;

            //Tạo tên file
            $date = explode("/", date("Y/m/d"));
            $namefile = time() . $date[0] . $date[1] . $date[2];
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

            
            echo $idcart."-".$token ;
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

}
