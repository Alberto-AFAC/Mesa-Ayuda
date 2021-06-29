  $.ajax({
        url:'../php/usuarios.php',
        type: 'POST'

    }).done(function(resp){  

obj = JSON.parse(resp);
var res = obj.data;  
var x = 0;
var hoy = new Date();

html = '<div id="example_wrapper" class="dataTables_wrapper form-inline dt-bootstrap"><div class="row"> <div class="col-sm-12"><table id="example" class="table table-striped table-bordered dataTable" style="width:100%" role="grid" aria-describedby="example_info"><thead><tr><th><i class="fa fa-sort-numeric-asc"></i></th><th><i></i> Nombre</th><th><i></i> Apellido P</th><th><i></i> Apellido M</th><th><i></i> Correo</th><th><i></i> Usuario</th><th><i></i> Privilegios</th><th><i></i>Acción</th></tr></thead><tbody>';

     for(i=0; i<res.length;i++){
x++;

     html +="<tr><td>"+x+"</td><td>"+obj.data[i].nombre+"</td><td>"+obj.data[i].apellidop+"</td><td>"+obj.data[i].apellidom+"</td><td>"+obj.data[i].correo+"</td><td>"+obj.data[i].usuario+"</td><td>"+obj.data[i].privilegios+"</td><td><div class='btn-group'><a class='Editar btn btn-warning' href='#' data-toggle='modal' data-target='#Edicion' onclick='Editar("+'"'+obj.data[i].id_usuario+'"'+")'><i class='fa fa-pencil'></i></a><a href='#' class='btn btn-danger' onclick='preguntarSiNo("+'"'+obj.data[i].id_usuario+'"'+")'><i class='fa fa-trash-o'></i></a></div></td></tr>";     

        }

  html +='</tbody></table></div></div></div>';

 $("#usuario").html(html);  

    });         


function Editar(id_usuario){

    var id_usuario;

$.ajax({
    url:'../php/usuarios.php',
    type:'POST',    
}).done(function(resp){

    var res = obj.data;

    for(i=0;i<res.length;i++){
        var idt = obj.data[i].id_usuario;

        if(id_usuario===idt){
        var idu = $("#Edicion #idu").val(obj.data[i].id_usuario);    
        var nombre = $("#Edicion #nombre").val(obj.data[i].nombre);
        var apellidop = $("#Edicion #apellidop").val(obj.data[i].apellidop);
        var apellidom = $("#Edicion #apellidom").val(obj.data[i].apellidom);
        var correo = $("#Edicion #correo").val(obj.data[i].correo);
        var usuario = $("#Edicion #usuario").val(obj.data[i].usuario);
        var password = $("#Edicion #password").val(obj.data[i].password);
        var privilegios = $("#Edicion #privilegios").val(obj.data[i].privilegios);

           }
        }
    });
}

function preguntarSiNo(id_usuario){
    console.log(id_usuario);
$.ajax({
    url:'../php/usuarios.php',
    type:'POST',    
}).done(function(resp){
    var res = obj.data;
    for(i=0;i<res.length;i++){
        var idt = obj.data[i].id_usuario;
        if(id_usuario===idt){

             alertify.confirm('Eliminar Datos', '¿Esta seguro de eliminar el registro de: '+ obj.data[i].nombre+'?', 
            function(){ eliminarDatos(id_usuario) }
            , function(){ alertify.error('Se cancelo')});

            }
        }
    });
}

