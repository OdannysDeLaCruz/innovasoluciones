<?php

use Faker\Generator as Faker;

$factory->define(App\DetallePedido::class, function (Faker $faker) {
   
    $producto  = App\Producto::where('id', rand(1,30))->get();
    $id_pedido = App\Pedido::where('id', rand(1,5))->value('id');
    $id_factura = App\Factura::where('id', rand(1,50))->value('id');
    
    $cantidad     = rand(1, 5);
    $precio       = $producto[0]->precio;
    $descuento    = $producto[0]->descuento;

    $precio_neto   = ($precio * $cantidad);
    $descuento     = $descuento / 100;
    $a_descontar   = $precio_neto * $descuento;
    $importe_total = $precio_neto - $a_descontar;

    $tallas = [ '20x20', '45x60', '26', '28', '30', '30', '22' ];
    $colores = ['rojo', 'azul', 'negro', 'marron', 'blanco'];
   
    return [
        'id_producto'   => $producto[0]->id,
        'id_pedido'     => $id_pedido,
        'id_factura'    => $id_factura,
        'descripcion'   => $producto[0]->descripcion,
        'imagen'        => $producto[0]->imagen,
        'precio'        => $producto[0]->precio,
        'descuento_porcentual'     => $producto[0]->descuento,
        'tamaño'        => $tallas[rand(0, 6)],
        'color'         => $colores[rand(0, 4)],
        'cantidad'      => $cantidad,
        'importe_total' => number_format($importe_total),
    ];
});
