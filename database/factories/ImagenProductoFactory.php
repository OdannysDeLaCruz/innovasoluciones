<?php

use Faker\Generator as Faker;

$factory->define(App\Imagen::class, function (Faker $faker) {

	$producto_id = App\Producto::where('id', rand(1,50))->value('id');

    return [
        'producto_id' => $producto_id,
        'imagen_url'  => $faker->imageUrl($width = 200, $height = 200, 'cats') 
    ];
});
