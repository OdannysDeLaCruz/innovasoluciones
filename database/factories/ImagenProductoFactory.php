<?php

use Faker\Generator as Faker;

$factory->define(App\ImagenProducto::class, function (Faker $faker) {

	$id_producto = App\Producto::where('id', rand(1,50))->value('id');

    return [
        'id_producto'   => $id_producto,
        'nombre_imagen' => $faker->imageUrl($width = 200, $height = 200, 'cats') 
    ];
});
