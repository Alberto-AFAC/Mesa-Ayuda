$.ajax({
        url:'../php/opipsregistrados.php',
        type: 'POST'

    }).done(function(resp){  

obj = JSON.parse(resp);
var res = obj.data;  
var x = 0;
var hoy = new Date();
var fecha_actual = hoy.getFullYear()+'-'+(hoy.getMonth()+1)+'-'+hoy.getDate();
var f1 = new Date(hoy.getFullYear(),(hoy.getMonth()+1),hoy.getDate());

html = '<div id="example_wrapper" class="dataTables_wrapper form-inline dt-bootstrap"><div class="row"> <div class="col-sm-12"><table id="regopips" class="table table-striped table-bordered dataTable" style="width:100%" role="grid" aria-describedby="example_info"><thead><tr><th><i class="fa fa-sort-numeric-asc"></i></th><th><i></i> OPIP</th><th><i></i> Celular 24H</th><th><i></i> Correo</th><th><i></i> Escuela Nautica </th><th><i></i> Profesión</th><th><i></i> Expedición</th><th><i></i> Vigencia</th><th><i></i>Renovación</th><th><i></i>Acción</th></tr></thead><tbody>';

     for(i=0; i<res.length;i++){
x++;

fvigd = obj.data[i].vig_cert.substring(8,10);
fvigm = obj.data[i].vig_cert.substring(5,7);
fvigy = obj.data[i].vig_cert.substring(0,4);

fecha_vig = fvigd+'/'+fvigm+'/'+fvigy;

fexpd = obj.data[i].exp_cert.substring(8,10);
fexpm = obj.data[i].exp_cert.substring(5,7);
fexpy = obj.data[i].exp_cert.substring(0,4);

fecha_exp = fexpd+'/'+fexpm+'/'+fexpy;

fecha_agregada = obj.data[i].vig_cert;

var f2 = new Date(fvigy,fvigm,fvigd);

fecha1 = moment(fecha_actual);
fecha2 = moment(fecha_agregada);
diferencia = fecha2.diff(fecha1, 'days');


   if(fecha_agregada == '0000-00-00'){

     html +="<tr class='danger'><td>"+x+"</td><td>"+obj.data[i].opip_nombre+"</td><td>"+obj.data[i].celular_24hrs+"</td><td>"+obj.data[i].correo_opip+"</td><td>"+obj.data[i].escuela_nautica+"</td><td>"+obj.data[i].profesion+"</td><td>"+fecha_exp+"</td><td>"+fecha_vig+"</td><td>"+obj.data[i].vig_cert+"</td><td><div class='btn-group'><a class='Editar btn btn-info' href='#' data-toggle='modal' data-target='#modalEdicion' onclick='VerArc("+'"'+obj.data[i].id+'"'+")'><i class='fa fa-eye'></i></a></div></td></tr>";
   }else if(f2 < f1){

     html +="<tr class='danger'><td>"+x+"</td><td>"+obj.data[i].opip_nombre+"</td><td>"+obj.data[i].celular_24hrs+"</td><td>"+obj.data[i].correo_opip+"</td><td>"+obj.data[i].escuela_nautica+"</td><td>"+obj.data[i].profesion+"</td><td>"+fecha_exp+"</td><td>"+fecha_vig+"</td><td>fecha vencida</td><td><div class='btn-group'><a class='Editar btn btn-info' href='#' data-toggle='modal' data-target='#modalEdicion' onclick='VerArc("+'"'+obj.data[i].id+'"'+")'><i class='fa fa-eye'></i></a></div></td></tr>";     

            }else{
 if(obj.data[i].instport == "" || obj.data[i].estado == "" || obj.data[i].puerto == "" || obj.data[i].instalacion_portuaria == "" || obj.data[i].director_general == "" || obj.data[i].correo_dg == "" || obj.data[i].celular == "" || obj.data[i].opip_nombre == "" || obj.data[i].correo_opip == "" || obj.data[i].celular_24hrs == "" || obj.data[i].escuela_nautica == "" || obj.data[i].profesion == "" || obj.data[i].exp_cert == '0000-00-00'){                                                
 html +="<tr class='warning'><td>"+x+"</td><td>"+obj.data[i].opip_nombre+"</td><td>"+obj.data[i].celular_24hrs+"</td><td>"+obj.data[i].correo_opip+"</td><td>"+obj.data[i].escuela_nautica+"</td><td>"+obj.data[i].profesion+"</td><td>"+fecha_exp+"</td><td>"+fecha_vig+"</td><td>faltan datos. faltan "+diferencia+" días</td><td><div class='btn-group'><a class='Editar btn btn-info' href='#' data-toggle='modal' data-target='#modalEdicion' onclick='VerArc("+'"'+obj.data[i].id+'"'+")'><i class='fa fa-eye'></i></a></div></td></tr>";
        }else{
     html +="<tr><td>"+x+"</td><td>"+obj.data[i].opip_nombre+"</td><td>"+obj.data[i].celular_24hrs+"</td><td>"+obj.data[i].correo_opip+"</td><td>"+obj.data[i].escuela_nautica+"</td><td>"+obj.data[i].profesion+"</td><td>"+fecha_exp+"</td><td>"+fecha_vig+"</td><td> faltan "+diferencia+" días</td><td><div class='btn-group'><a class='Editar btn btn-info' href='#' data-toggle='modal' data-target='#modalEdicion' onclick='VerArc("+'"'+obj.data[i].id+'"'+")'><i class='fa fa-eye'></i></a></div></td></tr>";                            
            } 
          }


        } 
  html +='</tbody></table></div></div></div>';
 $("#opipregs").html(html);  
    })          

