<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DireccionPedido extends Model
{
    protected $table = 'direccion_pedido';
	protected $fillable = [
    	'id',
		'pedido_id',
		'pais',
		'departamento',
		'distrito',
		'ciudad',
		'barrio',
		'calle',
		'numero',
		'codigo_postal',
    ];
    public $timestamps = false;
}
