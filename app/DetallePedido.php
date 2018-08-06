<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetallePedido extends Model
{
    protected $table = 'detalle_pedidos';
    protected $fillable = [
    	'id_producto',
    	'id_pedido',
    	'descripcion',
    	'imagen',
    	'precio',
    	'descuento_porcentual',
    	'tamaño',
		'color',
		'cantidad',
		'importe_total'
    ];

    public $timestamps = false;
}
