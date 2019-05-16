<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    protected $table = "pedidos";
    protected $fillable = [
        'user_id',
        'pedido_dir',
        'pedido_ref_venta',
        'promocion_id',
        'envio_id',
        'pedido_tipo_dispositivo',
        'pedido_ip_dispositivo',
        'transaccion_id'
    ];

    public $timestamps = false;
}
