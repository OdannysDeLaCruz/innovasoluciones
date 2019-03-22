<?php

use Faker\Generator as Faker;

$factory->define(App\DetallePedido::class, function (Faker $faker) {
   
    $pedido_id = App\Pedido::where('id', rand(1,10))->value('id');
   
    return [
        'pedido_id'  => $pedido_id,
        'detalle_descripcion' => 'Descripcion de ejemplo',
        'detalle_imagen' => $faker->imageUrl($width = 200, $height = 200),
        'detalle_precio' => 30000,
        'detalle_cantidad' => 1,
        'detalle_precio_final' => 40000,
        'detalle_talla' => '20x20',
        'detalle_color' => 'negro'
    ];
});
