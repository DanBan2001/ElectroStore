<!DOCTYPE html>
<html  lang="es">
    <meta charset="UTF-8">
    <title>ElectroStore</title>
    <meta name="viewport" content="width=device-width, user-scalable=no,
    initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel = "stylesheet" href="assets/css/stylesLogin.css">
    <link rel = "stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
    <link rel="icon" type="image/png" href="assets/img/logo.jpg">

</head>
<body>

	<main>
		<div class="contenedor__todo">
			<div class="caja__trasera">
				<div class="caja__trasera-login">
					<h3>¿Ya tienes una cuenta?</h3>
					<p>Inicia Sesión para poder realizar tus compras</p>
					<button id="btn__iniciar-sesion">Iniciar Sesión</button>
				</div>
				<div class="caja__trasera-register">
					<h3>¿Aún no tienes una cuenta?</h3>
					<p>Registrate para poder iniciar sesión y poder realizar tus compras</p>
					<button id="btn__register">Registrate</button>
				</div>

			</div>
			<!---FORMULARIOS DE LOGIN Y REGISTER----->
			<div class="contenedor__login-register">
				<!---LOGIN----->
				<form action="php/login_usuario_be.php" method="POST" class="formulario__login">
					<h2>Iniciar Sesión</h2>
					<input type="text" placeholder="Ingresar correo electrónico o usuario" name="correo">
					<input type="password" placeholder="Ingresar contraseña" name="contrasena">
					<button>Entrar</button>
				</form>
				<!---REGISTER----->
				<form action="php/register_usuario_be.php" method="POST" class="formulario__register">
				<h2>Registrate</h2>
				<input type="text" placeholder="Nombre Completo" name="nombre_completo">
				<input type="text" placeholder="Correo Electrónico" name="correo">
				<input type="text" placeholder="Usuario" name="usuario">
				<input type="password" placeholder="contraseña" name="contrasena">
				<button >Registrarse</button>
				</form>
			</div>

		</div>
	</main>
	<script src="assets/js/loginregister.js"></script>
</body>
</html>