<?php

use Faker\Generator as Faker;

$factory->define(App\Factura::class, function (Faker $faker) {
	$numeros = [11111, 22222, 33333, 44444, 55555];
	$id_user = App\User::where('id', rand(1, 6))->value('id');
	$num_pago = App\ModoPago::where('num_pago', $numeros[rand(0, 4)])->value('num_pago');
    return [
        'id_user' => $id_user,
        'num_pago' => $num_pago
    ];
});
