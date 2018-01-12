<?php

if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
	
	session_start();

	$_SESSION = array();
	
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
				
	$sql = "SELECT pk_usuario, CONCAT(nombre,' ', a_paterno,' ', a_materno) as nombre, es_administrador from usuario where usuario = '{$usuario}' && contrasena = '{$contrasena}' && activo = 1";
										
	$result = $conn->query($sql);
	if ($result->num_rows == 1) {
		
		$row = $result->fetch_assoc();
		$returnJs['registrado'] = true ;
		$result->free();
		$_SESSION['usuario'] = $row['pk_usuario'];
		$_SESSION['tipo'] = $row['es_administrador'];
	}
					
	echo json_encode($returnJs);
	$conn->close();
}


