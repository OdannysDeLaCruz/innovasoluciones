<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    protected $table = 'proveedores';
    protected $fillable = [
     	'proveedor_razon_social',
		'proveedor_representante',
		'proveedor_email'
    ];
    public $timestamps = false;
}
