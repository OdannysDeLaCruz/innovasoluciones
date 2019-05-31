<section class="contenedor_perfil">
	<section class="perfil row">
		<nav class="col-xs-12 col-md-2 perfil_menu">
			<div class="perfil_menu_avatar">
				<div class="perfil_menu_avatar_contenedor">
					<div class="perfil_menu_avatar_contenedor_img">
						<img src="{{ asset('storage/avatars/avatar.png') }}">			
					</div>
				</div>							
				<label class="perfil_menu_avatar_nombre"> {{ Auth::user()->usuario_nombre }} {{ Auth::user()->usuario_apellido }} </label>
			</div>
			<ul class="perfil_menu_ul">
				<li><a class="@yield('perfil')" href="{{ route('perfil') }}">Perfil</a></li>
				<li><a class="@yield('pedidos')" href="{{ route('pedidos') }}">Pedidos</a></li>
				<li><a class="@yield('facturas')" href="{{ route('facturas') }}">Facturas</a></li>
				<li class="btn-salir ">
					<a href="{{ route('logout') }}" 
						onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();"> Cerrar sesión 
                    </a>
                </li>
				<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
			</ul>
		</nav>
		@yield('content')
	</section>		
</section>

<!-- SECCION SCRIPTS JS -->
@include('includes/scripts')
<!-- FIN SCRIPTS JS -->