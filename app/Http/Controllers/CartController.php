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
        // dd(key($cart));
        // Sacar total del pedido
        $this->total();
        return view('carrito', compact('cart'));
    }
    
    // Agragar item al carrito, metodo post
    public function add(Request $request) {

        // Obtener los datos que vienen del formulario de pagina detalles
        $id = $request->input('id');
        $producto_ref  = $request->input('producto_ref');
        // Color y Talla escogidos por el usuario
        $colorEscogido = $request->input('colores');
        $tallaEscogido = $request->input('tallas');

        

        $producto = App\Producto::select('id', 'producto_nombre', 'producto_descripcion', 'producto_ref', 'producto_imagen', 'producto_precio', 'promocion_id')
                                ->where('id', $id)
                                ->where('producto_ref', $producto_ref)
                                ->get();                    
        foreach ($producto as $prod) {
            $dato['id']           = $prod->id;
            $dato['producto_ref'] = $prod->producto_ref;
            $dato['nombre'] = $prod->producto_nombre;
            $dato['descripcion']  = $prod->producto_descripcion;
            $dato['referencia']   = $prod->producto_ref;
            $dato['imagen']       = $prod->producto_imagen;
            $dato['precio']       = floatval($prod->producto_precio);
            $dato['cantidad']     = 1;
            $dato['color']        = $colorEscogido;
            $dato['talla']        = $tallaEscogido;
            $total                = $dato['precio'] * $dato['cantidad'];

            // Verificar si tiene algún tipo de promoción
            $promocion_id = $prod->promocion_id;
            if($promocion_id != null){
                $promo = App\Promocion::select('promo_costo', 'promo_tipo', 'promo_inicio', 'promo_final', 'promo_numero_canjeo', 'promo_minimo_pedido')
                                      ->where('id', $promocion_id)
                                      ->get();

                // Verificar que tipo de descuento tiene
                // Hay tres tipo de descuentos, descuento%, peso, 2x1
               
                $dato['promo_costo'] = $promo[0]->promo_costo;
                $dato['promo_tipo'] = $promo[0]->promo_tipo;

                switch ($dato['promo_tipo']) {
                    case '%':
                        $dato['promocion'] = $dato['promo_costo'] . '%';
                        $descuento = $total * ($dato['promo_costo'] / 100);
                        $dato['total'] = $total - $descuento;
                        break; 
                    case '$':
                        $dato['promocion'] = $dato['promo_costo'];
                        $descuento = $dato['promo_costo'] * $dato['cantidad']; 
                        $dato['total'] = $total - $descuento;
                        break;
                    case '2x1':
                        $dato['promocion'] = '2x1';
                        $dato['total'] = $total;
                        break;
                }
            }
            else {
                $dato['promocion']   = '';
                $dato['total'] = $total;
            }           
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

        // Verificar si no hay producto en en cart, si no hay eliminar todas variables de session creadas
        if (count(session('cart')) == 0 ) {
            $datos_session = ['cart', 'codigos_usados', 'descuento_realizado', 'descuento_peso', 'total_pagar','total_del_pedido','tipo_envio', 'promocion_id'];
            foreach ($datos_session as $session) {
                if (session()->has($session)) {
                    session()->forget($session);
                }                
            }
        }

    	// return redirect()->route('showCart');
        $this->total();
        return back();
    }

    // Actualizar item del carrito
    public function update($id, $cantidad_nueva) {
    	$cart = session('cart');
    	// Asignamos cantidad_nueva a la cantidad anterior para actualizar
    	$cart[$id]['cantidad'] = intval($cantidad_nueva);
    	// Calculo el precio_nuevo multiplicando el precio normal del producto por la cantidad_nueva
    	$precio_nuevo  = $cart[$id]['precio'] * $cart[$id]['cantidad'];
        // Calculo el precio nuevo total
        // Verificao si promo_tipo existe en el array del producto a actualizar
        if(array_key_exists('promo_tipo', $cart[$id])) {
            switch ($cart[$id]['promo_tipo']) {
                case '%':
                    $descuento = $precio_nuevo * ($cart[$id]['promo_costo'] / 100);
                    $cart[$id]['total'] = $precio_nuevo - $descuento;
                    break; 
                case '$':
                    $descuento = $cart[$id]['promo_costo']; 
                    $cart[$id]['total'] = $precio_nuevo - ( $descuento * $cart[$id]['cantidad']);
                    break;
                case '2x1':
                    $cart[$id]['total'] = $precio_nuevo;
                    break;
            }
        }
        else {
             $cart[$id]['total'] = $precio_nuevo;
        }

    	session()->put('cart', $cart);
    	
    	// return redirect()->route('showCart');
        $this->total();
        return back();
    }

    // Obtenemos el total del pedido
    public function total() {
        if(session('cart')) {
    	    $cart = session('cart');
        	$total = 0;
        	foreach ($cart as $producto) {
        		$total += $producto['total'];
            }
            session()->put('total_del_pedido', $total);            
        }
    }

}
