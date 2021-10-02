<?php

namespace App\Http\Controllers;

use App\Models\Linea;
use App\Models\Sublinea;
use PDF;
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
        $lineas=Linea::all();
        $sublineas = Sublinea::all();
        return view('lineas.index', ['lineas' => $lineas, 'sublineas' => $sublineas]);
    }
    public function imprimir()
    {
        $lineas=Linea::all();
        $pdf= \PDF::loadView('lineas.imprimir',compact('lineas'));
        return $pdf->download('Lineas.pdf');
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
                $linea=Linea::where('id',$request->id)->first();
                if(!$linea) {
                    return response()->json([
                        'status' => 'ERROR',
                        'message' => 'No existe La Linea.'
                    ]);
                }

                $linea->update([
                    'codigo_linea' => $request['codigo_linea'],
                    'descripcion' => $request['descripcion'],
                    'sublinea_id' => $request['sublinea_id']
                ]);
                if($linea->save()){
                    return redirect()->back()->with([
                        'created' => 1,
                        'mensaje' => 'La Linea se  Actualizo Correctamente '
                    ]);
                }else {
                    return redirect()->back()->with([
                        'created' => 0,
                        'mensaje' => 'La Linea NO se  Actualizo Correctamente'
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

            $linea = Linea::create([

                'codigo_linea' => $request['codigo_linea'],
                'descripcion' => $request['descripcion'],
                'sublinea_id' => $request['sublinea_id']

            ]);
            if($linea){
                return redirect()->back()->with([
                    'created' => 1,
                    'mensaje' => 'La Linea se creo correctamente'
                ]);
            }else {
                return redirect()->back()->with([
                    'created' => 0,
                    'mensaje' => 'La Linea NO se creo correctamente'
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
                'descripcion' => $request['descripcion'],
                'sublinea_id' => $request['sublinea_id']
            ]);
            if($linea->save()){
                return redirect()->back()->with([
                    'created' => 1,
                    'mensaje' => 'La Linea se  Actualizo Correctamente '
                ]);
            }else {
                return redirect()->back()->with([
                    'created' => 0,
                    'mensaje' => 'La Linea NO se  Actualizo Correctamente'
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


            if($linea->delete()){
                return redirect()->back()->with([
                    'created' => 1,
                    'mensaje' => 'La Linea se Elimino correctamente'
                ]);
            }else {
                return redirect()->back()->with([
                    'created' => 0,
                    'mensaje' => 'La Linea NO se Elimino correctamente'
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
