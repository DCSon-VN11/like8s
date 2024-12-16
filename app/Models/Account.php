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

    protected $fillable = ['username', 'password', 'state', 'role'];

    // Mối quan hệ với bảng userinfo
    public function userInfo()
    {
        return $this->hasOne(UserInfo::class, 'account_id');
    }
}
