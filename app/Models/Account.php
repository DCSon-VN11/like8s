<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticatableTrait;

class Account extends Model implements Authenticatable
{
    use HasFactory;
    use AuthenticatableTrait;

    protected $table = 'account';  // Đặt tên bảng nếu khác với tên model

    protected $fillable = ['username', 'password', 'state', 'role','created_at','remember_token'];

    // Mối quan hệ với bảng userinfo
    public function userInfo()
    {
        return $this->hasOne(UserInfo::class, 'accountid');
    }
    // Quan hệ với bảng orders
    public function order()
    {
        return $this->hasMany(Order::class, 'accountid');
    }
}
