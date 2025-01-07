<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = 'order';

    protected $fillable = ['accountid','object_id', 'serviceid', 'amount', 'money', 'note', 'state'];

    public function account()
    {
        return $this->belongsTo(Account::class, 'accountid');
    }

    public function service()
    {
        return $this->belongsTo(Service::class, 'serviceid');
    }
}
