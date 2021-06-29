<?php 
      session_start();
    if (isset($_SESSION['usuario'])) {
        if($_SESSION['usuario']['privilegios'] != "cliente"){
            header("Location: ../");
            }
        }else{
            header('Location: ../');
        }

         $id = $_SESSION['usuario']['id_climan'];
         $idu = $_SESSION['usuario']['id_usuario'];
?>
<!DOCTYPE html "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml"> 
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Darsis - Sistema de Gestión</title>

    <!-- Bootstrap Core CSS -->
    <link href="../boots/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../boots/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="../boots/morrisjs/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../boots/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <link href="../boots/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">

    <link href="../boots/datatables-responsive/dataTables.responsive.css" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="librerias/alertifyjs/css/alertify.css">
    <link rel="stylesheet" type="text/css" href="librerias/alertifyjs/css/themes/default.css">



</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
               <?php include("usuarios.php");?>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-envelope fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-messages">
                        <li>
                            <a href="#">
                                <div>
                                    <strong>John Smith</strong>
                                    <span class="pull-right text-muted">
                                        <em>Yesterday</em>
                                    </span>
                                </div>
                                <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...</div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <strong>John Smith</strong>
                                    <span class="pull-right text-muted">
                                        <em>Yesterday</em>
                                    </span>
                                </div>
                                <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...</div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <strong>John Smith</strong>
                                    <span class="pull-right text-muted">
                                        <em>Yesterday</em>
                                    </span>
                                </div>
                                <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...</div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a class="text-center" href="#">
                                <strong>Read All Messages</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                    <!-- /.dropdown-messages -->
                </li>
                <!-- /.dropdown -->
                <li class="dropdown">
                    <ul class="dropdown-menu dropdown-alerts">
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-comment fa-fw"></i> New Comment
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-twitter fa-fw"></i> 3 New Followers
                                    <span class="pull-right text-muted small">12 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-envelope fa-fw"></i> Message Sent
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-tasks fa-fw"></i> New Task
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-upload fa-fw"></i> Server Rebooted
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a class="text-center" href="#">
                                <strong>See All Alerts</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                    <!-- /.dropdown-alerts -->
                </li>
                <!-- /.dropdown -->            
                 <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                    <li><a href="#" type="button" data-toggle="modal" data-target="#modalEditar"><i class="fa fa-pencil-square-o"></i> Actualizar</a>
                    </li>
                     
                     <li><a href="../conexion/cerrar_sesion.php"><i class="fa fa-sign-out fa-fw"></i>Cerrar Sesión</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>


            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                <ul class="nav" id="side-menu">
                <li>
                    <a href="./"><i class="fa fa-dashboard fa-fw"></i>Inicio</a>
                </li>      
                      <li>
                            <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i>Proyectos<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="proyecto.php">Proyectos</a>
                                </li>
                            </ul>
                        </li>
                
     
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
          
            <!-- /.navbar-static-side -->
        </nav>

        <div id="page-wrapper">
               <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Comentarios</h1>
                </div>
                <div>
<input type="hidden" id="id_leer" name="id_leer" value="<?php echo $idu?>">
<div class="modal-footer">
<button type="button" class="btn btn-black" id="leerdato" data-dismiss="modal">Sin Leer<div id="comntr"></div></button>

</div>
</div>
                <!-- /.col-lg-12 -->
                </div>
              
<?php

$query = "SELECT * FROM cliente WHERE id_cliente = $id ";
$result = mysqli_query($conexion,$query);

while($usu=mysqli_fetch_row($result))
{
    $nombre = $usu[1].' '.$usu[2];
?>

<input type="hidden" id="nombre" name="nombre" value="<?php echo $nombre?>">
<?php

}


$sql = "


SELECT id_usuario,manejador.nombre,manejador.apellidos FROM manejador INNER JOIN usuarios ON id_climan = id_manejador INNER JOIN proyecto ON id_man = id_manejador WHERE id_cli = $id and usuarios.privilegios = 'manejador'

