<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/estilos.css">
	<link rel="stylesheet" type="text/css" href="css/media-query.css">
	<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
	<title> Register | Innova Soluciones </title>
</head>
<body>

	<!-- SECCION HEADER -->
	@include('includes/header')
	<!-- FIN HEADER -->

	<!-- SECCION CARRITO -->
	@include('includes/carrito')
	<!-- FIN CARRITO -->
	
	<!-- SECCION DE FORMULARIO DE LOGIN -->
	<div class="contenedor_registro">
		<form class="form_registro" action="{{ route('login') }}" method="POST">
			{{ csrf_field() }} 
			<figure>
				<img class="form_registro_logo" src="img/logos/LogoInnova.svg">
			</figure>
			<h1 class="form_registro_titulo">Hola bienvenido, es un gusto tenerte aquí nuevamente.</h1>
			<div class="form_registro_grupo">

				<label for="email" class="texto">Email</label>
				<input id="email" type="email" class="email {{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder="Digite su correo electrónico" required>

				@if ($errors->has('email'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif

				<label for="password" class="texto">Clave</label>
				<input id="password" type="password" class="password {{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="Digite su contraseña" required>

                @if ($errors->has('password'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif

                <label class="recordar_password">
                    <input type="checkbox" class="recordar_password" name="remember" {{ old('remember') ? 'checked' : '' }}> {{ __('Recordar clave') }}
				</label>

				<button type="submit" class="btn_registrarse">Entrar</button>
				<label class="recordar_password">
					<a href="{{ route('password.request') }}">Olvidé mi contraseña</a>
				</label>
				<label class="ya_tengo_cuenta">
					<p>Aun no tengo una cuenta <a href="{{ route('register') }}">Registrarme</a></p>
					
				</label>
			</div>
		</form>
	</div>
	<!-- FIN SECCION DE FORMULARIO DE LOGIN -->

	
	<!-- SECCION FOOTER -->
	@include('includes/footer')	
	<!-- FIN FOOTER -->
	
	<!-- SECCION SCRIPTS JS -->
	@include('includes/scripts')
	<!-- FIN SCRIPTS JS -->
</body>
</html>