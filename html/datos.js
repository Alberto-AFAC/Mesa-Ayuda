
$.ajax({
        url:'../php/lista_area.php',
        type: 'POST'

    }).done(function(resp){  

obj = JSON.parse(resp);
var res = obj.data;  
var x = 0;

html = '<div id="example_wrapper" class="dataTables_wrapper form-inline dt-bootstrap"><div class="row"> <div class="col-sm-12"><table id="area" class="table table-striped table-bordered dataTable" style="width:100%" role="grid" aria-describedby="example_info"><thead><tr><th><i class="fa fa-sort-numeric-asc"></i>ID</th><th><i></i> Area</th><th><i></i>Acción</th></tr></thead><tbody>';

     for(i=0; i<res.length;i++){
x++;


     html +="<tr><td>"+x+"</td><td>"+obj.data[i].id_area+"</td><td><div class='btn-group'><a class='Editar btn btn-warning' href='#' data-toggle='modal' data-target='#modalEdicion' onclick='Editar("+'"'+obj.data[i].id_area+'"'+")'><i class='fa fa-pencil'></i></a><a class='Asigna btn btn-info' href='#' data-toggle='modal' data-target='#modalAsigna' onclick='Asigna("+'"'+obj.data[i].id_asi+'"'+")'><i class='fa fa-list'></i></a></div></td></tr>";
              
        } 
  html +='</tbody></table></div></div></div>';
 $("#areas").html(html);  
    })          
