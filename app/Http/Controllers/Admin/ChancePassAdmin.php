<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Controller;
use App\Models\Account;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ChancePassAdmin extends Controller
{
    /**
     * Gắn middleware auth để kiểm tra đăng nhập
     */
    public function __construct()
    {
        $this->middleware('auth'); // Đảm bảo chỉ người dùng đã đăng nhập mới có thể truy cập
    }
    public function chancepass(Request $request)
    {
        $request->validate([
            'pass_old' => 'required',
            'pass_new' => 'required|min:6',
            'pass_confirm' => 'required|min:6',
        ]);
        if ($request->pass_new != $request->pass_confirm) {
            return back()->with('errorpass', 'Mật khẩu không trùng khớp.');
        } else {
            // Lấy thông tin tài khoản người dùng hiện tại
            $account = Account::find(Auth::id());

            if (!Hash::check($request->pass_old, $account->password)) {
                return back()->with('errorpass', 'Mật khẩu hiện tại không chính xác.');
            }

            $account->password = Hash::make($request->pass_new);
            $account->save();

            return back()->with('success', 'Mật khẩu đã được thay đổi thành công.');
        }
    }
}
