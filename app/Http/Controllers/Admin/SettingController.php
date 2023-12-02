<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Http\Requests\Admin\SettingPasswordRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class SettingController extends Controller
{

    public function index()
    {
        $user = Auth::user();

        if (file_exists(public_path("storage/upload/" . $user->cccd . "/upload_image_avata.jpg"))) {
            $link_avata = asset("storage/upload/" . $user->cccd . "/upload_image_avata.jpg");
        } else {
            $link_avata = "https://nhanvietluanvan.com/wp-content/uploads/2023/05/c6e56503cfdd87da299f72dc416023d4-736x620.jpg";
        }

        if (file_exists(public_path("storage/upload/" . $user->cccd . "/upload_image_page.jpg"))) {
            $link_page = asset("storage/upload/" . $user->cccd . "/upload_image_page.jpg");
        } else {
            $link_page = NULL;
        }

        if (file_exists(public_path("storage/upload/" . $user->cccd . "/upload_card_image.jpg"))) {
            $upload_card_image = asset("storage/upload/" . $user->cccd . "/upload_card_image.jpg");
        } else {
            $upload_card_image = NULL;
        }

        if (file_exists(public_path("storage/upload/" . $user->cccd . "/citizen_identification_front.jpg"))) {
            $citizen_identification_front = asset("storage/upload/" . $user->cccd . "/citizen_identification_front.jpg");
        } else {
            $citizen_identification_front = NULL;
        }

        if (file_exists(public_path("storage/upload/" . $user->cccd . "/citizen_identification_back.jpg"))) {
            $citizen_identification_back = asset("storage/upload/" . $user->cccd . "/citizen_identification_back.jpg");
        } else {
            $citizen_identification_back = NULL;
        }

        return view("admin.main.layout.setting", compact("user", "link_avata", "link_page", "upload_card_image", "citizen_identification_front", "citizen_identification_back"));
    }

    public function uploadAvataPage(Request $request)
    {


        Auth::storeImg($request, 'upload_image_page');
        Auth::storeImg($request, 'upload_image_avata');


        return redirect(route("setting.index"));
    }

    public function updatePassword(SettingPasswordRequest $request)
    {
        $user = Auth::user();

        if (Hash::check($request->oldpassword, $user->password)) {

            $request->user()->fill(['password' => Hash::make($request->newpassword)])->save();
            Session::flash("result", "successful");


        } else {
            Session::flash("result", "not successful");
        }


        return redirect(route("setting.index"));
    }
    public function updateInformation(Request $request)
    {
        if (
            $request->user()->fill(
                [
                    'name' => $request->fullname_infor,
                    'dob' => $request->dateofbirth_information,
                    'gender' => $request->gender_information,
                    'pob' => $request->my_placeofbrith,
                    'address' => $request->accommodation_infor
                ]
            )->save()
        ) {
            Auth::storeImg($request, 'upload_card_image');
            Auth::storeImg($request, 'citizen_identification_front');
            Auth::storeImg($request, 'citizen_identification_back');

            return redirect(route("setting.index"));
        }
        dd($request->all());
    }
}
