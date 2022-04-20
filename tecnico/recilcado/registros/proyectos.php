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

    <link rel="stylesheet" type="text/css" href="calendario/tcal.css" />

    <link href="//oss.maxcdn.com/jquery.bootstrapvalidator/0.5.2/css/bootstrapValidator.min.css" rel="stylesheet"></link>
    <link rel="stylesheet" href="https://rawgit.com/Eonasdan/bootstrap-datetimepicker/master/build/css/bootstrap-datetimepicker.min.css
"/>

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
                        <li><a href="../../../gestor/conexion/cerrar_sesion.php"><i class="fa fa-sign-out fa-fw"></i>Cerrar Sesión</a>
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
                                    <a href="proyectos.php">Proyectos</a>
                                </li>
                                <li>
                                    <a href="clientes.php">Clientes</a>
                                </li>
                                <li>
                                    <a href="manejador.php">Manejador</a>
                                </li>                  
                                <li>
                                    <a href="categorias.php">categorias</a>
                                </li>
                                <li>
                                    <a href="usuarios.php">Usuarios</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <!--<li>
                            <a href="#"><i class="fa fa-wrench fa-fw"></i><span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="../coordinacion/actividades.html">Actividades</a>
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
                                    <a href="../coordinacion/ingresar_actividades.php">Ingresar Actividades</a>
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

    <div id="page-wrapper">
            <!--<h3 class="text-center" style="border: 1px solid red;"> <small class="mensaje">123</small></h3>-->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Proyecto</h1>                    
                </div>
                <!-- /.col-lg-12 -->
            </div>

    <link rel="stylesheet" type="text/css" href="css/select2.css">
    <script src="../../js/jquery-1.12.3.min.js"></script>
    <script src="../../js/select2.js"></script>
    <?php

$sql = "SELECT id_manejador, nombre, apellidos FROM manejador WHERE estado = 1";
$m = mysqli_query($conexion,$sql);

$sql = "SELECT id_manejador, nombre, apellidos FROM manejador WHERE estado = 1";
$manej = mysqli_query($conexion,$sql);

$sql = "SELECT id_categoria, nombre FROM categoria WHERE estado = 1";
$c = mysqli_query($conexion,$sql); 

$sql = "SELECT id_categoria, nombre FROM categoria WHERE estado = 1";
$categ = mysqli_query($conexion,$sql);    

$sql = "SELECT id_cliente, nombre, apellidos FROM cliente WHERE estado = 1";
$cl = mysqli_query($conexion,$sql);

$sql = "SELECT id_cliente, nombre, apellidos FROM cliente WHERE estado = 1";
$clien = mysqli_query($conexion,$sql);

  ?>
  
         <!-- /.row -->

 <form  class="form-horizontal" action="" method="POST" id="registrationForm" onsubmit="return registrar(this)" >
 <div id="cuadro2" class="col-sm-12 col-md-12 col-lg-12" class="modal fade" id="ProyectoRegistrar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">


    <div class="modal-dialog" role="document">
    <div class="modal-content">

    <div class="modal-header">
        <button type="button" id="btn_listar" class="close" data-dismiss="modal" aria-label="Close"><a href="proyectos.php"><span aria-hidden="true">&times;</span></a></button>

        <!--<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>-->

        <div class="cerrar"><a ><span class="icon-cross"></span></a></div>

    <h4 class="modal-title" id="exampleModalLabel">Agregar Proyecto</h4>
<div class="alert alert-danger text-center" style="display:none;" id="error">
<p>El proyecto ya esta registrado</p>
</div>
<div class="alert alert-success text-center" style="display:none;" id="exito">
<p>Proyecto registrado</p>
</div>
    <div class="alert alert-warning text-center" style="display:none;" id="vacio">
