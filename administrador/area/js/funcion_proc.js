function agregaregistro(){   

    var id_ip = document.getElementById("rid_ip").value;
    var epip = document.getElementById("repip").value;
    var ppip = document.getElementById("rppip").value;
    var aud_cert = document.getElementById("raud_cert").value;
    var dcip_exp = document.getElementById("rdcip_exp").value;
    var dcip_vig = document.getElementById("rdcip_vig").value;
    var holograma = document.getElementById("rholograma").value;
    var auditoria1 = document.getElementById("rauditoria1").value;
    var resellado1 = document.getElementById("rresellado1").value;
    var auditoria2 = document.getElementById("rauditoria2").value;
    var resellado2 = document.getElementById("rresellado2").value;
    var auditoria3 = document.getElementById("rauditoria3").value;
    var resellado3 = document.getElementById("rresellado3").value;
    var auditoria4 = document.getElementById("rauditoria4").value;
    var resellado4 = document.getElementById("rresellado4").value;
    var activo_historico = document.getElementById("ractivo_historico").value;
    var tipo = document.getElementById("rtipo").value;
    var observ = document.getElementById("robserv").value;

   
if(id_ip == '0' || epip == '')
{

$("#vacio").slideDown("slow");
        setTimeout(function(){
        $("#vacio").slideUp("slow");
        },2000); 
                return;
}else{

    var id_ip = $("#rid_ip").val();
    var epip = $("#repip").val();
    var ppip = $("#rppip").val();
    var aud_cert = $("#raud_cert").val();
    var re_ac = $("#rre_ac").val();
    var dcip_exp = $("#rdcip_exp").val();
    var dcip_vig = $("#rdcip_vig").val();
    var holograma = $("#rholograma").val();
    var auditoria1 = $("#rauditoria1").val();
    var resellado1 = $("#rresellado1").val();
    var auditoria2 = $("#rauditoria2").val();
    var resellado2 = $("#rresellado2").val();
    var auditoria3 = $("#rauditoria3").val();
    var resellado3 = $("#rresellado3").val();
    var auditoria4 = $("#rauditoria4").val();
    var resellado4 = $("#rresellado4").val();
    var activo_historico = $("#ractivo_historico").val();
    var tipo = $("#rtipo").val();
    var observ = $("#robserv").val();
    
    $.ajax({
        url:'../php/registrar_procesos.php',
        type:'POST',
        data:'id_ip='+id_ip+'&epip='+epip+'&ppip='+ppip+'&aud_cert='+aud_cert+'&re_ac='+re_ac+'&dcip_exp='+dcip_exp+'&dcip_vig='+dcip_vig+'&holograma='+holograma+'&auditoria1='+auditoria1+'&resellado1='+resellado1+'&auditoria2='+auditoria2+'&resellado2='+resellado2+'&auditoria3='+auditoria3+'&resellado3='+resellado3+'&auditoria4='+auditoria4+'&resellado4='+resellado4+'&activo_historico='+activo_historico+'&tipo='+tipo+'&observ='+observ+'&opcion=agregar'
        }).done(function (respuesta){
            console.log(respuesta);
        if(respuesta == 0){

                $('#demo').load('../html/inst_proc.html');

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
   /* }else{

        $("#fecha1").slideDown("slow");
        $("#fecha2").slideDown("slow");
        setTimeout(function(){
           $("#fecha1").slideUp("slow");
           $("#fecha2").slideUp("slow");
        },4000);
        return;
        }*/
    }
 }


function edita_registros(){
    var form = $("#EditarReg").serialize();
    $.ajax({
        url:"../php/registrar_procesos.php",
        type:'POST',
        data:form+'&opcion=editar'
    }).done(function(respuesta){
//           alert(respuesta);
        if(respuesta==0){ 
                $('#demo').load('../html/inst_proc.html');                    
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

function eliminarDatos(id_proce){

    cadena="id=" + id_proce;

        $.ajax({
            type:"POST",
            url:"../php/registrar_procesos.php",
            data:cadena+"&opcion=eliminar"
            }).done(function(respuesta){
                if(respuesta==1){
                    $('#demo').load('../html/inst_proc.html');
                    alertify.success("Eliminado con exito!");
                }else{
                    alertify.error("Fallo el servidor :(");
                }
        });
}
