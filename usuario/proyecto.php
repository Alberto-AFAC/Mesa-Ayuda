<?php 
      session_start();
    if (isset($_SESSION['usuario'])) {
        if($_SESSION['usuario']['privilegios'] != "cliente"){
            header("Location: ../");
            }
        }else{
            header('Location: ../');
        }
?>
<!DOCTYPE html>
<html lang="en">

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

    <link rel="stylesheet" type="text/css" href="calendario/tcal.css" />


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
                  <?php include("../php/correo.php");?>
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
                    <!--<li><a href="#" type="button" data-toggle="modal" data-target="#modalEditar"><i class="fa fa-pencil-square-o"></i> Actualizar</a>
                    </li>-->
                     
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
                                     <li>
                            <a href="#"><i class="fa fa-files-o fa-fw"></i>Registro de Avances<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="actividad.php">Actividades</a>
                                </li>
                                <li>
                                    <a href="tarea.php">Tareas</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
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
            <!--<h3 class="text-center" style="border: 1px solid red;"> <small class="mensaje">123</small></h3>-->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Mis proyectos</h1>                    
                </div>
                <!-- /.col-lg-12 -->
            </div>
 



 <div class="row">
        <div id="cuadro1" class="col-lg-12">
        <div class="panel panel-default">         

         
        <div style="padding: 0;" class="panel-heading">

      <button type="button" style="color:blue;" class="btn btn-default"><a href="proyecto.php"><i class="glyphicon glyphicon-refresh"></i></a></button>

     <p style="text-align: center; float: left; width:100%;" class="mensaje"></p>
      </div>
               <div class="panel-body">             
                <table id="proyecto" class="table table-striped table-bordered table-hover"  cellspacing="0" width="100%">
                    <thead>
                        <tr>                                
                            <!--<th>Nombre</th>
                            <th>Cliente</th>
                            <th>Empresa</th>
                            <th>proyecto</th>
                            <th>Manejador</th>
                            <th>Fecha Inicio</th>
                            <th>Fecha Termino</th>-->
                            <th>Nombre</th>
                            <th>Categoria</th>
                            <th>Manejador</th>
                            <th>Inicio</th>
                            <th>Termino</th>
                            
                            <th></th>                                           
                        </tr>
                    </thead>  
                    <tbody>
                      <thead class="thead-default"></thead>
                    </tbody>                  
                </table>
            </div>
            </div>          
        </div>      
    </div>

<form id="frmDetalles" class="form-horizontal" action="" method="POST" >
 <div id="cuadro4" class="col-sm-12 col-md-12 col-lg-12" class="modal fade" id="modalDetalles" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">


    
    <div class="row">
    <div class="modal-body">

    <div class="col-sm-offset-1 col-sm-10">

    <button type="button" id="listar" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true" class="glyphicon glyphicon-share-alt" ></span></button>
      
    <h4 class="modal-title" id="exampleModalLabel"></h4></div>

    <input type="hidden" id="idproyecto" name="idproyecto" value="0">
    <input type="hidden" id="opcion" name="opcion" value="modificar">
    <div class="form-group">
    <div class="col-sm-offset-1 col-sm-5" >
    <label for="nombre">Nombre de proyecto</label>:
    <input id="nombre" name="nombre" type="text"  class="form-control">
    </div>
    <div class="col-sm-offset-0 col-sm-5">
    <label for="nombre">Empresa</label>:
    <input id="empresa" name="empresa" type="text" class="form-control">
    </div>
    </div>
    <div class="form-group">
    <div class="col-sm-offset-1 col-sm-10">
    <label for="nombre">Categoria</label>:
     <input id="categoria" name="categoria" type="text" class="form-control"> 
    </div>
    </div>

    <div class="form-group">
    <div class="col-sm-offset-1 col-sm-10">
    <label for="nombre">Descripción Categoria</label>:
     <textarea id="cat_descrip" name="cat_descrip" type="text" class="form-control"></textarea>
    </div>
    </div>

    <div class="form-group">
    <div class="col-sm-offset-1 col-xs-3">
    <label for="nombre">Manejador</label>:
   <input id="mnombre" name="mnombre" type="text" class="form-control">
    </div>

    <div class="col-sm-offset-0 col-xs-3">
    <label style="color: transparent;">.</label>
    <input id="mapellido" name="mapellido" type="text" class="form-control">
    </div>

    <div class="col-sm-offset-0 col-xs-4">
    <label for="nombre">Correo</label>:
    <input id="mcorreo" name="mcorreo" type="text" class="form-control">  
    </div>

    </div>
    

    <div class="form-group">
    <div class="col-sm-offset-1 col-sm-5">
    <label for="finicio">Fecha Inicio</label>
    <input id="finicio" name="finicio" type="text" class="form-control">
    </div>
    <div class="col-sm-offset-0 col-sm-5">
    <label for="ftermino">Fecha Termino</label>
    <input id="ftermino" name="ftermino" type="text" class="form-control" >
    </div>
    </div>

    <div class="form-group">
    <div class="col-sm-offset-1 col-sm-10">
    <label for="descripcion">Descripción</label>
    <textarea  rows="3" id="descripcion" name="descripcion" type="text" class="form-control"></textarea>
    </div>
    </div>
 
