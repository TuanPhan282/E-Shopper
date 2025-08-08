<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class User
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(Auth::check() && Auth::user()->level == 0){

            return $next($request);
        }else{
            return back()->withErrors('Bạn phải đăng nhập với tư cách người dùng để truy cập trang này.');
        }
    }
}
