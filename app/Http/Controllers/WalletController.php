<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Controller;
use App\Models\Account;
use App\Models\Wallet;
use App\Models\WalletTransaction;
use App\Models\UserInfo;

class WalletController extends Controller
{
    /**
     * Gắn middleware auth để đảm bảo chỉ người dùng đã đăng nhập có thể truy cập
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function showWallet()
    {
        // Lấy thông tin tài khoản người dùng hiện tại
        $account = Account::find(Auth::id());
        $userinfo = UserInfo::where('accountid', Auth::id())->first();
        // Lấy thông tin ví tiền của người dùng
        $wallet = Wallet::where('accountid', Auth::id())->first();
        $wallettransaction = WalletTransaction::where('wallet_id', $wallet->id)->get();
        // Trả về view kèm dữ liệu
        return view('wallet', compact('account','userinfo', 'wallet','wallettransaction'));
    }
    /**
     * Xử lý nạp tiền vào ví
     */
    public function depositMoney(Request $request)
    {
        $amount = $request->query('amount');
        $orderCode = $request->query('orderCode');
        $status = $request->query('status');
        if ($status === 'PAID') {
            // Lấy ví của người dùng
            $wallet = Wallet::where('accountid', Auth::id())->first();

            // Thực hiện nạp tiền vào ví
            $wallet->deposit($amount);

            // Lưu giao dịch nạp tiền vào bảng giao dịch
            WalletTransaction::create([
                'wallet_id' => $wallet->id,
                'type' => 'deposit',
                'amount' => $amount,
                'description' => 'Nạp tiền vào ví',
            ]);

            // Quay lại trang ví với thông báo thành công
            return redirect()->route('wallet')->with('success', 'Nạp tiền thành công!');
        }
        return redirect()->route('wallet')->with('error', 'Giao dịch không thành công!');
    }
}