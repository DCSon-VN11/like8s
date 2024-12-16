<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Account;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    public function showRegisterForm()
    {
        return view('register'); // Tên file view cho form đăng ký
    }
    public function register(Request $request)
{
    // Validate dữ liệu đầu vào
    $validator = Validator::make($request->all(), [
        'username' => 'required|string|unique:account,username',
        'password' => 'required|string|min:6',
        'password2' => 'required|same:password',
    ], [
        'username.required' => 'Tên đăng nhập là bắt buộc.',
        'username.unique' => 'Tên đăng nhập đã tồn tại.',
        'password.required' => 'Mật khẩu là bắt buộc.',
        'password.min' => 'Mật khẩu phải ít nhất 6 ký tự.',
        'password2.required' => 'Vui lòng xác nhận mật khẩu.',
        'password2.same' => 'Mật khẩu xác nhận không khớp.',
    ]);

    // Nếu có lỗi validate, trả về form đăng ký
    if ($validator->fails()) {
        return redirect()->back()->withErrors($validator)->withInput();
    }

    // Lưu thông tin tài khoản vào cơ sở dữ liệu
    Account::create([
        'username' => $request->username,
        'password' => $request->password, // Không mã hóa mật khẩu
    ]);
    // Chuyển hướng sau khi đăng ký thành công
    return redirect()->route('register')->with('success', 'Đăng ký thành công! Vui lòng đăng nhập.');
}
}
