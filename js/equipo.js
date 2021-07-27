function agrEqpo(){

var n_empleado = document.getElementById('nempleado').value;
// var asignado = document.getElementById('asignado').value;
//var id_equipo = document.getElementById('id_equipo').value;
var num_sigtic = document.getElementById('num_sigtic').value;
var num_invntraio = document.getElementById('num_invntraio').value;
var marca_cpu = document.getElementById('marca_cpu').value;
var serie_cpu = document.getElementById('serie_cpu').value;
var memoria_ram = document.getElementById('memoria_ram').value;
var procesador = document.getElementById('procesador').value;
var velocidad_proc = document.getElementById('velocidad_proc').value;
var uni_disc_flax = document.getElementById('uni_disc_flax').value;
var disco_duro = document.getElementById('disco_duro').value;
var serie_teclado = document.getElementById('serie_teclado').value;
var serie_monitor = document.getElementById('serie_monitor').value;
var version_windows = document.getElementById('version_windows').value;
var version_office = document.getElementById('version_office').value;
var serie_mouse = document.getElementById('serie_mouse').value;
var direccion_ip = document.getElementById('direccion_ip').value;
var nombre_equipo = document.getElementById('nombre_equipo').value;
var servicio_internet = document.getElementById('servicio_internet').value;
var tipo_equipo = document.getElementById('tipo_equipo').value;
var ubicacion = document.getElementById('ubicaeqpo').value;

if(n_empleado == 0){var asignado = 'designado';}else{var asignado = 'asignado';}

datos = asignado+'*'+n_empleado+'*'+num_sigtic +'*'+num_invntraio +'*'+marca_cpu +'*'+serie_cpu +'*'+memoria_ram +'*'+procesador +'*'+velocidad_proc +'*'+uni_disc_flax +'*'+disco_duro +'*'+serie_teclado +'*'+serie_monitor +'*'+version_windows +'*'+version_office +'*'+serie_mouse +'*'+direccion_ip +'*'+nombre_equipo +'*'+servicio_internet +'*'+tipo_equipo +'*'+ubicacion;


       if(n_empleado  == '' || num_sigtic == '0' || num_invntraio == '0' || marca_cpu == '0' || serie_cpu == '0' || memoria_ram == '0' || procesador == '0' || velocidad_proc == '0' || uni_disc_flax == '0' || disco_duro == '0' || serie_teclado == '0' || serie_monitor == '0' || version_windows == '0' || version_office == '0' || serie_mouse == '0' || direccion_ip == '0' || nombre_equipo == '0' || servicio_internet == '0' || tipo_equipo == '0' || ubicacion == '0' ){
            $("#empty").toggle("toggled");
            setTimeout(function(){
            $('#empty').toggle('toggled');
                },4000);                    
            return;
    }else{
               $.ajax({
                    url:'../../php/agrEqpo.php',
                    type:'POST',
                    data: 'n_empleado='+n_empleado+'&asignado='+asignado+'&num_sigtic='+num_sigtic+'&num_invntraio='+num_invntraio+'&marca_cpu='+marca_cpu+'&serie_cpu='+serie_cpu+'&memoria_ram='+memoria_ram+'&procesador='+procesador+'&velocidad_proc='+velocidad_proc+'&uni_disc_flax='+uni_disc_flax+'&disco_duro='+disco_duro+'&serie_teclado='+serie_teclado+'&serie_monitor='+serie_monitor+'&version_windows='+version_windows+'&version_office='+version_office+'&serie_mouse='+serie_mouse+'&direccion_ip='+direccion_ip+'&nombre_equipo='+nombre_equipo+'&servicio_internet='+servicio_internet+'&tipo_equipo='+tipo_equipo+'&ubicacion='+ubicacion+'&opcion=agreqpo'
                }).done(function(respuesta){
                console.log(respuesta);
                if(respuesta==0){
                $("#success").toggle("toggled");
                setTimeout(function(){
                $("#success").toggle("toggled");
                     },4000);
                }else if(respuesta==1){
                    $("#danger").toggle("toggled");
                    setTimeout(function(){
                    $("#danger").toggle("toggled");
                },4000);
            }
        });
    }

}


