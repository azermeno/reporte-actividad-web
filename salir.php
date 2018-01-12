<?php
session_start();
unset($_SESSION['tipo']);
unset($_SESSION['usuario']);
session_destroy();
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
  <script src="js/acreditar_usuario.js"></script>
</head>
<body>

	<div class="container">
		<br><br>
		<div class="starter-template">

			<div style="text-align:center">
				
				<h4><laberl>Gracias por usar el sistema</laberl></h4>
				<br>
				<br>
				<br>
				<br>
				<h5><a href="index.html" id="azul">Volver a entrar</a></h5>
				
			</div>
			

		</div>

	</div><!-- /.container -->

</body>
</html>