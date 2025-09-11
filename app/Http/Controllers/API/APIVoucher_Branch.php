<?php
namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\VoucherBranch;
use Illuminate\Database\Query\JoinClause;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class APIVoucher_Branch extends Controller
{
    //
    public function get(){
        $data = DB::table("voucher_branchs")->leftjoin("voucher", function (JoinClause $join) {
            $join->on("voucher_branchs.id", "=", "voucher.id_branch_voucher")->where("IDClient", "=", 0);
        })
            ->selectRaw("count(voucher.id) as count , name_branch_voucher , voucher_branchs.id , voucher_branchs.logo , voucher_branchs.color , voucher_branchs.desc")

            ->groupBy('name_branch_voucher', 'voucher_branchs.id' , 'voucher_branchs.logo', 'voucher_branchs.color', 'voucher_branchs.desc')

            ->get();
        return response(["data" => $data]);
    }

    public function number_detail(){
        $totalBranch = DB::table("voucher_branchs")
                        ->selectRaw("count(id) as totalBranch")
                        ->get();
        $totalVoucher = DB::table("voucher")
                        ->selectRaw("count(id) as totalVoucher")
                        ->get() ;
        
        $remaining = DB::table("voucher")
                        ->selectRaw("count(id) as remaining")
                        ->where("IDClient" , "=" , 0)
                        ->get() ;

        return response([
            "totalBranch" => $totalBranch[0]->totalBranch,
            "totalVoucher" => $totalVoucher[0]->totalVoucher ,
            "remaining" => $remaining[0]->remaining ,
            

        ]);
    }
}
