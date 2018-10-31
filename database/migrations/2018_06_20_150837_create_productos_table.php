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
            $table->string('descripcion')->unique()->required();
            $table->string('tags')->required();
            $table->string('referencia')->unique()->required();
            $table->string('imagen')->required();
            $table->integer('precio')->required();
            $table->integer('descuento')->default(0);
            $table->string('tallas')->nullable(); //Tamaño de articulos (46cm X 30cm), tallas de zapatos (26, 27, 28) etc...
            $table->string('colores')->nullable(); //Colores disponibles del articulo separados por comas (verde, rojo, negro) etc...
            $table->string('tiempo_entrega')->default('25 dias');

            $table->boolean('tieneImgDescripcion')->nullable(); // Columna para especificar si tiene descripción por imagenes
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
