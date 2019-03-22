<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Seccion extends Model
{
    protected $table = "secciones";
    protected $fillable = [
    	'seccion_nombre',
    	'seccion_descripcion',
    	'seccion_imagen'
    ];

    public $timestamps = false;
}
