function listar_tareas(){

    $("#agrmast").hide("slow");
	$("#agrtar").hide("slow");
	$("#editar").hide("slow");
	$("#cuadro1").slideDown("slow");

		var table = $("#tareas").DataTable({

			"destroy":true,
			"ajax":{
			"method":"POST",
			"url":"../php/avances.php"

                
			},
			"columns":[
            {"data":"actividad"},
            {"data":"prioridad"},
            {"data":"tareas"},
            {"data":"resul_x_tarea"},
            {"data":"realizado"},
            {"data":"total"},
            {"defaultContent":"<button type='button' data-toggle='modal' data-target='#modalEditar' style='color:blue;' class='editar btn btn-default'><i>Prioridad</i></button> <button type='button' data-toggle='modal' data-target='#modalFin' style='color:blue;' class='fin btn btn-default'><i>Finalizar</i></button>"}
			],

			"language":traduccion,
		});
                tareas_editar("#tareas tbody",table);
                tareas_finalizar("#tareas tbody",table);
			}



function tareas_editar(tbody, table){

    $(tbody).on("click", "button.editar", function(){
        var data = table.row($(this).parents("tr")).data();
        id_avances = $("#frmEditar #id_avances").val(data.id_avances),
        actividad = $("#frmEditar #actividad").val(data.actividad),
        prioridad = $("#frmEditar #prioridad").val(data.prioridad),
        tareas = $("#frmEditar #tare").val(data.tareas),
        resul_x_tarea = $("#frmEditar #resul_x_tarea").val(data.resul_x_tarea),
        realizado = $("#frmEditar #realizado").val(data.realizado),
        total = $("#frmEditar #total").val(data.total),
        opcion = $("#frmEditar #opcion").val("modificar");



    $("#cuadro1").hide("slow");
    $("#agrtar").slideDown("slow");

    });
}

function modificar(){
  var frm=$("#frmEditar").serialize();
    console.log(frm);
    $.ajax({
        url:"../php/avance.php",
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
    }

function tareas_finalizar(tbody, table){

    $(tbody).on("click", "button.fin", function(){
        var data = table.row($(this).parents("tr")).data();
        id_avances = $("#frmFin #id_avances").val(data.id_avances),
        actividad = $("#frmFin #actividad").val(data.actividad),
       // prioridad = $("#frmFin #prioridad").val(data.prioridad),
       // tareas = $("#frmFin #tare").val(data.tareas),
      //  resul_x_tarea = $("#frmFin #resul_x_tarea").val(data.resul_x_tarea),
      //  realizado = $("#frmFin #realizado").val(data.realizado),
        total = $("#frmFin #total").val(data.total),
        opcion = $("#frmFin #opcion").val("editar");

    $("#cuadro1").hide("slow");
    $("#editar").slideDown("slow");

    });
}

function edita(){
  var frmf=$("#frmFin").serialize();
    console.log(frmf);
    $.ajax({
        url:"../php/avance.php",
       type:'POST',
        data:frmf+"&opcion=editar"
    }).done(function(respuesta){
        console.log(respuesta);
        if(respuesta==0)
        {         
                $('#echos').slideDown('slow');
                setTimeout(function(){
                $('#echos').slideUp('slow');
                },2000);

        }else if(respuesta==1){
       
                $('#avacios').slideDown('slow');
                setTimeout(function(){
                $('#avacios').slideUp('slow');
                },2000);            
       
        }else if(respuesta==2){

                $('#fallas').slideDown('slow');
                    setTimeout(function(){
                        $('#fallas').slideUp('slow');
                    },2000);
            }
    });
    }


var limpiar_datos = function(){
$("#id_avances").val("");
$("#actividad").val("");
$("#prioridad").val("");
$("#tare").val("");
$("#resul_x_tarea").val("");
$("#realizado").val("");
$("#total").val("");
$("#opcion").val("");
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



/*$query ="SELECT *,  
    proyecto.nombre as proyecto,
    DATE_FORMAT(proyecto.fecha_inicio, '%d/%m/%Y') as finicio,
    DATE_FORMAT(proyecto.fecha_termino, '%d/%m/%Y') as ftermino 
    FROM proyecto
    INNER JOIN actividades
    ON
    id_pro = idproyecto ORDER BY idproyecto";


SELECT id_pro,count(*) as grupo FROM actividades GROUP BY id_pro ORDER BY grupo ASC

SELECT id_pro,nombre,descripcion, count(*) as grupo FROM actividades GROUP BY id_pro ORDER BY grupo ASC


SELECT proyecto.nombre,proyecto.fecha_inicio,proyecto.fecha_termino,proyecto.descripcion, count(*) as grupo FROM proyecto 
inner join actividades
on idproyecto = id_pro
GROUP BY id_pro ORDER BY grupo ASC*/