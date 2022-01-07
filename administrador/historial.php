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
       ini_set('date.timezone','America/Mexico_City');
       $fecha = date('Y');
?>
<!DOCTYPE html>
<html lang="es">

<head>

    <meta name="tipo_contenido" content="text/html;" http-equiv="content-type" charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Sistema</title>
    <link rel="stylesheet" type="text/css" href="../css/historial.css">
    <link href="../boots/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">
    <link href="../boots/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="../css/styles.css">
    <script type="text/javascript" src="../js/funciones.js"></script>
    <script type="text/javascript" src="../js/area.js"></script>
    <link rel="stylesheet" type="text/css" href="../datas/dataTables.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.css">
    <!-- CREACIÓN DE BOTONES -->
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.0.0/css/buttons.dataTables.min.css">
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
                                <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...
                                </div>
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
                                <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...
                                </div>
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
                                <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...
                                </div>
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
                        <li><a href="../conexion/session_cerrar.php"><i class="fa fa-sign-out fa-fw"></i>CERRAR
                                SESIÓN</a>
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
                        <!-- <li>
                            <a href="./"><i class="glyphicon glyphicon-home"></i> Inicio</a>
                        </li> -->
                        <li>

                            <a href="historial.php"><i class="fa fa-list-alt"></i> HISTORIAL<span
                                    class="fa arrow"></span></a> 
                                             
                            <ul class="nav nav-second-level">
                                <li>
                            <a href="./"><i class="glyphicon glyphicon-home"></i> INICIO</a>
                          
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="glyphicon glyphicon-cog"></i> REGISTROS<span
                                    class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
<!--                                 <li>
                                    <a href="area"><i class="fa fa-list-alt"></i> Areas</a>
                                </li> -->
                                <li>
                                    <a href="usuarios"><i class="fa fa-users"></i> USUARIOS</a>
                                </li>
                                <li>
                                    <a href="equipo"><i class="fa fa-desktop"></i> EQUIPOS</a>
                                </li>
                            <li>
                                    <a href="tecnico"><i class="fa fa-street-view"></i> TÉCNICO</a>
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
                    <h1 class="page-header">HISTORIAL DE REPORTES</h1>
                    <?php
                    echo
                    "<marquee style='color: white; background-color: #1489D8;' width='100%' direction='left'>
                        ESTADISTICAS GENERALES MOSTRADAS AL AÑO $fecha
                    </marquee>";
                    ?>
                </div>

                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
       

	
<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">

    <div class="panel panel-default">
        <div class="panel-heading" role="tab" id="headingOne">
            <h4 class="panel-title">
                <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    <i class="more-less glyphicon glyphicon-plus"></i>
                    SOLICITUD DE REPORTES SEGÚN SERVICIO
                </a>
            </h4>
            
        </div>
        <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
            <div class="panel-body">
                  
            <div class="row">
           
            <div class="col-lg-4 col-md-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="row">
                            <div style="padding-top:20px;" class="row">
                                <canvas id="piechart-servicios"></canvas>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="row">
                            <div style="padding-top:20px;" class="row">
                                <canvas id="piechart-impresion"></canvas>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="row">
                            <div style="padding-top:20px;" class="row">
                                <canvas id="piechart-comunicaciones"></canvas>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div style="padding-top: 10px;" class="col-lg-4 col-md-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="row">
                            <div style="padding-top:20px;" class="row">
                                <canvas id="piechart-eventos"></canvas>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
</div>

            </div>
        </div>
    </div></div>
   

            <!-- <div class="row col-lg-6 col-md-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div style="padding-top:20px;" class="row">
                                <canvas id="piechart-servicios"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row col-lg-6 col-md-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div style="padding-top:20px;" class="row">
                                <canvas id="piechart-impresion"></canvas>
                            </div>
                        </div>
                    </div>
                </div> -->
            <?php 

$query = "SELECT id_tecnico, nombre, apellidos FROM usuarios
        INNER JOIN tecnico ON tecnico.id_usu = usuarios.id_usuario
        WHERE   privilegios = 'tecnico' AND usuarios.estado = 0";
$result = mysqli_query($conexion,$query);


?>


            <form class="form-horizontal" action="" method="POST">
                <div class="modal fade" id="modalAtndr" class="col-xs-12 .col-md-12" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabel">

                    <div class="modal-dialog width" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <!--<button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="limpiarCampo()"><span style="color: black"  aria-hidden="true">&times;</span>
