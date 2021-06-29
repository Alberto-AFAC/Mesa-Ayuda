
	function registrar(){

	var nombre=document.getElementById('nombre').value;
		var apellidos=document.getElementById('apellidos').value;	    	
			var telefono=document.getElementById('telefono').value;
				var celular=document.getElementById('celular').value;
					var correo=document.getElementById('correo').value;


 if(nombre=='' || apellidos=='' || !(/^[0-9\-\ ]+$/.test(telefono)) || !(/^[0-9\-\ ]+$/.test(celular)) || correo==''){

                    $('#aviso_vacio').slideDown('slow');
                    setTimeout(function(){
                    $('#aviso_vacio').slideUp('slow');
                    },2000); 

            return;
 }else{


            var nombre=$('#nombre').val();
            var apellidos=$('#apellidos').val();
            var telefono=$('#telefono').val();
            var celular=$('#celular').val();
            var correo=$('#correo').val();
      
                $.ajax({
                    url:'../../php/manejadores.php',
                    type:'POST',
                    data:'nombre='+nombre+'&apellidos='+apellidos+'&telefono='+telefono+'&celular='+celular+'&correo='+correo+'&opcion=registrar'
                	//console.log(data);
                }).done(function(respuesta){
                    if (respuesta==0) {
                        //$('#exito').show();
                         $('#exito').slideDown('slow');
                        setTimeout(function(){
                          $('#exito').slideUp('slow');
                        },2000);
                    }
                    else{
                        
                        $('#danger').slideDown('slow');
                        setTimeout(function(){
                          $('#danger').slideUp('slow');
                        },2000);
                    }                    
                });
         


}
	}

		//creando la funcion modificar 
	
	function modificar(){

  var frm=$("#frmEditar").serialize();
    console.log(frm);
    $.ajax({
        url:"../../php/manejadores.php",
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
       
				$('#vacio').slideDown('slow');
				setTimeout(function(){
				$('#vacio').slideUp('slow');
				},2000);            
       
        }else if(respuesta==2){

        		$('#error').slideDown('slow');
        			setTimeout(function(){
        				$('#error').slideUp('slow');
        			},2000);
        	}
    });
//});

	}

var obtener_data_eliminar = function(tbody, table){
		$(tbody).on("click", "button.eliminar", function(){
			var data = table.row( $(this).parents("tr") ).data();
			//console.log(data);
			var id_manejador = $("#frmEliminarManejador #id_manejador").val(data.id_manejador);
				//nombre = $("#frmEliminarcorreo #nombre").val(data.nombre);
				
		});
	}
	
	var eliminar = function(){
	//para realiza el evento del clic del boton
		$("#eliminar-manejador").on("click", function(){
			var id_manejador = $("#frmEliminarManejador #id_manejador").val(),
			        opcion = $("#frmEliminarManejador #opcion").val();

		  $.ajax({
		  	 method: "POST",
		  	 url: "../../php/manejadores.php",
		  	 data: {"id_manejador": id_manejador, "opcion": opcion}
		  	}).done(function(info){
		  			var json_info = JSON.parse(info); 
				mostrar_mensaje(json_info);
				limpiar_datos();			
			//console.log(rfc);
						listar_manejador();
		});
	});	
}

var mostrar_mensaje = function( informacion ){
var texto = "", color = "";
if( informacion.respuesta == "BIEN" ){
texto = "Se han guardado los cambios correctamente.";
color = "#379911";
}else if( informacion.respuesta == "ERROR"){
texto = "<strong>Error</strong>, no se ejecutó la consulta.";
color = "#C9302C";
}else if( informacion.respuesta == "EXISTE" ){
texto = "<strong>Información!</strong> el correo ya existe.";
color = "#5b94c5";
}else if( informacion.respuesta == "VACIO" ){
texto = "<strong>Advertencia!</strong> debe llenar todos los campos solicitados.";
color = "#ddb11d";
}else if(informacion.respuesta == "OPCION_VACIA"){
texto = "<strong>Advertencia!</strong>la opción no existe o esta vacia, recarge la pagina.";
color = "#ddb11d";
}


$(".mensaje").html( texto ).css({"color": color });
$('.mensaje').fadeIn('slow');
setTimeout(function(){
$(this).html("");
$('.mensaje').fadeOut('slow');
},2000);

}
//limpiar los input text
var limpiar_datos = function(){
$("#opcion").val("registrar");
$("#id_manejador").val("");
$("#nombre").val("").focus();
$("#apellidos").val("");
$("#telefono").val("");
$("#celular").val("");
$("#correo").val("");

}



