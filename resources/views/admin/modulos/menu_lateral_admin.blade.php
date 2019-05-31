<section class="content_menu_lateral_admin col-12 col-md-2">
	<nav class="menu_lateral_admin">
		<ul>
			<span class="logotipo-page">
				<img class="items_icon" src="{{ asset('img/logos/LogoInnova.svg') }}">
			</span>
			<li class="items  @yield('inicio')">
				<span class="items_icon fas fa-tachometer-alt"></span>
				<span class="items_text">inicio</span>
				<a href="/admin" class="items_link"></a>
			</li>
			<li class="items  @yield('productos')">
				<span class="items_icon fa fa-cubes"></span>
				<span class="items_text">productos</span>				
				<a href="/admin/productos" class="items_link"></a>
			</li>
			<li class="items  @yield('pedidos')">
				<span class="items_icon fa fa-shopping-bag"></span>
				<span class="items_text">pedidos</span>				
				<a href="/admin/pedidos" class="items_link"></a>
			</li>
			<li class="items  @yield('clientes')">
				<span class="items_icon fa fa-users"></span>	
				<span class="items_text">clientes</span>
				<a href="/admin/clientes" class="items_link"></a>
			</li>
			<li class="items  @yield('codigos')">
				<span class="items_icon fas fa-ticket-alt"></span>
				<span class="items_text">códigos de descuento</span>				
				<a href="/admin/codigos" class="items_link"></a>
			</li>
			<li class="items  @yield('secciones')">
				<span class="items_icon fa fa-columns"></span>
				<span class="items_text">secciones</span>
				<a href="/admin/secciones" class="items_link"></a>
			</li>
			<li class="items  @yield('categorias')">
				<span class="items_icon fa fa-th-list"></span>
				<span class="items_text">categorías</span>
				<a href="/admin/secciones" class="items_link"></a>
			</li>
			<li class="items  @yield('usuarios')">
				<span class="items_icon fas fa-user-cog"></span>
				<span class="items_text">usuarios del sistema</span>
				<a href="/admin/usuarios" class="items_link"></a>
			</li>
		</ul>
	</nav>
</section>