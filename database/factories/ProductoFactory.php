<?php

use Faker\Generator as Faker;

$factory->define(App\Producto::class, function (Faker $faker) {

	$id_categoria = App\Categoria::where('id', rand(1,15))->value('id');

    $precio_productos = [10,20,30,40,50,60,70,80,90];
    $precio = $precio_productos[rand(0, 8)];

    $descuentos = [0,20,40,60,70,80];
    $desc = $descuentos[ rand(0,5) ];

    return [
        'id_categoria'    => $id_categoria,
        'descripcion'     => $faker->text(50),
        'imagen'          => $faker->imageUrl($width = 200, $height = 200),
        'precio'          => $precio,
        'descuento'       => $desc,
        'tamaño'          => $faker->word,
        'color'           => $faker->word,
        'cant_disponible' => rand(0,10)
    ];
});
