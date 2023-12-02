<?php

use App\Http\Controllers\Admin\BatteryController;
use App\Http\Controllers\Admin\BranchController;
use App\Http\Controllers\Admin\EmployeerConttroler;
use App\Http\Controllers\Admin\HistoryController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\API\ApiCartController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\VoucherController;
use App\Http\Controllers\SignUpController;
use App\Http\Controllers\User\BlogController;
use App\Http\Controllers\User\CartController;
use App\Http\Controllers\User\ExchangeController;
use App\Http\Controllers\User\InformationController;
use App\Http\Controllers\User\HistoryUserController;
use App\Http\Controllers\User\HomeControllerUser;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeControllerUser::class, "index"])->name("home");

Route::get("/logout", [SignUpController::class, "logout"])->name("login.logout");



Route::prefix("cart")->middleware("auth")->group(function () {
    Route::get("/", [CartController::class, "index"])->name("cart.index");
    Route::post("/store", [CartController::class, "store"])->name("cart.store");
    Route::get("/qr/{id}", [CartController::class, "viewQR"])->name("cart.qr");


});
Route::prefix("history")->middleware("auth")->group(function () {
    Route::get("page={page}", [HistoryUserController::class, "index"])->name("historyuser.index");
    Route::get("history={id}", [HistoryUserController::class, "detail"])->name("historyuser.detail");

});

Route::prefix("blog")->group(function () {
    Route::get("", [BlogController::class, "index"])->name("blog.index");
    Route::post("/store", [BlogController::class, "store"])->middleware("auth")->name("blog.store");

});

Route::prefix("information")->middleware("auth")->group(function () {
    Route::get("", [InformationController::class, "index"])->name("information.index");
    Route::post("update", [InformationController::class, "update"])->name("information.update");

});

Route::prefix("exchange")->middleware("auth")->group(function () {
    Route::get("", [ExchangeController::class, "getBranch"])->name("exchange.branch");
    Route::get("voucher/{idbranch}-page={page}", [ExchangeController::class, "getVoucher"])->name("exchange.voucher");
    Route::get("voucher{idvoucher}", [ExchangeController::class, "exchange"])->name("exchange.exchangeVoucher");
    Route::get("QR-{image}", [ExchangeController::class, "viewQR"])->name("exchange.viewQR");
    Route::get("listVoucher/page={page}", [ExchangeController::class, "listVoucher"])->name("exchange.listVoucher");

});


Route::prefix("login")->group(function () {
    Route::get("/", [LoginController::class, "getLogin"])->middleware(['login'])->name("login.get");
    Route::post("/", [LoginController::class, "login"])->name("login.post");

    Route::prefix("socialite")->group(function () {
        Route::prefix("gmail")->group(function () {
            Route::get("/", [LoginController::class, "loginGmail"])->name("login.socialite.gmail");
            Route::get("/callback", [LoginController::class, "loginGmailCallback"])->name("login.socialite.gmail.callback");
        });




    });


    Route::get("/confirm/{token}-{cccd}", [LoginController::class, "confirm"])->name("login.confirm");
    Route::get("/confirmuser/{token}-{cccd}", [LoginController::class, "confirmuser"])->name("login.confirmuser");



    Route::get("/optionLogin", [LoginController::class, "optionLogin"])->middleware(['auth', 'loginOption'])->name("login.optionLogin");
});

Route::prefix("signup")->group(function () {
    Route::get("/", [SignUpController::class, "index"])->name("signup.index");
    Route::post("/", [SignUpController::class, "signUp"])->name("signup.signUp");

});

Route::prefix('/admin')->middleware(['auth', 'status'])->group(function () {
    Route::get('/', [HomeController::class, "index"])->name("admin.index");
    Route::get('/logout', [HomeController::class, "logout"])->name("admin.logout");

    Route::middleware(['register'])->group(function () {
        Route::prefix('register')->group(function () {
            Route::get('/', [EmployeerConttroler::class, "index"])->name('register.index');

            Route::get('/create', [EmployeerConttroler::class, "create"])->name('register.create');
            Route::post('/create', [EmployeerConttroler::class, "store"])->name('register.store');

            Route::get('/profile/{id}', [EmployeerConttroler::class, "show"])->name('register.show');

            Route::post('/{type}/{id}', [EmployeerConttroler::class, "update"])->name('register.update');
            Route::post('/profile/delete/{id}', [EmployeerConttroler::class, "destroy"])->name('register.destroy');
        });


    });

    Route::prefix('battery')->group(function () {
        Route::get('/', [BatteryController::class, "index"])->name("battery.index");
        Route::get('/create', [BatteryController::class, "create"])->name("battery.create");

        Route::post('/create', [BatteryController::class, "store"])->name("battery.store");

        Route::post('/update', [BatteryController::class, "update"])->name("battery.update");

        Route::post('/delete', [BatteryController::class, "delete"])->name("battery.delete");
    });

    Route::prefix('voucher')->group(function () {
        Route::get('/', [BranchController::class, "index"])->name("voucher.index");
        Route::get('/branch{id}-page={page}', [VoucherController::class, "index"])->name("voucher.index.battery");

        Route::get('/createBranch', [BranchController::class, "createBranch"])->name("voucher.createBranch");
        Route::post('/createBranch', [BranchController::class, "storeBranch"])->name("voucher.storeBranch");

        Route::get('/createVoucher', [VoucherController::class, "createVoucher"])->name("voucher.createVoucher");
        Route::post('/createVoucher', [VoucherController::class, "storeVoucher"])->name("voucher.storeVoucher");

        Route::post('/updateVoucher{id}', [VoucherController::class, "updateVoucher"])->name("voucher.updateVoucher");
        Route::post('/deleteVoucher{id}', [VoucherController::class, "deleteVoucher"])->name("voucher.deleteVoucher");

        Route::get("/editBranch{id}", [BranchController::class, "editBranch"])->name("voucher.editBranch");
        Route::post("/editBranch{id}", [BranchController::class, "updateBranch"])->name("voucher.updateBranch");

        Route::get("/deleteBranch{id}", [BranchController::class, "deleteBranch"])->name("voucher.deleteBranch");

    });

    Route::prefix('setting')->group(function () {
        Route::get('/', [SettingController::class, "index"])->name('setting.index');
        Route::post('/uploadAvataPage', [SettingController::class, "uploadAvataPage"])->name("setting.uploadAvataPage");

        Route::post('/updatePassword', [SettingController::class, "updatePassword"])->name("setting.updatePassword");
        Route::post('/updateInformation', [SettingController::class, "updateInformation"])->name("setting.updateInformation");
    });

    Route::prefix("history")->group(function () {
        Route::get("/", [HistoryController::class, "index"])->name("history.index");
        Route::get("delete/{id}", [HistoryController::class, "deleteCart"])->name("history.deleteCart");

        Route::get("/selectCart/{id}-{imageCart}", [HistoryController::class, "selectCart"])->name("history.selectCart");
        Route::get("/confirm/{token}", [HistoryController::class, "confirm"])->name("history.confirm");
    });


});

Route::prefix("api/cart")->group(function () {
    Route::get('/', [ApiCartController::class, "index"])->name("api.cart");
    Route::get('/edit/{id}-{count}', [ApiCartController::class, "editCart"])->name("api.editCart");
    Route::get('/delete/{id}', [ApiCartController::class, "deleteCart"])->name("api.deleteCart");
    Route::get('/add/{id}-{count}', [ApiCartController::class, "addCart"])->name("api.addCart");
});