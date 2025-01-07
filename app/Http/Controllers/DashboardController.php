<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Controller;
use App\Models\UserInfo;
use App\Models\Account;
use App\Models\Order;
use App\Models\Wallet;
use App\Models\WalletTransaction;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Gắn middleware auth để kiểm tra đăng nhập
     */
    public function __construct()
    {
        $this->middleware('auth'); // Đảm bảo chỉ người dùng đã đăng nhập mới có thể truy cập
    }

    /**
     * Hiển thị Dashboard
     */
    public function showDashboard(Request $request)
    {
        // Lấy thông tin tài khoản người dùng hiện tại
        $account = Account::find(Auth::id());

        // Lấy thông tin người dùng từ bảng UserInfo
        $userinfo = UserInfo::where('accountid', Auth::id())->first();

        // Lấy tất cả đơn hàng của người dùng và liên kết với service, servicetype, và platform
        $orders = Order::with('service.servicetype', 'service.platform')
            ->where('accountid', Auth::id())
            ->get();

        // Lọc số lượng đơn hàng Facebook trong ngày hôm nay
        $facebookOrdersToday = $orders->filter(function ($order) {
            return optional($order->service->platform)->name === 'Facebook'
                && $order->created_at->isToday();
        })->count();

        // Lọc số lượng đơn hàng Instagram trong ngày hôm nay
        $instagramOrdersToday = $orders->filter(function ($order) {
            return optional($order->service->platform)->name === 'Instagram'
                && $order->created_at->isToday();
        })->count();

        // Lọc số lượng đơn hàng Tiktok trong ngày hôm nay
        $tiktokOrdersToday = $orders->filter(function ($order) {
            return optional($order->service->platform)->name === 'Tiktok'
                && $order->created_at->isToday();
        })->count();

        // Tính tổng số tiền đơn hàng trong ngày hôm nay
        $totalAmountToday = $orders->filter(function ($order) {
            return $order->created_at->isToday();
        })->sum('money'); // Tổng tiền đơn hàng hôm nay

        // Tính tổng số tiền đơn hàng trong tháng
        $totalAmountThisMonth = $orders->filter(function ($order) {
            return $order->created_at->isCurrentMonth();
        })->sum('money'); // Tổng tiền đơn hàng trong tháng

        // Lấy thông tin ví tiền của người dùng
        $wallet = Wallet::where('accountid', Auth::id())->first();

        // Kiểm tra nếu ví không tồn tại, trả về thông báo hoặc giá trị mặc định
        if (!$wallet) {
            $totalDepositThisMonth = 0;
        } else {
            // Tính tổng số tiền nạp vào ví trong tháng
            $totalDepositThisMonth = WalletTransaction::where('wallet_id', $wallet->id)
                ->where('type', 'deposit') // Giả sử kiểu giao dịch "deposit" là nạp tiền vào ví
                ->whereMonth('created_at', now()->month) // Lọc giao dịch trong tháng này
                ->sum('amount'); // Tổng số tiền nạp vào ví trong tháng
        }

        // Mặc định lấy dữ liệu từ 60 ngày trước đến ngày hiện tại
        $endDate = $request->input('end_date') ?: now()->format('Y-m-d');
        $startDate = $request->input('start_date') ?: now()->subDays(29)->format('Y-m-d');

        // Kiểm tra khoảng thời gian vượt quá 60 ngày
        $dateDiff = (new \DateTime($startDate))->diff(new \DateTime($endDate))->days;
        if ($dateDiff > 60) {
            return back()->with('warning', 'Khoảng thời gian không được vượt quá 60 ngày.');
        }

        // Lấy đơn hàng trong khoảng thời gian
        $orders = Order::where('accountid', Auth::id())
            ->whereBetween('created_at', ["$startDate 00:00:00", "$endDate 23:59:59"])
            ->get();

        // Lấy giao dịch ví trong khoảng thời gian
        $wallet = Wallet::where('accountid', Auth::id())->first();
        $transactions = WalletTransaction::where('wallet_id', $wallet->id ?? 0)
            ->whereBetween('created_at', ["$startDate 00:00:00", "$endDate 23:59:59"])
            ->get();

        // Nhóm dữ liệu theo ngày
        $ordersByDate = $orders->groupBy(function ($order) {
            return $order->created_at->format('Y-m-d');
        });
        $transactionsByDate = $transactions->groupBy(function ($transaction) {
            return $transaction->created_at->format('Y-m-d');
        });

        // Tổng số dịch vụ đã sử dụng
        $totalServicesUsed = $orders->count();

        // Tổng số tiền nạp vào ví
        $totalDeposited = $transactions
            ->where('type', 'deposit') // Lọc giao dịch "deposit"
            ->sum('amount'); // Tổng tiền (sum trả về int hoặc float)
        $totalDeposited = floatval($totalDeposited); // Chuyển về float

        // Tổng số tiền đã tiêu phí
        $totalSpent = $orders->sum('money'); // Tổng tiền đơn hàng (sum trả về int hoặc float)
        $totalSpent = floatval($totalSpent); // Chuyển về float

        // Chuẩn bị dữ liệu cho biểu đồ
        $categories = [];
        $servicesUsed = [];
        $totalDepositedChart = [];
        $totalSpentChart = [];

        $period = new \DatePeriod(
            new \DateTime($startDate),
            new \DateInterval('P1D'),
            (new \DateTime($endDate))->modify('+1 day')
        );

        foreach ($period as $date) {
            $day = $date->format('Y-m-d');
            $categories[] = $date->format('d/m');

            // Tổng số dịch vụ đã sử dụng trong ngày
            $servicesUsed[] = isset($ordersByDate[$day]) ? $ordersByDate[$day]->count() : 0;

            // Tổng số tiền nạp vào ví trong ngày
            $totalDepositedChart[] = isset($transactionsByDate[$day])
                ? $transactionsByDate[$day]->where('type', 'deposit')->sum('amount')
                : 0;

            // Tổng số tiền đã tiêu phí trong ngày
            $totalSpentChart[] = isset($ordersByDate[$day])
                ? $ordersByDate[$day]->sum('money')
                : 0;
        }
        $ordersToday = Order::with('service.servicetype', 'service.platform')
            ->where('accountid', Auth::id())
            ->whereDate('created_at', now()) // Lọc theo ngày hôm nay
            ->get();

        $servicesToday = $ordersToday->groupBy(function ($order) {
            return optional($order->service->platform)->name;
        })->map(function ($group, $platform) {
            return $group->groupBy(function ($order) {
                return optional($order->service->servicetype)->name ?: 'Không xác định';
            })->map(function ($typeGroup, $type) use ($platform) {
                return [
                    'platform' => $platform ?: 'Không xác định',
                    'serviceType' => $type,
                    'orderCount' => $typeGroup->count(),
                    'totalAmount' => $typeGroup->sum('money'),
                ];
            })->values();
        })->flatten(1)->toArray();


        // Trả về view dashboard và truyền dữ liệu
        return view(
            'dashboards',
            compact(
                'account',
                'userinfo',
                'orders',
                'wallet',
                'facebookOrdersToday',
                'instagramOrdersToday',
                'tiktokOrdersToday',
                'totalAmountToday',
                'totalAmountThisMonth',
                'totalDepositThisMonth',
                'totalServicesUsed',
                'totalDeposited',
                'totalSpent',
                'servicesToday'
            )
        )->with([
            'chartData' => [
                'categories' => $categories,
                'services_used' => $servicesUsed,
                'total_deposited' => $totalDepositedChart,
                'total_spent' => $totalSpentChart,
            ],
            'startDate' => $startDate,
            'endDate' => $endDate,
        ]);
    }
}
