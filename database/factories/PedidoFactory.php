<?php
use Illuminate\Support\Facades\Auth;
use Faker\Generator as Faker;

$factory->define(App\Pedido::class, function (Faker $faker) {

	$id_user = App\User::where('id',rand(1, 6))->value('id');
	$codigo_descuento = App\CodDescuento::where('id', rand(1,21))->value('codigo_descuento');
    
    return [
        'id_user'             => $id_user,
        'direccion_envio'     => $faker->address,
        'metodo_pago'         => $faker->word,
        'codigo_descuento'    => $codigo_descuento,
        'estado'              => rand(0, 1),
    ];
});
