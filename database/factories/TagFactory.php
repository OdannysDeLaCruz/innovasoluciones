<?php

use Faker\Generator as Faker;

$factory->define(App\Tag::class, function (Faker $faker) {

	$tags = ['celular', 'cel', 'zapatos', 'joyas', 'ruedas', 'tv', 'televisor', 'tennis', 'pc', 'computadores', 'tablets', 'portatiles', 'smartphones', 'phone', 'cadenas', 'perlas', 'mause', 'cargador', 'reloj', 'plasma'];

	$tag_name = $tags[ rand( 0, count($tags) - 1 ) ];
	$id_producto = App\Producto::where('id', rand(1,50))->value('id');

    return [
        'tag_name' => $tag_name,
        'id_producto' => $id_producto
    ];
});
