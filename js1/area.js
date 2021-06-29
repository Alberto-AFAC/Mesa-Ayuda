
function listar_area(){
    //destroy:true,
    $.ajax({
    url:'../../php/lista_area.php',
    type:'POST'
    }).done(function(resp){
        obj = JSON.parse(resp);
        var res = obj.data;  
        var x = 0;
            html = '<div id="example_wrapper" class="dataTables_wrapper form-inline dt-bootstrap"><div class="row"> <div class="col-sm-12"><table id="area" class="table table-striped table-bordered dataTable" style="width:100%" role="grid" aria-describedby="example_info"><thead><tr><th><i class="fa fa-sort-numeric-asc"></i>ID</th><th><i></i> Identificador</th><th><i></i> Area</th><th><i></i>Acción</th></tr></thead><tbody>';
            for(i=0; i<res.length;i++){
            x++;
            if(obj.data[i].id_sub==0){
            html +="<tr><td>"+x+"</td><td>"+obj.data[i].identificador+"</td><td>"+obj.data[i].adscripcion+"</td><td><a href='javascript:openEdt1()' onclick='aredit("+'"'+obj.data[i].id_area+'"'+")' class='detalle btn btn-default'><i class='fa fa-pencil-square-o text-info'></i></a> <button type='button' class='eliminar btn btn-default' data-toggle='modal' data-target='#modalEliminar' onclick='eliminar("+'"'+obj.data[i].id_area+'"'+")'><li class='fa fa-trash-o text-danger'></li></button> <a href='javascript:openDet1()' onclick='areadetalles("+'"'+obj.data[i].id_area+'*'+obj.data[i].adscripcion+'"'+")' class='detalle btn btn-default'><i class='glyphicon glyphicon-list-alt text-warning'></i></a> </td></tr>";
            }
        } 
        html +='</tbody></table></div></div></div>';
        $("#areas").html(html);  
    })          
}

function registrar(){
    var adscripcion = document.getElementById('adscripcion').value;
    var id_area = document.getElementById('id_area').value;
    var identificador= document.getElementById('adscripcion').value;
        if(adscripcion == '' || id_area == '' || identificador==''){
            //$('#vacio').slideDown('slow');
            $("#vacio").toggle("toggled");
            setTimeout(function(){
            $('#vacio').toggle('toggled');
                },2000);    
            return;
        }else{
            var adscripcion = $('#adscripcion').val();
            var id_area = $('#id_area').val();
            var identificador = $('#identificador').val();
                $.ajax({
                    url:'../../php/rptAre.php',
                    type:'POST',
                    data: 'identificador='+identificador+'&adscripcion='+adscripcion+'&id_area='+id_area+'&opcion=registrar'
                }).done(function(respuesta){
                console.log(respuesta);
                if(respuesta==0){
                //$('#exito').slideDown('slow');
                $("#exito").toggle("toggled");
                setTimeout(function(){
                //$('#exito').slideUp('slow');
                $("#exito").toggle("toggled");
                     },2000);
                }else if(respuesta==1){
                    $("#error").toggle("toggled");
                    setTimeout(function(){
                    $("#error").toggle("toggled");
                },2000);
            }
        });
    }
}

function areadetalles(id_area){
    var d=id_area.split("*");
    $("#frmDetalles #id_area").val(d[0]);
    $("#frmDetalles #adscripcion").val(d[1]);
    //console.log(id_area);
    var id = d[0];  
    $.ajax({
        url:'../../php/area_listar.php',
        type: 'POST'
        }).done(function(resp){  
            obj = JSON.parse(resp);
            var res = obj.data;  
            x = 0;
            html="<div class='panel-body'><table class='table table-bordered'  cellspacing='0' width='100%'><tr><th style='width:2%;'>N°</th><th style='width:50%;'>Adscripción</th><th style='width:11%;'></th></tr>";
            for(i=0; i<res.length; i++){
            var id_sub = obj.data[i].id_sub;
            if(id==id_sub){
            x++;
            html+="<tr style='height:40px;'><td>"+x+"</td><td>"+obj.data[i].adscripcion+"</td><td>"+"<button type='button' onclick='editar("+'"'+obj.data[i].id_area+'"'+")' class='editar btn btn-default' data-target='#EditarModal'><i class='fa fa-pencil-square-o text-info'></i></button>   <button type='button' onclick='eliminar("+'"'+obj.data[i].id_area+'"'+")' class='eliminar btn btn-default' data-toggle='modal' data-target='#modalEliminar'><i class='fa fa-trash-o text-danger'></i></button> <a href='javascript:openDet2()' onclick='detalles("+'"'+obj.data[i].id_area+'*'+obj.data[i].adscripcion+'"'+")' class='detalle btn btn-default'><i class='glyphicon glyphicon-list-alt text-warning'></i></a> </td></tr>";

//<button type='button' onclick='detalles("+'"'+obj.data[i].id_area+'"'+")' class='detalle btn btn-default' data-toggle='modal' data-target='#modalDetalles'><i class='glyphicon glyphicon-list-alt text-warning'></i></button>"+"</td></tr>";        
            }
        } 
        html+="</table></div>"
        $("#datos").html(html);   
    });
}

