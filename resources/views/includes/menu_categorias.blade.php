<!--SECCION NAV CATEGORIAS -->
<nav class="nav_categorias">
	@foreach($secciones as $seccion)
		<a href="#"> {{ $seccion['nombre'] }} </a>
	@endforeach
</nav>
<!-- FIN SECCION NAV CATEGORIAS