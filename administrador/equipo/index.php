<?php session_start();
//si la variable ssesion existe realizara las siguiente evaluacion 
    if (isset($_SESSION['usuario'])) {
        //si se ha logeado evaluamos si el usuario que aya ingresado intenta acceder a este directorio no es de tipo administrador, no le es permitido el acceso .. si tipo usuario es distinto de admin , entonces no tiene nada que hacer en este directorio 
        if($_SESSION['usuario']['privilegios'] != "admin"){
            //y se redirecciona al directorio que le corresponde
            header("Location: ../../");
            }
        }else{
            //si no exixte quiere decir que nadie se ha logeado y lo regsara al inicio (login)
            header('Location: ../../');
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

<!--     
    <link href="../../boots/metisMenu/metisMenu.min.css" rel="stylesheet">
    <link href="../../boots/morrisjs/morris.css" rel="stylesheet">
    <link href="../../boots/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">
    <link href="../../boots/datatables-responsive/dataTables.responsive.css" rel="stylesheet">
    <link href="//oss.maxcdn.com/jquery.bootstrapvalidator/0.5.2/css/bootstrapValidator.min.css" rel="stylesheet"></link>
    <link rel="stylesheet" href="https://rawgit.com/Eonasdan/bootstrap-datetimepicker/master/build/css/bootstrap-datetimepicker.min.css"/> -->



    <link href="../../boots/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../../dist/css/sb-admin-2.css" rel="stylesheet">
    <link href="../../boots/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="../../css/styles.css">
    <link rel="stylesheet" type="text/css" href="../../datas/dataTables.css">
    <script src="../../js/jquery-1.12.3.min.js"></script>
    <script type="text/javascript" src="../../js/equipo.js"></script>



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
                   <?php //include("../../php/correos.php");?>
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
                            <a href="../"><i class="glyphicon glyphicon-home"></i> Inicio</a>
                        </li>
                        <li>
                            <a href="#"><i class="glyphicon glyphicon-cog"></i> Registros<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="../area"><i class="fa fa-list-alt"></i> Areas</a>
                                </li>
                            <li>
                                    <a href="../usuarios"><i class="fa fa-users"></i> Usuarios</a>
                            </li>
                            <li>
                                    <a href="./"><i class="fa fa-desktop"></i> Equipos</a>
                            </li>
                            <li>
                                    <a href="../tecnico"><i class="fa fa-street-view"></i> Técnico</a>
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
<?php
    $queri = "SELECT gstNmpld,gstNombr,gstApell FROM personal ORDER BY gstIdper ASC";
    $result = mysqli_query($conexion2,$queri);
    $queri = "SELECT gstNmpld,gstNombr,gstApell FROM personal ORDER BY gstIdper ASC";
    $resul = mysqli_query($conexion2,$queri);  
    $queri = "SELECT gstNmpld,gstNombr,gstApell FROM personal ORDER BY gstIdper ASC";
    $resu = mysqli_query($conexion2,$queri);
?>
    <div id="page-wrapper">
            <!--<h3 class="text-center" style="border: 1px solid red;"> <small class="mensaje">123</small></h3>-->
            <div class="row">
                <div class="col-lg-12">
             <img src="../../img/afac.png" style="float: right; width: 90px;margin-top: 0.8em">
                    <h1 class="page-header">Equipo</h1>                    
                </div>
                <!-- /.col-lg-12 -->
            </div>
   <!--  <script src="../../js/jquery-1.12.3.min.js"></script> -->
 <div class="row">
<!--         <div id="cuadro1" class="col-lg-12">
        <div class="panel panel-default">                  
       <div style="padding: 0;" class="panel-heading">        
   <button type="button" style="color:blue;" class="btn btn-default" data-toggle="modal" onclick="RegisEquipo()"><i class="glyphicon glyphicon-hdd"></i> Agregar</button>
      <p style="text-align: center; float: left; width:100%;" class="mensaje"></p>
      </div>
               <div class="panel-body">             
                <table id="equipo" class="table table-bordered"  cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>N° Exp</th>                        
                            <th>Marca</th>
                            <th>Serie</th>
                            <th>Windows</th>
                            <th>Direccion</th>
                            <th>Ubicacion</th>
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
 -->    

                    <div id="list" class="col-lg-12">
                        <div class="panel panel-default">                  
                            <div style="padding: 0;" class="panel-heading"> 
<button title="Agregar equipo de computo" ttype="button" class="btn btn-default" data-toggle="modal" onclick="openEquipo()"><i class='fa fa-desktop text-info' ><b>+</b></i></button>
                                  <p style="padding: 0.5em; text-align: center; float: right; width:95%;" class="mensaje"></p>
                            </div>
                               <div class="panel-body" style="font-size: 12px;">             
                                    <table id="data-table-area" class="table table-striped table-bordered"></table>
                                </div>
                        </div>          
                    </div>

</div>


<!-- <form  class="form-horizontal" action="" method="POST" onsubmit="return registrar(this)">
    <div id="ProyectoRegistrar" class="col-sm-12 col-md-12 col-lg-12" class="modal fade" id="EditarModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
        <div class="modal-dialog-modi" role="document">
            <div class="modal-content">
                <div class="modal-header">

                <button type="button" onclick="location.href='./'" class="close" data-dismiss="modal" aria-label="Close" ><span style="color: black"  aria-hidden="true">&times;</span></button>
                <div class="cerrar"><a ><span class="icon-cross"></span></a></div>
                <h4 class="modal-title" id="exampleModalLabel">Agregar</h4>

                </div>
                
                <div class="modal-body">
                <input type="hidden" id="opcion" name="opcion" value="registrar">            
                <div class="form-group">
                <div class="col-sm-offset-1 col-sm-10">
                <label for="identificador">Identificador:</label>
                <input id="identificador" name="identificador" type="text" class="form-control">
                </div>
                </div>    
                <div class="form-group">
                <div class="col-sm-offset-1 col-sm-10">
                <label for="adscripcion">Área:</label>
                <input id="adscripcion" name="adscripcion" type="text" class="form-control">
                </div>
                </div>

                <input type="hidden" name="ideqpo" id="ideqpo" value="0">

                <div class="form-group"><br>
                <div class="col-sm-offset-1 col-sm-5">
                <button type="button" class="btn btn-primary" onclick="registrar();">Guardar</button>
                <button type="reset" class="btn btn-primary" id="boton">Vaciar</button>
                </div>
                <b><p class="alert alert-danger text-center padding error" id="error">El área ya esta registrada</p></b>
                <b><p class="alert alert-success text-center padding exito" id="exito">Área registrada</p></b>
                <b><p class="alert alert-warning text-center padding aviso" id="vacio">Llene campos vacíos</p></b>
                </div>                    
                </div>
            </div>
        </div>
    </div>
</form> -->


<form id="Frmeqpo" class="form-horizontal" action="" method="POST">
  <div class="col-sm-12 col-md-12 col-lg-12" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
   

<div class="modal-dialog-modi" role="document" style="/*margin-top: 7em;*/">
<div class="modal-content">
<div class="modal-header">
<button type="button" onclick="location.href='./'" class="close" data-dismiss="modal" aria-label="Close" ><span style="color: black"  aria-hidden="true">&times;</span></button>
<h4 class="modal-title" id="exampleModalLabel">
Agregar datos del  equipo </h4>  
</div>
            <div class="modal-body">
                <input type="hidden" id="id_equipo" name="id_equipo">
                <input type="hidden" id="opcion" name="opcion" value="actualizar">


                    <div class="form-group"> 
                    <div class="col-sm-12" >
                    <select style="width: 100%" class="form-control" class="selectpicker" id="nempleado" name="nempleado" type="text" data-live-search="true">
                   <option value="">Seleccione usuario</option>    
                    <option value="0">NO ASIGNADO</option> 
                    <?php while($usuario = mysqli_fetch_row($resu)):?>
                    <option value="<?php echo $usuario[0]?>"><?php echo $usuario[1].' '.$usuario[2]?></option>
                    <?php endwhile; ?>
                    </select>
                    <!-- <input type="hidden" name="cambio" id="cambio" > -->
                    </div>
                    </div>

                    <div class="form-group">                    
                    <div class="col-sm-4">
                    <label>Número SIGTIC</label>
                    <input id="num_sigtic" name="num_sigtic" type="text" class="form-control" class="disabled">
                    </div>
                    <div class="col-sm-4">
                    <label>Número de inventario</label>
                    <input id="num_invntraio" name="num_invntraio" type="text" class="form-control">
                    </div>                    
                    <div class="col-sm-4">
                    <label>Serie</label>
                    <input id="serie_cpu" name="serie_cpu" type="text" class="form-control">
                    </div>        
                    </div>
                    <div class="form-group">
                    <div class="col-sm-4">
                    <label>Modelo</label>
                    <input id="nombre_equipo" name="nombre_equipo" type="text" class="form-control">
                    </div> 
                    <div class="col-sm-4">
                    <label>Tipo del equipo</label>
                    <select  class="form-control" class="selectpicker" id="tipo_equipo" name="tipo_equipo" type="text" data-live-search="true">
                    <option value="0">Seleccione tipo equipo</option> 
                    <option value="LAP TOP ">LAP TOP </option>
                    <option value="ESCRITORIO">ESCRITORIO</option>
                    </select>
                    </div>
                    <div class="col-sm-4">
                    <label>Marca</label>    
                    <select class="form-control" selected="true" id="marca_cpu" name="marca_cpu">
                    <option value="" selected>SELECCIONE MARCA</option>
                    <option value="LENOVO">LENOVO</option>
                    <option value="DELL">DELL</option>
                    <option value="HP">HP</option>
                    <option value="OTRO">OTRO</option>
                    </select>
                    </div>
                    </div>
                     <div class="form-group">
                    <div class="col-sm-offset-0 col-sm-3">
                    <label>Versión Windows</label>
                    <select class="form-control" selected="true" id="version_windows" name="version_windows">                   
                    <option value="" selected>SELECCIONE</option>
                    <option value="WINDOWS 7" >WINDOWS 7</option>
                    <option value="WINDOWS 10" >WINDOWS 10</option>
                    <option value="LINUX" >LINUX</option> 
                    </select>                                
                    </div>
                    <div class="col-sm-offset-0 col-sm-3">
                    <label>Versión office</label>
                    <select class="form-control" selected="true" id="version_office" name="version_office">                   
                    <option value="" selected>SELECCIONE</option>
                    <option value="2016" >2016</option>
                    <option value="2010" >2010</option>
                    <option value="OTROS" >OTROS</option> 
                    </select>                                
                    </div>
                    <div class="col-sm-3">
                    <label>Procesador</label>       
                    <select class="form-control" selected="true" id="procesador" name="procesador">                   
                    <option value="" selected>SELECCIONE</option>
                    <option value="INTEL" >INTEL</option>
                    <option value="AMED" >AMED</option>
                    </select> 
                    </div>
                    <div class="col-sm-3">
                    <label>Velocidad del procesador</label>
                    <input id="velocidad_proc" name="velocidad_proc" type="text" class="form-control">
                    </div>
                     </div>   
                    <div class="form-group">
                    <div class="col-sm-4">
                    <label>Capacidad de disco duro</label>             
                    <select class="form-control" selected="true" id="disco_duro" name="disco_duro">                   
                    <option value="" selected>SELECCIONE</option>
                    <option value="250 GB" >250 GB</option>
                    <option value="320 GB" >320 GB</option>
                    <option value="500 GB" >500 GB</option>
                    <option value="1 TB" >1 TB</option>
                    </select> 
                    </div>
                    <div class="col-sm-4">
                    <label>Capacidad de memoria RAM</label>
                    <input id="memoria_ram" name="memoria_ram" type="text" class="form-control">
                    </div>                         
                    <div class="col-sm-4">
                    <label>Unidad de disco flash</label>
                    <input id="uni_disc_flax" name="uni_disc_flax" type="text" class="form-control">
                    </div>                    
                    </div>
                    <div class="form-group">
                    <div class="col-sm-4">
                    <label>Serie monitor</label>
                    <input id="serie_monitor" name="serie_monitor" type="text" class="form-control" >
                    </div>                                        
                    <div class="col-sm-4">
                    <label>Serie teclado</label>
                    <input id="serie_teclado" name="serie_teclado" type="text" class="form-control"  >
                    </div>
                    <div class="col-sm-4">
                    <label>Serie mouse</label>
                    <input id="serie_mouse" name="serie_mouse" type="text" class="form-control" >
                    </div> 
                    </div>
                    <div class="form-group">         
                    <div class="col-sm-4">
                    <label>Dirección IP</label>
                    <input id="direccion_ip" name="direccion_ip" type="text" class="form-control" >
                    </div>
                    <div class="col-sm-4">
                    <label>Servicio internet</label>
                    <input id="servicio_internet" name="servicio_internet" type="text" class="form-control" >
                    </div>                    
                    <div class="col-sm-4">
                    <label>Ubicación del equipo</label>
                    <select  class="form-control" class="selectpicker" name="ubicaeqpo" id="ubicaeqpo" type="text" data-live-search="true">
                    <option value="0">Selecione</option> 
                    <option value="Planta baja / vus">Planta baja / vus</option>
                    <option value="Piso m2">Piso m2</option>
                    <option value="Piso 1">Piso 1</option>
                    <option value="Piso 2">Piso 2</option>
                    <option value="Piso 3">Piso 3</option>
                    <option value="Piso 4">Piso 4</option>
                    <option value="Piso 7">Piso 7</option>
                    </select>
                    </div>
                    </div>


                    <div class="form-group"><br>
                    <div class="col-sm-offset-0 col-sm-5">
                    <button type="button" id="button" class="btn btn-green btn-lg" onclick="agrEqpo();">Aceptar</button>
                    </div>
                    <b><p class="alert alert-info text-center padding error" id="danger">Este equipo, existe en la base de datos </p></b>

                    <b><p class="alert alert-success text-center padding exito" id="success">¡Se agregaron los datos con éxito!</p></b>

                    <b><p class="alert alert-warning text-center padding aviso" id="empty">Es necesario agregar los datos que se solicitan </p></b>
                    </div>

            </div>            
            </div>
            </div>
    </div>
</form>


<form id="EqpoEliminar" action="" method="POST">
    <input type="hidden" id="ideqpo" name="ideqpo" value="">
    <input type="hidden" id="opcion" name="opcion" value="eliminar">
    <div class="modal fade" id="modalEliminar" tabindex="-1" role="dialog" aria-labelledby="modalEliminarLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="modalProyectoEliminarLabel">Eliminar equipo de  computo</h4>
                </div>
                <div class="modal-body">                            
                    ¿Está seguro de eliminar este equipo? <strong data-name=""></strong>           
                </div>
                <div class="modal-footer">
                    <button type="button" onclick="eliminareqpo();" class="btn btn-primary" data-dismiss="modal">Aceptar</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                </div>
            </div>
        </div>
    </div>
</form>

<form id="Edteqpo" class="form-horizontal" action="" method="POST">
  <div class="col-sm-12 col-md-12 col-lg-12" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
   

<div class="modal-dialog-modi" role="document" style="/*margin-top: 7em;*/">
<div class="modal-content">
<div class="modal-header">
<button type="button" onclick="location.href='./'" class="close" data-dismiss="modal" aria-label="Close" ><span style="color: black"  aria-hidden="true">&times;</span></button>
<h4 class="modal-title" id="exampleModalLabel">
Editar datos del  equipo </h4>  
</div>
            <div class="modal-body">
                <input type="hidden" id="idequipo" name="idequipo">

                    <div class="col-sm-12">
                    
                    ¿el equipo de cómputo pertenece al usuario?
                    <label for="SI">SI</label>
                    <input checked="checked" name="correct" type="radio" value="true" id="true" />
                    <label for="NO">NO</label>
                    <input name="correct" type="radio" value="false" id="false" />
                    </div>

                    <div class="form-group" id="usuario1" style="display: none;">

                    <div class="col-sm-12" >
                    <select style="width: 100%" class="form-control" class="selectpicker" id="n_empleado" name="n_empleado" type="text" data-live-search="true">
                   <option value="">Seleccione usuario a quien pertenece el equipo</option>    
                    <option value="0">NO ASIGNADO</option> 
                    <?php while($usuario = mysqli_fetch_row($result)):?>
                    <option value="<?php echo $usuario[0]?>"><?php echo $usuario[1].' '.$usuario[2]?></option>
                    <?php endwhile; ?>
                    </select>
                    <input type="hidden" name="cambio" id="cambio" >
                    </div>
 
<!--                     <div class="col-sm-4">
                    <select class="form-control" name="asign" id="asign">
                    <option value="x">SELECCIONE OPCIÓN</option>
                    <option value="asignado">Pertenece</option>
                    <option value="designado">No pertenece</option>
                    </select>
                    </div> -->                    
                    </div> 

                    <div class="form-group" id="usuario2">                       
                    <div class="col-sm-12">
                    <select style="width: 100%" class="form-control" class="selectpicker" id="n_emp" name="n_emp" type="text" data-live-search="true" disabled>
                    <option value="0">NO ASIGNADO</option> 
                    <?php while($row = mysqli_fetch_row($resul)):?>
                    <option value="<?php echo $row[0]?>" disabled><?php echo $row[1].' '.$row[2]?></option>
                    <?php endwhile; ?>
                    </select>
                    <input type="hidden" name="cambio" id="cambio" value="SI">
                    </div>
                    </div>

                    <div class="form-group">                    
                    <div class="col-sm-4">
                    <label>Número SIGTIC</label>
                    <input id="enum_sigtic" name="enum_sigtic" type="text" class="form-control" class="disabled">
                    </div>
                    <div class="col-sm-4">
                    <label>Número de inventario</label>
                    <input id="enum_invntraio" name="enum_invntraio" type="text" class="form-control">
                    </div>                    
                    <div class="col-sm-4">
                    <label>Serie</label>
                    <input id="eserie_cpu" name="eserie_cpu" type="text" class="form-control">
                    </div>        
                    </div>
                    <div class="form-group">
                    <div class="col-sm-4">
                    <label>Modelo</label>
                    <input id="enombre_equipo" name="enombre_equipo" type="text" class="form-control">
                    </div> 
                    <div class="col-sm-4">
                    <label>Tipo del equipo</label>
                    <select  class="form-control" class="selectpicker" id="etipo_equipo" name="etipo_equipo" type="text" data-live-search="true">
                    <option value="LAP TOP ">LAP TOP </option>
                    <option value="ESCRITORIO">ESCRITORIO</option>
                    </select>
                    </div>
                    <div class="col-sm-4">
                    <label>Marca</label>    
                    <select class="form-control" selected="true" id="emarca_cpu" name="emarca_cpu">
                    <option value="LENOVO">LENOVO</option>
                    <option value="DELL">DELL</option>
                    <option value="HP">HP</option>
                    <option value="OTRO">OTRO</option>
                    </select>
                    </div>
                    </div>
                     <div class="form-group">
                    <div class="col-sm-offset-0 col-sm-3">
                    <label>Versión Windows</label>
                    <select class="form-control" selected="true" id="eversion_windows" name="eversion_windows">
                    <option value="WINDOWS 7" >WINDOWS 7</option>
                    <option value="WINDOWS 10" >WINDOWS 10</option>
                    <option value="LINUX" >LINUX</option> 
                    </select>                                
                    </div>
                    <div class="col-sm-offset-0 col-sm-3">
                    <label>Versión office</label>
                    <select class="form-control" selected="true" id="eversion_office" name="eversion_office">                   
                    <option value="2016" >2016</option>
                    <option value="2010" >2010</option>
                    <option value="OTROS" >OTROS</option> 
                    </select>                                
                    </div>
                    <div class="col-sm-3">
                    <label>Procesador</label>       
                    <select class="form-control" selected="true" id="eprocesador" name="eprocesador">                   
                    <option value="INTEL" >INTEL</option>
                    <option value="AMED" >AMED</option>
                    </select> 
                    </div>
                    <div class="col-sm-3">
                    <label>Velocidad del procesador</label>
                    <input id="evelocidad_proc" name="evelocidad_proc" type="text" class="form-control">
                    </div>
                     </div>   
                    <div class="form-group">
                    <div class="col-sm-4">
                    <label>Capacidad de disco duro</label>             
                    <select class="form-control" selected="true" id="edisco_duro" name="edisco_duro">                   
                    <option value="250 GB" >250 GB</option>
                    <option value="320 GB" >320 GB</option>
                    <option value="500 GB" >500 GB</option>
                    <option value="1 TB" >1 TB</option>
                    </select> 
                    </div>
                    <div class="col-sm-4">
                    <label>Capacidad de memoria RAM</label>
                    <input id="ememoria_ram" name="ememoria_ram" type="text" class="form-control">
                    </div>                         
                    <div class="col-sm-4">
                    <label>Unidad de disco flash</label>
                    <input id="euni_disc_flax" name="euni_disc_flax" type="text" class="form-control">
                    </div>                    
                    </div>
                    <div class="form-group">
                    <div class="col-sm-4">
                    <label>Serie monitor</label>
                    <input id="eserie_monitor" name="eserie_monitor" type="text" class="form-control" >
                    </div>                                        
                    <div class="col-sm-4">
                    <label>Serie teclado</label>
                    <input id="eserie_teclado" name="eserie_teclado" type="text" class="form-control"  >
                    </div>
                    <div class="col-sm-4">
                    <label>Serie mouse</label>
                    <input id="eserie_mouse" name="eserie_mouse" type="text" class="form-control" >
                    </div> 
                    </div>
                    <div class="form-group">         
                    <div class="col-sm-4">
                    <label>Dirección IP</label>
                    <input id="edireccion_ip" name="edireccion_ip" type="text" class="form-control" >
                    </div>
                    <div class="col-sm-4">
                    <label>Servicio internet</label>
                    <input id="eservicio_internet" name="eservicio_internet" type="text" class="form-control" >
                    </div>                    
                    <div class="col-sm-4">
                    <label>Ubicación del equipo</label>
                    <select  class="form-control" class="selectpicker" name="eubicaeqpo" id="eubicaeqpo" type="text" data-live-search="true">
                    <option value="Planta baja / vus">Planta baja / vus</option>    
                    <option value="Piso m2">Piso m2</option>
                    <option value="Piso 1">Piso 1</option>
                    <option value="Piso 2">Piso 2</option>
                    <option value="Piso 3">Piso 3</option>
                    <option value="Piso 4">Piso 4</option>
                    <option value="Piso 7">Piso 7</option>
                    </select>
                    </div>
                    </div>

                    <div class="form-group"><br>
                    <div class="col-sm-offset-0 col-sm-5">
                    <button type="button" id="button" class="btn btn-green btn-lg" onclick="edtEqpo();">Aceptar</button>
                    </div>
                    <b><p class="alert alert-danger text-center padding error" id="danger1">Error al agregar datos del equipo </p></b>

                    <b><p class="alert alert-success text-center padding exito" id="success1">¡Se actualizaron los datos del equipo con éxito! </p></b>

                    <b><p class="alert alert-warning text-center padding aviso" id="empty1">Es necesario agregar los datos que se solicitan </p></b>
                    </div>

            </div>            
            </div>
            </div>
    </div>
</form>
</div>
        </div>
            <!-- /.row -->

    <!-- /#wrapper -->
</body>




<!-- <script src="../../js/jquery.dataTables.min.js"></script>
<script src="../../js/buttons.bootstrap.min.js"></script>
<script src="../../js/jszip.min.js"></script>
<script src="../../js/pdfmake.min.js"></script>
<script src="../../js/vfs_fonts.js"></script>
<script src="../../js/buttons.html5.min.js"></script>        
<script src="//oss.maxcdn.com/jquery.bootstrapvalidator/0.5.3/js/bootstrapValidator.min.js"></script>
<script src="//oss.maxcdn.com/momentjs/2.8.2/moment.min.js"></script>
<script src="https://rawgit.com/Eonasdan/bootstrap-datetimepicker/master/src/js/bootstrap-datetimepicker.js"></script>    
 --><link rel="stylesheet" type="text/css" href="../../css/styles.css">
<script type="text/javascript" src="../../js/funciones.js"></script>

<script src="../../js/jquery-1.12.3.min.js"></script>
<script src="../../js/select2.js"></script>
<script src="//cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<script src="../../js/bootstrap.min.js"></script>
<script src="../../js/dataTables.bootstrap.js"></script>
<script src="../../js/dataTables.buttons.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="../../boots/metisMenu/metisMenu.min.js"></script>
<script src="../../dist/js/sb-admin-2.js"></script>

<link rel="stylesheet" type="text/css" href="../../boots/bootstrap/css/select2.css">
<script type="text/javascript">
$(document).ready(function(){
  $('#n_empleado').select2();
  $('#nempleado').select2();
}); 
</script>
<script src="../../js/select2.js"></script> 

  <script type="text/javascript">
        var dataSet = [
        <?php

        $queri = "SELECT * FROM personal ORDER BY gstIdper ASC";
    $resultados = mysqli_query($conexion2,$queri);
    while($dato = mysqli_fetch_array($resultados)){
       $id = $dato['gstIdper'];
       $nombre = $dato['gstNombr'].' '.$dato['gstApell'];

       


          $query = "SELECT * FROM equipo 
                INNER JOIN asignacion ON id_equi = id_equipo 
                WHERE equipo.estado = 0 ORDER BY id_equipo ASC";
             $resultado = mysqli_query($conexion, $query);
             $n=0;
        while($data = mysqli_fetch_array($resultado)){
           $n++;
           $id = $data['id_equipo'];
  //          $data['identificador'];
    //        $data['adscripcion'];

if($data['proceso']=='asignado' && $data['n_emp']==$dato['gstNmpld'] && $dato['estado']==0){   ?>    
    
    ['<?php echo $n?>','<?php echo $data['num_invntraio']?>','<?php echo $data['num_sigtic']?>','<?php echo $data['marca_cpu']?>','<?php echo $data['serie_cpu']?>','<?php echo $nombre?>',"<?php if($data['num_invntraio'] == '0'){

echo "<a title='Faltan datos del equipo' href='javascript:openEqpo()' onclick='eqpoedit({$id})' class='detalle btn btn-default'><i class='fa fa-desktop text-info'></i></a> <button title='Eliminar equipo' type='button' class='eliminar btn btn-default' data-toggle='modal' data-target='#modalEliminar' onclick='eliminar({$id})'><li class='fa fa-trash-o text-danger'></li></button> ";
}else{
echo "<a title='Editar equipo de computo' href='javascript:openEqpo()' onclick='eqpoedit({$id})' class='detalle btn btn-success'><i class='fa fa-desktop'></i></a> <button title='Eliminar equipo' type='button' class='eliminar btn btn-default' data-toggle='modal' data-target='#modalEliminar' onclick='eliminar({$id})'><li class='fa fa-trash-o text-danger'></li></button> ";
}
    ?>"],

<?php 
}else if($data['proceso']=='asignado' && $data['n_emp']==$dato['gstNmpld'] && $dato['estado']==1){   ?> 

    ['<?php echo $n?>','<?php echo $data['num_invntraio']?>','<?php echo $data['num_sigtic']?>','<?php echo $data['marca_cpu']?>','<?php echo $data['serie_cpu']?>','<p style="color:red;"><?php echo $nombre.'<br> YA NO LABORA '?></p>',"<?php if($data['num_invntraio'] == '0'){

echo "<a title='Faltan datos del equipo' href='javascript:openEqpo()' onclick='eqpoedit({$id})' class='detalle btn btn-default'><i class='fa fa-desktop text-info'></i></a> <button title='Eliminar equipo' type='button' class='eliminar btn btn-default' data-toggle='modal' data-target='#modalEliminar' onclick='eliminar({$id})'><li class='fa fa-trash-o text-danger'></li></button> ";
}else{
echo "<a title='Editar equipo de computo' href='javascript:openEqpo()' onclick='eqpoedit({$id})' class='detalle btn btn-success'><i class='fa fa-desktop'></i></a> <button title='Eliminar equipo' type='button' class='eliminar btn btn-default' data-toggle='modal' data-target='#modalEliminar' onclick='eliminar({$id})'><li class='fa fa-trash-o text-danger'></li></button> ";
}
    ?>"],



<?php }else if($data['proceso']=='designado' && $dato['gstIdper'] ==1){ ?>

    ['<?php echo $n?>','<?php echo $data['num_invntraio']?>','<?php echo $data['num_sigtic']?>','<?php echo $data['marca_cpu']?>','<?php echo $data['serie_cpu']?>','<?php echo 'NO ASIGNADO'?>',"<?php if($data['num_invntraio'] == '0'){

echo "<a title='Faltan datos del equipo' href='javascript:openEqpo()' onclick='eqpoedit({$id})' class='detalle btn btn-default'><i class='fa fa-desktop text-info'></i></a> <button title='Eliminar equipo' type='button' class='eliminar btn btn-default' data-toggle='modal' data-target='#modalEliminar' onclick='eliminar({$id})'><li class='fa fa-trash-o text-danger'></li></button> ";
}else{
echo "<a title='Editar equipo de computo' href='javascript:openEqpo()' onclick='eqpoedit({$id})' class='detalle btn btn-success'><i class='fa fa-desktop'></i></a> <button title='Eliminar equipo' type='button' class='eliminar btn btn-default' data-toggle='modal' data-target='#modalEliminar' onclick='eliminar({$id})'><li class='fa fa-trash-o text-danger'></li></button> ";
}
    ?>"],

<?php } 
}
}?>
];

var tableGenerarReporte = $('#data-table-area').DataTable({
    "language": {
    "searchPlaceholder": "Buscar datos...",
    "url": "//cdn.datatables.net/plug-ins/1.10.25/i18n/Spanish.json"
    },
    orderCellsTop: true,
    fixedHeader: true,
    data: dataSet,
    columns: [
    {title: "N°"},
    {title: "N° INVENTARIO"},    
    {title: "N° SIGTIC"},
    {title: "MARCA"},
    {title: "N° SERIE"},
    {title: "ASIGNADO"},
    {title: "ACCIÓN"}

    ],
    });

    </script>

</html>
