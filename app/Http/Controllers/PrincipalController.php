<?php

namespace App\Http\Controllers;
use App;
use Illuminate\Http\Request;

class PrincipalController extends Controller
{
    public function index() {

    	// Productos nuevos, los que sean del mes actual
        $productos_nuevos = App\Producto::select('productos.id','productos.categoria_id','productos.producto_descripcion','productos.producto_imagen','productos.producto_precio','productos.promocion_id', 'productos.fecha_creado', 'promociones.promo_tipo', 'promociones.promo_costo')
                                        ->join('promociones', 'productos.promocion_id', '=', 'promociones.id')
                                        ->latest('fecha_creado')
                                        ->limit(10)
                                        ->where([
                                            ['producto_estado', '=', 1],
                                            ['producto_cant', '>', 0]
                                        ])
                                        ->get();

    	// Algunos productos, los que sean del mes actual
        $algunos_productos = App\Producto::select('productos.id','productos.categoria_id','productos.producto_descripcion','productos.producto_imagen','productos.producto_precio','productos.promocion_id', 'productos.fecha_creado', 'promociones.promo_tipo', 'promociones.promo_costo')
                                        ->join('promociones', 'productos.promocion_id', '=', 'promociones.id')
                                        ->limit(20)
                                        ->where([
                                            ['producto_estado', '=', 1],
                                            ['producto_cant', '>', 0]
                                        ])
                                         ->get();

    	// Publicidad, algun producto en descuento
    	$publicidad = App\Producto::select('productos.id','productos.categoria_id','productos.producto_descripcion','productos.producto_imagen','productos.producto_precio','productos.promocion_id', 'productos.fecha_creado', 'promociones.promo_tipo', 'promociones.promo_costo', 'promociones.promo_publicidad')
                                ->join('promociones', 'productos.promocion_id', '=', 'promociones.id')
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
                                    ->join('promociones', 'productos.promocion_id', '=', 'promociones.id')
                                    ->where([
                                        ['producto_estado', '=', 1],
                                        ['producto_cant', '>', 0]
                                    ])
                                    ->get();

        return view('productos', compact('productos'));        
    }

    // Muestra los productos de la categoria seleccionada
    public function showCategoriaProductos($seccion) {
        $seccion_id = App\Seccion::where('seccion_nombre', $seccion)->value('id');

        if($id_seccion === null){
            //Si sección no existe
            return response()->view('error.404',['response' => 'Esta categoria no existe'],404);
        }

        $ids_categorias = App\Categoria::select('id')->where('id_seccion', $id_seccion)->get();
       
        if($ids_categorias->isEmpty() === true){
            // Si la seccion no tiene categorias
            return view('productos', ['response' => 'Woops!, Aún no hay productos disponibles en esta categoria.']);    
        }
        foreach ($ids_categorias as $categoria) { 
            // si la seccion tiene categorias
            $id_categoria[] = $categoria['id']; 
        }

        // Selecciono los productos de dichas categorias
        $productos = App\Producto::select('id','id_categoria','descripcion','precio','descuento','imagen')
                                 ->whereIn('id_categoria', $id_categoria)
                                 ->get();

        return view('productos', compact('productos'));        
    }

    // public function showDetalles($id, $descripcion) {

    //     // Si $id y $descripcion no estan vacios o no son null, hacer la consulta de ese producto
    //     $producto = App\Producto::where('id', $id)->where('descripcion', $descripcion)->get();
        
    //     // Si producto no existe, mandar un error 404
    //     if($producto->isEmpty() === true){
    //         return response()->view('error.404',['response' => 'Lo sentimos, no esta disponible este producto en este momento'],404);
    //     }
    //     // Si el producto existe, traer las imagenes
    //     $imagenes = App\ImagenProducto::select('id', 'id_producto', 'nombre_imagen')->where('id_producto', $id)->get();
    //     // Formatear los tags

    //     foreach ($producto as $product) {
    //         $tags = explode( ',', $product->tags );
    //     }

    //     // dd($producto);

    //     return view('detalles', compact('producto', 'imagenes', 'tags'));        
    // }

    public function seleccionarDescripcion($id, $descripcion) {
        // Si $id y $descripcion no estan vacios o no son null, hacer la consulta de ese producto
        $producto = App\Producto::select('productos.*','promociones.promo_tipo', 'promociones.promo_costo', 'promociones.promo_publicidad')
                                ->join('promociones', 'productos.promocion_id', '=', 'promociones.id')
                                ->where('productos.id', $id)
                                ->where('productos.producto_descripcion', $descripcion)
                                ->get();

        // Si producto no existe, mandar un error 404
        if($producto->isEmpty() === true){
            return response()->view('error.404',['response' => 'Lo sentimos, no esta disponible este producto en este momento'],404);
        }

        // SI EL PRODUCTO TIENE producto_tieneImgDescripcion == true
        if ($producto[0]->producto_tieneImgDescripcion == 1) {
            $producto['id'] = $producto[0]->id;
            $producto['producto_descripcion'] = $producto[0]->producto_descripcion;
            $imagenes = App\Imagen::select('id', 'producto_id', 'imagen_url')->where('producto_id', $id)->get();

            return view('referencias', compact('producto', 'imagenes'));
        }

        // SI EL PRODUCTOS TIENE producto_tieneImgDescripcion == 0
        else {           
            $imagenes = App\Imagen::select('id', 'producto_id', 'imagen_url')->where('producto_id', $id)->get();

            // Formatear los tags
            foreach ($producto as $product) {
                $tags = explode( ',', $product->producto_tags );
            }
            return view('detalles', compact('producto', 'imagenes', 'tags'));
        }
    }

    public function showDetallesCompra($id, $descripcion) {
        // dd($id, $descripcion);
        $producto = App\Producto::select('productos.*','promociones.promo_tipo', 'promociones.promo_costo', 'promociones.promo_publicidad')
                                ->join('promociones', 'productos.promocion_id', '=', 'promociones.id')
                                ->where('productos.id', $id)
                                ->where('productos.producto_descripcion', $descripcion)
                                ->get();
        // Formatear los tags
        foreach ($producto as $product) {
            $tags = explode( ',', $product->producto_tags );
        }

        return view('detalles_referencia', compact('producto', 'tags'));
    }
}
