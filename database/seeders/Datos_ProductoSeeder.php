<?php

namespace Database\Seeders;

use App\Models\Datos_Producto;
use App\Models\DatosProducto;
use Illuminate\Database\Seeder;

class Datos_ProductoSeeder extends Seeder
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

        for($i=0;count($codigo_producto)>$i;$i++){
            $nuevo = new Datos_Producto();
            $nuevo->codigo_producto =$codigo_producto[$i];
            $nuevo->descripcion =$descripcion[$i];
            $nuevo->lineas_id= rand(1,4);
            $nuevo->sublineas_id= rand(1,4);
            $nuevo->save();
        }
    }
}
