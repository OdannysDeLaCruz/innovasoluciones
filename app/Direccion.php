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
		'estado',
		// 'distrito',
		'ciudad',
		// 'barrio',
		// 'calle',
		// 'numero',
		'direccion',
		'codigo_postal',
    ];
    public $timestamps = false;

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}