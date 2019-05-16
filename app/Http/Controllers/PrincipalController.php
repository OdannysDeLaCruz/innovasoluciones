<?php

namespace App\Http\Controllers;
use App;
use Illuminate\Http\Request;

use Jenssegers\Agent\Agent;

class PrincipalController extends Controller
{

    public function index() {
        // $pedido_id = 19;
        // $pedido = App\Pedido::find($pedido_id);
        // $pedido->pedido_ref_venta = $reference_sale;
        // $transaccion_id = $pedido->transaccion_id;
        // $pedido->save();
        
        // // Actualizar la transaccion
        // $transaccion = App\Transaccion::find($transaccion_id);

        // $transaccion->estado                = $state_pol;
        // $transaccion->mensaje_respuesta     = $response_message_pol;
        // $transaccion->codigo_respuesta      = $response_code_pol;
        // $transaccion->valor_transaccion     = $value;
        // $transaccion->metodo_pago_tipo      = $payment_method_type;
        // $transaccion->metodo_pago_nombre    = $payment_method_name;
        // $transaccion->metodo_pago_id        = $payment_method_id;
        // $transaccion->id_transaccion        = $transaction_id;
        // $transaccion->referencia_venta_payu = $reference_pol;
        // $transaccion->tipo_moneda_transaccion = $currency;
        // $transaccion->numero_cuotas_pago    = $installments_number;
        // $transaccion->ip_transaccion        = $ip;
        // $transaccion->pse_cus               = $pse_cus ;
        // $transaccion->pse_bank              = $pse_bank;
        // $transaccion->pse_references        = $pse_reference1 . ',' . $pse_reference2 . ', ' . $pse_reference3;
        // $transaccion->fecha_transaccion     = $transaction_date;
        // $transaccion->fecha_actualizado     = $transaction_date;

        // $transaccion->save();

        // $agent = new Agent();    
        // if($agent->isDesktop()){
        //     // Sistema operativo
        //     $tipo = 'Escritorio';
        //     $sistema_operativo = $agent->platform();
        //     $version_sistema_operativo = $agent->version("$sistema_operativo NT");
        //     $browser = $agent->browser();
        // }
        // if ( $agent->isMobile() || $agent->isTablet() ) {
        //     $tipo = 'Movil o tableta';
        //     if ( $agent->isAndroidOS() || $agent->isiOS() || $agent->isWindowsPhoneOS() || $agent->isWindowsMobileOS() ) {
        //         $sistema_operativo = $agent->platform();
        //         $version_sistema_operativo = $agent->version('Android');
        //         $browser = $agent->browser();
        //     }
        // }
        // dd($tipo . ' ' . $sistema_operativo . ' ' . (int)$version_sistema_operativo . ', navegador ' . $browser);

    	// Productos nuevos, los que sean del mes actual
        $productos_nuevos = App\Producto::select('productos.*', 'promociones.promo_tipo', 'promociones.promo_costo')
                                        ->leftJoin('promociones', 'productos.promocion_id', '=', 'promociones.id')
                                        ->latest('fecha_creado')
                                        ->limit(10)
                                        ->where([
                                            ['producto_estado', '=', 1],
                                            ['producto_cant', '>', 0]
                                        ])
                                        ->get();

    	// Algunos productos, los que sean del mes actual
        $algunos_productos = App\Producto::select('productos.*', 'promociones.promo_tipo', 'promociones.promo_costo')
                                        ->leftJoin('promociones', 'productos.promocion_id', '=', 'promociones.id')               
                                        ->limit(20)
                                        ->where([
                                            ['producto_estado', '=', 1],
                                            ['producto_cant', '>', 0]
                                        ])
                                         ->get();

    	// Publicidad, algun producto en descuento
    	$publicidad = App\Producto::select('productos.*', 'promociones.promo_tipo', 'promociones.promo_costo', 'promociones.promo_publicidad')
                                ->leftJoin('promociones', 'productos.promocion_id', '=', 'promociones.id')
                                ->limit(1)
                                ->where([
                                        ['promociones.promo_publicidad', '=', 1],
                                        ['producto_estado', '=', 1],
                                        ['producto_cant', '>', 0]
                                    ])
                                ->get();

    	$publicidad = $publicidad->isEmpty() ? '' : $publicidad;

    	return view('index',
    		compact(
                'productos_nuevos',
                'algunos_productos',
                'publicidad'
    		)
    	);
    }

