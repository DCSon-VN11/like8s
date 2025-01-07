<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class WalletTransaction extends Model
{
    use HasFactory;

    // Tên bảng trong database (nếu không theo chuẩn mặc định của Laravel)
    protected $table = 'wallet_transaction';

    // Các cột có thể được gán giá trị trực tiếp
    protected $fillable = ['wallet_id', 'type', 'amount', 'description'];

    /**
     * Quan hệ nhiều-một (Transaction thuộc về một Wallet)
     */
    public function wallet()
    {
        return $this->belongsTo(Wallet::class, 'wallet_id');
    }
}
