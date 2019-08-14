<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDireccionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('direcciones', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->string('nombre_completo');
            $table->string('pais');
            $table->string('estado'); // estado / provincia / region / departamento
            $table->string('ciudad');
            $table->string('direccion'); // Barrio, calle, numero, piso, apartamento, etc
            $table->string('telefono')->nullable();
            $table->integer('codigo_postal')->nullable();
            $table->boolean('defecto');

            $table->timestamp('fecha_creado')->default(\DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('fecha_actualizado')->default(\DB::raw('CURRENT_TIMESTAMP'));

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('direcciones');
    }
}
