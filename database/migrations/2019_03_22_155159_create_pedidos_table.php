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
            $table->string('pedido_ref_venta')->nullable();

            $table->integer('promocion_id')->unsigned()->nullable();
            $table->integer('envio_id')->unsigned();

            $table->string('pedido_tipo_dispositivo')->nullable();
            $table->string('pedido_ip_dispositivo')->nullable();

            $table->integer('transaccion_id')->unsigned()->nullable();

            $table->timestamp('fecha_creado')->default(\DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('fecha_actualizado')->default(\DB::raw('CURRENT_TIMESTAMP'));

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('promocion_id')->references('id')->on('promociones')->onDelete('cascade');
            $table->foreign('envio_id')->references('id')->on('envios')->onDelete('cascade');
            $table->foreign('transaccion_id')->references('id')->on('transacciones')->onDelete('cascade');
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
