<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    protected $fillable = ['total_price','payment_type'];


    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
