<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePedidosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pedidos', function (Blueprint $table) {
            $table->increments('id');
            // almaceno el id del usuario, pero tambien el nombre completo del usuario comprador
            $table->integer('id_user');
            $table->string('comprador');
            // --------------------------------
            $table->string('ref_venta');
            $table->string('direccion_envio');
            $table->string('modo_pago');
            $table->string('codigo_descuento')->nullable();
            $table->string('modo_envio');
            $table->string('estado_pedido');
            $table->timestamp('fecha_pedido');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pedidos');
    }
}
