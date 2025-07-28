<?php

namespace App\Http\Controllers;

use App\Models\Way;
use Illuminate\Http\Request;

class WayController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ways=Way::when(request()->filled('name'),function($query){
                $query->where('name',request('name'));
            })
            ->when(request()->filled('status'),function($query){
                $query->where('status',request('status'));
            })
            ->paginate(100);

        return response()->json($ways,200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $create_way=Way::create($request->all());

        return response()->json([
            "data"=>$create_way,
            "message"=>"Creado correctamente."
        ],200);
    }

    /**
     * Display the specified resource.
     */
    public function show(Way $id)
    {
        $id->points=$id->find($id->id)->points;

        return response()->json([
            "data"=>$id,
            "message"=>"Ruta encontrada."
        ],200);
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
