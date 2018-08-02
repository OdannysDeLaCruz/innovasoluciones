<header class="header_principal">
	<a class="header_principal_img" href="/">
		<img src="{{ asset('img/logos/LogoInnova.svg') }}" alt="Logotipo de Innova Soluciones">
	</a>
	<div class="contenedor_formulario">
		<form class="formulario_buscar_producto" action="/search" method="post">
			<input class="input_buscador_producto" type="search" name="buscar" placeholder="Busca por categorias" required>
			<button class="btn_buscar" type="submit"><span class="fa fa-search"></span></button>
		</form>
	</div>
	<nav class="nav_principal">
		<span class="fa fa-times cerrar_menu" id="cerrar_menu"></span>
		<ul>
			<a href="/"><img class="nav_principal_logotipo" src="{{ asset('img/logos/LogoInnova.svg') }}"></a>
			<li><a href="/">Home</a></li>
			<li><a href="/productos">Productos</a></li>
            <!-- Authentication Links -->
            @guest
                <li><a href="{{ route('login') }}">Ingresar<i class="fa fa-user logo_user"></i></a></li>
                <li><a href="{{ route('register') }}">Registrarse</a></li>
            @else
                <li class="nav-item dropdown">

                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre><i class="fa fa-user logo_user"></i></a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    	<a class="dropdown-item">
                        	{{ Auth::user()->nombre }} {{ Auth::user()->apellido }} <span class="caret"></span>
                    	</a>
                    	<a class="dropdown-item" href="{{ route('perfil') }}">
                        	{{ __('Mi cuenta') }}
                    	</a>
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                            {{ __('Salir') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
            @endguest
        </ul>
	</nav>
    <a href="/cart">
        <?php $cart = session('cart') ?>
            
        <span id="carrito_icono" class="fa fa-cart-plus carrito_icono">
            <span class="notificacion_carrito">{{ count($cart) }}</span>
        </span>
    </a>
	<span class="fa fa-bars abrir_menu"></span>
</header>