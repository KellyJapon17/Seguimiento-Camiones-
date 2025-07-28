<?php

namespace App\Http\Controllers;

use App\Models\Point;
use Illuminate\Http\Request;

class PointController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $points=Point::when(request()->filled('way_id'),function($query){
                $query->where('way_id',request('way_id'));
            })
            ->when(request()->filled('status'),function($query){
                $query->where('status',request('status'));
            })
            ->paginate(100);

        return response()->json($points,200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $create_point=Point::create($request->all());

        return response()->json([
            "data"=>$create_point,
            "message"=>"Punto agregado correctamente."
        ],200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Point $id)
    {
        $update_point=Point::update($request->all());

        return response()->json([
            "data"=>$update_point,
            "message"=>"Punto actualizado correctamente."
        ],200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Point $id)
    {
        $id->delete();

        return response()->json([
            "message"=>"Punto eliminado."
        ],200);

    }
}
