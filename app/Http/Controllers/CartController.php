<?php

namespace App\Http\Controllers;
use App;
use Illuminate\Http\Request;

class CartController extends Controller
{
	
    public function __construct()
    {
		// Crear carrito
        if (!session()->has('cart')) {
			session()->put('cart', []);
			session()->put('total_del_pedido', '');
		}
    }

	// Mostrar carrito
    public function show() {
        $cart = session('cart');
        // Sacar total del pedido
        $this->total();
        return view('carrito', compact('cart'));
    }
    
    // Agragar item al carrito
    // public function add($id, $descripcion) {

    // 	$producto = App\Producto::select('id', 'descripcion', 'imagen', 'precio', 'descuento', 'tamaño', 'color')->where('id', $id)->where('descripcion', $descripcion)->get();

    // 	foreach ($producto as $prod) {
    // 		$dato['id']           = $prod->id;
    // 		$dato['descripcion']  = $prod->descripcion;
    // 		$dato['imagen']       = $prod->imagen;
    // 		$dato['precio']       = $prod->precio;
    // 		$dato['cantidad']     = 1;
    // 		$dato['descuento_%']  = $prod->descuento;

    // 		$total                  = $dato['precio'] * $dato['cantidad'];
    // 		$dato['descuento_peso'] = $total * ($dato['descuento_%'] / 100);
    // 		$dato['total']          = $total - $dato['descuento_peso'];

    // 		// Para cuando se verifique el codigo de descuento
    // 		$dato['descuento_codigo'] = 0;

    // 		$dato['tamaño']       = $prod->tamaño;
    // 		$dato['color']        = $prod->color;
    // 	}

    //     $cart = session('cart');
    //     $cart[$dato['id']] = $dato;
    //     session()->put('cart', $cart);
    //     // Sacar total del pedido
    //     $this->total();
    //     return redirect()->route('verificar');
    // }

    // Agragar item al carrito, metodo post
    public function add(Request $request) {

        $id = $request->input('id');
        $descripcion = $request->input('descripcion');
        $colorEscogido = $request->input('colores');
        $tallaEscogido = $request->input('tallas');

        $producto = App\Producto::select('id', 'descripcion', 'imagen', 'precio', 'descuento', 'tamaño', 'color')->where('id', $id)->where('descripcion', $descripcion)->get();

        foreach ($producto as $prod) {
            $dato['id']           = $prod->id;
            $dato['descripcion']  = $prod->descripcion;
            $dato['imagen']       = $prod->imagen;
            $dato['precio']       = $prod->precio;
            $dato['cantidad']     = 1;
            $dato['descuento_%']  = $prod->descuento;

            $total                  = $dato['precio'] * $dato['cantidad'];
            $dato['descuento_peso'] = $total * ($dato['descuento_%'] / 100);
            $dato['total']          = $total - $dato['descuento_peso'];

            // Para cuando se verifique el codigo de descuento
            $dato['descuento_codigo'] = 0;

            $dato['color']       = $colorEscogido;
            $dato['talla']        = $tallaEscogido;
        }

        $cart = session('cart');
        $cart[$dato['id']] = $dato;
        session()->put('cart', $cart);
        // Sacar total del pedido
        $this->total();
        return redirect()->route('verificar');
    }

    // Eliminar item del carrito
    public function delete($id) {
    	$cart = session('cart');
    	unset($cart[$id]);
    	session()->put('cart', $cart);
    	return redirect()->route('showCart');
    }

    // Actualizar item del carrito
    public function update($id, $cantidad_nueva) {
    	$cart = session('cart');
    	// Asignamos cantidad_nueva a la cantidad anterior para actualizar
    	$cart[$id]['cantidad'] = $cantidad_nueva;
    	// Calculo el precio_nuevo multiplicando el precio normal del producto por la cantidad_nueva
    	$precio_nuevo  = $cart[$id]['precio'] * $cart[$id]['cantidad'];
    	// Calculo el descuento_peso 
    	$cart[$id]['descuento_peso'] = $precio_nuevo * ( $cart[$id]['descuento_%'] / 100 );
    	// total_nuevo
    	$cart[$id]['total'] = $precio_nuevo - $cart[$id]['descuento_peso'];
    	session()->put('cart', $cart);
    	
    	return redirect()->route('showCart');
    }

    // Obtenemos el total del pedido
    public function total() {
    	$cart = session('cart');
    	$total = 0;
    	foreach ($cart as $precio) {
    		$total += $precio['total'];
    	}

        session()->put('total_del_pedido', $total);
    }

}
