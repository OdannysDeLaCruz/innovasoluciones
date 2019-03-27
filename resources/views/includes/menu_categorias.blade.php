<!--SECCION NAV CATEGORIAS -->
<nav class="nav_categorias">
	@foreach($secciones as $seccion)
		@php
			$ruta = str_replace(' ','-', $seccion['seccion__nombre']);
			$ruta = strtolower($ruta);
		@endphp
		<a href="/productos/{{ $ruta }}"> {{ $seccion['seccion__nombre'] }} </a>
	@endforeach
</nav>
<!-- FIN SECCION NAV CATEGORIAS