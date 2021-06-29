$.ajax({
        url:'../php/opipdatos.php',
        type: 'POST'

    }).done(function(resp){  

obj = JSON.parse(resp);
var res = obj.data;  
var x = 0;
var hoy = new Date();
var fecha_actual = hoy.getFullYear()+'-'+(hoy.getMonth()+1)+'-'+hoy.getDate();
var f1 = new Date(hoy.getFullYear(),(hoy.getMonth()+1),hoy.getDate());

html = '<div id="example_wrapper" class="dataTables_wrapper form-inline dt-bootstrap"><div class="row"> <div class="col-sm-12"><table id="example" class="table table-striped table-bordered dataTable" style="width:100%" role="grid" aria-describedby="example_info"><thead><tr><th><i class="fa fa-sort-numeric-asc"></i></th><th><i></i> Tipo</th><th><i></i> OPIP</th><th><i></i>Tel/Ext</th><th><i></i> Correo</th><th><i></i> Celular 24H</th><th><i></i>Renovación</th><th><i></i> Instalación Portuaria</th><th><i></i> Director General</th><th><i></i> Puerto</th><th><i></i>Acción</th></tr></thead><tbody>';

     for(i=0; i<res.length;i++){
x++;

/*fexpd = obj.data[i].exp_cert.substring(8,10);
fexpm = obj.data[i].exp_cert.substring(5,7);
fexpy = obj.data[i].exp_cert.substring(0,4);*/

fvigd = obj.data[i].vig_cert.substring(8,10);
fvigm = obj.data[i].vig_cert.substring(5,7);
fvigy = obj.data[i].vig_cert.substring(0,4);

fecha_agregada = obj.data[i].vig_cert;

var f2 = new Date(fvigy,fvigm,fvigd);

fecha1 = moment(fecha_actual);
fecha2 = moment(fecha_agregada);
diferencia = fecha2.diff(fecha1, 'days');

//var array = [obj.data[i].id,obj.data[i].id_ip];
estado = obj.data[i].estado.charAt(0).toUpperCase() + obj.data[i].estado.slice(1).toLowerCase();

   if(fecha_agregada == '0000-00-00'){

     html +="<tr class='danger'><td>"+x+"</td><td>"+obj.data[i].tipo+"</td><td>"+obj.data[i].opip_nombre+"</td><td>"+obj.data[i].tel_extension+"</td><td>"+obj.data[i].correo_opip+"</td><td>"+obj.data[i].celular_24hrs+"</td><td>"+obj.data[i].vig_cert+"</td><td>"+obj.data[i].instalacion_portuaria+"</td><td>"+obj.data[i].director_general+"</td><td>"+obj.data[i].puerto+', '+estado+"</td><td><div class='btn-group'><a class='Editar btn btn-warning' href='#' data-toggle='modal' data-target='#modalEdicion' onclick='Editar("+'"'+obj.data[i].id_asi+'"'+")'><i class='fa fa-pencil'></i></a><a class='Asigna btn btn-info' href='#' data-toggle='modal' data-target='#modalAsigna' onclick='Asigna("+'"'+obj.data[i].id_asi+'"'+")'><i class='fa fa-anchor'></i></a></div></td></tr>";
   }else if(f2 < f1){

     html +="<tr class='danger'><td>"+x+"</td><td>"+obj.data[i].tipo+"</td><td>"+obj.data[i].opip_nombre+"</td><td>"+obj.data[i].tel_extension+"</td><td>"+obj.data[i].correo_opip+"</td><td>"+obj.data[i].celular_24hrs+"</td><td>fecha vencida</td><td>"+obj.data[i].instalacion_portuaria+"</td><td>"+obj.data[i].director_general+"</td><td>"+obj.data[i].puerto+', '+estado+"</td><td><div class='btn-group'><a class='Editar btn btn-warning' href='#' data-toggle='modal' data-target='#modalEdicion' onclick='Editar("+'"'+obj.data[i].id_asi+'"'+")'><i class='fa fa-pencil'></i></a><a class='Asigna btn btn-info' href='#' data-toggle='modal' data-target='#modalAsigna' onclick='Asigna("+'"'+obj.data[i].id_asi+'"'+")'><i class='fa fa-anchor'></i></a></div></td></tr>";     

            }else{
 if(obj.data[i].id_ip == "" || obj.data[i].estado == "" || obj.data[i].puerto == "" || obj.data[i].instalacion_portuaria == "" || obj.data[i].director_general == "" || obj.data[i].correo_dg == "" || obj.data[i].celular == "" || obj.data[i].opip_nombre == "" || obj.data[i].tel_extension == "0" || obj.data[i].correo_opip == "" || obj.data[i].celular_24hrs == "" || obj.data[i].escuela_nautica == "" || obj.data[i].profesion == "" || obj.data[i].exp_cert == '0000-00-00'){                                                
 html +="<tr class='warning'><td>"+x+"</td><td>"+obj.data[i].tipo+"</td><td>"+obj.data[i].opip_nombre+"</td><td>"+obj.data[i].tel_extension+"</td><td>"+obj.data[i].correo_opip+"</td><td>"+obj.data[i].celular_24hrs+"</td><td>faltan datos. faltan "+diferencia+" días</td><td>"+obj.data[i].instalacion_portuaria+"</td><td>"+obj.data[i].director_general+"</td><td>"+obj.data[i].puerto+', '+estado+"</td><td><div class='btn-group'><a class='Editar btn btn-warning' href='#' data-toggle='modal' data-target='#modalEdicion' onclick='Editar("+'"'+obj.data[i].id_asi+'"'+")'><i class='fa fa-pencil'></i></a><a class='Asigna btn btn-info' href='#' data-toggle='modal' data-target='#modalAsigna' onclick='Asigna("+'"'+obj.data[i].id_asi+'"'+")'><i class='fa fa-anchor'></i></a></div></td></tr>";
        }else{
     html +="<tr><td>"+x+"</td><td>"+obj.data[i].tipo+"</td><td>"+obj.data[i].opip_nombre+"</td><td>"+obj.data[i].tel_extension+"</td><td>"+obj.data[i].correo_opip+"</td><td>"+obj.data[i].celular_24hrs+"</td><td> faltan "+diferencia+" días</td><td>"+obj.data[i].instalacion_portuaria+"</td><td>"+obj.data[i].director_general+"</td><td>"+obj.data[i].puerto+', '+estado+"</td><td><div class='btn-group'><a class='Editar btn btn-warning' href='#' data-toggle='modal' data-target='#modalEdicion' onclick='Editar("+'"'+obj.data[i].id_asi+'"'+")'><i class='fa fa-pencil'></i></a><a class='Asigna btn btn-info' href='#' data-toggle='modal' data-target='#modalAsigna' onclick='Asigna("+'"'+obj.data[i].id_asi+'"'+")'><i class='fa fa-anchor'></i></a></div></td></tr>";                            
            } 
          }    


              
        } 
  html +='</tbody></table></div></div></div>';
 $("#demo").html(html);  
    })          

