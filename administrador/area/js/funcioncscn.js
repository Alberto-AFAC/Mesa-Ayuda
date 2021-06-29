 function agregar_cscn(){   

    var rdatos_centro = document.getElementById("rdatos_centro").value;
    var rtipo_cscn = document.getElementById("rtipo_cscn").value;
    var rfrecuenciae = document.getElementById("rfrecuenciae").value;
    var rmmsi = document.getElementById("rmmsi").value;
    var rhorarioc = document.getElementById("rhorarioc").value;
    var rdeteccion = document.getElementById("rdeteccion").value;
    var rmonitoreo = document.getElementById("rmonitoreo").value;
    var rcomunicaciones = document.getElementById("rcomunicaciones").value;
    var rcctv = document.getElementById("rcctv").value;
    var rmeteorologico = document.getElementById("rmeteorologico").value;
    var robserv = document.getElementById("robserv").value;
    var idip = document.getElementById("id_ip").value;

//if(numero == ''|| estado == ''|| puerto == ''|| instalacion_portuaria == ''|| director_general == ''|| correo_dg == ''|| celular == ''|| opip_nombre == ''|| tel_extension == ''|| correo_opip == ''|| celular_24hrs == ''|| escuela_nautica == ''|| profesion == ''|| exp_cert == ''|| vig_cert == '')
if(idip == '0' || rdatos_centro == ''){

    $("#vacio").slideDown("slow");
    setTimeout(function(){
    $("#vacio").slideUp("slow");
    },3000); 
    return;
    
    }else{

    var datos_centro = $("#rdatos_centro").val();
    var tipo_cscn = $("#rtipo_cscn").val();
    var frecuenciae = $("#rfrecuenciae").val();
    var mmsi = $("#rmmsi").val();
    var horarioc = $("#rhorarioc").val();
    var deteccion = $("#rdeteccion").val();
    var monitoreo = $("#rmonitoreo").val();
    var comunicaciones = $("#rcomunicaciones").val();
    var cctv = $("#rcctv").val();
    var meteorologico = $("#rmeteorologico").val();
    var observ = $("#robserv").val();
    var idip = $("#id_ip").val();
    
    $.ajax({
        url:'../php/registrar_cscn.php',
        type:'POST', 
        data:'datos_centro='+datos_centro+'&tipo_cscn='+tipo_cscn+'&frecuenciae='+frecuenciae+'&mmsi='+mmsi+'&horarioc='+horarioc+'&deteccion='+deteccion+'&monitoreo='+monitoreo+'&comunicaciones='+comunicaciones+'&cctv='+cctv+'&meteorologico='+meteorologico+'&observ='+observ+'&idip='+idip+'&opcion=agregar'
        }).done(function (respuesta){
            console.log(respuesta);
        if(respuesta == 0){

                //$('#demo').load('../html/datas.html');

                $("#exito").slideDown("slow");
                setTimeout(function(){
                $("#exito").slideUp("slow");
                },5000);
                }else{
                $("#danger").slideDown("slow");
                setTimeout(function(){
                $("#danger").slideUp("slow");
                },3000);
            }
        });    
 
    }
 }

function editar_cscn(){
    var form = $("#EditarCscn").serialize();
//    console.log(form);
    $.ajax({
        url:"../php/registrar_cscn.php",
        type:'POST',
        data:form+'&opcion=editarcscn'
    }).done(function(respuesta){
            console.log(respuesta);
        if(respuesta==0){ 
               $('#democscn').load('../html/cscn.html');        
            
                $('#echo').slideDown('slow');
                setTimeout(function(){
                $('#echo').slideUp('slow');
                },3000);
        }else if(respuesta==2){

                $('#falla').slideDown('slow');
                    setTimeout(function(){
                        $('#falla').slideUp('slow');
                    },3000);
            }
    });
}


function agregar_radarista(){
        var id_cc = document.getElementById("id_cc").value;
        var id_opr = document.getElementById("roperadoresr").value;

console.log(id_cc);
console.log(id_opr);

if(id_cc == '0' || id_opr == '0'){

$("#cero").slideDown("slow");
        setTimeout(function(){
        $("#cero").slideUp("slow");
        },3000); 
                return;
}else{

    var id_cc = $("#id_cc").val();
    var id_opr = $("#roperadoresr").val();

    $.ajax({
        url:'../php/registrar_cscn.php',
        type:'POST',
        data:'id_cc='+id_cc+'&id_opr='+id_opr+'&opcion=asignar'
        }).done(function (respuesta){
            console.log(respuesta);
        if(respuesta == 0){

                $("#echo").slideDown("slow");
                setTimeout(function(){
                $("#echo").slideUp("slow");
                },3000);
                }else{
                $("#falla").slideDown("slow");
                setTimeout(function(){
                $("#falla").slideUp("slow");
                },3000);
            }
        });    

    }

  }

function eliminarDatos(id_cc){

    cadena="id_cc=" + id_cc;

        $.ajax({
            type:"POST",
            url:"../php/registrar_cscn.php",
            data:cadena+"&opcion=eliminar"
            }).done(function(respuesta){
                if(respuesta==1){
                   $('#democscn').load('../html/cscn.html');    
                    alertify.success("Eliminado con exito!");
                }else{
                    alertify.error("Fallo el servidor :(");
                }
        });
}


     function cuadro1() {
            $("#cuadro2").hide("slow");
            $("#cuadro1").slideDown("slow");
        }
   
     function cuadro2() {
        $("#cuadro1").hide("slow");
        $("#cuadro2").slideDown("slow");
        }