<p>Debes escribir contenido en el campo vacio</p>
</div>
    </div>

    <div class="modal-body">

    <input type="hidden" id="id_cliente" name="id_cliente" value="0">
    <input type="hidden" id="opcion" name="opcion" value="registrar">
        
    <div class="form-group">
    <div class="col-sm-offset-1 col-sm-5">
    <label for="nombre">Nombre</label>
    <input id="nombre" name="nombre" type="text" class="form-control">
    </div>
    <div class="col-sm-offset-0 col-sm-5">
    <label for="id_cli">Cliente</label>
   <select  class="form-control" class="selectpicker" name="id_cli" id="id_cli" type="text" data-live-search="true">
    <option value="0">Selecione cliente</option>
    <?php while($cli = mysqli_fetch_row($cl)):?>
      <option value="<?php echo $cli[0]?>"><?php echo utf8_decode($cli[1])." ".utf8_decode($cli[2])?></option>
    <?php endwhile; ?>
    </select>
    </div>
    </div>

    <div class="form-group">
    <div class="col-sm-offset-1 col-sm-5">
    <label for="id_cli">Categoria</label>
    <select  class="form-control" class="selectpicker" name="id_cat" id="id_cat" type="text" data-live-search="true">
    <option value="0">Selecione categoria</option>
    <?php while($cat = mysqli_fetch_row($c)):?>
      <option value="<?php echo $cat[0]?>"><?php echo utf8_decode($cat[1])?></option>
    <?php endwhile; ?>
    </select>
    </div>
    <div class="col-sm-offset-0 col-sm-5">
    <label for="id_cli">Manejador</label>
    <select  class="form-control" class="selectpicker" name="id_man" id="id_man" type="text" data-live-search="true">
    <option value="0">Selecione manejador</option>
    <?php while($man = mysqli_fetch_row($m)):?>
      <option value="<?php echo $man[0]?>"><?php echo utf8_decode($man[1])." ".utf8_decode($man[2])?></option>
    <?php endwhile; ?>
    </select>
    </div>
    </div>

    <div class="form-group">
    <div class="col-sm-offset-1 col-sm-5">
    <label for="fecha_inicio">Fecha Inicio</label>
    <input id="fecha_inicio" name="fecha_inicio" type="text" class="tcal" class="form-control">
    </div>
    <div class="col-sm-offset-0 col-sm-5">
    <label for="fecha_termino">Fecha Termino</label>
    <input id="fecha_termino" name="fecha_termino" type="text" class="tcal" class="form-control" >
    </div>
    </div>

    <div class="form-group">
    <div class="col-sm-offset-1 col-sm-10">
    <label for="descripcion">Descripcion</label>
    <textarea for="descripcion" rows="3" id="descripcion" name="descrip" type="text" class="form-control"></textarea>
    </div>
    </div>
 
    <div class="form-group"><br>
    <div class="col-sm-offset-1 col-sm-5">
    <button type="button" class="btn btn-primary" onclick="registrar();">Guardar</button>
    <button type="reset" class="btn btn-primary" id="boton">Vaciar</button>
    </div>
    </div>
    </div>
   
    </div>
    </div>
    </div>
    </form>
<script type="text/javascript">
    $(document).ready(function(){
            $('#id_cli').select2();
    });
    $(document).ready(function(){
            $('#id_cat').select2();
    });
    $(document).ready(function(){
            $('#id_man').select2();
    });
</script>
 

 <div class="row">
        <div id="cuadro1" class="col-lg-12">
        <div class="panel panel-default">         

         
        <div style="padding: 0;" class="panel-heading">
        

        <!-- <p style="text-align: center; float: left; width:90%; " class="mensaje"></p>-->

   <button type="button" style="color:blue;" class="btn btn-default" data-toggle="modal" onclick="ProyectoRegistrar()"><i class="glyphicon glyphicon-plus"></i> Agregar</button>

      <button type="button" style="color:blue;" class="btn btn-default"><a href="proyectos.php"><i class="glyphicon glyphicon-refresh"></i></a></button>

      <p style="text-align: center; float: right; width:89%; " class="mensaje"></p>
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
                            <th>Cliente</th>
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
    <div>

 <form id="frmEditar" class="form-horizontal" action="" method="POST" >
 <div id="cuadro3" class="col-sm-12 col-md-12 col-lg-12" class="modal fade" id="modalEditar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">


    <div class="modal-dialog" role="document">
    <div class="modal-content">

    <div class="modal-header">
        <button type="button" id="btnlistar" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

        <!--<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>-->

    <h4 class="modal-title" id="exampleModalLabel">Actualizar Proyecto</h4>
