<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Food;
use App\Models\Order;
use App\Http\Resources\FoodResource;
use  Illuminate\Support\Facades\Auth;


class FoodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
            // return Food::all();

            return FoodResource::collection(Food::all());

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
        // $role=Auth::user()->role;
        // if($role =='1'){

        $food=new Food();
        $food->name=$request->name;
        $food->description=$request->description;
        $food->price=$request->price;
        $food->category_id=$request->category_id;
        $food->numOfItem=$request->numOfItem;
        // $food->image=$request->image;
        $food->imagepath=$request->imagepath;


        // $image = $request->file('image');
        // $food->imagepath=$image;


        // $imageName = time().'.'.$image->getClientOriginalExtension();
        // $image->move(public_path('images'), $imageName);

        // $food->image = $imageName;

        $food->save();
    // }
    // else{return "u are user u can not store food";}

     }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $food=Food::find($id);
        return new FoodResource($food);
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
        // $role=Auth::user()->role;
        // if($role =='1'){
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
    // }
    // else{return "u are user u can not update food";}

     }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $role=Auth::user()->role;
        // if($role =='1'){
        $i=Food::find($id);
        $currphoto=$i->image;
         $userPhoto=public_path('images/').$currphoto;
         if (file_exists($userPhoto)){
             @unlink($userPhoto);
         }
          Food::destroy($id);
        // }
        // else{return "u are user u can not delete food";}
    }
}
