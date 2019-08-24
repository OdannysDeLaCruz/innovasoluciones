<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
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
    public function __construct() {
        $this->middleware('auth');
    }

    public function showPerfil() {
        return view('users.perfil');
    }

    public function showPedidos() {

        $user_id = Auth::user()->id;
        $mis_pedidos = App\Pedido::select(
                            'pedidos.id',
                            'pedidos.pedido_ref_venta',
                            'pedidos.fecha_creado',
                            'promociones.promo_nombre',
                            'transacciones.estado',
                            'transacciones.fecha_transaccion'
                            )
                            ->leftJoin('promociones', 'pedidos.promocion_id', '=', 'promociones.id')
                            ->leftJoin('transacciones', 'pedidos.transaccion_id', '=', 'transacciones.id')
                            ->where('user_id', $user_id)
                            ->get();

        if ($mis_pedidos->isEmpty()) {
            return view('users.pedidos', ['mis_pedidos' => false]);
        }
        return view('users.pedidos.index', compact('mis_pedidos'));
    }

    public function showPedidoDetalles($pedido_id) {

        $user_id = Auth::user()->id;
        // Obtengo pedido solicitado siempre y cuando pertenezca al usuario autenticado
        $info_pedido = App\Pedido::select(
                            'pedidos.id',
                            'pedidos.pedido_ref_venta',
                            'pedidos.pedido_tipo_dispositivo',
                            'pedidos.fecha_creado',
                            'envios.envio_metodo',
                            'promociones.promo_nombre',
                            'promociones.promo_tipo',
                            'promociones.promo_costo',
                            'transacciones.*')
                            ->leftJoin('envios', 'pedidos.envio_id', '=', 'envios.id')
                            ->leftJoin('promociones', 'pedidos.promocion_id', '=', 'promociones.id')
                            ->leftJoin('transacciones', 'pedidos.transaccion_id', '=', 'transacciones.id')
                            ->where('pedidos.id', $pedido_id)
                            ->where('pedidos.user_id', $user_id)
                            ->get();


        if ($info_pedido->isEmpty()) {
            return view('users.pedidos.detalles', ['Error' => 'Este pedido no existe!', 'pedido_id' => $pedido_id]);
        }
        // Obtener referencia de venta del pedido
        $pedido_ref = $info_pedido[0]->pedido_ref_venta;

        // Obtener datos de dirección de este pedido
        $direccion = App\DireccionPedido::where('pedido_id', $pedido_id)->get();

        // Consulta de los detalles de ese pedido
        $detalle_pedido = App\DetallePedido::select(
                            'pedido_id',
                            'detalle_producto_ref',
                            'detalle_nombre',
                            'detalle_descripcion',
                            'detalle_imagen',
                            'detalle_precio',
                            'detalle_cantidad',
                            'detalle_promo_info',
                            'detalle_precio_final',
                            'detalle_talla',
                            'detalle_color')
                            ->where('pedido_id', $pedido_id)
                            ->get();

        // Verificamos que el pedido tenga detalle_pedidos
        if($detalle_pedido->isEmpty()){
            return view('users.pedidos.detalles', ['Error' => 'Este pedido no tiene detalles!', 'pedido_id' => $pedido_id]);
        }

        // Obtener precio final del pedido
        $costo_pedido = 0;
        foreach ($detalle_pedido as $detalle) {
            $costo_pedido += $detalle->detalle_precio_final;
        }
        $costo_pedido = number_format($costo_pedido, 0, '', '.');
       
        return view('users.pedidos.detalles', compact('info_pedido', 'detalle_pedido', 'pedido_ref', 'costo_pedido', 'direccion'));
    }
}
