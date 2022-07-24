<?php
		session_start();
		
		include 'conexion_be.php';

			$correo = $_POST['correo'];
			$usuario = $_POST['correo'];
			$contrasena = $_POST['contrasena'];
			$contrasena = hash('sha512', $contrasena);


			$validar_login = mysqli_query($conexion, "SELECT*FROM usuarios WHERE correo ='$correo' AND contrasena='$contrasena' " );  //VERIFICA SI EL CORREO ESTA EN LA BD
			$validar_login1 = mysqli_query($conexion, "SELECT*FROM usuarios WHERE usuario ='$usuario' AND contrasena='$contrasena' " );
			 //VERIFICA SI EL USER ESTA EN LA BD


			//$usuario2 = mysqli_query($conexion, "SELECT usuario FROM usuarios WHERE correo ='$correo' " );
			//$user = mysqli_fetch_array($usuario2);

				if (mysqli_num_rows($validar_login1) >0) {
				$_SESSION['usuario'] = $usuario;
				$_SESSION['acceso'] = true;
			header("location: ../indexlog.php");    //SI EL usuario Y CONTRASEÑA ESTA EN UNA CUENTA SE INGRESARA A UNA PAGINA DE BIENVENIDA O HOME DE LA PAGINA CON SU USUARIO
			exit();
				}else{
					if (mysqli_num_rows($validar_login) > 0){
			$_SESSION['usuario'] = $usuario;
			$_SESSION['acceso'] = true;
			header("location: ../indexlog.php");    //SI EL CORREO Y CONTRASEÑA ESTA EN UNA CUENTA SE INGRESARA A UNA PAGINA DE BIENVENIDA O HOME DE LA PAGINA CON SU USUARIO
			exit();
		}else{
			
			echo '
			<script>
				alert("Datos erroneos o cuenta inexistente, por favor verifique el correo y contraseña introducidos e intente nuevamente.");
				window.location="../login_register.php";
			</script>
			';
			exit();
		}

			}


		
 
		

	

		



?>