<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Direccion;
use App\Pais;
use App\Estado;

class DireccionController extends Controller
{
	/*
	* Crear nuevas direcciones de envios de pedidos.
	*/
    public function crear(Request $request) {
        if($request->ajax()) {
            $v = \Validator::make($request->all(), [
                "nombre_completo" => 'required|string',
                "pais"      => 'required|string',
                "estado"    => 'required|string',
                "ciudad"    => 'required|string',
                "direccion" => 'required|string',
                "telefono"  => 'required|string',
                "codigo_postal" => 'required|integer',
            ]);
            // dd($v);
            // Si hay errores
            if($v->fails()) {
                $dataErrors = $v->errors();
                echo json_encode(array(
                    'status' => 'Errors',
                    'data' => $dataErrors
                ));
            }else {
                // Si no hay errores, obtenemos los nuevos datos de direccion de envio y se almacenan en la base de datos

                // Quitar direccion por defecto del usuario para envios
                Direccion::where('defecto', true)->update(['defecto' => false]);

                $direccion = new Direccion;
                $direccion->user_id = Auth::user()->id;
                $direccion->nombre_completo = $request->nombre_completo;

                // Obtener Nombre pais
                $pais_id = (int)$request->pais;
                $pais_nombre = Pais::where('id', $pais_id)->value('pais_nombre');   
                $direccion->pais       = $pais_nombre;

                // Obtener Nombre pais
                $estado_id = (int)$request->estado;
                $estado_nombre = Estado::where('id', $estado_id)->value('estado_nombre');
                $direccion->estado     = $estado_nombre;

                $direccion->ciudad     = $request->ciudad;
                $direccion->direccion  = $request->direccion;
                $direccion->codigo_postal = $request->codigo_postal;
                $direccion->telefono   = $request->telefono;
                $direccion->defecto    = true;
                $direccion->save();

                echo json_encode(array(
                    'status' => 'Success',
                    'message' => 'Dirección agregada exitosamente'
                ));
            }
        }

    }

    /*
    * Actualizar direccion del usuario
    */
    public function eliminar(Request $request) {
        if($request->ajax()) {
            $direccion_id = (int)$request->id;
            $direccion = Direccion::find($direccion_id);

            if($direccion) {
                $direccion->delete();
                echo json_encode(array(
                    'status' => 'Success',
                    'message' => 'Dirección eliminada'
                ));
            }else {
                echo json_encode(array(
                    'status' => 'Errors',
                    'message' => 'Tenemos problemas, intente denuevo'
                ));
            }
        }
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
