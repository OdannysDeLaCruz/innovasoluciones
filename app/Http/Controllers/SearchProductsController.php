<?php

namespace App\Http\Controllers;
use App\Producto;
use Illuminate\Http\Request;

class SearchProductsController extends Controller
{
    public function index(Request $request) {
    	$search = $request->input('search');
    	
    	return redirect()->route('productoTag', $search);
    }

    public function showProductosTag($search = ''){
    	if ($search === '') {
    		return redirect()->route('productos');
    	}
    	$productos = Producto::where('descripcion', 'LIKE', '%'.$search.'%')
    						 ->orWhere('tags', 'LIKE', '%'.$search.'%')
    						 ->get();

    	if($productos->isEmpty() === true) {
    		return view('productos', ['response' => 'Woops!, Aún no hay productos que coincidan con', 'search' => $search ]);   
    	}
    	return view('productos', compact('search', 'productos'));
    }
}
