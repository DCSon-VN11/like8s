<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;
    protected $table = 'service';
    protected $fillable = ['id','name', 'servicetypeid', 'platformid', 'price', 'state'];

    public function serviceType()
    {
        return $this->belongsTo(ServiceType::class, 'servicetypeid');
    }

    public function platform()
    {
        return $this->belongsTo(Platform::class, 'platformid');
    }
}