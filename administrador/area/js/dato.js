  $.ajax({
        url:'../php/datos.php',
        type: 'POST'

    }).done(function(resp){  

obj = JSON.parse(resp);
var res = obj.data;  
var x = 1;
var hoy = new Date();
var fecha_actual = hoy.getFullYear()+'-'+(hoy.getMonth()+1)+'-'+hoy.getDate();
var f1 = new Date(hoy.getFullYear(),(hoy.getMonth()+1),hoy.getDate());

html = '<div id="example_wrapper" class="dataTables_wrapper form-inline dt-bootstrap"><div class="row"> <div class="col-sm-12"><table id="example" class="table table-striped table-bordered dataTable" style="width:100%" role="grid" aria-describedby="example_info"><thead><tr><th><i class="fa fa-sort-numeric-asc"></i></th><th><i></i>Titu./Supl.</th><th><i></i>OPIP</th><th><i></i>Correo Opip</th><th><i></i>Celular 24</th><th><i></i>Renovacion</th><th><i></i> Instalación Portuaria</th><th><i></i> Puerto</th><th><i></i>Acción</th></tr></thead><tbody>';

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

estado = obj.data[i].estado.charAt(0).toUpperCase() + obj.data[i].estado.slice(1).toLowerCase();

    if(obj.data[i].vig_cert == '0000-00-00'){
     html +="<tr class='danger'><td><input type='hidden' id='ids' value="+obj.data[i].id_ip+">"+obj.data[i].id_ip+"</td><td>"+obj.data[i].tipo+"</td><td>"+obj.data[i].opip_nombre+"</td><td>"+obj.data[i].correo_opip+"</td><td>"+obj.data[i].celular_24hrs+"</td><td>"+obj.data[i].vig_cert+"</td><td>"+obj.data[i].instalacion_portuaria+"</td><td>"+obj.data[i].puerto+', '+estado+"</td><td><div class='btn-group'><a class='Datos btn btn-default' href='#' data-toggle='modal' data-target='#modalEdicion' onclick='Datos("+'"'+obj.data[i].id_asi+'"'+")'><i class='glyphicon glyphicon-th-list'></i></a></div></td></tr>"; 
    }else if(f2 < f1){
     html +="<tr class='danger'><td><input type='hidden' id='ids' value="+obj.data[i].id_ip+">"+obj.data[i].id_ip+"</td><td>"+obj.data[i].tipo+"</td><td>"+obj.data[i].opip_nombre+"</td><td>"+obj.data[i].correo_opip+"</td><td>"+obj.data[i].celular_24hrs+"</td><td>fecha vencida</td><td>"+obj.data[i].instalacion_portuaria+"</td><td>"+obj.data[i].puerto+', '+estado+"</td><td><div class='btn-group'><a class='Datos btn btn-default' href='#' data-toggle='modal' data-target='#modalEdicion' onclick='Datos("+'"'+obj.data[i].id_asi+'"'+")'><i class='glyphicon glyphicon-th-list'></i></a></div></td></tr>";     
}else{
 if(obj.data[i].id == "" || obj.data[i].estado == "" || obj.data[i].puerto == "" || obj.data[i].director_general == "" || obj.data[i].correo_dg == "" || obj.data[i].celular == "" || obj.data[i].opip_nombre == "" || obj.data[i].tel_extension == "" || obj.data[i].correo_opip == "" || obj.data[i].celular_24hrs == "" || obj.data[i].escuela_nautica == "" ||fecha_exp == "" || obj.data[i].profesion == "" || obj.data[i].exp_cert == '0000-00-00'){
 html +="<tr class='warning'><td><input type='hidden' id='ids' value="+obj.data[i].id_ip+">"+obj.data[i].id_ip+"</td><td>"+obj.data[i].tipo+"</td><td>"+obj.data[i].opip_nombre+"</td><td>"+obj.data[i].correo_opip+"</td><td>"+obj.data[i].celular_24hrs+"</td><td>faltan datos. faltan "+diferencia+" dias</td><td>"+obj.data[i].instalacion_portuaria+"</td><td>"+obj.data[i].puerto+', '+estado+"</td><td><div class='btn-group'><a class='Datos btn btn-default' href='#' data-toggle='modal' data-target='#modalEdicion' onclick='Datos("+'"'+obj.data[i].id_asi+'"'+")'><i class='glyphicon glyphicon-th-list'></i></a></div></td></tr>";
        }else{
     html +="<tr><td><input type='hidden' id='ids' value="+obj.data[i].id_ip+">"+obj.data[i].id_ip+"</td><td>"+obj.data[i].tipo+"</td><td>"+obj.data[i].opip_nombre+"</td><td>"+obj.data[i].correo_opip+"</td><td>"+obj.data[i].celular_24hrs+"</td><td> faltan "+diferencia+" dias</td><td>"+obj.data[i].instalacion_portuaria+"</td><td>"+obj.data[i].puerto+', '+estado+"</td><td><div class='btn-group'><a class='Datos btn btn-default' href='#' data-toggle='modal' data-target='#modalEdicion' onclick='Datos("+'"'+obj.data[i].id_asi+'"'+")'><i class='glyphicon glyphicon-th-list'></i></a></div></td></tr>";                            
            } 
          }        
        x++;
        }
  html +='</tbody></table></div></div></div>';

 $("#demo").html(html);  

    });   		

