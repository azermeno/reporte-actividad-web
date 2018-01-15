<?php 
session_start();
if (!isset($_SESSION["tipo"]) && !isset($_SESSION["usuario"])) {
    header("Location: index.html"); /* Redirect browser */
	
	exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>reporte actividad</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" href="img/favicon.ico">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/bootstrap-theme.min.css">
  <script src="js/jquery-1.11.3.min.js" type="text/javascript"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/reporte_actividad.js"></script>
</head>
<body> 
 
<div class="container">
  
  <div class="panel panel-default" style="width:50%; margin: 50px auto; text-align:center">
    <form action="/action_page.php" style="margin: 10px;" id='formulario'>
		<div class="form-group">
			<label for="incidencia">Incidencia (opcional):</label>
			<input type="text" class="form-control" id="incidencia" name="incidencia">
		</div>
		
		 <div class="form-group"> 
			<label for="solicito">Solicit&oacute;</label>
			<input type="text" class="form-control" id="solicito" name="solicito">
		 </div>
		 <div class="form-group"> 
			<label for="medio_solicitado">Medio solicitado (Customer, Propia,Telef&oacute;no, etc.. )</label>
			<input type="text" class="form-control" id="medio_solicitado" name="medio_solicitado">
		 </div>
		 <div class="form-group"> 
			<label for="problematica">Problem&aacute;tica:</label>
			
			<textarea class="form-control" rows="6" id="problematica" name="problematica"></textarea>
		 </div>
		 <div class="form-group"> 
			<label for="avance">Descripci&oacute;n de avance:</label>
			
			<textarea class="form-control" rows="8" id="avance" name="avance"></textarea>
		 </div>
		 <div class="form-group">
			<div class="row">
			  <div class="col-lg-6">		 
				<div class="input-group">
				  <input type="text" class="form-control" placeholder="Num&eacute;rico" aria-describedby="basic-addon1" id="porcentaje_avance" name="porcentaje_avance">
				  <span class="input-group-addon" id="basic-addon1">% de avance</span>
				  </div>
			   </div>
			   <div class="col-lg-6">		 
				
				   <label class="radio-inline"><input type="radio" name="finalizado"  value="0" checked>Pendiente</label>
				   <label class="radio-inline"><input type="radio" name="finalizado" value="1" >Concluido</label>
			  
			   </div>
			 </div>
		 </div>
		 <div class="form-group"> 
			<label for="retraso">Motivo de retraso/ Cambio /Cancelaci&oacute;n:</label>
			
			<textarea class="form-control" rows="4" id="retraso" name="retraso"></textarea>
		 </div>
		 <div class="form-group"> 
			<label>Horas de actividad:</label>
			<div class="table-responsive">
			  <table class="table" id="horas">
				<thead id='titulo'>
      
				</thead>
				<tbody id="cuerpo">
				  
				</tbody>
			  </table>
			</div>
						
		 </div>
		 
						
		  <button type="submit" id="enviar" class="btn btn-info" style="margin: 0 auto;">Guarda reporte</button>
		  <button type="button" id="cancelar" class="btn btn-warning" style="margin: 0 auto;">Cancelar</button>
		  <br>
		  <br>
 </form>
  </div>
</div>

</body>
</html>