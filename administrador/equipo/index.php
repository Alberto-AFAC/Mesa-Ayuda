<?php session_start();
include ("../../../gestor/conexion/conexion.php");
include("../../conexion/conexion.php"); 
session_start();
if (isset($_SESSION['usuario'])) 
{ 
$idu = $_SESSION['usuario']['id_usu'];
}else{ header('Location: ../../gestor'); }

    include('../distroy.php');
 
     
?>
<!DOCTYPE html>
<html lang="es">

<head>

    <meta name="tipo_contenido"  content="text/html;" http-equiv="content-type" charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
<link rel="stylesheet" type="text/css" href="../../../gestor/css/responsive.css">
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
    <link rel="stylesheet" href="https://cdn.datatables.net/rowreorder/1.2.8/css/rowReorder.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.dataTables.min.css">
    <script src="../../js/jquery-1.12.3.min.js"></script>
    <script type="text/javascript" src="../../js/equipo.js"></script>
</head>

<body>
<div class="loader"></div>

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
                <?php include('../notif.php');?>
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a id="icon-usu" class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                    <!--<li><a href="#" type="button" data-toggle="modal" data-target="#modalEditar"><i class="fa fa-pencil-square-o"></i> Actualizar</a>
                    </li>-->
                        <li><a href="../../../gestor/conexion/cerrar_sesion.php"><i class="fa fa-sign-out fa-fw"></i>CERRAR SESIÓN</a>
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
                            <a href="../"><i class="glyphicon glyphicon-home"></i> INICIO</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-gears"></i> REGISTROS<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <!-- <li>
                                    <a href="../area"><i class="fa fa-list-alt"></i> Areas</a>
                                </li> -->
                            <li>
                                    <a href="../usuarios"><i class="fa fa-users"></i> USUARIOS</a>
                            </li>
                            <li>
                                    <a href="./"><i class="fa fa-desktop"></i> EQUIPOS <span class="fa arrow"></span></a>
                                    <ul class="nav nav-second-level"><li><a href="../asignar"> POR ASIGNAR</a></li></ul>
                            </li>
                            <li>
                                    <a href="../tecnico"><i class="fa fa-street-view"></i> TÉCNICO</a>
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
    $queri = "SELECT gstNmpld,gstNombr,gstApell FROM personal ORDER BY gstIdper DESC";
    $result = mysqli_query($conexion2,$queri);
    $queri = "SELECT gstNmpld,gstNombr,gstApell FROM personal ORDER BY gstIdper DESC";
    $resul = mysqli_query($conexion2,$queri);  
    $queri = "SELECT gstNmpld,gstNombr,gstApell FROM personal ORDER BY gstIdper DESC";
    $resu = mysqli_query($conexion2,$queri);
?>
    <div id="page-wrapper">
            <!--<h3 class="text-center" style="border: 1px solid red;"> <small class="mensaje">123</small></h3>-->
            <div class="row">
                <div class="col-lg-12" id="header">
             <img src="../../img/afac.png" style="float: right; width: 90px;margin-top: 0.8em">
                    <h1 class="page-header">EQUIPOS ASIGNADOS </h1>                    
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

<?php

$query="SELECT direccion_ip, count(*) AS ttlip FROM equipo WHERE direccion_ip!=0 AND estado = 0 GROUP BY direccion_ip HAVING COUNT(*)>1";
 $resultados = mysqli_query($conexion,$query);
$ttlip = 0;
while ($per = mysqli_fetch_row($resultados)) {
         // echo $per[0];
         // echo '<br>';
         $ttlip++;
}

$query="SELECT num_invntraio, count(*) AS ttlip FROM equipo WHERE estado = 0 GROUP BY num_invntraio HAVING COUNT(*)>1";
 $resultados = mysqli_query($conexion,$query);
$ttlin = 0;
while ($per = mysqli_fetch_row($resultados)) {
         // echo $per[0];
         // echo '<br>';
         $ttlin++;
}

