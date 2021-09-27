<?php

namespace App\Http\Controllers;

use App\Models\Datos_Producto;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class Datos_ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(Datos_Producto::all());
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
            $Datos_Producto = Datos_Producto::create([
                'codigo_Datos_Producto' => $request['codigo_Datos_Producto'],
                'descripcion' => $request['descripcion']

            ]);
            if($Datos_Producto){
                return response()->json([
                    'status' => 'OK',
                    'message' => 'Datos_Producto creada correctamente',
                    'registro' => $Datos_Producto
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
     * @param  \App\Models\Datos_Producto  $Datos_Producto
     * @return \Illuminate\Http\Response
     */
    public function show(Datos_Producto $Datos_Producto)
    {
        if(!$Datos_Producto){
            return response()->json([
                'status' => 'ERROR',
                'message' => 'Datos_Producto NO fue encontrada'
            ]);
        }
        return response()->json(Datos_Producto::where('id',$Datos_Producto->id)->first());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Datos_Producto  $Datos_Producto
     * @return \Illuminate\Http\Response
     */
    public function edit(Datos_Producto $Datos_Producto)
    {
        if(!$Datos_Producto){
            return response()->json([
                'status' => 'ERROR',
                'message' => 'Datos_Producto NO fue encontrada'
            ]);
        }
        return response()->json(Datos_Producto::where('id',$Datos_Producto->id)->first());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Datos_Producto  $Datos_Producto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Datos_Producto $Datos_Producto)
    {
        try {
            if(!$Datos_Producto) {
                return response()->json([
                    'status' => 'ERROR',
                    'message' => 'No existe La Datos_Producto.'
                ]);
            }

            $Datos_Producto->update([
                'codigo_Datos_Producto' => $request['codigo_Datos_Producto'],
                'descripcion' => $request['descripcion']
            ]);
            if($Datos_Producto->save()){
                return response()->json([
                    'status' => 'OK',
                    'message' => 'Datos_Producto actualizado correctamente',
                    'registro' => $Datos_Producto
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
     * @param  \App\Models\Datos_Producto  $Datos_Producto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Datos_Producto $Datos_Producto)
    {
        try {


            if(!$Datos_Producto) {
                return response()->json([
                    'status' => 'ERROR',
                    'message' => 'No existe la Datos_Producto.'
                ]);
            }
            $Datos_Producto->delete();

            if($Datos_Producto->save()){
                return response()->json([
                    'status' => 'ELIMINADO',
                    'message'=>'Datos_Producto eliminado correctamente',
                    'registro'=>$Datos_Producto
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
