<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
<<<<<<< HEAD
=======
use App\Models\Delivery;
>>>>>>> aya

class DeliveryController extends Controller
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
        return Delivery::all();
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
    }

=======
        $delivery = new Delivery();
        $delivery->departure_time=$request->departure_time;
        $delivery->arrival=$request->arrival;
        $delivery->order_id=$request->order_id;
        $delivery->save();
        return "stored dellivery";
    }


>>>>>>> aya
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
        if(Delivery::find($id))
        return Delivery::find($id);
        else
        return "There is no Delivery with this id";
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
    }

=======

        $delivery = Delivery::find($id);
        $delivery->departure_time=$request->departure_time;
        $delivery->arrival=$request->arrival;
        $delivery->order_id=$request->order_id;

        $delivery->save();
        return "updated dellivery";

    }


>>>>>>> aya
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
        if(Delivery::find($id)){
        Delivery::destroy($id);
        return "Deleted";
        }
        else
        return "There is no Delivery with this id";
>>>>>>> aya
    }
}
