<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDatosProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('datos_productos', function (Blueprint $table) {
            $table->id();
            $table->integer('codigo_producto')->unique();
            $table->string('descripcion');
            $table->bigInteger('costo_ultimo')->default(0)->nullable();
            $table->bigInteger('stock')->default(0);
            $table->foreignId('lineas_id')
                ->constrained()
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreignId('sublineas_id')
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
        Schema::dropIfExists('datos_productos');
    }
}
