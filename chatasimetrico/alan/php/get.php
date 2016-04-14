<?php 
	include 'config.php';
	mysql_set_charset('utf8');
	$datos = array();
	$sql = mysql_query('SELECT * FROM `mensajesa` ORDER BY id DESC LIMIT 9');
	$i = 0;
	while($fila = mysql_fetch_array($sql))
	{
		$datos[$i] = array(
			'mensaje' => desencriptador($fila['sealed'], $fila['envelope']),
			'autor' => $fila['autor']
			);
		$i++;
	}
	$send = json_encode($datos);
	echo $send;


	function desencriptador($sealed_data, $envelope)
	{
		$private_key = openssl_get_privatekey(file_get_contents('private.key'));
		// Aqui comienza el desencriptador
		$input = base64_decode($sealed_data);
		$einput = base64_decode($envelope);

		$plaintext = NULL;
		openssl_open($input, $plaintext, $einput, $private_key);

		return $plaintext;
	}
 ?>