<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\VoucherRequest;
use App\Http\Services\VoucherServices;
use App\Models\Voucher;
use App\Models\VoucherBranch;
use Illuminate\Database\Query\JoinClause;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class VoucherController extends Controller
{
    //
    private $voucherServices;
    public function __construct(VoucherServices $voucherServices)
    {
        $this->voucherServices = $voucherServices;
    }

    public function index($id, $pageVoucher)
    {
        $page = "indexBattery";
        $user = Auth::user();

        $soluong = 10;
        $start = ($pageVoucher - 1) * $soluong;
        $count = $this->voucherServices->getCount($id, $soluong);

        $dataBattery = DB::table("voucher")->join("voucher_branchs", function (JoinClause $join) {
            $join->on("voucher.id_branch_voucher", "=", "voucher_branchs.id");
        })->selectRaw("voucher_branchs.id as idbranch , voucher.id as idvoucher , name_voucher , code_voucher , point , image ,name_branch_voucher ")->where("id_branch_voucher", "=", $id)->where("IDClient", "=", 0)->offset($start)->limit($soluong)->get();




        $dataBranch = VoucherBranch::all();

        return view("admin.main.layout.voucher", compact("page", "user", "dataBattery", "dataBranch", "pageVoucher", "count"));
    }

    public function createVoucher()
    {
        $page = "createVoucher";
        $user = Auth::user();
        $data = VoucherBranch::all();
        return view("admin.main.layout.voucher", compact("page", "user", "data"));
    }

    public function storeVoucher(VoucherRequest $request)
    {

        $qr = QrCode::size(100)->generate($request->codeVoucher);
        $date = explode("/", date("Y/m/d"));
        $namefile = time() . $date[0] . $date[1] . $date[2];
        Voucher::create([
            "name_voucher" => $request->nameVoucher,
            "code_voucher" => $request->codeVoucher,
            "point" => $request->pointVoucher,
            "image" => $namefile,
            "id_branch_voucher" => $request->chooseBV
        ]);

        Storage::put("public/image/QRCode/" . $namefile . ".txt", $qr);

        return redirect(route("voucher.index.battery", ["id" => $request->chooseBV , "page" => 1]));


        // $qr = Storage::get("public/image/QRCode//a.txt");
        // return $qr;
    }

    public function updateVoucher(Request $request, $id)
    {

        Voucher::where("id", "=", $id)
            ->update([
                "name_voucher" => $request->nameVoucherEdit,

                "point" => $request->pointVoucherEdit,
                "id_branch_voucher" => $request->chooseBVEdit,
            ]);

        return redirect()->back();
    }

    public function deleteVoucher(Request $request, $id)
    {
        Storage::delete("public/image/QRCode/" . $request->deleteVoucher . ".txt");
        Voucher::where("id", "=", $id)->delete();


        return redirect()->back();
    }



}