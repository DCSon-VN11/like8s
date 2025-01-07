<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Controller;
use App\Models\Account;
use App\Models\UserInfo;
use App\Models\Wallet;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;


class AccountController extends Controller
{
    /**
     * Gắn middleware auth để đảm bảo chỉ người dùng đã đăng nhập có thể truy cập
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function showAccount()
    {
        // Lấy thông tin tài khoản người dùng hiện tại
        $account = Account::find(Auth::id());
        $userinfo = UserInfo::where('accountid', Auth::id())->first();

        // Lấy thông tin ví tiền của người dùng
        $wallet = Wallet::where('accountid', Auth::id())->first();
        // Trả về view kèm dữ liệu
        return view('tai-khoan', compact('account', 'wallet', 'userinfo'));
    }
    public function updateInfo(Request $request)
    {

        // Lấy thông tin người dùng hiện tại
        $accountId = Auth::id();

        // Cập nhật hoặc tạo mới UserInfo
        $userInfo = UserInfo::updateOrCreate(
            ['accountid' => $accountId], // Điều kiện tìm kiếm
            [
                'name' => $request->input('name'), // Dữ liệu cần cập nhật
                'phone' => $request->input('phone'),
            ]
        );

        // Kiểm tra xem việc cập nhật/tạo mới có thành công không
        if ($userInfo) {
            return redirect()->back()->with('success', 'Thông tin đã được cập nhật thành công.');
        } else {
            return redirect()->back()->with('error', 'Đã xảy ra lỗi khi cập nhật thông tin.');
        }
    }
    public function updateAvatar(Request $request)
    {
        // Kiểm tra và xác thực tệp avatar
        $request->validate([
            'avatar' => 'required|image|mimes:jpeg,png,jpg,gif', // Thêm giới hạn dung lượng tệp
        ]);

        // Lấy người dùng hiện tại
        $user = UserInfo::where('accountid', Auth::id())->first();

        // Nếu chưa có UserInfo, tạo mới
        if (!$user) {
            $user = new UserInfo();
            $user->accountid = Auth::id();
        }

        // Kiểm tra và xóa avatar cũ nếu có
        if ($user->avatar && Storage::exists('public/image/' . $user->avatar)) {
            Storage::delete('public/image/' . $user->avatar);
        }

        // Lưu avatar mới
        if ($request->hasFile('avatar')) {
            $avatar = $request->file('avatar');
            $avatarName = time() . '.' . $avatar->getClientOriginalExtension();

            // Lưu avatar vào thư mục public/image
            $avatar->move(public_path('image'), $avatarName);

            // Cập nhật thông tin avatar
            $user->avatar = $avatarName;
            $user->save();

            return back()->with('success', 'Avatar đã được cập nhật thành công!');
        }

        return back()->with('error', 'Có lỗi xảy ra khi tải lên avatar.');
    }
    // Gửi email xác thực
    public function sendVerificationEmail(Request $request)
    {
        // Lấy thông tin tài khoản người dùng hiện tại
        $account = Account::find(Auth::id());
        // Lấy người dùng hiện tại
        $user = UserInfo::where('accountid', Auth::id())->first();

        // Kiểm tra mật khẩu
        if (!Hash::check($request->confirmemailpassword1, $account->password)) {
            return back()->with('erroremail', 'Mật khẩu không đúng.');
        }

        // Kiểm tra xem email đã xác thực chưa
        if ($user->verified_at) {
            return back()->with('messageemail', 'Email của bạn đã được xác thực.');
        }

        // Tạo token xác thực
        $token = Str::random(32);

        // Lưu token vào bảng userinfo
        $user->email = $request->emailaddress;
        $user->token = $token;
        $user->save();

        // Gửi email xác thực
        $verifyLink = route('verify.email', ['token' => $token]);
        try {
            Mail::raw("Nhấp vào liên kết sau để xác thực email: $verifyLink", function ($message) use ($request) {
                $message->to($request->emailaddress)
                    ->subject('Xác thực email của bạn');
            });
        } catch (\Exception $e) {
            return back()->with('erroremail', 'Không thể gửi email: ' . $e->getMessage());
        }


        return back()->with('messageemail', 'Liên kết xác thực đã được gửi đến email của bạn.');
    }

    // Xử lý xác thực email
    public function verifyEmail($token)
    {
        // Tìm user theo token
        $user = UserInfo::where('token', $token)->first();

        if (!$user) {
            $user->email = null;
            $user->token = null;
            $user->save();
            return redirect('/tai-khoan')->with('erroremail', 'Liên kết xác thực không hợp lệ.');
        }

        // Cập nhật trạng thái đã xác thực
        $user->verified_at = now();
        $user->token = null;
        $user->save();

        return redirect('/tai-khoan')->with('messageemail', 'Email của bạn đã được xác thực thành công.');
    }
    public function chancePassword(Request $request)
    {
        $request->validate([
            'password_old' => 'required',
            'password_new' => 'required|min:6',
            'password_confirm' => 'required|min:6',
        ]);
        if ($request->password_new != $request->password_confirm) {
            return back()->with('errorpass', 'Mật khẩu không trùng khớp.');
        } else {
            // Lấy thông tin tài khoản người dùng hiện tại
            $account = Account::find(Auth::id());

            if (!Hash::check($request->password_old, $account->password)) {
                return back()->with('errorpass', 'Mật khẩu hiện tại không chính xác.');
            }

            $account->password = Hash::make($request->password_new);
            $account->save();

            return back()->with('messagepass', 'Mật khẩu đã được thay đổi thành công.');
        }
    }
}
