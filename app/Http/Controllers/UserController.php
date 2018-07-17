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
                            'pedidos.estado_pedido', 
                            'pedidos.direccion_envio', 
                            'pedidos.descuento_por_codigo',
                            'pedidos.modo_pago')
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
        
        function getPedidos($estado) {
            $id_user = Auth::user()->id;
            $pedidos = App\Pedido::select('id', 'direccion_envio', 'created_at')
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
            $datos_factura['id']                    = $dato->id;
            $datos_factura['direccion_envio']       = $dato->direccion_envio;
            $datos_factura['modo_pago']             = $dato->modo_pago;
            $datos_factura['descuento_por_codigo']  = $dato->descuento_por_codigo;
            $datos_factura['envio']                 = $dato->envio;
            $datos_factura['fecha_pedido']          = $dato->created_at;
        }
        //Datos de los detalles de la factura
        $detalles_factura = App\DetallePedido::select(
                            'descripcion',
                            'precio',
                            'cantidad',
                            'descuento_porcentual',
                            'tamaño',
                            'color',
                            'importe_total'
                        )
                        ->where('id_pedido', $idFactura)
                        ->get();

        if ($detalles_factura->isEmpty()) {
            return response()->view('error.404', ['response' => 'Esta factura no tiene detalles!'], 404);
        }
        foreach ($detalles_factura as $detalles) {
            $dato_detalle['descripcion']   = $detalles->descripcion;
            $dato_detalle['precio']        = $detalles->precio;
            $dato_detalle['cantidad']      = $detalles->cantidad;

            $precio_neto          = $detalles->precio * $detalles->cantidad;
            $descuento_porcentual = $detalles->descuento_porcentual / 100;
            // Valor a descontar en peso
            $descuento_peso       = $precio_neto * $descuento_porcentual;
            $dato_detalle['descuento_peso']   = round($descuento_peso);
            
            $dato_detalle['tamaño']        = $detalles->tamaño;
            $dato_detalle['color']         = $detalles->color;
            // Hay que eliminar esta columna de la tabla de detalle_pedidos
            // $dato_detalle['importe_total'] = $detalles->importe_total;
            $dato_detalle['importe_total'] = $precio_neto - $descuento_peso;

            $datos_detalles_factura[] = $dato_detalle;
        }
        //Obtener valor de la factura, suma del importe_total de los productos
        foreach ($datos_detalles_factura as $key => $value) {
            $importes[] = $value['importe_total'];
            $subtotal = array_sum($importes);
        }

        //Obtener el descuento por codigo
        $descuento_por_codigo = $datos_factura['descuento_por_codigo'];
        // Obtenemos de cuanto es el valor a descontar por el codigo
        $valor_del_codigo = $subtotal * ($descuento_por_codigo / 100);
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