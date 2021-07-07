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
  $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");  
  $fecha = $meses[date('n')-1].'  '.date('Y');
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


    <!-- MetisMenu CSS -->


    <link href="../boots/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- <link href="../dist/css/sb-admin-2.css" rel="stylesheet"> -->
    <link href="../boots/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="../css/styles.css">
    <script type="text/javascript" src="../js/funciones.js"></script>
    <script type="text/javascript" src="../js/area.js"></script>
    <link rel="stylesheet" type="text/css" href="../datas/dataTables.css">
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
                                    <a href="historial"><i class="fa fa-list-alt"></i> Historial</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="glyphicon glyphicon-cog"></i> Registros<span
                                    class="fa arrow"></span></a>
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
                    <h1 class='page-header'>Administrador</h1>
                    <?php
                    echo
                    "<marquee style='color: white; background-color: #1489D8;' width='100%' direction='left'>
                        Estadisticas generales mostradas al mes de $fecha
                    </marquee>";
                    ?>
                </div>

                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">


                <div class="zoom col-lg-3 col-md-6">
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
                                            COUNT( CASE WHEN estado_rpt = 'En proceso' THEN 1 END ) AS Proceso 
                                        FROM
                                            reporte 
                                        WHERE
                                            MONTH ( finicio ) = MONTH (
                                            CURRENT_DATE ())";
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
                </div>
                <div class="card" style="width: 18rem;">
  <img class="card-img-top" src="..." alt="Card image cap">
  <div class="card-body">
    <h5 class="card-title">Card title</h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    <a href="#" class="btn btn-primary">Go somewhere</a>
  </div>
</div>
                <div class="zoom col-lg-3 col-md-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <img src="../img/pendiente.svg" width="60px" alt="Bueno" class="img-fluid">
                                </div>
                                <div class="col-xs-9 text-right text-warning">
                                    <div class="huge"><?php echo $row['Pendiente'] ?></div>
                                    <div>Pendientes</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="zoom col-lg-3 col-md-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <img src="../img/realizando.svg" width="60px" alt="Bueno" class="img-fluid">
                                </div>
                                <div class="col-xs-9 text-right text-primary">
                                    <div class="huge"><?php echo $row['Proceso'] ?></div>
                                    <div>Realizando</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="zoom col-lg-3 col-md-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <img src="../img/cancelado.svg" width="60px" alt="Bueno" class="img-fluid">
                                </div>
                                <div class="col-xs-9 text-right text-danger">
                                    <div class="huge"><?php echo $row['Proceso'] ?></div>
                                    <div>Cancelado</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

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
                                    Reporte pendiente
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

                                    <br>
                                    <div class="col-sm-4">
                                        <label>¿Requiere reasignar técnico?</label><br>
                                        <label for="SI">SI</label>
                                        <input name="OK" type="radio" value="SI" id="SI" />
                                        <label for="NO">NO</label>
                                        <input name="OK" type="radio" value="NO" id="NO" checked="checked" />
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
                <div id="cuadro1" class="col-lg-12">
                    <div class="panel panel-default">

                        <div class="panel-body">

                            <table id="data-table-administrador" class="table table-striped table-bordered" width="100%"
                                cellspacing="0"></table>

                        </div>
                    </div>

                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h5 style="font-weight: bold; text-align: center;">Estadística Mensual de Evaluación</h5>
                            <div class="row">
                                <canvas id="piechart-admin"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h5 style="font-weight: bold; text-align: center;">Estadística Mensual Solicitud Según
                                Servicio</h5>
                            <div style="padding-top:50px;" class="row">
                                <canvas id="piechart-servicios"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
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


