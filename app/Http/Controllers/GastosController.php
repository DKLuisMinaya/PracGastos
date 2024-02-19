<?php

namespace App\Http\Controllers;

use App\Models\Gastos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
class GastosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $gasto = Gastos::where('estado',false)->get();
        return response()->json(['gastos'=> $gasto],200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateUsuario = Validator::make($request->all(),[
            'descripcion' => 'required',
            'monto' => 'required|numeric|min:0',
            'fecha' => 'required|date',
            'tipo_id'=> 'required'
        ]);
        if($validateUsuario->fails()){
            return response()->json([
                'status' => false,
                'message' => 'Existen campos vacios',
                'errors' => $validateUsuario->errors()
            ],401);

        }

        $gasto = Gastos::create([
            'descripcion' => $request->descripcion,
            'monto' => $request->monto,
            'fecha' => $request->fecha,
            'tipo_id'=> $request->tipo_id
        ]);

        return response()->json([
            
            'message' => 'Gastos creado correctamente',
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Gastos $gastos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Gastos $gastos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Gastos $gastos)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Gastos $gastos)
    {
        //
    }

    
    
}
