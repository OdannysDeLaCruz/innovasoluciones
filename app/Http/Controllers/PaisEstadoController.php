<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Estado;
use App\Pais;
class PaisEstadoController extends Controller {

    public function getPaises(Request $request) {
        if($request->ajax()) {
            $paises = Pais::select('id', 'pais_nombre')->orderBy('pais_nombre', 'asc')->get();

            if($paises == null) {
                echo json_encode(array(
                    'status' => 'Errors',
                    'paises' => null
                ));
            }else {
                echo json_encode(array(
                    'status' => 'Success',
                    'paises' => $paises
                ));            
            }
        }
    }

    public function getEstados(Request $request) {
        if($request->ajax()) {
            $pais_id = $request->pais_id;
            $estados = Estado::select('id', 'estado_nombre')->where('pais_id', $pais_id)->get();

            if($estados->isEmpty()) {
                echo json_encode(array(
                    'status' => 'Errors',
                    'estados' => null
                ));
            }else {
                echo json_encode(array(
                    'status' => 'Success',
                    'estados' => $estados
                ));            
            }
        }
    }


}
