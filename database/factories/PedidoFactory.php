<?php

use Faker\Generator as Faker;

$factory->define(App\Pedido::class, function (Faker $faker) {

	$id_user = App\User::where('id',rand(1,6))->value('id');

    return [
        'id_user'         => $id_user,
        'fecha'           => $faker->date,
        'direccion_envio' => $faker->address,
        'metodo_pago'     => $faker->word,
        'total_pago'      => rand(0, 9999999),
    ];
});