";
$manejador = mysqli_query($conexion,$sql);


?>
        <div class="col-sm-12 col-md-12 col-lg-12" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">  
            
            <div class="row">

            <div class="modal-body">
            <div class="col-sm-offset-1 col-sm-10">
            <h4 class="modal-title" id="exampleModalLabel"></h4></div>

            <input type="hidden" id="opcion" name="opcion" value="guardar">
            <input type="hidden" id="id_climan" name="id_climan" value="<?php echo $idu?>">

            <div class="form-group">
            <div class="col-sm-offset-3 col-sm-6" >
            <p> <!-- De: <b><?php echo $nombre;?>-->  </b>para:<b><select style="border: 1px solid transparent" id="id_usu" name="id_usu" type="text"  >   
            <option value="0">Selecione Usuario</option>
            <?php while($man = mysqli_fetch_row($manejador)):?>
<option value="<?php echo $man[0]?>"><?php echo utf8_decode($man[1].''.$man[2])?></option>
            <?php endwhile; ?>

        </select></b>

            </p> 
            <textarea rows="3" id="comentar" name="comentar" type="text" class="form-control" placeholder="Comentario"></textarea>
            
             <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal" id="guardarnuevo">
                Enviar
                </button>

            </div>
            </div>
            </div>
            </div>
        </div>
        </div>


        <div class="modal fade" id="modalEdicion" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div role="document" class="col-sm-offset-3 col-sm-6">
            <div class="modal-content">
              <div class="modal-header" >
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Editar comentario</h4>
              </div>
              <div class="modal-body">

                  <input type="text" hidden="" id="idpersona" name="">
                  <label><input style="border:1px solid transparent;" type="text" name="" id="nombreu" class="form-control input-sm"></label>
                  <p>Comentario</p>
                  <textarea rows="3" id="comentaru" name="comentaru" type="text" class="form-control" placeholder="Comentario"></textarea>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-warning" id="actualizadatos" data-dismiss="modal">Editar</button>
                
              </div>
            </div>
          </div>
        </div>




        <div class="container">
        <div id="tabla"></div>
        </div>



            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->
     
    <!-- /#wrapper -->

     <script src="../js/jquery-1.12.3.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/jquery.dataTables.min.js"></script>
    <script src="../js/dataTables.bootstrap.js"></script>
    <!--botones DataTables-->   
    <script src="../js/dataTables.buttons.min.js"></script>
    <script src="../js/buttons.bootstrap.min.js"></script>
    <!--Libreria para exportar Excel-->
    <script src="../js/jszip.min.js"></script>
    <!--Librerias para exportar PDF-->
    <script src="../js/pdfmake.min.js"></script>
    <script src="../js/vfs_fonts.js"></script>
    <!--Librerias para botones de exportación-->
    <script src="../js/buttons.html5.min.js"></script>        

    <script src="../boots/metisMenu/metisMenu.min.js"></script>
    <script src="../dist/js/sb-admin-2.js"></script>

    <script src="librerias/funciones.js"></script>
    <script src="librerias/alertifyjs/alertify.js"></script>


</body>

</html>
<script type="text/javascript">
    $(document).ready(function(){
        $('#tabla').load('tablacom.php');
        $('#comntr').load('../php/comentr.php');
//    $('#buscador').load('componentes/buscador.php');
    });

    $(document).ready(function(){
        $('#guardarnuevo').click(function(){
          id_climan=$('#id_climan').val();
          comentar=$('#comentar').val();
          nombre=$('#nombre').val();
          id_usu=$('#id_usu').val();
          opcion=$('#opcion').val();

            agregardatos(id_climan,comentar,id_usu,nombre);
        });



        $('#actualizadatos').click(function(){
          actualizaDatos();
        });

        $('#leerdato').click(function(){
          leerdato();
        });

    });
</script>