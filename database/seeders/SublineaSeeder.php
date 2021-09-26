<?php

namespace Database\Seeders;

use App\Models\Sublinea;
use Illuminate\Database\Seeder;

class SublineaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $codigo = [
            20101,
            20201,
            20301,
            20401
        ];
        $descripcion=['Normal','Lite','Pro','Version T'];
        for ($i=0;$i<count($codigo);$i++) {
            $nuevo = new Sublinea();
            $nuevo->codigo = $codigo[$i];
            $nuevo->descripcion = $descripcion[$i];
            $nuevo->save();
        }
    }
}