// $query="SELECT * FROM equipo WHERE direccion_ip = '$direccion_ip' AND estado = 0 || serie_cpu = '$serie_cpu' AND estado = 0";
//  $resultados = mysqli_query($conexion,$query);
//  if($resultados->num_rows == 0){

//  }else{

//  }

?>



                    <div id="list" class="col-lg-12">
                        <div class="panel panel-default">                  
                            <div style="padding: 0;" class="panel-heading"> 
<button title="Agregar equipo de computo" ttype="button" class="btn btn-default" data-toggle="modal" onclick="openEquipo()"><i class='fa fa-desktop text-info' ><b>+</b></i></button>

<?php if($ttlip!=0){ ?>
<button title="Dirección IP duplicado" ttype="button" class="btn btn-warning" data-toggle="modal" onclick="openDireccion()"><i class='fa fa-warning' ><b> IP</b></i></button>
<?php } ?>

<?php if($ttlin!=0){ ?>
<button title="Numero de inventario duplicado" ttype="button" class="btn btn-warning" data-toggle="modal" onclick="openInventario()"><i class='fa fa-warning' ><b> N°</b></i></button>
<?php } ?>


                                  <p style="padding: 0.5em; text-align: center; float: right; width:95%;" class="mensaje"></p>
                            </div>
                               <div class="panel-body" style="font-size: 12px;">             
                                    <table id="data-table-area" width="100%" class="table table-striped table-bordered"></table>
                                </div>
                        </div>          
                    </div>

</div>


<!----------------------IP DIRECCIÓN----------------------------->

<form id="Frmdupli" class="form-horizontal" action="" method="POST" style=" margin: 0 auto;">
  <div class="col-sm-12 col-md-12 col-lg-12" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
   

<div class="modal-dialog-modi" role="document" style="/*margin-top: 7em;*/">
<div class="modal-content">
<div class="modal-header">
<button type="button" onclick="location.href='./'" class="close" data-dismiss="modal" aria-label="Close" ><span style="color: black"  aria-hidden="true">&times;</span></button>
<h4 class="modal-title" id="exampleModalLabel"><b>
DIRECCIONES IP DUPLICADAS </b></h4>  
</div>
            <div class="modal-body">


<table class="table table-bordered"  cellspacing="0" >
<thead>
<tr>
<th style="width: 5%;">N°</th>                        
<th style="width: 15%"> SERIE CPU </th>
<th style="width: 15%;">DIRECCIÓN IP</th>
<th style="width: 10%;">DUPLICADOS</th>
</tr>
</thead>  
<tbody>

<?php 

$query="SELECT direccion_ip,num_invntraio, count(*) AS ttlip,serie_cpu FROM equipo WHERE direccion_ip!=0 AND estado = 0 GROUP BY direccion_ip HAVING COUNT(*)>1";
 $resultados = mysqli_query($conexion,$query);
$n=1;
while ($per = mysqli_fetch_row($resultados)) {
?>

             <tr>
                <td><?php echo$n++?></td>
                <td><?php echo$per[3]?></td>
                <td><?php echo $per[0]?></td>
                <td><?php echo $per[2]?></td>
            </tr>

<?php } ?>


</tbody>                  
</table>



            </div>            
            </div>
            </div>
    </div>
</form>


<!------------------------NÚMERO DE INVETARIO--------------------------->

<form id="Frminvet" class="form-horizontal" action="" method="POST" style="margin: 0 auto;">
  <div class="col-sm-12 col-md-12 col-lg-12" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
   

<div class="modal-dialog-modi" role="document" style="/*margin-top: 7em;*/">
<div class="modal-content">
<div class="modal-header">
<button type="button" onclick="location.href='./'" class="close" data-dismiss="modal" aria-label="Close" ><span style="color: black"  aria-hidden="true">&times;</span></button>
<h4 class="modal-title" id="exampleModalLabel"><b>
NÚMERO DE INVENTARIOS DUPLICADOS </b></h4>  
</div>
            <div class="modal-body">


<table class="table table-bordered"  cellspacing="0" >
<thead>
<tr>
<th style="width: 5%;">N°</th>                        
<th style="width: 15%"> SERIE CPU </th>
<th style="width: 15%;">NÚMERO DE INVENTARIO</th>
<th style="width: 10%;">DUPLICADOS</th>
</tr>
</thead>  
<tbody>

