<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Wallet extends Model
{
    use HasFactory;

    protected $table = 'wallet';
    protected $fillable = ['accountid', 'balance'];

    /**
     * Quan hệ một-nhiều (Wallet có nhiều giao dịch)
     */
    public function transactions()
    {
        return $this->hasMany(WalletTransaction::class, 'wallet_id');
    }

    /**
     * Quan hệ nhiều-một (Wallet thuộc về một tài khoản)
     */
    public function account()
    {
        return $this->belongsTo(Account::class, 'accountid');
    }

    /**
     * Tăng số dư ví
     *
     * @param float $amount
     * @return void
     */
    public function deposit(float $amount)
    {
        $this->balance += $amount;
        $this->save();
    }

    /**
     * Giảm số dư ví
     *
     * @param float $amount
     * @return bool
     */
    public function withdraw(float $amount): bool
    {
        if ($this->balance >= $amount) {
            $this->balance -= $amount;
            $this->save();
            return true;
        }
        return false;
    }
}