function Editar(id_asi){

var idasi = id_asi;

$.ajax({
    url:'../php/opipdatos.php',
    type:'POST',    
}).done(function(resp){

    var res = obj.data;

      for(i=0;i<res.length;i++){
 
        var idop = obj.data[i].id_asi;

        if(idasi===idop){        

        var idu = $("#modalEdicion #idu").val(obj.data[i].id);    
        var id_ip = $("#modalEdicion #instport").val(obj.data[i].id_ip);
        var estado = $("#modalEdicion #estado").val(obj.data[i].estado);
        var puerto = $("#modalEdicion #puerto").val(obj.data[i].puerto);
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
        var exp_cert = $("#modalEdicion #exp_cert").val(obj.data[i].exp_cert);
        var vig_cert = $("#modalEdicion #vig_cert").val(obj.data[i].vig_cert);   

            fvigd = obj.data[i].vig_cert.substring(8,10);
            fvigm = obj.data[i].vig_cert.substring(5,7);
            fvigy = obj.data[i].vig_cert.substring(0,4);        
            var hoy = new Date();
            var fecha_actual = hoy.getFullYear()+'-'+(hoy.getMonth()+1)+'-'+hoy.getDate();
            var f1 = new Date(hoy.getFullYear(),(hoy.getMonth()+1),hoy.getDate());
            var f2 = new Date(fvigy,fvigm,fvigd);
            fecha1 = moment(fecha_actual);
            fecha2 = moment(obj.data[i].vig_cert);
            diferencia = fecha2.diff(fecha1, 'days');            

        if(obj.data[i].vig_cert == '0000-00-00'){
            var diferencia = $("#modalEdicion #diferencia").val('falta anexar fecha de vigencia');
        }else if (f2 < f1){
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



function Asigna(id_asi){
    var ida = id_asi;
$.ajax({
    url:'../php/opipdatos.php',
    type:'POST',    
}).done(function(resp){
    var res = obj.data;
    for(i=0;i<res.length;i++){
        var idasi = obj.data[i].id_asi;
        if(ida===idasi){        
        var id_asi = $("#modalAsigna #ida").val(obj.data[i].id_asi);
        var id_opip = $("#modalAsigna #idopi").val(obj.data[i].id);    
        var id_ip = $("#modalAsigna #id_ip").val(obj.data[i].id_ip);
        var instalacion_portuaria = $("#modalAsigna #instalacion_portuaria").val(obj.data[i].instalacion_portuaria);
        var director_general = $("#modalAsigna #director_general").val(obj.data[i].director_general);
        var celular = $("#modalAsigna #celular").val(obj.data[i].celular);
        var opip_nombre = $("#modalAsigna #opip_nombre").val(obj.data[i].opip_nombre);
        var celular_24hrs = $("#modalAsigna #celular_24hrs").val(obj.data[i].celular_24hrs);
        var tipo = $("#modalAsigna #cargo").val(obj.data[i].tipo);
           }   
        }
    });
}



function preguntarSiNo(id){
    console.log(id);
$.ajax({
    url:'../php/opipdatos.php',
    type:'POST',    
}).done(function(resp){
    var res = obj.data;
    for(i=0;i<res.length;i++){
        var idt = obj.data[i].id;
        if(id===idt){

             alertify.confirm('Eliminar Datos', '¿Esta seguro de eliminar el registro del OPIP: '+ obj.data[i].opip_nombre+'?', 
            function(){ eliminarDatos(id) }
            , function(){ alertify.error('Se cancelo')});

            }
        }
    });
}