<div class="alert alert-danger text-center" style="display:none;" id="falla">
<p>Error no se pudo actualizar proyecto</p>
</div>
<div class="alert alert-success text-center" style="display:none;" id="echo">
<p>Proyecto actualizado</p>
</div>
    <div class="alert alert-warning text-center" style="display:none;" id="avacio">
<p>Debes escribir contenido en el campo vacio</p>
</div>
    </div>

    <div class="modal-body">

    <input type="hidden" id="idproyecto" name="idproyecto" value="0">
    <input type="hidden" id="opcion" name="opcion" value="modificar">
    <div class="form-group">
    <div class="col-sm-offset-1 col-sm-5">
    <label for="nombre">Nombre</label>
    <input id="nombre" name="nombre" type="text" class="form-control">
    </div>
    <div class="col-sm-offset-0 col-sm-5">
    <label for="id_cli">Cliente</label>
   <select  class="form-control" class="selectpicker" name="id_cli" id="id_cli" type="text" data-live-search="true">

    <?php while($clie = mysqli_fetch_row($clien)):?>
      <option value="<?php echo $clie[0]?>"><?php echo utf8_decode($clie[1])."".utf8_decode($clie[2])?></option>
    <?php endwhile; ?>
    </select>
    </div>
    </div>

    <div class="form-group">
    <div class="col-sm-offset-1 col-sm-5">
    <label for="id_cli">Categoria</label>
    <select  class="form-control" class="selectpicker" name="id_cat" id="id_cat" type="text" data-live-search="true">
  
    <?php while($cate = mysqli_fetch_row($categ)):?>
      <option value="<?php echo $cate[0]?>"><?php echo utf8_decode($cate[1])?></option>
    <?php endwhile; ?>
    </select>
    </div>
    <div class="col-sm-offset-0 col-sm-5">
    <label for="id_cli">Manejador</label>
    <select  class="form-control" class="selectpicker" name="id_man" id="id_man" type="text" data-live-search="true">

    <?php while($mane = mysqli_fetch_row($manej)):?>
      <option value="<?php echo $mane[0]?>"><?php echo utf8_decode($mane[1])."".utf8_decode($mane[2])?></option>
    <?php endwhile; ?>
    </select>
    </div>
    </div>

    <div class="form-group">
    <div class="col-sm-offset-1 col-sm-5">
    <label for="finicio">Fecha Inicio</label>
    <input id="finicio" name="finicio" type="text" class="tcal" class="form-control">
    </div>
    <div class="col-sm-offset-0 col-sm-5">
    <label for="ftermino">Fecha Termino</label>
    <input id="ftermino" name="ftermino" type="text" class="tcal" class="form-control" >
    </div>
    </div>

    <div class="form-group">
    <div class="col-sm-offset-1 col-sm-10">
    <label for="descripcion">Descripcion</label>
    <textarea  rows="3" id="descripcion" name="descrip" type="text" class="form-control"></textarea>
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




        <form id="ProyectoEliminar" action="" method="POST">
            <input type="hidden" id="idproyecto" name="idproyecto" value="">
            <input type="hidden" id="opcion" name="opcion" value="eliminar">
            <!-- Modal -->
            <div class="modal fade" id="modalEliminar" tabindex="-1" role="dialog" aria-labelledby="modalEliminarLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <!--<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>-->
                            <h4 class="modal-title" id="modalProyectoEliminarLabel">Eliminar proyecto</h4>
                        </div>
                        <div class="modal-body">                            
                            ¿Está seguro de eliminar este proyecto? <strong data-name=""></strong>
                        <!--<input id="nombre" name="nombre" />-->              
                        </div>
                        <div class="modal-footer">
                            <button type="button" id="eliminar-proyecto" class="btn btn-primary" data-dismiss="modal">Aceptar</button>
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal -->
        </form>

