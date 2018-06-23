<?php

use Faker\Generator as Faker;

$factory->define(App\CodDescuento::class, function (Faker $faker) {
	
    $minimo_carrito = [0, 300000, 500000, 1000000];
    $carrito = $minimo_carrito[ rand(0,3) ];

    if($carrito >= 300000) {
    	$desc = '10%';
    }
    if($carrito >=500000) {
    	$desc = '20%';
    }
    if ($carrito >= 1000000) {
    	$desc = 'Envio gratis';
    }
    $desc = '5%';
    return [
        'nombre_descuento'  => 'Descuento #' . rand(99,999),
        'codigo_descuento'  => rand(99,999) . $faker->word(rand(5,10)) . rand(99,999),
        'fecha_inicio'      => $faker->date,
        'fecha_final'       => $faker->date,
        'numero_canjeo'     => rand(10, 20),
        'minimo_carrito'    => $carrito == 0 ? null : $carrito,
        'tipo_descuento'    => $desc,
        'tipo_producto'     => App\Categoria::where('id', rand(1,15))->value('id')
    ];
});