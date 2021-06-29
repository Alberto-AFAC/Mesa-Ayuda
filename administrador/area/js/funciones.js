function agregar_registro(){   

    var opip_nombre = document.getElementById("reopip_nombre").value;
//    var tel_extension = document.getElementById("retel_extension").value;
    var correo_opip = document.getElementById("recorreo_opip").value;
    var celular_24hrs = document.getElementById("recelular_24hrs").value;
    var escuela_nautica = document.getElementById("reescuela_nautica").value;
    var profesion = document.getElementById("reprofesion").value;
    var exp_cert = document.getElementById("reexp_cert").value;
    var vig_cert = document.getElementById("revig_cert").value;
    var observ = document.getElementById("reobserv").value;
//    var tipo = document.getElementById("retipo").value;
//    var idip = document.getElementById("idip").value;

//console.log(idip);
//if(numero == ''|| estado == ''|| puerto == ''|| instalacion_portuaria == ''|| director_general == ''|| correo_dg == ''|| celular == ''|| opip_nombre == ''|| tel_extension == ''|| correo_opip == ''|| celular_24hrs == ''|| escuela_nautica == ''|| profesion == ''|| exp_cert == ''|| vig_cert == '')
if(opip_nombre == '')
{

$("#vacio").slideDown("slow");
//   $("#cor").slideDown("slow");
  //      $("#cel").slideDown("slow");
    //        $("#vig").slideDown("slow");  
        setTimeout(function(){
        $("#vacio").slideUp("slow");
        },3000); 
                return;
}else{

    var opip_nombre = $("#reopip_nombre").val();
//    var tel_extension = $("#retel_extension").val();
    var correo_opip = $("#recorreo_opip").val();
    var celular_24hrs = $("#recelular_24hrs").val();
    var escuela_nautica = $("#reescuela_nautica").val();
    var profesion = $("#reprofesion").val();
    var exp_cert = $("#reexp_cert").val();
    var vig_cert = $("#revig_cert").val();
    var observ = $("#reobserv").val();
//    var tipo = $("#retipo").val();
//    var idip = $("#idip").val();

var f_ini = new Date(exp_cert);
var f_fin = new Date(vig_cert);

console.log(f_ini);
console.log(f_fin);

 if(f_ini <= f_fin || f_ini == 'Invalid Date'){
    
    $.ajax({
        url:'../php/registrar_datos.php',
        type:'POST',
        data:'opip_nombre='+opip_nombre+'&correo_opip='+correo_opip+'&celular_24hrs='+celular_24hrs+'&escuela_nautica='+escuela_nautica+'&profesion='+profesion+'&exp_cert='+exp_cert+'&vig_cert='+vig_cert+'&observ='+observ+'&opcion=agregar'
        }).done(function (respuesta){
//            console.log(respuesta);
        if(respuesta == 0){

                $('#demo').load('../html/datas.html');

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
    }else{

        $("#fecha1").slideDown("slow");
        $("#fecha2").slideDown("slow");
        setTimeout(function(){
           $("#fecha1").slideUp("slow");
           $("#fecha2").slideUp("slow");
        },4000);
        return;
        }
    }
 }

function agregar_opip(){
        var idi = document.getElementById("idi").value;
        var tipo = document.getElementById("tipo").value;
        var id_ip = document.getElementById("id_ip").value;
        var tel_extension = document.getElementById("tel_extension").value;

if(idi == '' || tipo == '' || id_ip == '' || tel_extension == ''){

$("#cero").slideDown("slow");
//   $("#cor").slideDown("slow");
  //      $("#cel").slideDown("slow");
    //        $("#vig").slideDown("slow");  
        setTimeout(function(){
        $("#cero").slideUp("slow");
        },3000); 
                return;
}else{


    var idi = $("#idi").val();
    var tipo = $("#tipo").val();
    var id_ip = $("#id_ip").val();

    $.ajax({
        url:'../php/registrar_datos.php',
        type:'POST',
        data:'idi='+idi+'&tipo='+tipo+'&id_ip='+id_ip+'&tel_extension='+tel_extension+'&opcion=asignar'
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
    

function editar_registros(){
    var form = $("#EditarReg").serialize();
//    console.log(form);
    $.ajax({
        url:"../php/registrar_datos.php",
        type:'POST',
        data:form+'&opcion=editar'
    }).done(function(respuesta){
        if(respuesta==0){ 

                $('#demo').load('../html/datas.html');        
            
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


function editar_asignar(){
    var form = $("#EdiAsignar").serialize();
    $.ajax({
        url:"../php/registrar_datos.php",
        type:'POST',
        data:form+'&opcion=asignaid'
    }).done(function(respuesta){
        console.log(respuesta);
        if(respuesta==0){ 

                $('#demo').load('../html/datas.html');        
            
                $('#echos').slideDown('slow');
                setTimeout(function(){
                $('#echos').slideUp('slow');
                },3000);
        }else if(respuesta==2){

                $('#fallas').slideDown('slow');
                    setTimeout(function(){
                        $('#fallas').slideUp('slow');
                    },3000);
            }
    });
}



function eliminarDatos(id){

    cadena="id=" + id;

        $.ajax({
            type:"POST",
            url:"../php/registrar_datos.php",
            data:cadena+"&opcion=eliminar"
            }).done(function(respuesta){
                if(respuesta==1){
                    $('#demo').load('../html/datas.html');
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
