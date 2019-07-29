<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Direccion extends Model
{
	protected $table = 'direcciones';
	protected $fillable = [
    	'id',
		'user_id',
		'nombre',
		'apellido',
		'pais',
		'estado',
		'ciudad',
		'direccion',
		'telefono',
		'codigo_postal',
		'defecto',
    ];
    public $timestamps = false;

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}