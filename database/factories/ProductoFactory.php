<?php

use Faker\Generator as Faker;

$factory->define(App\Producto::class, function (Faker $faker) {
    date_default_timezone_set('America/Bogota');
    
	$categoria_id = App\Categoria::where('id', rand(1,15))->value('id');

    $productos_precios = [10000,20000,30000,40000,50000];
    $producto_precio = $productos_precios[rand(0, 4)];

    $descuentos = [0,20,40,60,70,80];
    $descuento = $descuentos[ rand(0,5) ];

    $tags = ['celular', 'cel', 'zapatos', 'joyas', 'ruedas', 'tv', 'televisor', 'tennis', 'pc', 'computadores', 'tablets', 'portatiles', 'smartphones', 'phone', 'cadenas', 'perlas', 'mause', 'cargador', 'reloj', 'plasma'];

    $mis_tags = $tags[rand(0, count($tags) - 1)] . ',' . $tags[rand(0, count($tags) - 1)] . ',' . $tags[rand(0, count($tags) - 1)] . ',' . $tags[rand(0, count($tags) - 1)] . ',' . $tags[rand(0, count($tags) - 1)];

    $cant = rand(0,10);
    $estado = $cant != 0 ? 1 : 0;

    return [
        'categoria_id'          => $categoria_id,
        'producto_nombre'       => $faker->text(20),
        'producto_descripcion'  => $faker->text(150),
        'producto_tags'         => $mis_tags,
        'producto_ref'          => strtoupper($faker->word) . rand(rand(0, 999), rand(1000,9999)),
        'producto_imagen'       => $faker->imageUrl($width = 200, $height = 200),
        'producto_precio'       => $producto_precio,
        'promocion_id'          => rand(1,3),
        'producto_tallas'       => '28, 30, 32, 50X20, 160X100',
        'producto_colores'      => 'verdes, rojos, negros, azules',
        'producto_tieneImgDescripcion' => rand(0,1),
        'producto_cant'         => $cant,
        'producto_estado'       => $estado,
    ];
});
