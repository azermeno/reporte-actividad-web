function getQueryVariable(variable) {
	alert("Entro");
   var query = window.location.search.substring(1);
   var vars = atob(query).split("&");
   console.log(vars);
   for (var i=0; i < vars.length; i++) {
	   vars[i] = vars[i].replace(/=/, "|");
	   var pair = vars[i].split("|",2);
	   if(pair[0] == variable) {
		   return pair[1];
	   }
   }
   return false;
}	

function obtener_catalogo_hora(){

	$.ajax({
	  method: "POST",
	  url: "php/obtener_catalogo_hora.php",
	  dataType: "json"
	}).done(function(data){
		var thead ='<tr>';
		var tbody ='<tr>';
		//console.log(data);
		data.actividades.forEach(function(entry){
		 
			thead += '<th>'+entry.nombre_actividad+'<th>';
			
			tbody += '<td><input type="text" class="form-control" id="'+entry.nombre_actividad+'" name="'+entry.pk_catalogo_act+'"><td>';
		 					
	   });
	   $("#1")
	   thead +='</tr>'
	   tbody +='</tr>'
			 
	   $("#titulo").html(thead);
	   $("#cuerpo").html(tbody);
									
		}).fail(function(error){
		  
			alert("Por el momento no esta disponible el servicio, intente m\u00E1s tarde");
			  
		});
}
function regresar(){
	console.log("Entro");
	// window.history.back();
	window.location.replace("visor_general_reporte.php");
		
}

$(function(){
	
	obtener_catalogo_hora();
     var referencia = getQueryVariable("referencia");
	 console.log(referencia);
	
	$("#cancelar").on('click',regresar);
	
	$("#formulario").submit(function(event){
	
	event.preventDefault();
	var serializado = $(this).serialize();
	console.log(serializado);
	$.ajax({
	  url:"php/guardar_reporte.php",
	  method: "POST",
	  dataType: "json",
	  data:serializado
		
	}).done(function(dato){
		
		alert("Reporte guardado correctamente");
		window.location.replace("visor_general_reporte.php");
		
	}).fail(function(error){
		
		console.log(error);
				
	});
		
})
	
});