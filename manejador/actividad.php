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

    <link rel="stylesheet" type="text/css" href="../calendario/tcal.css" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

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
                        <li><a href="../conexion/cerrar_sesion.php"><i class="fa fa-sign-out fa-fw"></i>Cerrar Sesión</a>
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
        
   <link rel="stylesheet" type="text/css" href="../administrador/registros/css/select2.css">
    <script src="../js/jquery-1.12.3.min.js"></script>
    <script src="../js/select2.js"></script>
    
    <div id="page-wrapper">
    <!--<h3 class="text-center" style="border: 1px solid red;"> <small class="mensaje">123</small></h3>-->
    <div class="row">
    <div class="col-lg-12">
    <h1 class="page-header">Actividades</h1>                    
    </div>
    <!-- /.col-lg-12 -->
    </div>
   

 <div id="agract">
<div class="container">
    <?php unset($_SESSION['consulta']);?>
    <div id="buscador"></div>
    <div id="tabla"></div>
  </div>
</div>


<script type="text/javascript">
    $(document).ready(function(){
        $('#tabla').load('tabla.php');
    $('#buscador').load('buscador.php');
    });
</script>






<form  class="form-horizontal" action="" method="POST" id="frmMasAct" name="formulario" onsubmit="return agregar_mas_actividad(this)" >
 <div id="agrmas" class="col-sm-12 col-md-12 col-lg-12" class="modal fade" id="modalAgrmas" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">

    <div class="modal-dialog" role="document">
    <div class="modal-content">

    <div class="modal-header">
        <button type="button" id="btn_lista" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

        <!--<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>-->

        <div class="cerrar"><a ><span class="icon-cross"></span></a></div>

    <h4 class="modal-title" id="exampleModalLabel">Agregar Actividad</h4>
<div class="alert alert-success text-center" style="display:none;" id="echo">
<p>Actividad registrada</p>
</div>
<div class="alert alert-danger text-center" style="display:none;" id="dange">
<p>La actividad ya esta registrada</p>
</div>

<div class="alert alert-warning text-center" style="display:none;" id="vacio">
<p>Debes escribir contenido en el campo vacio</p>
</div>

    </div>

    <div class="modal-body">

<input type="hidden" id="id_proyecto" name="id_proyecto" value="0">
<input type="hidden" id="id_activ" name="id_activ" value="0">
<input type="hidden" id="fter" name="fter">
<input type="hidden" id="opcion" name="opcion" value="registrar"> 

    <div class="form-group">   
    <div class="col-sm-offset-1 col-sm-10">
    <label for="nombre">Actividad</label>
    <input id="nombre_" name="nombre_" type="text" class="form-control" autofocus>
    </div>
    </div>

    <div class="form-group">   
    <div class="col-sm-offset-1 col-sm-5">
    <label for="finicio">Inicia actividad</label>
    <input id="finicio_" name="finicio_" type="text" class="form-control" disabled>
    </div>
    <div class="col-sm-offset-0 col-sm-5">
    <label for="ftermino">Finaliza actividad</label>
    <input id="ftermino_" name="ftermino_" type="text" class="tcal" class="form-control" autofocus><p class="col-sm-10" style="color: red; display: none; position: absolute; padding: 0;" id="fecha">Verifique fecha</p>
    </div>
    </div>

    <div class="form-group">    
    <div class="col-sm-offset-1 col-sm-10">
    <label for="descripción">Descripción actividad</label>
    <textarea rows="3" id="descripcion_" name="descripcion_" type="text" class="form-control" ></textarea></div>
    </div>  

    <div class="form-group"><br>
    <div class="col-sm-offset-1 col-sm-10">
    <button type="button" class="btn btn-primary" onclick="agregar_mas_actividad();">Guardar</button>
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
   
   <button type="button" style="color:blue;" class="btn btn-default" data-toggle="modal" onclick="AgregarActividad()"><i class="glyphicon glyphicon-plus"></i> Agregar Actividad</button>

    <p style="text-align: center; float: left; width:100%;" class="mensaje"></p>
    <p style="text-align: center; float: left; width:100%; color: #379911; display: none;" id="realizado">La actividad se ha editado</p>

    </div>
            <div class="panel-body">             
                <table id="actividad" class="table table-striped table-bordered table-hover"  cellspacing="0" width="100%">
                    <thead>
                        <tr>
                    <th>N°</th>
                    <th>Proyecto</th>
                    <th>Fecha inicio</th>
                    <th>Fecha termino</th>
                    <th>Actividades</th>                            
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
    <div>
        <form id="ActividadEliminar" action="" method="POST">
            <input type="hidden" id="id_activ" name="id_activ" value="">
            <input type="hidden" id="opcion" name="opcion" value="eliminar">
            <input type="hidden" id="id_pro" name="id_pro" value="">
            <!-- Modal -->
            <div class="modal fade" id="modalEliminar" tabindex="-1" role="dialog" aria-labelledby="modalEliminarLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <!--<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>-->
                            <h4 class="modal-title" id="modalActividadEliminarLabel">Eliminar Actividad</h4>
                        </div>
                        <div class="modal-body">                            
                            ¿Está seguro de eliminar esta actividad? <strong data-name=""></strong>
                                    
                        </div>
                        <div class="modal-footer">
                            <button type="button" id="eliminar-actividad" class="btn btn-primary" data-dismiss="modal">Aceptar</button>
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal -->
        </form>
    </div>


 <form id="frmDetalles" class="form-horizontal" action="" method="POST" >
 <div id="detact" class="col-sm-12 col-md-12 col-lg-12" class="modal fade" id="modalDetalles" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">  
    <div class="row">
    <div class="modal-body">    

    <div class="col-sm-offset-1 col-sm-11">

    <button type="button" id="btnlista" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true" class="glyphicon glyphicon-share-alt" ></span></button>
      
    <h4 class="modal-title" id="exampleModalLabel"></h4></div>

    <input type="hidden" id="idproyecto" name="idproyecto">    
    <input type="hidden" id="opcion" name="opcion" value="modificar">
    <div class="form-group">
    <div class="col-sm-offset-0 col-sm-4" >
    <label>Proyecto</label>:
    <input id="proyecto" name="proyecto" type="text"  class="form-control">
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
    </div>
     <div id="demo"></div>
