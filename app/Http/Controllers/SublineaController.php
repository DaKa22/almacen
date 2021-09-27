<?php

namespace App\Http\Controllers;

use App\Models\Sublinea;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class SublineaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(Sublinea::all());
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
            $Sublinea = Sublinea::create([
                'codigo_Sublinea' => $request['codigo_Sublinea'],
                'descripcion' => $request['descripcion']

            ]);
            if($Sublinea){
                return response()->json([
                    'status' => 'OK',
                    'message' => 'Sublinea creada correctamente',
                    'registro' => $Sublinea
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
     * @param  \App\Models\Sublinea  $Sublinea
     * @return \Illuminate\Http\Response
     */
    public function show(Sublinea $Sublinea)
    {
        if(!$Sublinea){
            return response()->json([
                'status' => 'ERROR',
                'message' => 'Sublinea NO fue encontrada'
            ]);
        }
        return response()->json(Sublinea::where('id',$Sublinea->id)->first());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sublinea  $Sublinea
     * @return \Illuminate\Http\Response
     */
    public function edit(Sublinea $Sublinea)
    {
        if(!$Sublinea){
            return response()->json([
                'status' => 'ERROR',
                'message' => 'Sublinea NO fue encontrada'
            ]);
        }
        return response()->json(Sublinea::where('id',$Sublinea->id)->first());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sublinea  $Sublinea
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sublinea $Sublinea)
    {
        try {
            if(!$Sublinea) {
                return response()->json([
                    'status' => 'ERROR',
                    'message' => 'No existe La Sublinea.'
                ]);
            }

            $Sublinea->update([
                'codigo_Sublinea' => $request['codigo_Sublinea'],
                'descripcion' => $request['descripcion']
            ]);
            if($Sublinea->save()){
                return response()->json([
                    'status' => 'OK',
                    'message' => 'Sublinea actualizado correctamente',
                    'registro' => $Sublinea
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
     * @param  \App\Models\Sublinea  $Sublinea
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sublinea $Sublinea)
    {
        try {


            if(!$Sublinea) {
                return response()->json([
                    'status' => 'ERROR',
                    'message' => 'No existe la Sublinea.'
                ]);
            }


            if($Sublinea->delete()){
                return response()->json([
                    'status' => 'ELIMINADO',
                    'message'=>'Sublinea eliminado correctamente',
                    'registro'=>$Sublinea
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
