<?php
use Illuminate\Support\Facades\Auth;
use Faker\Generator as Faker;

$factory->define(App\Pedido::class, function (Faker $faker) {
    date_default_timezone_set('America/Bogota');
    
	$id_user = App\User::where('id',rand(1, 6))->value('id');    
    $numeros = [11111, 22222, 33333, 44444, 55555];
    $id_modo_pago = App\ModoPago::where('num_pago', $numeros[rand(0,4)])->value('id');

	$codigo_descuento = app\CodDescuento::where('id', rand(1, 23))->value('codigo_descuento');

    $envios = [0, 16000];
    return [
        'id_user'              => $id_user,
        'direccion_envio'      => $faker->address,
        'id_modo_pago'         => $id_modo_pago,
        'codigo_descuento'     => $codigo_descuento,
        'envio'                => $envios[rand(0,1)],
        'estado_pedido'        => rand(0, 1),
        'fecha_pedido'         => date('Y-n-j H:i:s'),
    ];
});
