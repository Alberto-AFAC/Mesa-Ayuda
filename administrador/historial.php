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

    <!-- Bootstrap Core CSS -->


    <!-- MetisMenu CSS -->
    <link href="../boots/metisMenu/metisMenu.min.css" rel="stylesheet">


    <!-- Morris Charts CSS -->
    <link href="../boots/morrisjs/morris.css" rel="stylesheet">
    <link href="../boots/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">
    <link href="../boots/datatables-responsive/dataTables.responsive.css" rel="stylesheet">
    <link href="//cdn.datatables.net/datetime/1.1.0/css/dataTables.dateTime.min.css" rel="stylesheet">
    <link href="//oss.maxcdn.com/jquery.bootstrapvalidator/0.5.2/css/bootstrapValidator.min.css" rel="stylesheet">
    </link>
    <link href="https://cdn.datatables.net/buttons/1.7.1/css/buttons.dataTables.min.css" rel="stylesheet"
        type="text/css">
    <link rel="stylesheet" type="text/css" href="../css/styles.css" />
    <link rel="stylesheet" type="text/css" href="../boots/bootstrap/css/select2.css" />
    <link href="../boots/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">
    <link href="../boots/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="../css/styles.css">
    <script type="text/javascript" src="../js/funciones.js"></script>
    <script type="text/javascript" src="../js/area.js"></script>
    <link rel="stylesheet" type="text/css" href="../datas/dataTables.css">
    <style>
        .parpadea {
    animation-name: parpadeo;
    animation-duration: 1s;
    animation-timing-function: linear;
    animation-iteration-count: infinite;
    -webkit-animation-name: parpadeo;
    -webkit-animation-duration: 1s;
    -webkit-animation-timing-function: linear;
    -webkit-animation-iteration-count: infinite;
}

@-moz-keyframes parpadeo {
    0% {
        opacity: 1.0;
    }
    50% {
        opacity: 0.0;
    }
    100% {
        opacity: 1.0;
    }
}

@-webkit-keyframes parpadeo {
    0% {
        opacity: 1.0;
    }
    50% {
        opacity: 0.0;
    }
    100% {
        opacity: 1.0;
    }
}

@keyframes parpadeo {
    0% {
        opacity: 1.0;
    }
    50% {
        opacity: 0.0;
    }
    100% {
        opacity: 1.0;
    }
}
    </style>

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
                        <li><a href="../conexion/session_cerrar.php"><i class="fa fa-sign-out fa-fw"></i>Cerrar
                                Sesión</a>
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
                            <a href="./"><i class="glyphicon glyphicon-home"></i> Inicio<span
                                    class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="historial.php"><i class="fa fa-list-alt"></i> Historial</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="glyphicon glyphicon-cog"></i> Registros<span
                                    class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
