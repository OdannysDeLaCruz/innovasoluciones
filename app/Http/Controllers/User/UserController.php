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
                            'id', 
                            'pedido_dir', 
                            'pedido_ref_venta',
                            'promocion_id',
                            'envio_id',
                            'transaccion_id',
                            'fecha_creado')
                        ->where('user_id', $user_id)
                        ->get();
        return view('users.pedidos', compact('mis_pedidos'));
    }

    public function showPedidoDetalles($pedido_id) {

        $user_id = Auth::user()->id;
        $pedido = App\Pedido::select('id', 'user_id')
                         ->where('id', $pedido_id)
                         ->where('user_id', $user_id)
                         ->get();

        if ($pedido->isEmpty()) {
            return view('users.compras', ['Error' => 'Este pedido no existe!', 'pedido_id' => $pedido_id]);
        }
        // Si el pedido_id si existe para este usuario, hacemos la consulta de los detalles de ese pedido
        $detalle_pedido = App\DetallePedido::select(
                            'pedido_id',
                            'detalle_producto_ref',
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
        foreach ($detalle_pedido as $detalles) {
            $dato_detalle['producto_ref']   = $detalles->detalle_producto_ref;
            $dato_detalle['precio']         = $detalles->detalle_precio;
            $dato_detalle['cantidad']       = $detalles->detalle_cantidad;
            $dato_detalle['promo_info']     = $detalles->detalle_promo_info;
            $dato_detalle['precio_final']   = $dato_detalle->detalle_precio_final;
            $datos_detalles_factura[]       = $dato_detalle;
        }

        //Obtener valor del pedido, dependiendo de los productos
        // foreach ($datos_detalles_factura as $key => $value) {
        //     $importes[] = $value['importe_total'];
        //     $total_pedido = array_sum($importes);
        // }
        
        return view('users.compras', compact('detalle_pedido', 'pedido_id'));
    }

    public function showFacturas() {
        
        function getPedidos($estado) {
            $id_user = Auth::user()->id;
            $pedidos = App\Pedido::select('id', 'direccion_envio', 'fecha_pedido')
                            ->where('id_user', $id_user)
                            ->where('estado_pedido', $estado)
                            ->get();
            return $pedidos;
        }
        
        $pendientes = getPedidos(0);
        $pagados    = getPedidos(1);

        $pendientes->isEmpty() ? $pedidos_pendientes = '' : $pedidos_pendientes = $pendientes;
        $pagados->isEmpty() ? $pedidos_pagados = '' : $pedidos_pagados = $pagados;

        return view('users.facturas', compact('pedidos_pendientes', 'pedidos_pagados'));
    }

    public function showFacturasDetalles($idFactura) {

        $id_user = Auth::user()->id;
        $factura = App\Pedido::where('id', $idFactura)->where('id_user', $id_user)->get();

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
                            'descripcion',
                            'precio',
                            'cantidad',
                            'descuento_porcentual',
                            'tamaño',
                            'color'
                        )
                        ->where('id_pedido', $idFactura)
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

        $id_user = Auth::user()->id;
        $factura = App\Pedido::where('id', $idFactura)->where('id_user', $id_user)->get();

        if ($factura->isEmpty()) {
            return view('error.404', ['response' => 'Esta factura no existe!']);
        }

        $pdf = \PDF::loadView('users.template-factura.factura', compact('factura'));
        return $pdf->download('factura-' . $idFactura . '.pdf');
    }

}
