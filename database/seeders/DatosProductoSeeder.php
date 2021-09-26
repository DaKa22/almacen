<?php

namespace Database\Seeders;

use App\Models\DatosProducto;
use Illuminate\Database\Seeder;

class DatosProductoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $codigo_producto = [
            101,
            102,
            103,
            104
        ];
        $descripcion=['XIAOMI MI 8 LITE','SAMSUNG J7 NORMAL','MOTOROLA MOTOG8 T','IPHONE 13 PRO'];
        $costo_ultimo=[750000,400000,650000,9000000];
        $stock=[10,6,8,3];
        $lineas_id=[1,2,3,4];
        $sublineas_id=[2,1,4,3];
        for($i=0;count($codigo_producto)>$i;$i++){
            $nuevo = new DatosProducto();
            $nuevo->codigo_producto =$codigo_producto[$i];
            $nuevo->descripcion =$descripcion[$i];
            $nuevo->costo_ultimo=$costo_ultimo[$i];
            $nuevo->stock=$stock[$i];
            $nuevo->lineas_id=$lineas_id[$i];
            $nuevo->sublineas_id=$sublineas_id[$i];
            $nuevo->save();
        }
    }
}
