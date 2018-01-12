<?php 
session_start();
if (!isset($_SESSION["tipo"]) && !isset($_SESSION["usuario"])) {
    header("Location: index.html"); /* Redirect browser */
	echo "entro";
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
  <link rel="stylesheet" href="css/bootstrap-select.css">
  <script src="js/jquery-1.11.3.min.js" type="text/javascript"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/bootstrap-select.js" type="text/javascript"></script>
  <script src="js/visor_general.js"></script>
</head>
<body>
	<div class="container centrado">
	
	<nav class="navbar navbar-inverse  navbar-fixed-top" role="navigation" style="background:rgb(44,111,160);">
    <div class="container-fluid">
        <div class="navbar-header" style="width:20%;">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar" >
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>

            </button>

            <a class="navbar-brand" href="#" style="width:80%;text-align:center;color:white;">M&eacute;dicoNet</a>
        </div>
        <div class="collapse navbar-collapse" id="navbar">

            <ul class="nav navbar-nav">
                <li class="active">
					<a href="#" style="background:rgb(24,91,140);">Inicio
					</a>
				</li>               
			</ul>            
            <ul class="nav navbar-nav navbar-right">
				<li>
					 <p class="navbar-text" style="color:white;" id="nombre_usuario">Nobre de prueba</p>
				</li>
				<li>
					<a href="salir.php" style="color:white;">Salir</a>
				</li>
						
            </ul>
               
        </div>
    </div>
</nav>
<div class="starter-template" style="text-align:center">
	<br>
	<div class="tab-content">
		<div id="resultados" class="tab-pane fade in active">
			<div class="centrado">
				
				<div class="panel panel-default" style="width: 50%; margin:6% auto 0 auto; ">
					
						<div class="panel panel-body" style="margin-bottom: 0px;">
														  
							<div id="usuario" style="display:none;    margin-bottom: 15px;">
								<select id="unidad" data-width="100%" class="selectpicker" data-live-search="true" title='Selecciona un usuario...'>
								</select>
							</div>
							
							<div id="mes">
								<select id="unidad" data-width="100%" class="selectpicker" data-live-search="true" title='Selecciona un mes...'>
								</select>
							</div>
													
							<div style="text-align: center; display:none;" id="verEstado">
							<br>
							  <label style="font-size:150%" id="estado"></label>  
							</div>
						</div>
					
				</div>
					
					<table class="table table-bordered"style="margin-top: 20px;">
						<thead >
						  <tr class="info">
							<th style="width:50%;">Reporte</th>
							<th style="width:15%; text-align:center;">Registrado</th>
							<th style="width:15%; text-align:center;">Editado</th>
							<th style="width:20%; text-align:center;">Ver reporte</th>
						  </tr>
						</thead>
						<tbody id="secciones">
						  
						</tbody>
					</table>
				
				<br>
				
			</div>
		</div>
			 
	</div>
</div>

	</div><!-- /.container -->

    </body>
</html>