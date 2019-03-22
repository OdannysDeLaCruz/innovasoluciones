<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCodigosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('codigos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('codigo_nombre');
            $table->string('codigo_texto')->unique();
            $table->datetime('codigo_fecha_inicio');
            $table->datetime('codigo_fecha_final');
            $table->integer('codigo_numero_canjeo');
            $table->integer('codigo_minimo_carrito')->nullable(); // es null por que puede haber un codigo que afecte a todos los costos de carritos
            $table->integer('codigo_descuento_porciento');
            $table->integer('categoria_id')->unsigned();

            $table->timestamp('fecha_creado');
            $table->timestamp('fecha_actualizado')->nullable();
            
            $table->foreign('categoria_id')->references('id')->on('categorias')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('codigos');
    }
}