<?php 

$query="SELECT num_invntraio,direccion_ip, count(*) AS ttlip,serie_cpu FROM equipo WHERE estado = 0 GROUP BY num_invntraio HAVING COUNT(*)>1";
 $resultados = mysqli_query($conexion,$query);
$n=1;
while ($per = mysqli_fetch_row($resultados)) {
?>

             <tr>
                <td><?php echo$n++?></td>
                <td><?php echo$per[3]?></td>
                <td><?php echo $per[0]?></td>
                <td><?php echo $per[2]?></td>
            </tr>

<?php } ?>


</tbody>                  
</table>



            </div>            
            </div>
            </div>
    </div>
</form>

<!------------------------------------------>

<form id="Frmeqpo" class="form-horizontal" action="" method="POST">
  <div class="col-sm-12 col-md-12 col-lg-12" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
   

<div class="modal-dialog-modi" role="document" style="/*margin-top: 7em;*/">
<div class="modal-content">
<div class="modal-header">
<button type="button" onclick="location.href='./'" class="close" data-dismiss="modal" aria-label="Close" ><span style="color: black"  aria-hidden="true">&times;</span></button>
<h4 class="modal-title" id="exampleModalLabel"><b>
AGREGAR DATOS DEL EQUIPO </b></h4>  
</div>
            <div class="modal-body">
                <input type="hidden" id="id_equipo" name="id_equipo">
                <input type="hidden" id="opcion" name="opcion" value="actualizar">


                    <div class="form-group"> 
                    <div class="col-sm-12" >
                    <select style="width: 100%" class="form-control" class="selectpicker" id="nempleado" name="nempleado" type="text" data-live-search="true">
                   <option value="">SELECCIONE USUARIO</option>    
                    <option value="0">NO ASIGNADO</option> 
                    <?php while($usuario = mysqli_fetch_row($resu)):?>
                    <option value="<?php echo $usuario[0]?>"><?php echo $usuario[1].' '.$usuario[2]?></option>
                    <?php endwhile; ?>
                    </select>
                    <!-- <input type="hidden" name="cambio" id="cambio" > -->
                    </div>
                    </div>

                    <div class="form-group">                    
                    <!-- <div class="col-sm-4">
                    <label>Número SIGTIC</label>
                    <input id="num_sigtic" name="num_sigtic" type="text" class="form-control" class="disabled">
                    </div> -->
                    <div class="col-sm-6">
                    <label>NÚMERO DE INVENTARIO</label>
                    <input id="num_invntraio" name="num_invntraio" type="text" class="form-control">
                    </div>                    
                    <div class="col-sm-6">
                    <label>SERIE</label>
                    <input id="serie_cpu" name="serie_cpu" type="text" class="form-control">
                    </div>        
                    </div>
                    <div class="form-group">
                    <div class="col-sm-4">
                    <label>MODELO</label>
                    <input id="nombre_equipo" name="nombre_equipo" type="text" class="form-control">
                    </div> 
                    <div class="col-sm-4">
                    <label>TIPO DEL EQUIPO</label>
                    <select  class="form-control" class="selectpicker" id="tipo_equipo" name="tipo_equipo" type="text" data-live-search="true">
                    <option value="0">SELECCIONE...</option> 
                    <option value="LAP TOP ">LAPTOP </option>
                    <option value="ESCRITORIO">ESCRITORIO</option>
                    </select>
                    </div>
                    <div class="col-sm-4">
                    <label>MARCA</label>    
                    <select class="form-control" selected="true" id="marca_cpu" name="marca_cpu">
                    <option value="" selected>SELECCIONE...</option>
                    <option value="LENOVO">LENOVO</option>
                    <option value="DELL">DELL</option>
                    <option value="HP">HP</option>
                    <option value="OTRO">OTRO</option>
                    </select>
                    </div>
                    </div>
                     <div class="form-group">
                    <div class="col-sm-offset-0 col-sm-3">
                    <label>VERSIÓN DE WINDOWS</label>
                    <select class="form-control" selected="true" id="version_windows" name="version_windows">                   
                    <option value="" selected>SELECCIONE...</option>
                    <option value="WINDOWS 7" >WINDOWS 7</option>
                    <option value="WINDOWS 10" >WINDOWS 10</option>
                    <option value="LINUX" >LINUX</option> 
                    </select>                                
                    </div>
                    <div class="col-sm-offset-0 col-sm-3">
                    <label>VERSIÓN OFFICE</label>
                    <select class="form-control" selected="true" id="version_office" name="version_office">                   
                    <option value="" selected>SELECCIONE...</option>
                    <option value="2016" >2016</option>
                    <option value="2010" >2010</option>
                    <option value="OTROS" >OTROS</option> 
                    </select>                                
                    </div>
                    <div class="col-sm-3">
                    <label>PROCESADOR</label>       
                    <select class="form-control" selected="true" id="procesador" name="procesador">                   
                    <option value="" selected>SELECCIONE...</option>
                    <option value="INTEL" >INTEL</option>
                    <option value="AMD" >AMD</option>
                    </select> 
                    </div>
                    <div class="col-sm-3">
                    <label>VELOCIDAD DEL PROCESADOR</label>
                    <input id="velocidad_proc" name="velocidad_proc" type="text" class="form-control">
                    </div>
                     </div>   
                    <div class="form-group">
                    <div class="col-sm-4">
                    <label>CAPACIDAD DISCO DURO</label>             
                    <select class="form-control" selected="true" id="disco_duro" name="disco_duro">                   
                    <option value="" selected>SELECCIONE...</option>
                    <option value="250 GB" >250 GB</option>
                    <option value="320 GB" >320 GB</option>
                    <option value="500 GB" >500 GB</option>
                    <option value="1 TB" >1 TB</option>
                    </select> 
                    </div>
                    <div class="col-sm-4">
                    <label>CAPACIDAD MEMORIA RAM</label>
                    <input id="memoria_ram" name="memoria_ram" type="text" class="form-control">
                    </div>                         
                    <div class="col-sm-4">
                    <label>UNIDAD DISCO FLASH</label>
                    <input id="uni_disc_flax" name="uni_disc_flax" type="text" class="form-control">
                    </div>                    
                    </div>
                    <div class="form-group">
                    <div class="col-sm-4">
                    <label>SERIE MONITOR</label>
                    <input id="serie_monitor" name="serie_monitor" type="text" class="form-control" >
                    </div>                                        
                    <div class="col-sm-4">
                    <label>SERIE TECLADO</label>
                    <input id="serie_teclado" name="serie_teclado" type="text" class="form-control"  >
                    </div>
                    <div class="col-sm-4">
                    <label>SERIE MOUSE</label>
                    <input id="serie_mouse" name="serie_mouse" type="text" class="form-control" >
                    </div> 
                    </div>
                    <div class="form-group">         
                    <div class="col-sm-4">
                    <label>DIRECCIÓN IP</label>
                    <input id="direccion_ip" name="direccion_ip" type="text" class="form-control" >
                    </div>
                    <div class="col-sm-4">
                    <label>SERVICIO INTERNET</label>
                    <input id="servicio_internet" name="servicio_internet" type="text" class="form-control" >
                    </div>                    
                    <div class="col-sm-4">
                    <label>UBICACIÓN DEL EQUIPO</label>
                    <select  class="form-control" class="selectpicker" name="ubicaeqpo" id="ubicaeqpo" type="text" data-live-search="true">
                    <option value="0">SELECCIONE...</option> 
                    <option value="Planta baja / vus">PLANTA BAJA / VUS</option>
                    <option value="Piso m2">PISO M2</option>
                    <option value="Piso 1">PISO 1</option>
                    <option value="Piso 2">PISO 2</option>
                    <option value="Piso 3">PISO 3</option>
                    <option value="Piso 4">PISO 4</option>
                    <option value="Piso 5">PISO 5</option>
                    <option value="Piso 6">PISO 6</option>                    <option value="Piso 7">PISO 7</option>
                    </select>
                    </div>
                    </div>

                    <div class="form-group"><br>
                    <div class="col-sm-offset-0 col-sm-4">
                    <button type="button" id="button" class="btn btn-green" onclick="agrEqpo();">ACEPTAR</button>
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