<style type="text/css">
#frmDetalles input,textarea{ border: 1px solid transparent; }
</style>
 <form id="frmDetalles" class="form-horizontal" action="" method="POST" >
 <div id="cuadro4" class="col-sm-12 col-md-12 col-lg-12" class="modal fade" id="modalDetalles" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">


    
    <div class="row">
    <div class="modal-body">

    <div class="col-sm-offset-1 col-sm-10">

    <button type="button" id="btnslista" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true" class="glyphicon glyphicon-share-alt" ></span></button>
      
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
    <div class="col-sm-offset-1 col-xs-3">
    <label for="nombre">Cliente</label>:
    <input id="cnombre" name="cnombre" type="text" class="form-control">
    </div>

    <div class="col-sm-offset-0 col-xs-3">
    <label style="color: transparent;">.</label>
    <input id="capellido" name="capellido" type="text" class="form-control">
    </div>
    
    <div class="col-sm-offset-0 col-xs-4">
    <label for="nombre">Correo</label>:
    <input id="ccorreo" name="ccorreo" type="text" class="form-control">  
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
     <textarea style="border: 1px solid transparent;" id="cat_descrip" name="cat_descrip" type="text" class="form-control"></textarea>
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
    <label for="finicio">Fecha Inicio</label>:
    <input id="finicio" name="finicio" type="text" class="form-control">
    </div>
    <div class="col-sm-offset-0 col-sm-5">
    <label for="ftermino">Fecha Termino</label>:
    <input id="ftermino" name="ftermino" type="text" class="form-control" >
    </div>
    </div>

    <div class="form-group">
    <div class="col-sm-offset-1 col-sm-10">
    <label for="descripcion">Descripción Proyecto</label>:
    <textarea style="border: 1px solid transparent;" rows="3" id="descripcion" name="descrip" type="text" class="form-control"></textarea>
    </div>
    </div>
 
<!--<div id="datos" ></div>-->


    </div>
    </div>
    
    </div>
    </form>


    </div>

        </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
</body>


    <!--<script src="js/jquery-1.12.3.js"></script>-->
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
    <script type="text/javascript" src="../../js/proyectos.js"></script>

    <script src="../../boots/metisMenu/metisMenu.min.js"></script>
    <script src="../../dist/js/sb-admin-2.js"></script>
    <script type="text/javascript" src="calendario/tcal.js"></script> 

    <script src="//oss.maxcdn.com/jquery.bootstrapvalidator/0.5.3/js/bootstrapValidator.min.js"></script>
    <script type="text/javascript" src="valida/valida.js"></script>
    <script src="//oss.maxcdn.com/momentjs/2.8.2/moment.min.js"></script>
    <script src="https://rawgit.com/Eonasdan/bootstrap-datetimepicker/master/src/js/bootstrap-datetimepicker.js"></script>    

     
    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).on("ready", function(){
            listar_proyecto();
            eliminar_proyecto();

         
           // modificar();
        });
        //llamdo id de boton, evento clic que desencadenara la una funcio
        $("#btn_listar").on("click", function(){
            //llamar la funcion listar
            listar_proyecto();
            //nota aparecera una ventana mencionando que no se puede reinicializar la tabla de datos, para que no cuseda eso vamos a la estructura de la funcion listar mencionamos una propiedad llamada destroy, la cual aceptara la actualizacion de reiniciar la tabla de datos
        });
         $("#btnlistar").on("click", function(){
            listar_proyecto();
        });$("#btnslista").on("click", function(){
            listar_proyecto();
        });

    </script>

</html>
