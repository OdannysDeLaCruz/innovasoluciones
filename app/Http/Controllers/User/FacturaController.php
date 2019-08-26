<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App;

class FacturaController extends Controller
{
    public function index() {

        $user_id = Auth::user()->id;
        $facturas = App\Pedido::select(
                    'pedidos.id',
                    'pedidos.pedido_ref_venta as ref_venta',
                    'pedidos.fecha_creado',
                    'transacciones.estado')
                    ->leftJoin('transacciones', 'pedidos.transaccion_id', '=', 'transacciones.id')
                    ->where('pedidos.user_id', $user_id)
                    ->get();

        // Recorrer los pedidos para generar las facturas
        if(!$facturas->isEmpty()) {
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
	    }else {
	    	$pedidos = ''; 
	    }

        // dd($pedidos);

        return view('users.facturas.index', compact('pedidos'));
    }

    public function show($id) {
        $user_id = Auth::user()->id;
        $id = $id;
        // Pedido
        $pedido = App\Pedido::select(
        					'pedidos.id as pedidos_id', 
        					'pedidos.pedido_ref_venta as ref_venta',
        					'pedidos.fecha_creado',
        					// Promoción que se le haya aplicado a este pedido
        					'promociones.promo_nombre',
        					'promociones.promo_tipo',
        					'promociones.promo_costo'
        					)
        					->where([
                             	['pedidos.id', '=', $id],
                             	['pedidos.user_id', '=', $user_id]
                            ])
                            ->leftJoin('promociones', 'pedidos.promocion_id', '=', 'promociones.id')
                            ->get();

        if ($pedido->isEmpty()) {
            return view('error.404', ['response' => 'Esta factura no existe!']);
        }
        // Detalles del pedido
        $detalles = App\Pedido::select('detalle_pedidos.*')
        					->where([
                             	['pedidos.id', '=', $id],
                             	['pedidos.user_id', '=', $user_id]
                            ])
                            ->join('detalle_pedidos', 'detalle_pedidos.pedido_id', '=', 'pedidos.id')
                            ->get();

        if ($detalles->isEmpty()) {
            return view('error.404', ['response' => 'Esta factura no existe!']);
        }
        // Dirección de envio del pedido
        $direccion = App\DireccionPedido::find($id);

        $pedido    = $pedido->toArray();
        $detalles  = $detalles->toArray();
        $direccion = $direccion->toArray();

        if($pedido[0]['promo_tipo']) {
 			$costo_promo_pedido =  $pedido[0]['promo_costo'];
 		}

        // dd($pedido, $detalles);

        foreach ($detalles as $detalle) {
        	$importes[] = $detalle['detalle_precio_final'];
        	$subtotal = array_sum($importes);
        }

        if ($pedido[0]['promo_tipo'] == '%') {
			$descuento = $subtotal * $costo_promo_pedido / 100;
			$total = $subtotal - $descuento;
		}elseif ($pedido[0]['promo_tipo'] == '$') {
			$descuento = $costo_promo_pedido;
			$total = $subtotal - $descuento;
		}
		else{
			$total = $subtotal;
		}

        // dd($importes, $subtotal);

        



        //Datos de los detalles de los productos del pedido
        // $detalle_productos = App\DetallePedido::where('pedido_id', $id)->get();

        // if ($detalle_productos->isEmpty()) {
        //     return response()->view('error.404', ['response' => 'Esta factura no tiene detalles!'], 404);
        // }


        // foreach ($detalles_factura as $detalles) {
        //     $dato_detalle['descripcion']    = $detalles->detalle_descripcion;
        //     $dato_detalle['precio']         = $detalles->detalle_precio;
        //     $dato_detalle['cantidad']       = $detalles->detalle_cantidad;
        //     $dato_detalle['descuento_porcentual'] = $detalles->descuento_porcentual;
        //     $precio_neto                    = $detalles->detalle_precio * $detalles->detalle_cantidad;
        //     $descuento_porcentual           = $dato_detalle['descuento_porcentual'] / 100;
        //     // Valor a descontar en peso
        //     $dato_detalle['descuento_peso'] = round($precio_neto * $descuento_porcentual);
        //     $dato_detalle['talla']         = $detalles->detalle_talla;
        //     $dato_detalle['color']          = $detalles->detalle_color;
        //     // Hay que eliminar esta columna de la tabla de detalle_pedidos
        //     // $dato_detalle['importe_total'] = $detalles->importe_total;
        //     $dato_detalle['importe_total']  = $precio_neto - $dato_detalle['descuento_peso'];
        //     $datos_detalles_factura[]       = $dato_detalle;
        // }
        //Obtener valor de la factura, suma del importe_total de los productos
        // foreach ($datos_detalles_factura as $key => $value) {
        //     $importes[] = $value['importe_total'];
        //     $subtotal = array_sum($importes);
        // }

        // dd($detalles1, $datos_detalles_factura, $subtotal);

        //Obtener el codigo de descuento
        // $codigo_descuento = $datos_factura['codigo_descuento'];
        // dd($codigo_descuento);
        // Obtener el valor del codigo insertado en el pedido
        // $porcentaje_codigo_descuento = App\Promocion::where('promo_nombre', $codigo_descuento)->value('promo_costo');
        // Obtenemos de cuanto es el valor a descontar por el codigo
        // $valor_del_codigo = $subtotal * ($porcentaje_codigo_descuento / 100);
        // Restamos el valor_del_codigo a el subtotal del pedido
        // $total_sin_iva = round($subtotal - $valor_del_codigo);
        // Cobramos el costo envio si es diferente de cero (0), osea no es gratis
        // if ($datos_factura['envio'] != 0) {
        //     $total_sin_iva = $total_sin_iva + $datos_factura['envio'];
        // }
        // Calculo el valor del iva al 19%
        // $iva = $total_sin_iva * 0.19;
        // Aplicamos el valor del iva al total_sin_iva
        // $total_pagar = $total_sin_iva + $iva;

        $pdf = \PDF::loadView('users.facturas.detalle', 
            compact('pedido', 'detalles', 'direccion', 'subtotal', 'costo_promo_pedido', 'total')
        );
        return $pdf->stream('factura_innova.pdf');

        // return view('users.facturas.detalle', compact('pedido', 'detalles', 'direccion', 'subtotal', 'costo_promo_pedido', 'total'));
    }

    public function download($id) {

        $user_id = Auth::user()->usuario_id;
        $factura = App\Pedido::where('id', $id)->where('user_id', $user_id)->get();

        if ($factura->isEmpty()) {
            return view('error.404', ['response' => 'Esta factura no existe!']);
        }

        $pdf = \PDF::loadView('users.template-factura.factura', compact('factura'));
        return $pdf->download('factura-' . $id . '.pdf');
    }
}
