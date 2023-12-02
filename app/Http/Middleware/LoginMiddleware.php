<?php

namespace App\Http\Middleware;

use Closure;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */

    private function logout(Request $request, $result)
    {

        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        Session::flash('result', "$result");
    }
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check()) {
            $user = Auth::user();
            $status = $user->status;

            if ($status >= 1) {
                if ($status < 5) {
                    return redirect(route("login.optionLogin"));
                } else {
                    if ($status == 50) {
                        if ($user->cccd == null) {
                            return redirect(route("login.updateInformation"));
                        } else {
                            $this->logout($request, 'tk chx click hoạt');
                        }
                    } else {
                        return redirect(route("home"));
                    }
                }
            } else {
                if ($status == 0) {
                    $this->logout($request, 'tk chx click hoạt');

                } elseif ($status == -1) {
                    $this->logout($request, 'tk đã bị khoá');

                }
            }


        }
        return $next($request);
    }
}
