<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;

Route::get('/home', function () {
    return view('dashboards');
});
Route::redirect('/', '/home');
Route::get('/lien-he', function () {
    return view('lien-he');
});
Route::get('/tai-khoan', function () {
    return view('tai-khoan');
});
Route::get('/nhat-ky-hoat-dong', function () {
    return view('activity-log');
});
Route::get('/like-facebook', function () {
    return view('facebook/facebook-like');
});
Route::get('/follow-facebook', function () {
    return view('facebook/facebook-follow');
});
Route::get('/like-page-facebook', function () {
    return view('facebook/facebook-like-page');
});
Route::get('/share-facebook', function () {
    return view('facebook/facebook-share');
});
Route::get('/like-comment-facebook', function () {
    return view('facebook/facebook-like-comment');
});
Route::get('/mem-group', function () {
    return view('facebook/mem-group');
});
Route::get('/like-instagram', function () {
    return view('instagram/instagram-like');
});
Route::get('/follow-instagram', function () {
    return view('instagram/instagram-follow');
});
Route::get('/vip-like-instagram', function () {
    return view('instagram/instagram-vip-like');
});
Route::get('/like-tiktok', function () {
    return view('tiktok/tiktok-like');
});
Route::get('/follow-tiktok', function () {
    return view('tiktok/tiktok-follow');
});
Route::get('/dang-nhap', [LoginController::class, 'showLoginForm'])->name('login'); // Route để hiển thị form đăng nhập
Route::post('/dang-nhap', [LoginController::class, 'login']); // Route để xử lý đăng nhập
Route::post('/dang-xuat', [LoginController::class, 'logout'])->name('logout'); // Route để xử lý đăng xuất
Route::get('/dang-ky', [RegisterController::class, 'showRegisterForm'])->name('register');
Route::post('/dang-ky', [RegisterController::class, 'register'])->name('register');