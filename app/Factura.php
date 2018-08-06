<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Factura extends Model
{
    protected $table = "facturas";
    protected $fillable = [
    	'id_user',
    	'num_pago'
    ];

    public $timestamps = false;
}
