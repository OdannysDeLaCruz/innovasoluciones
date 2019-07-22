<?php

use Faker\Generator as Faker;

$factory->define(App\Marca::class, function (Faker $faker) {

    return [
        'marca_nombre' => 'Marca_' . rand(0, 999),
		'marca_descripcion' => $faker->text(50),
		'marca_logo' => 'marca.jpg'
    ];
});
