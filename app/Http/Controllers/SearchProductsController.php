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

    public function showProductosSearch($search) {
        // Array donde almacenaré los ids de los productos encontrados
        $array_ids_productos = [];
        // Obtener por seccion
        $seccion_id = $this->verificarSeccion($search); // Regresa el id de una seccion en caso de existir, si no false
        // dd($seccion_id);
        if($seccion_id) {
            // Obtener categorias de esta sección
            $categorias_id = $this->obtenerCategoriasSeccion($seccion_id); // Regresa los ids existentes de las categorias de esta seccion, si no false 
            if ($categorias_id) {
                // Obtener productos
                $ids_productos = $this->obtenerProductosIds($categorias_id);
                if ($ids_productos) {
                    foreach ($ids_productos as $id) {
                        // almacenar los ids de los productos al array
                        array_push($array_ids_productos, $id);
                    }
                }
            }
        }
        // Obtener por categoria
        $categoria_id =  $this->obtenerCategorias($search);
        // dd($categoria_id);
        if($categoria_id) {
            // Obtener productos
            $ids_productos = $this->obtenerProductosIds($categoria_id);
            if ($ids_productos) {
                foreach ($ids_productos as $id) {
                    // almacenar los ids de los productos al array
                    array_push($array_ids_productos, $id);
                }
            }
        }
        // Obtener por etiquetas de los productos
        $ids_productos = $this->obtenerProductosIds($search);
        if ($ids_productos) {
            foreach ($ids_productos as $id) {
                // almacenar los ids de los productos al array
                array_push($array_ids_productos, $id);
            }
        }

        // Elimino ids duplicados
        $array_ids_productos = array_unique($array_ids_productos, SORT_NUMERIC);
        // Ordeno los numeros de menor a mayor
        sort($array_ids_productos, SORT_NUMERIC);

        // Obtener los productos
        $productos = $this->obtenerProductos($array_ids_productos);
        return view('productos', compact('search', 'productos'));
    }

    // Verificar seccion
    private function verificarSeccion($key) {
        $seccion_id = App\Seccion::where('seccion_nombre', 'LIKE', '%'. $key .'%')->value('id');
        if($seccion_id) {
            return $seccion_id;
        }else {
            return false;
        }
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
    // Obtener Categorias
    private function obtenerCategorias($key) {
        $categoria_id = App\Categoria::where('categoria_nombre', 'LIKE', '%'. $key .'%')->value('id');
        // dd($categoria_id);
        if($categoria_id) {
            return $categoria_id;
        }else {
            return false;
        }
    }
    // Obtener ids de productos
    private function obtenerProductosIds($parametro) {
        if(is_array($parametro)) {
            $productos = App\Producto::select('id')->whereIn('categoria_id', $parametro)->get();
        }elseif(is_int($parametro)) {
            $productos = App\Producto::select('id')->where('categoria_id', $parametro)->get();            
        }else {
            $productos = App\Producto::select('id')->where('producto_tags', 'LIKE', '%'. $parametro .'%')->get();  
        }
        if (!$productos->isEmpty()) {
            foreach ($productos as $producto) {
                $ids[] = $producto->id;
            }
            return $ids;
        }else {
            return false;
        }
    }
    // Obtener productos
    private function obtenerProductos($ids) {
        $productos = App\Producto::select('productos.*', 'promociones.promo_tipo', 'promociones.promo_costo')
                                ->leftJoin('promociones', 'productos.promocion_id', '=', 'promociones.id')
                                ->latest('fecha_creado')
                                ->limit(10)
                                ->where([
                                    ['producto_estado', '=', 1],
                                    ['producto_cant', '>', 0]
                                ])
                                ->whereIn('productos.id', $ids)
                                ->paginate(20);
        return $productos;
    }
}
