<?php

use App\Http\Controllers\API\ApiBatteryController;
use App\Http\Controllers\API\ApiBlogController;
use App\Http\Controllers\API\APICart;
use App\Http\Controllers\API\ApiHomeController;
use App\Http\Controllers\API\ApiUser;
use App\Http\Controllers\API\APIVoucher;
use App\Http\Controllers\API\APIVoucher_Branch;
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
    Route::post("/login", [ApiUser::class, "login"])->name("api.login.post");
    Route::post("/signup", [ApiUser::class, "signup"]);
    Route::post("/sendOtp", [ApiUser::class, "sendOtp"]);
});
Route::prefix("cartapi")->group(function () {

    Route::get("/iduser={id}" , [APICart::class , "getCartWithItems"]);

    Route::post("/confirm" , [APICart::class , "storeCart"]) ;
    Route::post("/emailConfirm" , [APICart::class , "sendEmailConfirm"]) ;
    Route::post("/confirmbyadmin" , [APICart::class , "confirmcart"]);
    
    Route::get("/getAll" , [APICart::class , "getall"]);
    Route::get("/confirmed/iduser={id}" , [APICart::class , "getconfirmed"]);
    Route::get("/notconfirm/iduser={id}" , [APICart::class , "getnotconfirm"]);

});


Route::prefix("branchapi")->group(function () {
    Route::get("/", [APIVoucher_Branch::class, "get"]);
    Route::get("/number_detail", [APIVoucher_Branch::class, "number_detail"]);
});

Route::prefix("voucherapi")->group(function () {
    Route::get("/", [APIVoucher::class, "getAll"]);
    Route::get("/branch={id_branch}/client={id_client}", [APIVoucher::class, "get"]);
    Route::get("/voucherofuser/client={id_client}", [APIVoucher::class, "getVoucherOfUser"]);
    Route::get("/number_detail/branch={id_branch}", [APIVoucher::class, "number_detail"]);

    Route::post("remove_voucher", [APIVoucher::class, "removeItem"]);
    Route::post("/changeVoucher", [APIVoucher::class, "changeVoucher"]);
});
