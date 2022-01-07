//ACTUALIZAR CONTRASEÑA SOLO ADMINISTRADOR
    function actualizar() {

        var id_usuario = $('#id_usuario').val();
        var usuario = $('#usuario').val();
        var password = $('#password').val();
        var pass = $('#pass').val();
        var pass2 = $('#pass2').val();

        datos = 'usuario=' + usuario + '&password=' + password + '&pass=' + pass + '&pass2=' + pass2 + '&id_usuario=' + id_usuario + '&opcion=modificar'

        $.ajax({
            url: '../conexion/actualizar.php',
            type: 'POST',
            data: datos
        }).done(function(respuesta) {
            console.log(respuesta);
            if (respuesta == 7) {
                $('#echo').toggle('toggle');
                setTimeout(function() {
                    $('#echo').toggle('toggle');
                }, 2000);
            } else if (respuesta == 2) {
                $('#invalida').toggle('toggle');
                setTimeout(function() {
                    $('#invalida').toggle('toggle');
                }, 2000);
            } else if (respuesta == 3) {
                $('#falso').toggle('toggle');
                setTimeout(function() {
                    $('#falso').toggle('toggle');
                }, 2000);
            } else if (respuesta == 4) {
                $('#vacio').toggle('toggle');
                setTimeout(function() {
                    $('#vacio').toggle('toggle');
                }, 2000);
            } else if (respuesta == 1) {
                $('#error').toggle('toggle');
                setTimeout(function() {
                    $('#error').toggle('toggle');
                }, 2000);
            }
        });
    }

function atender(detalles){

$.ajax({
url:'../php/rptConsulta.php',
type:'POST'
}).done(function(resp){
    obj = JSON.parse(resp);
    var res = obj.data;  

        for(i=0; i<res.length;i++){
        
        if(obj.data[i].n_reporte==detalles){

        year = obj.data[i].finicio.substring(0,4);
        month = obj.data[i].finicio.substring(5,7);
        day = obj.data[i].finicio.substring(8,10);
        Finicio = day+'/'+month+'/'+year;
        
        year = obj.data[i].ffinal.substring(0,4);
        month = obj.data[i].ffinal.substring(5,7);
        day = obj.data[i].ffinal.substring(8,10);
        Finaliza = day+'/'+month+'/'+year;

        detalles = obj.data[i].n_reporte+'*'+obj.data[i].nombre+'*'+obj.data[i].apellidos+'*'+obj.data[i].extension+'*'+obj.data[i].ubicacion+'*'+obj.data[i].servicio+'*'+obj.data[i].intervencion+'*'+obj.data[i].descripcion+'*'+obj.data[i].usu_observ+'*'+obj.data[i].falla_interna+'*'+Finicio+'*'+Finaliza+'*'+obj.data[i].falla_xterna+'*'+obj.data[i].observa+'*'+obj.data[i].evaluacion+'*'+obj.data[i].estado_rpt+'*'+obj.data[i].hinicio+'*'+obj.data[i].hfinal+'*'+obj.data[i].idequipo+'*'+obj.data[i].idtec+'*'+obj.data[i].n_empleado+'*'+obj.data[i].solucion+'*'+obj.data[i].ultima+'*'+obj.data[i].final;


   var d=detalles.split("*");

    $("#modalAtndr #n_reporte").val(d[0]);
    // $("#modalAtndr #usuario").val(d[1]+' '+d[2]);
    // $("#modalAtndr #extension").val(d[3]);
    // $("#modalAtndr #ubicacion").val(d[4]);
    $("#modalAtndr #servicio").val(d[5]);
    $("#modalAtndr #intervencion").val(d[6]);
    $("#modalAtndr #descripcion").val(d[7]);
    $("#modalAtndr #usu_observ").val(d[8]);
    $("#modalAtndr #falla_interna").val(d[9]);
    $("#modalAtndr #finicio").val(d[10]+ ' / '+d[16]+' hrs');   

    $("#modalAtndr #ffinal").val(d[11]+ ' / '+d[17]+' hrs');

    $("#modalAtndr #estado_rpt").val(d[15]);

    $("#modalAtndr #idequipo").val(d[18]);

    if(d[21]=='x' ||d[21]==''){ $("#solucion").hide();}else{$("#solucion").show();$("#modalAtndr #solucion").val(d[21]);}

    if(d[22]=='x' ||d[22]==''){ $("#ultima").hide();}else{$("#ultima").show();$("#modalAtndr #ultima").val(d[22]);}

    if(d[23]=='x' ||d[21]==''){ $("#final").hide();}else{$("#final").show();$("#modalAtndr #final").val(d[23]);}



//ID reporte para traer datos  
   // consultaID(d[0]);

//personal

    nreport = d[0]+'*'+d[20];
    
    personal(nreport);


            }
        }
    })

}

function personal(nreport){

 var r=nreport.split("*");

    nrepor = r[0];
    nemple = r[1];

        $.ajax({
            url: '../php/conTecnico.php',
            type: 'POST',
            data: 'nrepor=' + nrepor 
        }).done(function(respuesta) {            
          obj = JSON.parse(respuesta);

         // alert(respuesta);
        // var res = obj.data;
        var res = obj.data;

        for (i = 0; i < res.length; i++) {

         //  alert('------>'+obj.data[i].gstNmpld );

        if(obj.data[i].gstNmpld == nemple) {

        usuario = obj.data[i].gstNombr+' '+obj.data[i].gstApell;
        ext = obj.data[i].gstExTel;
        $("#modalAtndr #gstNombr").val(usuario);
        $("#modalAtndr #gstExTel").val(ext);

        }else{

        tecnico = obj.data[i].gstNombr+' '+obj.data[i].gstApell;
        $("#modalAtndr #nomtec").val(tecnico);

                 }
             }
        });    
}



// ¿Requiere reasignar técnico?
$(document).ready(function() {
    $("input[type=radio]").click(function(event){
        var valor = $(event.target).val();
        if(valor =="SI"){
        $("#reasigar").show();
        $("#asignado").hide();
        $("#button").show();
        } else if (valor == "NO") {
        $("#reasigar").hide();
        $("#asignado").show();
        $("#button").hide();
        limpiarCam();
        } 
    });
});       

function tecReasignar(){

    var n_reporte = document.getElementById('n_reporte').value;
    var idtec = document.getElementById('idtec').value;
        
    data = 'n_reporte=' + n_reporte + '&idtec=' + idtec + '&opcion=asignar';

if(idtec==0){

        $('#aviso').toggle("toggled");
        setTimeout(function(){
        $('#aviso').toggle("toggled");
        },2000);                      

}else{

    $.ajax({
        url:"../php/asignar.php",
        type:'POST',
        data:data
        }).done(function(respuesta){

            console.log(respuesta);
            if(respuesta==0)
            {         
            $('#exito').toggle("toggled");
            setTimeout(function(){
            $('#exito').toggle("toggled");
            },1500);
            setTimeout('location.reload()',2000);
            }else if(respuesta==1){

            $('#error').toggle("toggled");
            setTimeout(function(){
            $('#error').toggle("toggled");
            },2000);
          }
      });
   }
}

function limpiarCam(){

    $("#idtec").val('0');
}