function detalles(adscripcion){
    var d=adscripcion.split("*");
        $("#Detalles #id_area").val(d[0]);
        $("#Detalles #adscripcion").val(d[1]);    
        var idarea = d[0]; 
            $.ajax({
            url:'../../php/area_listar.php',
            type: 'POST'
            }).done(function(resp){  
            obj = JSON.parse(resp);
            var res = obj.data;  
            x = 0;
             html="<div class='panel-body'><table class='table table-bordered'  cellspacing='0' width='100%'><tr><th style='width:2%;'>N°</th><th style='width:50%;'>Adscripción</th><th style='width:11%;'></th></tr>";
                for(i=0; i<res.length; i++){
                var idsub = obj.data[i].id_sub;
                if(idarea==idsub){
                x++;    
            html+="<tr style='height:40px;'><td>"+x+"</td><td>"+obj.data[i].adscripcion+"</td></td><td>"+"<button type='button' onclick='editar("+'"'+obj.data[i].id_area+'"'+")' class='editar btn btn-default' data-target='#EditarModal'><i class='fa fa-pencil-square-o text-info'></i></button>   <button type='button' onclick='eliminar("+'"'+obj.data[i].id_area+'"'+")' class='eliminar btn btn-default' data-toggle='modal' data-target='#modalEliminar'><i class='fa fa-trash-o text-danger'></i></button> <a onclick='closeDet3()' class='detalle btn btn-default'><i class='glyphicon glyphicon-list-alt text-warning'></i></a> </td></tr>";
            }
        } 
        html+="</table></div>"
        $("#listareas").html(html);   
    });
}

function eliminar(id_area){
    var id_area = $("#AreaEliminar #id_area").val(id_area);
}

function aredit(id_area){
    var id = id_area;
    var id_area = $("#EditarArea #id_area").val(id);
        $.ajax({
            url:'../../php/area_listar.php',
            type: 'POST'
        }).done(function(resp){
            var res = obj.data;  
            for(i=0;i<res.length;i++){
            var area_id = obj.data[i].id_area;
            if(id==area_id){ 
            var ide = obj.data[i].identificador;
            var ads = obj.data[i].adscripcion;
            var identificador = $("#EditarArea #identificador").val(ide);
            var adscripcion = $("#EditarArea #adscripcion").val(ads);
            }
        }     
    });
}

function editAra(){
    var frm=$("#EditarArea").serialize();

    $.ajax({
        url:"../../php/rptAre.php",
        type:'POST',
        data:frm+"&opcion=modificar"
        }).done(function(respuesta){
            if(respuesta==0)
            {         
            $('#exitoe').toggle("toggled");
            setTimeout(function(){
            $('#exitoe').toggle("toggled");
            },1500);
            setTimeout('location.reload()',2000);
            }else if(respuesta==1){

            $('#avisoe').toggle("toggled");
            setTimeout(function(){
            $('#avisoe').toggle("toggled");
            },2000);            

            }else if(respuesta==2){

            $('#errore').toggle("toggled");
            setTimeout(function(){
            $('#errore').toggle("toggled");
            },2000);
        }
        limpiar_datos();
    });
}