<!--                                 <li>
                                    <a href="area"><i class="fa fa-list-alt"></i> Areas</a>
                                </li> -->
                                <li>
                                    <a href="usuarios"><i class="fa fa-users"></i> Usuarios</a>
                                </li>
                                <li>
                                    <a href="equipo"><i class="fa fa-desktop"></i> Equipos</a>
                                </li>
                            <li>
                                    <a href="tecnico"><i class="fa fa-street-view"></i> Técnico</a>
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
                    <h1 class="page-header">Historial de Reportes</h1>
                    <?php
                    echo
                    "<marquee style='color: white; background-color: #1489D8;' width='100%' direction='left'>
                        Estadisticas generales mostradas año $fecha
                    </marquee>";
                    ?>
                </div>

                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <h4 style="text-align: center;">SOLICITUD DE REPORTES SEGÚN SERVICIO</h4>
                <!-- <div class="zoom col-lg-3 col-md-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <img src="../img/realizado.svg" width="60px" alt="Bueno" class="img-fluid">
                                </div>
                                <?php 
                                $query ="SELECT
                                            'total',
                                            COUNT( CASE WHEN estado_rpt = 'Pendiente' THEN 1 END ) AS Pendiente,
                                            COUNT( CASE WHEN estado_rpt = 'Finalizado' THEN 1 END ) AS Finalizado,
                                            COUNT( CASE WHEN estado_rpt = 'Cancelado' THEN 1 END ) AS Cancelado,
                                            COUNT( CASE WHEN estado_rpt = 'Pendiente' THEN 1 END ) AS Pendiente 
                                        FROM
                                            reporte";
                                $resultado = mysqli_query($conexion, $query);
                                $row = mysqli_fetch_assoc($resultado);
                                ?>
                                <div class="col-xs-9 text-right text-success">
                                    <div class="huge"><?php echo $row['Finalizado'] ?></div>
                                    <div>Finalizados</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> -->

                <!-- <div class="zoom col-lg-3 col-md-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <img src="../img/cancelado.svg" width="60px" alt="Bueno" class="img-fluid">
                                </div>
                                <div class="col-xs-9 text-right text-danger">
                                    <div class="huge"><?php echo $row['Cancelado'] ?></div>
                                    <div>Cancelado</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> -->

                <!-- <div class="zoom col-lg-3 col-md-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <img src="../img/reloj.svg" width="60px" alt="Bueno" class="img-fluid">
                                </div>
                                <div class="col-xs-9 text-right text-warning">
                                    <div class="huge"></div>
                                    <div>Atendidos a tiempo</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> -->
                <!-- <div class="zoom col-lg-3 col-md-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <img class="parpadea" src="../img/fuera de tiempo.svg" width="60px" alt="Bueno" class="img-fluid">
                                </div>
                                <div class="col-xs-9 text-right text-primary">
                                    <div class="huge"></div>
                                    <div>Atendidos fuera de tiempo</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->

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
                <div class="col-lg-4 col-md-6">
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

                                        <!--<a style="color: blue" href='#' type='button' data-toggle='modal' data-target='#modalVal' style='width:100%'>Favor de validar, ¿el equipo de cómputo pertenece al usuario?</a>-->

                                    </p><input type="hidden" id="idequipo">
                                    Detalles Reporte
                                </h4>
                            </div>
                            <div class="modal-body">
                                <input type="hidden" id="id_usuario" name="id_usuario"
                                    value="<?php echo $_SESSION['usuario']['id_tecnico'];?>">
                                <input type="hidden" id="opcion" name="opcion" value="atender">
                                <div class="form-group">
                                    <div class="col-sm-3">
                                        <label>N° reporte</label>
                                        <input id="n_reporte" name="n_reporte" type="text" class="form-control"
                                            disabled="">
                                    </div>
                                    <div class="col-sm-5">
                                        <label>Usuario</label>
                                        <input id="usuario" name="usuario" type="text" class="form-control" disabled="">
                                    </div>
                                    <div class="col-sm-2">
                                        <label>Extension</label>
                                        <input id="extension" name="extension" type="text" class="form-control"
                                            disabled="">
                                    </div>
                                    <div class="col-sm-2">
                                        <label>Ubicación</label>
                                        <input id="ubicacion" name="ubicacion" type="text" class="form-control"
                                            disabled="">
                                    </div>
                                </div>

                                <div class="form-group" id="dsprob1" style="display: none;">
                                    <div id="buscador"></div>
                                    <div id="select1"></div>
                                    <div id="select2"></div>
                                    <input type="hidden" name="rspst" id="rspst">
                                </div>


                                <div class="form-group" id="dsprob2">
                                    <div class="col-sm-4">
                                        <label>Tipo de servicio</label>
                                        <input id="servicio" type="text" class="form-control" disabled="">
                                    </div>

                                    <div class="col-sm-4">
                                        <label>Intervención</label>
                                        <input id="intervencion" type="text" class="form-control" disabled="">
                                    </div>

                                    <div class="col-sm-4">
                                        <label>Descripción</label>
                                        <input id="descripcion" type="text" class="form-control" disabled="">
                                    </div>
                                    <input type="hidden" name="rspst" id="rspst" value="SI">
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <label>Observaciones del usuario al problema</label>
                                        <textarea id="usu_observ" name="usu_observ" class="form-control"
                                            id="exampleFormControlTextarea1" rows="3" disabled=""></textarea>
                                    </div>
                                </div>

                                <div class="form-group" id="externo" style="display: none;">
                                    <div class="col-sm-12">
                                        <label> Respuesta externa de la falla</label>
                                        <textarea id="falla_xterna" name="falla_xterna" class="form-control"
                                            id="exampleFormControlTextarea1" rows="3"></textarea>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-4">
                                        <label> Fecha reporte</label>
                                        <input id="finicio" name="finicio" type="text" class="form-control" disabled="">
                                    </div>
                                    <div class="col-sm-4" id="asignado">
                                        <label>Técnico asignado</label>
                                        <input class="form-control" selected="true" id="nomtec" name="nomtec"
                                            disabled="">
                                    </div>
                                    <div class="col-sm-4" style="display: none;" id="reasigar">
                                        <label>Reasignar técnico </label>
                                        <select style="width: 100%" class="form-control" class="selectpicker" id="idtec"
                                            name="idtec" type="text" data-live-search="true">
                                            <option value="0">Seleccione técnico</option>
                                            <?php while($usuario = mysqli_fetch_row($result)):?>
                                            <option value="<?php echo $usuario[0]?>">
                                                <?php echo $usuario[1].' '.$usuario[2]?></option>
                                            <?php endwhile; ?>
                                        </select>
                                    </div>

                                    <!--      <div class="col-sm-4">
                    <button type="button" class="btn btn-warning" id="asignartec" onclick="tecReasignar();">REASIGNAR TÉCNICO</button>        
                    </div> -->
                                </div>


                                <div class="form-group" style="display: none;" id="button"><br>
                                    <div class="col-sm-offset-0 col-sm-5">
                                        <button type="button" class="btn btn-green btn-lg"
                                            onclick="tecReasignar();">Aceptar</button>
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
                                <div class="input-group">
                                    <span class="input-group-btn">
                                        <span class="btn btn-default"><i class="fa fa-calendar-check-o"
                                                aria-hidden="true"></i></span>
                                    </span>
                                    <input type="text" placeholder="Desde" id="min" name="min" class="form-control">
                                </div>
                            </div>
                            <div style="padding-top: 13px;" class="col-lg-5">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Hasta" id="max" name="max">
                                    <span class="input-group-btn">
                                        <span class="btn btn-default"><i class="fa fa-calendar-check-o"
                                                aria-hidden="true"></i></span>
                                    </span>
                                </div>
                            </div>
                        </div>
                        </br></br></br>
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
<!--<script src="js/jquery-1.12.3.js"></script>-->
<script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
<script src="//cdn.datatables.net/datetime/1.1.0/js/dataTables.dateTime.min.js"></script>

