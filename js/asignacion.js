function listar_proyecto(){
	$("#cuadro4").hide("slow");
	$("#cuadro3").hide("slow");
	$("#cuadro2").hide("slow");
	$("#cuadro1").slideDown("slow");

		var table = $("#proyecto").DataTable({

			"destroy":true,
			"ajax":{
			"method":"POST",
			"url":"../php/lista_proyectos.php"
			},
			"columns":[
			{"data":"nombre"},
			{"data":"categoria"},
			{"data":"cnombre"},
			{"data":"finicio"},
			{"data":"ftermino"},
			{"defaultContent":"<button type='button' data-toggle='modal' data-target='#modalDetalles' class='detalle btn btn-warning'><i class='glyphicon glyphicon-list-alt'></i></button>"}
			],

			"language":traduccion,
		});
				proyecto_editar("#proyecto tbody",table);
				proyecto_eliminar("#proyecto tbody",table);
				proyecto_detalles("#proyecto tbody",table);

			}




function proyecto_detalles(tbody,table){

	$(tbody).on("click", "button.detalle", function(){
		var data = table.row($(this).parents("tr")).data();

		var idproyecto = $("#frmDetalles #idproyecto").val(data.idproyecto),
			nombre = $("#frmDetalles #nombre").val(data.nombre),
			empresa = $("#frmDetalles #empresa").val(data.empresa),

			cnombre = $("#frmDetalles #cnombre").val(data.cnombre),
			capellido = $("#frmDetalles #capellido").val(data.capellido),

			ccorreo = $("#frmDetalles #ccorreo").val(data.ccorreo),
			categoria = $("#frmDetalles #categoria").val(data.categoria),
			cat_descrip = $("#frmDetalles #cat_descrip").val(data.cat_descrip),			
			mnombre = $("#frmDetalles #mnombre").val(data.mnombre),
			mapellido = $("#frmDetalles #mapellido").val(data.mapellido),			
			mcorreo = $("#frmDetalles #mcorreo").val(data.mcorreo),
			finicio = $("#frmDetalles #finicio").val(data.finicio),
			ftermino = $("#frmDetalles #ftermino").val(data.ftermino),
			descripcion = $("#frmDetalles #descripcion").val(data.descripcion);


		console.log(idproyecto);

		//$("#datos").val(idproyecto);


		$("#cuadro1").hide("slow");
		$("#cuadro4").slideDown("slow");

	});
}


function ProyectoRegistrar(){
	limpiar_datos();
	$("#cuadro1").hide("slow");
	$("#cuadro2").slideDown("slow");
}

function registrar(){

	var nombre = document.getElementById('nombre').value;
	var id_cli = document.getElementById('id_cli').value;
	var id_cat = document.getElementById('id_cat').value;
	var id_man = document.getElementById('id_man').value;
	var fecha_inicio = document.getElementById('fecha_inicio').value;
	var fecha_termino = document.getElementById('fecha_termino').value;
	var descripcion = document.getElementById('descripcion').value;

if(nombre == '' || id_cli == '0' || id_cat == '0' || id_man == '0' || fecha_inicio == '' || fecha_termino == '' || descripcion == '' ){

		$('#vacio').slideDown('slow');
		setTimeout(function(){
			$('#vacio').slideUp('slow');
		},2000);	

		return;
}else{

	    var nombre = $('#nombre').val();
		var id_cli = $('#id_cli').val();
		var id_cat = $('#id_cat').val();
		var id_man = $('#id_man').val();
		var fecha_inicio = $('#fecha_inicio').val();
		var fecha_termino = $('#fecha_termino').val();
		var descripcion = $('#descripcion').val();

		$.ajax({
			url:'php/proyecto.php',
			type:'POST',
			data: 'nombre='+nombre+'&id_cli='+id_cli+'&id_cat='+id_cat+'&id_man='+id_man+'&fecha_inicio='+fecha_inicio+'&fecha_termino='+fecha_termino+'&descripcion='+descripcion+'&opcion=registrar'
		
		}).done(function(respuesta){
		console.log(respuesta);
			if(respuesta==0){
				$('#exito').slideDown('slow');
					setTimeout(function(){
						$('#exito').slideUp('slow');
					},2000);
			}else if(respuesta==1){
				$('#error').slideDown('slow');
					setTimeout(function(){
						$('#error').slideUp('slow');
					},2000);
			}


		});
	}

}

