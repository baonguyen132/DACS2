<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Services\BranchServices;
use App\Http\Services\VoucherServices;
use App\Models\Voucher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ExchangeController extends Controller
{
    //
    public $branchServices;
    public $voucherServices;

    function __construct(BranchServices $branchServices, VoucherServices $voucherServices)
    {
        $this->branchServices = $branchServices;
        $this->voucherServices = $voucherServices;
    }

    function getBranch()
    {
        $title = "Quy đổi";
        $page = "Branch";
        $user = Auth::user();
        $data = $this->branchServices->getBranch();
        return view("User.layout.Exchange", compact("title", "user", "page", "data"));

    }

    function getVoucher($idbranch, $pageVoucher)
    {
        $title = "Quy đổi";
        $page = "Voucher";
        $user = Auth::user();
        $soluong = 4;

        $count = ($this->voucherServices->getCount($idbranch, $soluong));
        $data = ($this->voucherServices->getVoucher($idbranch, $pageVoucher, $soluong));
        // dd($count, $pageVoucher);
        return view("User.layout.Exchange", compact("title", "user", "page", "data", "pageVoucher", "count"));
    }
    function exchange($idvoucher)
    {
        echo $this->voucherServices->exchange($idvoucher);
    }
    public function viewQR($image)
    {
        return view("User.layout.Exchange.viewQR", compact("image"));
    }
    function listVoucher($pageVoucher)
    {

        $title = "Quà quy đổi";
        $user = Auth::user();



        $soluong = 4;
        $start = ($pageVoucher - 1) * $soluong;
        $voucher = Voucher::where("IDClient", "=", $user->id)->offset($start)->limit($soluong)->orderBy("updated_at", "desc")->get();
        $count = ceil(Voucher::where("IDClient", "=", $user->id)->count() / $soluong);
        $page = "ListVoucherExchange";
        return view("User.layout.Exchange", compact("title", "user", "page", "voucher", "pageVoucher", "count"));
    }
}