    public function showProductos() {

        $productos = App\Producto::select('productos.*', 'promociones.promo_tipo', 'promociones.promo_costo')
                                ->leftJoin('promociones', 'productos.promocion_id', '=', 'promociones.id')
                                ->where([
                                    ['producto_estado', '=', 1],
                                    ['producto_cant', '>', 0]
                                ])
                                ->get();
        // dd($productos);                         
        return view('productos', compact('productos'));        
    }

    // Muestra los productos de la categoria seleccionada
    public function showCategoriaProductos($seccion) {
        $seccion_id = App\Seccion::where('seccion_nombre', $seccion)->value('id');

        if($seccion_id === null){
            //Si sección no existe
            return response()->view('error.404', ['response' => 'Esta categoria no existe'], 404);
        }

        $categorias_ids = App\Categoria::select('id')->where('seccion_id', $seccion_id)->get();
       
        if($categorias_ids->isEmpty() === true){
            // Si la seccion no tiene categorias
            return view('productos', ['response' => 'Woops!, Aún no hay productos disponibles en esta categoria.']);    
        }
        foreach ($categorias_ids as $categoria) { 
            // si la seccion tiene categorias
            $categoria_id[] = $categoria['id']; 
        }

        // Selecciono los productos de dichas categorias
        $productos = App\Producto::select('productos.*', 'promociones.promo_tipo', 'promociones.promo_costo')
                                ->leftJoin('promociones', 'productos.promocion_id', '=', 'promociones.id')
                                ->where([
                                    ['producto_estado', '=', 1],
                                    ['producto_cant', '>', 0]
                                ])
                                ->whereIn('productos.categoria_id', $categoria_id)
                                ->get();
         // dd($productos);                       
        return view('productos', compact('productos'));        
    }

    // Funcion que selecciona el tipo de descripción - detalle normal ó descripción por imagenes
    public function seleccionarDescripcion($ref, $descripcion) {
        
        $descripcion = str_replace("-", " ", $descripcion);

        $producto = App\Producto::select('productos.*','promociones.promo_tipo', 'promociones.promo_costo', 'promociones.promo_publicidad')
                                ->leftJoin('promociones', 'productos.promocion_id', '=', 'promociones.id')
                                ->where('productos.producto_ref', $ref)
                                ->where('productos.producto_descripcion', $descripcion)
                                ->get();

        // Si producto no existe, mandar un error 404
        if($producto->isEmpty() === true){
            return response()->view('error.404',['response' => 'Lo sentimos, no esta disponible este producto en este momento'],404);
        }

        $producto_id = $producto[0]->id;
        // SI EL PRODUCTO TIENE producto_tieneImgDescripcion == true
        if ($producto[0]->producto_tieneImgDescripcion == 1) {

            // Estos datos van a la pagina de mostrar detalles de este producto
            $producto['ref']         = $producto[0]->producto_ref;
            // descripcion del producto
            $producto['descripcion'] = $producto[0]->producto_descripcion; 
            // descripcion que va en la url - url amigable
            $producto['descripcion-url'] = str_replace(" ", "-", $descripcion); 

            $imagenes = App\Imagen::select('id', 'producto_id', 'imagen_url')->where('producto_id', $producto_id)->get();
            return view('referencias', compact('producto', 'imagenes'));
        }

        // SI EL PRODUCTOS TIENE producto_tieneImgDescripcion == 0
        else {           
            $imagenes = App\Imagen::select('id', 'producto_id', 'imagen_url')->where('producto_id', $producto_id)->get();

            // Formatear los tags
            foreach ($producto as $product) {
                $tags = explode( ',', $product->producto_tags );
            }
            return view('detalles', compact('producto', 'imagenes', 'tags'));
        }
    }

    // Funcion que muestra los detalles del producto que viene con imagen de descripcion
    public function showDetallesCompra($ref, $descripcion) {

        $descripcion = str_replace("-", " ", $descripcion);

        $producto = App\Producto::select('productos.*','promociones.promo_tipo', 'promociones.promo_costo', 'promociones.promo_publicidad')
                                ->leftJoin('promociones', 'productos.promocion_id', '=', 'promociones.id')
                                ->where('productos.producto_ref', $ref)
                                ->where('productos.producto_descripcion', $descripcion)
                                ->get();
        // Formatear los tags
        foreach ($producto as $product) {
            $tags = explode( ',', $product->producto_tags );
        }

        return view('detalles_referencia', compact('producto', 'tags'));
    }
}