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
        $datos_productos=Datos_Producto::all();
        return view('datos_productos.index', ['datos_productos' => $datos_productos]);
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
                $Datos_Producto=Datos_Producto::where('id',$request->id)->first();
                if(!$Datos_Producto) {
                    return response()->json([
                        'status' => 'ERROR',
                        'message' => 'No existe La Datos_Producto.'
                    ]);
                }

                $Datos_Producto->update([
                    'codigo_producto' => $request['codigo_producto'],
                    'descripcion' => $request['descripcion'],
                    'costo_ultimo' => $request['costo_ultimo'],
                    'stock' => $request['stock'],
                    'lineas_id' => $request['lineas_id'],
                    'sublineas_id' => $request['sublineas_id'],
                ]);
                if($Datos_Producto->save()){
                    return redirect()->back()->with([
                        'created' => 1,
                        'mensaje' => 'Los Datos del Poducto se Actualizo correctamente'
                    ]);
                }else {
                    return redirect()->back()->with([
                        'created' => 0,
                        'mensaje' => 'Los Datos del Poducto NO se Actualizo correctamente'
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
            $Datos_Producto = Datos_Producto::create([
                'codigo_producto' => $request['codigo_producto'],
                'descripcion' => $request['descripcion'],
                'costo_ultimo' => $request['costo_ultimo'],
                'stock' => $request['stock'],
                'lineas_id' => $request['lineas_id'],
                'sublineas_id' => $request['sublineas_id'],

            ]);
            if($Datos_Producto){
                return redirect()->back()->with([
                    'created' => 1,
                    'mensaje' => 'Los Datos del Producto se creo correctamente'
                ]);
            }else {
                return redirect()->back()->with([
                    'created' => 0,
                    'mensaje' => 'Los Datos del Producto NO se creo correctamente'
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
    public function show($Datos_Producto)
    {
        if(!$Datos_Producto){
            return response()->json([
                'status' => 'ERROR',
                'message' => 'Datos_Producto NO fue encontrada'
            ]);
        }
        return response()->json(Datos_Producto::where('id',$Datos_Producto)->first());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Datos_Producto  $Datos_Producto
     * @return \Illuminate\Http\Response
     */
    public function edit($Datos_Producto)
    {
        if(!$Datos_Producto){
            return response()->json([
                'status' => 'ERROR',
                'message' => 'Datos_Producto NO fue encontrada'
            ]);
        }
        return response()->json(Datos_Producto::where('id',$Datos_Producto)->first());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Datos_Producto  $Datos_Producto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $Datos_Producto=Datos_Producto::where('id',$id)->first();
        try {
            if(!$Datos_Producto) {
                return response()->json([
                    'status' => 'ERROR',
                    'message' => 'No existe La Datos_Producto.'
                ]);
            }

            $Datos_Producto->update([
                'codigo_producto' => $request['codigo_producto'],
                'descripcion' => $request['descripcion'],
                'costo_ultimo' => $request['costo_ultimo'],
                'stock' => $request['stock'],
                'lineas_id' => $request['lineas_id'],
                'sublineas_id' => $request['sublineas_id'],
            ]);
            if($Datos_Producto->save()){
                return redirect()->back()->with([
                    'created' => 1,
                    'mensaje' => 'Los Datos del Poducto se Actualizo correctamente'
                ]);
            }else {
                return redirect()->back()->with([
                    'created' => 0,
                    'mensaje' => 'Los Datos del Poducto NO se Actualizo correctamente'
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
    public function destroy($id)
    {
        try {

        $Datos_Producto=Datos_Producto::where('id',$id)->first();

            if(!$Datos_Producto) {
                return response()->json([
                    'status' => 'ERROR',
                    'message' => 'No existe la Datos_Producto.'
                ]);
            }


            if($Datos_Producto->delete()){
                return redirect()->back()->with([
                    'created' => 1,
                    'mensaje' => 'Los Datos del Producto se Elimino correctamente'
                ]);
            }else {
                return redirect()->back()->with([
                    'created' => 0,
                    'mensaje' => 'Los Datos del Producto NO se Elimino correctamente'
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
