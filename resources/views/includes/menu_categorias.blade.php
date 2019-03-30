<!--SECCION NAV CATEGORIAS -->
<nav class="nav_categorias">
	@foreach($secciones as $seccion)
		@php
			$ruta = str_replace(' ','-', $seccion['seccion_nombre']);
			$ruta = strtolower($ruta);
		@endphp
		<a href="/productos/{{ $ruta }}"> {{ $seccion['seccion_nombre'] }} </a>
	@endforeach
</nav>
<!-- FIN SECCION NAV CATEGORIAS