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
	$returnJs['realizado'] = false;
	$pk_actividad = 0;
	$incidencia = isset($_POST['incidencia']) ? $_POST['incidencia']+0 : 0;
	$solicito = isset($_POST['solicito']) ? $conn->real_escape_string($_POST['solicito']) : "";
	$medio_solicitado = isset($_POST['medio_solicitado']) ? $conn->real_escape_string($_POST['medio_solicitado']) : "";
	$problematica = isset($_POST['problematica']) ? $conn->real_escape_string($_POST['problematica']) : "";
	$avance = isset($_POST['avance']) ? $conn->real_escape_string($_POST['avance']) : "";
	$porcentaje_avance = isset($_POST['porcentaje_avance']) ? $conn->real_escape_string($_POST['porcentaje_avance']) : "";
	$finalizado = isset($_POST['finalizado']) ? $conn->real_escape_string($_POST['finalizado']) : "";
	$retraso = isset($_POST['retraso']) ? $conn->real_escape_string($_POST['retraso']) : "";
	
	$sql = "INSERT INTO actividad(fk_usuario, incidencia, solicito, medio_solicitado, resumen_problematica, descripcion_avance, porcentaje, finalizo, retraso) VALUE ({$_SESSION['usuario']}, '{$incidencia}', '{$solicito}', '{$medio_solicitado}', '{$problematica}', '{$avance}', {$porcentaje_avance}, {$finalizado},'{$retraso}');";
	
	error_log($sql);
									
	$conn->query($sql);

	if($conn->affected_rows == 1){
		
		$pk_actividad = $conn->insert_id;
		foreach ($_POST as $clave=>$value){
			 
		   if(is_numeric($clave) && is_numeric($value)){
			   
			   error_log($clave.' = '.$value);
			   $sql = "INSERT INTO hora_act(tiempo, fk_catalogo_act, fk_actividad ) VALUE ({$value}, {$clave}, {$pk_actividad})";
	
				error_log($sql);
												
				$conn->query($sql);
				if($conn->affected_rows == 1){
					
					$returnJs['realizado'] = true;
					
				}
			   
		   }
		}
		
	} else {
		
		
	}
					
	echo json_encode($returnJs);
	$conn->close();
}