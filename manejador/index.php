<?php 
    //para iniciar session
    session_start();
    //si la variable ssesion existe realizara las siguiente evaluacion 
    if (isset($_SESSION['usuario'])) {
        //si se ha logeado evaluamos si el usuario que aya ingresado intenta acceder a este directorio no es de tipo administrador, no le es permitido el acceso .. si tipo usuario es distinto de admin , entonces no tiene nada que hacer en este directorio 
        if($_SESSION['usuario']['privilegios'] != "manejador"){
            //y se redirecciona al directorio que le corresponde
            header("Location: ../");
            }
        }else{
            //si no exixte quiere decir que nadie se ha logeado y lo regsara al inicio (login)
            header('Location: ../');
        }
        $id = $_SESSION['usuario']['id_climan'];
        $idu = $_SESSION['usuario']['id_usuario'];
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
                            <a href="#"><i class="fa fa-wrench fa-fw"></i>Coordinación<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="asignaciones.php">Asignaciones</a>
                                </li>
                     
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                      
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
                        <li>
                        <a href="#"><i class="fa fa-files-o fa-fw"></i>Avances<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                        <li>
                        <a href="porcentaje_proyectos.php">Porcentaje de Proyectos</a>
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
                    <h1 class="page-header">Manejador</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-comments fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                            <div class="huge"><div id="nc"></div></div>
                                    <div>Nuevos Comentarios</div>
                                </div>
                            </div>
                        </div>
                        <a href="comentarios.php">
                            <div class="panel-footer">
                                <span class="pull-left">Ver Más</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-tasks fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><div id="actividad"></div></div>
                                    <div>Actividades</div>
                                </div>
                            </div>
                        </div>
                        <a href="actividad.php">
                            <div class="panel-footer">
                                <span class="pull-left">Ver Más</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
               <div class="col-lg-3 col-md-6">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-tasks fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><div id="tareas"></div></div>
                                    <div>Nuevas Tareas</div>
                                </div>
                            </div>
                        </div>
                        <a href="tarea.php">
                            <div class="panel-footer">
                                <span class="pull-left">Ver Más</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
            <div class="col-lg-3 col-md-6">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-tasks fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><div id="proyecto"></div></div>
                                    <div>N. Proyecto</div>
                                </div>
                            </div>
                        </div>
                        <a href="asignaciones.php">
                            <div class="panel-footer">
                                <span class="pull-left">Ver Más</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <!-- /.row -->
            <div class="row">
             
                <div class="col-lg-4">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-bell fa-fw"></i>Panel de Noticificaciones
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="list-group">
                                
                            <a href="#" class="list-group-item">
                            <i class="fa fa-comment fa-fw"></i>Nuevos Comentarios
                            <?php $sql = "SELECT count(*) as cont FROM comentario WHERE visto = 0 and id_usu = $idu"; $res = mysqli_query($conexion,$sql); ?> 
                            <span class="pull-right text-muted small"><em> <?php
                            while($resu = mysqli_fetch_row($res)){ echo $resu[0];}?></em>
                            </a>
                            <a href="#" class="list-group-item">
                            <i class="fa fa-envelope fa-fw"></i>Mensajes Enviados
                            <?php $sql = "SELECT count(*) as cont FROM comentario WHERE visto = 0 and id_climan = $idu"; $res = mysqli_query($conexion,$sql); ?> 
                            <span class="pull-right text-muted small"><em> <?php
                            while($resu = mysqli_fetch_row($res)){ echo $resu[0];}?></em>
                            </a>


                            <a href="#" class="list-group-item">
                            <i class="fa fa-tasks fa-fw"></i>Nuevas Tareas
                            <?php $sql = "SELECT count(*) as cont FROM proyecto INNER JOIN actividades ON idproyecto = id_pro INNER JOIN tareas ON id_activ = id_act WHERE id_man = $id and tareas.resultado = 0"; $res = mysqli_query($conexion,$sql); ?> 
                            <span class="pull-right text-muted small"><em> <?php
                            while($resu = mysqli_fetch_row($res)){ echo $resu[0];}?></em>
                            </a>
                                <!--<a href="#" class="list-group-item">
                                    <i class="fa fa-comment fa-fw"></i>Nuevos Comentarios
                                    <span class="pull-right text-muted small"><em>Hace 4 min</em>
                                    </span>
                                </a>
                                <a href="#" class="list-group-item">
                                    <i class="fa fa-twitter fa-fw"></i> 3 Nuevo Twitter
                                    <span class="pull-right text-muted small"><em>Hace 12 min</em>
                                    </span>
                                </a>
                                <a href="#" class="list-group-item">
                                    <i class="fa fa-envelope fa-fw"></i>Mensajes Enviados
                                    <span class="pull-right text-muted small"><em>Hace 27 min</em>
                                    </span>
                                </a>
                                <a href="#" class="list-group-item">
                                    <i class="fa fa-tasks fa-fw"></i>Nuevas Tareas
                                    <span class="pull-right text-muted small"><em>Hace 43 min</em>
                                    </span>
                                </a>-->
                           
                            </div>
                          
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    
                    </div>
                    <!-- /.panel .chat-panel -->
                </div>
                <!-- /.col-lg-4 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

        <!-- /#wrapper -->
</body>


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

                                    <div class="alert alert-warning text-center" style="display:none;" id="invalida">
                                    <p>Comprobación de contraseña no coicide</p>
                                    </div>

                                    <div class="alert alert-danger text-center" style="display:none;" id="falso">
                                    <p>Contraseña incorrecto</p>
                                    </div>

                                    <div class="alert alert-info text-center" style="display:none;" id="vacio">
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
                    <label for="pass" control-label">Nueva Contraseña</label>
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
    <script src="../boots/jquery/jquery.min.js"></script>
    <script src="../boots/bootstrap/js/bootstrap.min.js"></script>
    <script src="../boots/metisMenu/metisMenu.min.js"></script>
    <script src="../boots/raphael/raphael.min.js"></script>
    <script src="../boots/morrisjs/morris.min.js"></script>
    <script src="../data/morris-data.js"></script>
    <script src="../dist/js/sb-admin-2.js"></script>
    <script type="text/javascript" src="../js/actualizar.js"></script>
</html>
