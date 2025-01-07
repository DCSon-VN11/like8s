<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Controller;
use App\Models\Account;
use App\Models\Order;
use App\Models\Wallet;
use App\Models\WalletTransaction;
use App\Models\Service;

use function Laravel\Prompts\note;

class OrderController extends Controller
{
    /**
     * Gắn middleware auth để đảm bảo chỉ người dùng đã đăng nhập có thể truy cập
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function order(Request $request)
    {
        // Tạo đơn hàng cho người dùng đã đăng nhập
        $order = new Order();
        $order->accountid = Auth::id(); // Giả sử người dùng đã đăng nhập
        $order->object_id = $request->input('object_id');
        $order->serviceid = $request->input('package_type');
        $order->amount = $request->input('quantity');
        $order->money = Service::find($request->input('package_type'))->price * $request->input('quantity');
        $order->note = (implode(', ', $request->input('object_type', [])) ? '(' . implode(', ', $request->input('object_type')) . ') ' : '') 
                    . ($request->input('note') ?? '');

        $order->state = 1;
        // Trừ tiền trong ví
        $wallet = Wallet::where('accountid', Auth::id())->first();

        // Trừ tiền trong ví
        $wallet->withdraw($order->money);

        // Thêm giao dịch vào lịch sử ví
        WalletTransaction::create([
            'wallet_id' => $wallet->id,
            'type' => 'payment',
            'amount' => $order->money,
            'description' => 'Thanh toán dịch vụ',
        ]);
        // Lưu đơn hàng
        $order->save();

        return back()->with('success', 'Đơn hàng được tạo thành công!');
    }
}
