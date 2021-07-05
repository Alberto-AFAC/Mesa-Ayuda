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

        detalles = obj.data[i].n_reporte+'*'+obj.data[i].nombre+'*'+obj.data[i].apellidos+'*'+obj.data[i].extension+'*'+obj.data[i].ubicacion+'*'+obj.data[i].servicio+'*'+obj.data[i].intervencion+'*'+obj.data[i].descripcion+'*'+obj.data[i].usu_observ+'*'+obj.data[i].falla_interna+'*'+Finicio+'*'+Finaliza+'*'+obj.data[i].falla_xterna+'*'+obj.data[i].observa+'*'+obj.data[i].evaluacion+'*'+obj.data[i].estado_rpt+'*'+obj.data[i].hinicio+'*'+obj.data[i].hfinal+'*'+obj.data[i].idequipo+'*'+obj.data[i].idtec;


   var d=detalles.split("*");

    $("#modalAtndr #n_reporte").val(d[0]);
    $("#modalAtndr #usuario").val(d[1]+' '+d[2]);
    $("#modalAtndr #extension").val(d[3]);
    $("#modalAtndr #ubicacion").val(d[4]);
    $("#modalAtndr #servicio").val(d[5]);
    $("#modalAtndr #intervencion").val(d[6]);
    $("#modalAtndr #descripcion").val(d[7]);
    $("#modalAtndr #usu_observ").val(d[8]);
    $("#modalAtndr #falla_interna").val(d[9]);
    $("#modalAtndr #finicio").val(d[10]+ ' a las '+d[16]+' hrs');   

    $("#modalAtndr #ffinal").val(d[11]);

    $("#modalAtndr #estado_rpt").val(d[15]);

    $("#modalAtndr #idequipo").val(d[18]);

//ID reporte para traer datos  
    consultaID(d[0]);

            }
        }
    })

}

function consultaID(id){

$.ajax({
url:'../php/conTecnico.php',
type:'POST'
}).done(function(resp){
    obj = JSON.parse(resp);
    var res = obj.data;  

        for(i=0; i<res.length;i++){
        
        if(obj.data[i].n_reporte==id){

        nombre = obj.data[i].n_reporte+'*'+obj.data[i].nombre+'*'+obj.data[i].apellidos+'*'+obj.data[i].extension;

   var d=nombre.split("*");


$("#modalAtndr #nomtec").val(d[1]+' '+d[2]);

            }
        }
    })
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