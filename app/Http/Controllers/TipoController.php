<?php

namespace App\Http\Controllers;

use App\Models\Tipo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TipoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tipos=Tipo::where('estado',false)->get();
        return response (['tipos'=>$tipos],200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $tipo = new Tipo();
        $tipo->tipo = $request->tipo;
        $tipo->save();
        return response()->json(['messaje'=>'Registro Guardado'],200);
    }

    /**
     * Display the specified resource.
     */
    public function show(Tipo $tipo)
    {
        $tipos=Tipo::where('tipo',$tipo)->get();
        return response (['tipos'=>$tipos],200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tipo $tipo)
    {
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, String $id)
    {
        $tipo = Tipo::find($id);
        if ($tipo){
            $tipo->tipo=$request->tipo;
            $tipo->save();
            return response ()-> json(['message'=> 'tipo actualizado', 200]);
        
        }else{
            return response()->json(['message'=>'tipo no encontrado']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(String $id){

    }
    
    public function listaUser(){
        $tipo=DB::table('tipos')
        ->join('gastos','tipos.id','=','gastos.tipo_id')
        ->select('gastos.descripcion', 'gastos.monto','gastos.fecha','tipos.tipo')
        ->get();
        return response()->json(['Lista'=>$tipo],200);
    }

    public function mostrar(){
        $tipos=Tipo::all();
        return response (['tipos'=>$tipos],200);
    }

    public function searchByDate(Request $request)
    {
        $request->validate([
            'fecha' => 'required|date',
        ]);

        $fecha = $request->input('fecha');

        $gastos = DB::table('tipos')
        ->whereDate('fecha', $fecha)
        ->join('gastos','tipos.id','=','gastos.tipo_id')
        ->select('gastos.descripcion', 'gastos.monto','gastos.fecha','tipos.tipo')
        ->get();
        return response (['tipos'=>$gastos],200);
    }
        
}
