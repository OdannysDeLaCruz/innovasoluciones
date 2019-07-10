<header class="header_principal">
	<a class="header_principal_img" href="/">
		<img src="{{ asset('img/logos/LogoInnova.svg') }}" alt="Logotipo de Innova Soluciones">
	</a>
	<div class="contenedor_formulario">
		<form class="formulario_buscar_producto" action="{{ route('searchtags') }}" method="POST">
            {{ csrf_field() }}
            <input class="input_buscador_producto" type="text" name="search" placeholder="Buscar por productos, categorias, caracteristicas y más..." value="@isset($search) {{ $search }} @endisset" required>
            <button class="btn_buscar" type="submit"><span class="fa fa-search"></span></button>
        </form>
	</div>
	<nav class="nav_principal">
		<span class="fa fa-times cerrar_menu" id="cerrar_menu"></span>
		<ul>
			<a href="{{ route('home') }}"><img class="nav_principal_logotipo" src="{{ asset('img/logos/LogoInnova.svg') }}"></a>
			<li><a href="/">Home</a></li>
			<li><a href="{{ route('productos') }}">Productos</a></li>
            <!-- Authentication Links -->
            @guest
                <li><a href="{{ route('login') }}">Ingresar<i class="fa fa-user logo_user"></i></a></li>
                <li><a href="{{ route('register') }}">Registrarse</a></li>
            @else
                <li class="nav-item dropdown menu_desplegable">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre><img class="dropdown-toggle-icono-avatar" src="{{ asset('uploads/avatars/avatar.png') }}"></a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <div class="dropdown_menu_foto_perfil">
                            <div class="dropdown_menu_foto_perfil_contenedor">
                                <div class="dropdown_menu_foto_perfil_contenedor_img">
                                    <img src="{{ asset('uploads/avatars/avatar.png') }}">           
                                </div>
                            </div>                          
                            <label class="dropdown_menu_foto_perfil_nombre"> {{ Auth::user()->usuario_nombre }} {{ Auth::user()->usuario_apellido }} </label>
                        </div>
                        @if(Auth::user()->rol_id == 1)
                        	<a target="blank" class="dropdown-item" href="{{ route('admin') }}">
                            	{{ __('Panel de administración') }}
                        	</a>
                            <a class="dropdown-item" href="{{ route('perfil') }}">
                                {{ __('Mi cuenta') }}
                            </a>
                        @else
                            <a class="dropdown-item" href="{{ route('perfil') }}">
                                {{ __('Mi cuenta') }}
                            </a>
                        @endif
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                            {{ __('Cerrar sesión') }}
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
	<span class="fa fa-bars abrir_menu"></span>
</header>