<script type="text/javascript">
var dataSet = [
    <?php

	    $query = "SELECT
                    reporte.n_reporte,
                    usuarios.nombre,
                    usuarios.apellidos,
                    usuarios.ubicacion,
                    usuarios.extension,
                    reporte.finicio,
                    reporte.ffinal,
                    reporte.evaluacion,
                    reporte.estado_rpt
                 FROM
                    reporte 
                LEFT JOIN usuarios ON reporte.n_empleado = usuarios.n_empleado
                WHERE
                MONTH ( finicio ) = MONTH (
                CURRENT_DATE ()) 
                ORDER BY  n_reporte DESC";
	$resultado = mysqli_query($conexion, $query);
        while($data = mysqli_fetch_array($resultado)){
            if($data['ffinal'] == '0000-00-00'){
                $NA = "Sin fecha";

            } else {
                $NA = $data['ffinal'];
            };
            if($data['evaluacion'] == '0'){
                $eva = "SIN EVALUAR";
            } else {
                $eva = $data['evaluacion'];
            }
        ?>

    ["<?php echo  $data['n_reporte']?>", "<?php echo  $data['nombre'].' '.$data['apellidos']?>",
        "<?php echo  $data['ubicacion']?>", "<?php echo  $data['extension']?>", "<?php echo $data['finicio']?>",
        "<?php echo $NA ?>", "<?php echo   $eva?>",

        "<?php if($data['estado_rpt'] == 'Pendiente'){
                
                echo "<a href='#' type='button' data-toggle='modal' data-target='#modalAtndr' class='detalle btn btn-warning' onclick='atender({$data['n_reporte']})' style='width:100%'>{$data['estado_rpt']}</a>";

                    } 
                      else if($data['estado_rpt'] == 'En proceso') {
                echo "<a href='#' type='button' data-toggle='modal' data-target='#modalAtndr' class='detalle btn btn-info' onclick='atender({$data['n_reporte']})' style='width:100%'>{$data['estado_rpt']}</a>";

                    }else if($data['evaluacion'] =='0' && $data['estado_rpt'] =='Cancelado'){

                echo "<a href='#' type='button' data-toggle='modal' data-target='#modalDtll' class='detalle btn btn-default' onclick='detalle({$data['n_reporte']})' style='width:100%'>Por confirmar</a>";

                    } else if($data['evaluacion'] == '0'){

                echo "<a href='#' type='button' data-toggle='modal' data-target='#modalDtll' class='detalle btn btn-default' onclick='detalle({$data['n_reporte']})' style='width:100%'>Por evaluar</a>";

                    } else if($data['estado_rpt'] == 'Finalizado'){
                echo "<a href='#' type='button' data-toggle='modal' data-target='#modalDtll' class='detalle btn btn-success' onclick='detalle({$data['n_reporte']})' style='width:100%'>{$data['estado_rpt']}</a>";
                    } else if($data['evaluacion']=='CANCELADO'){

                echo "<a href='#' type='button' data-toggle='modal' data-target='#modalDtll' class='detalle btn btn-warning' onclick='detalle({$data['n_reporte']})' style='width:100%'>{$data['estado_rpt']}</a>";
                    }?>"

        //"<?php //echo  $data['estado_rpt']?>"
    ],
    <?php } ?>
];
//       

var tableGenerarReporte = $('#data-table-administrador').DataTable({
    "language": {
        "searchPlaceholder": "Buscar datos...",
        "url": "//cdn.datatables.net/plug-ins/1.10.25/i18n/Spanish.json"
    },
    "order": [
        [0, "desc"]
    ],
    orderCellsTop: true,
    fixedHeader: true,
    data: dataSet,
    columns: [{
            title: "N°"
        },
        {
            title: "Nombre"
        },
        {
            title: "Ubicación"
        },
        {
            title: "Extensión"
        },
        {
            title: "Fecha Reporte"
        },
        {
            title: "Fecha termino"
        },
        {
            title: "Evaluación"
        },
        {
            title: "Proceso"
        }
    ],
});

//GRAFICAS PARA MEDIR LA EVALUACIÓN DEL TÉCNICO//
<?php 
            $query = " SELECT
            COUNT( CASE WHEN evaluacion = 'BUENO' THEN 1 END ) AS Bueno,
            COUNT( CASE WHEN evaluacion = 'REGULAR' THEN 1 END ) AS Regular,
            COUNT( CASE WHEN evaluacion = 'MALO' THEN 1 END ) AS Malo,
            COUNT( CASE WHEN evaluacion = 'CANCELADO' THEN 1 END ) AS Cancelado
            FROM
            reporte";
            // -- WHERE
            // -- MONTH ( finicio ) = MONTH (
            // -- CURRENT_DATE ())";
    //     $query = "SELECT
    //     usuarios.nombre,
    //     usuarios.apellidos,
    //     COUNT( CASE WHEN evaluacion = 'BUENO' THEN 1 END ) AS Bueno,
    //     COUNT( CASE WHEN evaluacion = 'REGULAR' THEN 1 END ) AS Regular,
    //     COUNT( CASE WHEN evaluacion = 'MALO' THEN 1 END ) AS Malo 
    // FROM
    //     reporte
    //     INNER JOIN tecnico ON reporte.idtec = tecnico.id_tecnico
    //     INNER JOIN usuarios ON tecnico.id_usu = usuarios.id_usuario 
    // GROUP BY
    //     idtec";
        $resultado = mysqli_query($conexion, $query);
