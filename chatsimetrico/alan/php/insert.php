<?php 
	include 'config.php';
	mysql_set_charset('utf8');

	$usuario = $_POST['usuario'];
	$mensaje = $_POST['mensaje'];

	// Datos de entrada
	$texto = $mensaje;
	$key   = '12345678901234567890123456789012';

	// Proceso de cifrado
	$iv    = 'abcdefghijklmnopqrstuvwxyz012345';
	$td = mcrypt_module_open('rijndael-256', '', 'ecb', '');
	mcrypt_generic_init($td, $key, $iv);
	$texto_cifrado = mcrypt_generic($td, $texto);
	mcrypt_generic_deinit($td);
	mcrypt_module_close($td);

	// Opcionalmente codificamos en base64
	$mensaje = base64_encode($texto_cifrado);


	$sql = "INSERT INTO mensajes (autor, mensaje, fecha, hora) VALUES ('$usuario', '$mensaje', NOW(), NOW())";
	mysql_query ($sql); 
	
	mysql_close($conexion);


 ?>