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
            $table->string('pais');
            $table->string('departamento');
            $table->string('distrito')->nullable();
            $table->string('ciudad');
            $table->string('barrio');
            $table->string('calle');
            $table->string('numero');
            $table->integer('codigo_postal')->nullable();
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
