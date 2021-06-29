function agregaregistro(){   

    var estado = document.getElementById("restado").value;
    var puerto = document.getElementById("rpuerto").value;
    var instalacion_portuaria = document.getElementById("rinstalacion_portuaria").value;
    var director_general = document.getElementById("rdirector_general").value;
    var correo = document.getElementById("rcorreo").value;
    var celular = document.getElementById("rcelular").value;
    var direccion = document.getElementById("rdireccion").value;
    var gisis = document.getElementById("rgisis").value;
    var observ = document.getElementById("robserv").value;

//   console.log(correo);

if(instalacion_portuaria == '')
{

$("#vacio").slideDown("slow");
        setTimeout(function(){
        $("#vacio").slideUp("slow");
        },2000); 
                return;
}else{

    var estado = $("#restado").val();
    var puerto = $("#rpuerto").val();
    var instalacion_portuaria = $("#rinstalacion_portuaria").val();
    var director_general = $("#rdirector_general").val();
    var correo = $("#rcorreo").val();
    var celular = $("#rcelular").val();
    var direccion = $("#rdireccion").val();
    var gisis = $("#rgisis").val();
    var observ = $("#robserv").val();
    
    $.ajax({
        url:'../php/registrar_ip.php',
        type:'POST',
        data:'estado='+estado+'&puerto='+puerto+'&instalacion_portuaria='+instalacion_portuaria+'&director_general='+director_general+'&correo='+correo+'&celular='+celular+'&direccion='+direccion+'&gisis='+gisis+'&observ='+observ+'&opcion=agregar'     
        }).done(function (respuesta){
//            console.log(respuesta);
        if(respuesta == 0){

                $('#demoins').load('../html/instalap.html');

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


function edita_registros(){
    var form = $("#EditarReg").serialize();

    //console.log(form);

    $.ajax({
        url:"../php/registrar_ip.php",
        type:'POST',
        data:form+'&opcion=editar'
    }).done(function(respuesta){
        console.log(respuesta)
        if(respuesta==0){ 

                $('#demoins').load('../html/instalap.html');        
            
                $('#echo').slideDown('slow');
                setTimeout(function(){
                $('#echo').slideUp('slow');
                },2000);

        }else if(respuesta==2){

                $('#falla').slideDown('slow');
                    setTimeout(function(){
                        $('#falla').slideUp('slow');
                    },2000);
            }
    });
}

function eliminarDatos(id_ip){

    cadena="id=" + id_ip;

        $.ajax({
            type:"POST",
            url:"../php/registrar_ip.php",
            data:cadena+"&opcion=eliminar"
            }).done(function(respuesta){
                if(respuesta==1){
                    $('#demoins').load('../html/instalap.html');
                    alertify.success("Eliminado con exito!");
                }else{
                    alertify.error("Fallo el servidor :(");
                }
        });
}