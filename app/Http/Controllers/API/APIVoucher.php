<?php

namespace App\Http\Controllers\API;

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
    public function getAll()
    {

        $data = Voucher::where("IDClient", "=", 0)->get();
        return response(["data"  => $data]);
    }
    public function get($id_branch, $id_client)
    {

        $data = Voucher::where("id_branch_voucher", "=", $id_branch)->where("IDClient", "=", $id_client)->get();
        return response(["data"  => $data]);
    }
    public function getVoucherOfUser($id_client)
{
    try {
        $data = Voucher::where("IDClient", $id_client)->get();

        // Nếu không có voucher nào
        if ($data->isEmpty()) {
            return response()->json([
                "status" => "success",
                "message" => "Người dùng chưa có voucher nào",
                "data" => []
            ], 200);
        }

        return response()->json([
            "status" => "success",
            "message" => "Danh sách voucher của người dùng",
            "data" => $data
        ], 200);

    } catch (\Exception $e) {
        return response()->json([
            "status" => "error",
            "message" => "Lỗi hệ thống: " . $e->getMessage()
        ], 500);
    }
}

    public function changeVoucher(Request $request)
    {
        try {
            $voucher = Voucher::find($request->idVoucher);
            $user = User::find($request->idClient);

            if (!$voucher || !$user) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'User hoặc Voucher không tồn tại'
                ], 200);
            }

            if ($voucher->IDClient != 0) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Voucher đã được đổi'
                ], 200);
            }

            if ($user->point < $voucher->point) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Không đủ điểm để đổi voucher'
                ], status: 200);
            }

            // Cập nhật điểm người dùng
            $user->point = $user->point - $voucher->point;
            $user->save();

            // Cập nhật voucher
            $voucher->IDClient = $user->id;
            $voucher->save();

            return response()->json([
                'status' => 'success',
                'message' => 'Đổi voucher thành công',
                'data' => [
                    'user_id' => $user->id,
                    'voucher_id' => $voucher->id
                ]
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Có lỗi xảy ra',
                'error'   => $e->getMessage()
            ], 500);
        }
    }

    public function number_detail($id_branch)
    {
        $totalVoucher = DB::table("voucher")
            ->selectRaw("count(id) as totalVoucher")
            ->where("id_branch_voucher", "=", $id_branch)
            ->get();
        $remaining = DB::table("voucher")
            ->selectRaw("count(id) as totalRemaining")
            ->where("IDClient", "=", 0)
            ->where("id_branch_voucher", "=", $id_branch)
            ->get();


        return response([
            "totalVoucher" => $totalVoucher[0]->totalVoucher,
            "remaining" => $remaining[0]->totalRemaining,
            "changed" =>  $totalVoucher[0]->totalVoucher - $remaining[0]->totalRemaining,


        ]);
    }

    public function removeItem(Request $request)
    {
        try {
            $voucher = Voucher::where("IDClient", "=", $request->idClient)->where("id", "=", $request->idVoucher)->get();
            Voucher::where("IDClient", "=", $request->idClient)->where("id", "=", $request->idVoucher)->delete();
            json_decode($voucher);

            Storage::delete("public/image/QRCode/" . $voucher[0]["image"] . ".txt");
            echo "Được";
        } catch (Exception $e) {
            echo "Lỗi";
        }
    }
}
