<?php
use Illuminate\Support\Facades\Auth;
use Faker\Generator as Faker;

$factory->define(App\Pedido::class, function (Faker $faker) {
    date_default_timezone_set('America/Bogota');
    
    $user_id = App\User::where('id', rand(1, 7))->value('id');
    $pedido_dir = App\User::where('id', $user_id)->value('usuario_direccion');   

    return [
        'user_id'                 => $user_id,
        'pedido_dir'              => $pedido_dir,
        'pedido_ref_venta'        => '',
        'promocion_id'            => rand(1,3),
        'envio_id'                => rand(1,2),
        'pedido_tipo_dispositivo' => '',
        'pedido_ip_dispositivo'   => '127.0.0.1',
        'transaccion_id'          => null
    ];
});