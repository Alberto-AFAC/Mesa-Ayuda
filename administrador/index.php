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

        //$idu = $_SESSION['usuario']['id_usuario'];
       $idu = $_SESSION['usuario']['id_usu'];
?>
<!DOCTYPE html>
<html lang="es">

<head>

    <meta name="tipo_contenido"  content="text/html;" http-equiv="content-type" charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Sistema</title>

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

    <link href="//oss.maxcdn.com/jquery.bootstrapvalidator/0.5.2/css/bootstrapValidator.min.css" rel="stylesheet"></link>
    <link rel="stylesheet" href="https://rawgit.com/Eonasdan/bootstrap-datetimepicker/master/build/css/bootstrap-datetimepicker.min.css"/>

    <link rel="stylesheet" type="text/css" href="../boots/bootstrap/css/select2.css"/>

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
                <?php include("../usuarios.php");?>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                   <?php //include("correos.php");?>
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
                        <li><a href="../conexion/session_cerrar.php"><i class="fa fa-sign-out fa-fw"></i>Cerrar Sesión</a>
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
                            <a href="./"><i class="glyphicon glyphicon-home"></i> Inicio</a>
                        </li>
                        <li>
                            <a href="#"><i class="glyphicon glyphicon-cog"></i> Registros<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="area"><i class="fa fa-list-alt"></i> Areas</a>
                                </li>
                            <li>
                                    <a href="usuarios"><i class="glyphicon glyphicon-user"></i> Usuarios</a>
                            </li>
                            <li>
                                    <a href="equipo"><i class="fa fa-desktop"></i> Equipos</a>
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

    <div id="page-wrapper">
 <div class="row">
                <div class="col-lg-12">
                     <img src="../img/afac.png" style="float: right; width: 90px;margin-top: 0.8em">
                     <h1 class="page-header">Administrador</h1>
                </div>

                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">


                <div class="col-lg-4 col-md-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-list fa-5x" style="color: green"></i>
                                </div>
                                <div class="col-xs-9 text-right text-success">
                                    <div class="huge"><div id="actividadds"></div></div>
                                    <div>Reportes</div>
                                </div>
                            </div>
                        </div>
                        <a href="#" style="color:#333;">
                            <div class="panel-footer">
                                <span class="pull-left">Ver Más</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
            
               <div class="col-lg-4 col-md-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-list fa-5x" style="color:#FFD700"></i>
                                </div>
                                <div class="col-xs-9 text-right text-warning">
                                    <div class="huge"><div id="tarea"></div></div>
                                    <div>Pendientes</div>
                                </div>
                            </div>
                        </div>
                        <a href="#" style="color: #333;">
                            <div class="panel-footer">
                                <span class="pull-left">Ver Más</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>

            <div class="col-lg-4 col-md-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-list fa-5x" style="color: red"></i>
                                </div>
                                <div class="col-xs-9 text-right text-danger">
                                    <div class="huge"><div id="proyectos"></div></div>
                                    <div>Realizando</div>
                                </div>
                            </div>
                        </div>
                        <a href="#" style="color: #333;">
                            <div class="panel-footer">
                                <span class="pull-left">Ver Más</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>



            <div class="row">
        <div id="cuadro1" class="col-lg-12">
        <div class="panel panel-default">         

          <div class="panel-body">

            <table class="table table-bordered" id="cliente" width="100%" cellspacing="0">
              <thead>
                    <thead>
                        <tr>                                
                            <th>N° Reporte</th>
                            <th>Nombre</th>
                            <th>Apellidos</th>
                            <th>Ubicación</th>
                            <th>Extensión</th>
                            <th>Fecha Reporte</th>
                            <th>Fecha Termino</th>
                            <th>Poceso</th>
                            <!--<th></th>-->
                        </tr>
                    </thead>  
                    <tbody>
                    </tbody>                  
                </table>
            </div>
            </div>          
        </div>      
    </div>


    <form id="frmEditar" class="form-horizontal" action="" method="POST">
    <div class="modal fade" id="modalEditar" class="col-sm-12 col-md-12 col-lg-12"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
        <div class="modal-dialog" role="document">
        <div class="col-md-8 col-md-offset-3">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" id="btnlistar" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="exampleModalLabel">Actualizar Contraseña</h4>
                                    <div class="alert alert-success text-center" style="display:none;" id="echo">
                                    <p>Contraseña actualizado</p>
                                    </div>

                                    <div class="alert alert-info text-center" style="display:none;" id="invalida">
                                    <p>Comprobación de contraseña no coicide</p>
                                    </div>

                                    <div class="alert alert-danger text-center" style="display:none;" id="falso">
                                    <p>Contraseña incorrecto</p>
                                    </div>

                                    <div class="alert alert-warning text-center" style="display:none;" id="vacio">
                                    <p>Debes escribir contenido en el campo vacio</p>
                                    </div>

                                    <div class="alert alert-danger text-center" style="display:none;" id="error">
                                    <p>No se pudo actualizar los datos</p>
                                    </div>
                </div>

            <div class="modal-body">
                <input type="hidden" id="id_usuario" name="id_usuario" value="<?php echo $_SESSION['usuario']['id_usuario'];?>">
                <input type="hidden" id="opcion" name="opcion" value="actualizar">
                    <div class="form-group">
                    <div class="col-sm-12">
                    <label for="usuario">Usuario</label>
                    <input id="usuario" name="usuario" type="text" class="form-control" value="<?php echo $_SESSION['usuario']['usuario'];?>" disabled>
                    </div>
                    </div> 
                    
                    <div class="form-group">
                    <div class="col-sm-12">
                    <label for="password">Contraseña</label>
                    <input id="password" name="password" type="text" class="form-control">
                    </div>
                    </div>
                    
                    <div class="form-group">
                    <div class="col-sm-12">
                    <label for="pass">Nueva Contraseña</label>
                    <input id="pass" name="pass" type="text" class="form-control">
                    </div>
                    </div>
                    <div class="form-group">
                    <div class="col-sm-12">
                    <label for="pass2">Repetir Contraseña</label>
                    <input id="pass2" name="pass2" type="text" class="form-control" >
                    </div>
                    </div>                     
            </div>            
                <div class="modal-footer">
                        <button type="button" class="btn btn-primary" onclick="actualizar();">Actualizar</button>
                </div>
            </div>
            </div>
        </div>
    </div>
</form>  

        </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
</body>


    <script src="../js/jquery-1.12.3.min.js"></script>
    <script src="../js/select2.js"></script>
    <!--<script src="js/jquery-1.12.3.js"></script>-->
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
<!--    <script type="text/javascript" src="calendario/tcal.js"></script> -->

    <script src="//oss.maxcdn.com/jquery.bootstrapvalidator/0.5.3/js/bootstrapValidator.min.js"></script>
<!--    <script type="text/javascript" src="valida/valida.js"></script>-->
    <script src="//oss.maxcdn.com/momentjs/2.8.2/moment.min.js"></script>
    <script src="https://rawgit.com/Eonasdan/bootstrap-datetimepicker/master/src/js/bootstrap-datetimepicker.js"></script>    
    <script type="text/javascript" src="../js/actualizar.js"></script>

</html>
