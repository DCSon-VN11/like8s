<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Controller;
use App\Models\UserInfo;
use App\Models\Account;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderAdminController extends Controller
{
    /**
     * Gắn middleware auth để kiểm tra đăng nhập
     */
    public function __construct()
    {
        $this->middleware('auth'); // Đảm bảo chỉ người dùng đã đăng nhập mới có thể truy cập
    }
    public function showOrder()
    {
        // Lấy thông tin tài khoản người dùng hiện tại
        $account = Account::find(Auth::id());

        // Lấy thông tin người dùng từ bảng UserInfo
        $userinfo = UserInfo::where('accountid', Auth::id())->first();

        $order = Order::with('service', 'account')->orderBy('created_at', 'desc')->paginate(5);

        return view(
            'admin/order',
            compact(
                'order',
                'userinfo',
                'account'
            )
        );
    }
    public function search(Request $request)
    {
        // Lấy thông tin tài khoản người dùng hiện tại
        $account = Account::find(Auth::id());
        // Lấy thông tin người dùng từ bảng UserInfo
        $userinfo = UserInfo::where('accountid', Auth::id())->first();
        $stateLabels = [
            1 => 'Đã xác nhận',
            2 => 'Đang xử lý',
            3 => 'Đã hoàn thành',
        ];

        $query = Order::with('service', 'account');

        if ($request->has('search') && $request->search != '') {
            $search = $request->search;

            // Tìm trạng thái tương ứng (không phân biệt hoa thường)
            $stateValue = array_search(mb_strtolower($search), array_map('mb_strtolower', $stateLabels));

            // Áp dụng tìm kiếm
            $query->where(function ($q) use ($search, $stateValue) {
                $q->where('object_id', 'like', '%' . $search . '%') // Tìm kiếm trong 'object_id'
                    ->orWhereHas('service', function ($subQuery) use ($search) {
                        $subQuery->where('name', 'like', '%' . $search . '%'); // Tìm kiếm tên dịch vụ
                    })
                    ->orWhereHas('account', function ($subQuery) use ($search) {
                        $subQuery->where('username', 'like', '%' . $search . '%'); // Tìm kiếm tài khoản
                    })
                    ->orWhere('amount', 'like', '%' . $search . '%') // Tìm kiếm số lượng
                    ->orWhere('note', 'like', '%' . $search . '%') // Tìm kiếm ghi chú
                    ->orWhere('created_at', 'like', '%' . $search . '%'); // Tìm kiếm ngày tạo

                // Nếu trạng thái tìm thấy, thêm điều kiện tìm theo trạng thái
                if ($stateValue !== false) {
                    $q->orWhere('state', $stateValue);
                }
            });
        }
        $order = $query->orderBy('created_at', 'desc')->paginate(5)->appends($request->query());
        // Trả về view với dữ liệu phân trang
        return view(
            'admin/order',
            compact(
                'account',
                'userinfo',
                'order'
            )
        );
    }
    public function editorder(Request $request){
        
    }
}
