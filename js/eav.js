	
		function buscarPaquetes(){
			
			console.log('entro');
			
			$.ajax({
				url : "php/obtener_paquetes_mtd.php",
				method: "POST",
				dataType : "json",
				data : {miIdentificador : 'R>D'}
								
			}).done(function(entrada){
				
				$('#tablaCuerpo').empty();
				
				var paquetesRecibido = '';
				
				entrada.forEach(function(faltaEncuesta){
					
					paquetesRecibido += '<tr>'+
										'<th>'+faltaEncuesta.tipo+'</th>'+
										'<th>'+faltaEncuesta.status+'</th>'+
										'<th>'+faltaEncuesta.fecha_registro+'</th>'+
										'<th>'+faltaEncuesta.fecha_modificacion+'</th>'+
										'<th>'+faltaEncuesta.paquete+'</th>'+
										'</tr>';
				});

				console.log(entrada);
				
				$('#tablaCuerpo').append(paquetesRecibido);
			}).fail(function(error){
				console.log(error);
			});
		};
		
		function contestaLis(){
			
			console.log('entro');
			
			$.ajax({
				url : "php/Ejemplo.php",
				method: "POST",
				dataType : "json",
												
			}).done(function(entrada){
				

			}).fail(function(error){
				console.log(error);
			});
		};
		
		function regresarResultados(){
			
			console.log('entro');
			
			$.ajax({
				url : "php/ProcesaPaquetesDIAG.php",
				method: "POST",
				dataType : "json",
												
			}).done(function(entrada){
				

			}).fail(function(error){
				console.log(error);
			});
		};
		
		
		
		$(function () {
			
			
			setInterval('buscarPaquetes()',9000);
			setInterval('contestaLis()',3000);
			setInterval('regresarResultados()',3000);
			
			
			
			
			/*$("#mostrarReporte").on("click",mostrar);
			$("#ocultarReporte").on("click",ocultar);
      	    $("#reporte").on("click",reporte);	*/
			 
				
		});