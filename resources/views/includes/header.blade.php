<header class="header_principal">

    <span class="abrir_menu">
        <img fill="#fff" src="{{ asset('img/generals-icons/icono-abrir-menu.svg') }}">
    </span>

    <nav class="nav_principal" id="nav_principal">
        <ul>
            <div class="cerrar_menu">
                <img id="cerrar_menu" src="{{ asset('img/generals-icons/icono-cerrar-menu.svg') }}">
            </div>

            <!-- Authentication Links -->
            @guest

                <span class="nav_principal_links_login">
                    <a href="{{ route('login') }}"> Ingresar</a> ó <a href="{{ route('register') }}">Registrarse</a>
                </span>
                <div class="nav_principal_separador"></div>

                <li><a href="{{ route('home') }}"><img class="logos_menu"></img> Home</a></li>
                <li><a href="{{ route('productos') }}"><img class="logos_menu"></img> Productos</a></li>

                <div class="nav_principal_separador"></div>

                <li><a href="">Centro de ayuda</a></li>
                <li><a href="">Contáctenos</a></li>

            @else
                <div class="information-user-logged">
                    <div class="information-user-logged-img">
                        <img src="{{ asset('uploads/avatars/avatar.png') }}">
                    </div>
                    <span class="information-user-logged-nombre">
                        {{ Auth::user()->usuario_nombre }} {{ Auth::user()->usuario_apellido }}
                    </span>
                    @if(Auth::user()->rol_id == 1)
                        <span class="information-user-logged-item"> Administrador </span>
                    @endif
                </div>

                <div class="nav_principal_separador"></div>

                <li><a href="{{ route('perfil') }}">Mi Perfil</a></li>
                @if(Auth::user()->rol_id == 1)
                    <li><a target="blank" href="{{ route('admin') }}">Panel de administración</a></li>
                @endif

                <div class="nav_principal_separador"></div>

                <li><a href="{{ route('home') }}">Home</a></li>
                <li><a href="{{ route('productos') }}">Productos</a></li>

                <div class="nav_principal_separador"></div>

                <li><a href="">Centro de ayuda</a></li>
                <li><a href="">Contáctenos</a></li>

                <div class="nav_principal_separador"></div>

                <li class="btn_cerrar_sesion">
                    <a href="{{ route('logout') }}"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit(); ">
                        Cerrar sesión
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
            @endguest
        </ul>
    </nav>
	<a class="header_principal_img d-none d-md-block" href="{{ route('home') }}">
		<img src="{{ asset('img/logos/logo-innova-blanco.svg') }}" alt="Logotipo de Innova Soluciones">
	</a>
	<div class="contenedor_formulario">
		<form class="formulario_buscar_producto" action="{{ route('searchtags') }}" method="POST">
            {{ csrf_field() }}
            <input class="input_buscador_producto" type="text" name="search" placeholder="Busca tu producto" value="@isset($search) {{ $search }} @endisset" required>
            <button class="btn_buscar" type="submit"><span class="fa fa-search"></span></button>
        </form>
	</div>

    <a class="link_cart" href="{{ route('showCart') }}">
        <?php 
            $cantidad_productos = 0;
            $cart = session('cart');
            
            if(!empty($cart)) {
                foreach ($cart as $producto) {
                    $cantidad_productos += $producto['cantidad'];
                }
            }     
        ?>
            
        <span id="carrito_icono" class="fa fa-cart-plus carrito_icono">
            <span class="notificacion_carrito">{{ $cantidad_productos }}</span>
        </span>
    </a>
	
</header>