<?php

namespace App\Http\Controllers;

use App;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function showPerfil() {

        return view('users.perfil');
    }

    public function showPedidos() {

        $id_user = Auth::user()->id;

        $mis_pedidos = App\Pedido::select(
                            'pedidos.id', 
                            'pedidos.created_at',
                            'pedidos.estado', 
                            'pedidos.direccion_envio', 
                            'pedidos.codigo_descuento',
                            'pedidos.metodo_pago')
                        ->where('pedidos.id_user', $id_user)
                        ->get();
        return view('users.pedidos', compact('mis_pedidos'));
    }

    public function showPedidoDetalles($idPedido) {

        $id_user = Auth::user()->id;
        $res = App\Pedido::select('id', 'id_user')->where('id', $idPedido)->where('id_user', $id_user)->get();

        if ($res->isEmpty()) {
            return view('users.compras', ['Error' => 'Este pedido no existe!', 'idPedido' => $idPedido]);
        }
        // Si el idPedido si existe para este usuario, hacemos la consulta de los detalles de ese pedido
        $detalle_pedidos = App\DetallePedido::select(
                            'id_producto',
                            'id_pedido',
                            'descripcion',
                            'imagen',
                            'precio',
                            'cantidad',
                            'descuento_porcentual',
                            'tamaño',
                            'color',
                            'importe_total'
                        )
                        ->where('id_pedido', $idPedido)
                        ->get();

        // Verificamos que el pedido tenga detalle_pedidos
        if($detalle_pedidos->isEmpty()){
            return view('users.compras', ['Error' => 'Este pedido no tiene detalles!', 'idPedido' => $idPedido]);
        }

        //Obtener valor del pedido, dependiendo de los productos
        $total_pedido = App\DetallePedido::select('importe_total')
                        ->where('id_pedido', $idPedido)
                        ->sum('importe_total');

        return view('users.compras', compact('detalle_pedidos', 'idPedido', 'total_pedido'));
    }

    public function showFacturas() {
        
        return view('users.facturas');
    }
  

}