function VerArc(id){

    var ido = id;

$.ajax({
    url:'../php/archivo.php',
    type:'POST',    
}).done(function(resp){

obj = JSON.parse(resp);

    var res = obj.data;
var num = 1;


html = '<div id="example_wrapper" class="dataTables_wrapper form-inline dt-bootstrap"><div class="row"> <div class="col-sm-12"><table class="table table-striped table-over" role="grid" aria-describedby="example_info"><thead><tr><th><i class="fa fa-sort-numeric-asc"></i></th><th><i></i>Año</th><th><i></i>Descripción</th><th><i></i>Acción</th></tr></thead><tbody>';

    for(i=0;i<res.length;i++){
        var ida = obj.data[i].id_opip;



        if(ido===ida){        

//            alert(ida);

//

var cadena = obj.data[i].archivo;
    año = cadena.substring(15, 11);

    cadena = obj.data[i].archivo,
    inicio = 16,
    subCadena = cadena.substring(inicio);
    cadena = subCadena,
    separador = "/", // un espacio en blanco
    limite    = 1,
    nombreopip = cadena.split(separador, limite);
       
    if(num==1){
     html+='<tr><b>'+nombreopip+'</b></tr>';      
         }   

     html +='<tr><td>'+num+'</td><td>'+año+'</td><td><b><a href="'+obj.data[i].archivo+'" target="_Baknck">'+obj.data[i].descr+'</a></b></td><td><div><a href="#" class="btn btn-danger" onclick="preguntarElimina('+"'"+obj.data[i].id_arcop+"'"+')"><i class="fa fa-trash-o"></i></a></div></td></tr>';

//        document.getElementById("archivo").innerHTML = ""+'<b><a href="'+obj.data[i].archivo+'" target="_Baknck">'+obj.data[i].descr+'</a></b>';
//        document.getElementById("archivo").innerHTML = ""+'<b>Sin documentos agregados </b>';
    num++;
   
           }else{ 

         }
   
        }   
 

  html +='</tbody></table></div></div></div>';

 $("#archivo").html(html);  

    });

}

function preguntarElimina(id_arcop){
    console.log(id_arcop);
$.ajax({
    url:'../php/archivo.php',
    type:'POST',    
}).done(function(resp){
    var res = obj.data;
    for(i=0;i<res.length;i++){
        var idt = obj.data[i].id_arcop;
        if(id_arcop===idt){

             alertify.confirm('Eliminar Datos', '¿Esta seguro de eliminar es archivo?', 
            function(){ eliminarArchivo(id_arcop) }
            , function(){ alertify.error('Se cancelo')});

            }
        }
    });
}



