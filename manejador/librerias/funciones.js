function agregardatos(id_climan,comentar,id_usu){

var id_usu=document.getElementById('id_usu').value;
	
	if(id_usu == '0'){


		alertify.warning("Es necesario seleccionar usuario");	
}else{
	cadena="id_climan=" + id_climan + 
			"&comentar=" + comentar +
			"&id_usu=" + id_usu +
			"&nombre=" + nombre +
			"&opcion=" +opcion;

			console.log(cadena);

	$.ajax({
		type:"POST",
		url:"agrcoment.php",
		data:cadena,
		success:function(r){
			if(r==1){
				$('#tabla').load('tablacom.php');
				alertify.success("agregado con exito");

			}else{
				alertify.error("Fallo el servidor");
			}
		}
	});

}
}

function agregaform(datos){

	d=datos.split('||');

	$('#idpersona').val(d[0]);
	$('#comentaru').val(d[2]);
	$('#nombreu').val(d[3]);	
}


var limpiar_datos = function(){
$("#idpersona").val("");
$("#nombreu").val("");
$("#comentaru").val("").focus();

}

function actualizaDatos(){


	id=$('#idpersona').val();
	nombre=$('#nombreu').val();
	comentar=$('#comentaru').val();

	cadena= "id=" + id +
			"&nombre=" + nombre + 
			"&comentar=" + comentar + 
			"&opcion=" + 'editar';
	$.ajax({
		type:"POST",
		url:"agrcoment.php",
		data:cadena,
		success:function(r){
			
			if(r==1){
				$('#tabla').load('tablacom.php');
				alertify.success("Editado con exito");
			}else{
				alertify.error("Fallo el servidor");
			}
		}
	});

		limpiar_datos();

}
function leerdato(){

id_usu=$('#id_leer').val();

console.log(id_usu);

cadena = "id_usu=" + id_usu +
		"&opcion=" + 'actualiza';

$.ajax({
		type:"POST",
		url:"agrcoment.php",
		data:cadena,
		success:function(r){
			
			if(r==1){
				$('#tabla').load('tablacom.php');
     			$('#comntr').load('../php/comentr.php');
				alertify.success("comentarios leidos");
			}else{
				alertify.error("Fallo el servidor");
			}
		}
	});


}
function preguntarSiNo(id){
	alertify.confirm('Eliminar', '¿Esta seguro de eliminar este comentario?', 
					function(){ eliminarDatos(id) }
                , function(){ alertify.error('Se cancelo')});


	 $("#modalEdicion").slideUp("slow");
}

function eliminarDatos(id){

	cadena="id=" + id +
			"&opcion=" + 'eliminar';
		$.ajax({
			type:"POST",
			url:"agrcoment.php",
			data:cadena,
			success:function(r){
				if(r==1){
					$('#tabla').load('tablacom.php');
					alertify.success("Eliminado con exito");
				}else{
					alertify.error("Fallo el servidor.");
				}
			}
		});
}