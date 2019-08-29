<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Producto;
use App\Imagen;
use App\VideoProducto;
use App\Categoria;
use App\Promocion;
use Illuminate\Support\Facades\Validator;
class ProductoController extends Controller
{
	public function index() {
        // Obtener el listado de categorias para el forulario de filtrado
        $categorias = Categoria::select('id', 'seccion_id', 'categoria_nombre')->orderBy('categoria_nombre')->get();
        // Productos
        $productos = Producto::select('productos.*', 'promociones.promo_tipo', 'promociones.promo_costo', 'categorias.id as categoria_id', 'categorias.categoria_nombre')
                                ->leftJoin('promociones', 'productos.promocion_id', '=', 'promociones.id')
                                ->leftJoin('categorias', 'productos.categoria_id', '=', 'categorias.id')
                                ->orderBy('productos.fecha_creado', 'desc')
                                ->paginate(20);
                              
        return view('admin.productos/productos', compact('categorias','productos'));
    }
	public function show() {
        $categorias = Categoria::select('id', 'categoria_nombre')->orderBy('categoria_nombre')->get();
        $promociones = Promocion::select('id','promo_nombre', 'promo_tipo', 'promo_costo')->get();
        return view('admin.productos.producto-crear', compact('categorias', 'promociones'));
    }
    public function create(Request $request) {

        $v = \Validator::make($request->all(), [
            "nombre"      => 'required|string|unique:productos',
            "precio"      => 'required|integer|min:1',
            "cantidad"    => 'required|integer|min:1',
            "categoria"   => 'required|integer', // id de catedoria
            "descripcion" => 'nullable|string',

            "tallas"      => 'nullable|string',
            "colores"     => 'nullable|string',
            "proveedor"   => 'nullable|string',
            "marca"       => 'nullable|string',
            "tags"        => 'required|string',

            "portada"     => 'required|image|mimes:jpg,jpeg,png,gif',
            "imagenes.*"  => 'nullable|image|mimes:jpg,jpeg,png,gif',
            "videos"      => 'nullable|string',
            'descripcion_por_imagen' => 'nullable',

            "promocion" => 'nullable|integer', // id promocion
            "referencia"   => 'required|string|unique:productos',
        ]);

        dd($v);


        if($v->fails()) {
            return redirect()->back()->withInput()->withErrors($v->errors());
        }
        $producto_promocion = $request->producto_promocion == 0 ? null : $request->producto_promocion;
        $producto_tieneImgDescripcion = $request->has('producto_tieneImgDescripcion') === true ? 1 : 0;

        // Subir imagen principal al servidor - carpeta uploads - esta debe ser de baja resoluciones y peso
        $imagen_prinicipal = $request->file('producto_imagen');
        $nombre_imagen_prinicipal = time() . '_' . $imagen_prinicipal->getClientOriginalName();
        $pathImagen = $imagen_prinicipal->move('uploads/productos/imagenes/miniaturas', $nombre_imagen_prinicipal);

        if($pathImagen) {
            // Crear el nuevo producto           
            $producto = new Producto;

            $producto->categoria_id         = $request->producto_categoria;
            $producto->producto_nombre      = $request->producto_nombre;
            $producto->producto_descripcion = $request->producto_descripcion;
            $producto->producto_tags        = $request->producto_tags;
            $producto->producto_ref         = strtoupper($request->producto_ref);
            $producto->producto_imagen      = $nombre_imagen_prinicipal;
            $producto->producto_precio      = $request->producto_precio;
            $producto->promocion_id         = $producto_promocion;
            $producto->producto_tallas      = $request->producto_tallas;
            $producto->producto_colores     = $request->producto_colores;
            $producto->producto_tieneImgDescripcion = $producto_tieneImgDescripcion;
            $producto->producto_cant        = $request->producto_cantidad;
            $producto->producto_estado      = 1;

            $producto->save();
            $producto_id = $producto->id;
            // Verifico si el producto se creó correctamente
            if($producto_id) {
                // Verifico si vienen imagenes desde el formulario
                $producto_imgs_referencia = $request->file('producto_imgs_referencia');
                if($producto_imgs_referencia) {
                    // Recorro el array de imagenes para guardarlas una por una
                    foreach($producto_imgs_referencia as $file) {
                        $imagenes_productos = new Imagen;
                        // Guardo las imagenes en uploads/productos/imagenes con su nuevo nombre, tambien guardo el nombre de la imagen y a que producto pertenece en la tabla imagenes

                        $nombre_imagen = time() . '_' . $file->getClientOriginalName();
                        $file->move('uploads/productos/imagenes', $nombre_imagen);

                        $imagenes_productos->producto_id = $producto_id;
                        $imagenes_productos->imagen_url  = $nombre_imagen;
                        $imagenes_productos->save();
                    }                
                }
                // Verifico si vienen videos desde el formulario
                $producto_videos_referencia = $request->input('producto_videos_referencia');
                if($producto_videos_referencia) {
                    // los videos vienen de YouTube como codigo de insercion, se guardan en la BBDD en formato de texto separados por comas
                    $videos_productos = new VideoProducto;
                    $videos_productos->producto_id = $producto_id;
                    $videos_productos->video_url   = $producto_videos_referencia;
                    $videos_productos->save();
                }
                session()->flash('producto-creado', true);
                return redirect()->route('getProductos');
            }
            else {
                session()->flash('producto-creado', false);
                return redirect()->route('getProductos');
            }            
        }
        else {
            session()->flash('producto-creado', false);
            return redirect()->route('getProductos');
        }
    }
}
