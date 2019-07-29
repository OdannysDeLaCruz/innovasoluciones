<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DireccionPedido extends Model
{
    protected $table = 'direccion_pedido';
	protected $fillable = [
    	'id',
		'pedido_id',
		'nombre',
		'apellido',
		'pais',
		'estado',
		'ciudad',
		'direccion',
		'telenofo',
		'codigo_postal',
    ];
    public $timestamps = false;
}
