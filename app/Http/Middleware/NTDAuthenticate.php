<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;

class NTDAuthenticate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(Auth::check() && Auth::user()->ROLE_ID == 2){
            return $next($request);
        }
        if(Auth::check() && Auth::user()->ROLE_ID == 1){
            Session::flash("error", "Bạn đang đăng nhập tài khoản Admin");
            return redirect('/admin');
        }
        Session::flash("error", "Bạn không thể sử dụng chức năng này");
        return redirect('/');
    }
}
