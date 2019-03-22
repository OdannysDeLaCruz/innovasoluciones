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
        'codigo_utilizado_id',
        'envio_id',
        'metodo_pago_id',
        'pedido_estado'
    ];

    public $timestamps = false;
}
