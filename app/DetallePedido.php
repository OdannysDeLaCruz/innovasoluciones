<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetallePedido extends Model
{
    protected $table = 'detalle_pedidos';
    protected $fillable = [
    	'id_producto',
    	'id_pedido',
    	'precio_unidad',
    	'cantidad',
    	'descuento'
    ];
}
