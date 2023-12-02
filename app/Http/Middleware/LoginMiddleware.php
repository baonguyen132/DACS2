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
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check()) {
            $status = Auth::user()->status;
            if ($status != 5) {
                if ($status >= 1) {
                    return redirect(route("login.optionLogin"));
                }
            } elseif ($status == 5) {
                return redirect(route("home"));
            } elseif ($status == 0) {
                Auth::logout();

                $request->session()->invalidate();

                $request->session()->regenerateToken();

                Session::flash('result', 'tk chx click hoạt');
            } elseif ($status == -1) {
                Auth::logout();

                $request->session()->invalidate();

                $request->session()->regenerateToken();

                Session::flash('result', 'tk đã bị khoá');
            }

        }
        return $next($request);
    }
}