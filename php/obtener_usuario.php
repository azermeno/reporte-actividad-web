<?php

if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
	
  session_start();
	
  require_once 'configMySQL.php';

	$conn = new mysqli($mysql_config['host'], $mysql_config['user'], $mysql_config['pass'], $mysql_config['db']);
		// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	} 
	$conn->set_charset("utf8");
	$returnJs = [];
	$returnJs['registrado'] = false;
	$returnJs['tipo'] = $_SESSION['tipo'];
	
	if($_SESSION['tipo'] == 1){//Es administrador
		
		$sql = "SELECT pk_usuario, CONCAT(nombre,' ', a_paterno,' ', a_materno) as nombre, es_administrador as tipo from usuario where activo = 1 && es_administrador = 0";
		
	} else {
		
		$sql = "SELECT pk_usuario, CONCAT(nombre,' ', a_paterno,' ', a_materno) as nombre, es_administrador as tipo from usuario where pk_usuario ={$_SESSION['usuario']}";
		
	}
										
	$result = $conn->query($sql);
	
	if ($result->num_rows > 0) {
		
		while($restultados = $result->fetch_assoc()){
			$returnJs['usuario'][]=$restultados;
		}
		
		$returnJs['nombre'] = $_SESSION['tipo'] == 1 ? 'ADMIN' : $returnJs['usuario'][0]['nombre'];
		$returnJs['registrado'] = true ;
		$result->free();
	}
					
	echo json_encode($returnJs);
	$conn->close();
}