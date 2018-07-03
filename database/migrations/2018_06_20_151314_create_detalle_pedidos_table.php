<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetallePedidosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_pedidos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_producto');
            $table->integer('id_pedido')->unsigned();
            $table->integer('id_factura')->unsigned();
            $table->string('descripcion');
            $table->string('imagen');
            $table->integer('precio');
            $table->integer('descuento_porcentual');
            $table->string('tamaño')->nullable(); //Tamaño de articulos (46cm X 30cm), tallas de zapatos (26, 27, 28) etc...
            $table->string('color')->nullable(); //Colores disponibles del articulo separados por comas (verde, rojo, negro) etc...
            $table->string('cantidad');
            $table->integer('importe_total');

            $table->timestamps();

            // $table->foreign('id_producto')->references('id')->on('productos')->onDelete('cascade');
            $table->foreign('id_pedido')->references('id')->on('pedidos')->onDelete('cascade');
            $table->foreign('id_factura')->references('id')->on('facturas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detalle_pedidos');
    }
}
