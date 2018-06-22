<?php

use Faker\Generator as Faker;

$factory->define(App\Producto::class, function (Faker $faker) {

	$id_categoria = App\Categoria::where('id', rand(1,15))->value('id');

	$disponibles = ['si', 'no'];
	$dato = $disponibles[ rand(0,1) ];

    return [
        'id_categoria'    => $id_categoria,
        'descripcion'     => $faker->text(50),
        'imagen'          => $faker->imageUrl($width = 200, $height = 200),
        'precio'          => rand(1000, 9999999),
        'cant_disponible' => rand(0,10),
        'disponibilidad'  => $dato
    ];
});
