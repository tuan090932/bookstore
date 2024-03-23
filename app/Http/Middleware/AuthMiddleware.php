<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AuthMiddleware
{
    public function handle($request, Closure $next)
    {
        if (!Auth::check()) {

            // return redirect()->route('login')->with('alert', 'Bạn cần đăng nhập để truy cập trang này.');
            //chưa đăng nhập
        }
        return $next($request); // chạy contnrolller
    }
}
