<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $table = 'productos';
    protected $fillable = [
        'categoria_id',
        'producto_descripcion',
        'producto_tags',
        'producto_ref',
        'producto_imagen',
        'producto_precio',
        'producto_descuento',
        'producto_tallas',
        'producto_colores',
        'producto_tieneImgDescripcion',
        'producto_cant',
        'producto_estado'
    ];
    public $timestamps = false;
}
