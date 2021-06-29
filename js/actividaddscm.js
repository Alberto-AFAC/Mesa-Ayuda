function listar_actividades(){

    $("#agrmas").hide("slow");
	$("#agract").hide("slow");
	$("#ediact").hide("slow");
	$("#detact").hide("slow");
	$("#cuadro1").slideDown("slow");

		var table = $("#actividad").DataTable({

			"destroy":true,
			"ajax":{
			"method":"POST",
			"url":"../php/contadorc.php"                
			},
			"columns":[
            {"data":"idproyecto"},
			{"data":"proyecto"},
            {"data":"finicio"},
            {"data":"ftermino"},
            {"data":"actividds"},
            {"defaultContent":"<button type='button' data-toggle='modal' data-target='#modalDetalles' class='detalle btn btn-warning'><i class='glyphicon glyphicon-list-alt'></i></button> "}
			],

			"language":traduccion,
		});
                actividades_agregar("#actividad tbody",table);
				actividad_detalles("#actividad tbody",table);

			}

function detalle(){
    $("#ediact").hide("slow");
    $("#detact").slideDown("slow");
    $("#demo").slideDown("slow");

}

function actividades_agregar(tbody,table){
    $(tbody).on("click", "button.agrmas", function(){
       var data = table.row($(this).parents("tr")).data();
       var idproyecto = $("#frmMasAct #id_proyecto").val(data.idproyecto);
       var ftermino = $("#frmMasAct #ftermino_").val(data.ftermino);
       var ftermino = $("#frmMasAct #fter").val(data.ftermino);

            var id = JSON.parse(data.idproyecto);
                    
$.ajax({
        url:'../php/actividad_listar.php',
        type: 'POST'

    }).done(function(resp){  

obj = JSON.parse(resp);
var res = obj.data;  

for(i=0; i<res.length; i++){

var idpro = obj.data[i].id_pro;

if(id==idpro){

    var idac = obj.data[i].id_activ;
    var finicio_ = obj.data[i].ftermino;
    var fini = obj.data[i].ftermino;

    var idac = $("#frmMasAct #id_activ").val(idac);
    var finicio_ = $("#frmMasAct #finicio_").val(finicio_);
    var fini = $("#frmMasAct #fini").val(fini);   
        }
            } 
    });

       limpiar_datos();
      $("#cuadro1").hide("slow");
        $("#agrmas").slideDown("slow");
    });
}

  
    function actividad_detalles(tbody,table){

    $(tbody).on("click", "button.detalle", function(){
        var data = table.row($(this).parents("tr")).data();   

    var idproyecto = $("#frmDetalles #idproyecto").val(data.idproyecto),
        proyecto = $("#frmDetalles #proyecto").val(data.proyecto),
        empresa = $("#frmDetalles #empresa").val(data.empresa),
        finicio = $("#frmDetalles #finicio").val(data.finicio),
        ftermino = $("#frmDetalles #ftermino").val(data.ftermino),
        ftermino = $("#EditarActividad #ffinal").val(data.ftermino),
        actividds = $("#frmDetalles #actividds").val(data.actividds);
     
            var id = JSON.parse(data.idproyecto);
                         
  $.ajax({
        url:'../php/actividad_listar.php',
        type: 'POST'

    }).done(function(resp){  

obj = JSON.parse(resp);
var res = obj.data;  
var x = 0;
////console.log(res[1].nombre);
    html="<table style='width:97%; margin:0 auto;'><tr><th style='width:4%;'>N°</th><th style='width:25%;'>Actividad</th><th style='width:38%;'>Descripcion</th><th style='width:15%;'>Inicia actividad</th><th style='width:15%;'>Finaliza actividad</th></tr>";
    for(i=0;i<res.length;i++){
    var proyecto = obj.data[i].id_pro;
    if(id==proyecto){
        x++;  
        html+="<td>"+x+"</td><td>"+obj.data[i].nombre+"</td><td><textarea style='width:90%; border:1px solid transparent;'>"+obj.data[i].descripcion+"</textarea></td><td>"+obj.data[i].finicio+"</td><td>"+obj.data[i].ftermino+"</td><td>"+"</td><tr>";        
        }
    }
    html+="</table>"
    $("#demo").html(html);
//obj = JSON.parse(resp);
//alert(json_nfo);
    });            
        $("#cuadro1").hide("slow");
        $("#detact").slideDown("slow");
        $("#demo").slideDown("slow");
    });

    limpiar_datos();
}



