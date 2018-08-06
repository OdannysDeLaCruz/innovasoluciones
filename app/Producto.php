<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $table = 'productos';
    protected $fillable = [
    	'id_categoria',
        'descripcion',
    	'tags',
        'imagen',
        'precio',
        'descuento',
        'tamaño',
        'color',
    	'cant_disponible',
    	'disponibilidad'
    ];
    public $timestamps = false;
}
