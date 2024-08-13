<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class UVAuthenticate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(Auth::check() && Auth::user()->ROLE_ID == 3){
            return $next($request);
        }
        if(Auth::check() && Auth::user()->ROLE_ID == 1){
            Session::flash("error", "Bạn đang đăng nhập tài khoản Admin");
            return redirect('/admin');
        }
        if(Auth::check() && Auth::user()->ROLE_ID == 2){
            Session::flash("error", "Bạn đang đăng nhập tài khoản NTD");
            return redirect('/admin');
        }
        return redirect('/login');
    }
}
