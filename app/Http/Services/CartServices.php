<?php
namespace App\Http\Services;

use App\Models\Cart;
use App\Models\Detail;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use SimpleSoftwareIO\QrCode\Facades\QrCode;


class CartServices
{
    function getCart()
    {
        try {
            $cart = Session::get("cart");
            ksort($cart);

            [$key, $value] = Arr::divide($cart);
            $keys = (implode(",", $key));

            $result = DB::select("SELECT * FROM batterys WHERE id IN ($keys)");



            foreach ($result as $key => $array) {
                # code...
                $result[$key] = Arr::add(["infor" => $array], "count", $value[$key]);
            }

            return $result;
        } catch (\Throwable $th) {
            return null;
        }
    }
    function setCart($id, $count)
    {


        if (Auth::check()) {
            if ($id <= 0 || $count <= 0) {
                Session::flash("error", "Số lượng goặc sản phẩm không chính xác");
                return false;
            }

            $cart = Session::get("cart");

            if ($cart === null) {
                Session::put("cart", [
                    $id => $count
                ]);
                return true;
            }


            if (Arr::exists($cart, $id)) {

                $cart[$id] = $cart[$id] + $count;
                Session::put("cart", $cart);

            } else {
                $cart[$id] = $count;
                Session::put("cart", $cart);
            }
            return true;
        } else {
            return false;
        }


    }

    public function editCart($id, $count)
    {
        $cart = Session::get("cart");

        if ($count > 0) {
            $cart[$id] = $count;
        } else {
            Arr::forget($cart, $id);
        }
        Session::put("cart", $cart);

    }

    public function deleteCart($id)
    {
        $cart = Session::get("cart");

        Arr::forget($cart, $id);

        Session::put("cart", $cart);

    }

    function confirmCart($request)
    {

        $cart = Session::get("cart");
        ksort($cart);
        if ($cart != null) {
            // lấy thông tin người dùng
            $user = Auth::user();
            $namefile = $request->fileimage ;
            //set thông số
            $total = 0;
            $sql = array();
            $keys = [];



            // thêm cart
            foreach ($cart as $key => $value) {

                $keys[] = $key;
            }

            $keys = implode(",", $keys);
            $battery = DB::select("SELECT * FROM batterys WHERE id IN ($keys)");
            foreach ($battery as $row) {
                $total = $total + $row->point * $cart[$row->id];

            }
            $token = $request->_token . time();
            $idcart = Cart::create([
                "iduser" => $user->id,
                "address" => $request->address,
                "total" => $total,
                "token" => $token,
                "image" => $namefile,
            ])->id;

            // thêm detail
            foreach ($cart as $key => $value) {
                $sql[] = "($idcart,$key,$value)";
            }
            $sql = implode(",", $sql);
            DB::insert("insert into  detail(idcart, idbatterys, count) values  $sql");

            //tạo mã qr
            $qr = QrCode::size(400)->generate($token);
            Storage::put("public/image/User/QRCode/" . $namefile . ".xml", $qr);

            Mail::send('User.layout.Cart.mail', ["cart" => $cart, "battery" => $battery, "fullname" => $user->name, "file" => $namefile], function ($email) use ($user) {
                $email->subject("Thông tin thu gom pin");
                $email->to($user->email);
            });

            $request->session()->forget('cart');

            return true;


        } else {
            Session::flash("fail", "Giỏ hàng trống");
            return false;
        }
    }
}
?>