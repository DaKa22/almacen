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
        $sublineas=Sublinea::all();
        return view('sublineas.index', ['sublineas' => $sublineas]);
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
        if($request->id){
            try {
                $Sublinea=Sublinea::where('id',$request->id)->first();
                if(!$Sublinea) {
                    return response()->json([
                        'status' => 'ERROR',
                        'message' => 'No existe La Sublinea.'
                    ]);
                }

                $Sublinea->update([
                    'codigo_sublinea' => $request['codigo_sublinea'],
                    'descripcion' => $request['descripcion']
                ]);
                if($Sublinea->save()){
                    return redirect()->back()->with([
                        'created' => 1,
                        'mensaje' => 'La Sublinea se  Actualizo Correctamente'
                    ]);
                }else {
                    return redirect()->back()->with([
                        'created' => 0,
                        'mensaje' => 'La Sublinea NO se  Actualizo Correctamente'
                    ]);
                }

            } catch (QueryException $e) {
                return response()->json([
                    'status' => 'ERROR',
                    'message' => $e->getMessage()
                ]);
            }
        }
        try {
            $Sublinea = Sublinea::create([
                'codigo_Sublinea' => $request['codigo_Sublinea'],
                'descripcion' => $request['descripcion']

            ]);
            if($Sublinea){
                return redirect()->back()->with([
                    'created' => 1,
                    'mensaje' => 'La Sublinea se creo correctamente'
                ]);
            }else {
                return redirect()->back()->with([
                    'created' => 0,
                    'mensaje' => 'La Sublinea NO se creo correctamente'
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
                return redirect()->back()->with([
                    'created' => 1,
                    'mensaje' => 'La Sublinea se  Actualizo Correctamente'
                ]);
            }else {
                return redirect()->back()->with([
                    'created' => 0,
                    'mensaje' => 'La Sublinea NO se  Actualizo Correctamente'
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
                return redirect()->back()->with([
                    'created' => 1,
                    'mensaje' => 'La Sublinea se Elimino Correctamente'
                ]);
            }else {
                return redirect()->back()->with([
                    'created' => 0,
                    'mensaje' => 'La Sublinea NO se Elimino Correctamente'
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
