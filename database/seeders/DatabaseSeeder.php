<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            SublineaSeeder::class,
            LineaSeeder::class,
            MovimientoSeeder::class,
            Datos_ProductoSeeder::class,
            Articulos_MovimientoSeeder::class,
        ]);
    }

}
