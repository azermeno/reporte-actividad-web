$(function(){
	
	$("#formulario").submit(function(event){
			
			event.preventDefault();
			var serializada = $(this).serialize();
			
			$.ajax({
				url: "php/update_prioridad_mtd.php",
				method : "POST",
				dataType : "json",
				data : serializada
				
			}).done(function(respuesta){
				
				 llenarTabla(respuesta.secciones);
			}).fail(function(){
				
				alert("Funcionalidad no desponible por el momento, intente m\u00E1s tarde");
				
			});
		});
	
	
	
	
	
});