</button>
onclick="location.href='./'" -->
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                        style="color: black" aria-hidden="true">&times;</span></button>

                                <h4 class="modal-title" id="exampleModalLabel">
                                    <p>

                                        <!--<a style="color: blue" href='#' type='button' data-toggle='modal' data-target='#modalVal' style='width:100%;font-size: 12px;'>Favor de validar, ¿el equipo de cómputo pertenece al usuario?</a>-->

                                    </p><input type="hidden" id="idequipo">
                                    DETALLES REPORTE
                                </h4>
                            </div>
                            <div class="modal-body">
                                <input type="hidden" id="id_usuario" name="id_usuario"
                                    value="<?php echo $_SESSION['usuario']['id_tecnico'];?>">
                                <input type="hidden" id="opcion" name="opcion" value="atender">
                                <div class="form-group">
                                    <div class="col-sm-3">
                                        <label>N° REPORTE</label>
                                        <input id="n_reporte" name="n_reporte" type="text" class="form-control"
                                            disabled="">
                                    </div>
                                    <div class="col-sm-6">
                                        <label>USUARIO</label>
                                        <input id="gstNombr" name="gstNombr" type="text" class="form-control" disabled="">
                                    </div>
                                    <div class="col-sm-3">
                                        <label>EXTENSIÓN</label>
                                        <input id="gstExTel" name="gstExTel" type="text" class="form-control"
                                            disabled="">
                                    </div>
<!--                                     <div class="col-sm-2">
                                        <label>Ubicación</label>
                                        <input id="ubicacion" name="ubicacion" type="text" class="form-control"
                                            disabled="">
                                    </div> -->
                                </div>

                                <div class="form-group" id="dsprob1" style="display: none;">
                                    <div id="buscador"></div>
                                    <div id="select1"></div>
                                    <div id="select2"></div>
                                    <input type="hidden" name="rspst" id="rspst">
                                </div>


                                <div class="form-group">
                                    <div class="col-sm-4">
                                        <label>TIPO DE SERVICIO</label>
                                        <input id="servicio" type="text" class="form-control" disabled="">
                                    </div>
                                    <div class="col-sm-4">
                                        <label></label>
                                        <input id="intervencion" type="text" class="form-control" disabled="">
                                    </div>
                                    <div class="col-sm-4">
                                        <label></label>
                                        <input id="descripcion" type="text" class="form-control" disabled="">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-4">
                                        <input id="solucion" type="text" class="form-control" disabled="">
                                    </div>

                                    <div class="col-sm-4">
                                        <input id="ultima" type="text" class="form-control" disabled="">
                                    </div>

                                    <div class="col-sm-4">
                                        <input id="final" type="text" class="form-control" disabled="">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <label>OBSERVACIONES DEL USUARIO AL PROBLEMA</label>
                                        <textarea id="usu_observ" name="usu_observ" class="form-control"
                                            id="exampleFormControlTextarea1" rows="3" disabled=""></textarea>
                                    </div>
                                </div>

                                <div class="form-group" id="externo" style="display: none;">
                                    <div class="col-sm-12">
                                        <label>RESPUESTA EXTERNA DE LA FALLA</label>
                                        <textarea id="falla_xterna" name="falla_xterna" class="form-control"
                                            id="exampleFormControlTextarea1" rows="3"></textarea>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-3">
                                        <label>FECHA REPORTE</label>
                                        <input id="finicio" name="finicio" type="text" class="form-control" disabled="">
                                    </div>

                                    <div class="col-sm-3">
                                        <label>FECHA FINALIZADA</label>
                                        <input id="ffinal" name="ffinal" type="text" class="form-control" disabled="">
                                    </div>


                                    <div class="col-sm-6" id="asignado">
                                        <label>TÉCNICO ASIGNADO</label>
                                        <input class="form-control" selected="true" id="nomtec" name="nomtec"
                                            disabled="">
                                    </div>
