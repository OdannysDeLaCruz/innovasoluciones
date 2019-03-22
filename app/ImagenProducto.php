<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Imagen extends Model
{
    protected $table = 'imagenes';
    protected $fillable = [
    	'producto_id',
    	'imagen_url',
    ];

    public $timestamps = false;
}
