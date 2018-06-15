<header class="header_principal">
	<a class="header_principal_img" href="/">
		<img src="img/logos/LogoInnova.svg" alt="Logotipo de Innova Soluciones">
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
			<img class="nav_principal_logotipo" src="img/logos/LogoInnova.svg">
			<li><a href="/">Home</a></li>
			<li><a href="/productos.php">Productos</a></li>
			<li><a href="/register.php">Registrarse</a></li>
			<li><a href="/login.php">Ingresar<i class="fa fa-user logo_user"></i></a></li>
		</ul>
	</nav>
	<span id="carrito_icono" class="fa fa-cart-plus carrito_icono"></span>
	<span class="fa fa-bars abrir_menu"></span>
</header>