<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App;

class FacturaController extends Controller
{
	public function __construct() {
        $this->middleware('auth');
    }
    public function index() {

        $user_id = Auth::user()->id;
        $facturas = App\Pedido::select(
                    'pedidos.id',
                    'pedidos.pedido_ref_venta as ref_venta',
                    'pedidos.fecha_creado',
                    'transacciones.estado',
                    // Promoción que se le haya aplicado a este pedido
					'promociones.promo_nombre',
					'promociones.promo_tipo',
					'promociones.promo_costo'
                	)
                    ->leftJoin('transacciones', 'pedidos.transaccion_id', '=', 'transacciones.id')
                    ->leftJoin('promociones', 'pedidos.promocion_id', '=', 'promociones.id')
                    ->where('pedidos.user_id', $user_id)
                    ->get();

        // Recorrer los pedidos para generar las facturas
        if(!$facturas->isEmpty()) {
	        foreach ($facturas as $dato) {
	            // Obtener precio total de la factura desde detalle pedidos
	            $detalles = App\DetallePedido::select('detalle_precio_final')->where('pedido_id', $dato->id)->get();
	            $subtotal = $detalles->sum('detalle_precio_final');

	            if ($dato->promo_tipo == '%') {
					$descuento = $subtotal * $dato->promo_costo / 100;
					$total = $subtotal - $descuento;
				}elseif ($dato->promo_tipo == '$') {
					$descuento = $dato->promo_costo;
					$total = $subtotal - $descuento;
				}
				else{
					$total = $subtotal;
				}

	            $datos['id']           = $dato->id;
	            $datos['ref_venta']    = $dato->ref_venta;
	            $datos['fecha_creado'] = $dato->fecha_creado;
	            $datos['estado']       = $dato->estado;
	            $datos['total']        = $total;
	            $pedidos[] = $datos; 
	        }
	    }else {
	    	$pedidos = ''; 
	    }

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

        // Suma de precios de los productos para la factura
        $subtotal = $detalles->sum('detalle_precio_final');

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

        $pdf = \PDF::loadView('users.facturas.detalle', 
            compact('pedido', 'detalles', 'direccion', 'subtotal', 'costo_promo_pedido', 'total')
        );
        return $pdf->stream('FACTURA_' . $pedido[0]['ref_venta'] . '.pdf');

        // return view('users.facturas.detalle', compact('pedido', 'detalles', 'direccion', 'subtotal', 'costo_promo_pedido', 'total'));
    }

    public function download($id) {

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

        $pdf = \PDF::loadView('users.facturas.detalle', compact('pedido', 'detalles', 'direccion', 'subtotal', 'costo_promo_pedido', 'total'));
        return $pdf->download('FACTURA_' . $pedido[0]['ref_venta'] . '.pdf');
    }
}
