<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
<<<<<<< HEAD
=======
use App\Models\Order;
>>>>>>> aya

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
        //
=======
        return Order::all();
>>>>>>> aya
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
<<<<<<< HEAD
    public function create()
    {
        //
    }
=======
>>>>>>> aya

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
<<<<<<< HEAD
        //
=======
        $Order=new Order();
        $Order->user_id=$request->user_id;
        // $Order->payment_id=$request->payment_id;
        $Order->save();
        return "Done";
>>>>>>> aya
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
<<<<<<< HEAD
        //
=======
        if (Order::find($id))
       return Order::find($id);
       else
       return "there is no order with this id";
>>>>>>> aya
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
<<<<<<< HEAD
    public function edit($id)
    {
        //
    }
=======

>>>>>>> aya

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
<<<<<<< HEAD
        //
=======
        if(Order::find($id)){
            $Order=Order::find($id);
            $Order->user_id=$request->user_id;
            // $Order->payment_id=$request->payment_id;
            $Order->save();
            return "updated";
            }
            else{
                return "There is no order with this id";
            }
>>>>>>> aya
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
<<<<<<< HEAD
        //
=======
        if(Order::find($id)){
            Order::destroy($id);
            return "Deleted";
            }
            else
            return "There is no order with this id";
>>>>>>> aya
    }
}
