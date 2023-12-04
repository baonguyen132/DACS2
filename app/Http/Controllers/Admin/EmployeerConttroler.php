<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AddEmployee;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class EmployeerConttroler extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($detail)
    {

        $page = "index";
        if ($detail === "employee") {
            $data = User::whereIn("status", [1, 2, 3, 4])->get();
        } elseif ($detail === "customer") {
            $data = User::where("status", "=", 5)->get();
        } else {
            $data = User::whereIn("status", [0, 50])->get();
        }

        $user = Auth::user();
        return view("admin.main.layout.register", compact("page", "data", "user", "detail"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $page = "create";
        $user = Auth::user();
        return view("admin.main.layout.register", compact("page", "user"));


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddEmployee $request)
    {
        try {


            $password = User::createPassword($request);

            User::create([
                'name' => $request->fullname,
                'email' => $request->gmail,
                'password' => Hash::make($password),
                'cccd' => $request->CCCD,
                'dob' => $request->dateofbirth,
                'token' => $request->_token
            ]);

            Mail::send('admin.main.layout.register.mail', ["token" => $request->_token, 'fullname' => $request->fullname, 'username' => $request->gmail, 'password' => $password, 'cccd' => $request->CCCD, 'dob' => $request->dateofbirth], function ($email) use ($request) {
                $email->subject("Xác nhận tài khoản");
                $email->to($request->gmail);
            });

            return redirect(route("register.index"));

        } catch (\Throwable $th) {



            return back()->with("result", "người dùng đã có tài khoản");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($detail, $id)
    {
        //
        if ($id == Auth::user()->id) {
            return redirect(route("setting.index"));
        } else {
            if ($detail == "employee") {
                $in = [1, 2, 3, 4];
            } elseif ($detail == "customer") {
                $in = [5];
            } else {
                $in = [0, 50];
            }
            $employee = (User::where("id", "=", $id)->whereIn("status", $in)->get());

            if (isset($employee[0])) {
                $employee = $employee[0];
                if ($employee->status != 0) {
                    $user = Auth::user();

                    $page = "show";
                    return view("admin.main.layout.register", compact("page", "employee", "user", "detail"));
                } else {
                    return redirect(route("register.index", ["detail" => "unconfirmed"]));
                }
            } else {
                return redirect(route("register.index", ["detail" => $detail]));
            }

        }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $type, $id)
    {
        //
        if ($type === "grant_permissions") {
            User::where("id", "=", $id)->update(['status' => $request->grant_permissions]);

        }

        return back()->with("result", "successful");


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($detail, $id)
    {
        User::where("id", "=", $id)->delete();
        return redirect(route("register.index", ["detail" => $detail]));

    }
}