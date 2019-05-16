<?php

namespace App\Http\Controllers;
use App;
use Illuminate\Http\Request;

class SearchProductsController extends Controller
{
    public function index(Request $request) {
    	$search = $request->input('search');

        if ($search != '') {
    	   return redirect()->route('productoTag', $search);
        }
        else {
            return redirect()->route('productos');
        }
    	
    }

    public function showProductosTag($search){

        $seccion_id = App\Seccion::where('seccion_nombre', 'LIKE', '%'. $search .'%')->value('id');
        // Si existe un id seccion con la palabra de busqueda, obtener categorias de esa sección
        if ($seccion_id) {
            $categorias_ids = App\Categoria::select('id')->where('seccion_id', $seccion_id)->get();
            // Verificar si categorias_ids no esta vacio, osea, es diferente de empty
            if($categorias_ids->isEmpty() != true) {
                // Si no esta vacio, generar un array normal con esos ids, para consultar los productos luego.
                foreach ($categorias_ids as $categoria) {
                    $categoria_id[] = $categoria['id']; 
                }
                // Obtener los productos con esos ids de categorias.
                $productos = App\Producto::select('productos.*', 'promociones.promo_tipo', 'promociones.promo_costo')
                                ->leftJoin('promociones', 'productos.promocion_id', '=', 'promociones.id')
                                ->where([
                                    ['producto_estado', '=', 1],
                                    ['producto_cant', '>', 0]
                                ])->whereIn('productos.categoria_id', $categoria_id)->get();
                // Si existen productos con esos ids, mostrarlos.
                if (count($productos) > 0) {
                    return view('productos', compact('search', 'productos'));
                }
                // Si no hay productos con esos ids de categorias.
                else {
                    return response()->view('error.404', ['response' => 'No hay productos con esta categoria disponibles'], 404);
                }
            }
            // Si categorias_ids es vacio, no hay categorias en la seccion.
            else {
                return response()->view('error.404', ['response' => 'Esta categoria no existe'], 404);
            }
        }
        // Buscar palabra en tabla de categorias.
        else {
            $categorias_ids = App\Categoria::select('id')
                                        ->where('categoria_nombre', 'LIKE', '%'. $search .'%')
                                        ->orWhere('categoria_descripcion', 'LIKE', '%'. $search .'%')
                                        ->get();

            // Verificar si categorias_ids no esta vacio, osea, es diferente de empty
            if($categorias_ids->isEmpty() != true) {
                // Si no esta vacio, generar un array normal con esos ids, para consultar los productos luego.
                foreach ($categorias_ids as $categoria) {
                    $categoria_id[] = $categoria['id']; 
                }
                // Obtener los productos con esos ids de categorias.
                $productos = App\Producto::select('productos.*', 'promociones.promo_tipo', 'promociones.promo_costo')
                                ->leftJoin('promociones', 'productos.promocion_id', '=', 'promociones.id')
                                ->where([
                                    ['producto_estado', '=', 1],
                                    ['producto_cant', '>', 0]
                                ])->whereIn('productos.categoria_id', $categoria_id)->get();
                // Si existen productos con esos ids, mostrarlos.
                if (count($productos) > 0) {
                    return view('productos', compact('search', 'productos'));
                }
                // Si no hay productos con esos ids de categorias.
                else {
                    return response()->view('error.404', ['response' => 'No hay productos con esta categoria disponibles'], 404);
                }
            }
            // Si categorias_ids es vacio, es decir, no existe esa palabra en la categoria. Verificar conincidencias en tabla productos.
            else {
                
                return response()->view('error.404', ['response' => 'Esta categoria no existe'], 404);
            }
        }


    	// if($productos->isEmpty() === true) {
    	// 	return view('productos', ['response' => 'Woops!, Aún no hay productos que coincidan con', 'search' => $search ]);   
    	// }
    	// return view('productos', compact('search', 'productos'));
    }
}
