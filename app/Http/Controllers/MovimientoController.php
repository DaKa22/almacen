<?php

namespace App\Http\Controllers;

use App\Models\Movimiento;
use Carbon\Carbon;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class MovimientoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(Movimiento::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        try {
            $Movimiento = Movimiento::create([
                'tipo_movimiento' => $request['tipo_movimiento'],
                'cedula_movimiento' => $request['cedula_movimiento'],
                'nombre_movimiento' => $request['nombre_movimiento'],
                'fecha_movimiento' => Carbon::now()->format('Y-m-d H:i:s'),
                'valor_total_movimiento' => $request['valor_total_movimiento'],

            ]);
            if($Movimiento){
                return response()->json([
                    'status' => 'OK',
                    'message' => 'Movimiento creado correctamente',
                    'registro' => $Movimiento
                ]);
            }


        } catch (QueryException $e) {
            return response()->json([
                'status' => 'ERROR',
                'message' => $e->getMessage()
            ]);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Movimiento  $Movimiento
     * @return \Illuminate\Http\Response
     */
    public function show(Movimiento $Movimiento)
    {
        if(!$Movimiento){
            return response()->json([
                'status' => 'ERROR',
                'message' => 'Movimiento NO fue encontrado'
            ]);
        }
        return response()->json(Movimiento::where('id',$Movimiento->id)->first());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Movimiento  $Movimiento
     * @return \Illuminate\Http\Response
     */
    public function edit(Movimiento $Movimiento)
    {
        if(!$Movimiento){
            return response()->json([
                'status' => 'ERROR',
                'message' => 'Movimiento NO fue encontrado'
            ]);
        }
        return response()->json(Movimiento::where('id',$Movimiento->id)->first());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Movimiento  $Movimiento
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Movimiento $Movimiento)
    {
        try {
            if(!$Movimiento) {
                return response()->json([
                    'status' => 'ERROR',
                    'message' => 'No existe el Movimiento.'
                ]);
            }

            $Movimiento->update([
                'tipo_movimiento' => $request['tipo_movimiento'],
                'cedula_movimiento' => $request['cedula_movimiento'],
                'nombre_movimiento' => $request['nombre_movimiento'],
                'fecha_movimiento' => Carbon::now()->format('Y-m-d H:i:s'),
                'valor_total_movimiento' => $request['valor_total_movimiento'],
            ]);
            if($Movimiento->save()){
                return response()->json([
                    'status' => 'OK',
                    'message' => 'Movimiento actualizado correctamente',
                    'registro' => $Movimiento
                ]);
            }

        } catch (QueryException $e) {
            return response()->json([
                'status' => 'ERROR',
                'message' => $e->getMessage()
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Movimiento  $Movimiento
     * @return \Illuminate\Http\Response
     */
    public function destroy(Movimiento $Movimiento)
    {
        try {


            if(!$Movimiento) {
                return response()->json([
                    'status' => 'ERROR',
                    'message' => 'No existe la Movimiento.'
                ]);
            }


            if($Movimiento->delete()){
                return response()->json([
                    'status' => 'ELIMINADO',
                    'message'=>'Movimiento eliminado correctamente',
                    'registro'=>$Movimiento
                ]);
            }



        } catch (QueryException $e) {
            return response()->json([
                'status' => 'ERROR',
                'message' => $e->getMessage()
            ]);
        }

    }
}
