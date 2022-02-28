<?php

namespace App\Http\Controllers;
use App\Notifications\orderCreated;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Notification;
class OrderCreatedController extends Controller
{
    public function sendTextNotification(){
    $OrderData=[
        'body'=>"Yoy receive that the order has been made",
        'orderText'=>"your order has been shipped",
        'url'=>"/foods",
        'Thankyou'=>"Thank you for making order"
    ];
    Notifications::send((auth('api')->user()),new orderCreated($OrderData));
    }
}
