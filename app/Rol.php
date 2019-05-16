<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
	protected $table = "roles";
    protected $fillable = ['rol_nombre'];

    public $timestamps = false;
}