function eqpoedit(id){
	$.ajax({
url:'../../php/equipo_listar.php',
type:'POST'
}).done(function(resp){
    obj = JSON.parse(resp);
    var res = obj.data;  

        for(i=0; i<res.length;i++){
        
        if(obj.data[i].id_equipo==id){


        $("#Edteqpo #n_emp").val(obj.data[i].n_emp);
        //$("#Edteqpo #asign").val(obj.data[i].proceso);
        $("#Edteqpo #idequipo").val(obj.data[i].id_equipo);
        $("#Edteqpo #enum_sigtic").val(obj.data[i].num_sigtic);
        $("#Edteqpo #enum_invntraio").val(obj.data[i].num_invntraio);
        $("#Edteqpo #emarca_cpu").val(obj.data[i].marca_cpu);
        $("#Edteqpo #eserie_cpu").val(obj.data[i].serie_cpu);
        $("#Edteqpo #ememoria_ram").val(obj.data[i].memoria_ram);
        $("#Edteqpo #eprocesador").val(obj.data[i].procesador);
        $("#Edteqpo #evelocidad_proc").val(obj.data[i].velocidad_proc);
        $("#Edteqpo #euni_disc_flax").val(obj.data[i].uni_disc_flax);
        $("#Edteqpo #edisco_duro").val(obj.data[i].disco_duro);
        $("#Edteqpo #eserie_teclado").val(obj.data[i].serie_teclado);
        $("#Edteqpo #eserie_monitor").val(obj.data[i].serie_monitor);
        $("#Edteqpo #eversion_windows").val(obj.data[i].version_windows);
        $("#Edteqpo #eversion_office").val(obj.data[i].version_office);
        $("#Edteqpo #eserie_mouse").val(obj.data[i].serie_mouse);
        $("#Edteqpo #edireccion_ip").val(obj.data[i].direccion_ip);
        $("#Edteqpo #enombre_equipo").val(obj.data[i].nombre_equipo);
        $("#Edteqpo #eservicio_internet").val(obj.data[i].servicio_internet);
        $("#Edteqpo #etipo_equipo").val(obj.data[i].tipo_equipo);
        $("#Edteqpo #eubicaeqpo").val(obj.data[i].ubicacion);

           }
        }
    })
}

$(document).ready(function() {
    $("input[type=radio]").click(function(event){
        var valor = $(event.target).val();
        if(valor =="true"){
            $("#usuario1").hide();
            $("#usuario2").show();
          $("#Edteqpo #cambio").val('SI'); 
        } else if (valor == "false") {
            $("#usuario1").show();
            $("#usuario2").hide();
            $("#Edteqpo #cambio").val('NO'); 
         } 
    });
}); 

