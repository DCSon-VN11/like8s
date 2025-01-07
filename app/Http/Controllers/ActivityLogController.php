<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Controller;
use App\Models\Account;
use App\Models\Order;
use App\Models\Wallet;
use App\Models\WalletTransaction;
use App\Models\UserInfo;

class ActivityLogController extends Controller
{
    /**
     * Gắn middleware auth để đảm bảo chỉ người dùng đã đăng nhập có thể truy cập
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function showActivityLog()
    {
        // Lấy thông tin tài khoản người dùng hiện tại
        $account = Account::find(Auth::id());
        $userinfo = UserInfo::where('accountid', Auth::id())->first();
        // Lấy tất cả đơn hàng của người dùng và liên kết với service, servicetype, và platform
        $orders = Order::with('service.servicetype', 'service.platform')
            ->where('accountid', Auth::id())
            ->get()->map(function ($orders) {
                return [
                    'type' => '-',
                    'name' => $orders->service->name,
                    'amount' => $orders->money,
                    'notes' => $orders->note,
                    'created_at' => $orders->created_at,
                ];
            });
        // Lấy thông tin ví tiền của người dùng
        $wallet = Wallet::where('accountid', Auth::id())->first();
        $wallettransaction = WalletTransaction::where('wallet_id', $wallet->id)->get()->map(function ($wallettransaction) {
            return [
                'type' => '+',
                'name' => $wallettransaction->description,
                'amount' => $wallettransaction->amount,
                'notes' => $wallettransaction->type,
                'created_at' => $wallettransaction->created_at,
            ];
        });
        // Gộp dữ liệu từ đơn hàng và giao dịch ví
        $combinedData = $orders->merge($wallettransaction);

        // Sắp xếp dữ liệu theo ngày giảm dần
        $sortedData = $combinedData->sortByDesc('created_at')->values();
        return view(
            'activity-log',
            compact(
                'account',
                'userinfo',
                'sortedData',
                'wallet'
            )
        );
    }
}
