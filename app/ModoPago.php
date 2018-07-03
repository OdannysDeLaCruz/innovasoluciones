<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ModoPago extends Model
{
    protected $table = "modo_pago";
    protected $fillable = [
    	'num_pago',
    	'nombre_pago',
    ];
}
