<?php

use Faker\Generator as Faker;

$factory->define(App\Pedido::class, function (Faker $faker) {

	$id_user = App\User::where('id',rand(1,6))->value('id');
	$id_codigo_descuento = App\CodDescuento::where('id', rand(1,21))->value('id');
    return [
        'id_user'             => $id_user,
        'direccion_envio'     => $faker->address,
        'metodo_pago'         => $faker->word,
        'id_codigo_descuento' => $id_codigo_descuento,
        'total_pago'          => rand(0, 9999999),
        'estado'              => rand(0, 1),
    ];
});
