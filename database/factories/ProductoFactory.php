<?php

use Faker\Generator as Faker;

$factory->define(App\Producto::class, function (Faker $faker) {
    date_default_timezone_set('America/Bogota');
    
	$id_categoria = App\Categoria::where('id', rand(1,15))->value('id');

    $precio_productos = [10,20,30,40,50,60,70,80,90];
    $precio = $precio_productos[rand(0, 8)];

    $descuentos = [0,20,40,60,70,80];
    $desc = $descuentos[ rand(0,5) ];

    $tags = ['celular', 'cel', 'zapatos', 'joyas', 'ruedas', 'tv', 'televisor', 'tennis', 'pc', 'computadores', 'tablets', 'portatiles', 'smartphones', 'phone', 'cadenas', 'perlas', 'mause', 'cargador', 'reloj', 'plasma'];

    $mis_tags = $tags[rand(0, count($tags) - 1)] . ',' . $tags[rand(0, count($tags) - 1)] . ',' . $tags[rand(0, count($tags) - 1)] . ',' . $tags[rand(0, count($tags) - 1)] . ',' . $tags[rand(0, count($tags) - 1)];

    return [
        'id_categoria'    => $id_categoria,
        'descripcion'     => $faker->text(50),
        'tags'            => $mis_tags,
        'referencia'      => $faker->word . rand(0,100) . $faker->word,
        'imagen'          => $faker->imageUrl($width = 200, $height = 200),
        'precio'          => $precio,
        'descuento'       => $desc,
        'tallas'          => $faker->word,
        'colores'         => $faker->word,
        'tiempo_entrega'  => $faker->word,
        'tieneImgDescripcion'  => rand(0,1),
        'cant_disponible' => rand(0,10),
        'fecha_creado'    => date('Y-n-j H:i:s')
    ];
});
