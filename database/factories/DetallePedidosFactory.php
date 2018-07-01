<?php

use Faker\Generator as Faker;

$factory->define(App\DetallePedido::class, function (Faker $faker) {
   
   $id_producto   = App\Producto::where('id', rand(1,30))->value('id');
   $id_pedido     = App\Pedido::where('id', rand(1,5))->value('id');

    return [
        'id_producto'    => $id_producto,
        'id_pedido'      => $id_pedido,
        'cantidad'       => rand(1,5),
    ];
});
