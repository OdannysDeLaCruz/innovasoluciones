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
            $table->integer('categoria_id')->unsigned(); //Dependiendo de la categoria se rellenan los campos tamaño y color
            $table->string('producto_descripcion')->unique()->required();
            $table->string('producto_tags')->required();
            $table->string('producto_ref')->unique()->required();
            $table->string('producto_imagen')->required();
            $table->decimal('producto_precio', 10, 2)->required();
            $table->integer('promocion_id')->unsigned()->nullable();
            // $table->integer('producto_descuento')->default(0);

            //Dimensiones de articulos (46cm X 30cm), tallas de zapatos (26, 27, 28) etc...
            $table->string('producto_tallas')->nullable(); 

            //Colores disponibles del articulo separados por comas (verde, rojo, negro) etc...
            $table->string('producto_colores')->nullable(); 

            // Columna para especificar si tiene descripción por imagenes, 0 ó 1
            $table->boolean('producto_tieneImgDescripcion')->nullable(); 

            $table->integer('producto_cant');
            $table->boolean('producto_estado'); // 1 ó 0

            $table->timestamp('fecha_creado')->default(\DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('fecha_actualizado')->default(\DB::raw('CURRENT_TIMESTAMP'));

            $table->foreign('categoria_id')->references('id')->on('categorias')->onDelete('cascade');
            $table->foreign('promocion_id')->references('id')->on('promociones')->onDelete('cascade');
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
