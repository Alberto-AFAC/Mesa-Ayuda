  $.ajax({
        url:'../php/cscn.php',
        type: 'POST'

    }).done(function(resp){  

obj = JSON.parse(resp);
var res = obj.data;  

var x = 1;
var hoy = new Date();
var fecha_actual = hoy.getFullYear()+'-'+(hoy.getMonth()+1)+'-'+hoy.getDate();
var f1 = new Date(hoy.getFullYear(),(hoy.getMonth()+1),hoy.getDate());

html = '<div id="example_wrapper" class="dataTables_wrapper form-inline dt-bootstrap"><div class="row"> <div class="col-sm-12"><table id="tcscn" class="table table-striped table-bordered dataTable" style="width:100%" role="grid" aria-describedby="example_info"><thead><tr><th><i class="fa fa-sort-numeric-asc"></i></th><th><i></i>Datos de centro de control </th><th><i></i> Servicios que brinda el centro</th><th><i></i> Frecuencia de escucha</th><th><i></i> Monitoreo de la navegación</th><th><i></i> Puerto</th><th><i></i> Instalación Portuaria</th><th><i></i>Acción</th></tr></thead><tbody>';

     for(i=0; i<res.length;i++){


if(obj.data[i].datos_centro == '' || obj.data[i].tipo_cscn == '' || obj.data[i].frecuenciae == '' || obj.data[i].mmsi == '' || obj.data[i].horarioc == '' || obj.data[i].deteccion == '' || obj.data[i].monitoreo == '' || obj.data[i].comunicaciones == '' || obj.data[i].cctv == '' || obj.data[i].meteorologico == '')
{
   html +="<tr class='warning'><td>"+x+"</td> <td>"+obj.data[i].datos_centro+"</td><td>"+obj.data[i].tipo_cscn+"</td><td>"+obj.data[i].frecuenciae+"</td><td>"+obj.data[i].monitoreo+"</td><td>"+obj.data[i].puerto.toUpperCase()+', '+obj.data[i].estado+"</td><td>"+obj.data[i].instalacion_portuaria+"</td><td><div class='btn-group'><a class='Editar btn btn-warning' href='#' data-toggle='modal' data-target='#modalCscn' onclick='Editarip("+'"'+obj.data[i].id_cc+'"'+")'><i class='fa fa-pencil'></i></a><a href='#' class='btn btn-danger' onclick='preguntarSiNoIP("+'"'+obj.data[i].id_cc+'"'+")'><i class='fa fa-trash-o'></i></a></div></td></tr>";  
}else{
   html +="<tr><td>"+x+"</td> <td>"+obj.data[i].datos_centro+"</td><td>"+obj.data[i].tipo_cscn+"</td><td>"+obj.data[i].frecuenciae+"</td><td>"+obj.data[i].monitoreo+"</td><td>"+obj.data[i].puerto.toUpperCase()+', '+obj.data[i].estado+"</td><td>"+obj.data[i].instalacion_portuaria+"</td><td><div class='btn-group'><a class='Editar btn btn-warning' href='#' data-toggle='modal' data-target='#modalCscn' onclick='Editarip("+'"'+obj.data[i].id_cc+'"'+")'><i class='fa fa-pencil'></i></a><a href='#' class='btn btn-danger' onclick='preguntarSiNoIP("+'"'+obj.data[i].id_cc+'"'+")'><i class='fa fa-trash-o'></i></a></div></td></tr>";    
      }

        x++;
        }

  html +='</tbody></table></div></div></div>';

 $("#democscn").html(html);  

    });   


