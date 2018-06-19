<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductosController extends Controller
{
    public function show($id = null) {
    	if($id == null){
    		return view('productos');
    	}
    	else {
    		return view('detalles', compact('id'));
    	}

    }
}
