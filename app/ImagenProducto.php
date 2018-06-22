<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ImagenProducto extends Model
{
    protected $table = 'imagenes_productos';
    protected $fillable = [
    	'id_producto',
    	'nombre_imagen',
    ];
}
