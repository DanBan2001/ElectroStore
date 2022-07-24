<?php
		
		include 'conexion_search_be.php';

			$search = $_POST['search'];

			$validar_search = mysqli_query($conexion2, "SELECT*FROM productos WHERE id_categoria ='$search' " );  //VERIFICA SI EL CORREO ESTA EN LA BD

			if (mysqli_num_rows($validar_search) > 0){
			$_SESSION['search'] = $search;
			header("location: ../search.php");    //SI EL CORREO Y CONTRASEÑA ESTA EN UNA CUENTA SE INGRESARA A UNA PAGINA DE BIENVENIDA O HOME DE LA PAGINA CON SU USUARIO
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

?>