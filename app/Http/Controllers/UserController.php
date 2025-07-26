<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use PhpParser\Node\Stmt\TryCatch;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return User::when(request()->filled('name'),function($query){
                $query->where('name','REGEXP',request('name'));
            })
            ->when(request()->filled('role'),function($query){
                $query->where('role',request('role'));
            })
            ->paginate(request('nro_index'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data=[
            "name"=>$request->name,
            "email"=>$request->email,
            "role"=>$request->role,
            "password"=>Hash::make($request->password)
        ];

        // User::create($request->all());
        try {
            $create_user=User::create($data);

            return response()->json([
                "data"=>$create_user,
                "message"=>"Creado correctamente."
            ],200);

        } catch (\Throwable $th) {
            return response()->json([
                "data"=>$th,
                "message"=>"Se ha producido un error."
            ],400);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(User $id)
    {
        return $id;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
