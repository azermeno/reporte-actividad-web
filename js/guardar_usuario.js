function valida_formulario(){
	
	var usuario = $("#usuario").val();
	var contrasena = $("#contrasena").val();
	var nombre = $("#nombre").val();
	var a_paterno = $("#a_paterno").val();
	var correo = $("#correo").val();
	var correcto = true;
	
	if(usuario == ''){
		alert("El campo usuario no debe estar vac\u00EDo");
		$("#usuario").focus();
		correcto = false;
	} else if(contrasena == ''){
		alert("El campo contrase\u00F1a no debe estar vac\u00EDo");
		$("#contrasena").focus();		
		correcto = false;
	} else if(nombre == ''){
		alert("El campo nombre no debe estar vac\u00EDo");
		$("#nombre").focus();
		correcto = false;
	} else if(a_paterno == ''){
		alert("El campo apellido paterno no debe estar vac\u00EDo");
		$("#a_paterno").focus();		
		correcto = false;
	}else if(correo == ''){
		alert("El campo correo electr\u00F3nico no debe estar vac\u00EDo");
		$("#correo").focus();		
		correcto = false;
	}
		return correcto;
}

function contrasenas_iguales(){
	var contrasena = $("#contrasena").val();
	var contrasena2 = $("#contrasena2").val();
	if( contrasena == contrasena2 && contrasena != '' ){
		
		$("#contrasenas_iguales").css('color','blue')
		
	} else {
		
		$("#contrasenas_iguales").css('color','red')
		
	}
	
}

$(function(){
	
    $(".iguales").on('keyup', contrasenas_iguales);
	
	$("#formulario").submit(function(event){
			
		event.preventDefault();
		if(valida_formulario()){
			var usuario = $("#usuario").val();
			var contrasena = $("#contrasena").val(); 
			var serializada = $(this).serialize();
			console.log(serializada)
			$.ajax({
				url: "php/guardar_usuario.php",
				method : "POST",
				dataType : "json",
				data : serializada
				
			}).done(function(respuesta){
				
				 console.log(respuesta);
				 if(respuesta.registrado == true){
					 
					window.location.replace("visor_general_reporte.php");
					
				 } else {
					 
					 alert("Funcionalidad no disponible por el momento, intente m\u00E1s tarde");
				 }
				 
			}).fail(function(){
				
				alert("Funcionalidad no desponible por el momento, intente m\u00E1s tarde");
				
			});
			
		}
	});
});