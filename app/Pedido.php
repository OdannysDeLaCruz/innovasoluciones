<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    protected $table = "pedidos";
    protected $fillable = [
        'id_user',
        'comprador',
        'ref_venta',
        'direccion_envio',
        'modo_pago',
        'codigo_descuento',
        'modo_envio',
        'estado_pedido',
        'fecha_pedido'
    ];

    public $timestamps = false;
}
