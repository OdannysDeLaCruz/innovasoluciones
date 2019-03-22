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
            $table->integer('user_id')->unsigned();
            $table->string('pedido_dir');
            $table->string('pedido_ref_venta');
            $table->integer('codigo_utilizado_id')->unsigned()->nullable();
            $table->integer('envio_id')->unsigned();
            $table->string('pedido_nombre_metodo_pago');
            $table->string('pedido_metodo_pago'); // Forma de pago y metodo Ej: CREDIT_CARD - tal cosa
            $table->string('pedido_estado');
            $table->string('pedido_transaccion_id');
            $table->string('pedido_moneda_pago');
            
            $table->timestamp('fecha_creado');
            $table->timestamp('fecha_actualizado')->nullable();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('codigo_utilizado_id')->references('id')->on('codigos')->onDelete('cascade');
            $table->foreign('envio_id')->references('id')->on('envios')->onDelete('cascade');
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
