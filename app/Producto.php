<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $table = 'productos';
    protected $fillable = [
    	'id_categoria',
    	'descripcion',
        'imagen',
        'precio',
    	'cant_disponible',
    	'disponibilidad'
    ];
}
