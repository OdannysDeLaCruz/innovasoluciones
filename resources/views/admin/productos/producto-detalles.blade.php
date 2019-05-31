@extends('admin/layout')
	@section('title') 
		Productos de Innova
	@endsection
	@section('productos') active @endsection
	@section('contenido')
	<section class="col-10 col-sm-10 col-md-10 contenido_principal">
		<header class="encabezado_principal">
			<h1 class="titulo_principal"> <a href="{{ route('getProductos') }}">Productos</a> / {{ "PRODUCTO2" }}</h1>
		</header>
		<section>
			
		</section>
	</section>
	@endsection