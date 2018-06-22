<?php

use Faker\Generator as Faker;

$factory->define(App\Categoria::class, function (Faker $faker) {

	$id_seccion = App\Seccion::where('id', rand(1,3))->value('id');
    return [
        'id_seccion'  => $id_seccion,
        'nombre'      => $faker->unique->word,
        'descripcion' => $faker->text(50)
    ];
});
