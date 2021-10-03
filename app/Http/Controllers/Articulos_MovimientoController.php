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
        $articulos_movimientos=Articulos_Movimiento::with('datos_productos','movimientos')->get();
        return view('articulos_movimientos.index', ['articulos_movimientos' => $articulos_movimientos]);

    }
    public function imprimir()
    {
        $articulos_movimientos=Articulos_Movimiento::all();
        $pdf= \PDF::loadView('articulos_movimientos.imprimir',compact('articulos_movimientos'));
        return $pdf->download('Articulos_movimientos.pdf');
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
                $Articulos_Movimiento=Articulos_Movimiento::where('id',$request->id)->first();
                if(!$Articulos_Movimiento) {
                    return response()->json([
                        'status' => 'ERROR',
                        'message' => 'No existe La Articulos_Movimiento.'
                    ]);
                }

                $Articulos_Movimiento->update([
                    'cantidad'=> $request['cantidad'],
                    'valor'=>$request['valor'],
                    'datos_productos_id'=>$request['datos_productos_id'],
                    'movimientos_id'=>$request['movimientos_id']
                ]);
                if($Articulos_Movimiento->save()){
                    return redirect()->back()->with([
                        'created' => 1,
                        'mensaje' => 'Los Articulos del Movimiento se Actualizo correctamente'
                    ]);
                }else {
                    return redirect()->back()->with([
                        'created' => 0,
                        'mensaje' => 'Los Articulos del Movimiento NO se Actualizo correctamente'
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
            $Articulos_Movimiento = Articulos_Movimiento::create([
                'cantidad' => $request['cantidad'],
                'valor' => $request['valor'],
                'datos_productos_id' => $request['datos_productos_id'],
                'movimientos_id' => $request['movimientos_id'],

            ]);
            $movimiento=Movimiento::where('id',$Articulos_Movimiento->movimientos_id)->first();

            $datos_producto=Datos_Producto::where('id',$Articulos_Movimiento->datos_productos_id)->first();
            $actual=$datos_producto->stock;
            $variante=$Articulos_Movimiento->cantidad;

            if($movimiento->tipo_movimiento == false){

                $datos_producto->update([
                    'costo_ultimo'=>$Articulos_Movimiento->valor,
                    'stock'=>($actual+$variante)
                ]);
                $movimiento->update([
                    'valor_total_movimiento'=>($Articulos_Movimiento->valor*$Articulos_Movimiento->cantidad)
                ]);
            }else{
                $datos_producto->update([
                    'stock'=>($actual-$variante)
                ]);
                $movimiento->update([
                    'valor_total_movimiento'=>($Articulos_Movimiento->valor*$Articulos_Movimiento->cantidad)
                ]);
            }

            if($Articulos_Movimiento){
                return redirect()->back()->with([
                    'created' => 1,
                    'mensaje' => 'Los Articulos del Movimiento se creo correctamente'
                ]);
            }else {
                return redirect()->back()->with([
                    'created' => 0,
                    'mensaje' => 'Los Articulos del Movimiento NO se creo correctamente'
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
    public function show($Articulos_Movimiento)
    {
        if(!$Articulos_Movimiento){
            return response()->json([
                'status' => 'ERROR',
                'message' => 'Articulos_Movimiento NO fue encontrado'
            ]);
        }
        return response()->json(Articulos_Movimiento::where('id',$Articulos_Movimiento)->first());
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
    public function update(Request $request, $id)
    {
        $Articulos_Movimiento=Articulos_Movimiento::where('id',$id)->first();
        try {
            if(!$Articulos_Movimiento) {
                return response()->json([
                    'status' => 'ERROR',
                    'message' => 'No existe La Articulos_Movimiento.'
                ]);
            }

            $Articulos_Movimiento->update([
                'cantidad'=> $request['cantidad'],
                'valor'=>$request['valor'],
                'datos_productos_id'=>$request['datos_productos_id'],
                'movimientos_id'=>$request['movimientos_id']
            ]);
            if($Articulos_Movimiento->save()){
                return redirect()->back()->with([
                    'created' => 1,
                    'mensaje' => 'Los Articulos del Movimiento se Actualizo correctamente'
                ]);
            }else {
                return redirect()->back()->with([
                    'created' => 0,
                    'mensaje' => 'Los Articulos del Movimiento NO se Actualizo correctamente'
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
    public function destroy($id)
    {
        $Articulos_Movimiento=Articulos_Movimiento::where('id',$id)->first();

        try {


            if(!$Articulos_Movimiento) {
                return response()->json([
                    'status' => 'ERROR',
                    'message' => 'No existe la Articulos_Movimiento.'
                ]);
            }


            if($Articulos_Movimiento->delete()){
                return redirect()->back()->with([
                    'created' => 1,
                    'mensaje' => 'Los Articulos del Movimiento se Elimino correctamente'
                ]);
            }else {
                return redirect()->back()->with([
                    'created' => 0,
                    'mensaje' => 'Los Articulos del Movimiento NO se Elimino correctamente'
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
