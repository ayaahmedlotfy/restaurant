<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FoodController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\DeliveryController;
use App\Http\Controllers\Food_OrderController;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::post('/sanctum/token', function (Request $request) {
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
        'device_name' => 'required',
    ]);

    $user = User::where('email', $request->email)->first();

    if (! $user || ! Hash::check($request->password, $user->password)) {
        throw ValidationException::withMessages([
            'email' => ['The provided credentials are incorrect.'],
        ]);
    }

    return $user->createToken($request->device_name)->plainTextToken;
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware(['auth:sanctum'])->group(function(){

 Route::get('/foods',[FoodController::class, "index"]);
 Route::post('/foods',[FoodController::class, "store"]);
 Route::get('/foods/{id}',[FoodController::class, "show"]);
 Route::post('/foods/{id}',[FoodController::class, "update"]);
 Route::delete('/foods/{id}',[FoodController::class, "destroy"]);


 Route::get('/categories',[CategoryController::class, "index"]);
 Route::post('/categories',[CategoryController::class, "store"]);
 Route::get('/categories/{id}',[CategoryController::class, "show"]);
 Route::post('/categories/{id}',[CategoryController::class, "update"]);
 Route::delete('/categories/{id}',[CategoryController::class, "destroy"]);

 Route::get('/users',[UserController::class, "index"]);
 Route::post('/users',[UserController::class, "store"]);
 Route::get('/users/{id}',[UserController::class, "show"]);
 Route::post('/users/{id}',[UserController::class, "update"]);
 Route::delete('/users/{id}',[UserController::class, "destroy"]);

 Route::get('/orders',[OrderController::class, "index"] );
 Route::post('/orders',[OrderController::class, "store"] );
 Route::get('/orders/{id}',[OrderController::class, "show"] );
 Route::post('/orders/{id}',[OrderController::class, "update"] );
 Route::delete('/orders/{id}',[OrderController::class, "destroy"] );


Route::get("/deliveries",[DeliveryController::class,'index']);
Route::post('/deliveries',[DeliveryController::class, "store"] );
Route::get("/deliveries/{id}",[DeliveryController::class,'show']);
Route::post('/deliveries/{id}',[DeliveryController::class, "update"] );
// Route::delete("/deliveries/{id}",[DeliveryController::class,'destroy']);


 Route::get('/food_orders',[Food_OrderController::class, "index"] );
 Route::post('/food_orders',[Food_OrderController::class, "store"] );
 Route::get('/food_orders/{id}',[Food_OrderController::class, "show"] );
 Route::post('/food_orders/{id}',[Food_OrderController::class, "update"] );
 Route::delete('/food_orders/{id}',[Food_OrderController::class, "destroy"] );
});


