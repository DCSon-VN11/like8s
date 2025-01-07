<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth; // Đảm bảo bạn đã import Auth

class CheckAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // Kiểm tra nếu người dùng chưa đăng nhập hoặc không phải admin
        if (!Auth::check() || Auth::user()->role !== 'admin') {
            // Chuyển hướng người dùng đến trang khác (ví dụ trang home)
            return redirect()->route('dashboard');
        }

        return $next($request);
    }
}

