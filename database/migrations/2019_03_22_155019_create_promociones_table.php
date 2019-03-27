<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePromocionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('promociones', function (Blueprint $table) {
            $table->increments('id');
            $table->string('promo_nombre')->unique();
            $table->string('promo_tipo'); // descuento %, descuento peso, 2x1
            $table->integer('promo_costo'); // en caso de que sea % ó peso
            $table->boolean('promo_publicidad'); // Para dar publicidad en la pagina principal
            $table->string('promo_banner_publicidad'); // Para poner imagen publicitaria
            $table->datetime('promo_inicio');
            $table->datetime('promo_final');
            $table->integer('promo_numero_canjeo');
            // es null por que puede que sea cualquier valor de pedido
            $table->integer('promo_minimo_pedido')->nullable();

            $table->timestamp('fecha_creado');
            $table->timestamp('fecha_actualizado')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('promociones');
    }
}
