<?php

namespace App\Http\Controllers\APIDACS3;

use App\Http\Controllers\Controller;
use App\Models\Battery;
use Illuminate\Http\Request;

class APIBattery extends Controller
{
    function getData(){
        $data = Battery::all() ;
        return response([
            "data" => $data
        ]);
    }
}
