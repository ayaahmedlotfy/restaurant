<?php

namespace App\Http\Controllers;

use App\Notifications\orderOperations;
use Illuminate\Support\Facades\Notification;
use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Order::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $Order=new Order();
        $Order->user_id=$request->auth('api')->user();
        // $Order->payment_id=$request->payment_id;
        $Order->save();
        $OrderData=[
            'body'=>"The order has been created",
            'orderText'=>"your order will be shipped",
            // 'url'=>"/foods",
            'Thankyou'=>"Thank you for making order",
            'user_id'=>auth('api')->user()->id
        ];
        (auth('api')->user())->notify(new orderCreated($OrderData));
        // Notifications::sendNow((auth('api')->user()),new orderCreated($OrderData));
        return "Done";
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (Order::find($id))
       return Order::find($id);
       else
       return "there is no order with this id";
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if(Order::find($id)){
            $Order=Order::find($id);
            $Order->user_id=$request->user_id;
            // $Order->payment_id=$request->payment_id;
            $Order->save();
            $OrderData=[
                'body'=>"The order has been updated",
                'orderText'=>"you will get your order as you updated it",
                'url'=>"/foods",
                'Thankyou'=>"Thank you"
            ];
            Notifications::sendNow((auth('api')->user()),new orderOperations($OrderData));
            return "updated";
            }
            else{
                return "There is no order with this id";
            }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Order::find($id)){
            Order::destroy($id);
            $OrderData=[
                'body'=>"The order has been cancelled",
                'orderText'=>"your order has been cancelled",
                'url'=>"/foods",
                'Thankyou'=>"Thank you"
            ];
            Notifications::sendNow((auth('api')->user()),new orderOperations($OrderData));
            return "Deleted";
            }
            else
            return "There is no order with this id";
    }
}
