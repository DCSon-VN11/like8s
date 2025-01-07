<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller;
use App\Models\Account;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use App\Models\UserInfo;

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

        // Kiểm tra tài khoản tồn tại và mật khẩu khớp
        if ($account && Hash::check($request->password, $account->password)) {
            // Kiểm tra trạng thái tài khoản
            if ($account->state !== 'active') {
                return back()->withErrors(['username' => 'Tài khoản của bạn đã bị khóa hoặc không hoạt động.']);
            }

            // Kiểm tra xem người dùng có chọn "Ghi nhớ đăng nhập" hay không
            $remember = $request->has('remember');  // Kiểm tra checkbox "remember"

            // Đăng nhập người dùng, với tính năng "Ghi nhớ đăng nhập" nếu checkbox được chọn
            Auth::login($account, $remember);

            // Chuyển hướng đến trang chính sau khi đăng nhập
            if ($account->role == 'admin')
                return redirect()->intended('/admin');
            else
                return redirect()->intended('/home');
        }

        // Nếu đăng nhập không thành công
        return back()->withErrors(['username' => 'Thông tin đăng nhập không chính xác.']);
    }

    // Đăng xuất
    public function logout(Request $request)
    {
        Auth::logout();  // Đăng xuất
        // Hủy bỏ phiên làm việc
        $request->session()->invalidate();

        // Tạo lại token bảo mật để tránh CSRF
        $request->session()->regenerateToken();
        return redirect()->route('login');  // Chuyển hướng về trang chủ
    }
    // Gửi mã xác nhận qua email
    public function sendVerificationCode(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);

        $token = Str::random(6); // Tạo mã xác nhận
        $user = UserInfo::where('email', $request->email)->first();

        if (!$user) {
            return back()->with('error', 'Email không tồn tại trong hệ thống.');
        }

        $user->token = $token; // Lưu token vào bảng
        $user->save();

        try {
            Mail::raw(
                "Sử dụng mã sau để thay đổi mật khẩu của bạn: $token. Nếu bạn không yêu cầu thay đổi mật khẩu, vui lòng bỏ qua email này.",
                function ($message) use ($request) {
                    $message->to($request->email)
                        ->subject('Yêu cầu thay đổi mật khẩu');
                }
            );
        } catch (\Exception $e) {
            return back()->with('error', 'Không thể gửi email: ' . $e->getMessage());
        }
        // Lưu token vào cookie (tùy chọn thời gian sống của cookie)
        $minutes = 15; // Cookie sẽ tồn tại trong 15 phút
        Cookie::queue('token', $token, $minutes);
        return back()->with('success', 'Mã xác nhận đã được gửi đến email của bạn.');
    }

    // Xác nhận mã và chuyển đến trang đặt lại mật khẩu
    public function resetForm(Request $request)
    {
        $token_pass = Cookie::get('token');
        // Kiểm tra mã xác nhận
        if ( $token_pass!== $request->token) {
            return back()->with('error', 'Mã xác thực không đúng.');
        }

        // Kiểm tra token trong cơ sở dữ liệu
        $user = UserInfo::where('token', $request->token)->first();
        if (!$user) {
            return back()->with('error', 'Mã xác thực không hợp lệ hoặc đã hết hạn.');
        }
        // Xóa cookie 'token'
        Cookie::queue(Cookie::forget('token'));
        // Lấy thông tin tài khoản
        $account = $user->accountid;
        // Lưu token vào cookie (tùy chọn thời gian sống của cookie)
        $minutes = 15; // Cookie sẽ tồn tại trong 1 giờ
        Cookie::queue('account', $account, $minutes);
        return back();
    }


    // Đặt lại mật khẩu
    public function resetPassword(Request $request)
    {
        // Xác thực mật khẩu
        if ($request->password !== $request->password_confirmation) {
            return back()->with('error', 'Mật khẩu không trùng khớp');
        }

        // Nếu mật khẩu hợp lệ, tiếp tục xử lý
        $account = Account::find(Cookie::get('account'));
        if (!$account) {
            return back()->with('error', 'Tài khoản không tồn tại');
        }

        // Cập nhật mật khẩu
        $account->password = Hash::make($request->password);
        $account->save();
        // Xóa cookie 'token'
        Cookie::queue(Cookie::forget('account'));
        return back()->with('success', 'Đặt lại mật khẩu thành công');
    }
}
