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
	/*
	** Mostrar todos los productos
	*/
	public function index() {
        // Obtener el listado de categorias para el forulario de filtrado
        $categorias = Categoria::select('id', 'seccion_id', 'categoria_nombre')->orderBy('categoria_nombre')->get();
        // Productos
        $productos = Producto::select('productos.*', 'promociones.promo_tipo', 'promociones.promo_costo', 'categorias.id as categoria_id', 'categorias.categoria_nombre')
                                ->leftJoin('promociones', 'productos.promocion_id', '=', 'promociones.id')
                                ->leftJoin('categorias', 'productos.categoria_id', '=', 'categorias.id')
                                ->orderBy('productos.fecha_creado', 'desc')
                                ->paginate(20);
                              
        return view('admin.productos.index', compact('categorias','productos'));
    }
    /*
    ** Mostrar formulario de crear producto
    */
	public function create() {
        $categorias = Categoria::select('id', 'categoria_nombre')->orderBy('categoria_nombre')->get();
        $promociones = Promocion::select('id','promo_nombre', 'promo_tipo', 'promo_costo')->get();

        // Porcentajes de ganancias
        $ganancias = [
        	0  => '0%',  5  => '5%',  10 => '10%', 
        	15 => '15%', 20 => '20%', 25 => '25%',
        	30 => '30%', 35 => '35%', 40 => '40%'
        ];

        return view('admin.productos.crear', 
        	compact(
        		'categorias', 'promociones', 'ganancias'
        	)
        );
    }
    /*
    ** Almacenar producto creado
    */
    public function store(Request $request) {

        $v = \Validator::make($request->all(), [
            "producto_nombre"      => 'required|string|unique:productos',
            "precio"      => 'required|integer|min:1',
            "cantidad"    => 'required|integer|min:1',
            "categoria"   => 'required|integer', // id de catedoria
            "descripcion" => 'nullable|string',

            "tallas"      => 'nullable|string',
            "colores"     => 'nullable|string', 
            "proveedor"   => 'nullable|integer', // id de proveedor
            "marca"       => 'nullable|integer', // id de marca
            "etiquetas"   => 'required|string',

            "portada"     => 'required|image|mimes:jpg,jpeg,png,gif',
            "imagenes.*"  => 'nullable|image|mimes:jpg,jpeg,png,gif',
            "videos"      => 'nullable|string',
            'descripcion_por_imagen' => 'nullable',

            "promocion"   => 'nullable|integer', // id promocion
            "ganancias"   => 'nullable|integer',
            "costo_envio" => 'nullable|integer', // costo de envio
            "iva"         => 'nullable',
            "payu"        => 'nullable',
        ]);

        // dd((int)$request->categoria);

        if($v->fails()) {
            return redirect()->back()->withInput()->withErrors($v->errors());
        }

        // Generar referencia del producto
        $referencia = 'RP' . time() . mt_rand(1111, 9999); // RP = Referencia de Producto

        $promocion = $request->promocion == 0 ? null : $request->promocion;
        $ganancias = (int)$request->ganancias;
        $proveedor = $request->proveedor == 0 ? null : $request->proveedor;
        $marca     = $request->marca == 0 ? null : $request->marca;
        $descripcion_por_imagen = $request->has('descripcion_por_imagen') === true ? 1 : 0;
        $precio    = (int)$request->precio;
        $iva       = $request->has('iva') === true ? 1 : 0;
        $payu      = $request->has('payu') === true ? 1 : 0;
        $costo_envio = $request->costo_envio === null ? 0 : (int)$request->costo_envio;

        // Agregar iva al precio del producto si iva === true
        if($iva == 1) {
        	$impuesto_iva = $precio * 0.19;
        	$precio   = $precio + $impuesto_iva;
        }

        // Agregar costo de envío
        if($costo_envio != 0) {
        	// Sumar el costo de envio al precio
        	$precio = $precio + $costo_envio;
        }

        // Sumar ganancias
        if($ganancias != 0) {
        	$valor_ganancias = $precio * ($ganancias / 100); // 30 => 0.3
        	$precio = $precio + $valor_ganancias;
        }

        // Agregar comision al precio del producto (Que puede o no tener iva inlcuido)
        if($payu == 1) {
        	$impuesto_payu = ($precio * 0.0349) + 1500;
        	$precio = $precio + $impuesto_payu;
        }

        // Subir imagen principal al servidor - carpeta uploads - esta debe ser de baja resoluciones y peso
        $portada = $request->file('portada');
        $nombre_imagen_portada = time() . '_' . $portada->getClientOriginalName();
        $pathImagen = $portada->move('uploads/productos/imagenes/miniaturas', $nombre_imagen_portada);

        if($pathImagen) {
            // Crear el nuevo producto
            $producto = new Producto;          
            $producto->categoria_id         = (int)$request->categoria;
            $producto->proveedor_id         = $proveedor;
            $producto->marca_id             = $marca;
            $producto->producto_nombre      = $request->producto_nombre;
            $producto->producto_descripcion = $request->descripcion;
            $producto->producto_tags        = $request->etiquetas;
            $producto->producto_ref         = $referencia;
            $producto->producto_imagen      = $nombre_imagen_portada;
            $producto->producto_precio      = $precio;
            $producto->promocion_id         = $promocion;
            $producto->producto_tallas      = $request->tallas;
            $producto->producto_colores     = $request->colores;
            $producto->producto_tieneImgDescripcion = $descripcion_por_imagen;
            $producto->producto_cant        = $request->cantidad;
            $producto->producto_estado      = 1;
            $producto->save();

            $producto_id = $producto->id;
            // Verifico si el producto se creó correctamente
            if($producto_id) {
                // Verifico si vienen imagenes desde el formulario
                $imagenes = $request->file('imagenes');
                if($imagenes) {
                    // Recorro el array de imagenes para guardarlas una por una
                    foreach($imagenes as $file) {
                        $imagen_producto = new Imagen;
                        // Guardo las imagenes en uploads/productos/imagenes con su nuevo nombre, tambien guardo el nombre de la imagen y a que producto pertenece en la tabla imagenes

                        $nombre_imagen = time() . '_' . $file->getClientOriginalName();
                        $file->move('uploads/productos/imagenes', $nombre_imagen);

                        $imagen_producto->producto_id = $producto_id;
                        $imagen_producto->imagen_url  = $nombre_imagen;
                        $imagen_producto->save();
                    }                
                }
                // Verifico si vienen videos desde el formulario
                $videos = $request->input('videos');
                if($videos) {
                    // los videos vienen de YouTube como codigo de insercion, se guardan en la BBDD en formato de texto separados por comas
                    $video_producto = new VideoProducto;
                    $video_producto->producto_id = $producto_id;
                    $video_producto->video_url   = $videos;
                    $video_producto->save();
                }
                session()->flash('producto-creado', true);
                return redirect()->route('getProducts');
            }
            else {
                session()->flash('producto-creado', false);
                return redirect()->route('getProducts');
            }            
        }
        else {
            session()->flash('producto-creado', false);
            return redirect()->route('getProducts');
        }
    }

    /*
    ** Mostrar detalle de un prodcuto en especifico apartir de un id
    */
    public function show($producto_ref) {
        // $producto = App\Producto::where()->get();
        return view('admin.productos.detalles');
    }

    /*
    ** Eliminar un producto de la base de datos apartir de su id
    */
    public function destroy($id) {
        // Obtener producto
        $producto = Producto::find($id);
        // dd($producto);
        if($producto != null) {
            // Obtener la imagen de portada del producto y eliminarla del servidor
            $imagen_prinicipal = $producto->producto_imagen;
            // Si archivo existe, eliminarlo
            $file_exist = \File::exists('uploads/productos/imagenes/miniaturas/'.$imagen_prinicipal);
        	if($file_exist) {
            	\File::delete('uploads/productos/imagenes/miniaturas/'.$imagen_prinicipal);
        	}

            // Obtener las imagenes de este producto en la tabla imagenes
            $imagenes = Imagen::select('imagen_url')->where('producto_id', $id)->get();
            foreach ($imagenes as $imagen) {
                \File::delete('uploads/productos/imagenes/'.$imagen->imagen_url);
            }

            // Eliminar registros de este producto de la tabla imagenes
            Imagen::where('producto_id', $id)->delete();
            $delete = $producto->delete();
            if($delete) {
                session()->flash('mensaje', 'Producto eliminado');
            }else {
                session()->flash('mensaje', 'Ha ocurrido un error');
            }
            return redirect()->route('getProducts');
        }

        // Producto no existe
        session()->flash('mensaje', 'Este producto no existe');
        return redirect()->route('getProducts');
    }
}
