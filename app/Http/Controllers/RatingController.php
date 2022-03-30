<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\rating;
use App\Http\Resources\Rating as RatingResource;

class RatingController extends Controller
{
    public function setrating(Request $request){
        return new RatingResource(Rating::create([
            'food_id'=>$request->get('food'),
            'user_id'=>$request->get('user'),
            'rating'=>$request->get('rating'),

        ]));

    }
}
