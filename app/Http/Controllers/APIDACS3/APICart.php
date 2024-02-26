<?php

namespace App\Http\Controllers\APIDACS3;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class APICart extends Controller
{
    //
    function getData(Request $request){
        
        $data = json_decode($request->data) ;
        foreach (($data) as $item ) {
            echo $item->id."-".$item->quantity."-".$item->total."***" ;
        }
    }
}
