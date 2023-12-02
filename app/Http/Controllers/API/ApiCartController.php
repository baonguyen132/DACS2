<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Services\CartServices;
use App\Models\Battery;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class ApiCartController extends Controller
{
    //
    private $cart;
    function __construct()
    {
        $this->cart = new CartServices();
    }
    public function index()
    {
        return response(
            [
                "records" => $this->cart->getCart(),

                "status" => 200,
            ]
        );


    }
    public function addCart($id, $count)
    {

        if ($this->cart->setCart($id, $count)) {
            echo "thành công";
        } else {
            echo "fail";
        }


    }


    public function editCart($id, $count)
    {
        $this->cart->editCart($id, $count);

    }

    public function deleteCart($id)
    {
        $this->cart->deleteCart($id);

    }
}