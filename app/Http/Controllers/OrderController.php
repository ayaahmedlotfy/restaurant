<?php

namespace App\Http\Controllers;
<<<<<<< HEAD
=======

>>>>>>> 34d88f7eef4f555c7bab8b461a538f00f1b3acad
use App\Notifications\orderOperations;
use Illuminate\Support\Facades\Notification;
use Illuminate\Http\Request;

<<<<<<< HEAD
use  Illuminate\Support\Facades\Auth;
use App\Models\Order;
use App\Models\User;
use  App\Http\Resources\OrderResource;
=======

use App\Models\Order;
use App\Models\User;
>>>>>>> 34d88f7eef4f555c7bab8b461a538f00f1b3acad
class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
<<<<<<< HEAD
        // return Order::all();
        return OrderResource::collection(Order::all());

=======
        return Order::all();
>>>>>>> 34d88f7eef4f555c7bab8b461a538f00f1b3acad
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

<<<<<<< HEAD
        $Order=new Order();
        $Order->user_id=$request->user_id;
        // $user=User::find($request->user_id);
         $Order->save();
        // $OrderData=[
        //     'Hello'=>"Hello from our team we are here to help you",
        //     'username'=>$user['name'],
        //     'id'=>$user['id'],
        //     'orderText'=>"you've created your order and it will be delivered for you soon at ",
        //     'Thankyou'=>"Thank you for making order and your order ID is ",
        //     'order_id'=>$Order['id'],
        // ];
        // $user->notify(new orderOperations($OrderData));
=======

        //

        // $Order=new Order();
        // $Order->user_id=$request->user_id;
        // // $Order->payment_id=$request->payment_id;
        // $Order->save();
        // return "Done";

        $Order=new Order();
        $user=auth('api')->user();
        $Order->user_id=$user['id'];
        $Order->save();
        $OrderData=[
            'Hello'=>"Hello from our team we are here to help you",
            'username'=>$user['name'],
            'id'=>$user['id'],
            'orderText'=>"you've created your order and it will be delivered for you soon",
            'Thankyou'=>"Thank you for making order",
        ];
        $user->notify(new orderOperations($OrderData));
>>>>>>> 34d88f7eef4f555c7bab8b461a538f00f1b3acad
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

        // if(Order::find($id)){
        //     $Order=Order::find($id);
        //     $Order->user_id=$request->user_id;
        //     // $Order->payment_id=$request->payment_id;
        //     $Order->save();

        if(Order::find($id)){
<<<<<<< HEAD
            //$user=User::find(2);
            $user= Auth::user();
=======
            $user=auth('api')->user();
>>>>>>> 34d88f7eef4f555c7bab8b461a538f00f1b3acad
            $Order=Order::find($id);
            $Order->user_id=$user['id'];
            $Order->save();
            $OrderData=[
                'Hello'=>"Hello from our team we are here to help you",
                'username'=>$user['name'],
                'id'=>$user['id'],
                'orderText'=>"you've updated your order and you gonna receive it as as you updated it",
                'Thankyou'=>"Thank you"
            ];
<<<<<<< HEAD
            $user->notify(new orderOperations($OrderData));
=======
            $user->notify(new orderCreated($OrderData));
>>>>>>> 34d88f7eef4f555c7bab8b461a538f00f1b3acad
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

        // if(Order::find($id)){
        //     Order::destroy($id);
        //     return "Deleted";
        //     }
        //     else
        //     return "There is no order with this id";

        if(Order::find($id)){
            Order::destroy($id);
<<<<<<< HEAD
            //$user=User::find(2);
            $user= Auth::user();
=======
            $user=auth('api')->user();
>>>>>>> 34d88f7eef4f555c7bab8b461a538f00f1b3acad
            $OrderData=[
                'Hello'=>"Hello from our team we are here to help you",
                'username'=>$user['name'],
                'id'=>$user['id'],
                'orderText'=>"your order has been cancelled",
                'Thankyou'=>"Thank you"
            ];
<<<<<<< HEAD
            $user->notify(new orderOperations($OrderData));
=======
            $user->notify(new orderCreated($OrderData));
>>>>>>> 34d88f7eef4f555c7bab8b461a538f00f1b3acad
             return "Deleted";
            }
            else
            return "There is no order with this id";
    }
}
