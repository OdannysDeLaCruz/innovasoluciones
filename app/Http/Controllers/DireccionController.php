<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Direccion;

class DireccionController extends Controller
{
	/*
	* Crear nuevas direcciones de envios de pedidos.
	*/
    public function crear() {

    }

    /*
    * Actualizar direccion del usuario
    */
    public function actualizar(Request $request) {

    }

    /*
    * Establecer direccion por defecto para envios
    */
    public function establecerDireccionDefecto(Request $request) {
    	// Verificar que la peticion se haga desde ajax
    	if($request->ajax()) {

    		$id = (int)$request->id;

    		// Verifico si id existe en tabla direccion
    		$direccion = Direccion::find($id);

    		if(is_null($direccion)) {
	    		echo json_encode(array(
	    			'Error' => true,
	    			'Message' => 'Direccion no existe'
	    		));
    		}
    		else {
    			// Poner en null la direccion que esta por defecto
    			Direccion::where('defecto', true)->update(['defecto' => false]);

    			// Establecer por defecto la nueva direccion
	    		$direccion->defecto = true;		    		
	    		if($direccion->save()) {
	    			// Obtener todas las direcciones
	    			$direcciones = Direccion::select('id', 'pais', 'estado', 'ciudad', 'direccion', 'codigo_postal', 'defecto')->get();
	    			echo json_encode(array(
		    			'Error' => false,
		    			'Message' => 'Direccion cambiada',
		    			'direcciones' => $direcciones
		    		));
	    		}    			
    		}

    	}
    }
}
