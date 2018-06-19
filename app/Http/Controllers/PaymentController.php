<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function payment(Request $request) {
    	$name      = $request->input('nombre_completo');
    	$direccion = $request->input('direccion');
    	$pais     = $request->input('pais');
    	$ciudad    = $request->input('ciudad');
    	$barrio    = $request->input('barrio');
    	$telefono  = $request->input('telefono');

    	return view('payment', 
    		compact(
    			'name',
    			'direccion',
    			'pais',
    			'ciudad',
    			'barrio',
    			'telefono'
    		)
    	);
    }
}
