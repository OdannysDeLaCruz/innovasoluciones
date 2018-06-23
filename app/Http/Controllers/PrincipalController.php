<?php

namespace App\Http\Controllers;
use App;
use Illuminate\Http\Request;

class PrincipalController extends Controller
{
    public function index() {

    	// Productos nuevos, los que sean del mes actual
        $productos_nuevos = App\Producto::select('id','id_categoria','descripcion','precio','descuento','imagen')
                                        ->latest()
                                        ->limit(10)
                                        ->orderBy('id','desc')
                                        ->get();

    	// Algunos productos, los que sean del mes actual
        $algunos_productos = App\Producto::select('id','id_categoria','descripcion','precio','descuento','imagen')
                                         ->limit(20)
                                         ->get();

    	// Publicidad, algun producto en promosion
    	$publicidad = App\Producto::select('id','id_categoria','descripcion','precio','descuento','imagen')->first()->where('id', 1)->get();
    	
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

    public function showDetalles($id, $descripcion) {

        // Si $id y $descripcion no estan vacios o no son null, hacer la consulta de ese producto
        $producto = App\Producto::where('id', $id)->where('descripcion', $descripcion)->get();
        
        // Si producto no existe, mandar un error 404
        if($producto->isEmpty() === true){
            return response()->view('error.404',[],404);
        }
        // Si el producto existe, traer las imagenes
        $imagenes = App\imagenProducto::select('id', 'id_producto', 'nombre_imagen')->where('id_producto', $id)->get();

        return view('detalles', compact('producto', 'imagenes'));        
    }
}
