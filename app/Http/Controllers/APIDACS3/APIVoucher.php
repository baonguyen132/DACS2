<?php

namespace App\Http\Controllers\APIDACS3;

use App\Http\Controllers\Controller;
use App\Models\Voucher;
use Illuminate\Http\Request;

class APIVoucher extends Controller
{
    public function get($id_branch, $id_client){
        $data = Voucher::where("id_branch_voucher" , "=" , $id_branch)->where("IDClient" , "=" , $id_client)->get();
        return response(["data"  => $data]);
    }
}
