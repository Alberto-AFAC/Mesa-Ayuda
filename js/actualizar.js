	
function actualizar(){

var id_usuario=$('#id_usuario').val();
var usuario=$('#usuario').val();
var password=$('#password').val();
var pass=$('#pass').val();
var pass2=$('#pass2').val();


					$.ajax({
					url:'../conexion/actualizar.php',
					type:'POST',
					data:'usuario='+usuario+'&password='+password+'&pass='+pass+'&pass2='+pass2+'&id_usuario='+id_usuario+'&opcion=modificar'
	}).done(function(respuesta){
	   	console.log(respuesta);
		if(respuesta==7){      
			$('#echo').slideDown('slow');
			setTimeout(function(){
			$('#echo').slideUp('slow');
				},2000);}
			else if(respuesta==2){      
					$('#invalida').slideDown('slow');
					setTimeout(function(){
					$('#invalida').slideUp('slow');
						},2000);}
				else if(respuesta==3){      
						$('#falso').slideDown('slow');
						setTimeout(function(){
						$('#falso').slideUp('slow');
							},2000);                   
						}else if(respuesta==4){      
								$('#vacio').slideDown('slow');
								setTimeout(function(){
								$('#vacio').slideUp('slow');
									},2000);                   
							}else if(respuesta==1){      
									$('#error').slideDown('slow');
									setTimeout(function(){
									$('#error').slideUp('slow');
										},2000); 
												}
									});
						}


	 $.ajax({
        url:'../php/listap.php',
        type: 'POST'

    }).done(function(resp){  

	obj = JSON.parse(resp);
	var cero = obj.data[0].conteo;
		
	if(cero == 0){
	obj = JSON.parse(resp);

    $("#proyectos").html(cero).fadeIn('slow');
 //   $("#actividadds").html(cero).fadeIn('slow');
   
    }else{

    obj = JSON.parse(resp);
    var pro = obj.data[0].conteo;
 //   var act = obj.data[1].conteo;

    $("#proyectos").html(pro).fadeIn('slow');
//    $("#actividadds").html(act).fadeIn('slow');
    }

    });

	 $.ajax({
        url:'../php/listaa.php',
        type: 'POST'

    }).done(function(resp){  

	obj = JSON.parse(resp);
	var cero = obj.data[0].conteo;
		
	if(cero == 0){
	obj = JSON.parse(resp);

    $("#actividadds").html(cero).fadeIn('slow');
   
    }else{

    obj = JSON.parse(resp);
    var act = obj.data[0].conteo;
 
    $("#actividadds").html(act).fadeIn('slow');
    }

    });

 $.ajax({
        url:'../php/listat.php',
        type: 'POST'

    }).done(function(resp){  

	obj = JSON.parse(resp);
	var cero = obj.data[0].conteo;

	if(cero == 0){
	obj = JSON.parse(resp);
    $("#tareas").html(cero).fadeIn('slow');
    }else{
    obj = JSON.parse(resp);
    var tarr = obj.data[0].conteo;
 
    $("#tareas").html(tarr).fadeIn('slow');
    }
    });


$.ajax({
	url: '../php/listas.php',
	type: 'POST'
}).done(function(resp){

	obj = JSON.parse(resp);
	var cero = obj.data[0].conteo;

	if(cero == 0){
	obj = JSON.parse(resp);
	    $("#tarea").html(cero).fadeIn('slow');
//	    $("#nc").html(cero).fadeIn('slow');

	}else{
		obj = JSON.parse(resp);
		var tar = obj.data[0].conteo;
//		var nc = obj.data[1].conteo;

		$("#tarea").html(tar).fadeIn('slow');
//		$("#nc").html(nc).fadeIn('slow');
	}

});
 
$.ajax({
	url: '../php/coment.php',
	type: 'POST'
}).done(function(resp){

	obj = JSON.parse(resp);
	var cero = obj.data[0].conteo;

	if(cero == 0){
	obj = JSON.parse(resp);

    $("#cero").html('').fadeIn('slow');		
    $("#nc").html(cero).fadeIn('slow');

	}else{
		obj = JSON.parse(resp);
		var nc = obj.data[0].conteo;

		$("#nc").html(nc).fadeIn('slow');
		$("#cero").html(nc).fadeIn('slow');
	}

});

	 $.ajax({
        url:'../php/act_pro.php',
        type: 'POST'

    }).done(function(resp){  

	obj = JSON.parse(resp);
	var cero = obj.data[0].conteo;
		
	if(cero == 0){
	obj = JSON.parse(resp);

    $("#proyecto").html(cero).fadeIn('slow');
//    $("#actividad").html(cero).fadeIn('slow');
   
    }else{

    obj = JSON.parse(resp);
    var pro = obj.data[0].conteo;

    $("#proyecto").html(pro).fadeIn('slow');
//    $("#actividad").html(act).fadeIn('slow');
    }

    });

    $.ajax({
        url:'../php/pro_act.php',
        type: 'POST'

    }).done(function(resp){  

	obj = JSON.parse(resp);
	var cero = obj.data[0].conteo;
		
	if(cero == 0){
	obj = JSON.parse(resp);

    $("#actividad").html(cero).fadeIn('slow');
   
    }else{

    obj = JSON.parse(resp);
    var act = obj.data[0].conteo;

    $("#actividad").html(act).fadeIn('slow');
    }
    });
