<?php

session_start();

$_SESSION = array();

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
	$nombre = isset($_POST['nombre']) ? $conn->real_escape_string($_POST['nombre']) : '';
	$a_paterno = isset($_POST['a_paterno']) ? $conn->real_escape_string($_POST['a_paterno']) : ''; 
	$a_materno = isset($_POST['a_materno']) ? $conn->real_escape_string($_POST['a_materno']) : '';
	$correo = isset($_POST['correo']) ? $conn->real_escape_string($_POST['correo']) : ''; 
	$nom_sistema = isset($_POST['nom_sistema']) ? $conn->real_escape_string($_POST['nom_sistema']) : '';
	$clave_sistema = isset($_POST['clave_sistema']) ? $conn->real_escape_string($_POST['clave_sistema']) : ''; 
	$returnJs = [];
	$returnJs['registrado'] = false;
					
	$sql = "INSERT INTO usuario(usuario, contrasena, nombre, a_paterno, a_materno, correo_electronico, nombre_otro_sistema, id_otro_sistema) VALUE ('{$usuario}', '{$contrasena}', '{$nombre}', '{$a_paterno}', '{$a_materno}', '{$correo}', '{$nom_sistema}', '{$clave_sistema}')";
									
	$conn->query($sql);

	if($conn->affected_rows == 1){
		$returnJs['registrado'] = true;
		
		$_SESSION['usuario'] = $conn->insert_id;
		$_SESSION['tipo'] = 0;
		
	}
					
	echo json_encode($returnJs);
	$conn->close();
}