function edtEqpo(){

 var n_empleado = document.getElementById('n_empleado').value;

var id_equipo = document.getElementById('idequipo').value;
var num_sigtic = document.getElementById('enum_sigtic').value;
var num_invntraio = document.getElementById('enum_invntraio').value;
var marca_cpu = document.getElementById('emarca_cpu').value;
var serie_cpu = document.getElementById('eserie_cpu').value;
var memoria_ram = document.getElementById('ememoria_ram').value;
var procesador = document.getElementById('eprocesador').value;
var velocidad_proc = document.getElementById('evelocidad_proc').value;
var uni_disc_flax = document.getElementById('euni_disc_flax').value;
var disco_duro = document.getElementById('edisco_duro').value;
var serie_teclado = document.getElementById('eserie_teclado').value;
var serie_monitor = document.getElementById('eserie_monitor').value;
var version_windows = document.getElementById('eversion_windows').value;
var version_office = document.getElementById('eversion_office').value;
var serie_mouse = document.getElementById('eserie_mouse').value;
var direccion_ip = document.getElementById('edireccion_ip').value;
var nombre_equipo = document.getElementById('enombre_equipo').value;
var servicio_internet = document.getElementById('eservicio_internet').value;
var tipo_equipo = document.getElementById('etipo_equipo').value;
var ubicacion = document.getElementById('eubicaeqpo').value;
var cambio = document.getElementById('cambio').value;

if(n_empleado == 0){var asignado = 'designado';}else{var asignado = 'asignado';}

datos = 'n_empleado='+n_empleado+'&cambio='+cambio+'&asignado='+asignado+'&id_equipo='+id_equipo+'&num_sigtic='+num_sigtic+'&num_invntraio='+num_invntraio+'&marca_cpu='+marca_cpu+'&serie_cpu='+serie_cpu+'&memoria_ram='+memoria_ram+'&procesador='+procesador+'&velocidad_proc='+velocidad_proc+'&uni_disc_flax='+uni_disc_flax+'&disco_duro='+disco_duro+'&serie_teclado='+serie_teclado+'&serie_monitor='+serie_monitor+'&version_windows='+version_windows+'&version_office='+version_office+'&serie_mouse='+serie_mouse+'&direccion_ip='+direccion_ip+'&nombre_equipo='+nombre_equipo+'&servicio_internet='+servicio_internet+'&tipo_equipo='+tipo_equipo+'&ubicacion='+ubicacion+'&opcion=actualizar';

       if(n_empleado=='x' || asignado=='' || id_equipo == '0' || num_sigtic == '0' || num_invntraio == '0' || marca_cpu == '0' || serie_cpu == '0' || memoria_ram == '0' || procesador == '0' || velocidad_proc == '0' || uni_disc_flax == '0' || disco_duro == '0' || serie_teclado == '0' || serie_monitor == '0' || version_windows == '0' || version_office == '0' || serie_mouse == '0' || direccion_ip == '0' || nombre_equipo == '0' || servicio_internet == '0' || tipo_equipo == '0' || ubicacion == '0' ){
            $("#empty1").toggle("toggled");
            setTimeout(function(){
            $('#empty1').toggle('toggled');
                },4000);                    
            return;
    }else{
               $.ajax({
                    url:'../../php/agrEqpo.php',
                    type:'POST',
                    data: datos
                }).done(function(respuesta){
                console.log(respuesta);
                if(respuesta==0){
                $("#success1").toggle("toggled");
                setTimeout(function(){
                $("#success1").toggle("toggled");
                     },4000);
                }else if(respuesta==1){
                    $("#danger1").toggle("toggled");
                    setTimeout(function(){
                    $("#danger1").toggle("toggled");
                },4000);
            }
        });
    }

}

function eliminar(ideqpo){
    var ideqpo = $("#EqpoEliminar #ideqpo").val(ideqpo);
}
function eliminareqpo(){

//	$("#eliminar-area").on("click", function(){
		var ideqpo = $("#EqpoEliminar #ideqpo").val(),
				opcion = $("#EqpoEliminar #opcion").val();

		$.ajax({
			method: "POST",
			url: "../../php/agrEqpo.php",
		data: {"ideqpo":ideqpo,"opcion":opcion}
		}).done(function(respuesta){
			console.log(respuesta);
			var json_respuesta = JSON.parse(respuesta);
            setTimeout('location.reload()',2200);
			mostrar_mensaje(json_respuesta);
			limpiar_datos();
		});
//	});
}
var mostrar_mensaje = function( informacion ){
var texto = "", color = "";
if( informacion.respuesta == "BIEN" ){
texto = "El equipo de computo se eliminó correctamente.";
color = 'red';
}else if( informacion.respuesta == "ERROR"){
texto = "<strong>Error</strong>, No se eliminó equipo de computo.";
color = "#C9302C";
}
$(".mensaje").html( texto ).css({"color": color });
$('.mensaje').fadeIn('slow');
setTimeout(function(){
$(this).html("");
$('.mensaje').fadeOut('slow');
},1800);

}