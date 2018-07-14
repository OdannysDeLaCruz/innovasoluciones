<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCodDescuentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cod_descuentos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre_descuento');
            $table->string('codigo_descuento')->unique();
            $table->datetime('fecha_inicio');
            $table->datetime('fecha_final');
            $table->integer('numero_canjeo');
            $table->integer('minimo_carrito')->nullable();
            $table->integer('descuento');
            $table->integer('tipo_producto')->unsigned();
            
            $table->timestamps();

            $table->foreign('tipo_producto')->references('id')->on('categorias')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cod_descuentos');
    }
}
