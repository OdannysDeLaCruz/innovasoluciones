<?php

use Faker\Generator as Faker;

$factory->define(App\Producto::class, function (Faker $faker) {

	$id_categoria = App\Categoria::where('id', rand(1,15))->value('id');

    $descuentos = [0,10,20,30,40,50,60,70,80,90];
    $desc = $descuentos[ rand(0,9) ];

    return [
        'id_categoria'    => $id_categoria,
        'descripcion'     => $faker->text(50),
        'imagen'          => $faker->imageUrl($width = 200, $height = 200),
        'precio'          => rand(1000, 9999999),
        'descuento'       => 0,
        'cant_disponible' => rand(0,10)
    ];
});
