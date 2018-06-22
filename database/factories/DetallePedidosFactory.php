<?php

use Faker\Generator as Faker;

$factory->define(App\DetallePedido::class, function (Faker $faker) {
   
   $id_producto   = App\Producto::where('id', rand(1,30))->value('id');
   $id_pedido     = App\Pedido::where('id', rand(1,5))->value('id');
   $precio_unidad = App\Producto::where('id', $id_producto)->value('precio');

    return [
        'id_producto'    => $id_producto,
        'id_pedido'      => $id_pedido,
        'precio_unidad'  => $precio_unidad,
        'cantidad'       => rand(1,5),
        'descuento'      => rand(10, 50)
    ];
});
