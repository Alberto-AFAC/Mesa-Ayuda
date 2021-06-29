<?php session_start();
//si la variable ssesion existe realizara las siguiente evaluacion 
    if (isset($_SESSION['usuario'])) {
        //si se ha logeado evaluamos si el usuario que aya ingresado intenta acceder a este directorio no es de tipo administrador, no le es permitido el acceso .. si tipo usuario es distinto de admin , entonces no tiene nada que hacer en este directorio 
        if($_SESSION['usuario']['privilegios'] != "admin"){
            //y se redirecciona al directorio que le corresponde
            header("Location: ../");
            }
        }else{
            //si no exixte quiere decir que nadie se ha logeado y lo regsara al inicio (login)
            header('Location: ../');
        }
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

  <link href="../../boots/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../../boots/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="../../boots/morrisjs/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../../boots/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <link href="../../boots/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">

    <link href="../../boots/datatables-responsive/dataTables.responsive.css" rel="stylesheet">



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
                <?php include("../../usuarios.php");?>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                   <?php include("../../php/correos.php");?>
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
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-tasks fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-tasks">
                        <li>
                            <a href="#">
                                <div>
                                    <p>
                                        <strong>Task 1</strong>
                                        <span class="pull-right text-muted">40% Complete</span>
                                    </p>
                                    <div class="progress progress-striped active">
                                        <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                                            <span class="sr-only">40% Complete (success)</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <p>
                                        <strong>Task 2</strong>
                                        <span class="pull-right text-muted">20% Complete</span>
                                    </p>
                                    <div class="progress progress-striped active">
                                        <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%">
                                            <span class="sr-only">20% Complete</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <p>
                                        <strong>Task 3</strong>
                                        <span class="pull-right text-muted">60% Complete</span>
                                    </p>
                                    <div class="progress progress-striped active">
                                        <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
                                            <span class="sr-only">60% Complete (warning)</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <p>
                                        <strong>Task 4</strong>
                                        <span class="pull-right text-muted">80% Complete</span>
                                    </p>
                                    <div class="progress progress-striped active">
                                        <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
                                            <span class="sr-only">80% Complete (danger)</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a class="text-center" href="#">
                                <strong>See All Tasks</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                    <!-- /.dropdown-tasks -->
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
                        <li><a href="../../conexion/cerrar_sesion.php"><i class="fa fa-sign-out fa-fw"></i>Cerrar Sesión</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
        <li>
                            <a href="../"><i class="fa fa-dashboard fa-fw"></i>Inicio</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i>Registros<span class="fa arrow"></span></a>
                             <ul class="nav nav-second-level">
                                <li>
                                    <a href="../registros/proyectos.php">Proyectos</a>
                                </li>
                                <li>
                                    <a href="../registros/clientes.php">Clientes</a>
                                </li>
                                <li>
                                    <a href="../registros/manejador.php">Manejador</a>
                                </li>
                                <li>
                                    <a href="../registros/categorias.php">Categorias</a>
                                </li>
                                <li>                                                              
                                    <a href="../registros/usuarios.php">Usuarios</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <!--<li>
                            <a href="#"><i class="fa fa-wrench fa-fw"></i>Coordinación<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="#">Actividades</a>
                                </li>
                                <li>
                                    <a href="../coordinacion/avances.html">Avances</a>
                                </li>
                            </ul>
                        </li>-->
                        <li>
                            <a href="#"><i class="fa fa-sitemap fa-fw"></i>Coordinación<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="ingresar_actividades.php">Ingresar Actividades</a>
                                </li>
                                <li>
                                    <a href="../coordinacion/ingresar_tareas.php">Ingresar Tareas</a>
                                </li>
                                <!--<li>
                                    <a href="../coordinacion/ingresar_asignaciones.html">Ingresar Asignaciones</a>
                                </li>-->
          
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-files-o fa-fw"></i>Avances<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="../avances/porcentaje_proyectos.html">Porcentaje de Proyectos</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>
        
   <link rel="stylesheet" type="text/css" href="../registros/css/select2.css">
    <script src="../../js/jquery-1.12.3.min.js"></script>
    <script src="../../js/select2.js"></script>
    
    <div id="page-wrapper">
    <!--<h3 class="text-center" style="border: 1px solid red;"> <small class="mensaje">123</small></h3>-->
    <div class="row">
    <div class="col-lg-12">
    <h1 class="page-header">Avances</h1>                    
    </div>
    <!-- /.col-lg-12 -->
    </div>
   

 
<form id="frmEditar" class="form-horizontal" action="" method="POST" >
 <div id="agrtar" class="col-sm-12 col-md-12 col-lg-12" class="modal fade" id="modalEditar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">


    <div class="modal-dialog" role="document">
    <div class="modal-content">

    <div class="modal-header">
        <button type="button" id="btnlistar" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

        <!--<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>-->

    <h4 class="modal-title" id="exampleModalLabel">Prioridad de Actividad</h4>
<div class="alert alert-danger text-center" style="display:none;" id="falla">
<p>Error</p>
</div>
<div class="alert alert-success text-center" style="display:none;" id="echo">
<p>Proridad Agregada</p>
</div>
    <div class="alert alert-warning text-center" style="display:none;" id="avacio">
<p>Debes escribir contenido en el campo vacio</p>
</div>
    </div>

    <div class="modal-body">

    <input type="hidden" id="id_avances" name="id_avances" value="0">
    <input type="hidden" id="opcion" name="opcion" value="modificar">
    <div class="form-group">
    <div class="col-sm-offset-1 col-sm-5">
    <label for="actividad">Actividad</label>
    <input id="actividad" name="actividad" type="text" class="form-control">
    </div>
    <div class="col-sm-offset-0 col-sm-5">
    <label>Prioridad</label>