<!--<div id="datos" ></div>-->


    </div>
    </div>
    
    </div>
    </form>


<form id="frmActivi" class="form-horizontal" action="" method="POST" >
 <div id="cuadro5" class="col-sm-12 col-md-12 col-lg-12" class="modal fade" id="modalActivi" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">


    
    <div class="row">
    <div class="modal-body">

    <div class="col-sm-offset-1 col-sm-11">

    <button type="button" id="lis" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true" class="glyphicon glyphicon-share-alt" ></span></button>
      
    <h4 class="modal-title" id="exampleModalLabel"></h4></div>

    <input type="hidden" id="idproyecto" name="idproyecto" value="0">
    <input type="hidden" id="opcion" name="opcion" value="modificar">
   
  
 <div class="form-group">
    <div class="col-sm-offset-0 col-sm-4" >
    <label>Proyecto</label>:
    <input id="nombre" name="nombre" type="text"  class="form-control">
    </div>
    <div class="col-sm-offset-0 col-sm-4" >
    <label>Empresa:</label>:
    <input id="empresa" name="empresa" type="text"  class="form-control">
    </div>
    <div class="col-sm-offset-0 col-sm-2">
    <label>Inicio:</label>
    <input id="finicio" name="finicio" type="text" class="form-control">
    </div>
    <div class="col-sm-offset-0 col-sm-2">
    <label>Termino:</label>
    <input id="ftermino" name="ftermino" type="text" class="form-control" >
    </div>
    </div>   
<div id="demo"></div>  
    </div>
    </div>
    
    </div>
    </form>




<form id="frmTarea" class="form-horizontal" action="" method="POST" >
 <div id="cuadro6" class="col-sm-12 col-md-12 col-lg-12" class="modal fade" id="modalActivi" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">   
    <div class="row">
    <div class="modal-body">

    <div class="col-sm-offset-1 col-sm-11">

   <!--<button type="button" id="btnlis" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>-->
      
    <h4 class="modal-title" id="exampleModalLabel"></h4></div>

    <input type="hidden" id="id_activ" name="id_activ">
   
  
 <div class="form-group">
    <!--<div class="col-sm-offset-0 col-sm-4" >
    <label>Actividad</label>:
    <input id="actividad" name="actividad" type="text"  class="form-control">
    </div>-->
    </div>
    <div id="tarea"></div> 
    </div>
    </div>
    
    </div>
    </form>







    <div>

      </div>

        </div>
            <!-- /.row -->
      
        <!-- /#page-wrapper -->
</div>
    <!-- /#wrapper -->


</body>

     <script src="../js/jquery-1.12.3.min.js"></script>
    <!--<script src="../js/jquery-1.12.3.js"></script>-->
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
    <script type="text/javascript" src="../js/proyecto.js"></script>

    <script src="../boots/metisMenu/metisMenu.min.js"></script>
    <script src="../dist/js/sb-admin-2.js"></script>

<script type="text/javascript">
    
     $(document).on("ready", function(){
            listar_proyecto();
           // modificar();
        });

     $("#listar").on("click", function(){
            listar_proyecto();
        });
     $("#lis").on("click", function(){
        listar_proyecto();
     });

</script>