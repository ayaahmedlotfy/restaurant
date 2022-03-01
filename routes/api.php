<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\UserController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


 Route::get('/foods',[FoodController::class, "index"] )->middleware(['auth:sanctum']);
 Route::post('/foods',[FoodController::class, "store"] )->middleware(['auth:sanctum']);
 Route::get('/foods/{id}',[FoodController::class, "show"] )->middleware(['auth:sanctum']);
 Route::patch('/foods/{id}',[FoodController::class, "update"] )->middleware(['auth:sanctum']);
 Route::delete('/foods/{id}',[FoodController::class, "destroy"] )->middleware(['auth:sanctum']);

 Route::get('/orders',[OrderController::class, "index"] )->middleware(['auth:sanctum']);
 Route::post('/orders',[OrderController::class, "store"]);//->middleware(['auth:sanctum']);
 Route::get('/orders/{id}',[OrderController::class, "show"] )->middleware(['auth:sanctum']);
 Route::patch('/orders/{id}',[OrderController::class, "update"] )->middleware(['auth:sanctum']);
 Route::delete('/orders/{id}',[OrderController::class, "destroy"] )->middleware(['auth:sanctum']);

 Route::get('/users',[UserController::class, "index"] )->middleware(['auth:sanctum']);
 Route::post('/users',[UserController::class, "store"] );//->middleware(['auth:sanctum']);
 Route::get('/users/{id}',[UserController::class, "show"] )->middleware(['auth:sanctum']);
 Route::patch('/users/{id}',[UserController::class, "update"] )->middleware(['auth:sanctum']);
 Route::delete('/users/{id}',[UserController::class, "destroy"] )->middleware(['auth:sanctum']);
