<?php

namespace App\Http\Controllers;
use App;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function index() {
        return view('admin.home');
    }
    public function getProductos() {
        // Obtener el listado de categorias para el forulario de filtrado
        $categorias = App\Categoria::select('id', 'seccion_id', 'categoria_nombre')->orderBy('categoria_nombre')->get();
        // Productos
        // $productos = App\Producto::orderBy('fecha_creado', 'desc')->paginate(20);

        $productos = App\Producto::select('productos.*', 'promociones.promo_tipo', 'promociones.promo_costo', 'categorias.id', 'categorias.categoria_nombre')
                                ->leftJoin('promociones', 'productos.promocion_id', '=', 'promociones.id')
                                ->leftJoin('categorias', 'productos.categoria_id', '=', 'categorias.id')
                                ->orderBy('productos.fecha_creado', 'desc')
                                ->paginate(20);
        return view('admin.productos/productos', compact('categorias','productos'));
    }
    public function showCreateProductos() {
        $categorias = App\Categoria::select('id', 'categoria_nombre')->orderBy('categoria_nombre')->get();
        $promociones = App\Promocion::select('id','promo_nombre', 'promo_tipo', 'promo_costo')->get();
        return view('admin.productos.producto-crear', compact('categorias', 'promociones'));
    }
    public function createProductos(Request $request) {

        $v = \Validator::make($request->all(), [
            "producto_nombre"              => 'required|string|unique:productos',
            "producto_descripcion"         => 'required|string',
            "producto_precio"              => 'required|integer|min:1',
            "producto_cantidad"            => 'required|integer|min:1',
            "producto_ref"                 => 'required|string|unique:productos',
            "producto_categoria"           => 'required|integer',
            "producto_tags"                => 'required|string',
            "producto_imagen"              => 'required|image',
            "producto_promocion"           => 'nullable|integer',
            "producto_tallas"              => 'nullable|string',
            "producto_colores"             => 'nullable|string',
            "producto_imgs_referencia.*"   => 'nullable|image|mimes:jpg,jpeg,png',
            "producto_videos_referencia"   => 'nullable|string',
            'producto_tieneImgDescripcion' => 'nullable'
        ]);

        // dd($v);

        if($v->fails()) {
            return redirect()->back()->withInput()->withErrors($v->errors());
        }
        $producto_promocion = $request->producto_promocion == 0 ? null : $request->producto_promocion;
        $producto_tieneImgDescripcion = $request->has('producto_tieneImgDescripcion') === true ? 1 : 0;

        $producto_nombre_imagen = $request->file('producto_imagen')->getClientOriginalName();
        $pathImagen = Storage::putFileAs('productos/imagenes/miniaturas', $request->file('producto_imagen'), $producto_nombre_imagen);

        if($pathImagen) {
            // Crear el nuevo producto           
            $producto = new App\Producto;

            $producto->categoria_id         = $request->producto_categoria;
            $producto->producto_nombre      = $request->producto_nombre;
            $producto->producto_descripcion = $request->producto_descripcion;
            $producto->producto_tags        = $request->producto_tags;
            $producto->producto_ref         = strtoupper($request->producto_ref);
            $producto->producto_imagen      = $producto_nombre_imagen;
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
                        $imagenes_productos = new App\Imagen;
                        $nombre_imagen = $file->getClientOriginalName();

                        // Guardo las imagenes en storage/productos/imagenes con su nombre original, tambien guardo el nombre de la imagen y a que producto pertenece en la tabla imagenes
                        $pathImagen = Storage::putFileAs('productos/imagenes', $file, $nombre_imagen);
                        $imagenes_productos->producto_id = $producto_id;
                        $imagenes_productos->imagen_url  = $nombre_imagen;
                        $imagenes_productos->save();
                    }                
                }
                // Verifico si vienen videos desde el formulario
                $producto_videos_referencia = $request->input('producto_videos_referencia');
                if($producto_videos_referencia) {
                    // los videos vienen de YouTube como codigo de insercion, se guardan en la BBDD en formato de texto separados por comas
                    $videos_productos = new App\VideoProducto;
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
    public function getDetallesProducto($producto_ref) {
         // $producto = App\Producto::where()
         //                        ->get();
        return view('admin.productos.producto-detalles');
    }

    public function getPedidos() {

        $pedidos = App\Pedido::select('pedidos.*', 'users.usuario_nombre', 'users.usuario_apellido', 'envios.envio_metodo', 'transacciones.estado', 'transacciones.valor_transaccion')
                            ->orderBy('pedidos.fecha_creado', 'desc')
                            ->leftJoin('users', 'pedidos.user_id', '=', 'users.id')
                            ->leftJoin('envios', 'pedidos.envio_id', '=', 'envios.id')
                            ->leftJoin('transacciones', 'pedidos.transaccion_id', '=', 'transacciones.id')
                            ->paginate(10);
        return view('admin.pedidos', compact('pedidos'));
    }
    public function getClientes() {
        return view('admin.clientes');
    }
    public function getCodigos() {
        return view('admin.cod_descuento');
    }
    public function getSecciones() {
        return view('admin.secciones');
    }
    public function getUsuarios() {
        return view('admin.usuarios');
    }


    protected function validator(array $data) {

        return Validator::make($data, [
            // 'nombre'         => 'required|string|max:255',
            // 'apellido'       => 'required|string|max:255',
            // 'num_documento'  => 'required|string|max:255',
            // 'email'          => 'required|string|email|max:255|unique:users',
            // 'password'       => 'required|string|min:6|confirmed',

            "descripcion"       => 'required|string|min:1',
            "codigo-referencia" => 'required|string|min:1',
            "precio-unitario"   => 'required|int',
            "descuento"         => 'required|int',
            "categoria"         => 'required|string|min:1',
            "etiquetas"         => 'required|string|min:1',
            "tamaño"            => 'required|int',
            "color"             => 'required|string|min:1',
            "cantidades"        => 'required|int',
        ]);
    }
}