<!--<div id="datos" ></div>-->
    </div>
    </div>   
    </form>

<form  class="form-horizontal" action="" method="POST" id="EditarActividad" name="formulario" >


 <div id="ediact" class="col-sm-12 col-md-12 col-lg-12" id="modalEditar" tabindex="-1" role="dialog">

    <div class="modal-dialog" role="document">
    <div class="modal-content">

  <div class="modal-header">
<button type="button" class="close" data-dismiss="modal" id="detalles" aria-label="Close"><span aria-hidden="true">&times;</span></button>
<h4 class="modal-title" id="exampleModalLabel">Editar Actividad</h4>
<!--<div class="alert alert-success text-center" style="display:none;" id="realizado">
<p>La actividad se ha editado</p>
</div>-->
<div class="alert alert-warning text-center" style="display:none;" id="aviso">
<p>Debes escribir contenido en el campo vacio</p>
</div>
<div class="alert alert-danger text-center" style="display:none;" id="alert">
<p>Error al editar actividad</p>
</div>
</div>

 <div class="modal-body">
<input type="hidden" id="id_activ" name="id_activ" value="0">
<input type="hidden" id="ffinal" name="ffinal" value="0">
<input type="hidden" id="opcion" name="opcion" value="modificar">

<div class="form-group">   
<div class="col-sm-offset-1 col-sm-10">
<label for="nombre">Nombre actividad</label>
<input id="nombre" name="nombre" type="text" class="form-control" autofocus>
</div>
</div>

    <div class="form-group">   
    <div class="col-sm-offset-1 col-sm-5">
    <label for="fecha_inicio">Inicia actividad</label>
    <input id="finicio" name="finicio" type="text">
    </div>
    <div class="col-sm-offset-0 col-sm-5">
    <label for="ftermino">Finaliza actividad</label>
    <input id="ftermino" name="ftermino" type="text" class="tcal" >
    <p class="col-sm-10" style="color: red; display: none; padding: 0; position: absolute; " id="fecha3">Verifique fecha</p>
    </div>
    </div>


<div class="form-group">
<div class="col-sm-offset-1 col-sm-10">
<label for="descripcion">Descripción actividad</label>
<textarea id="act_descrip" rows="3" name="act_descrip" type="text" class="form-control"></textarea>
</div>
</div>
<div class="form-group"><br>
<div class="col-sm-offset-1 col-sm-10">
<!--<input type="submit" class="btn btn-primary" value="Guardar">-->
<button type="button" class="btn btn-primary" onclick="editar_actividad();">Guardar</button>
</div>
</div>
</div>
   
    <!--<div class="form-group">
    <div class="col-sm-offset-2 col-sm-8">
    <button type="button" class="btn btn-primary" onclick="editar_actividades();">Guardar</button>
    </div>
    </div>-->
    </div>
    </div>
    </div>
    </form>

        </div>
            <!-- /.row -->
        </div>
   <!-- /#wrapper -->
</body>


    <!--<script src="../js/jquery-1.12.3.min.js"></script>-->
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
    
    <script type="text/javascript" src="../js/actividadcm.js"></script>  

    <script src="../boots/metisMenu/metisMenu.min.js"></script>
    <script src="../dist/js/sb-admin-2.js"></script>
    <script type="text/javascript" src="../calendario/tcal.js"></script> 

    

<script type="text/javascript">
    $(document).on("ready", function(){
            listar_actividades();
            eliminar_actividad();
        });
        $("#detalles").on("click", function(){
            detalle(); 
        });
        $("#btn_listar").on("click", function(){
            listar_actividades();
        });
        $("#btn_lista").on("click", function(){
            listar_actividades();
        });
        $("#btnlistar").on("click", function(){
            listar_actividades();
        });
         $("#btnlista").on("click", function(){
            listar_actividades();
        });
    </script>

</html>
