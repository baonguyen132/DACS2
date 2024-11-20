<?php

use App\Http\Controllers\API\ApiBatteryController;
use App\Http\Controllers\API\ApiBlogController;
use App\Http\Controllers\API\ApiCartController;
use App\Http\Controllers\API\ApiHomeController;

use App\Http\Controllers\APIDACS3\APIBattery;
use App\Http\Controllers\APIDACS3\APICart;
use App\Http\Controllers\APIDACS3\APIUser;
use App\Http\Controllers\APIDACS3\APIVoucher;
use App\Http\Controllers\APIDACS3\APIVoucher_Branch;
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
    Route::post("/replace_address" ,[APIUser::class , "replaceAddress"]);
    Route::post("/replace_password" , [APIUser::class , "replacePassword"]);
} );
Route::prefix('batteryapi')->group(function () {
    Route::get("/" , [APIBattery::class , "getData"]) ;
});

Route::prefix("cartapi")->group(function () {
    Route::post("/confirm" , [APICart::class , "storeCart"]) ;
    Route::post("/emailConfirm" , [APICart::class , "sendEmailConfirm"]) ;
    Route::post("/confirmbyadmin" , [APICart::class , "confirmcart"]);
    
    Route::get("/iduser={id}" , [APICart::class , "get"]);
    Route::get("/getAll" , [APICart::class , "getall"]);
    Route::get("/confirmed/iduser={id}" , [APICart::class , "getconfirmed"]);
    Route::get("/notconfirm/iduser={id}" , [APICart::class , "getnotconfirm"]);

    Route::get("/detail/idcart={id}" , [APICart::class , "detail"]) ;    
    Route::get("/getItem/idcart={id}" , [APICart::class , "getItem"]);
    Route::get("/getnumber/iduser={id}" , [APICart::class , "number_detail"]) ;
});

Route::prefix("branchapi")->group(function (){
    Route::get("/" , [APIVoucher_Branch::class , "get"]);
    Route::get("/number_detail" , [APIVoucher_Branch::class , "number_detail"]);
});

Route::prefix("voucherapi")->group(function (){
    Route::get("/branch={id_branch}/client={id_client}" , [APIVoucher::class , "get"]);
    Route::get("/voucherofuser/client={id_client}" , [APIVoucher::class , "getVoucherOfUser"]) ;
    Route::get("/number_detail/branch={id_branch}" , [APIVoucher::class , "number_detail"]) ;

    Route::post("remove_voucher" , [APIVoucher::class , "removeItem"]);
    Route::post("/change" , [APIVoucher::class , "changeVoucher"]);
});

