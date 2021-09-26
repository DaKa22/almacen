<?php

namespace Database\Seeders;

use App\Models\Movimiento;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class MovimientoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tipo_movimiento = [false,false,true,true];
        $cedula_movimiento=[1003807654,1003807154,1003807888,1003807666];
        $nombre_movimiento=['Juan Gomez','Mar Hernandez','Juliana Paez','Alejandro Salazar'];
        $valor_total_movimiento=[5000,3000,2000,7000];
        for ($i=0;$i<count($tipo_movimiento);$i++) {
            $nuevo = new Movimiento();
            $nuevo->tipo_movimiento = $tipo_movimiento[$i];
            $nuevo->cedula_movimiento = $cedula_movimiento[$i];
            $nuevo->nombre_movimiento = $nombre_movimiento[$i];
            $nuevo->valor_total_movimiento = $valor_total_movimiento[$i];
            $nuevo->fecha_movimiento = Carbon::now()->format('Y-m-d H:i:s');
            $nuevo->save();
        }
    }
}
