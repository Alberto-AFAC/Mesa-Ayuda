function listar_proyecto(){
	$("#cuadro6").hide("slow");
	$("#cuadro5").hide("slow");
	$("#cuadro4").hide("slow");
	$("#cuadro3").hide("slow");
	$("#cuadro2").hide("slow");
	$("#cuadro1").slideDown("slow");

		var table = $("#proyecto").DataTable({

			"destroy":true,
			"ajax":{
			"method":"POST",
			"url":"../php/listar_proyectos.php"
			},
			"columns":[
			{"data":"nombre"},
			{"data":"categoria"},
			{"data":"mnombre"},
			{"data":"finicio"},
			{"data":"ftermino"},
			{"defaultContent":"<button type='button' data-toggle='modal' data-target='#modalDetalles' class='detalle btn btn-warning'><i class='glyphicon glyphicon-list-alt'></i></button> <button type='button' data-toggle='modal' data-target='#modalActivi' class='actividad btn btn-warning'><i class='glyphicon glyphicon-font' ></i></button>"},		
			],
			"language":traduccion,
		});
				proyecto_editar("#proyecto tbody",table);
				proyecto_eliminar("#proyecto tbody",table);
				proyecto_detalles("#proyecto tbody",table);
				proyecto_actividades("#proyecto tbody", table);

			}






function proyecto_actividades(tbody,table){
	$(tbody).on("click", "button.actividad",function(){
		var data = table.row($(this).parents("tr")).data();

       var id_area = $("#frmActivi #id__area").val(data.id_area);
       		 nombre = $("#frmActivi #nombre").val(data.nombre);
       		 empresa = $("#frmActivi #empresa").val(data.empresa);
			finicio = $("#frmActivi #finicio").val(data.finicio);
			ftermino = $("#frmActivi #ftermino").val(data.ftermino);

            var id = JSON.parse(data.idproyecto);
            console.log(id);
                    
$.ajax({
        url:'../php/actividad_listar.php',
        type: 'POST'

    }).done(function(resp){  

obj = JSON.parse(resp);
var res = obj.data;  

x = 0;
html="<table style='width:97%; margin:0 auto;'><tr><th style='width:4%;'>N°</th><th style='width:25%;'>Actividad</th><th style='width:34%;'>Descripcion</th><th style='width:15%;'>Inicia</th><th style='width:15%;'>Finaliza</th><th style='width:4%;'></th></tr>";
for(i=0; i<res.length; i++){
var idpro = obj.data[i].id_pro;

if(id==idpro){

		x++;
		html+="<td>"+x+"</td><td>"+obj.data[i].nombre+"</td><td><textarea style='width:90%; border:1px solid transparent;'>"+obj.data[i].descripcion+"</textarea></td><td>"+obj.data[i].finicio+"</td><td>"+obj.data[i].ftermino+"</td><td>"+"<button type='button' id='boton' onclick='tarea("+'"'+obj.data[i].id_activ+'"'+")' class='tarea btn btn-default' data-target='#modalTarea'><i class='glyphicon glyphicon-text-width'></i></button>"+"</td><tr>";        
        }
            } 
            html+="</table>"
    $("#demo").html(html);   


    });


		$("#cuadro1").hide("slow");
		$("#cuadro5").slideDown("slow");
		$("#demo").slideDown("slow");

	});
}

function tarea(id_activ){

        var id = id_activ;
        var id_activ = $("#frmTarea #id_activ").val(id);
      
  $.ajax({
        url:'../php/tarea_listar.php',
        type: 'POST'

    }).done(function(resp){  

obj = JSON.parse(resp);

var res = obj.data;  
var x = 0;
//console.log(res[0].id_act);
    html="<table style='width:97%; margin:0 auto;'><tr><th style='width:4%;'>N°</th><th style='width:25%;'>Tarea</th><th style='width:38%;'>Descripcion</th><th style='width:15%;'>Inicia tarea</th><th style='width:15%;'>Finaliza tarea</th></tr>";
    for(i=0;i<res.length;i++){
    var tarea = obj.data[i].id_act;
    //console.log(tarea);
    if(id==tarea){
        x++;  
        html+="<td>"+x+"</td><td>"+obj.data[i].nombre+"</td><td><textarea style='width:90%; border:1px solid transparent;'>"+obj.data[i].descripcion+"</textarea></td><td>"+obj.data[i].finicio+"</td><td>"+obj.data[i].ftermino+"</td><tr>";        
        }
    }
    html+="</table>"
    $("#tarea").html(html);
//obj = JSON.parse(resp);
//alert(json_nfo);
    });

//     $("#demo").hide("slow");
     $("#cuadro6").slideDown("slow");
     $("#tarea").slideDown("slow");
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
