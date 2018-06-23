<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CodDescuento extends Model
{
	protected $table = 'cod_descuentos';

	protected $fillable = [ 
		'nombre_descuento',
		'codigo_descuento',
		'fecha_inicio',
		'fecha_final',
		'numero_canjeo',
		'minimo_carrito',
		'tipo_descuento',
		'tipo_producto'
	];
}
