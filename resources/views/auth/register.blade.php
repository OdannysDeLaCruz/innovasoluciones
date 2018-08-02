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
			@csrf
			<figure>
				<img class="form_registro_logo" src="img/logos/LogoInnova.svg">
			</figure>
			<h1 class="form_registro_titulo">Hola, registrate para empezar a comprar.</h1>
			<div class="form_registro_grupo">
				<div class="nombre_apellido row">
					<div class="user col-xs-12 col-md-6">
						<!-- NOMBRE -->
						<label for="nombre" class="texto mt-4 mt-md-0">Nombre</label>
						<input id="nombre" type="text" class="nombre {{ $errors->has('nombre') ? ' is-invalid' : '' }}" name="nombre" value="{{ old('nombre') }}" required placeholder="Primer nombre">

		                @if ($errors->has('nombre'))
		                    <span class="invalid-feedback" role="alert">
		                        <strong>{{ $errors->first('nombre') }}</strong>
		                    </span>
		                @endif
					</div>

	                <div class="user col-xs-12 col-md-6 pl-md-2">
		                <!-- APELLIDO -->
						<label for="apellido" class="texto mt-4 mt-md-0">Apellido</label>
						<input id="apellido" type="text" class="apellido {{ $errors->has('apellido') ? ' is-invalid' : '' }}" name="apellido" value="{{ old('apellido') }}" required placeholder="Primer apellido">

		                @if ($errors->has('apellido'))
		                    <span class="invalid-feedback" role="alert">
		                        <strong>{{ $errors->first('apellido') }}</strong>
		                    </span>
		                @endif	                	
	                </div>
				</div>

				 <!-- TIPO DE DOCUMENTO -->
				<label class="texto"></label> <!-- Para dar magin-top -->
				<select id="" class="tipo_documento" required>
					<option>Tipo de documento</option>
					<option value="CC">Cédula de ciudadanía</option>
					<option value="CE">Cédula de extranjería</option>
				</select>

				<!-- Nº DOCUMENTO -->
				<label class="texto"></label> <!-- Para dar magin-top -->
				<input id="num_documento" type="number" class="num_documento {{ $errors->has('num_documento') ? ' is-invalid' : '' }}" name="num_documento" value="{{ old('num_documento') }}" required placeholder="Nº de documento">

                @if ($errors->has('num_documento'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('num_documento') }}</strong>
                    </span>
                @endif

				<!-- EMAIL -->
				<label for="email" class="texto">Email <small>(Este será su usuario de ingreso)</small></label>
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
	<!-- FIN SECCION DE FORMULARIO DE REGISTRO -->

	
	<!-- SECCION FOOTER -->
	@include('includes/footer')	
	<!-- FIN FOOTER -->
	
	<!-- SECCION SCRIPTS JS -->
	@include('includes/scripts')
	<!-- FIN SCRIPTS JS -->
</body>
</html>