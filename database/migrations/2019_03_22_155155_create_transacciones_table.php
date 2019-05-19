<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransaccionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transacciones', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('estado')->nullable();
            $table->string('mensaje_respuesta')->nullable();
            $table->string('codigo_respuesta')->nullable();
            $table->string('descripcion_transaccion')->nullable();
            $table->decimal('valor_transaccion', 10, 2)->nullable();
            $table->integer('metodo_pago_tipo')->nullable();
            $table->string('metodo_pago_nombre')->nullable();
            $table->integer('metodo_pago_id')->nullable();
            $table->string('id_transaccion')->nullable();
            $table->string('referencia_venta_payu')->nullable();
            $table->string('tipo_moneda_transaccion')->nullable();
            $table->integer('numero_cuotas_pago')->nullable();
            $table->string('ip_transaccion')->nullable();

            // PSE
            $table->string('pse_cus')->nullable();
            $table->string('pse_bank')->nullable();
            $table->string('pse_references')->nullable();

            $table->timestamp('fecha_transaccion')->default(\DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('fecha_creado')->default(\DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('fecha_actualizado')->default(\DB::raw('CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transacciones');
    }
}
