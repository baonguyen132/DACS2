<?php

namespace App\Http\Controllers\APIDACS3;

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
            ->selectRaw("count(voucher.id) as count , name_branch_voucher , voucher_branchs.id")

            ->groupBy('name_branch_voucher', 'voucher_branchs.id')

            ->get();
        return response(["data" => $data]);
    }
}
