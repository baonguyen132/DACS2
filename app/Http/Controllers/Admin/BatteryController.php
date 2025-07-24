<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\BatteryRequest;
use App\Models\Battery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class BatteryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page = "index";
        $user = Auth::user();
        return view("admin.main.layout.battery", compact("page", "user"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $page = "create";
        $user = Auth::user();
        return view("admin.main.layout.battery", compact("page", "user"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BatteryRequest $request)
    {
        $nameimage = time();

        $file = ($request->file("imagebattery"));
        $file->storeAs("/public/image/Battery/", $nameimage . ".jpg");

        Battery::create([
            "name_battery" => $request->battery,
            "size" => $request->size,
            "shape" => $request->shape,
            "point" => $request->point,
            "image" => $nameimage,
        ]);



        return redirect()->back();
    }


    public function update(Request $request)
    {
        Battery::where("id", "=", $request->submitbatteryedit)->update([
            "name_battery" => "$request->nameedit",
            "size" => "$request->sizeedit",
            "shape" => "$request->shapeedit",
            "point" => "$request->pointedit",
        ]);

        return redirect()->back();
    }

    public function delete(Request $request)
    {

        $array = explode("-", $request->deleteBattery);

        Battery::where("id", "=", $array[0])->delete();
        Storage::delete("public/image/Battery/" . $array[1] . ".jpg");

        return redirect()->back();
    }


}