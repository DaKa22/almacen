<?php

namespace App\Http\Controllers;

use App\Models\Linea;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class LineaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(Linea::all());
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
            $linea = Linea::create([
                'codigo_linea' => $request['codigo_linea'],
                'descripcion' => $request['descripcion']

            ]);
            if($linea){
                return response()->json([
                    'status' => 'OK',
                    'message' => 'Linea creada correctamente',
                    'registro' => $linea
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
     * @param  \App\Models\Linea  $linea
     * @return \Illuminate\Http\Response
     */
    public function show(Linea $linea)
    {
        if(!$linea){
            return response()->json([
                'status' => 'ERROR',
                'message' => 'Linea NO fue encontrada'
            ]);
        }
        return response()->json(Linea::where('id',$linea->id)->first());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Linea  $linea
     * @return \Illuminate\Http\Response
     */
    public function edit(Linea $linea)
    {
        if(!$linea){
            return response()->json([
                'status' => 'ERROR',
                'message' => 'Linea NO fue encontrada'
            ]);
        }
        return response()->json(Linea::where('id',$linea->id)->first());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Linea  $linea
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Linea $linea)
    {
        try {
            if(!$linea) {
                return response()->json([
                    'status' => 'ERROR',
                    'message' => 'No existe La Linea.'
                ]);
            }

            $linea->update([
                'codigo_linea' => $request['codigo_linea'],
                'descripcion' => $request['descripcion']
            ]);
            if($linea->save()){
                return response()->json([
                    'status' => 'OK',
                    'message' => 'Linea actualizado correctamente',
                    'registro' => $linea
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
     * @param  \App\Models\Linea  $linea
     * @return \Illuminate\Http\Response
     */
    public function destroy(Linea $linea)
    {
        try {


            if(!$linea) {
                return response()->json([
                    'status' => 'ERROR',
                    'message' => 'No existe la Linea.'
                ]);
            }
            $linea->delete();

            if($linea->save()){
                return response()->json([
                    'status' => 'ELIMINADO',
                    'message'=>'Linea eliminado correctamente',
                    'registro'=>$linea
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