function listar_tareas(){

    $("#agrmast").hide("slow");
    $("#agrtar").hide("slow");
    $("#editar").hide("slow");
    $("#dettar").hide("slow");
    $("#cuadro1").slideDown("slow");

        var table = $("#tareas").DataTable({

            "destroy":true,
            "ajax":{
            "method":"POST",
            "url":"../php/consultar_tareac.php"                
            },
            "columns":[
            {"data":"id_pro"},
            {"data":"actividad"},
            {"data":"finicio"},
            {"data":"ftermino"},
            {"data":"tareas"},
            {"defaultContent":"<button type='button' data-toggle='modal' data-target='#modalDetalles' class='detalle btn btn-warning'><i class='glyphicon glyphicon-list-alt'></i>"}
            ],

            "language":traduccion,
        });
                tareas_agregar("#tareas tbody",table);
                tareas_detalles("#tareas tbody",table);
    }    





function detalle(){
    $("#editar").hide("slow");
    $("#dettar").slideDown("slow");
    $("#demo").slideDown("slow");

}
function AgregarTarea(){
    limpiar_datos();
    $("#cuadro1").hide("slow");
    $("#agrtar").slideDown("slow");
}

function tareas_agregar(tbody,table){
    $(tbody).on("click", "button.agrmast", function(){
       var data = table.row($(this).parents("tr")).data();
       var id_activ = $("#frmMasAct #id_actividad").val(data.id_activ);
       var ftermino = $("#frmMasAct #ftermino_").val(data.ftermino);
       var ftermino = $("#frmMasAct #fter").val(data.ftermino);

            var id = JSON.parse(data.id_activ);
                    
$.ajax({
        url:'../php/tarea_listar.php',
        type: 'POST'

    }).done(function(resp){  

obj = JSON.parse(resp);
var res = obj.data;  

for(i=0; i<res.length; i++){

var idact = obj.data[i].id_act;

if(id==idact){

    var idtarea = obj.data[i].id_tareas;
    var finicio_ = obj.data[i].ftermino;
    var fini = obj.data[i].ftermino;

    var idtarea = $("#frmMasAct #id_tareas").val(idtarea);
    var finicio_ = $("#frmMasAct #finicio_").val(finicio_);
    var fini = $("#frmMasAct #fini").val(fini);   
        }
            } 
    });

       limpiar_datos();
      $("#cuadro1").hide("slow");
        $("#agrmast").slideDown("slow");
    });
}

