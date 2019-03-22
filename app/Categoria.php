<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $table = 'categorias';
    protected $fillable = [
    	'seccion_id',
    	'categoria_nombre',
    	'categoria_descripcion',
    	'fecha_creado'
    ];
    public $timestamps = false;
}