function reportePDF(){

  var id = $('#ids').val();

  console.log(id);

  window.open('../pdf/opip.php?id='+id+'');
}

function Datos(id_asi){

    var ida = id_asi;

$.ajax({
    url:'../php/datos.php',
    type:'POST',    
}).done(function(resp){

    var res = obj.data;

    for(i=0;i<res.length;i++){
        var idas = obj.data[i].id_asi;


        if(ida===idas){
        var idu = $("#modalEdicion #idu").val(obj.data[i].id);    
      //  var estado = $("#modalEdicion #estado").val(obj.data[i].estado);
        var puerto = $("#modalEdicion #puerto").val(obj.data[i].puerto+'. '+obj.data[i].estado);
        var instalacion_portuaria = $("#modalEdicion #instalacion_portuaria").val(obj.data[i].instalacion_portuaria);
        var director_general = $("#modalEdicion #director_general").val(obj.data[i].director_general);
        var correo_dg = $("#modalEdicion #correo_dg").val(obj.data[i].correo_dg);
        var celular = $("#modalEdicion #celular").val(obj.data[i].celular);
        var opip_nombre = $("#modalEdicion #opip_nombre").val(obj.data[i].opip_nombre);
        var tel_extension = $("#modalEdicion #tel_extension").val(obj.data[i].tel_extension);
        var correo_opip = $("#modalEdicion #correo_opip").val(obj.data[i].correo_opip);
        var celular_24hrs = $("#modalEdicion #celular_24hrs").val(obj.data[i].celular_24hrs);
        var escuela_nautica = $("#modalEdicion #escuela_nautica").val(obj.data[i].escuela_nautica);
        var profesion = $("#modalEdicion #profesion").val(obj.data[i].profesion);

        fexpd = obj.data[i].exp_cert.substring(8,10);
        fexpm = obj.data[i].exp_cert.substring(5,7);
        fexpy = obj.data[i].exp_cert.substring(0,4);
        fecha_exp = fexpd+'/'+fexpm+'/'+fexpy;
        fvigd = obj.data[i].vig_cert.substring(8,10);
        fvigm = obj.data[i].vig_cert.substring(5,7);
        fvigy = obj.data[i].vig_cert.substring(0,4);
        fecha_vig = fvigd+'/'+fvigm+'/'+fvigy;
        var exp_cert = $("#modalEdicion #exp_cert").val(fecha_exp);
        var vig_cert = $("#modalEdicion #vig_cert").val(fecha_vig);

        var hoy = new Date();
        var fecha_actual = hoy.getFullYear()+'-'+(hoy.getMonth()+1)+'-'+hoy.getDate();
        var f1 = new Date(hoy.getFullYear(),(hoy.getMonth()+1),hoy.getDate());
        var f2 = new Date(fvigy,fvigm,fvigd);
        fecha1 = moment(fecha_actual);
        fecha2 = moment(obj.data[i].vig_cert);
        diferencia = fecha2.diff(fecha1, 'days');            

        if(obj.data[i].vig_cert == '0000-00-00'){
            var diferencia = $("#modalEdicion #diferencia").val('falta anexar fecha de vigencia');
        }else if(f2 < f1){
            var diferencia = $("#modalEdicion #diferencia").val('fecha vencida');
        }else{
            var diferencia = $("#modalEdicion #diferencia").val('faltan'+' '+ diferencia+' '+' días');    
            }
        var tipo = $("#modalEdicion #tipo").val(obj.data[i].tipo);
        var observ = $("#modalEdicion #observ").val(obj.data[i].obs);   
           }
        }
    });
}

