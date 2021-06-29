
function Detalle(id_opr){

    var id_opr;
console.log(id_opr);

$.ajax({
    url:'../php/operad.php',
    type:'POST',    
}).done(function(resp){

obj = JSON.parse(resp);
var rest = obj.data; 


    
    for(i=0;i<rest.length;i++){
        var idt = obj.data[i].id_opr;

        if(id_opr===idt){        

          var idip = $("#modalOpra #idopr").val(obj.data[i].id_opr);    
//          var estado = $("#modalOpra #estado").val();
          var nombre = $("#modalOpra #nombre").val(obj.data[i].nombre);
                    var telefono = $("#modalOpra #telefono").val(obj.data[i].telefono);
                              var correo = $("#modalOpra #correo").val(obj.data[i].correo);
                                        var categoria = $("#modalOpra #categoria").val(obj.data[i].categoria);
                                        var exp_cert = $("#modalOpra #exp_cert").val(obj.data[i].exp_cert);
                                                  var vig_cert = $("#modalOpra #vig_cert").val(obj.data[i].vig_cert);
                                                      var puesto = $("#modalOpra #puesto").val(obj.data[i].puesto);
                                                           var observ = $("#modalOpra #observ").val(obj.data[i].observ);
          
idrad = obj.data[i].cscn;

 $.ajax({
    url:'../php/uniodtres.php',
    type:'POST',    
}).done(function(resp){

obj = JSON.parse(resp);
var restt = obj.datas; 
  
  n = 1; 
      
html = '<table id="tcscn" class="table" style="width:100%; margin-top: -2em; " role="grid" aria-describedby="example_info">';
  
    for(i=0;i<restt.length;i++){

      if(idrad==obj.datas[i].id_cc && n==1){

html +="<thead><tr><th><i></i> Instalación portuaria </th><th><i></i>Puerto </th></tr></thead><tbody>";
html +="<tr><td>"+obj.datas[i].instalacion_portuaria+"</td><td>"+obj.datas[i].puerto.toUpperCase()+', '+obj.datas[i].estado+'.'+"</td></tr>";           
html +="<th colspan='2'><i></i>Dirección del centro de servicio de control a la navegación</th>";
html +="<tr><td colspan='2'>"+obj.datas[i].datos_centro+"</td></tr>";           

        n++;
        }
      }

  html +='</tbody></table>';

$("#cscnop").html(html);  


});
           }   
        }
    });
}

       


  $.ajax({
        url:'../php/operad.php',
        type: 'POST'

    }).done(function(resp){  

obj = JSON.parse(resp);
var res = obj.data;  

var x = 1;
var hoy = new Date();
var fecha_actual = hoy.getFullYear()+'-'+(hoy.getMonth()+1)+'-'+hoy.getDate();
var f1 = new Date(hoy.getFullYear(),(hoy.getMonth()+1),hoy.getDate());



html = '<div id="example_wrapper" class="dataTables_wrapper form-inline dt-bootstrap"><div class="row"> <div class="col-sm-12"><table id="troper" class="table table-striped table-bordered dataTable" style="width:100%" role="grid" aria-describedby="example_info"><thead><tr><th><i class="fa fa-sort-numeric-asc"></i></th><th><i></i> Nombre</th><th><i></i> Telefono</th><th><i></i> Correo</th><th><i></i> Categoria</th><th><i></i> Expedición de Certifícado</th><th><i></i> Vigencia de Certifícado</th><th><i></i> Estatus</th><th><i></i> Acción</th></tr></thead><tbody>';

     for(i=0; i<res.length;i++){




fexpd = obj.data[i].exp_cert.substring(8,10);
fexpm = obj.data[i].exp_cert.substring(5,7);
fexpy = obj.data[i].exp_cert.substring(0,4);

fecha_exp = fexpd+'/'+fexpm+'/'+fexpy;

fvigd = obj.data[i].vig_cert.substring(8,10);
fvigm = obj.data[i].vig_cert.substring(5,7);
fvigy = obj.data[i].vig_cert.substring(0,4);

fecha_vig = fvigd+'/'+fvigm+'/'+fvigy;

fecha_agregada = obj.data[i].vig_cert;

var f2 = new Date(fvigy,fvigm,fvigd);

fecha1 = moment(fecha_actual);
fecha2 = moment(fecha_agregada);
diferencia = fecha2.diff(fecha1, 'days');

  
  if(obj.data[i].cscn=='0'){

    if(obj.data[i].vig_cert == '0000-00-00'){

html +="<tr class='danger'><td>"+x+"</td> <td>"+obj.data[i].nombre+"</td><td>"+obj.data[i].telefono+"</td><td>"+obj.data[i].correo+"</td><td>"+obj.data[i].categoria+"</td><td>"+fecha_exp+"</td><td>"+fecha_vig+"</td><td>falta vigencia</td><td><div class='btn-group'><a class='Editar btn btn-default' href='#' data-toggle='modal' data-target='#modalOpra' onclick='Detalle("+'"'+obj.data[i].id_opr+'"'+")'><i class='glyphicon glyphicon-th-list'></i></a></div></td></tr>";  



    }else if(f2 < f1){

html +="<tr class='danger'><td>"+x+"</td> <td>"+obj.data[i].nombre+"</td><td>"+obj.data[i].telefono+"</td><td>"+obj.data[i].correo+"</td><td>"+obj.data[i].categoria+"</td><td>"+fecha_exp+"</td><td>"+fecha_vig+"</td><td>fecha vencida</td><td><div class='btn-group'><a class='Editar btn btn-default' href='#' data-toggle='modal' data-target='#modalOpra' onclick='Detalle("+'"'+obj.data[i].id_opr+'"'+")'><i class='glyphicon glyphicon-th-list'></i></a></div></td></tr>";  

}else{
 if(obj.data[i].id_opr == '' || obj.data[i].nombre == '' || obj.data[i].telefono == '' || obj.data[i].correo == '' || obj.data[i].exp_cert == '0000-00-00'){

html +="<tr class='warning'><td>"+x+"</td> <td>"+obj.data[i].nombre+"</td><td>"+obj.data[i].telefono+"</td><td>"+obj.data[i].correo+"</td><td>"+obj.data[i].categoria+"</td><td>"+fecha_exp+"</td><td>"+fecha_vig+"</td><td>faltan datos. faltan "+diferencia+" dias</td><td><div class='btn-group'><a class='Editar btn btn-default' href='#' data-toggle='modal' data-target='#modalOpra' onclick='Detalle("+'"'+obj.data[i].id_opr+'"'+")'><i class='glyphicon glyphicon-th-list'></i></a></div></td></tr>";  

        x++;

        }else{
html +="<tr><td>"+x+"</td> <td>"+obj.data[i].nombre+"</td><td>"+obj.data[i].telefono+"</td><td>"+obj.data[i].correo+"</td><td>"+obj.data[i].categoria+"</td><td>"+fecha_exp+"</td><td>"+fecha_vig+"</td><td>faltan "+diferencia+" dias</td><td><div class='btn-group'><a class='Editar btn btn-default' href='#' data-toggle='modal' data-target='#modalOpra' onclick='Detalle("+'"'+obj.data[i].id_opr+'"'+")'><i class='glyphicon glyphicon-th-list'></i></a></div></td></tr>";    

            } 
          }        
        }else{}

        }

  html +='</tbody></table></div></div></div>';

 $("#demoper").html(html);  

    });   