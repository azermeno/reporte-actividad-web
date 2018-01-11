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
		<div class="starter-template" style="text-align:center">
		<br>
		<div class="tab-content">
			<div id="resultados" class="tab-pane fade in active">
				<div class="centrado">
					<form  id="form-send">
						<div class="panel panel-default" style="width: 50%; margin: 0 auto; ">
							<div class="form-group" style="margin-bottom:0px">
								<div class="panel panel-body" style="margin-bottom: 0px;">
									
										<br>
								   <h4 style="margin-top: 0px;">
									   <label class="radio-inline"><input type="radio" name="general" id="checked" value="0" checked>Por unidad</label>
									   <label class="radio-inline"><input type="radio" name="general" value="1" >General</label>
								   </h4>
									<div id="ocultar">
										<select id="unidad" data-width="100%" class="selectpicker" data-live-search="true" title='Unidades..'>

										</select>
									</div>

										<button id="actualiza" type="button" class="btn btn-warning" style="display:none"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span>&nbsp;Modificar prioridades</button>
										<div id="guardarCambios" style="display:none">
										<button id="guarda" type="submit" class="btn btn-success"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span>&nbsp;Guardar</button>
										<button id="cancelar" type="button" class="btn btn-danger"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span>&nbsp;Cancelar</button>
										</div>
								
									<div style="text-align: center; display:none;" id="verEstado">
									<br>
									  <label style="font-size:150%" id="estado"></label>  
									</div>
								</div>
							</div>
						</div>
						
						<table class="table table-bordered"style="margin-top: 20px;">
							<thead >
							  <tr class="info">
								<th style="width:60%;">Reporte</th>
								<th style="width:20%; text-align:center;">fecha</th>
								<th style="width:20%; text-align:center;">Ver reporte</th>
							  </tr>
							</thead>
							<tbody id="secciones">
							  
							</tbody>
						</table>
					
					</form>
					<br>
					
				</div>
			</div>
				 
			</div>
		</div>

	</div><!-- /.container -->

    </body>
</html>