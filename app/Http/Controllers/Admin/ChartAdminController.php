<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Controller;
use App\Models\UserInfo;
use App\Models\Account;
use App\Models\Order;
use App\Models\WalletTransaction;
use App\Models\Platform;
use Carbon\Carbon;

class ChartAdminController extends Controller
{
    /**
     * Gắn middleware auth để kiểm tra đăng nhập
     */
    public function __construct()
    {
        $this->middleware('auth'); // Đảm bảo chỉ người dùng đã đăng nhập mới có thể truy cập
    }
    public function showChart()
    {
        $account = Account::find(Auth::id());
        $userinfo = UserInfo::where('accountid', Auth::id())->first();
        // Get the start and end of the current month
        $startOfMonth = Carbon::now()->startOfMonth();
        $endOfMonth = Carbon::now()->endOfMonth();

        // Get the start and end of the current year
        $startOfYear = Carbon::now()->startOfYear();
        $endOfYear = Carbon::now()->endOfYear();

        // Get the current date
        $today = Carbon::today()->day;

        // Scale the deposit amounts by dividing by 100,000
        $dailyTransactions = WalletTransaction::where('created_at', '>=', $startOfMonth)
            ->where('created_at', '<=', $endOfMonth)
            ->where('type', 'deposit')
            ->selectRaw('DATE(created_at) as date, SUM(amount) as amount') // Divide by 100,000
            ->groupBy('date')
            ->orderBy('date')
            ->take($today) // Limit to the current day
            ->get();

        $dailyOrders = Order::where('created_at', '>=', $startOfMonth)
            ->where('created_at', '<=', $endOfMonth)
            ->selectRaw('DATE(created_at) as date, COUNT(*) as orders')
            ->groupBy('date')
            ->orderBy('date')
            ->take($today) // Limit to the current day
            ->get();
        $platformOrders = Platform::query()
            ->leftJoin('service', 'platform.id', '=', 'service.platformid')
            ->leftJoin('order', 'service.id', '=', 'order.serviceid')
            ->selectRaw('platform.name as platform, COUNT(order.id) as orders')
            ->where(function ($query) use ($startOfMonth, $endOfMonth) {
                $query->whereBetween('order.created_at', [$startOfMonth, $endOfMonth])
                    ->orWhereNull('order.id'); // Giữ các nền tảng không có đơn hàng
            })
            ->groupBy('platform.id')
            ->orderByDesc('orders')
            ->get();


        // Fetch monthly orders for the current year, grouped by month
        $monthlyOrders = Order::where('created_at', '>=', $startOfYear)
            ->where('created_at', '<=', $endOfYear)
            ->selectRaw('MONTH(created_at) as month, COUNT(*) as orders')
            ->groupBy('month')
            ->orderBy('month')
            ->get();

        // Fetch wallet transactions of type 'deposit' for the current year, grouped by month
        $monthlyTransactions = WalletTransaction::where('created_at', '>=', $startOfYear)
            ->where('created_at', '<=', $endOfYear)
            ->where('type', 'deposit')  // Only 'deposit' transactions
            ->selectRaw('MONTH(created_at) as month, SUM(amount) as amount')
            ->groupBy('month')
            ->orderBy('month')
            ->get();
        // Return the data to the view or JSON response
        return view(
            'admin/chart',
            compact(
                'account',
                'userinfo',
                'dailyOrders',
                'dailyTransactions',
                'monthlyOrders',
                'monthlyTransactions',
                'platformOrders'
            )
        );
    }
}
