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
	$usuario = isset($_POST['usuario']) ? $_POST['usuario']+0 : 0;
	$tiempo = isset($_POST['tiempo']) ? $conn->real_escape_string($_POST['tiempo']) : "";
				
	$sql = " SELECT * FROM actividad WHERE fk_usuario={$usuario} && date_format(`registro`,'%Y-%c') = '{$tiempo}' ORDER BY registro DESC;";
	
	error_log($sql);
	
	$result = $conn->query($sql);
	
	if ($result->num_rows > 0) {
		
		while($restultados = $result->fetch_assoc()){
			$returnJs['actividad'][]=$restultados;
		}
		
		$result->free();
	}
					
	echo json_encode($returnJs);
	$conn->close();
}