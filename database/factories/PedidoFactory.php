<?php
use Illuminate\Support\Facades\Auth;
use Faker\Generator as Faker;

$factory->define(App\Pedido::class, function (Faker $faker) {

	$id_user = App\User::where('id',rand(1, 6))->value('id');
	$codigo_descuento = App\CodDescuento::where('id', rand(1,21))->value('codigo_descuento');
	$numeros = [11111, 22222, 33333, 44444, 55555];
	$num_pago = App\ModoPago::where('num_pago', $numeros[rand(0,4)]);
    
    return [
        'id_user'          => $id_user,
        'direccion_envio'  => $faker->address,
        'modo_pago'        => $num_pago,
        'codigo_descuento' => $codigo_descuento,
        'estado_pedido'    => rand(0, 1),
    ];
});
