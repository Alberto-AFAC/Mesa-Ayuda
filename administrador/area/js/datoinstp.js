
  $.ajax({
        url:'../php/instalap.php',
        type: 'POST'

    }).done(function(resp){  

obj = JSON.parse(resp);
var res = obj.data;  

var x = 1;
var hoy = new Date();
var fecha_actual = hoy.getFullYear()+'-'+(hoy.getMonth()+1)+'-'+hoy.getDate();
var f1 = new Date(hoy.getFullYear(),(hoy.getMonth()+1),hoy.getDate());


html = '<div id="example_wrapper" class="dataTables_wrapper form-inline dt-bootstrap"><div class="row"> <div class="col-sm-12"><table id="instalap" class="table table-striped table-bordered dataTable" style="width:100%" role="grid" aria-describedby="example_info"><thead><tr><th><i class="fa fa-sort-numeric-asc"></i></th><th><i></i>Puerto</th><th><i></i>Instalación Portuaria</th><th><i></i> Director General</th><th><i></i> Celular</th><th><i></i> Correo</th><th><i></i>Acción</th></tr></thead><tbody>';

     for(i=0; i<res.length;i++){

estado = obj.data[i].estado.charAt(0).toUpperCase() + obj.data[i].estado.slice(1).toLowerCase();

if(obj.data[i].instalacion_portuaria == "" || obj.data[i].estado == "" || obj.data[i].puerto == "" || obj.data[i].observ == "" || obj.data[i].director_general == "" || obj.data[i].correo_dg == "" || obj.data[i].celular == "" || obj.data[i].direccion == "")
{
   html +="<tr class='warning'><td>"+x+"</td><td>"+obj.data[i].puerto+', '+estado+"</td><td>"+obj.data[i].instalacion_portuaria+"</td><td>"+obj.data[i].director_general+"</td><td>"+obj.data[i].celular+"</td><td>"+obj.data[i].correo_dg+"</td><td><div class='btn-group'><a class='Editar btn btn-warning' href='#' data-toggle='modal' data-target='#modalEdicion' onclick='Editarip("+'"'+obj.data[i].id_ip+'"'+")'><i class='fa fa-pencil'></i></a><a href='#' class='btn btn-danger' onclick='preguntarSiNoIP("+'"'+obj.data[i].id_ip+'"'+")'><i class='fa fa-trash-o'></i></a></div></td></tr>";  
}else{
   html +="<tr><td>"+x+"</td><td>"+obj.data[i].puerto+', '+estado+"</td><td>"+obj.data[i].instalacion_portuaria+"</td><td>"+obj.data[i].director_general+"</td><td>"+obj.data[i].celular+"</td><td>"+obj.data[i].correo_dg+"</td><td><div class='btn-group'><a class='Editar btn btn-warning' href='#' data-toggle='modal' data-target='#modalEdicion' onclick='Editarip("+'"'+obj.data[i].id_ip+'"'+")'><i class='fa fa-pencil'></i></a><a href='#' class='btn btn-danger' onclick='preguntarSiNoIP("+'"'+obj.data[i].id_ip+'"'+")'><i class='fa fa-trash-o'></i></a></div></td></tr>";    
      }

        x++;
        }

  html +='</tbody></table></div></div></div>';

 $("#demoins").html(html);  

    });   



function Editarip(id_ip){

    var id_ip;

$.ajax({
    url:'../php/instalap.php',
    type:'POST',    
}).done(function(resp){

    var res = obj.data;

    for(i=0;i<res.length;i++){
        var idt = obj.data[i].id_ip;
        if(id_ip===idt){        

          var idip = $("#modalEdicion #idip").val(obj.data[i].id_ip);    
          var estado = $("#modalEdicion #estado").val(obj.data[i].estado);
          var puerto = $("#modalEdicion #puerto").val(obj.data[i].puerto);
          var instalacion_portuaria = $("#modalEdicion #instalacion_portuaria").val(obj.data[i].instalacion_portuaria);
          var director_general = $("#modalEdicion #director_general").val(obj.data[i].director_general);
          var correo_dg = $("#modalEdicion #correo").val(obj.data[i].correo_dg);
          var celular = $("#modalEdicion #celular").val(obj.data[i].celular);
          var direccion = $("#modalEdicion #direccion").val(obj.data[i].direccion);
          var gisis = $("#modalEdicion #gisis").val(obj.data[i].gisis);        
          var observ = $("#modalEdicion #observ").val(obj.data[i].observ);

           }

   
        }
    });
}

function preguntarSiNoIP(id_ip){
    console.log(id_ip);
$.ajax({
    url:'../php/instalap.php',
    type:'POST',    
}).done(function(resp){
    var res = obj.data;
    for(i=0;i<res.length;i++){
        var idt = obj.data[i].id_ip;
        if(id_ip===idt){

             alertify.confirm('Eliminar Datos', '¿Esta seguro de eliminar la instalación: '+ obj.data[i].instalacion_portuaria+'?', 
            function(){ eliminarDatos(id_ip) }
            , function(){ alertify.error('Se cancelo')});

            }
        }
    });
}