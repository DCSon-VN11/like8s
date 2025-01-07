<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Controller;
use App\Models\UserInfo;
use App\Models\Account;
use App\Models\Order;
use App\Models\WalletTransaction;
use Carbon\Carbon;

class DashboardAdminController extends Controller
{
    /**
     * Gắn middleware auth để kiểm tra đăng nhập
     */
    public function __construct()
    {
        $this->middleware('auth'); // Đảm bảo chỉ người dùng đã đăng nhập mới có thể truy cập
    }
    public function showDashboard()
    {
        // Lấy thông tin tài khoản người dùng hiện tại
        $account = Account::find(Auth::id());

        // Lấy thông tin người dùng từ bảng UserInfo
        $userinfo = UserInfo::where('accountid', Auth::id())->first();

        // Lấy ngày và tháng hiện tại
        $today = Carbon::now()->startOfDay(); // Bắt đầu của ngày hiện tại
        $startOfMonth = Carbon::now()->startOfMonth(); // Bắt đầu của tháng hiện tại
        $endOfMonth = Carbon::now()->endOfMonth(); // Kết thúc của tháng hiện tại

        // Lấy tất cả đơn hàng trong ngày hiện tại
        $ordersToday = Order::with('service.servicetype', 'service.platform', 'account.userinfo')
            ->whereDate('created_at', $today)
            ->paginate(5);

        // Lấy tất cả đơn hàng trong tháng hiện tại
        $ordersThisMonth = Order::whereBetween('created_at', [$startOfMonth, $endOfMonth])->get();

        // Tổng số tiền nạp vào ví trong ngày hiện tại
        $totalToday = WalletTransaction::where('type', 'deposit') // Loại giao dịch là "nạp tiền"
            ->whereDate('created_at', $today)
            ->sum('amount'); // Tính tổng số tiền

        // Tổng số tiền nạp vào ví trong tháng hiện tại
        $totalThisMonth = WalletTransaction::where('type', 'deposit')
            ->whereBetween('created_at', [$startOfMonth, $endOfMonth])
            ->sum('amount');

        return view(
            'admin/index',
            compact(
                'totalToday',
                'totalThisMonth',
                'ordersToday',
                'ordersThisMonth',
                'account',
                'userinfo'
            )
        );
    }
}
