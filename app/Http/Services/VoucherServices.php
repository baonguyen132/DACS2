<?php
namespace App\Http\Services;

use App\Models\User;
use App\Models\Voucher;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class VoucherServices
{
    function getVoucher($idbranch, $page, $soluong)
    {
        $start = ($page - 1) * $soluong;
        return Voucher::where("id_branch_voucher", "=", $idbranch)->where("IDClient", "=", 0)->offset($start)->limit($soluong)->orderBy("id", "desc")->get();
    }
    function getCount($idbranch, $soluong)
    {

        return ceil(Voucher::where("id_branch_voucher", "=", $idbranch)->where("IDClient", "=", 0)->count() / $soluong);
    }

    function exchange($id)
    {
        $voucher = Voucher::where("id", "=", $id)->get();
        $user = Auth::user();

        $voucher = json_decode($voucher)[0];

        if ($voucher->IDClient == 0) {
            if ($user->point >= $voucher->point) {


                User::where("id", "=", $user->id)->update(["point" => $user->point - $voucher->point]);
                Voucher::where("id", "=", $id)->update(["IDClient" => $user->id]);


                Mail::send('User.layout.Exchange.mail', ["fullname" => $user->name, "image" => $voucher->image], function ($email) use ($user) {
                    $email->subject("Thông tin thu gom pin");
                    $email->to($user->email);
                });

                return "đổi thành công";
            } else {
                return "không đủ điểm";
            }
        } else {
            return "ko đổi";
        }


    }
}


?>