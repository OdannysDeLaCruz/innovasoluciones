<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDireccionPedidoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('direccion_pedido', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('pedido_id')->unsigned();
            $table->string('nombre_completo');
            $table->string('pais');
            $table->string('estado');
            $table->string('ciudad');
            $table->string('direccion');
            $table->string('telenofo');
            $table->integer('codigo_postal');

            $table->timestamp('fecha_creado')->default(\DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('fecha_actualizado')->default(\DB::raw('CURRENT_TIMESTAMP'));

            $table->foreign('pedido_id')->references('id')->on('pedidos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('direccion_pedido');
    }
}
