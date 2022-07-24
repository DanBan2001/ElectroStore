<?php

	include 'conexion_be.php';

	$nombre_completo = $_POST['nombre_completo'];
	$correo = $_POST['correo'];
	$usuario = $_POST['usuario'];
	$contrasena = $_POST['contrasena'];
	$contrasena = hash('sha512', $contrasena);									//encripta la password

	$query = "INSERT INTO usuarios(nombre_completo, correo, usuario, contrasena) VALUES('$nombre_completo', '$correo', '$usuario', '$contrasena')";


	//verificar que el correo no se repita en la BD
	$verificar_correo = mysqli_query($conexion, "SELECT * FROM usuarios WHERE correo='$correo' ");

	if(mysqli_num_rows($verificar_correo) > 0){
		echo '
			<script>
				alert("Este correo electrónico ya está vinculado con una cuenta, intenta con un correo electrónico diferente por favor.");
				window.location = "../login_register.php";
			</script>
		';
		exit();
	}


	$verificar_usuario = mysqli_query($conexion, "SELECT * FROM usuarios WHERE usuario='$usuario' ");

	if(mysqli_num_rows($verificar_usuario) > 0){
		echo '
			<script>
				alert("Este nombre de usuario ya está en uso, intenta con uno diferente.");
				window.location = "../login_register.php";
			</script>
		';
		exit();
	}



	$ejecutar = mysqli_query($conexion,$query);



	if($ejecutar){
		echo '
			<script>
				alert("Usuario registrado exitosamente");
				window.location = "../index.php";
			</script>
		';
	}else{
		echo '
			<script>
				alert("Usuario no registrado, intentalo nuevamente.");
				window.location = "../login_register.php";
			</script>
		';

	}

	mysql_close($conexion);
?>