function Editarip(id_cc){

    var id_cc;

$.ajax({
    url:'../php/cscn.php',
    type:'POST',    
}).done(function(resp){

obj = JSON.parse(resp);
var rest = obj.data; 
    
    for(i=0;i<rest.length;i++){
        var idt = obj.data[i].id_cc;

        if(id_cc===idt){        

          var idip = $("#modalCscn #idcc").val(obj.data[i].id_cc);    
//          var estado = $("#modalCscn #estado").val();
          var puerto = $("#modalCscn #puerto").val(obj.data[i].puerto.toUpperCase()+' '+obj.data[i].estado+'.');
          var instalacion_portuaria = $("#modalCscn #instalacion_portuaria").val(obj.data[i].instalacion_portuaria.toUpperCase());
          
          var datos_centro = $("#modalCscn #datos_centro").val(obj.data[i].datos_centro);
          var nombre_titular = $("#modalCscn #nombre_titular").val(obj.data[i].nombre_titular);
          var tipo_cscn = $("#modalCscn #tipo_cscn").val(obj.data[i].tipo_cscn);
          var frecuenciae = $("#modalCscn #frecuenciae").val(obj.data[i].frecuenciae);
             
          var mmsi = $("#modalCscn #mmsi").val(obj.data[i].mmsi);  

          var horarioc = $("#modalCscn #horarioc").val(obj.data[i].horarioc);
          var deteccion = $("#modalCscn #deteccion").val(obj.data[i].deteccion);
          var monitoreo = $("#modalCscn #monitoreo").val(obj.data[i].monitoreo);
          var comunicaciones = $("#modalCscn #comunicaciones").val(obj.data[i].comunicaciones);
          var cctv = $("#modalCscn #cctv").val(obj.data[i].cctv);
          var meteorologico = $("#modalCscn #meteorologico").val(obj.data[i].meteorologico);
          var observ = $("#modalCscn #observ").val(obj.data[i].observ);
           rad = obj.data[i].id_cc;


    $.ajax({
    url:'../php/cscnopr.php',
    type:'POST',    
}).done(function(resp){


obj = JSON.parse(resp);
var restt = obj.datas; 
  
  n = 1; 
      
html = '<table id="tcscn" class="table" style="width:100%" role="grid" aria-describedby="example_info"><thead><tr><th><i class="fa fa-sort-numeric-asc"></i></th><th><i></i>Nombre </th><th><i></i>Telefono </th><th><i></i>Correo </th><th><i></i>Observaciones </th></tr></thead><tbody>';

    for(i=0;i<restt.length;i++){

      if(id_cc==obj.datas[i].cscn){
if(obj.datas[i].puesto=='Titular'){
   html +="<tr style='background:#f2f2f2;'><td>"+n+"</td><td>"+obj.datas[i].nombre+' (Titular)'+"</td><td>"+obj.datas[i].telefono+"</td><td>"+obj.datas[i].correo+"</td><td>"+obj.datas[i].observ+"</td></tr>";           
     }else{
   html +="<tr><td>"+n+"</td><td>"+obj.datas[i].nombre+"</td><td>"+obj.datas[i].telefono+"</td><td>"+obj.datas[i].correo+"</td><td>"+obj.datas[i].observ+"</td></tr>";           
     }
        n++;


        }
      }

  html +='</tbody></table>';

$("#operadores").html(html);  


});
           }
   
        }
    });
}

       
function preguntarSiNoIP(id_cc){
    console.log(id_cc);
$.ajax({
    url:'../php/cscn.php',
    type:'POST',    
}).done(function(resp){
    var res = obj.data;
    for(i=0;i<res.length;i++){
        var idt = obj.data[i].id_cc;
        if(id_cc===idt){

             alertify.confirm('Eliminar Datos', '¿Esta seguro de eliminar los datos de servicio de: '+ obj.data[i].instalacion_portuaria+'?', 
            function(){ eliminarDatos(id_cc) }
            , function(){ alertify.error('Se cancelo')});

            }
        }
    });
}


  $.ajax({
        url:'../php/cscn.php',
        type: 'POST'

    }).done(function(resp){  

obj = JSON.parse(resp);
var res = obj.data;  

var x = 1;
var hoy = new Date();
var fecha_actual = hoy.getFullYear()+'-'+(hoy.getMonth()+1)+'-'+hoy.getDate();
var f1 = new Date(hoy.getFullYear(),(hoy.getMonth()+1),hoy.getDate());

html = '<div id="example_wrapper" class="dataTables_wrapper form-inline dt-bootstrap"><div class="row"> <div class="col-sm-12"><table id="tcscndt" class="table table-striped table-bordered dataTable" style="width:100%" role="grid" aria-describedby="example_info"><thead><tr><th><i class="fa fa-sort-numeric-asc"></i></th><th><i></i>Datos de centro de control </th><th><i></i> Servicios que brinda el centro</th><th><i></i> Frecuencia de escucha</th><th><i></i> Monitoreo de la navegación</th><th><i></i> Puerto</th><th><i></i> Instalación Portuaria</th><th><i></i>Acción</th></tr></thead><tbody>';

     for(i=0; i<res.length;i++){


 servicioC =  obj.data[i].tipo_cscn.length;
 servicioT = obj.data[i].tipo_cscn.substring(0,108);

if(obj.data[i].datos_centro == '' || obj.data[i].tipo_cscn == '' || obj.data[i].frecuenciae == '' || obj.data[i].mmsi == '' || obj.data[i].horarioc == '' || obj.data[i].deteccion == '' || obj.data[i].monitoreo == '' || obj.data[i].comunicaciones == '' || obj.data[i].cctv == '' || obj.data[i].meteorologico == '')
{

   html +="<tr class='warning'><td>"+x+"</td> <td>"+obj.data[i].datos_centro+"</td><td>"+obj.data[i].tipo_cscn+"</td><td>"+obj.data[i].frecuenciae+"</td><td>"+obj.data[i].monitoreo+"</td><td>"+obj.data[i].puerto.toUpperCase()+', '+obj.data[i].estado+"</td><td>"+obj.data[i].instalacion_portuaria+"</td><td><div class='btn-group'><a class='Editar btn btn-default' href='#' data-toggle='modal' data-target='#modalCscn' onclick='Editarip("+'"'+obj.data[i].id_cc+'"'+")'><i class='glyphicon glyphicon-th-list'></i></a></div></td></tr>";  

}
else{

  if(servicioC>108){
   html +="<tr><td>"+x+"</td> <td>"+obj.data[i].datos_centro+"</td><td>"+servicioT+'...'+(' Continuar leyendo').fontcolor('#00a6ce')+"</td><td>"+obj.data[i].frecuenciae+"</td><td>"+obj.data[i].monitoreo+"</td><td>"+obj.data[i].puerto.toUpperCase()+', '+obj.data[i].estado+"</td><td>"+obj.data[i].instalacion_portuaria+"</td><td><div class='btn-group'><a class='Editar btn btn-default' href='#' data-toggle='modal' data-target='#modalCscn' onclick='Editarip("+'"'+obj.data[i].id_cc+'"'+")'><i class='glyphicon glyphicon-th-list'></i></a></div></td></tr>";    
  }else{
   html +="<tr><td>"+x+"</td> <td>"+obj.data[i].datos_centro+"</td><td>"+servicioT+"</td><td>"+obj.data[i].frecuenciae+"</td><td>"+obj.data[i].monitoreo+"</td><td>"+obj.data[i].puerto.toUpperCase()+', '+obj.data[i].estado+"</td><td>"+obj.data[i].instalacion_portuaria+"</td><td><div class='btn-group'><a class='Editar btn btn-default' href='#' data-toggle='modal' data-target='#modalCscn' onclick='Editarip("+'"'+obj.data[i].id_cc+'"'+")'><i class='glyphicon glyphicon-th-list'></i></a></div></td></tr>";    
  }    
      }

        x++;
        }

  html +='</tbody></table></div></div></div>';

 $("#democscndt").html(html);  

    });   