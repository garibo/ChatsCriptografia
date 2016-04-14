<?php 
	include 'config.php';
	mysql_set_charset('utf8');

	$usuario = $_POST['usuario'];
	$mensaje = $_POST['mensaje'];

	// Aqui comienza el encriptador
	$public_key = openssl_get_publickey(file_get_contents('public.pem'));

	$data = $mensaje;

	$encrypted = $e = NULL;
	openssl_seal($data, $encrypted, $e, array($public_key));

	$sealed_data = base64_encode($encrypted);
	$envelope = base64_encode($e[0]);


	$sql = "INSERT INTO mensajesa (autor, sealed, envelope, fecha, hora) VALUES ('$usuario', '$sealed_data', '$envelope', NOW(), NOW())";
	mysql_query ($sql); 
	
	mysql_close($conexion);


 ?>