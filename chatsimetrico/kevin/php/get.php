<?php 
	include 'config.php';
	mysql_set_charset('utf8');
	$datos = array();
	$sql = mysql_query('SELECT * FROM `mensajes` ORDER BY id DESC LIMIT 9');
	$i = 0;
	while($fila = mysql_fetch_array($sql))
	{
		$datos[$i] = array(
			'mensaje' => desencriptador($fila['mensaje']),
			'autor' => $fila['autor']
			);
		$i++;
	}
	$send = json_encode($datos);
	echo $send;


	function desencriptador($encriptado)
	{
		 // Opcionalmente descodificamos en base64
		$texto_cifrado = base64_decode($encriptado);
		$key   = '12345678901234567890123456789012';
		$iv    = 'abcdefghijklmnopqrstuvwxyz012345';

		// Proceso de descifrado
		$td = mcrypt_module_open('rijndael-256', '', 'ecb', '');
		mcrypt_generic_init($td, $key, $iv);
		$texto = mdecrypt_generic($td, $texto_cifrado);
		return $texto = trim($texto, "\0");
	}
 ?>