<?php

namespace App\Http\Controllers;
use App;
use Illuminate\Http\Request;

use Jenssegers\Agent\Agent;

class PrincipalController extends Controller
{

    public function index() {
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
                                        ->latest('fecha_creado')             
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
        // return view('home');
    }
    public function showProductos() {
        $productos = App\Producto::select('productos.*', 'promociones.promo_tipo', 'promociones.promo_costo')
                                ->leftJoin('promociones', 'productos.promocion_id', '=', 'promociones.id')
                                ->where([
                                    ['producto_estado', '=', 1],
                                    ['producto_cant', '>', 0]
                                ])
                                ->paginate(40);
        return view('productos', compact('productos'));        
    }

    // Muestra los productos de la categoria seleccionada
    public function showCategoriaProductos($seccion) {
        $seccion_id = App\Seccion::where('seccion_nombre', $seccion)->value('id');
        if($seccion_id){
            $categorias_ids = $this->obtenerCategoriasSeccion($seccion_id);
            if($categorias_ids){
                // Selecciono los productos de dichas categorias
                $productos = $this->obtenerProductos($categorias_ids);
                if(!$productos->isEmpty()) {
                    return view('productos', compact('productos'));
                }else {
                     return view('productos', ['response' => 'Woops!, Aún no hay productos disponibles en esta categoria.']);
                }
            }else {
                return view('productos', ['response' => 'Woops!, Aún no hay productos disponibles en esta categoria.']);
            }
        }else {
            //Si sección no existe
            return response()->view('error.404', ['response' => 'Esta categoria no existe'], 404);
        }        
    }

    // Funcion que selecciona el tipo de descripción - detalle normal ó descripción por imagenes
    public function seleccionarDescripcion($ref, $nombre) {
        $nombre = str_replace("_", " ", $nombre);
        $producto = App\Producto::select('productos.*','promociones.promo_tipo', 'promociones.promo_costo', 'promociones.promo_publicidad')
                                ->leftJoin('promociones', 'productos.promocion_id', '=', 'promociones.id')
                                ->where('productos.producto_ref', $ref)
                                ->where('productos.producto_nombre', $nombre)
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
            $producto['nombre']         = $producto[0]->producto_nombre;
            // descripcion del producto
            $producto['descripcion'] = $producto[0]->producto_descripcion; 
            // descripcion que va en la url - url amigable
            $producto['nombre-url'] = str_replace(" ", "-", $nombre); 

            $imagenes = App\Imagen::select('id', 'producto_id', 'imagen_url')->where('producto_id', $producto_id)->get();
            $videos = App\VideoProducto::select('id', 'producto_id', 'video_url')->where('producto_id', $producto_id)->get();
            return view('referencias', compact('producto', 'imagenes', 'videos'));
        }

        // Si producto_tieneImgDescripcion == 0
        else {           
            $imagenes = App\Imagen::select('id', 'producto_id', 'imagen_url')->where('producto_id', $producto_id)->get();
            $videos = App\VideoProducto::select('id', 'producto_id', 'video_url')->where('producto_id', $producto_id)->get();

            // Formatear los tags
            foreach ($producto as $product) {
                $tags = explode( ',', $product->producto_tags );
            }
            return view('detalles', compact('producto', 'imagenes', 'tags', 'videos'));
        }
    }

    // Funcion que muestra los detalles del producto que viene con imagen de descripcion
    public function showDetallesCompra($ref, $nombre) {

        $nombre = str_replace("-", " ", $nombre);

        $producto = App\Producto::select('productos.*','promociones.promo_tipo', 'promociones.promo_costo', 'promociones.promo_publicidad')
                                ->leftJoin('promociones', 'productos.promocion_id', '=', 'promociones.id')
                                ->where('productos.producto_ref', $ref)
                                ->where('productos.producto_nombre', $nombre)
                                ->get();
        // Formatear los tags
        foreach ($producto as $product) {
            $tags = explode( ',', $product->producto_tags );
        }

        return view('detalles_referencia', compact('producto', 'tags'));
    }

    // Obtener categorias por de la seccion en cuestion
    private function obtenerCategoriasSeccion($key) {
        $categorias_ids = App\Categoria::select('id')->where('seccion_id', $key)->get();
        if ($categorias_ids->isEmpty() != true) {
            foreach ($categorias_ids as $categoria) {
                $categorias_id[] = $categoria['id']; 
            }
            return $categorias_id;
        }else {
            return false;
        }
    }

    /**
     * Funcion para obtener productos
     *
     * @param  int  $ids
     * @return \Illuminate\Http\Response
     */
    private function obtenerProductos($ids) {
        // dd($ids);
        $productos = App\Producto::select('productos.*', 'promociones.promo_tipo', 'promociones.promo_costo')
                                ->leftJoin('promociones', 'productos.promocion_id', '=', 'promociones.id')
                                ->latest('fecha_creado')
                                ->limit(10)
                                ->where([
                                    ['producto_estado', '=', 1],
                                    ['producto_cant', '>', 0]
                                ])
                                ->whereIn('productos.categoria_id', $ids)
                                ->paginate(20);
        // dd($productos);
        return $productos;
    }
}