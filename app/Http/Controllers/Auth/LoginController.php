<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Account;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    // Hiển thị form đăng nhập
    public function showLoginForm()
    {
        return view('login'); // Chỉ định view đăng nhập
    }

    // Xử lý đăng nhập
    public function login(Request $request)
    {
        // Xác thực đầu vào
        $request->validate([
            'username' => 'required|string',   // Kiểm tra username
            'password' => 'required|string',   // Kiểm tra mật khẩu
        ]);

        // Kiểm tra tài khoản tồn tại
        $account = Account::where('username', $request->username)->first();

        // Nếu tài khoản tồn tại và mật khẩu khớp
        if ($account && $account->password == $request->password && $account->state == 'active') {
            // Đăng nhập người dùng
            Auth::login($account); // Đăng nhập vào ứng dụng
            return redirect()->intended('/home'); // Điều hướng đến trang chính sau khi đăng nhập
        }

        // Nếu đăng nhập không thành công
        return back()->withErrors(['username' => 'Thông tin đăng nhập không chính xác hoặc tài khoản bị khóa.']);
    }

    // Đăng xuất
    public function logout(Request $request)
    {
        Auth::logout();  // Đăng xuất
        return redirect()->route('login');  // Chuyển hướng về trang chủ
    }
}