function proyecto_editar(tbody, table){

	$(tbody).on("click", "button.editar", function(){
		var data = table.row($(this).parents("tr")).data();
		//console.log(data);
		var idproyecto = $("#frmEditar #idproyecto").val(data.idproyecto),
			    nombre = $("#frmEditar #nombre").val(data.nombre),
			    id_cli = $("#frmEditar #id_cli").val(data.id_cli),
			    id_cat = $("#frmEditar #id_cat").val(data.id_cat),
			    id_man = $("#frmEditar #id_man").val(data.id_man),
			   finicio = $("#frmEditar #finicio").val(data.finicio),
			   ftermino = $("#frmEditar #ftermino").val(data.ftermino),
		   descripcion = $("#frmEditar #descripcion").val(data.descripcion),
			    opcion = $("#frmEditar #opcion").val("modificar");

		$("#cuadro3").slideDown("slow");
		$("#cuadro1").hide();

	});
}

function modificar(){
  var frm=$("#frmEditar").serialize();
    console.log(frm);
    $.ajax({
        url:"php/proyecto.php",
        type:'POST',
        data:frm+"&opcion=modificar"
    }).done(function(respuesta){
    	console.log(respuesta);
        if(respuesta==0)
        {         
				$('#echo').slideDown('slow');
				setTimeout(function(){
				$('#echo').slideUp('slow');
				},2000);

        }else if(respuesta==1){
       
				$('#avacio').slideDown('slow');
				setTimeout(function(){
				$('#avacio').slideUp('slow');
				},2000);            
       
        }else if(respuesta==2){

        		$('#falla').slideDown('slow');
        			setTimeout(function(){
        				$('#falla').slideUp('slow');
        			},2000);
        	}
    });
//});

	}

function proyecto_eliminar(tbody,table){

	$(tbody).on("click","button.eliminar", function(){
	
		var data = table.row($(this).parents("tr")).data();
		console.log(data);

	var idproyecto = $("#ProyectoEliminar #idproyecto").val(data.idproyecto);	

	});
}

function eliminar_proyecto(){

	$("#eliminar-proyecto").on("click", function(){
		var idproyecto = $("#ProyectoEliminar #idproyecto").val(),
				opcion = $("#ProyectoEliminar #opcion").val();

		$.ajax({
			method: "POST",
			url: "php/proyecto.php",
			data: {"idproyecto":idproyecto,"opcion":opcion}
		}).done(function(respuesta){
			//console.log(respuesta);
			var json_respuesta = JSON.parse(respuesta);
			
			mostrar_mensaje(json_respuesta);
			limpiar_datos();
			listar_proyecto();

		});
	});
}

var limpiar_datos = function(){
$("#opcion").val("registrar");
$("#idproyecto").val("");
$("#nombre").val("").focus();
$("#id_cli").val("");
$("#id_cat").val("");
$("#id_man").val("");
$("#fecha_inicio").val("");
$("#fecha_termino").val("");
$("#finicio").val("");
$("#ftermino").val("");
$("#descripcion").val("");
}


var mostrar_mensaje = function( informacion ){
var texto = "", color = "";
if( informacion.respuesta == "BIEN" ){
texto = "Se han guardado los cambios correctamente.";
color = "#379911";
}else if( informacion.respuesta == "ERROR"){
texto = "<strong>Error</strong>, no se ejecutó la consulta.";
color = "#C9302C";
}
$(".mensaje").html( texto ).css({"color": color });
$('.mensaje').fadeIn('slow');
setTimeout(function(){
$(this).html("");
$('.mensaje').fadeOut('slow');
},2000);

}

var traduccion = {
    "sProcessing":     "Procesando...",
    "sLengthMenu":     "Mostrar _MENU_ registros",
    "sZeroRecords":    "No se encontraron resultados",
    "sEmptyTable":     "Ningún dato disponible en esta tabla",
    "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
    "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
    "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
    "sInfoPostFix":    "",
    "sSearch":         "Buscar:",
    "sUrl":            "",
    "sInfoThousands":  ",",
    "sLoadingRecords": "Cargando...",
    "oPaginate": {
        "sFirst":    "Primero",
        "sLast":     "Último",
        "sNext":     "Siguiente",
        "sPrevious": "Anterior"
    },
    "oAria": {
        "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
    }
}