var listar_manejador = function(){
		//para mostrar las tablas del formulario
		$("#cuadro2").hide();
		$("#cuadro3").hide();
		$("#cuadro1").slideDown("slow");
		//variable = identificador)funcion.DataTable
		var table = $("#manejador").DataTable({
			//aceptara la actualizacion de reiniciar la tabla de datos/ al registrar un correo se mostrar. si no colocamos la propiedad nos causaria problemas 
			"destroy":true,
			"ajax":{
				//atributo 
				"method":"POST",
				//mencionmos la plantilla para que mustre la lista
				"url":"../../php/listar_manejador.php"
			},
			//se va mostrar las columnas con las cuales vamos a trabajar 
			"columns":[
			//data que se menciona para que se pueda mostrar los registros de droma ordenada
			
			{"data":"nombre"},
			{"data":"apellidos"},
			{"data":"telefono"},
			{"data":"celular"},
			{"data":"correo"},
			//vamos a crear botones para realizar las acciones.colocamos en estrctura un ,<th></th>
			{"defaultContent":"<button type='button' data-toggle='modal' data-target='#modalEditar' class='editar btn btn-primary'><i class='fa fa-pencil-square-o'></i></button>  <button type='button' class='eliminar btn btn-danger' data-toggle='modal' data-target='#modalEliminar'><i class='fa fa-trash-o'></i></button>"}
			],

			//creamos una variable
			"language":traduccion,

		});
			//llamando la funcion obtener data editar dentro de la funcion porque tenemos nuestro table, colocamos el identificador y hacemos referencia del tbody
			obtener_data_editar("#manejador tbody",table);
			obtener_data_eliminar("#manejador tbody",table);
	}	

	function DatosRegistrar(){
		agregar_nuevo_correo();
				}

	var agregar_nuevo_correo = function(){
		limpiar_datos();
		$("#cuadro2").slideDown("slow");
			$("#cuadro1").hide("slow");
	}

	//funciones para obtener los datos. tendra dos parametros 
	var obtener_data_editar = function(tbody, table){
	//al darle clicl al boton editar va desencadenar la funcion 
		$(tbody).on("click", "button.editar", function(){
		//el metodo row nos va dar el dato de cada fila	.. parets nos retorna todos los antesesores al metodo selecionado, en esta caso el metodso seleccionado es el boton pero antes de el esta un dt y antes esta un tr en este caso pasamos por parametro al tr que nos va devolver los data de esa fila
			var data = table.row( $(this).parents("tr") ).data();
				//console.log(data);///colocnado esta linea podremos ver desde la consola que datos nos etsa areojando
			//colocamos las variable de esta manera idenfificador, para mostrar los valores en el formulario.data nos permite costrar como objeto las variables.
			var id_manejador = $("#frmEditar #id_manejador").val(data.id_manejador),
				    nombre = $("#frmEditar #nombre").val(data.nombre),
				 apellidos = $("#frmEditar #apellidos").val(data.apellidos),
				  telefono = $("#frmEditar #telefono").val(data.telefono),
				   celular = $("#frmEditar #celular").val(data.celular),
				    correo = $("#frmEditar #correo").val(data.correo),
				    opcion = $("#frmEditar #opcion").val("modificar");

			$("#cuadro3").slideDown("slow");
			$("#cuadro1").hide();

		});
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