function agregar_mas_tarea(){

        var id_activ = document.getElementById('id_actividad').value;    
        var nombre = document.getElementById('nombre_').value;
        var fecha_inicio = document.getElementById('finicio_').value;
        var fter = document.getElementById('fter').value;
        var fecha_termino = document.getElementById('ftermino_').value;
        var descripcion = document.getElementById('descripcion_').value;

       
            ////console.log(fecha_inicio);
            ////console.log(fini);
            //console.log(fecha_termino);
            //console.log(fter);

            f_id = fecha_inicio.substr(0,2);
            f_im = fecha_inicio.substr(3,2);   
            f_ia = fecha_inicio.substr(6,4);

            f_td = fecha_termino.substr(0,2);
            f_tm = fecha_termino.substr(3,2);
            f_ta = fecha_termino.substr(6,4);

            f_trd = fter.substr(0,2);
            f_trm = fter.substr(3,2);
            f_tra = fter.substr(6,4);

        var f1 = new Date(f_ta, f_tm, f_td);
        var f2 = new Date(f_tra, f_trm, f_trd);
        var f3 = new Date(f_ia, f_im, f_id);
            
        if(f1 <= f2){
    if(id_activ == '' || nombre == '' || fecha_inicio == '' || fecha_termino == '' || descripcion == ''){

                    $('#vacio').slideDown('slow');
                    setTimeout(function(){
                        $('#vacio').slideUp('slow');
                    },2000);
                            return;
        }else{
            var id_activ = $('#id_actividad').val();
            var nombre = $('#nombre_').val();
            var finicio = $('#finicio_').val();
            var ftermino = $('#ftermino_').val();
            var descripcion = $('#descripcion_').val(); 

            if(f3 <= f1){

            $.ajax({
                url:'../php/tareas.php',
                type: 'POST',
                data: 'id_activ='+id_activ+'&nombre='+nombre+'&finicio='+finicio+'&ftermino='+ftermino+'&descripcion='+descripcion+'&opcion=registrar'
            }).done(function(respuesta){

                    //console.log(respuesta);
                    if(respuesta == 0){

                        $('#echo').slideDown('slow');
                        setTimeout(function(){
                            $('#echo').slideUp('slow');        
                        },2000);
                    }else if(respuesta == 1){
                        $('#dange').slideDown('slow');
                        setTimeout(function(){
                            $('#dange').slideUp('slow');
                        },2000);
                    }

            });
        }else{
                $('#fecha').fadeIn('slow');
                setTimeout(function(){
                $('#fecha').fadeOut('slow');
                },2000);
                return;
            }
        }
    }else{
            $('#fecha').fadeIn('slow');
            setTimeout(function(){
            $('#fecha').fadeOut('slow');
            },2000);
            return;
    }
}
  
  function agregar_tarea(){

        var id_activ = document.getElementById('id_activ').value;    
        var nombre = document.getElementById('nombre').value;
        var fecha_inicio = document.getElementById('finicio').value;
        //var fecha_termino = document.getElementById('ftermino').value;
        var descripcion = document.getElementById('descripcion').value;

        var di = document.getElementById('di').value;
        var mi = document.getElementById('mi').value;
        var Yi = document.getElementById('Yi').value;

        var dt = document.getElementById('dt').value;
        var mt = document.getElementById('mt').value;
        var Yt = document.getElementById('Yt').value;

        var dia = document.getElementById('dia').value;
        var mes = document.getElementById('mes').value;
        var any = document.getElementById('any').value;

        /*var fecha_i = di+'/'+mi+'/'+Yi;   
        var fecha_t = dt+'/'+mt+'/'+Yt;   
        var fecha_ = dia+'/'+mes+'/'+any; */  
    
        var f1 = new Date(any, mes, dia);
        var f2 = new Date(Yt, mt, dt);
        var f3 = new Date(Yi, mi, di);



        if(f1 <= f2){
          
          //if(mes >= mi && any >= Yi){
            var fecha_termino = dia+'/'+mes+'/'+any;
                    

 if(id_activ == '' || nombre == '' || fecha_inicio == '' || fecha_termino == '' || descripcion == ''){

                    $('#vacios').slideDown('slow');
                    setTimeout(function(){
                        $('#vacios').slideUp('slow');
                    },2000);
                            return;
        }else{

            if(f1 >= f3){
            var id_activ = $('#id_activ').val();
            var nombre = $('#nombre').val();
            var finicio = $('#finicio').val();
           // var ftermino = $('#ftermino').val();
            var ftermino = dia+'/'+mes+'/'+any;
            var descripcion = $('#descripcion').val(); 

            $.ajax({
                url:'../php/tareas.php',
                type: 'POST',
                data: 'id_activ='+id_activ+'&nombre='+nombre+'&finicio='+finicio+'&ftermino='+ftermino+'&descripcion='+descripcion+'&opcion=registrar'
            }).done(function(respuesta){

                    //console.log(respuesta);
                    if(respuesta == 0){

                        $('#exito').slideDown('slow');
                        setTimeout(function(){
                            $('#exito').slideUp('slow');        
                        },2000);
                    }else if(respuesta == 1){
                        $('#danger').slideDown('slow');
                        setTimeout(function(){
                            $('#danger').slideUp('slow');
                        },2000);
                    }

            });   

        }else{
                $('#fecha').fadeIn('slow');
                setTimeout(function(){
                $('#fecha').fadeOut('slow');
                },2000);
                return;
            }
        }
            }else{
                $('#fecha').fadeIn('slow');
                setTimeout(function(){
                $('#fecha').fadeOut('slow');
                },2000);
                return;
                }    
  }

    function tareas_detalles(tbody,table){

    $(tbody).on("click", "button.detalle", function(){
        var data = table.row($(this).parents("tr")).data();   

        //console.log(data);

    var id_activ = $("#frmDetalles #id_activ").val(data.id_activ);
        proyecto = $("#frmDetalles #proyecto").val(data.proyecto),
        actividad = $("#frmDetalles #actividad").val(data.actividad),
        finicio = $("#frmDetalles #finicio").val(data.finicio),
        ftermino = $("#frmDetalles #ftermino").val(data.ftermino),
        ftermino = $("#EditarTarea #ffinal").val(data.ftermino),
        actividds = $("#frmDetalles #actividds").val(data.actividds);
     
            var id = JSON.parse(data.id_activ);
                   //console.log(id);         

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
        html+="<td>"+x+"</td><td>"+obj.data[i].nombre+"</td><td><textarea style='width:90%; border:1px solid transparent;'>"+obj.data[i].descripcion+"</textarea></td><td>"+obj.data[i].finicio+"</td><td>"+obj.data[i].ftermino+"</td><td>"+"</td><tr>";        
        }
    }
    html+="</table>"
    $("#demo").html(html);
//obj = JSON.parse(resp);
//alert(json_nfo);
    });            
        $("#cuadro1").hide("slow");
        $("#dettar").slideDown("slow");
        $("#demo").slideDown("slow");
    });

    limpiar_datos();
}

