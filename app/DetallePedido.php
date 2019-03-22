<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetallePedido extends Model
{
    protected $table = 'detalle_pedidos';
    protected $fillable = [
    	'pedido_id',
        'detalle_descripcion',
        'detalle_imagen',
        'detalle_precio',
        'detalle_cantidad',
        'detalle_precio_final',
        'detalle_talla',
        'detalle_color'
    ];

    public $timestamps = false;
}
