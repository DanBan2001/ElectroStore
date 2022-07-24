
<?php
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$number = $_POST['number'];
$direccion = $_POST['direccion'];
$correo = $_POST['correo'];
$captura = $_POST['captura'];

$header = 'From: ' . $correo . " \r\n";
$header .= "X-Mailer: PHP/" . phpversion() . " \r\n";
$header .= "Mime-Version: 1.0 \r\n";
$header .= "Content-Type: text/plain";

$message = "Nombre del Cliente: " . $nombre . " \r\n";
$message .= "Su e-mail es: " . $correo . " \r\n";
$message .= "Teléfono de contacto: " . $number . " \r\n";
$message .= "Enviado el: " . date('d/m/Y', time());
$message .= "Comprobante de pago: " . $_POST['captura'] . " \r\n";


$para = 'banegasdaniel424@gmail.com';
$asunto = 'Comprobante de pago';

mail($para, $asunto, utf8_decode($message), $header);
echo '
			<script>
				alert("Su compra entro en fase de confirmación, una vez que su compra sea valida le enviaremos un correo electronico avisando que su pedido está en camino.");
				window.location="../indexlog.php";
			</script>
			';
			exit();
?>





