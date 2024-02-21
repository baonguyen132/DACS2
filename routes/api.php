<?php

use App\Http\Controllers\API\ApiBatteryController;
use App\Http\Controllers\API\ApiBlogController;
use App\Http\Controllers\API\ApiCartController;
use App\Http\Controllers\API\ApiHomeController;
use App\Http\Controllers\APIDACS3\APIUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('battery', [ApiBatteryController::class, "index"])->name("api.battery");

Route::get("/chart-1", [ApiHomeController::class, "dataChart1"])->name("api.chart1");

Route::get("dataBlog", [ApiBlogController::class, "index"])->name("api.blog");


Route::prefix("auth")->group(function () { 
    Route::get("/id={id}", [APIUser::class , "getUser"]);
    Route::post("/checkUser", [APIUser::class,"checkUser"]);
    Route::post("/signup" , [APIUser::class,"signup"]);
    Route::post("/sendOtp" , [APIUser::class,"sendOtp"]);
} );