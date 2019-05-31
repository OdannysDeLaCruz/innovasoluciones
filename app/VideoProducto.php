<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VideoProducto extends Model
{
	protected $table = 'videos';
    protected $fillable = [
    	'producto_id',
    	'video_url',
    ];

    public $timestamps = false;
}
