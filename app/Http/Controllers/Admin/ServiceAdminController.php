<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Controller;
use App\Models\UserInfo;
use App\Models\Account;
use App\Models\Service;
use App\Models\Platform;
use App\Models\ServiceType;
use Illuminate\Http\Request;

class ServiceAdminController extends Controller
{
    /**
     * Gắn middleware auth để kiểm tra đăng nhập
     */
    public function __construct()
    {
        $this->middleware('auth'); // Đảm bảo chỉ người dùng đã đăng nhập mới có thể truy cập
    }
    public function showService()
    {
        // Lấy thông tin tài khoản người dùng hiện tại
        $account = Account::find(Auth::id());

        // Lấy thông tin người dùng từ bảng UserInfo
        $userinfo = UserInfo::where('accountid', Auth::id())->first();

        $service = Service::with('ServiceType', 'Platform')->paginate(5);

        $platform = Platform::all();
        $servicetype = ServiceType::all();
        return view(
            'admin/service',
            compact(
                'account',
                'userinfo',
                'service',
                'platform',
                'servicetype'
            )
        );
    }
    public function search(Request $request)
    {
        // Lấy thông tin tài khoản người dùng hiện tại
        $account = Account::find(Auth::id());
        $platform = Platform::all();
        $servicetype = ServiceType::all();
        // Lấy thông tin người dùng từ bảng UserInfo
        $userinfo = UserInfo::where('accountid', Auth::id())->first();
        $query = Service::with('ServiceType', 'Platform');

        if ($request->has('search') && $request->search != '') {
            $search = $request->search;

            $query->where('name', 'like', '%' . $search . '%')
                ->orWhereHas('servicetype', function ($q) use ($search) {
                    $q->where('name', 'like', '%' . $search . '%');
                })
                ->orWhereHas('platform', function ($q) use ($search) {
                    $q->where('name', 'like', '%' . $search . '%');
                })
                ->orWhere('price', 'like', '%' . $search . '%')
                ->orWhere('state', 'like', '%' . $search . '%');
        }
        $service = $query->paginate(5)->appends($request->query());
        // Trả về view với dữ liệu phân trang
        return view(
            'admin/service',
            compact(
                'account',
                'userinfo',
                'service',
                'platform',
                'servicetype'
            )
        );
    }
    public function servicestate(Request $request)
    {
        // Tìm dịch vụ theo ID
        $service = Service::find($request->id);

        // Cập nhật trạng thái của dịch vụ
        $service->state = ($request->state == 1) ? 0 : 1;
        $service->save();

        // Kiểm tra nếu dịch vụ thuộc nền tảng nào
        $platform = Platform::find($service->platformid);

        if ($platform) {
            // Kiểm tra nếu còn dịch vụ nào có cùng nền tảng và có trạng thái là 1
            $remainingActiveService = Service::where('platformid', $platform->id)
                ->where('state', 1)
                ->exists();

            // Nếu còn ít nhất một dịch vụ đang hoạt động, cập nhật trạng thái của nền tảng là 1
            if ($remainingActiveService) {
                $platform->state = 1; // Đặt trạng thái của nền tảng là 1 nếu có dịch vụ hoạt động
            } else {
                $platform->state = 0; // Nếu không còn dịch vụ nào hoạt động, đặt trạng thái là 0
            }

            // Lưu thay đổi cho nền tảng
            $platform->save();
        }

        // Quay lại trang trước
        return redirect()->back();
    }
    public function platformstate(Request $request)
    {
        // Tìm nền tảng theo ID
        $platform = Platform::find($request->id);

        // Cập nhật trạng thái của nền tảng
        $platform->state = ($request->state == 1) ? 0 : 1;
        $platform->save();

        // Cập nhật trạng thái của tất cả các dịch vụ có liên quan đến nền tảng đó
        $services = Service::where('platformid', $platform->id)->get();
        foreach ($services as $service) {
            // Cập nhật trạng thái dịch vụ theo trạng thái của nền tảng
            $service->state = $platform->state;
            $service->save();
        }

        // Quay lại trang trước
        return redirect()->back();
    }
    public function addplatform(Request $request){
        $platform = new Platform();
        $platform->name= $request->name;
        $platform->save();
        return redirect()->back()->with('success', 'Nền tảng đã được thêm thành công!');
    }
    public function addservice(Request $request){
        $service = new Service();
        $service->name = $request->name;
        $service->servicetypeid = $request->servicetypeid;
        $service->platformid = $request->platformid;
        $service->price = $request->price;
        $service->save();
        return redirect()->back()->with('success', 'Dịch vụ mới đã được thêm thành công!');
    }
    public function editservice(Request $request){
        $service = Service::find($request->id);
        $service->name = $request->name;
        $service->servicetypeid = $request->servicetypeid;
        $service->platformid = $request->platformid;
        $service->price = $request->price;
        $service->save();
        return redirect()->back()->with('success', 'Sửa thông tin dịch vụ thành công!');
    }
}
