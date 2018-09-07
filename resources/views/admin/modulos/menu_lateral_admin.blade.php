<section class="content_menu_lateral_admin col-2 col-sm-2 col-md-2">
	<nav class="menu_lateral_admin">
		<ul>
			<li class="items  @yield('inicio')">
				<span class="items_icon">
					<img class="items_icon" src="{{ asset('img/logos/svg/admin/inicio.svg') }}">
				</span>
				<span class="items_text">inicio</span>
				<a href="/admin" class="items_link"></a>
			</li>
			<li class="items  @yield('productos')">
				<span class="items_icon">
					<img class="items_icon" src="{{ asset('img/logos/svg/admin/productos.svg') }}">
				</span>
				<span class="items_text">productos</span>				
				<a href="/admin/productos" class="items_link"></a>
			</li>
			<li class="items  @yield('pedidos')">
				<span class="items_icon">
					<img src="{{ asset('img/logos/svg/admin/pedidos.svg') }}">
				</span>
				<span class="items_text">pedidos</span>				
				<a href="/admin/pedidos" class="items_link"></a>
			</li>
			<li class="items  @yield('clientes')">
				<span class="items_icon">
					<img src="{{ asset('img/logos/svg/admin/clientes.svg') }}">			
				</span>	
				<span class="items_text">clientes</span>
				<a href="/admin/clientes" class="items_link"></a>
			</li>
			<li class="items  @yield('codigos')">
				<span class="items_icon">
					<img class="cod_desc" src="{{ asset('img/logos/svg/admin/codigo-de-descuento.svg') }}">	
				</span>
				<span class="items_text">códigos de descuento</span>				
				<a href="/admin/codigos" class="items_link"></a>
			</li>
			<li class="items  @yield('secciones')">
				<span class="items_icon">
					<img class="items_icon" src="{{ asset('img/logos/svg/admin/secciones.svg') }}">			
				</span>
				<span class="items_text">secciones</span>
				<a href="/admin/secciones" class="items_link"></a>
			</li>
			<li class="items  @yield('usuarios')">
				<span class="items_icon">
					<img class="items_icon" src="{{ asset('img/logos/svg/admin/usuarios.svg') }}">	
				</span>
				<span class="items_text">usuarios del sistema</span>
				<a href="/admin/usuarios" class="items_link"></a>
			</li>
		</ul>
	</nav>
</section>