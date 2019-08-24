<!DOCTYPE html> 
<html lang="es"> 
<head> 
	<meta charset="UTF-8"> 
	<title>Innova Inc, Sitio en construcción</title> 
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"> 
	<style type="text/css"> 
		@import url('https://fonts.googleapis.com/css?family=Montserrat:400,400i,500,500i,600,600i,700,800,900|Nunito:400,400i,600,600i,700,800,900&display=swap');
		html, body { width: 100%; height: 100%; } 
		* {
			margin: 0;
			padding: 0;
			box-sizing: border-box;
		}
		body { 
			box-sizing: border-box;
			font-family: 'Nunito', sans-serif;
			padding: 0; margin: 0; 
			background: url('img/fondo.jpg'); 
			background-size: 100vw 110%; 
			background-repeat: no-repeat; 
			display: flex; 
			justify-content: center; 
			color: #fff;
			/*align-items: center; */
		} 
		.contenedor { 
			background: rgba(0,0,0,.5);
			width: 100vw;
			height: 100vh; 
			padding: 10px; 
			padding-top: 150px;
			margin: auto; 
			display: flex;
			flex-direction: column; 
			align-items: center; 
		}
		.contenedor > img { 
			width: 300px; 
			animation: animacion 5s infinite;
			animation-timing-function: linear;
		} 
		.contenedor > h1 { 
			margin: 0;
			font-size: 80px;
			font-weight: 800;
			text-align: center;
		} 
		.contenedor > h2 { 
			margin: 0;
			font-size: 30px;
			font-weight: 600;
			text-align: center;
		}
		@keyframes animacion {
			from {
				transform: rotateZ(0deg);
			}
			to {
				transform: rotateZ(360deg);
			}
		}
		@media (max-width: 500px){ 
			body { 
				background-size: 700px 100vh; 
				background-position: -200px 0; 
			}	
			.contenedor > img { 
				width: 150px; 
			} 
			.contenedor > h1 { 
				font-size: 30px;
			} 
			.contenedor > h2 { 
				font-size: 15px;
			}
		}

	</style> 
</head> 
<body> 
	<div class="contenedor"> 
		<img src="{{ asset('img/logos/isotipo.png') }}">
		<h1>Camina hacia el futuro...</h1>
		<h2>Abriremos dentro de poco</h2>
	</div> 
</body> 
</html>