    //inacvig
    $.ajax({
        url:'../php/inactivo.php',
        type: 'POST'

    }).done(function(resp){  

obj = JSON.parse(resp);
var res = obj.data;  
var xw = 1;
var hoy = new Date();
var fecha_actual = hoy.getFullYear()+'-'+(hoy.getMonth()+1)+'-'+hoy.getDate();
var f1 = new Date(hoy.getFullYear(),(hoy.getMonth()+1),hoy.getDate());

html = '<div id="example_wrapper" class="dataTables_wrapper form-inline dt-bootstrap"><div class="row"> <div class="col-sm-12"><table id="tabinacvig" class="table table-striped table-bordered dataTable" style="width:100%" role="grid" aria-describedby="example_info"><thead><tr><th><i class="fa fa-sort-numeric-asc"></i></th><th><i></i>OPIP</th><th><i></i>Escuela Nautica</th><th><i></i>Profesión</th><th><i></i>Celular 24Hrs</th><th><i></i>Expedición</th><th><i></i>Vigencia</th><th><i></i>Renovacion</th><th><i></i>Acción</th></tr></thead><tbody>';

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
 if(obj.data[i].opip_nombre == "" || obj.data[i].celular_24hrs == "" || obj.data[i].escuela_nautica == "" || fecha_exp == "" || obj.data[i].profesion == "" || obj.data[i].exp_cert == '0000-00-00'){
 html +="<tr class='warning'><td>"+xw+"</td><td>"+obj.data[i].opip_nombre+"</td><td>"+obj.data[i].escuela_nautica+"</td><td>"+obj.data[i].profesion+"</td><td>"+obj.data[i].celular_24hrs+"</td><td>"+fecha_exp+"</td><td>"+fecha_vig+"</td><td>faltan datos. faltan "+diferencia+" dias</td><td><div class='btn-group'><a class='Datos btn btn-default' href='#' data-toggle='modal' data-target='#modalEdicion' onclick='Datas("+'"'+obj.data[i].id+'"'+")'><i class='glyphicon glyphicon-th-list'></i></a></div></td></tr>";
        }else{
     html +="<tr><td>"+xw+"</td><td>"+obj.data[i].opip_nombre+"</td><td>"+obj.data[i].escuela_nautica+"</td><td>"+obj.data[i].profesion+"</td><td>"+obj.data[i].celular_24hrs+"</td><td>"+fecha_exp+"</td><td>"+fecha_vig+"</td><td> faltan "+diferencia+" dias</td><td><div class='btn-group'><a class='Datos btn btn-default' href='#' data-toggle='modal' data-target='#modalEdicion' onclick='Datas("+'"'+obj.data[i].id+'"'+")'><i class='glyphicon glyphicon-th-list'></i></a></div></td></tr>";                            
            } 
          }        
      xw++;
    }
  html +='</tbody></table></div></div></div>';

 $("#inacvig").html(html);  

    }); 


    ///inacven
  $.ajax({
        url:'../php/inactivo.php',
        type: 'POST'

    }).done(function(resp){  

obj = JSON.parse(resp);
var res = obj.data;  
var wx = 1;
var hoy = new Date();
var fecha_actual = hoy.getFullYear()+'-'+(hoy.getMonth()+1)+'-'+hoy.getDate();
var f1 = new Date(hoy.getFullYear(),(hoy.getMonth()+1),hoy.getDate());

html = '<div id="example_wrapper" class="dataTables_wrapper form-inline dt-bootstrap"><div class="row"> <div class="col-sm-12"><table id="tabinacven" class="table table-striped table-bordered dataTable" style="width:100%" role="grid" aria-describedby="example_info"><thead><tr><th><i class="fa fa-sort-numeric-asc"></i></th><th><i></i>OPIP</th><th><i></i>Escuela Nautica</th><th><i></i>Profesión</th><th><i></i>Celular 24Hrs</th><th><i></i>Expedición</th><th><i></i>Vigencia</th><th><i></i>Renovacion</th><th><i></i>Acción</th></tr></thead><tbody>';

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

//  


diferencia = fecha2.diff(fecha1, 'days');

      if(fecha_agregada == '0000-00-00'){
     html +="<tr class='danger'><td>"+wx+"</td><td>"+obj.data[i].opip_nombre+"</td><td>"+obj.data[i].escuela_nautica+"</td><td>"+obj.data[i].profesion+"</td><td>"+obj.data[i].celular_24hrs+"</td><td>"+fecha_exp+"</td><td>"+fecha_vig+"</td><td></td><td><div class='btn-group'><a class='Datos btn btn-default' href='#' data-toggle='modal' data-target='#modalEdicion' onclick='Datas("+'"'+obj.data[i].id+'"'+")'><i class='glyphicon glyphicon-th-list'></i></a></div></td></tr>";
        }else if(f2<f1){
     html +="<tr class='danger'><td>"+wx+"</td><td>"+obj.data[i].opip_nombre+"</td><td>"+obj.data[i].escuela_nautica+"</td><td>"+obj.data[i].profesion+"</td><td>"+obj.data[i].celular_24hrs+"</td><td>"+fecha_exp+"</td><td>"+fecha_vig+"</td><td>fecha vencida</td><td><div class='btn-group'><a class='Datos btn btn-default' href='#' data-toggle='modal' data-target='#modalEdicion' onclick='Datas("+'"'+obj.data[i].id+'"'+")'><i class='glyphicon glyphicon-th-list'></i></a></div></td></tr>";
        }
    wx++;
  }
  html +='</tbody></table></div></div></div>';

 $("#inacven").html(html);  

    });  

    function Datas(id){

    var id;

  console.log(id);

$.ajax({
    url:'../php/inactivo.php',
    type:'POST',    
}).done(function(resp){

    var res = obj.data;

    for(i=0;i<res.length;i++){
        var idt = obj.data[i].id;

        if(id===idt){
        /*var idu = $("#modalEdicion #idu").val(obj.data[i].id);    
        var numero = $("#modalEdicion #numero").val(obj.data[i].numero);
        var estado = $("#modalEdicion #estado").val(obj.data[i].estado);
        var puerto = $("#modalEdicion #puerto").val(obj.data[i].puerto);
        var instalacion_portuaria = $("#modalEdicion #instalacion_portuaria").val(obj.data[i].instalacion_portuaria);
        var director_general = $("#modalEdicion #director_general").val(obj.data[i].director_general);
        var correo_dg = $("#modalEdicion #correo_dg").val(obj.data[i].correo_dg);
        var celular = $("#modalEdicion #celular").val(obj.data[i].celular);*/
        var opip_nombre = $("#modalEdicion #opip_nombre").val(obj.data[i].opip_nombre);
       // var tel_extension = $("#modalEdicion #tel_extension").val(obj.data[i].tel_extension);
       //var correo_opip = $("#modalEdicion #correo_opip").val(obj.data[i].correo_opip);
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
        var observ = $("#modalEdicion #observ").val(obj.data[i].obser);   
           }
        }
    });
}