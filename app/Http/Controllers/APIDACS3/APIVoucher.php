<?php

namespace App\Http\Controllers\APIDACS3;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Voucher;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Mockery\Expectation;

class APIVoucher extends Controller
{
    public function get($id_branch, $id_client){
        $data = Voucher::where("id_branch_voucher" , "=" , $id_branch)->where("IDClient" , "=" , $id_client)->get();
        return response(["data"  => $data]);
    }
    public function getVoucherOfUser($id_client){
        $data = Voucher::where("IDClient" , "=" , $id_client)->get();
        return response(["data"  => $data]);
    }
    public function changeVoucher(Request $request){
       try {
            $voucher = json_decode(Voucher::where("id" , "=" , $request->idvoucher)->get())[0] ;
            $user = json_decode(User::where("id" , "=" , $request->iduser)->get())[0];

            if ($voucher->IDClient == 0) {
                if ($user->point >= $voucher->point) {
                    User::where("id", "=", $user->id)->update(["point" => $user->point - $voucher->point]);
                    Voucher::where("id", "=", $voucher->id)->update(["IDClient" => $user->id]);
    
                    echo "sucessful";
                } else {
                    echo "not_sucessful";
                }
            } else {
                return "ko đổi";
            }
       } catch (Exception $e) {
        echo $e ;
       }
    }

    public function number_detail($id_branch){
        $totalVoucher = DB::table("voucher")
                        ->selectRaw("count(id) as totalVoucher")
                        ->where("id_branch_voucher","=",$id_branch)
                        ->get();
        $remaining = DB::table("voucher")
                        ->selectRaw("count(id) as totalRemaining")
                        ->where("IDClient" , "=" , 0) 
                        ->where("id_branch_voucher","=",$id_branch)
                        ->get();


        return response([
            "totalVoucher" => $totalVoucher[0]->totalVoucher,
            "remaining" => $remaining[0]->totalRemaining ,
            "changed" =>  $totalVoucher[0]->totalVoucher - $remaining[0]->totalRemaining ,
            

        ]);
    }

    public function removeItem(Request $request){
        try {
            $voucher = Voucher::where("IDClient" , "=" , $request->idClient)->where("id" , "=" , $request->idVoucher)->get() ;
            Voucher::where("IDClient" , "=" , $request->idClient)->where("id" , "=" , $request->idVoucher)->delete();
            json_decode($voucher);

            Storage::delete("public/image/QRCode/" . $voucher[0]["image"] . ".txt");
            echo "Được";
        } catch (Exception $e) {
            echo "Lỗi" ;
        }
    }
}
