<!--SECCION NAV CATEGORIAS -->
<nav class="nav_categorias">
	@foreach($secciones as $seccion)
		<?php
			$ruta = str_replace(' ','-', $seccion['nombre']);
			$ruta = strtolower($ruta);
		?>
		<a href="/productos/{{ $ruta }}"> {{ $seccion['nombre'] }} </a>
	@endforeach
</nav>
<!-- FIN SECCION NAV CATEGORIAS