function eliminarArchivo(id_arcop){

    cadena="idarc=" + id_arcop;

        $.ajax({
            type:"POST",
            url:"../php/registrar_datos.php",
            data:cadena+"&opcion=eliarchivo"
            }).done(function(respuesta){
                if(respuesta==1){
                    $('#opipreg').load('../html/opipreg.html');
                    alertify.success("Eliminado con exito!");
                }else{
                    alertify.error("Fallo el servidor :(");
                }
        });
}


$.ajax({
        url:'../php/opipsregistrados.php',
        type: 'POST'

    }).done(function(resp){  

obj = JSON.parse(resp);
var res = obj.data;  
var x = 0;
var hoy = new Date();
var fecha_actual = hoy.getFullYear()+'-'+(hoy.getMonth()+1)+'-'+hoy.getDate();
var f1 = new Date(hoy.getFullYear(),(hoy.getMonth()+1),hoy.getDate());

html = '<div id="example_wrapper" class="dataTables_wrapper form-inline dt-bootstrap"><div class="row"> <div class="col-sm-12"><table id="opipreg" class="table table-striped table-bordered dataTable" style="width:100%" role="grid" aria-describedby="example_info"><thead><tr><th><i class="fa fa-sort-numeric-asc"></i></th><th><i></i> OPIP</th><th><i></i> Celular 24H</th><th><i></i> Correo</th><th><i></i> Escuela Nautica </th><th><i></i> Profesión</th><th><i></i> Expedición</th><th><i></i> Vigencia</th><th><i></i>Renovación</th><th><i></i>Acción</th></tr></thead><tbody>';

     for(i=0; i<res.length;i++){
x++;

fvigd = obj.data[i].vig_cert.substring(8,10);
fvigm = obj.data[i].vig_cert.substring(5,7);
fvigy = obj.data[i].vig_cert.substring(0,4);

fecha_vig = fvigd+'/'+fvigm+'/'+fvigy;

fexpd = obj.data[i].exp_cert.substring(8,10);
fexpm = obj.data[i].exp_cert.substring(5,7);
fexpy = obj.data[i].exp_cert.substring(0,4);

fecha_exp = fexpd+'/'+fexpm+'/'+fexpy;

fecha_agregada = obj.data[i].vig_cert;

var f2 = new Date(fvigy,fvigm,fvigd);

fecha1 = moment(fecha_actual);
fecha2 = moment(fecha_agregada);
diferencia = fecha2.diff(fecha1, 'days');


   if(fecha_agregada == '0000-00-00'){

     html +="<tr class='danger'><td>"+x+"</td><td>"+obj.data[i].opip_nombre+"</td><td>"+obj.data[i].celular_24hrs+"</td><td>"+obj.data[i].correo_opip+"</td><td>"+obj.data[i].escuela_nautica+"</td><td>"+obj.data[i].profesion+"</td><td>"+fecha_exp+"</td><td>"+fecha_vig+"</td><td>"+obj.data[i].vig_cert+"</td><td><div class='btn-group'><a class='Editar btn btn-info' href='#' data-toggle='modal' data-target='#modalEdicion' onclick='Editar("+'"'+obj.data[i].id+'"'+")'><i class='fa fa-eye'></i></a></div></td></tr>";
   }else if(f2 < f1){

     html +="<tr class='danger'><td>"+x+"</td><td>"+obj.data[i].opip_nombre+"</td><td>"+obj.data[i].celular_24hrs+"</td><td>"+obj.data[i].correo_opip+"</td><td>"+obj.data[i].escuela_nautica+"</td><td>"+obj.data[i].profesion+"</td><td>"+fecha_exp+"</td><td>"+fecha_vig+"</td><td>fecha vencida</td><td><div class='btn-group'><a class='Editar btn btn-info' href='#' data-toggle='modal' data-target='#modalEdicion' onclick='Editar("+'"'+obj.data[i].id+'"'+")'><i class='fa fa-eye'></i></a></div></td></tr>";     

            }else{
 if(obj.data[i].instport == "" || obj.data[i].estado == "" || obj.data[i].puerto == "" || obj.data[i].instalacion_portuaria == "" || obj.data[i].director_general == "" || obj.data[i].correo_dg == "" || obj.data[i].celular == "" || obj.data[i].opip_nombre == "" || obj.data[i].correo_opip == "" || obj.data[i].celular_24hrs == "" || obj.data[i].escuela_nautica == "" || obj.data[i].profesion == "" || obj.data[i].exp_cert == '0000-00-00'){                                                
 html +="<tr class='warning'><td>"+x+"</td><td>"+obj.data[i].opip_nombre+"</td><td>"+obj.data[i].celular_24hrs+"</td><td>"+obj.data[i].correo_opip+"</td><td>"+obj.data[i].escuela_nautica+"</td><td>"+obj.data[i].profesion+"</td><td>"+fecha_exp+"</td><td>"+fecha_vig+"</td><td>faltan datos. faltan "+diferencia+" días</td><td><div class='btn-group'><a class='Editar btn btn-info' href='#' data-toggle='modal' data-target='#modalEdicion' onclick='Editar("+'"'+obj.data[i].id+'"'+")'><i class='fa fa-eye'></i></a></div></td></tr>";
        }else{
     html +="<tr><td>"+x+"</td><td>"+obj.data[i].opip_nombre+"</td><td>"+obj.data[i].celular_24hrs+"</td><td>"+obj.data[i].correo_opip+"</td><td>"+obj.data[i].escuela_nautica+"</td><td>"+obj.data[i].profesion+"</td><td>"+fecha_exp+"</td><td>"+fecha_vig+"</td><td> faltan "+diferencia+" días</td><td><div class='btn-group'><a class='Editar btn btn-info' href='#' data-toggle='modal' data-target='#modalEdicion' onclick='Editar("+'"'+obj.data[i].id+'"'+")'><i class='fa fa-eye'></i></a></div></td></tr>";                            
            } 
          }


        } 
  html +='</tbody></table></div></div></div>';
 $("#regopip").html(html);  
    })          


