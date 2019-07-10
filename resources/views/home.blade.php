<!DOCTYPE html> 
<html lang="es"> 
<head> 
	<meta charset="UTF-8"> 
	<title>Innova Inc, Sitio en construcción</title> 
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"> 
	<style type="text/css"> 
		html, body { width: 100%; height: 100%; } 
		body { 
			padding: 0; margin: 0; 
			background: url('img/fondo.jpg'); 
			background-size: 100vw 110%; 
			background-repeat: no-repeat; 
			display: flex; 
			justify-content: center; 
			align-items: center; 
		} 
		@media (max-width: 640px){ 
			body { 
				background-size: 700px 100vh; 
				background-position: -200px 0; 
				}	
			}
			.contenedor-img { 
				max-width: 700px; 
				padding: 10px; 
				margin: auto; 
				display: flex; 
				justify-content: center; 
				align-items: center; 
			} 
			.contenedor-img > img { 
				width: 100%; 
			} 
	</style> 
</head> 
<body> 
	<div class="contenedor-img"> 
		<img src="{{ asset('img/cuadro.png') }}">	
	</div> 
</body> 
</html>