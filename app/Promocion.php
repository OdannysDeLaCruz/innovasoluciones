<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Promocion extends Model
{
    protected $table = 'promociones';

	protected $fillable = [
        'promo_nombre',
        'promo_tipo',
        'promo_costo',
    	'promo_publicidad',
    	'promo_banner_publicidad',
        'promo_inicio',
        'promo_final',
        'promo_numero_canjeo',
        'promo_minimo_pedido',
        'categoria_id'
	];
	public $timestamps = false;

    public function producto()
    {
        return $this->hasMany('App\Producto', 'promocion_id');
    }
}
