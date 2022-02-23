<?php

namespace Database\Seeders;

use App\Models\Linea;
use Illuminate\Database\Seeder;

class LineaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $codigo = [
            101,
            102,
            103,
            104
        ];
        $descripcion=['XIAOMI','SAMSUNG','MOTOROLA','APPLE'];
        for ($i=0;$i<count($codigo);$i++) {
            $nuevo = new Linea();
            $nuevo->codigo_linea = $codigo[$i];
            $nuevo->descripcion = $descripcion[$i];
            $nuevo->sublinea_id = rand(1,4);
            $nuevo->save();
        }
    }
}