function eliminar(id_tareas){

        var tarea = id_tareas;
        var id_tareas = $("#TareaEliminar #id_tareas").val(tarea);
   
    $.ajax({
        url:'../php/tarea_listar.php',
        type: 'POST'

    }).done(function(resp){

        var res = obj.data;  

   for(i=0;i<res.length;i++){
    var id_tareas = obj.data[i].id_tareas;

        if(tarea == id_tareas){             
             var id_act = obj.data[i].id_act;
             var id_activ = $("#TareaEliminar #id_act").val(id_act);
        }
       }     
    });

}

function eliminar_tarea(){

    $("#eliminar-tarea").on("click", function(){
        var id_tareas = $("#TareaEliminar #id_tareas").val(),
                id_act = $("#TareaEliminar #id_act").val(),
                opcion = $("#TareaEliminar #opcion").val();

        $.ajax({
            method: "POST",
            url: '../php/tareas.php',
            data: {"id_tareas":id_tareas,"id_act":id_act,"opcion":opcion}
        }).done(function(resultado){
            var json_respuesta = JSON.parse(resultado);
            
            mostrar_mensaje(json_respuesta);
            limpiar_datos();
            listar_tareas();

        });
    });
}



function editar(id_tareas){

        var id = id_tareas;
        var id_tareas = $("#EditarTarea #id_tareas").val(id);
  $.ajax({
        url:'../php/tarea_listar.php',
        type: 'POST'

    }).done(function(resp){

        var res = obj.data;  

   for(i=0;i<res.length;i++){
    var tarea = obj.data[i].id_tareas;
    
        if(id==tarea){             
             var nombre = obj.data[i].nombre;
             var finicio = obj.data[i].finicio;
             var ftermino = obj.data[i].ftermino;
             var descripcion = obj.data[i].descripcion;
             var nombre = $("#EditarTarea #nombre").val(nombre);
             var fecha_inicio = $("#EditarTarea #finicio").val(finicio);
             var fecha_termino = $("#EditarTarea #ftermino").val(ftermino);
             var descripcion = $("#EditarTarea #tar_descrip").val(descripcion);
        }
    }     
});
     $("#demo").hide("slow");
     $("#editar").slideDown("slow");
}

function editar_tarea(){

  var frm=$("#EditarTarea").serialize();
  //console.log(frm);
   $.ajax({
        url:'../php/tareas.php',
        type:'POST',
        data:frm+"&opcion=modificar"
    }).done(function(respuesta){
        //console.log(respuesta);
        if(respuesta==0)
        {         
                $('#realizado').fadeIn('slow');
                setTimeout(function(){
                $('#realizado').fadeOut('slow');
                },2000);

                listar_tareas();

        }else if(respuesta==1){
       
                $('#aviso').slideDown('slow');
                setTimeout(function(){
                $('#aviso').slideUp('slow');
                },2000);            
       
        }else if(respuesta==2){

                $('#alert').slideDown('slow');
                    setTimeout(function(){
                        $('#alert').slideUp('slow');
                    },2000);
            }else if(respuesta==3){

                $('#fecha3').slideDown('slow');
                    setTimeout(function(){
                        $('#fecha3').slideUp('slow');
                    },2000);
            }
    });
//});

    }

var limpiar_datos = function(){
$("#opcion").val("registrar");
$("#idproyecto").val("");
$("#id_activ").val("");
$("#nombre").val("").focus();
$("#nombre_").val("").focus();
$("#finicio").val("");
$("#ftermino").val("");
$("#finicio_").val("");
//$("#ftermino_").val("");
$("#fecha_inicio").val("");
$("#fecha_termino").val("");
$("#descripcion").val("");
$("#descripcion_").val("");
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