<!--                                     <div class="col-sm-4" style="display: none;" id="reasigar">
                                        <label>Reasignar técnico </label>
                                        <select style="width: 100%" class="form-control" class="selectpicker" id="idtec"
                                            name="idtec" type="text" data-live-search="true">
                                            <option value="0">Seleccione técnico</option>
                                            <?php while($usuario = mysqli_fetch_row($result)):?>
                                            <option value="<?php echo $usuario[0]?>">
                                                <?php echo $usuario[1].' '.$usuario[2]?></option>
                                            <?php endwhile; ?>
                                        </select>
                                    </div> -->

                                    <!--      <div class="col-sm-4">
                    <button type="button" class="btn btn-warning" id="asignartec" onclick="tecReasignar();">REASIGNAR TÉCNICO</button>        
                    </div> -->
                                </div>


                                <div class="form-group" style="display: none;" id="button"><br>
                                    <div class="col-sm-offset-0 col-sm-5">
                                        <button type="button" class="btn btn-green btn-lg"
                                            onclick="tecReasignar();">ACEPTAR</button>
                                    </div>
                                    <b>
                                        <p class="alert alert-danger text-center padding error" id="error">Error al
                                            reasignar técnico</p>
                                    </b>

                                    <b>
                                        <p class="alert alert-success text-center padding exito" id="exito">¡El técnico
                                            se reasigno con éxito!</p>
                                    </b>

                                    <b>
                                        <p class="alert alert-warning text-center padding aviso" id="aviso">Favor de
                                            seleccionar técnico</p>
                                    </b>
                                </div>

                            </div>
                            <!--<div class="modal-footer">
                        <button type="button" class="btn btn-primary" onclick="atdRpt();">Atender</button>
                </div>-->
                        </div>
                    </div>
                </div>
            </form>
            <div class="row">
                <div class="panel-body">
                    <div id="cuadro1" class="col-lg-12">
                        <div class="panel panel-default">
                            <div style="padding-top: 13px;" class="col-lg-5">
                                <!-- <div class="input-group">
                                    <span class="input-group-btn">
                                        <span class="btn btn-default"><i class="fa fa-calendar-check-o"
                                                aria-hidden="true"></i></span>
                                    </span>
                                    <input type="text" placeholder="Desde" id="min" name="min" class="form-control">
                                </div> -->
                            </div>
                            <!-- <div style="padding-top: 13px;" class="col-lg-5">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Hasta" id="max" name="max">
                                    <span class="input-group-btn">
                                        <span class="btn btn-default"><i class="fa fa-calendar-check-o"
                                                aria-hidden="true"></i></span>
                                    </span>
                                </div>
                            </div> -->
                        </div>
                        </br>
                        <div class="row">
  <!-- <div class="col-lg-6">
    <div class="input-group">
      <span class="input-group-addon">
        Desde
      </span>
      <input type="text" class="form-control date-range-filter" placeholder="Fecha minima" data-date-format="dd-mm-yyyy" id="min">
    </div>
  </div>
  <div class="col-lg-6">
    <div class="input-group">
      <span class="input-group-addon">
      Hasta
      </span>
      <input type="text" class="form-control date-range-filter" placeholder="Fecha maxíma" data-date-format="dd-mm-yyyy" id="max">
    </div>
  </div>
</div>
                     <br><br> -->
                        <table id="data-table-administrador" class="table table-bordered" width="100%" cellspacing="0">
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.row -->
    </div>
    <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
</body>
<script src="../js/jquery-1.12.3.min.js"></script>
<script src="../js/select2.js"></script>
<script src="//cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/dataTables.bootstrap.js"></script>
<script src="../js/dataTables.buttons.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="../boots/metisMenu/metisMenu.min.js"></script>
<script src="../dist/js/sb-admin-2.js"></script>
<script type="text/javascript" src="../js/admin.js"></script> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/js/bootstrap-datepicker.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
<!-- BOTTONES DE IMPRESIÓN PARA CREAR EL FORMATO DEL PDF -->
<script src="https://cdn.datatables.net/buttons/2.0.0/js/dataTables.buttons.min.js"></script>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script> -->
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.0.0/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.0.0/js/buttons.print.min.js"></script>

<?php include('../php/admin-historial.php');?>
<script>
    function toggleIcon(e) {
        $(e.target)
            .prev('.panel-heading')
            .find(".more-less")
            .toggleClass('glyphicon-plus glyphicon-minus');
    }
    $('.panel-group').on('hidden.bs.collapse', toggleIcon);
    $('.panel-group').on('shown.bs.collapse', toggleIcon);
    $(window).load(function() {
    $(".loader").fadeOut("slow");
});
    </script>
</html>