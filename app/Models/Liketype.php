<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Liketype extends Model
{
    use HasFactory;
    protected $table = 'liketype';
    protected $fillable = ['name', 'image'];
}
