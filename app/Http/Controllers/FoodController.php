<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FoodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       return Food::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {



        //  $table->unsignedBigInteger('category_id')->nullable();
        //  $table->foreign('category_id')->references('id')->on('categories');



        $food=new Food();
        $food->name=$request->name;
        $food->description=$request->description;
        $food->price=$request->price;
        $food->image=$request->image;
        $food->imgpath=$request->imgpath;

        $url="http://127.0.0.1:8000/storage/";
        $file=$request->file('image');
        $extention=$file->getClientOriginalExtension();
        $path=

        // $food->food_id=Auth::id();
        $food->save();

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Food::destroy($id);
    }
}
