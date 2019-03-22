<?php

use Faker\Generator as Faker;

$factory->define(App\Categoria::class, function (Faker $faker) {
	date_default_timezone_set('America/Bogota');
	
	$seccion_id = App\Seccion::where('id', rand(1,3))->value('id');
    return [
        'seccion_id'     => $seccion_id,
        'categoria_nombre' => $faker->unique->word,
        'categoria_descripcion' => $faker->text(50), 
    ];
});
