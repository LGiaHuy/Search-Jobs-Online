<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class notAdminandNTDMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(Auth::check()){
            if(Auth::user()->ROLE_ID != 1 && Auth::user()->ROLE_ID != 2){
                return $next($request);
            }
            if(Auth::user()->ROLE_ID == 2 ){
                redirect('/admin');
            }
            if(Auth::user()->ROLE_ID == 2 ){
                return redirect('/NhaTuyenDung');
            }
        }
        return $next($request);
    }
}
