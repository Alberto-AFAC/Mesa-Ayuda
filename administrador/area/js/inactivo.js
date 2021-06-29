function editar_registros(){
    var form = $("#EditarReg").serialize();
    $.ajax({
        url:"../php/registrar_datos.php",
        type:'POST',
        data:form+'&opcion=editaropip'
    }).done(function(respuesta){
          
        if(respuesta==0){ 

                $('#demoinact').load('../html/inactivo.html');        
            
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

function eliminarDatos(id){

    cadena="id=" + id;

        $.ajax({
            type:"POST",
            url:"../php/registrar_datos.php",
            data:cadena+"&opcion=eliminar"
            }).done(function(respuesta){
                if(respuesta==1){
                    $('#demoinact').load('../html/inactivo.html');
                    alertify.success("Eliminado con exito!");
                }else{
                    alertify.error("Fallo el servidor :(");
                }
        });
}
