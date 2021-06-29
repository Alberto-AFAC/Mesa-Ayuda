
function Editar(id){
 var id;
$.ajax({
    url:'../php/opip.php',
    type:'POST',    
}).done(function(resp){

obj = JSON.parse(resp);
var res = obj.data; 

    for(i=0;i<res.length;i++){
        var idt = obj.data[i].id;

        if(id==idt){        

        var ido = $("#modalEdicion #ido").val(obj.data[i].id);
        var opip_nombre = obj.data[i].opip_nombre;
        document.getElementById("opip_nombre").innerHTML = ""+opip_nombre;
        var observ = $("#modalEdicion #observ").val(obj.data[i].observ);
          }  
        }
    });
}

function editar_observacion(){
    var form = $("#EditarReg").serialize();
    $.ajax({
        url:"../php/registrar_ip.php",
        type:'POST',
        data:form+'&opcion=observaciones'
    }).done(function(respuesta){

    console.log(respuesta);
        if(respuesta==0){ 

                $('#echo').slideDown('slow');
                setTimeout(function(){
                $('#echo').slideUp('slow');
                },2000);
        }else if(respuesta==1){

                $('#falla').slideDown('slow');
                    setTimeout(function(){
                        $('#falla').slideUp('slow');
                    },2000);
            }
    });
}