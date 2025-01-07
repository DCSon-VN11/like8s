<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller;
use App\Models\Account;
use App\Models\UserInfo;
use App\Models\Wallet;
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
        $account = Account::create([
            'username' => $request->username,
            'password' => bcrypt($request->password), // Mã hóa mật khẩu để bảo mật
        ]);
        // Tạo ví cho tài khoản vừa đăng ký
        Wallet::create([
            'accountid' => $account->id, // Sử dụng ID của tài khoản vừa tạo
            'balance' => 0, // Số dư ban đầu
        ]);
        UserInfo::create([
            'accountid' => $account->id, // Sử dụng ID của tài khoản vừa tạo
        ]);
        // Chuyển hướng sau khi đăng ký thành công
        return redirect()->route('register')->with('success', 'Đăng ký thành công! Vui lòng đăng nhập.');
    }
}
