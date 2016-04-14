<?php 
	$conexion = mysql_connect("localhost","kevin","root");
	if (!$conexion) { die("Fallo la conexión a la Base de Datos:" . mysql_error()); }
	$seleccionar_bd = mysql_select_db("chat", $conexion);
	if (!$seleccionar_bd) { die("Fallo la selección de la Base de Datos: " . mysql_error()); }
 ?>