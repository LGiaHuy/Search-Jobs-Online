<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Support\Facades\Session;

class AdminAuthenticate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(Auth::check() && Auth::user()->ROLE_ID == 1){
            return $next($request);
        }
        if(Auth::check() && Auth::user()->ROLE_ID == 2){
            Session::flash("error", "Bạn không thể sử dụng chức năng này");
            return redirect('/NhaTuyenDung');
        }
        Session::flash("error", "Bạn không thể sử dụng chức năng này");
        return redirect('/');
    }
}
