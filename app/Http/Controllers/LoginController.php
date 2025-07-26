<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function login(Request $request)
    {
        // request('name')
        // $request->name;

        $user=User::where('email',$request->email)->first();

        if($user!=null){

            if(password_verify($request->password,$user->password)){

                $token=$user->createToken("[users:index]");

                return response()->json([
                    "token"=>$token,
                    "user"=>$user,
                    "message"=>"Iniciado correctamente."
                ],200);

            }else{
                return response()->json([
                    "message"=>"Las credenciales no coinciden."
                ],401);
            }

        }else{
            return response()->json([
                "message"=>"Este usuario no existe."
            ],400);
        }

    }
}
