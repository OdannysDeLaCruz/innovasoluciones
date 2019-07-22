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
        return view('users.pedidos', compact('mis_pedidos'));
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
            return view('users.compras', ['Error' => 'Este pedido no existe!', 'pedido_id' => $pedido_id]);
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
            return view('users.compras', ['Error' => 'Este pedido no tiene detalles!', 'pedido_id' => $pedido_id]);
        }

        // Obtener precio final del pedido
        $costo_pedido = 0;
        foreach ($detalle_pedido as $detalle) {
            $costo_pedido += $detalle->detalle_precio_final;
        }
        $costo_pedido = number_format($costo_pedido, 0, '', '.');
       
        return view('users.compras', compact('info_pedido', 'detalle_pedido', 'pedido_ref', 'costo_pedido', 'direccion'));
    }

    public function showFacturas() {
        
        // function getPedidos($estado) {
            $user_id = Auth::user()->id;
            $facturas = App\Pedido::select(
                            'pedidos.id',
                            'pedidos.pedido_ref_venta as ref_venta',
                            'pedidos.fecha_creado',
                            'transacciones.estado')
                            ->leftJoin('transacciones', 'pedidos.transaccion_id', '=', 'transacciones.id')
                            ->where('pedidos.user_id', $user_id)
                            ->get();
        // return $pedidos;
        // }
        // dd($pedidos);
        $facturas->isEmpty() ? $facturas = '' : $facturas = $facturas;
        // Recorrer los pedidos para generar las facturas, 
        foreach ($facturas as $dato) {
            // Obtener precio total de la factura desde detalle pedidos
            $detalles = App\DetallePedido::select('detalle_precio_final')->where('pedido_id', $dato->id)->get();
            $precio_final = $detalles->sum('detalle_precio_final');

            $datos['id']           = $dato->id;
            $datos['ref_venta']    = $dato->ref_venta;
            $datos['precio_final'] = number_format($precio_final, 0, '', '.');
            $datos['fecha_creado'] = $dato->fecha_creado;
            $datos['estado']       = $dato->estado;
            $pedidos[] = $datos; 
        }
        // dd($pedidos);



        return view('users.facturas', compact('pedidos'));
    }

    public function showFacturasDetalles($idFactura) {

        $id_user = Auth::user()->id;
        $id_factura = $idFactura;
        $factura = App\Pedido::where('id', $idFactura)
                             ->where('user_id', $id_user)
                             ->get();

        if ($factura->isEmpty()) {
            return view('error.404', ['response' => 'Esta factura no existe!']);
        }
        // Datos de la factura
        foreach ($factura as $dato) {
            $datos_factura['id']               = $dato->id;
            $datos_factura['direccion_envio']  = $dato->direccion_envio;
            $datos_factura['modo_pago']        = $dato->modo_pago;
            $datos_factura['codigo_descuento'] = $dato->codigo_descuento;
            $datos_factura['envio']            = $dato->envio;
            $datos_factura['fecha_pedido']     = $dato->fecha_pedido;
        }
        //Datos de los detalles de la factura
        $detalles_factura = App\DetallePedido::select(
                            'detalle_descripcion',
                            'detalle_precio',
                            'detalle_cantidad',
                            'detalle_promo_info',
                            'detalle_talla',
                            'detalle_color'
                        )
                        ->where('pedido_id', $idFactura)
                        ->get();

        if ($detalles_factura->isEmpty()) {
            return response()->view('error.404', ['response' => 'Esta factura no tiene detalles!'], 404);
        }
        foreach ($detalles_factura as $detalles) {
            $dato_detalle['descripcion']    = $detalles->descripcion;
            $dato_detalle['precio']         = $detalles->precio;
            $dato_detalle['cantidad']       = $detalles->cantidad;
            $dato_detalle['descuento_porcentual'] = $detalles->descuento_porcentual;
            $precio_neto                    = $detalles->precio * $detalles->cantidad;
            $descuento_porcentual           = $dato_detalle['descuento_porcentual'] / 100;
            // Valor a descontar en peso
            $dato_detalle['descuento_peso'] = round($precio_neto * $descuento_porcentual);
            $dato_detalle['tamaño']         = $detalles->tamaño;
            $dato_detalle['color']          = $detalles->color;
            // Hay que eliminar esta columna de la tabla de detalle_pedidos
            // $dato_detalle['importe_total'] = $detalles->importe_total;
            $dato_detalle['importe_total']  = $precio_neto - $dato_detalle['descuento_peso'];
            $datos_detalles_factura[]       = $dato_detalle;
        }
        //Obtener valor de la factura, suma del importe_total de los productos
        foreach ($datos_detalles_factura as $key => $value) {
            $importes[] = $value['importe_total'];
            $subtotal = array_sum($importes);
        }

        //Obtener el codigo de descuento
        $codigo_descuento = $datos_factura['codigo_descuento'];
        // Obtener el valor del codigo insertado en el pedido
        $porcentaje_codigo_descuento = App\CodDescuento::where('codigo_descuento', $codigo_descuento)->value('descuento');
        // Obtenemos de cuanto es el valor a descontar por el codigo
        $valor_del_codigo = $subtotal * ($porcentaje_codigo_descuento / 100);
        // Restamos el valor_del_codigo a el subtotal del pedido
        $total_sin_iva = round($subtotal - $valor_del_codigo);
        // Cobramos el costo envio si es diferente de cero (0), osea no es gratis
        if ($datos_factura['envio'] != 0) {
            $total_sin_iva = $total_sin_iva + $datos_factura['envio'];
        }
        // Calculo el valor del iva al 19%
        $iva = $total_sin_iva * 0.19;
        // Aplicamos el valor del iva al total_sin_iva
        $total_pagar = $total_sin_iva + $iva;
        $pdf = \PDF::loadView('users.template-factura.factura', 
            compact(
                'datos_factura', 
                'datos_detalles_factura', 
                'subtotal',
                'valor_del_codigo',
                'iva',
                'total_pagar'
            )
        );
        return $pdf->stream('factura.pdf');
    }

    public function descargarFactura($idFactura) {

        $id_user = Auth::user()->usuario_id;
        $factura = App\Pedido::where('id', $idFactura)->where('user_id', $id_user)->get();

        if ($factura->isEmpty()) {
            return view('error.404', ['response' => 'Esta factura no existe!']);
        }

        $pdf = \PDF::loadView('users.template-factura.factura', compact('factura'));
        return $pdf->download('factura-' . $idFactura . '.pdf');
    }

}
