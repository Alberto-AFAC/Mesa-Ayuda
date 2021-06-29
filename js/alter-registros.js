 var listar_categoria = function(){

 	$("#cuadro2").hide();
 	$("#cuadro3").hide();
 	$("#cuadro1").show("slow");

		var table = $("#categoria").DataTable({

			"destroy":true,
			"ajax":{
			"method":"POST",
			"url":"../../php/listar_categoria.php"
			},
			"columns":[
			{"data":"nombre"},
			{"data":"cat_descrip"},
			{"defaultContent":"<button type='button' data-toggle='modal' data-target='#modalCategoriaEditar' class='editar btn btn-primary'><i class='fa fa-pencil-square-o'></i></button> <button type='button' class='eliminar btn btn-danger' data-toggle='modal' data-target='#modalEliminar'><li class='fa fa-trash-o'></li></button>"}
			],
		});
				categoria_editar("#categoria tbody",table);
				categoria_eliminar("#categoria tbody",table);
			}

	function CategoriaRegistrar(){
		limpiar_datos();
		$("#cuadro1").hide("slow");
		$("#cuadro3").slideDown("slow");
	}


	function agregar_categoria(){

	var nombre = document.getElementById('nombre').value;
	var cat_descrip = document.getElementById('cat_descrip').value;
	//var fecha = document.getElementById('fecha').value;

	if(nombre=='' || cat_descrip==''){

		$("#vacio").slideDown("slow");
		setTimeout(function(){
			$("#vacio").slideUp("slow");
		},2000);

		return;
	}else{

		var nombre = $("#nombre").val();
		var cat_descrip = $("#cat_descrip").val();
		//var fecha = $("#fecha").val(); 

		$.ajax({
			url:'../../php/registros.php',
			type: 'POST',
			data:'nombre='+nombre+'&cat_descrip='+cat_descrip+'&opcion=registrar'

		}).done(function(respuesta){
			//console.log(respuesta);
			if(respuesta == 0){

				$("#exito").slideDown("slow");
				setTimeout(function(){
					$("#exito").slideUp("slow");
				},2000);
			}else{

				$("#danger").slideDown("slow");
				setTimeout(function(){
						$("#danger").slideUp("slow");
				},2000);
			}

		});
	}

	}

	 function categoria_eliminar(tbody, table){

			$(tbody).on("click", "button.eliminar", function(){
				
				var data = table.row($(this).parents("tr")).data();
				//console.log(data);
				var id_categoria = $("#CategoriaEliminar #id_categoria").val(data.id_categoria);				
			});
		}

	function eliminar_categoria(){

		$("#eliminar-categoria").on("click", function(){

			var id_categoria = $("#CategoriaEliminar #id_categoria").val(),
					  opcion = $("#CategoriaEliminar #opcion").val();

					$.ajax({
						method: "POST",
						url: "../../php/registros.php",
						data: {"id_categoria": id_categoria, "opcion": opcion}
		//					console.log(data);
					}).done(function(respuesta){

						//console.log(respuesta);
						var json_respuesta = JSON.parse(respuesta);
						//mostrar_mensaje(json_respuesta);
						limpiar_datos();
						listar_categoria();
					});
		});
	}

	function categoria_editar(tbody, table){

		$(tbody).on("click", "button.editar", function(){

				var data = table.row($(this).parents("tr")).data();
				//console.log(data);
		  var id_categoria = $("#EditarCategoria #id_categoria").val(data.id_categoria),
	    nombre = $("#EditarCategoria #nombre").val(data.nombre),
			 	cat_descrip = $("#EditarCategoria #cat_descrip").val(data.cat_descrip),
			      opcion = $("#EditarCategoria #opcion").val("modificar");
		
		$("#cuadro1").hide("slow");
		$("#cuadro2").slideDown("slow");
		
		});
	}

	function editar_categoria()
	{
		var form = $("#EditarCategoria").serialize();
		//console.log(form);
		$.ajax({
			url: "../../php/registros.php",
			type: "POST",
			data:form+"&opcion=modificar"
		}).done(function(respuesta){
			console.log(respuesta);
			if(respuesta==0){

				$("#echo").slideDown("slow");
				setTimeout(function(){
					$("#echo").slideUp("slow");
				},2000);
			
			}else if(respuesta==1){

				$("#aviso_vacio").slideDown("slow");
				setTimeout(function(){
					$("#aviso_vacio").slideUp("slow");
				},2000);

			}else if(respuesta==2){

				$("#error").slideDown("slw");
					setTimeout(function(){
						$("#error").slideUp("slow")
					},2000);
			}
		});
	}
	var limpiar_datos = function(){
		$("#opcion").val("registrar");
		$("#id_categoria").val("");
		$("#nombre").val("");
		$("#cat_descrip").val("");
	}