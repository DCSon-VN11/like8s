<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Controller;
use App\Models\Account;
use App\Models\Order;
use App\Models\Liketype;
use App\Models\Service;
use App\Models\Wallet;
use App\Models\UserInfo;
class ServiceController extends Controller
{
    /**
     * Gắn middleware auth để đảm bảo chỉ người dùng đã đăng nhập có thể truy cập
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function showService($serviceTypeName, $platformName, $viewName)
    {
        // Lấy thông tin tài khoản người dùng hiện tại
        $account = Account::find(Auth::id());
        $userinfo = UserInfo::where('accountid', Auth::id())->first();
        // Lấy thông tin ví tiền của người dùng
        $wallet = Wallet::where('accountid', Auth::id())->first();

        // Lấy danh sách các loại like (nếu có)
        $liketype = Liketype::all();

        // Lấy thông tin dịch vụ theo platform và servicetype
        $service = Service::with(['platform', 'servicetype'])
            ->whereHas('platform', function ($query) use ($platformName) {
                $query->where('name', $platformName);
            })
            ->whereHas('servicetype', function ($query) use ($serviceTypeName) {
                $query->where('name', $serviceTypeName);
            })
            ->get();

        // Lấy danh sách các đơn hàng của người dùng theo platform và servicetype
        $orders = Order::with('service.servicetype', 'service.platform')
            ->where('accountid', Auth::id())
            ->whereHas('service.servicetype', function ($query) use ($serviceTypeName) {
                $query->where('name', $serviceTypeName);
            })
            ->whereHas('service.platform', function ($query) use ($platformName) {
                $query->where('name', $platformName);
            })
            ->get();
        // Trả về view kèm dữ liệu
        return view($viewName, compact('account','userinfo', 'liketype', 'service', 'wallet', 'orders'));
    }
    public function showlikefacebook()
    {
        return $this->showService('like', 'Facebook', 'facebook/facebook-like');
    }
    public function showlikepagefacebook()
    {
        return $this->showService('like page', 'Facebook', 'facebook/facebook-like-page');
    }
    public function showlikecommentfacebook()
    {
        return $this->showService('like comment', 'Facebook', 'facebook/facebook-like-comment');
    }
    public function showfollowfacebook()
    {
        return $this->showService('follow', 'Facebook', 'facebook/facebook-follow');
    }
    public function showsharefacebook()
    {
        return $this->showService('share', 'Facebook', 'facebook/facebook-share');
    }
    public function showjoingroupfacebook()
    {
        return $this->showService('join_group', 'Facebook', 'facebook/mem-group');
    }
    public function showlikeinstagram()
    {
        return $this->showService('like', 'Instagram', 'instagram/instagram-like');
    }
    public function showfollowinstagram()
    {
        return $this->showService('follow', 'Instagram', 'instagram/instagram-follow');
    }
    public function showliketiktok()
    {
        return $this->showService('like', 'Tiktok', 'tiktok/tiktok-like');
    }
    public function showfollowtiktok()
    {
        return $this->showService('follow', 'Tiktok', 'tiktok/tiktok-follow');
    }
}
