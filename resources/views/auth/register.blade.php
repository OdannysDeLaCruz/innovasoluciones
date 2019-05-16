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
	
	<!-- SECCION DE FORMULARIO DE REGISTRO -->
	<div class="contenedor_registro">
		<form class="form_registro" method="POST" action="{{ route('register') }}">
			{{ csrf_field() }} 
			<figure>
				<img class="form_registro_logo" src="img/logos/LogoInnova.svg">
			</figure>
			<h1 class="form_registro_titulo">Hola, registrate para empezar a comprar.</h1>
			<div class="form_registro_grupo">
				<div class="nombre_apellido row">
					<div class="user col-xs-12 col-md-6">
						<!-- NOMBRE -->
						<label for="nombre" class="texto mt-4 mt-md-0">Nombre</label>
						<input id="nombre" type="text" class="nombre {{ $errors->has('usuario_nombre') ? ' is-invalid' : '' }}" name="usuario_nombre" value="{{ old('usuario_nombre') }}" required placeholder="Digite su nombre">

		                @if ($errors->has('usuario_nombre'))
		                    <span class="invalid-feedback" role="alert">
		                        <strong>{{ $errors->first('usuario_nombre') }}</strong>
		                    </span>
		                @endif
					</div>

	                <div class="user col-xs-12 col-md-6 pl-md-2">
		                <!-- APELLIDO -->
						<label for="apellido" class="texto mt-4 mt-md-0">Apellido</label>
						<input id="apellido" type="text" class="apellido {{ $errors->has('usuario_apellido') ? ' is-invalid' : '' }}" name="usuario_apellido" value="{{ old('usuario_apellido') }}" required placeholder="Digite su apellido">

		                @if ($errors->has('usuario_apellido'))
		                    <span class="invalid-feedback" role="alert">
		                        <strong>{{ $errors->first('usuario_apellido') }}</strong>
		                    </span>
		                @endif	                	
	                </div>
				</div>

				<!-- Nº DOCUMENTO -->
				<label class="texto"></label>
				<input id="usuario_cedula" type="number" class="num_documento {{ $errors->has('usuario_cedula') ? ' is-invalid' : '' }}" name="usuario_cedula" value="{{ old('usuario_cedula') }}" required placeholder="Nº de documento">

                @if ($errors->has('usuario_cedula'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('usuario_cedula') }}</strong>
                    </span>
                @endif

                <!-- TELEFONO -->
				<label class="texto"></label>
				<input id="usuario_telefono" type="number" class="num_documento {{ $errors->has('usuario_telefono') ? ' is-invalid' : '' }}" name="usuario_telefono" value="{{ old('usuario_telefono') }}" required placeholder="Digite su número de teléfono ó celular">

                @if ($errors->has('usuario_telefono'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('usuario_telefono') }}</strong>
                    </span>
                @endif

				<!-- EMAIL -->
				<label for="email" class="texto">E-mail</label>
				<input id="email" type="email" class="email {{ $errors->has('email') ? 'is-invalid' : '' }}" name="email" value="{{ old('email') }}" required placeholder="Correo electrónico">
				<small class="msm_email">No compartiremos este email con nadie mas</small>

				@if ($errors->has('email'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif

				<!-- PASSWORD -->
				<label for="password" class="texto">Contraseña</label>
				<input id="password" type="password" class="password {{ $errors->has('password') ? 'is-invalid' : '' }}" name="password" value="{{ old('password') }}" min="6" max="15" required placeholder="Minimo 6 caracteres">

				@if ($errors->has('password'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
				
				<!-- PASSWORD CONFIRMED -->
                <label for="password" class="texto">Confirmar contraseña</label>
				<input id="password-confirm" type="password" class="password" name="password_confirmation" placeholder="Repita su contraseña">

				<label class="aceptar_terminos">
					Al registrarme, declaro que soy mayor de edad y acepto los <a href="terminos">Terminos y Condiciones de Innova Soluciones</a>
				</label>
				<button type="submit" class="btn_registrarse">Registrarme</button>
				<label class="ya_tengo_cuenta">
					<p>Ya tengo una cuenta <a href="{{ route('login') }}">Iniciar sesión</a></p>					
				</label>
			</div>
		</form>
	</div>
	<!-- FIN SECCION DE FORMULARIO DE REGISTRO

	
	<!-- SECCION FOOTER -->
	@include('includes/footer')	
	<!-- FIN FOOTER -->
	
	<!-- SECCION SCRIPTS JS -->
	@include('includes/scripts')
	<!-- FIN SCRIPTS JS -->
</body>
</html>