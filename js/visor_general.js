function llena_mes(){

	$.ajax({
	  method: "POST",
	  url: "php/obtener_mes.php",
	  dataType: "json",
	  data: {usuario:$("#usuario_select").val()}
	}).done(function(data){
		
		llena_select('mes_select',data.fecha);
											
		}).fail(function(error){
		  
				alert("Por el momento no esta disponible el servicio, intente m\u00E1s tarde");
			  
			});
}

function obtener_actividad(){
	
	$.ajax({
	  method: "POST",
	  url: "php/obtener_actividad.php",
	  dataType: "json",
	  data: {usuario:$("#usuario_select").val(),tiempo:$("#mes_select").val()}
	}).done(function(data){
		
		llenar_tabla(data.actividad);
		
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
			
			$("#nombre_usuario").text(data.nombre)
			
		      llena_select('usuario_select',data.usuario);
			if(data.tipo == 1){
				
				$("#usuario").show();
				
			} else {
				
				$("#usuario_select").val(data.usuario[0].identificador);
				$("#usuario_select").selectpicker('refresh');
				llena_mes();
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

function cambio_usuario(){
	
	llena_mes();
	//alert($(this).val());
		
}

function cambio_mes(){
	
	obtener_actividad();
	//alert($(this).val());
		
}

function llena_select(id_select,arreglo_informacion){
	
	var opciones = '';
	var ultimo_mes = '';
	
	arreglo_informacion.forEach(function(fila){
		
		opciones += ' <option value="'+fila.identificador+'">'+fila.nombre+'</option>';
		ultimo_mes = fila.nombre;
	});
	
	console.log(opciones);
	$("#"+id_select).empty();
	$("#"+id_select).selectpicker('refresh');
	$("#"+id_select).append(opciones);
	$("#"+id_select).selectpicker('refresh');
	if(id_select == 'mes_select'){
		
		$("#mes_select").val(ultimo_mes);
		$("#mes_select").selectpicker('refresh');
		obtener_actividad();
	}
	
}

function llenar_tabla(reporte){
	var fila = "";
	 $("#reporte").empty();
	console.log(reporte);
	var referencia = '';
	 reporte.forEach(function(entry){
		 
			referencia = btoa("referencia="+entry.pk_actividad);
		 
			// fila += '<tr class="active"><td><b>'+entry.descripcion_avance+'</b></td><td><b>'+entry.registro+'</b></td><td><b>'+entry.editado+'</b></td><td><button id="ver'+entry.pk_actividad+'" type="button" class="btn btn-info actualizar" data-codigo="'+entry.pk_actividad+'" data-accion="1" style="width:45%;text-align:center; color: black"><span class="glyphicon glyphicon-share" aria-hidden="true"></span></button></td></tr>';
			fila += '<tr class="active"><td><b>'+entry.descripcion_avance+'</b></td><td><b>'+entry.registro+'</b></td><td><b>'+entry.editado+'</b></td><td><a class="btn btn-primary" href="reporte_actividad_editar.php?'+referencia+'" role="button"><span class="glyphicon glyphicon-share" aria-hidden="true"></span></a></td></tr>';
		 					
	  });
					 
	$("#reporte").append(fila);
				
	};
	
function nuevo_reporte(){
	
	window.location.replace("reporte_actividad.php");
}

$(function(){
	
    
	llena_usuario();
	
	$("#usuario_select").on('change',cambio_usuario);		
	$("#mes_select").on('change',cambio_mes);		
	$("#nuevo").on('click',nuevo_reporte);		
	
});