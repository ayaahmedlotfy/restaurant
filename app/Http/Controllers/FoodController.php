<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Food;
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
        $image = $request->file('image');

        $imageName = time().'.'.$image->getClientOriginalExtension();
        $image->move(public_path('images'), $imageName);

        $food->image = $imageName;

        $food->save();

        // $food->food_id=Auth::id();



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
        return Food::find($id);
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

        $food = Food::find($id);
        $food->name=$request->name;
        $food->description=$request->description;
        $food->price=$request->price;

        if($request->hasFile('image')){
            $image = $request->file('image');
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
            $food->image = $imageName;
        }
        $food->save();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $i=Food::find($id);
        $currphoto=$i->image;
         $userPhoto=public_path('images/').$currphoto;
         if (file_exists($userPhoto)){
             @unlink($userPhoto);
         }
          Food::destroy($id);
    }
}