<!-- <script src="../js/jquery.dataTables.min.js"></script> -->
<!-- <script src="../js/dataTables.bootstrap.js"></script> -->
<!--botones DataTables-->
<!-- <script src="../js/dataTables.buttons.min.js"></script> -->
<!-- <script src="../js/buttons.bootstrap.min.js"></script> -->
<!--Libreria para exportar Excel-->
<script src="../js/jszip.min.js"></script>
<!--Librerias para exportar PDF-->
<script src="../js/pdfmake.min.js"></script>
<script src="../js/vfs_fonts.js"></script>
<!--Librerias para botones de exportación-->

<!--    <script type="text/javascript" src="calendario/tcal.js"></script> -->
<script src="//oss.maxcdn.com/jquery.bootstrapvalidator/0.5.3/js/bootstrapValidator.min.js"></script>
<script src="//cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<!--    <script type="text/javascript" src="valida/valida.js"></script>-->
<script src="//oss.maxcdn.com/momentjs/2.8.2/moment.min.js"></script>
<!--COMIENZA TABLA DEL ADMINISTRADOR-->


<script src="../js/bootstrap.min.js"></script>

<script src="../js/jquery.dataTables.min.js"></script>
<script src="../js/dataTables.bootstrap.js"></script>
<script src="../js/dataTables.buttons.min.js"></script>
<script src="../boots/metisMenu/metisMenu.min.js"></script>
<script src="../dist/js/sb-admin-2.js"></script>
<script type="text/javascript" src="../js/admin.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.7.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.print.min.js"></script>
<script type="text/javascript" src="../js/area.js"></script>


