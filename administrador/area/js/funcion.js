function agregar_usuario(){   

    var nombre = document.getElementById("renombre").value;
    var apellidop = document.getElementById("reapellidop").value;
    var apellidom = document.getElementById("reapellidom").value;
    var correo = document.getElementById("recorreo").value;
    var usuario = document.getElementById("reusuario").value;    
    var password = document.getElementById("repassword").value;
    var privilegios = document.getElementById("reprivilegios").value;


if(nombre == '' || apellidop == '' || apellidom == '' || correo == '' || usuario == '' || password == '' || privilegios == '')
{

        $("#vacio").slideDown("slow");
        setTimeout(function(){
        $("#vacio").slideUp("slow");
        },2000); 
                return;
}else{

    var nombre = $("#renombre").val();
    var apellidop = $("#reapellidop").val();
    var apellidom = $("#reapellidom").val();
    var correo = $("#recorreo").val();
    var usuario = $("#reusuario").val();    
    var password = $("#repassword").val();
    var privilegios = $("#reprivilegios").val();

    $.ajax({
        url:'../php/registrar_usuarios.php',
        type:'POST',
        data:'nombre='+nombre+'&apellidop='+apellidop+'&apellidom='+apellidom+'&correo='+correo+'&usuario='+usuario+'&password='+password+'&privilegios='+privilegios+'&opcion=agregar'
        }).done(function (respuesta){
            console.log(respuesta);
        if(respuesta == 0){

                $('#usuario').load('../usuarios.html');

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

function editar_usuario(){
    var form = $("#EditarUsu").serialize();
    $.ajax({
        url:"../php/registrar_usuarios.php",
        type:'POST',
        data:form+'&opcion=editar'
    }).done(function(respuesta){

    console.log(respuesta);
        if(respuesta==0){ 
                $('#usuario').load('../usuarios.html');        
            
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

function eliminarDatos(id_usuario){

    cadena="id=" + id_usuario;

        $.ajax({
            type:"POST",
            url:"../php/registrar_usuarios.php",
            data:cadena+"&opcion=eliminar"
            }).done(function(respuesta){
                if(respuesta==1){
                    $('#usuario').load('../usuarios.html');
                    alertify.success("Eliminado con exito!");
                }else{
                    alertify.error("Fallo el servidor :(");
                }
        });
}
