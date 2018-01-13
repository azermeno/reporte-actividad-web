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
					
		$sql = " SELECT pk_catalogo_act, nombre_actividad FROM catalogo_act WHERE activo=1";
											
	$result = $conn->query($sql);
	
	if ($result->num_rows > 0) {
		
		while($restultados = $result->fetch_assoc()){
			$returnJs['actividades'][]=$restultados;
		}
		
		$result->free();
	}
					
	echo json_encode($returnJs);
	$conn->close();
}