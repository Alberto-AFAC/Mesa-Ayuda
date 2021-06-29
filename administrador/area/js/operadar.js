function agregar_radarista(){   

    var nombre = document.getElementById("rnombre").value;
    var telefono = document.getElementById("rtelefono").value;
    var correo = document.getElementById("rcorreo").value;
    var categoria = document.getElementById("rcategoria").value;
    var exp_cert = document.getElementById("rexp_cert").value;
    var vig_cert = document.getElementById("rvig_cert").value;
    var puesto = document.getElementById("rpuesto").value;
    var observ = document.getElementById("robserv").value;

if(nombre == '')
{

$("#vacio").slideDown("slow");
        setTimeout(function(){
        $("#vacio").slideUp("slow");
        },3000); 
                return;
}else{


    var nombre = $("#rnombre").val();
    var telefono = $("#rtelefono").val();
    var correo = $("#rcorreo").val();
    var categoria = $("#rcategoria").val();
    var exp_cert = $("#rexp_cert").val();
    var vig_cert = $("#rvig_cert").val();
    var puesto = $("#rpuesto").val();
    var observ = $("#robserv").val();

var f_ini = new Date(exp_cert);
var f_fin = new Date(vig_cert);

console.log(f_ini);
console.log(f_fin);

 if(f_ini <= f_fin || f_ini == 'Invalid Date'){
    
    $.ajax({
        url:'../php/registrar_radaristas.php',
        type:'POST',
        data:'nombre='+nombre+'&telefono='+telefono+'&correo='+correo+'&categoria='+categoria+'&exp_cert='+exp_cert+'&vig_cert='+vig_cert+'&puesto='+puesto+'&observ='+observ+'&opcion=agregar'
        }).done(function (respuesta){
        if(respuesta == 0){

                $('#demorada').load('../html/operad.html');

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

function editar_radarista(){
    var form = $("#EditarOpra").serialize();
    console.log(form);
    $.ajax({
        url:"../php/registrar_radaristas.php",
        type:'POST',
        data:form+'&opcion=editar'
    }).done(function(respuesta){
                    console.log(respuesta);

        if(respuesta==0){ 

                $('#demorada').load('../html/operad.html');        
            
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


function eliminarRadarista(id_opr){

    cadena="id_opr=" + id_opr;

//    console.log(cadena);

        $.ajax({
            type:"POST",
            url:"../php/registrar_radaristas.php",
            data:cadena+"&opcion=eliminar"
            }).done(function(respuesta){
                if(respuesta==1){
                    $('#demorada').load('../html/operad.html');
                    alertify.success("Eliminado con exito!");
                }else{
                    alertify.error("Fallo el servidor :(");
                }
        });
}
