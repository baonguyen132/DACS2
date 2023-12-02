<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ApiHomeController extends Controller
{
    function dataChart1()
    {
        $dataChar = DB::select("SELECT MONTH(created_at) as month , COUNT(ID) as count FROM cart WHERE YEAR(created_at) = YEAR(NOW()) AND token = 'NULL' GROUP BY MONTH(created_at)");
        return ($dataChar);

    }
}