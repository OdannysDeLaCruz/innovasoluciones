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
        // Obtenemos los pedidos de este usuario logueado
        $mis_pedidos = App\Pedido::where('id_user', $id_user)->get();
        return view('users.pedidos', compact('mis_pedidos'));
    }

    public function showPedidoDetalles($idPedido) {

        $id_user = Auth::user()->id;
        $res = App\Pedido::select('id', 'id_user')->where('id', $idPedido)->where('id_user', $id_user)->get();

        if ($res->isEmpty()) {
            return view('users.compras', ['Error' => 'Este pedido no existe!', 'idPedido' => $idPedido]);
        }
        // Si el idPedido si existe para este usuario, hacemos la consulta de los detalles de ese pedido
        $detalle_pedidos = App\DetallePedido::select('id_producto', 'cantidad')
                                            ->where('id_pedido', $idPedido)
                                            ->get();
        // Verificamos que el pedido tenga detalle_pedidos
        if($detalle_pedidos->isEmpty()){
            return view('users.compras', ['Error' => 'Este pedido no tiene detalles!', 'idPedido' => $idPedido]);
        }
        foreach ($detalle_pedidos as $datos) {

            $producto['id']        = $datos['id_producto'];
            $producto['cantidad']  = $datos['cantidad'];
            $productos[]           = $producto;

            $ids_productos[]      = $datos['id_producto'];

        }

        // Con estos ids dentro del array $ids_productos, obtenemos los detalles de cada uno de los productos
        $productos_pedidos = App\Producto::select('id', 'id_categoria', 'descripcion', 'imagen', 'precio', 'descuento')
                                        ->whereIn('id', $ids_productos)
                                        ->get();
        // Para obtener los detalles del pedido por producto (cantidad, tamaño, color, etc) 
        $detalles = App\DetallePedido::select('cantidad')->whereIn('id_producto', $ids_productos)->get();

        // Cuardamos los detalles en arrays por separados
        foreach ($detalles as $detalle) {
            $mis_cantidades[] = $detalle['cantidad'];
            // $mis_tamaños[]    = $detalle['tamaño'];
            // $mis_colores[]    = $detalle['color'];
        }
       
        // Recorro el array de $productos_pedido y los guardo en arrays por separados
        foreach ($productos_pedidos as $pedidos) {
            $id_pedido[]    = $pedidos['id'];           
            $id_categoria[] = $pedidos['id_categoria'];           
            $descripcion[]  = $pedidos['descripcion'];           
            $imagen[]       = $pedidos['imagen'];           
            $precio[]       = $pedidos['precio'];           
            $descuento[]    = $pedidos['descuento'];           
        }  

        /* Guardo los datos de los detalles y los datos de los productos en un solo array, 
        * de modo que toda la informacion de los productos esta en ese solo array, 
        * listo para enviar a la vista.
        * Aquí se van a recorrer los datos segun la cantidad de productos que se hayan devuelto en la 
        * consulta a productos que se almacenan en la variable : $producto_pedidos.
        * Todo se guarda en el array compras[]
        */
        for ($contador = 0; $contador <= count($productos_pedidos) - 1 ; $contador++) { 
            $mis_productos['id']           = $id_pedido[$contador];
            $mis_productos['id_categoria'] = $id_categoria[$contador];
            $mis_productos['descripcion']  = $descripcion[$contador];
            $mis_productos['imagen']       = $imagen[$contador];
            $mis_productos['precio']       = $precio[$contador];
            $mis_productos['descuento']    = $descuento[$contador];
            $mis_productos['cantidad']     = $mis_cantidades[$contador];

            $compras[] = $mis_productos;

        }   
        return view('users.compras', compact('compras', 'idPedido'));
    }

    public function showFacturas() {
        
        return view('users.facturas');
    }
  

}
