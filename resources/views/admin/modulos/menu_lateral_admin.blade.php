<section class="content_menu_lateral_admin col-12 col-md-2">
	<nav class="menu_lateral_admin">
		<ul>
			<span class="avatar_usuario">
				<img src="{{ asset('uploads/avatars/avatar.png') }}">
				<h1 class="avatar_usuario_nombre">{{ Auth::user()->usuario_nombre . ' ' . Auth::user()->usuario_apellido }} </h1>
			</span>
			<hr style="width: 100%; margin-top: 0;">
			<li class="items  @yield('inicio')">
				<span class="items_icon fas fa-tachometer-alt"></span>
				<span class="items_text">inicio</span>
				<a href="{{ route('admin') }}" class="items_link"></a>
			</li>
			<li class="items  @yield('productos')">
				<span class="items_icon fa fa-cubes"></span>
				<span class="items_text">productos</span>				
				<a href="{{ route('getProducts') }}" class="items_link"></a>
			</li>
			<li class="items  @yield('pedidos')">
				<span class="items_icon fa fa-shopping-bag"></span>
				<span class="items_text">pedidos</span>				
				<a href="{{ route('getPedidos') }}" class="items_link"></a>
			</li>
			<li class="items  @yield('clientes')">
				<span class="items_icon fa fa-users"></span>	
				<span class="items_text">clientes</span>
				<a href="{{ route('getClientes') }}" class="items_link"></a>
			</li>
			<li class="items  @yield('codigos')">
				<span class="items_icon fas fa-ticket-alt"></span>
				<span class="items_text">códigos de descuento</span>				
				<a href="{{ route('getCodigos') }}" class="items_link"></a>
			</li>
			<li class="items  @yield('secciones')">
				<span class="items_icon fa fa-columns"></span>
				<span class="items_text">secciones</span>
				<a href="{{ route('getSecciones') }}" class="items_link"></a>
			</li>
			<li class="items  @yield('categorias')">
				<span class="items_icon fa fa-th-list"></span>
				<span class="items_text">categorías</span>
				<a href="{{ route('getCategorias') }}" class="items_link"></a>
			</li>
			<li class="items  @yield('usuarios')">
				<span class="items_icon fas fa-user-cog"></span>
				<span class="items_text">usuarios del sistema</span>
				<a href="{{ route('getUsuarios') }}" class="items_link"></a>
			</li>
			<hr style="width: 100%">
			<li class="items link-visitar-pagina">
				<!-- <span class="items_icon fa fa-share-square-o"></span> -->
				<span class="items_icon fas fa-external-link-alt"></span>
				<span class="items_text">Visitar sitio web</span>
				<a href="{{ route('home') }}" class="items_link"></a>
			</li>
		</ul>
	</nav>
</section>