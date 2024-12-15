<?php

use Illuminate\Support\Facades\Route;

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
Route::get('/dang-nhap', function () {
    return view('login');
});
Route::redirect('/dang-xuat', '/dang-nhap');
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
Route::get('/dang-ky', function () {
    return view('register');
});