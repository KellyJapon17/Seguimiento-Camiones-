<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use App\Models\Location;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//  EndPoints para gestión de usuarios
Route::middleware('auth:sanctum')->get('users',[UserController::class,'index']);
Route::get('users/{id}',[UserController::class,'show']);
Route::post('users',[UserController::class,'store']);

// EndPoint para autenticación
Route::post('login',[LoginController::class,'login']);
Route::get('location',function(Request $request){
    $location_create=Location::create($request->all());
    return response()->json($location_create,200);
});