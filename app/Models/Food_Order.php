<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Food_Order extends Model
{
    use HasFactory;
    protected $table = 'food_order';
    protected $fillable = ['quantity','food_id','order_id'];



    public function foods()
    {
        return $this->hasMany(Food::class);
    }


    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