?>
var piechar = new Chart(document.getElementById("piechart-admin"), {
    type: 'pie',
    data: {

        <?php while($row = mysqli_fetch_array($resultado)){ ?>
        labels: ["Bueno", "Regular", "Malo", "Cancelado"],

        datasets: [{
                label: "Bueno",
                backgroundColor: ["#057100", "#0BFD00", "#FD9200", "#FD0000"],
                borderWidth: 0,
                data: [<?php echo $row['Bueno']?>, <?php echo $row['Regular']?>, <?php echo $row['Malo']?>,
                    <?php echo $row['Cancelado']?>
                ]
            }

        ],
        <?php }?>
    },
    options: {
        responsive: true,
        legend: {
            labels: {
                position: 'top',
            }
        },
        title: {
            display: true,
            text: 'Porcentaje de cumplimiento'
        },
        maintainAspectRatio: false
    }
});
//GRAFICAS PARA MEDIR SOLICITUD DE SERVICIO SEGUN EL CASO
<?php 
            $query = " SELECT
           	COUNT( CASE WHEN servicio = 'IMPRESORA/MULTIFUNCIONALES' THEN 1 END ) AS multifuncionales,
	        COUNT( CASE WHEN servicio = 'SISTEMAS_APLICATIVOS' THEN 1 END ) AS sistemasAplicativos,
	        COUNT( CASE WHEN servicio = 'EQUIPO DE CÓMPUTO' THEN 1 END ) AS equipoComputo,
            COUNT( CASE WHEN servicio = 'SISTEMAS' THEN 1 END ) AS sistemas,
            COUNT( CASE WHEN servicio = 'RED' THEN 1 END ) AS red,
            COUNT( CASE WHEN servicio = 'OTROS' THEN 1 END ) AS otros
            FROM
            reporte";
            // -- WHERE
            // -- MONTH ( finicio ) = MONTH (
            // -- CURRENT_DATE ())";
    //     $query = "SELECT
    //     usuarios.nombre,
    //     usuarios.apellidos,
    //     COUNT( CASE WHEN evaluacion = 'BUENO' THEN 1 END ) AS Bueno,
    //     COUNT( CASE WHEN evaluacion = 'REGULAR' THEN 1 END ) AS Regular,
    //     COUNT( CASE WHEN evaluacion = 'MALO' THEN 1 END ) AS Malo 
    // FROM
    //     reporte
    //     INNER JOIN tecnico ON reporte.idtec = tecnico.id_tecnico
    //     INNER JOIN usuarios ON tecnico.id_usu = usuarios.id_usuario 
    // GROUP BY
    //     idtec";
        $resultado = mysqli_query($conexion, $query);
?>
var piechar = new Chart(document.getElementById("piechart-servicios"), {
    type: 'bar',
    data: {
        <?php while($row = mysqli_fetch_array($resultado)){ ?>
        labels: ["Impresora/Multifuncionales", "Sistemas Aplicativos", "Equipo de cómputo", "Sistemas", "Red",
            "Otros"
        ],
        datasets: [{
            label: "Soporte solicitado",
            backgroundColor: ["#707070", "#006C52", "#002FC2", "#EB4E00", "#000D8A"],
            borderWidth: 0,
            data: [<?php echo $row['multifuncionales']?>, <?php echo $row['sistemasAplicativos']?>,
                <?php echo $row['equipoComputo']?>, <?php echo $row['sistemas']?>,
                <?php echo $row['red']?>, <?php echo $row['otros']?>
            ]
        }]
        <?php }?>
    },
    options: {
        legend: {
            labels: {
                fontColor: '#5c6dc0',
            }
        },
        title: {
            display: false,
            text: 'Porcentaje de cumplimiento'
        },
        scales: {
            y: {
                beginAtZero: true
            }
        }

    }
});
</script>

</html>