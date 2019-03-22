<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Codigo extends Model
{
	protected $table = 'codigos';

	protected $fillable = [
		'codigo_nombre',
        'codigo_texto',
        'codigo_fecha_inicio',
    	'codigo_fecha_final',
        'codigo_numero_canjeo',
        'codigo_minimo_carrito',
        'codigo_descuento_porciento',
        'categoria_id'
	];
	public $timestamps = false;
}
