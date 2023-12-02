<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Battery;
use Illuminate\Http\Request;

class ApiBatteryController extends Controller
{
    //

    public function index()
    {
        $result = Battery::all();
        return response(
            [
                "records" => $result,
                "status" => 200,
            ]
        );
    }




}
