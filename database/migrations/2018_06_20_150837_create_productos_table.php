<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_categoria')->unsigned(); //Dependiendo de la categoria se rellenan los campos tamaño y color
            $table->string('descripcion')->unique();
            $table->string('tags');
            $table->string('referencia')->unique();
            $table->string('imagen');
            $table->integer('precio');
            $table->integer('descuento');
            $table->string('tamaño')->nullable(); //Tamaño de articulos (46cm X 30cm), tallas de zapatos (26, 27, 28) etc...
            $table->string('color')->nullable(); //Colores disponibles del articulo separados por comas (verde, rojo, negro) etc...

            $table->integer('cant_disponible'); //0 = no disponible
            $table->timestamp('fecha_creado');
            // $table->timestamps();

            $table->foreign('id_categoria')->references('id')->on('categorias')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('productos');
    }
}