<select  class="form-control" class="selectpicker" name="prioridad" id="prioridad" type="text" data-live-search="true">
        <option value="10">10</option>
        <option value="20">20</option>
        <option value="30">30</option>
        <option value="40">40</option>
        <option value="50">50</option>
        <option value="60">60</option>
        <option value="70">70</option>
        <option value="80">80</option>
        <option value="90">90</option>
        <option value="100">100</option>
    </select>

    </div>
    </div>

    <div class="form-group">
    <div class="col-sm-offset-1 col-sm-5">
    <label>Tareas</label>
    <input id="tare" name="tare" type="text" class="form-control">
    </div>
    <div class="col-sm-offset-0 col-sm-5">
    <label>Resultado por tareas</label>
    <input id="resul_x_tarea" name="resul_x_tarea" type="text" class="form-control">
    </div>
    </div>

    <div class="form-group">
    <div class="col-sm-offset-1 col-sm-5">
    <label>Realizando</label>
    <input id="realizado" name="realizado" type="text" class="form-control">
    </div>
    <div class="col-sm-offset-0 col-sm-5">
    <label>Total</label>
    <input id="total" name="total" type="text" class="form-control">
    </div>
    </div>

 
    <div class="form-group"><br>
    <div class="col-sm-offset-1 col-sm-5">
    <button type="button" class="btn btn-primary" onclick="modificar();">Guardar</button>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </form>



<form id="frmFin" class="form-horizontal" action="" method="POST" >
 <div id="editar" class="col-sm-12 col-md-12 col-lg-12" class="modal fade" id="modalFin" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">


    <div class="modal-dialog" role="document">
    <div class="modal-content">

    <div class="modal-header">
        <button type="button" id="btnlista" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

        <!--<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>-->

    <h4 class="modal-title" id="exampleModalLabel">Finalizar Actividad</h4>
<div class="alert alert-danger text-center" style="display:none;" id="fallas">
<p>Error</p>
</div>
<div class="alert alert-success text-center" style="display:none;" id="echos">
<p>Actividad Finalizada</p>
</div>
    <div class="alert alert-warning text-center" style="display:none;" id="avacios">
<p>Debes escribir contenido en el campo vacio</p>
</div>
    </div>

    <div class="modal-body">

    <input type="hidden" id="id_avances" name="id_avances" value="0">
    <input type="hidden" id="opcion" name="opcion" value="editar">
    <div class="form-group">
    <div class="col-sm-offset-1 col-sm-10">
    <label for="actividad">Actividad</label>
    <input id="actividad" name="actividad" type="text" class="form-control">
    </div>
    </div>
    <div class="form-group">
    <div class="col-sm-offset-1 col-sm-10">
    <label>Total</label>
    <input id="total" name="total" type="text" class="form-control">
    </div>
    </div> 
    <div class="form-group"><br>
    <div class="col-sm-offset-1 col-sm-5">
    <button type="button" class="btn btn-primary" onclick="edita();">Aceptar</button>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </form>



         <!-- /.row -->
 <div class="row">
        <div id="cuadro1" class="col-lg-12">
        <div class="panel panel-default">         

         
    <div style="padding: 0;" class="panel-heading">
    

    <p style="text-align: center; float: right; width:89%;" class="mensaje"></p>
    <p style="text-align: center; float: left; width:100%; color: #379911; display: none;" id="realizado">La tarea se ha editado</p>

    </div>
            <div class="panel-body">             
                <table id="tareas" class="table table-striped table-bordered table-hover"  cellspacing="0" width="100%">
                    <thead>
                        <tr>
                    <th>Actividad</th>
                    <th>Prioridad</th>
                    <th>Tareas</th>
                    <th>Res x tareas</th>
                    <th>Realizando</th> 
                    <th>Total</th>                           
                    <th></th>                                           
                        </tr>
                    </thead>  
                    <tbody>
                    </tbody>                  
                </table>
            </div>
            </div>          
        </div>      
    </div>
   

        </div>
            <!-- /.row -->
        </div>
   <!-- /#wrapper -->
</body>


    <!--<script src="../../js/jquery-1.12.3.min.js"></script>-->
    <!--<script src="../../js/jquery-1.12.3.js"></script>-->
    <script src="../../js/bootstrap.min.js"></script>
    <script src="../../js/jquery.dataTables.min.js"></script>
    <script src="../../js/dataTables.bootstrap.js"></script>
    <!--botones DataTables-->   
    <script src="../../js/dataTables.buttons.min.js"></script>
    <script src="../../js/buttons.bootstrap.min.js"></script>
    <!--Libreria para exportar Excel-->
    <script src="../../js/jszip.min.js"></script>
    <!--Librerias para exportar PDF-->
    <script src="../../js/pdfmake.min.js"></script>
    <script src="../../js/vfs_fonts.js"></script>
    <!--Librerias para botones de exportación-->
    <script src="../../js/buttons.html5.min.js"></script>        
    
    <script type="text/javascript" src="../../js/avance.js"></script>  

    <script src="../../boots/metisMenu/metisMenu.min.js"></script>
    <script src="../../dist/js/sb-admin-2.js"></script>


    

<script type="text/javascript">
    $(document).on("ready", function(){
            listar_tareas();
        });
        $("#detalles").on("click", function(){
            detalle(); 
        });
        $("#btn_listar").on("click", function(){
            listar_tareas();
        });
        $("#btn_lista").on("click", function(){
            listar_tareas();
        });
        $("#btnlistar").on("click", function(){
            listar_tareas();
        });
         $("#btnlista").on("click", function(){
            listar_tareas();
        });
    </script>

</html>
