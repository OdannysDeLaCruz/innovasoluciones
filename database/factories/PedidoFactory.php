<?php
use Illuminate\Support\Facades\Auth;
use Faker\Generator as Faker;

$factory->define(App\Pedido::class, function (Faker $faker) {
    date_default_timezone_set('America/Bogota');
    
    $id_user = App\User::where('id',rand(1, 7))->value('id');    
    $nombre = App\User::where('id', $id_user)->value('nombre');    
	$apellido = App\User::where('id', $id_user)->value('apellido');    

    return [
        'id_user'          => $id_user,
        'comprador'        => $nombre . ' ' . $apellido,
        'ref_venta'        => 'Obtener de Payu',
        'direccion_envio'  => $faker->address,
        'modo_pago'        => 'Obtener de Payu',
        'codigo_descuento' => 'Obtener de session',
        'modo_envio'       => 'Obtener de session',
        'estado_pedido'    => 'Obtener de Payu',
        'fecha_pedido'     => date('Y-n-j H:i:s'),
    ];
});
