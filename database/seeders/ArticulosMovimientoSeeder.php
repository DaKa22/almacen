<?php

namespace Database\Seeders;

use App\Models\ArticulosMovimiento;
use Illuminate\Database\Seeder;

class ArticulosMovimientoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cantidad=[5,8,16,1];
        $valor=[80000,560000,400000,3560000];
        $datos_prodctos_id=[2,1,3,4];
        $movimientos_id=[2,1,3,4];
        for($i=0;count($cantidad)>$i;$i++){
            $nuevo= new ArticulosMovimiento;
            $nuevo->cantidad=$cantidad[$i];
            $nuevo->valor=$valor[$i];
            $nuevo->datos__prodctos_id=$datos_prodctos_id[$i];
            $nuevo->movimientos_id=$movimientos_id[$i];
            $nuevo->save();
        }
    }
}
