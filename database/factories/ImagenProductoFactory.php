<?php

use Faker\Generator as Faker;

$factory->define(App\Imagen::class, function (Faker $faker) {

	$producto_id = App\Producto::where('id', rand(1,10))->value('id');

    return [
        'producto_id' => $producto_id,
        'imagen_url'  => '1562990851_03 p Mi band 3 1.jpg' 
    ];
});
