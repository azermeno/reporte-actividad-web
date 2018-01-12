function llena_mes(){

	$.ajax({
	  method: "POST",
	  url: "php/obtener_unidades_activas_mtd.php",
	  dataType: "json"
	}).done(function(data){
		
			var unidadesMes ='';
			var secciones ='';
			data.unidadesWs.forEach(function(entry){
			  
			  unidadesMes += '<option value="'+entry.req_codigo+'">'+entry.txtNombre+'</option>';
				
		     });
			 
			$("#unidad").append(unidadesMes);
			$("#unidad").selectpicker('refresh');
			 llenarTabla(data.secciones);
									
		}).fail(function(error){
		  
				alert("Por el momento no esta disponible el servicio, intente m\u00E1s tarde");
			  
			});
}
function llena_usuario(){
	
	$.ajax({
	  method: "POST",
	  url: "php/obtener_usuario.php",
	  dataType: "json"
	}).done(function(data){
		console.log(data);
		
			
			$("#nombre_usuario").text(data.nombre)
			
			if(data.tipo == 1){
				
				$("#usuario").show();
			}
		
		     // var unidadesMes ='';
		     // var secciones ='';
		     // data.unidadesWs.forEach(function(entry){
			  
				// unidadesMes += '<option value="'+entry.req_codigo+'">'+entry.txtNombre+'</option>';
				
		     // });
			 
			// $("#unidad").append(unidadesMes);
			// $("#unidad").selectpicker('refresh');
			 // llenarTabla(data.secciones);
									
		}).fail(function(error){
		  
				alert("Por el momento no esta disponible el servicio, intente m\u00E1s tarde");
		  
			});
}

$(function(){
	
    
	llena_usuario();
	
			
		
	
});