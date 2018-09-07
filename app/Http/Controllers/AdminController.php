<?php

namespace App\Http\Controllers;
use App;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index() {
        return view('admin.home');
    }
    public function getProductos() {
        // Productos
        $productos = App\Producto::paginate(20);
        return view('admin.productos', compact('productos'));
    }

    public function getPedidos() {
    	// Pedidos
        $misPedidos = App\Pedido::paginate(20);
        foreach ($misPedidos as $dato) {
        	$pedido['id'] = $dato->id;
        	$pedido['direccion'] = $dato->direccion_envio;

        	// obtener usuario
        	$nombre   = App\User::where('id', $dato->id_user)->value('nombre');
        	$apellido = App\User::where('id', $dato->id_user)->value('apellido');
        	$pedido['cliente'] = $nombre . ' ' . $apellido;
        	$pedido['codigo'] = $dato->codigo_descuento;
        	$pedido['envio'] = $dato->envio;

        	// Obtener modo de pago
        	$modo_pago = App\ModoPago::where('id', $dato->id_modo_pago)->value('nombre_pago');
        	$pedido['modo_pago'] = $modo_pago;

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
}

