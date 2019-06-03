<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class CrearPromocionesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
    	App\Promocion::create([ 
	        'promo_nombre' => 'Descuento # 1',
            'promo_tipo' => '%',
	        'promo_costo' => 10,
            'promo_publicidad' => true, 
            'promo_banner_publicidad' => $faker->imageUrl($width = 200, $height = 200, 'cats'), 
	        'promo_inicio' => '2019-01-01 01:00:00',
        	'promo_final' => '2019-12-31 00:00:00',
	        'promo_numero_canjeo' => 3,
	        'promo_minimo_pedido' => 50000
    	]);
        App\Promocion::create([ 
            'promo_nombre' => 'Descuento # 2',
            'promo_tipo' => '$',
            'promo_costo' => 10000,
            'promo_publicidad' => false, 
            'promo_banner_publicidad' => $faker->imageUrl($width = 200, $height = 200, 'cats'), 
            'promo_inicio' => '2019-01-01 01:00:00',
            'promo_final' => '2019-12-31 00:00:00',
            'promo_numero_canjeo' => 3,
            'promo_minimo_pedido' => 50000
        ]);
        App\Promocion::create([ 
            'promo_nombre' => 'Descuento # 3',
            'promo_tipo' => '2x1',
            'promo_costo' => 0,
            'promo_publicidad' => true, 
            'promo_banner_publicidad' => $faker->imageUrl($width = 200, $height = 200, 'cats'), 
            'promo_inicio' => '2019-01-01 01:00:00',
            'promo_final' => '2019-12-31 00:00:00',
            'promo_numero_canjeo' => 3,
            'promo_minimo_pedido' => 50000
        ]);
    }
}

