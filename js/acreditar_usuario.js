$(function(){
	
	$("#formulario").submit(function(event){
			
		event.preventDefault();
		var usuario = $("#usuario").val();
		var contrasena = $("#contrasena").val(); 
		if(usuario == ''){
			
			alert("El campo usuario no debe estar vac\u00EDo");
			$("#usuario").focus();
		} else if(contrasena == ''){
			
			alert("El campo contrase\u00F1a no debe estar vac\u00EDo");
			$("#contrasena").focus();
			
		} else {
							
			var serializada = $(this).serialize();
			console.log(serializada)
			$.ajax({
				url: "php/autenticacion_usuario.php",
				method : "POST",
				dataType : "json",
				data : serializada
				
			}).done(function(respuesta){
				
				 console.log(respuesta);
			}).fail(function(){
				
				alert("Funcionalidad no desponible por el momento, intente m\u00E1s tarde");
				
			});
			
		}
	});
});