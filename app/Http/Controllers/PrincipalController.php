<?php

namespace App\Http\Controllers;
use App;
use Illuminate\Http\Request;

class PrincipalController extends Controller
{
    public function index() {

    	// Productos nuevos, los que sean del mes actual
        $productos_nuevos = App\Producto::select('id','id_categoria','descripcion','precio','descuento','imagen')
                                        ->latest('fecha_creado')
                                        ->limit(10)
                                        ->orderBy('id','desc')
                                        ->get();

    	// Algunos productos, los que sean del mes actual
        $algunos_productos = App\Producto::select('id','id_categoria','descripcion','precio','descuento','imagen')
                                         ->limit(20)
                                         ->get();

    	// Publicidad, algun producto en promosion
    	$publicidad = App\Producto::select('id','id_categoria','descripcion','precio','descuento','imagen')
                                  ->first()
                                  ->where('id', 1)
                                  ->get();
    	
    	return view('index',
    		compact(
                'productos_nuevos',
                'algunos_productos',
                'publicidad'
    		)
    	);
    }

    public function showProductos() {
        // Productos
        $productos = App\Producto::all();
        return view('productos', compact('productos'));        
    }

    // Muestra los productos de la categoria seleccionada
    public function showCategoriaProductos($seccion) {
        $id_seccion = App\Seccion::where('nombre', $seccion)->value('id');

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
        $producto = App\Producto::where('id', $id)->where('descripcion', $descripcion)->get();
        
        // Si producto no existe, mandar un error 404
        if($producto->isEmpty() === true){
            return response()->view('error.404',['response' => 'Lo sentimos, no esta disponible este producto en este momento'],404);
        }

        // SI EL PRODUCTOS TIENE imagenDescripcion == true
        if ($producto[0]->tieneImgDescripcion == 1) {
            $producto['id'] = $producto[0]->id;
            $producto['descripcion'] = $producto[0]->descripcion;
            $imagenes = App\ImagenProducto::select('id', 'id_producto', 'nombre_imagen')->where('id_producto', $id)->get();

            return view('referencias', compact('producto', 'imagenes'));
        }

        // SI EL PRODUCTOS TIENE tieneImgDescripcion == 0
        else {
           
            $imagenes = App\ImagenProducto::select('id', 'id_producto', 'nombre_imagen')->where('id_producto', $id)->get();

            // Formatear los tags
            foreach ($producto as $product) {
                $tags = explode( ',', $product->tags );
            }
            return view('detalles', compact('producto', 'imagenes', 'tags'));
        }
    }

    public function showDetallesCompra($id, $descripcion) {
        // dd($id, $descripcion);
        $producto = App\Producto::where('id', $id)->where('descripcion', $descripcion)->get();
        // Formatear los tags
        foreach ($producto as $product) {
            $tags = explode( ',', $product->tags );
        }

        return view('detalles_referencia', compact('producto', 'tags'));
    }
}