<script type="text/javascript">
var minDate, maxDate;
$.fn.dataTable.ext.search.push(
    function(settings, data, dataIndex) {
        var min = minDate.val();
        var max = maxDate.val();
        var date = new Date(data[5]);

        if (
            (min === null && max === null) ||
            (min === null && date <= max) ||
            (min <= date && max === null) ||
            (min <= date && date <= max)
        ) {
            return true;
        }
        return false;
    }
);
var dataSet = [
    <?php
        $query1 = "SELECT 
        n_reporte,
        n_empleado empleado,
        DATE_FORMAT(finicio, '%d/%m/%Y' ) AS finicio,
        DATE_FORMAT(ffinal, '%d/%m/%Y' ) AS ffinal,
        evaluacion,
        estado_rpt 
        FROM REPORTE
        WHERE 	MONTH ( finicio ) = MONTH (
        CURRENT_DATE ()) 
        AND estado_rpt = 'Finalizado' || estado_rpt = 'Cancelado'
        ORDER BY
        n_reporte DESC";
        $resultado = mysqli_query($conexion, $query1);
        while($data = mysqli_fetch_array($resultado)){
        $idempleado=$data['empleado'];
        $sql2="SELECT gstNombr,
                          gstApell,
                          gstExTel
                          FROM personal
                        WHERE
                        gstNmpld = $idempleado";
    $result2=mysqli_query($conexion2,$sql2);
    while($data2=mysqli_fetch_array($result2)){
            if($data['evaluacion'] == '0'){
                $eva = "SIN EVALUAR";
            } else {
                $eva = $data['evaluacion'];
            }


        ?>

    ["<?php echo  $data['n_reporte']?>","<?php echo  $data2['gstNombr']." ".$data2['gstApell']?>","<?php echo  $data2['gstExTel']?>","<?php echo  $data['finicio']?>","<?php echo  $data['ffinal']?>","<?php echo $eva ?> ",
        "<?php 

        if($data['estado_rpt'] == 'Finalizado'){
                
                echo "<a href='#' type='button' data-toggle='modal' data-target='#modalAtndr' class='detalle btn btn-success' onclick='atender({$data['n_reporte']})' style='width:100%'>Finalizado</a>";

                    }else if($data['estado_rpt'] == 'Cancelado'){
                echo "<a href='#' type='button' data-toggle='modal' data-target='#modalAtndr' class='detalle btn btn-default' onclick='atender({$data['n_reporte']})' style='width:100%'>Por evaluar</a>";

                    } 
                      ?>"
    ],
    <?php } } ?>
];
//       
$(document).ready(function() {
    var printCounter = 0;
    minDate = new DateTime($('#min'), {
        format: 'Do MMMM YYYY'
    });
    maxDate = new DateTime($('#max'), {
        format: 'Do MMMM YYYY'
    });
    var tableGenerarReporte = $('#data-table-administrador').DataTable({

        "order": [
            [6, "desc"]
        ],
        "language": {
            "searchPlaceholder": "Buscar datos...",
            "url": "//cdn.datatables.net/plug-ins/1.10.25/i18n/Spanish.json"
        },
        dom: 'Bfrtip',
        buttons: [

            'copy', 'csv', 'excel',
            {
            extend: 'pdfHtml5',
            messageTop: 'AGENCIA FEDERAL DE AVIACIÓN CIVIL',
            download: 'open',
            title: 'AGENCIA FEDERAL DE AVIACIÓN CIVIL',
            text: 'Descargar PDF',
            pageSize: 'A4',

        }],
        orderCellsTop: true,
        fixedHeader: true,
        responsive: true,
        data: dataSet,
        columns: [{
                title: "N°"
            },
            {
                title: "Nombre usuario"
            },
            {
                title: "Extensión"
            },
            {
                title: "Inicio"
            },
            {
                title: "Finaliza"
            },
            {
                title: "Atención"
            },
            {
                title: "Estado"
            }
        ],
    });
    //Cierre de la función
    $('#min, #max').on('change', function() {
        tableGenerarReporte.draw();
    });
});

//GRÁFICA PARA MEDIR EL EQUIPO DE COMPUTO
<?php 
            $query = "SELECT
       	    COUNT( CASE WHEN servicio = 'COMPUTO' THEN 1 END ) AS COMPUTOPRINCIPAL,
            COUNT( CASE WHEN intervencion = 'ESCRITORIO' THEN 1 END ) AS INVERVENCIONE,
            COUNT( CASE WHEN intervencion = 'LAPTOP' THEN 1 END ) AS INVERVENCIONL,
            COUNT( CASE WHEN intervencion = 'TABLETA' THEN 1 END ) AS INVERVENCIONT
            FROM
            reporte";
        $resultado = mysqli_query($conexion, $query);
?>
var piechar = new Chart(document.getElementById("piechart-servicios"), {
    type: 'polarArea',
    data: {
        <?php while($row = mysqli_fetch_array($resultado)){ ?>
        labels: ["Escritorio", "Laptop", "Tableta","Total"
        ],
        datasets: [{
            label: "Sistemas",
            backgroundColor: ["#006E6D","#009C9A","#00D6D4","#5ED0CF"],
            borderWidth: 0,
            data: ["<?php echo $row['INVERVENCIONE']?>","<?php echo $row['INVERVENCIONL']?>","<?php echo $row['INVERVENCIONT']?>","<?php echo $row['COMPUTOPRINCIPAL']?>"]
        }]
        <?php }?>
    },
    options: {
    responsive: true,
    plugins: {
      legend: {
        position: 'top',
      },
      title: {
        display: true,
        text: 'Computo'
      }
    }
  },
});

