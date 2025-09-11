<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\VoucherBranch;
use Illuminate\Database\Query\JoinClause;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class BranchController extends Controller
{
    //
    function __construct()
    {

    }
    public function index()
    {

        $page = "index";
        $user = Auth::user();

        $data = DB::table("voucher_branchs")->leftjoin("voucher", function (JoinClause $join) {
            $join->on("voucher_branchs.id", "=", "voucher.id_branch_voucher")->where("IDClient", "=", 0);
        })
            ->selectRaw("count(voucher.id) as count , name_branch_voucher , voucher_branchs.id , voucher_branchs.logo , voucher_branchs.color , voucher_branchs.desc")

            ->groupBy('name_branch_voucher', 'voucher_branchs.id' , 'voucher_branchs.logo', 'voucher_branchs.color', 'voucher_branchs.desc')

            ->get();


        return view("admin.main.layout.voucher", compact("page", "user", "data"));
    }

    public function createBranch()
    {

        $page = "createBranch";
        $user = Auth::user();
        return view("admin.main.layout.voucher", compact("page", "user"));
    }
    public function storeBranch(Request $request)
    {
        $id = VoucherBranch::create([
            "name_branch_voucher" => $request->branch
        ])->id;

        $file = $request->file("imagebranch");
        $file->storeAs("/public/image/Branch/", $id . ".jpg");

        return redirect(route("voucher.index"));

    }
    public function editBranch($id)
    {
        $page = "editBranch";
        $user = Auth::user();
        $branch = VoucherBranch::where("id", "=", $id)->get();
        return view("admin.main.layout.voucher", compact("page", "user", "branch"));
    }

    public function updateBranch(Request $request, $id)
    {
        VoucherBranch::where("id", "=", $id)->update(["name_branch_voucher" => $request->branch]);

        $file = $request->file("imagebranch");
        if ($file != NULL) {

            $file->storeAs("/public/image/Branch/", $id . ".jpg");
        }

        return redirect()->back();
    }

    public function deleteBranch($id)
    {
        try {
            VoucherBranch::where("id", "=", $id)->delete();


        } catch (\Throwable $th) {

            Session::flash("result", "not successful");
        }
        return redirect()->back();
    }

}