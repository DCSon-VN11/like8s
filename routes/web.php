<?php

use App\Http\Controllers\ActivityLogController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Admin\DashboardAdminController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\Admin\ServiceAdminController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\Admin\OrderAdminController;
use App\Http\Controllers\WalletController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\Admin\ClientAdminController;
use App\Http\Controllers\Admin\ChartAdminController;
use App\Http\Controllers\Admin\ChancePassAdmin;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\PayOSController;

Route::get('/quen-mat-khau', function(){
    return view('quen-mat-khau');
});
Route::post('forgot-password', [LoginController::class, 'sendVerificationCode'])->name('forgot.password.send');
Route::post('reset-form', [LoginController::class, 'resetForm'])->name('reset-form');
Route::post('reset-password', [LoginController::class, 'resetPassword'])->name('reset-password');

Route::post('/payos/payment', [PayOSController::class, 'createPayment']);
Route::get('/', function () {
    if (!Auth::check()) {
        // Nếu chưa đăng nhập, hiển thị trang index
        return view('index');
    }

    // Kiểm tra vai trò của người dùng
    if (Auth::user()->role === 'admin') {
        // Nếu là admin, chuyển đến route admin
        return redirect()->route('admin');
    }

    // Nếu không phải admin, chuyển đến route home
    return redirect()->route('dashboard');
})->name('index');
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin', [DashboardAdminController::class, 'showDashboard'])->name('admin');
    Route::get('/service', [ServiceAdminController::class, 'showService'])->name('service');
    Route::get('/order', [OrderAdminController::class, 'showOrder'])->name('order');
    Route::get('/client', [ClientAdminController::class, 'showClient'])->name('client');
    Route::get('/chart', [ChartAdminController::class, 'showChart'])->name('chart');
});

Route::post('/chancepassadmin', [ChancePassAdmin::class, 'chancepass'])->name('chancepassadmin');

// Không yêu cầu middleware admin
Route::get('/service', [ServiceAdminController::class, 'search'])->name('servicesearch');
Route::post('/servicestate', [ServiceAdminController::class, 'servicestate'])->name('servicestate');
Route::post('/platformstate', [ServiceAdminController::class, 'platformstate'])->name('platformstate');
Route::post('/addplatform', [ServiceAdminController::class, 'addplatform'])->name('addplatform');
Route::post('/addservice', [ServiceAdminController::class, 'addservice'])->name('addservice');
Route::post('/editservice', [ServiceAdminController::class, 'editservice'])->name('editservice');
Route::get('/order', [OrderAdminController::class, 'search'])->name('ordersearch');
Route::post('/editorder', [OrderAdminController::class, 'editorder'])->name('editorder');
Route::get('/client', [ClientAdminController::class, 'search'])->name('clientsearch');
Route::post('/clientstate', [ClientAdminController::class, 'clientstate'])->name('clientstate');
// Route gửi email xác thực (POST)
Route::post('/verify', [AccountController::class, 'sendVerificationEmail'])->name('verify');

// Route xử lý xác thực email khi người dùng nhấp vào liên kết trong email (GET)
Route::get('/verify-email/{token}', [AccountController::class, 'verifyEmail'])->name('verify.email');

Route::post('/chance-password', [AccountController::class, 'chancePassword'])->name('chance-password');

Route::get('/home', [DashboardController::class, 'showDashboard'])
    ->name('dashboard')
    ->middleware('auth');

Route::get('/lien-he', function () {
    return view('lien-he');
});

Route::get('/tai-khoan', [AccountController::class, 'showAccount'])
    ->name('tai-khoan')
    ->middleware('auth');

Route::get('/nhat-ky-hoat-dong', [ActivityLogController::class, 'showActivityLog'])
    ->name('activity-log')
    ->middleware('auth');

Route::get('/like-facebook', [ServiceController::class, 'showlikefacebook'])
    ->name('facebook-like')
    ->middleware('auth');

Route::get('/follow-facebook', [ServiceController::class, 'showfollowfacebook'])
    ->name('facebook-follow')
    ->middleware('auth');

Route::get('/like-page-facebook', [ServiceController::class, 'showlikepagefacebook'])
    ->name('facebook-like-page')
    ->middleware('auth');

Route::get('/share-facebook', [ServiceController::class, 'showsharefacebook'])
    ->name('facebook-share')
    ->middleware('auth');

Route::get('/like-comment-facebook', [ServiceController::class, 'showlikecommentfacebook'])
    ->name('facebook-like-comment')
    ->middleware('auth');

Route::get('/mem-group', [ServiceController::class, 'showjoingroupfacebook'])
    ->name('mem-group')
    ->middleware('auth');

Route::get('/like-instagram', [ServiceController::class, 'showlikeinstagram'])
    ->name('instagram-like')
    ->middleware('auth');

Route::get('/follow-instagram', [ServiceController::class, 'showfollowinstagram'])
    ->name('instagram-follow')
    ->middleware('auth');

Route::get('/like-tiktok', [ServiceController::class, 'showliketiktok'])
    ->name('tiktok-like')
    ->middleware('auth');

Route::get('/follow-tiktok', [ServiceController::class, 'showfollowtiktok'])
    ->name('tiktok-follow')
    ->middleware('auth');

Route::get('/dang-nhap', [LoginController::class, 'showLoginForm'])->name('login'); // Route để hiển thị form đăng nhập

Route::post('/dang-nhap', [LoginController::class, 'login']); // Route để xử lý đăng nhập

Route::post('/dang-xuat', [LoginController::class, 'logout'])->name('logout'); // Route để xử lý đăng xuất
Route::get('/dang-xuat', [LoginController::class, 'logout'])->name('logout');
Route::get('/dang-ky', [RegisterController::class, 'showRegisterForm'])->name('register');

Route::post('/dang-ky', [RegisterController::class, 'register'])->name('register');

Route::post('/order', [OrderController::class, 'order'])->name('order');

Route::get('/order/success', function () {
    return view('order.success');
})->name('order.success');

Route::get('/vi-tien', [WalletController::class, 'showWallet'])
    ->name('wallet')
    ->middleware('auth');

Route::post('/vi-tien', [WalletController::class, 'depositMoney'])->name('nap-tien');
//Route::get('/nap-tien', [WalletController::class, 'depositMoney'])->name('nap-tien');

Route::post('/updateInfo', [AccountController::class, 'updateInfo'])->name('updateInfo');

Route::post('/updateAvatar', [AccountController::class, 'updateAvatar'])->name('updateAvatar');
