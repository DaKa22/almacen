<?php

namespace App\Http\Controllers;

use App\Models\Articulos_Movimiento;
use App\Models\Datos_Producto;
use App\Models\Movimiento;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class Articulos_MovimientoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(Articulos_Movimiento::all());
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
            $Articulos_Movimiento = Articulos_Movimiento::create([
                'cantidad' => $request['cantidad'],
                'valor' => $request['valor'],
                'datos_productos_id' => $request['datos_productos_id'],
                'movimientos_id' => $request['movimientos_id'],

            ]);
            $movimiento=Movimiento::where('id',$Articulos_Movimiento->movimientos_id)->first();

            $datos_producto=Datos_Producto::where('id',$Articulos_Movimiento->datos_productos_id)->first();
            if($movimiento->tipo_movimiento == false){
                $datos_producto->update([
                    'costo_ultimo'=>$Articulos_Movimiento->valor
                ]);
            }

            if($Articulos_Movimiento){
                return response()->json([
                    'status' => 'OK',
                    'message' => 'Articulos_Movimiento creada correctamente',
                    'registro' => $Articulos_Movimiento
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
     * @param  \App\Models\Articulos_Movimiento  $Articulos_Movimiento
     * @return \Illuminate\Http\Response
     */
    public function show(Articulos_Movimiento $Articulos_Movimiento)
    {
        if(!$Articulos_Movimiento){
            return response()->json([
                'status' => 'ERROR',
                'message' => 'Articulos_Movimiento NO fue encontrada'
            ]);
        }
        return response()->json(Articulos_Movimiento::where('id',$Articulos_Movimiento->id)->first());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Articulos_Movimiento  $Articulos_Movimiento
     * @return \Illuminate\Http\Response
     */
    public function edit(Articulos_Movimiento $Articulos_Movimiento)
    {
        if(!$Articulos_Movimiento){
            return response()->json([
                'status' => 'ERROR',
                'message' => 'Articulos_Movimiento NO fue encontrada'
            ]);
        }
        return response()->json(Articulos_Movimiento::where('id',$Articulos_Movimiento->id)->first());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Articulos_Movimiento  $Articulos_Movimiento
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Articulos_Movimiento $Articulos_Movimiento)
    {
        try {
            if(!$Articulos_Movimiento) {
                return response()->json([
                    'status' => 'ERROR',
                    'message' => 'No existe La Articulos_Movimiento.'
                ]);
            }

            $Articulos_Movimiento->update([
                'codigo_Articulos_Movimiento' => $request['codigo_Articulos_Movimiento'],
                'descripcion' => $request['descripcion']
            ]);
            if($Articulos_Movimiento->save()){
                return response()->json([
                    'status' => 'OK',
                    'message' => 'Articulos_Movimiento actualizado correctamente',
                    'registro' => $Articulos_Movimiento
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
     * @param  \App\Models\Articulos_Movimiento  $Articulos_Movimiento
     * @return \Illuminate\Http\Response
     */
    public function destroy(Articulos_Movimiento $Articulos_Movimiento)
    {
        try {


            if(!$Articulos_Movimiento) {
                return response()->json([
                    'status' => 'ERROR',
                    'message' => 'No existe la Articulos_Movimiento.'
                ]);
            }
            $Articulos_Movimiento->delete();

            if($Articulos_Movimiento->save()){
                return response()->json([
                    'status' => 'ELIMINADO',
                    'message'=>'Articulos_Movimiento eliminado correctamente',
                    'registro'=>$Articulos_Movimiento
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
