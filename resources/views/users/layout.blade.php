<section class="contenedor_perfil">
	<section class="perfil row">
		<nav class="col-xs-12 col-sm-3 perfil_menu">
			<ul class="perfil_menu_ul">
				<li><a class="@yield('perfil')" href="{{ route('perfil') }}">Perfil</a></li>
				<li><a class="@yield('compras')" href="{{ route('compras') }}">Compras</a></li>
				<li><a class="@yield('facturas')" href="{{ route('facturas') }}">Facturas</a></li>
			</ul>
		</nav>
		@yield('content')
	</section>		
</section>

<!-- SECCION FOOTER -->
@include('includes/footer')
<!-- FIN FOOTER -->

<!-- SECCION SCRIPTS JS -->
@include('includes/scripts')
<!-- FIN SCRIPTS JS -->