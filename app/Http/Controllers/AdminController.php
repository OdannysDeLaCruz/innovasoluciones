<?php

namespace App\Http\Controllers;
use App;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    public function index() {
        return view('admin.home');
    }
    public function getProductos() {
        // Obtener el listado de categorias para el forulario de filtrado
        $categorias = App\Categoria::select('id', 'nombre')->orderBy('nombre')->get();
        // Productos
        $productos = App\Producto::paginate(20);
        return view('admin.productos', compact('categorias','productos'));
    }
    public function showCreateProductos() {
        return view('admin.crear-productos');
    }
    public function createProductos(Request $request) {
        // $producto = new Producto;
        // dd($producto);
        $v = \Validator::make($request->all(), [
            
            "id_categoria"      => 'required|integer|min:1',
            // "descripcion"       => 'required|string|unique|min:1',
            "tags"              => 'required|string|min:1',
            // "codigo-referencia" => 'required|string|unique|min:1',
            "imagen_principal"  => 'required|image|min:1',
            // "imagen"            => 'dimensions:min_width=100,min_height=200',
            "precio-unitario"   => 'required|integer',
            "descuento"         => 'integer',
            "tallas"            => 'string|nullable',
            "colores"           => 'string|nullable',
            "tiempo_entrega"    => 'required|string',
            "cantidades"        => 'nullable|integer',
            "imgsReferencias"   => 'nullable|image',
            "tieneImgDescripcion"   => 'boolean'
        ]);

        // dd($v);
 
        if ($v->fails()) {
            return redirect()->back()->withInput()->withErrors($v->errors());
        }

        // $client->create($request->all());
        // $clients = Client::all();
        // return \View::make('list', compact('clients'));

        // App\Producto::create([
           
        //     'id_categoria'    => $id_categoria,
        //     'descripcion'     => $faker->text(50),
        //     'tags'            => $mis_tags,
        //     'referencia'      => $faker->word . rand(0,100) . $faker->word,
        //     'imagen'          => $faker->imageUrl($width = 200, $height = 200),
        //     'precio'          => $precio,
        //     'descuento'       => $desc,
        //     'tallas'          => $faker->word,
        //     'colores'         => $faker->word,
        //     'tiempo_entrega'  => $faker->word,
        //     'imagenDescripcion'  => rand(0,1),
        //     'cant_disponible' => rand(0,10),
        //     'fecha_creado'    => date('Y-n-j H:i:s')
        // ]);
    }

    public function getPedidos() {
    	// Pedidos
        $misPedidos = App\Pedido::paginate(20);
        foreach ($misPedidos as $dato) {

            $nombre   = App\User::where('id', $dato->id_user)->value('nombre');
            $apellido = App\User::where('id', $dato->id_user)->value('apellido');
            $pedido['cliente'] = $nombre . ' ' . $apellido;
            
        	$pedido['id'] = $dato->id;
            $pedido['direccion'] = $dato->direccion_envio;
        	$pedido['entrega'] = $dato->modo_envio;
        	$pedido['codigo'] = $dato->codigo_descuento;
        	$pedido['envio'] = $dato->envio;
        	$pedido['modo_pago'] = $dato->modo_pago;
        	$pedido['estado'] = $dato->estado_pedido;
        	$pedido['fecha'] = $dato->fecha_pedido;

        	// Obtener total de pedido
        	$datos_pedido = App\DetallePedido::select(
                            'precio',
                            'cantidad',
                            'descuento_porcentual'
                        )
                        ->where('id_pedido', $dato->id)
                        ->get();
            $importes_totales = [];
        	foreach ($datos_pedido as $dato) {
	            $precio_neto          = $dato->precio * $dato->cantidad;
	            $descuento_porcentual = $dato->descuento_porcentual / 100;
	            $descuento_peso       = $precio_neto * $descuento_porcentual;
	            $total                = $precio_neto - $descuento_peso;
	            $importes_totales[]   = $total;
	        }

            $pedido['total']  = array_sum($importes_totales);
            // Una vez guardado el total del pedido, reinicio el array importes_totales a vacio '[]' para que no siga almacenando totales y empiece desde 0
            $importes_totales = [];

        	$pedidos[] = $pedido;
        }
        return view('admin.pedidos', compact('pedidos', 'misPedidos'));
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