///vigentes

  $.ajax({
        url:'../php/datos.php',
        type: 'POST'

    }).done(function(resp){  

obj = JSON.parse(resp);
var res = obj.data;  
var xz = 1;
var hoy = new Date();
var fecha_actual = hoy.getFullYear()+'-'+(hoy.getMonth()+1)+'-'+hoy.getDate();
var f1 = new Date(hoy.getFullYear(),(hoy.getMonth()+1),hoy.getDate());

html = '<div id="example_wrapper" class="dataTables_wrapper form-inline dt-bootstrap"><div class="row"> <div class="col-sm-12"><table id="tabvigente" class="table table-striped table-bordered dataTable" style="width:100%" role="grid" aria-describedby="example_info"><thead><tr><th><i class="fa fa-sort-numeric-asc"></i></th><th><i></i>Titu./Supl.</th><th><i></i>OPIP</th><th><i></i>Correo Opip</th><th><i></i>Celular 24</th><th><i></i>Renovacion</th><th><i></i> Instalación Portuaria</th><th><i></i> Puerto</th><th><i></i>Acción</th></tr></thead><tbody>';

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

      if(f2 < f1){
}else{
 if(obj.data[i].id == "" || obj.data[i].estado == "" || obj.data[i].puerto+'. '+obj.data[i].estado == "" || obj.data[i].instalacion_portuaria == "" || obj.data[i].director_general == "" || obj.data[i].correo_dg == "" || obj.data[i].celular == "" || obj.data[i].opip_nombre == "" || obj.data[i].tel_extension == "" || obj.data[i].correo_opip == "" || obj.data[i].celular_24hrs == "" || obj.data[i].escuela_nautica == "" ||fecha_exp == "" || obj.data[i].profesion == "" || obj.data[i].exp_cert == '0000-00-00'){
 html +="<tr class='warning'><td>"+obj.data[i].id_ip+"</td><td>"+obj.data[i].tipo+"</td><td>"+obj.data[i].opip_nombre+"</td><td>"+obj.data[i].correo_opip+"</td><td>"+obj.data[i].celular_24hrs+"</td><td>faltan datos. faltan "+diferencia+" dias</td><td>"+obj.data[i].instalacion_portuaria+"</td><td>"+obj.data[i].puerto+', '+estado+"</td><td><div class='btn-group'><a class='Datos btn btn-default' href='#' data-toggle='modal' data-target='#modalEdicion' onclick='Datos("+'"'+obj.data[i].id_asi+'"'+")'><i class='glyphicon glyphicon-th-list'></i></a></div></td></tr>";
        }else{
     html +="<tr><td>"+obj.data[i].id_ip+"</td><td>"+obj.data[i].tipo+"</td><td>"+obj.data[i].opip_nombre+"</td><td>"+obj.data[i].correo_opip+"</td><td>"+obj.data[i].celular_24hrs+"</td><td> faltan "+diferencia+" dias</td><td>"+obj.data[i].instalacion_portuaria+"</td><td>"+obj.data[i].puerto+', '+estado+"</td><td><div class='btn-group'><a class='Datos btn btn-default' href='#' data-toggle='modal' data-target='#modalEdicion' onclick='Datos("+'"'+obj.data[i].id_asi+'"'+")'><i class='glyphicon glyphicon-th-list'></i></a></div></td></tr>";                            
            } 
          }        
      xz++;
        }
  html +='</tbody></table></div></div></div>';

 $("#vigente").html(html);  

    }); 

    ///vencidas
  $.ajax({
        url:'../php/datos.php',
        type: 'POST'

    }).done(function(resp){  

obj = JSON.parse(resp);
var res = obj.data;  
var zx = 1;
var hoy = new Date();
var fecha_actual = hoy.getFullYear()+'-'+(hoy.getMonth()+1)+'-'+hoy.getDate();
var f1 = new Date(hoy.getFullYear(),(hoy.getMonth()+1),hoy.getDate());

html = '<div id="example_wrapper" class="dataTables_wrapper form-inline dt-bootstrap"><div class="row"> <div class="col-sm-12"><table id="tabvencido" class="table table-striped table-bordered dataTable" style="width:100%" role="grid" aria-describedby="example_info"><thead><tr><th><i class="fa fa-sort-numeric-asc"></i></th><th><i></i>Titu./Supl.</th><th><i></i>OPIP</th><th><i></i>Correo Opip</th><th><i></i>Celular 24</th><th><i></i>Renovacion</th><th><i></i> Instalación Portuaria</th><th><i></i> Puerto</th><th><i></i>Acción</th></tr></thead><tbody>';

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

      if(fecha_agregada == '0000-00-00'){
     html +="<tr class='danger'><td>"+obj.data[i].id_ip+"</td><td>"+obj.data[i].tipo+"</td><td>"+obj.data[i].opip_nombre+"</td><td>"+obj.data[i].correo_opip+"</td><td>"+obj.data[i].celular_24hrs+"</td><td>"+fecha_vig+"</td><td>"+obj.data[i].instalacion_portuaria+"</td><td>"+obj.data[i].puerto+', '+estado+"</td><td><div class='btn-group'><a class='Datos btn btn-default' href='#' data-toggle='modal' data-target='#modalEdicion' onclick='Datos("+'"'+obj.data[i].id_asi+'"'+")'><i class='glyphicon glyphicon-th-list'></i></a></div></td></tr>";           
        }else if(f2<f1){
     html +="<tr class='danger'><td>"+obj.data[i].id_ip+"</td><td>"+obj.data[i].tipo+"</td><td>"+obj.data[i].opip_nombre+"</td><td>"+obj.data[i].correo_opip+"</td><td>"+obj.data[i].celular_24hrs+"</td><td>fecha vencida</td><td>"+obj.data[i].instalacion_portuaria+"</td><td>"+obj.data[i].puerto+', '+estado+"</td><td><div class='btn-group'><a class='Datos btn btn-default' href='#' data-toggle='modal' data-target='#modalEdicion' onclick='Datos("+'"'+obj.data[i].id_asi+'"'+")'><i class='glyphicon glyphicon-th-list'></i></a></div></td></tr>";           
        }
    zx++;
  }
  html +='</tbody></table></div></div></div>';

 $("#vencida").html(html);  

    });  
