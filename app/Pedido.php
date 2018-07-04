<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    protected $table = "pedidos";
    protected $fillable = [
    	'id_user',
    	'fecha',
    	'direccion_envio',
    	'modo_pago',
    	'codigo_descuento',
    	'estado'
    ];
}
