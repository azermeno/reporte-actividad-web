<?php

if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
	
  require_once 'configMySQL.php';

	$conn = new mysqli($mysql_config['host'], $mysql_config['user'], $mysql_config['pass'], $mysql_config['db']);
		// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	} 
	$conn->set_charset("utf8");
	
	$usuario = isset($_POST['usuario']) ? $conn->real_escape_string($_POST['usuario']) : '';
	$contrasena = isset($_POST['contrasena']) ? $conn->real_escape_string($_POST['contrasena']) : ''; 
	$returnJs = [];
	$returnJs['registrado'] = false;
				
	$sql = "SELECT CONCAT(nombre,' ', a_paterno,' ', a_materno) as nombre, es_administrador as tipo from usuario where usuario = '{$usuario}' && contrasena = '{$contrasena}' && activo = 1";
										
	$result = $conn->query($sql);
	if ($result->num_rows == 1) {
		
		$returnJs = $result->fetch_assoc();
		$returnJs['registrado'] = true ;
		$result->free();
	}
					
	echo json_encode($returnJs);
	$conn->close();
}