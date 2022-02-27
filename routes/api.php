<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FoodController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserController;
use App\Models\User;
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
 Route::patch('/users/{id}',[UserController::class, "update"]);
 Route::delete('/users/{id}',[UserController::class, "destroy"]);
});


