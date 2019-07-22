<?php

use Faker\Generator as Faker;

$factory->define(App\Proveedor::class, function (Faker $faker) {
    return [
        'proveedor_razon_social'  => 'Proveedor_' . rand(1, 99999),
		'proveedor_representante' => $faker->firstName . ' ' . $faker->lastName,
		'proveedor_email'         => 'proveedor' . rand(0,999) . '@gmail.com',
    ];
});