function edita(id_area){

		var id = id_area;
        var id_area = $("#AreaEditar #id_area").val(id);

  $.ajax({
        url:'../../php/area_listar.php',
        type: 'POST'

    }).done(function(resp){

        var res = obj.data;  

   for(i=0;i<res.length;i++){
    var area_id = obj.data[i].id_area;

        if(id==area_id){ 

        	var ads = obj.data[i].adscripcion;
        	var area_id = obj.data[i].id_sub;
             var adscripcion = $("#AreaEditar #adscripcion").val(ads);
             var areaid = $("#AreaEditar #idareas").val(area_id);
        }
    }     
});

	//$("#cuadro3").slideDown("slow");
	$("#cuadro7").slideDown("slow");
	$("#areas").hide("slow");
}


 
 function Detalles(){
 	$("#cuadro5").hide("slow");
 	$("#datos").slideDown("slow");
 }

  function Deta(){
 	$("#cuadro7").hide("slow");
 	$("#areas").slideDown("slow");
 }

function Detalle(){
 	$("#cuadro6").hide("slow");
	$("#areas").hide("slow"); 	
 	$("#datos").slideDown("slow");
 }


function AreaRegistrar(){
	limpiar_datos();
	$("#cuadro1").hide("slow");
	$("#cuadro2").slideDown("slow");
}


function area_editar(tbody, table){

	$(tbody).on("click", "button.editar", function(){
		var data = table.row($(this).parents("tr")).data();
		//console.log(data);
		var id_area = $("#frmEditar #id_area").val(data.id_area),
			    adscripcion = $("#frmEditar #adscripcion").val(data.adscripcion),
			    opcion = $("#frmEditar #opcion").val("modificar");

		$("#cuadro3").slideDown("slow");
		$("#cuadro1").hide();

	});
}



function modificar(){
  var frm=$("#frmEditar").serialize();
  console.log(frm);
    $.ajax({
        url:"../../php/rptAre.php",
       type:'POST',
        data:frm+"&opcion=modificar"
    }).done(function(respuesta){
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

        	limpiar_datos();
    });
//});

	}


	function actualizar_area(){
  var frm=$("#AreaEditar").serialize();
  console.log(frm);
    $.ajax({
        url:"../../php/rptAre.php",
       type:'POST',
        data:frm+"&opcion=modificar"
    }).done(function(respuesta){
        if(respuesta==0)
        {         

				$('#areaechos').slideDown('slow');
				setTimeout('location.reload()',1500);

        }else if(respuesta==1){
       
				$('#areavacios').slideDown('slow');
				setTimeout(function(){
				$('#areavacios').slideUp('slow');
				},2000);            
       
        }else if(respuesta==2){

        		$('#areafalla').slideDown('slow');
        			setTimeout(function(){
        				$('#areafalla').slideUp('slow');
        			},2000);
        	}

        	limpiar_datos();
    });
	}

function area_eliminar(tbody,table){

	$(tbody).on("click","button.eliminar", function(){
	
		var data = table.row($(this).parents("tr")).data();

	var id_area = $("#AreaEliminar #id_area").val(data.id_area);	


	});
}

function eliminararea(){

//	$("#eliminar-area").on("click", function(){
		var id_area = $("#AreaEliminar #id_area").val(),
				opcion = $("#AreaEliminar #opcion").val();

				console.log(id_area);

		$.ajax({
			method: "POST",
			url: "../../php/rptAre.php",
		data: {"id_area":id_area,"opcion":opcion}
		}).done(function(respuesta){
			//console.log(respuesta);
			var json_respuesta = JSON.parse(respuesta);
            setTimeout('location.reload()',2000);
			mostrar_mensaje(json_respuesta);
			limpiar_datos();
		});
//	});
}

var limpiar_datos = function(){
$("#opcion").val("registrar");
$("#id_area").val("");
$("#idarea").val("");
$("#adscripcion").val("").focus();
}


var mostrar_mensaje = function( informacion ){
var texto = "", color = "";
if( informacion.respuesta == "BIEN" ){
texto = "Área adscripción se eliminó correctamente.";
color = '#fff';
}else if( informacion.respuesta == "ERROR"){
texto = "<strong>Error</strong>, No se eliminó área adscripción.";
color = "#C9302C";
}
$(".mensaje").html( texto ).css({"color": color });
$('.mensaje').fadeIn('slow');
setTimeout(function(){
$(this).html("");
$('.mensaje').fadeOut('slow');
},1500);

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
