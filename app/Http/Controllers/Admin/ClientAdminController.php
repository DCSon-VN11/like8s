<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Controller;
use App\Models\UserInfo;
use App\Models\Account;
use Illuminate\Http\Request;

class ClientAdminController extends Controller
{
    /**
     * Gắn middleware auth để kiểm tra đăng nhập
     */
    public function __construct()
    {
        $this->middleware('auth'); // Đảm bảo chỉ người dùng đã đăng nhập mới có thể truy cập
    }
    // Hàm chung cho truy vấn khách hàng
    private function getClientQuery()
    {
        return Account::with('userinfo')->where('role', '!=', 'admin');
    }
    // Hiển thị danh sách khách hàng
    public function showClient()
    {
        $account = Account::find(Auth::id());
        $userinfo = UserInfo::where('accountid', Auth::id())->first();

        $client = $this->getClientQuery()->paginate(5);

        return view('admin/client', compact('account', 'userinfo', 'client'));
    }

    // Cập nhật trạng thái tài khoản
    public function clientstate(Request $request)
    {
        $account = Account::find($request->id);

        // Kiểm tra trạng thái hợp lệ
        if ($account && in_array($request->state, ['active', 'inactive'])) {
            $account->state = ($request->state === 'active') ? 'inactive' : 'active';
            $account->save();
        }

        return redirect()->back();
    }

    // Tìm kiếm khách hàng
    public function search(Request $request)
    {
        $account = Account::find(Auth::id());
        $userinfo = UserInfo::where('accountid', Auth::id())->first();

        $query = $this->getClientQuery();

        if ($request->has('search') && !empty($request->search)) {
            $search = $request->search;

            $query->where(function ($q) use ($search) {
                $q->where('username', 'like', '%' . $search . '%')
                    ->orWhereHas('userinfo', function ($subQuery) use ($search) {
                        $subQuery->where('name', 'like', '%' . $search . '%')
                            ->orWhere('phone', 'like', '%' . $search . '%')
                            ->orWhere('email', 'like', '%' . $search . '%');
                    })
                    ->orWhere('state', 'like', '%' . $search . '%');
            });
        }

        $client = $query->paginate(5)->appends($request->query());

        return view('admin/client', compact('account', 'userinfo', 'client'));
    }
}