<form id="EqpoEliminar" action="" method="POST" style="text-transform: uppercase;">
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
                    <button type="button" onclick="eliminareqpo();" class="btn btn-primary" data-dismiss="modal">ACEPTAR</button>   
               <button type="button" class="btn btn-default" data-dismiss="modal">CANCELAR</button>                    
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
<h4 class="modal-title" id="exampleModalLabel"><b>
EDITAR DATOS DEL EQUIPO </b></h4>  
</div>
            <div class="modal-body">
                <input type="hidden" id="idequipo" name="idequipo">

                    <div class="col-sm-12">
                    
                    ¿EL EQUIPO DE CÓMPUTO PERTENECE AL USUARIO?
                    <label for="SI">SI</label>
                    <input checked="checked" name="correct" type="radio" value="true" id="true" />
                    <label for="NO">NO</label>
                    <input name="correct" type="radio" value="false" id="false" />
                    </div>

                    <div class="form-group" id="usuario1" style="display: none;">

                    <div class="col-sm-12" >
                    <select style="width: 100%" class="form-control" class="selectpicker" id="n_empleado" name="n_empleado" type="text" data-live-search="true">
                   <option value="">SELECCIONE USUARIO A QUIEN PERTENECE EL EQUIPO</option>    
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
                    <!-- <div class="col-sm-4">
                    <label>Número SIGTIC</label>
                    <input id="enum_sigtic" name="enum_sigtic" type="text" class="form-control" class="disabled">
                    </div> -->
                    <div class="col-sm-6">
                    <label>NÚMERO DE INVENTARIO</label>
                    <input id="enum_invntraio" name="enum_invntraio" type="text" class="form-control">
                    </div>                    
                    <div class="col-sm-6">
                    <label>SERIE</label>
                    <input id="eserie_cpu" name="eserie_cpu" type="text" class="form-control">
                    </div>        
                    </div>
                    <div class="form-group">
                    <div class="col-sm-4">
                    <label>MODELO</label>
                    <input id="enombre_equipo" name="enombre_equipo" type="text" class="form-control">
                    </div> 
                    <div class="col-sm-4">
                    <label>TIPO DEL EQUIPO</label>
                    <select  class="form-control" class="selectpicker" id="etipo_equipo" name="etipo_equipo" type="text" data-live-search="true">
                    <option value="LAP TOP ">LAPTOP</option>
                    <option value="ESCRITORIO">ESCRITORIO</option>
                    </select>
                    </div>
                    <div class="col-sm-4">
                    <label>MARCA</label>    
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
                    <label>VERSIÓN WINDOWS</label>
                    <select class="form-control" selected="true" id="eversion_windows" name="eversion_windows">
                    <option value="WINDOWS 7" >WINDOWS 7</option>
                    <option value="WINDOWS 10" >WINDOWS 10</option>
                    <option value="LINUX" >LINUX</option> 
                    </select>                                
                    </div>
                    <div class="col-sm-offset-0 col-sm-3">
                    <label>VERSIÓN OFFICE</label>
                    <select class="form-control" selected="true" id="eversion_office" name="eversion_office">                   
                    <option value="2016" >2016</option>
                    <option value="2010" >2010</option>
                    <option value="OTROS" >OTROS</option> 
                    </select>                                
                    </div>
                    <div class="col-sm-3">
                    <label>PROCESADOR</label>       
                    <select class="form-control" selected="true" id="eprocesador" name="eprocesador">                   
                    <option value="INTEL" >INTEL</option>
                    <option value="AMD" >AMD</option>
                    </select> 
                    </div>
                    <div class="col-sm-3">
                    <label>VELOCIDAD DEL PROCESADOR</label>
                    <input id="evelocidad_proc" name="evelocidad_proc" type="text" class="form-control">
                    </div>
                     </div>   
                    <div class="form-group">
                    <div class="col-sm-4">
                    <label>CAPACIDAD DE DISCO DURO</label>             
                    <select class="form-control" selected="true" id="edisco_duro" name="edisco_duro">                   
                    <option value="250 GB" >250 GB</option>
                    <option value="320 GB" >320 GB</option>
                    <option value="500 GB" >500 GB</option>
                    <option value="1 TB" >1 TB</option>
                    </select> 
                    </div>
                    <div class="col-sm-4">
                    <label>CAPACIDAD DE MEMORIA RAM</label>
                    <input id="ememoria_ram" name="ememoria_ram" type="text" class="form-control">
                    </div>                         
                    <div class="col-sm-4">
                    <label>UNIDAD DE DISCO FLASH</label>
                    <input id="euni_disc_flax" name="euni_disc_flax" type="text" class="form-control">
                    </div>                    
                    </div>
                    <div class="form-group">
                    <div class="col-sm-4">
                    <label>SERIE MONITOR</label>
                    <input id="eserie_monitor" name="eserie_monitor" type="text" class="form-control" >
                    </div>                                        
                    <div class="col-sm-4">
                    <label>SERIE TECLADO</label>
                    <input id="eserie_teclado" name="eserie_teclado" type="text" class="form-control"  >
                    </div>
                    <div class="col-sm-4">
                    <label>SERIE MOUSE</label>
                    <input id="eserie_mouse" name="eserie_mouse" type="text" class="form-control" >
                    </div> 
                    </div>
                    <div class="form-group">         
                    <div class="col-sm-4">
                    <label>DIRECCIÓN IP</label>
                    <input id="edireccion_ip" name="edireccion_ip" type="text" class="form-control" >
                    </div>
                    <div class="col-sm-4">
                    <label>SERVICIO INTERNET</label>
                    <input id="eservicio_internet" name="eservicio_internet" type="text" class="form-control" >
                    </div>                    
                    <div class="col-sm-4">
                    <label>UBICACIÓN DEL EQUIPO</label>
                    <select  class="form-control" class="selectpicker" name="eubicaeqpo" id="eubicaeqpo" type="text" data-live-search="true">
                    <option value="Planta baja / vus">PLANTA BAJA / VUS</option>    
                    <option value="Piso m2">PISO M2</option>
                    <option value="Piso 1">PISO 1</option>
                    <option value="Piso 2">PISO 2</option>
                    <option value="Piso 3">PISO 3</option>
                    <option value="Piso 4">PISO 4</option>                    
                    <option value="Piso 5">PISO 5</option>                    
                    <option value="Piso 6">PISO 6</option>
                    <option value="Piso 7">PISO 7</option>
                    </select>
                    </div>
                    </div>

                    <div class="form-group"><br>
                    <div class="col-sm-offset-0 col-sm-4">
                    <button type="button" id="button" class="btn btn-green" onclick="edtEqpo();">ACEPTAR</button>
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
 -->
<script type="text/javascript" src="../../js/funciones.js"></script>

<script src="../../js/jquery-1.12.3.min.js"></script>
<script src="../../js/select2.js"></script>

<script src="//cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/rowreorder/1.2.8/js/dataTables.rowReorder.min.js"></script>
<script src="../../js/bootstrap.min.js"></script>
<script src="../../js/dataTables.bootstrap.js"></script>
<script src="../../js/dataTables.buttons.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="../../boots/metisMenu/metisMenu.min.js"></script>
<script src="../../dist/js/sb-admin-2.js"></script>
<script src="../../js/status.js"></script>
<link rel="stylesheet" type="text/css" href="../../boots/bootstrap/css/select2.css">
<script type="text/javascript">
$(document).ready(function(){
  $('#n_empleado').select2();
  $('#nempleado').select2();
}); 
$(window).load(function() {
    $(".loader").fadeOut("slow");
});
</script>
<script src="../../js/select2.js"></script> 
<?php include('../../php/admin-equipos.php');?>
</html>