function Editar(id){

    var ido = id;

$.ajax({
    url:'../php/archivo.php',
    type:'POST',    
}).done(function(resp){

obj = JSON.parse(resp);

    var res = obj.data;
var num = 1;


html = '<div id="example_wrapper" class="dataTables_wrapper form-inline dt-bootstrap"><div class="row"> <div class="col-sm-12"><table class="table table-striped table-over" role="grid" aria-describedby="example_info"><thead><tr><th><i class="fa fa-sort-numeric-asc"></i></th><th><i></i>Año</th><th><i></i>Descripción</th></tr></thead><tbody>';

    for(i=0;i<res.length;i++){
        var ida = obj.data[i].id_opip;



        if(ido===ida){        

//            alert(ida);

//

var cadena = obj.data[i].archivo;
    año = cadena.substring(15, 11);

    cadena = obj.data[i].archivo,
    inicio = 16,
    subCadena = cadena.substring(inicio);
    cadena = subCadena,
    separador = "/", // un espacio en blanco
    limite    = 1,
    nombreopip = cadena.split(separador, limite);
       
    if(num==1){
     html+='<tr><b>'+nombreopip+'</b></tr>';      
         }   

     html +='<tr><td>'+num+'</td><td>'+año+'</td><td><b><a href="'+'../administrador/'+obj.data[i].archivo+'" target="_Baknck">'+obj.data[i].descr+'</a></b></td></tr>';

//        document.getElementById("archivo").innerHTML = ""+'<b><a href="'+obj.data[i].archivo+'" target="_Baknck">'+obj.data[i].descr+'</a></b>';
//        document.getElementById("archivo").innerHTML = ""+'<b>Sin documentos agregados </b>';
    num++;
   
           }else{ 

         }
   
        }   
 

  html +='</tbody></table></div></div></div>';

 $("#archivos").html(html);  

    });

}
