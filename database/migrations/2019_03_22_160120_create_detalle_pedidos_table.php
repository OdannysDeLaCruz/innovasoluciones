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
            $table->integer('pedido_id')->unsigned();
            $table->string('detalle_descripcion');
            $table->string('detalle_imagen');
            $table->decimal('detalle_precio', 10, 2);
            $table->integer('detalle_cantidad');

            // Precio final = (detalle_precio * detalle_cantidad) - (descuento * detalle_precio)
            // El descuento se aplica a la hora de crear el detalle_pedido
            $table->decimal('detalle_precio_final', 10, 2);

            //Dimension o talla escogidas por el usuario
            $table->string('detalle_talla')->nullable(); 

            //Color escogido por el usuario
            $table->string('detalle_color')->nullable(); 

            $table->foreign('pedido_id')->references('id')->on('pedidos')->onDelete('cascade');
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
