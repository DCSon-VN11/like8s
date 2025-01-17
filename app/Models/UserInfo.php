<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserInfo extends Model
{
    use HasFactory;

    protected $table = 'userinfo';  // Đặt tên bảng nếu khác với tên model

    protected $fillable = ['name', 'email', 'avatar', 'phone', 'accountid','verified_at','token'];

    // Mối quan hệ với bảng account
    public function account()
    {
        return $this->belongsTo(Account::class, 'accountid');
    }
}

