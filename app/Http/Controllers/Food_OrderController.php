<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Models\Food_Order;
class Food_OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
     return Food_Order::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $details=new Food_Order();
        $details->quantity=$request->quantity;
        $details->food_id=$request->food_id;
        $details->order_id=$request->order_id;

        $details->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Food_Order::find($id);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $details = Food_Order::find($id);
        $details->quantity=$request->quantity;
        $details->food_id=$request->food_id;
        $details->order_id=$request->order_id;
        $details->save();
        return "Done";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         Food_Order::destroy($id);
    }
}
