<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\PointController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WayController;
use App\Models\Location;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//  EndPoints para gestión de usuarios
Route::middleware('auth:sanctum')->get('users',[UserController::class,'index']);
Route::get('users/{id}',[UserController::class,'show']);
Route::post('users',[UserController::class,'store']);
Route::post('login',[LoginController::class,'login']);

Route::get('location',function(Request $request){
    $location_create=Location::create($request->all());
    return response()->json($location_create,200);
});

Route::get('ways/',[WayController::class,'index']);
Route::get('ways/{id}',[WayController::class,'show']);
Route::post('ways/',[WayController::class,'store']);
Route::put('ways/{id}',[WayController::class,'update']);
Route::delete('ways/{id}',[WayController::class,'destroy']);

Route::get('points/',[PointController::class,'index']);
Route::post('points/',[PointController::class,'store']);
Route::put('points/{id}',[PointController::class,'update']);
Route::delete('points/{id}',[PointController::class,'destroy']);