//GRÁFICA PARA MEDIR EL SERVICIO DE IMPRESION
<?php 
            $query = "SELECT
            COUNT( CASE WHEN servicio = 'IMPRESION' THEN 1 END ) AS IMPRESIONPRINCIPAL,
            COUNT( CASE WHEN intervencion = 'MULTIFUNCIONAL' THEN 1 END ) AS INVERVENCIONM,
            COUNT( CASE WHEN intervencion = 'IMPRESORA' THEN 1 END ) AS INVERVENCIONI,
            COUNT( CASE WHEN intervencion = 'ESCANER' THEN 1 END ) AS INVERVENCIONES
            FROM
            reporte";
        $resultado = mysqli_query($conexion, $query);
?>
var piechar = new Chart(document.getElementById("piechart-impresion"), {
    type: 'polarArea',
    data: {
        <?php while($row = mysqli_fetch_array($resultado)){ ?>
        labels: ["Multifuncional", "Impresora", "Escanner","Total"
        ],
        datasets: [{
            label: "Sistemas",
            backgroundColor: ["#00CF4B","#00F358","#37FF80","#91FFB9"],
            borderWidth: 0,
            data: ["<?php echo $row['INVERVENCIONM']?>","<?php echo $row['INVERVENCIONI']?>","<?php echo $row['INVERVENCIONES']?>","<?php echo $row['IMPRESIONPRINCIPAL']?>"]
        }]
        <?php }?>
    },
    options: {
    responsive: true,
    plugins: {
      legend: {
        position: 'top',
      },
      title: {
        display: true,
        text: 'Impresión'
      }
    }
  },
});
//GRÁFICA PARA MEDIR EL SERVICIO DE COMUNICACIONES
<?php 
            $query = "SELECT
            COUNT( CASE WHEN servicio = 'COMUNICACIONES' THEN 1 END ) AS COMUNICACIONESPRINCIPAL,
            COUNT( CASE WHEN intervencion = 'INTERNET' THEN 1 END ) AS INVERVENCIONINT,
            COUNT( CASE WHEN intervencion = 'TELEFONÍA' THEN 1 END ) AS INVERVENCIONTEL,
            COUNT( CASE WHEN servicio = 'PROGRAMACIÓN DE EVENTOS/REUNIO' THEN 1 END ) AS PROGRAMACIONPRIN,
            COUNT( CASE WHEN intervencion = 'PRÉSTAMO DE EQUIPO' THEN 1 END ) AS INVERVENCIONPREST
            FROM
            reporte";
        $resultado = mysqli_query($conexion, $query);
?>
var piechar = new Chart(document.getElementById("piechart-comunicaciones"), {
    type: 'polarArea',
    data: {
        <?php while($row = mysqli_fetch_array($resultado)){ ?>
        labels: ["Internet", "Telefonía","Total"
        ],
        datasets: [{
            label: "Sistemas",
            backgroundColor: ["#000075","#2424D1","#3636FF"],
            borderWidth: 0,
            data: ["<?php echo $row['INVERVENCIONINT']?>","<?php echo $row['INVERVENCIONTEL']?>","<?php echo $row['COMUNICACIONESPRINCIPAL']?>"]
        }]
        <?php }?>
    },
    options: {
    responsive: true,
    plugins: {
      legend: {
        position: 'top',
      },
      title: {
        display: true,
        text: 'Comunicaciones'
      }
    }
  },
});
//GRÁFICA PARA MEDIR LA PROGRAMACIÓN DE EVENTOS Y REUNIONES
<?php 
            $query = "SELECT
            COUNT( CASE WHEN servicio = 'PROGRAMACIÓN DE EVENTOS/REUNIO' THEN 1 END ) AS PROGRAMACIONPRIN,
            COUNT( CASE WHEN intervencion = 'PRÉSTAMO DE EQUIPO' THEN 1 END ) AS INVERVENCIONPREST
            FROM
            reporte";
        $resultado = mysqli_query($conexion, $query);
?>
var piechar = new Chart(document.getElementById("piechart-eventos"), {
    type: 'polarArea',
    data: {
        <?php while($row = mysqli_fetch_array($resultado)){ ?>
        labels: ["Préstamo de equipo","Total"
        ],
        datasets: [{
            label: "Sistemas",
            backgroundColor: ["#FF6609","#FF8C47"],
            borderWidth: 0,
            data: ["<?php echo $row['INVERVENCIONPREST']?>","<?php echo $row['PROGRAMACIONPRIN']?>"]
        }]
        <?php }?>
    },
    options: {
    responsive: true,
    plugins: {
      legend: {
        position: 'top',
      },
      title: {
        display: true,
        text: 'Programación de eventos/reuniones'
      }
    }
  },
});
</script>

</html>