<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Direccion extends Model
{
	protected $table = 'direcciones';
	protected $fillable = [
    	'id',
		'user_id',
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