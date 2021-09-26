<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticulosMovimientosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articulos_movimientos', function (Blueprint $table) {
            $table->id();
            $table->integer('cantidad');
            $table->bigInteger('valor');
            $table->foreignId('datos_productos_id')
                ->constrained('datos_productos')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreignId('movimientos_id')
                ->constrained()
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('articulos_movimientos');
    }
}
