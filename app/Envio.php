<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Envio extends Model
{
    protected $table = "envios";
    protected $fillable = ['envio_metodo'];

    public $timestamps = false;
}
