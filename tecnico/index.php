<?php 
include ("../../gestor/conexion/conexion.php");
include ("../conexion/conexion.php"); 
session_start(); 
  if (isset($_SESSION['usuario'])) 
    { 
      $id = $_SESSION['usuario']['id_usu'];
    }else{ header('Location: ../../gestor'); }
//si la variable ssesion existe realizara las siguiente evaluacion 
//*** if (isset($_SESSION['usuario'])) {
//si se ha logeado evaluamos si el usuario que aya ingresado intenta acceder a este directorio no es de tipo administrador, no le es permitido el acceso .. si tipo usuario es distinto de admin , entonces no tiene nada que hacer en este directorio 
//*** if($_SESSION['usuario']['privilegios'] != "tecnico"){
//y se redirecciona al directorio que le corresponde
//*** header("Location: ../"); } }else{
//si no exixte quiere decir que nadie se ha logeado y lo regsara al inicio (login)
//*** header('Location: ../'); }
    include('acceso.php');

        ini_set('date.timezone','America/Mexico_City');
        $Final= date('d').'/'.date('m').'/'.date('Y');
        $Hfinal=date('H:i:s');
        unset($_SESSION['consulta']);

        $sql = "SELECT gstNmpld, gstNombr, gstApell FROM personal WHERE estado = 0 && gstNmpld != 0";
        $usua = mysqli_query($conexion2,$sql);
        date_default_timezone_set('America/Mexico_City');
        $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");  
        $fecha = $meses[date('n')-1].'  '.date('Y');
        date_default_timezone_set('America/Mexico_City');
                      $hoy = date("d.m.y, g:i a"); 



?>
<!DOCTYPE html>
<html lang="es">

<head>

    <meta name="tipo_contenido" content="text/html;" http-equiv="content-type" charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Reporte</title>

    <!-----------DATA TABLE RESPONSIVE---------->
    <link rel="stylesheet" href="https://cdn.datatables.net/rowreorder/1.2.8/css/rowReorder.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.dataTables.min.css">

    <script src="https://code.jquery.com/jquery-3.6.0.js"
        integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <link rel="stylesheet"
        href="https://rawgit.com/Eonasdan/bootstrap-datetimepicker/master/build/css/bootstrap-datetimepicker.min.css" />

    <script type="text/javascript" src="../js/atdRpt.js"></script>
    <link href="../boots/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">
    <link href="../boots/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="../css/styles.css">
    <link rel="stylesheet" type="text/css" href="../datas/dataTables.css">
    <link rel="stylesheet" type="text/css" href="../../gestor/css/responsive.css">    
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

                <!-- /.dropdown -->

                <!-- /.dropdown -->

                <!-- /.dropdown -->
                <li class="dropdown">
                    <a id="icon-usu" class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#" type="button" data-toggle="modal" data-target="#modalEditar"><i
                                    class="fa fa-pencil-square-o"></i> ACTUALIZAR</a>
                        </li>-
                        <li><a href="../../gestor/conexion/cerrar_session.php"><i
                                    class="fa fa-sign-out fa-fw"></i>CERRAR
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

                          <li>
                             <a href="../../gestor/menu"><i style="color:#000000;">.</i> MENÚ PRINCIPAL</a>
                          </li>

                        <li>
                            <a href="./"><i class="glyphicon glyphicon-home"></i> INICIO</a>
                        </li>
                        <li>
                            <a href="conRpt.php"><i class="fa fa-keyboard-o"></i> CONSULTAR REPORTES</a>
                            <!-- <a href="#"><i class="fa fa-desktop"></i> Consultar equipos</a> -->
                            <!-- /.nav-second-level -->
                        </li>

                        <?php if($id == '22'){ ?>
                        <li>
                            <a href="../administrador/tecnico/admin.php"><i class="fa fa-street-view"></i> TÉCNICOS</a>
                        </li>
                        <?php } ?>

                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <div id="page-wrapper">

            <div class="row">
                <div class="col-lg-12" id="header">
                    <img src="../img/afac.png" class="imgafac">
                    <h1 class="page-header">ATENDER REPORTE</h1>
                    <?php 
                  
                    if($data['sede'] == 'WEB'){
                        echo "<marquee style='text-transform: uppercase; color: white; background-color: #1489D8;' width='100%' direction='left'>
                        Estadisticas generales mostradas al mes de $fecha
                    </marquee>";

                    }else{
                        echo "<marquee style='text-transform: uppercase; color: white; background-color: #1489D8;' width='100%' direction='left'>
                        SOLICITUDES AL MES DE $fecha
                    </marquee>";
                    }
                    ?>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-cherri">
                    </div>
                </div>
                <?php 
                if($data['sede'] == 'WEB'):?>
                <div class="zoom col-lg-3 col-md-6">
                    <div data-toggle="modal" data-target="#finalizados" class="panel panel-default">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <img src="../img/realizado.svg" width="60px" alt="Bueno" class="img-fluid">
                                </div>
                                <?php 
                                $query ="SELECT
                                            'total',
                                            COUNT( CASE WHEN estado_rpt = 'Por atender' THEN 1 END ) AS Por_atender,
                                            COUNT( CASE WHEN estado_rpt = 'Finalizado' THEN 1 END ) AS Finalizado,
                                            COUNT( CASE WHEN estado_rpt = 'Cancelado' THEN 1 END ) AS Cancelado,
                                            COUNT( CASE WHEN estado_rpt = 'Pendiente' THEN 1 END ) AS Pendiente 
                                        FROM
                                            reporte
                                        WHERE
                                        servicio = 'SISTEMAS' AND
                                      MONTH ( finicio ) = MONTH (
                                      CURRENT_DATE ())";
                                $resultado = mysqli_query($conexion, $query);
                                $row = mysqli_fetch_assoc($resultado);
                                ?>
                                <div class="col-xs-9 text-right text-success">
                                    <div class="huge"><?php echo $row['Finalizado'] ?></div>
                                    <div>FINALIZADOS</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="zoom col-lg-3 col-md-6">
                    <div data-toggle="modal" data-target="#poratender" class="panel panel-default">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <img src="../img/pendiente.svg" width="60px" alt="Bueno" class="img-fluid">
                                </div>
                                <div class="col-xs-9 text-right text-danger">
                                    <div class="huge"><?php echo $row['Por_atender'] ?></div>
                                    <div>POR ATENDER</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="zoom col-lg-3 col-md-6">
                    <div data-toggle="modal" data-target="#pendiente" class="panel panel-default">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <img src="../img/realizando.svg" width="60px" alt="Bueno" class="img-fluid">
                                </div>
                                <div class="col-xs-9 text-right text-primary">
                                    <div class="huge"><?php echo $row['Pendiente'] ?></div>
                                    <div>REALIZANDO</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="zoom col-lg-3 col-md-6">
                    <div data-toggle="modal" data-target="#cancelado" class="panel panel-default">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <img src="../img/cancelado.svg" width="60px" alt="Bueno" class="img-fluid">
                                </div>
                                <div class="col-xs-9 text-right text-warning">
                                    <div class="huge"><?php echo $row['Cancelado'] ?></div>
                                    <div>CANCELADOS</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php else : ?>

            <?php endif?>




            <div class="panel-body">
                <div class="col-lg-12">
                    <?php if($data['sede'] == 'WEB'):?>
                    <table style="width: 100%" id="data-table-reporte-web" class="table table-striped table-hover">
                        <?php else : ?>
                        <table style="width: 100%" id="data-table-reporte" class="table table-striped table-hover">
                            <?php endif?>
                        </table>
                </div>
            </div>
        </div>




        <?php include('conActu.php');?>


        <div class="modal fade" id="finalizados" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" style="width: 720px;" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <table id="data-table-finalizados" class="table table-striped table-bordered" width="100%"
                            cellspacing="0"></table>

                    </div>
                    <div class="modal-footer">
                        <button type="button" data-dismiss="modal" class="btn btn-primary">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="poratender" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" style="width: 720px;" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <table id="data-table-por-atender" class="table table-striped table-bordered" width="100%"
                            cellspacing="0"></table>
                    </div>
                    <div class="modal-footer">
                        <button type="button" data-dismiss="modal" class="btn btn-primary">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="pendiente" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" style="width: 720px;" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <table id="data-table-pendiente" class="table table-striped table-bordered" width="100%"
                            cellspacing="0"></table>
                    </div>
                    <div class="modal-footer">
                        <button type="button" data-dismiss="modal" class="btn btn-primary">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="cancelado" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" style="width: 720px;" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <table id="data-table-cancelado" class="table table-striped table-bordered" width="100%"
                            cellspacing="0"></table>
                    </div>
                    <div class="modal-footer">
                        <button type="button" data-dismiss="modal" class="btn btn-primary">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>
        <!--FINISH STADISTICS-->

        <form class="form-horizontal" action="" method="POST">
            <div class="modal fade" id="modalAtndr" class="col-xs-12 .col-md-12" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalLabel">

                <div class="modal-dialog width" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <!--<button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="limpiarCampo()"><span style="color: black"  aria-hidden="true">&times;</span>
</button>-->
                            <button type="button" onclick="location.href='./'" class="close" data-dismiss="modal"
                                aria-label="Close"><span style="color: black" aria-hidden="true">&times;</span></button>

                            <h4 class="modal-title" id="exampleModalLabel">
                                <p>

                                    <!--<a style="color: blue" href='#' type='button' data-toggle='modal' data-target='#modalVal' style='width:100%; font-size:12px;'>Favor de validar, ¿el equipo de cómputo pertenece al usuario?</a>-->

                                </p><input type="hidden" id="idequipo"><b>ATENDER REPORTE</b>
                            </h4>
                        </div>
                        <div class="modal-body">
                            <input type="hidden" id="id_usuario" name="id_usuario" value="<?php echo $idtecnico; ?>">
                            <input type="hidden" id="opcion" name="opcion" value="atender">
                            <div class="form-group">
                                <div class="col-sm-3">
                                    <label>N° REPORTE</label>
                                    <input id="n_reporte" name="n_reporte" type="text" class="form-control" disabled="">
                                </div>
                                <div class="col-sm-6">
                                    <label>USUARIO</label>
                                    <input id="usuario" name="usuario" type="text" class="form-control" disabled="">
                                </div>
                                <div class="col-sm-3">
                                    <label>EXTENSIÓN</label>
                                    <input id="extension" name="extension" type="text" class="form-control" disabled="">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-12">
                                    <label>SEDE</label>
                                    <input id="sede" name="sede" type="text" class="form-control">
                                </div>

                            </div>

                            <p id="divp">
                                ¿ES CORRECTA LA DESCRIPCIÓN DEL PROBLEMA QUE SELECCIONO EL USUARIO?
                                <label for="SI">SI</label>
                                <input checked="checked" name="correct" type="radio" value="true" id="true" />
                                <label for="NO">NO</label>
                                <input name="correct" type="radio" value="false" id="false" />
                            </p>

                            <div id="dsprob1" style="display: none;">

                                <!--                <div id="buscador"></div>
                    <div id="select1"></div>  
                    <div id="select2"></div> -->

                                <div class="form-group">
                                    <div id="buscador"></div>
                                    <div id="select1"></div>
                                    <div id="select2"></div>
                                </div>
                                <div class="form-group">
                                    <div id="select3"></div>
                                    <div id="select4"></div>
                                    <div id="select5"></div>
                                </div>

                                <input type="hidden" name="rspst" id="rspst">

                            </div>

                            <div class="form-group" id="dsprob2">

                                <div class="col-sm-4">
                                    <label>TIPO DE SERVICIO</label>
                                    <input id="servicio" type="text" class="form-control" disabled="">
                                </div>

                                <div class="col-sm-4">
                                    <label style="color:white;">.</label>
                                    <input id="intervencion" type="text" class="form-control" disabled="">
                                </div>

                                <div class="col-sm-4">
                                    <label style="color:white;">.</label>
                                    <input id="descripcion" type="text" class="form-control" disabled="">
                                </div>

                                <div class="col-sm-4">
                                    <!--                     <label>Tipo de servicio</label>
 -->
                                    <textarea onkeyup="mayus(this);" id="solucion" class="form-control"
                                        id="exampleFormControlTextarea1" rows="1" readonly></textarea>
                                    <!-- <input id="solucion" type="text" class="form-control" disabled=""> -->

                                </div>

                                <div class="col-sm-4">
                                    <!--                     <label>Intervención</label>
 --> <input id="ultima" type="text" class="form-control" disabled="">
                                </div>

                                <div class="col-sm-4">
                                    <!--                     <label>Descripción</label>
 --> <input id="final" type="text" class="form-control" disabled="">
                                </div>

                                <input type="hidden" name="rspst" id="rspst" value="SI">

                            </div>

                            <div class="form-group">
                                <div class="col-sm-12">
                                    <label>OBSERVACIONES DEL USUARIO AL PROBLEMA</label>
                                    <textarea id="usu_observ" name="usu_observ" class="form-control"
                                        id="exampleFormControlTextarea1" rows="3" disabled=""></textarea>
                                </div>
                            </div>
                            <div class="form-group" id="confirmar">
                                <div class="col-sm-12">
                                    <label style="color:red">EL SERVICIO NO SE REALIZÓ CON ÉXITO</label>
                                    <textarea id="observac" name="observac" class="form-control"
                                        id="exampleFormControlTextarea1" rows="3" disabled=""></textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-12">
                                    <label>RESPUESTA DE FALLA</label>
                                    <textarea onkeyup="mayus(this);" id="falla_interna" name="falla_interna"
                                        class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                                </div>
                            </div>

                            <p id="divp">
                                ¿EL SOPORTE ES EXTERNO?
                                <label for="SI">SI</label>
                                <input name="select" type="radio" value="si" id="SI" />
                                <label for="NO">NO</label>
                                <input name="select" type="radio" value="no" id="NO" />
                            </p>

                            <div class="form-group" id="externo" style="display: none;">
                                <div class="col-sm-12">
                                    <label> RESPUESTA EXTERNA DE LA FALLA</label>
                                    <textarea onkeyup="mayus(this);" id="falla_xterna" name="falla_xterna"
                                        class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-4">
                                    <label> FECHA REPORTE</label>
                                    <input id="finicio" name="finicio" type="text" class="form-control" disabled="">
                                </div>
                                <div class="col-sm-4">
                                    <label> FECHA FINALIZADA</label>
                                    <input type="text" value="<?php echo $Final.' a las '.$Hfinal.' hrs'?>"
                                        class="form-control" disabled="">
                                </div>

                                <div class="col-sm-4">
                                    <label>ESTADO DEL REPORTE</label>
                                    <select class="form-control" selected="true" id="estado_rpt" name="estado_rpt">
                                        <option value="Por atender">POR ATENDER</option>
                                        <option value="Finalizado">FINALIZADO</option>
                                        <option value="Pendiente">PENDIENTE</option>
                                        <option value="Cancelado">CANCELADO</option>
                                    </select>
                                </div>

                            </div>


                            <div class="form-group" style="text-transform: uppercase;" id="notifi"><br>
                                <div class="col-sm-offset-0 col-sm-4">
                                    <button type="button" id="button" class="btn btn-green"
                                        onclick="atdRpt();">ACEPTAR</button>
                                    <button type="button" onclick="location.href='./'" class="btn btn-default"
                                        data-dismiss="modal">SALIR</button>

                                </div>
                                <b>
                                    <p class="alert alert-danger text-center padding error" id="errors">Error al
                                        agregar datos de solicitud </p>
                                </b>

                                <b>
                                    <p class="alert alert-danger text-center padding error" id="pndnt">¡El reporte
                                        está Por atender! </p>
                                </b>

                                <b>
                                    <p class="alert alert-info text-center padding exito" id="procso">¡El reporte
                                        está Pendiente!</p>
                                </b>

                                <b>
                                    <p class="alert alert-warning text-center padding error" id="canclado">¡El
                                        reporte se ha cancelado !</p>
                                </b>

                                <b>
                                    <p class="alert alert-success text-center padding exito" id="exitos">¡El reporte
                                        ha finalizado !</p>
                                </b>

                                <b>
                                    <p class="alert alert-warning text-center padding aviso" id="vacios">Llene
                                        campos vacíos</p>
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


        <form class="form-horizontal" action="" method="POST">
            <div class="modal fade" id="modalDtll" class="col-xs-12 .col-md-12" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalLabel">

                <div class="modal-dialog width" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"
                                onclick="limpiarCampo()"><span style="color: black" aria-hidden="true">&times;</span>
                            </button>
                            <h4 class="modal-title" id="exampleModalLabel"><b>DETALLES DEL REPORTE - <input
                                        style="text-transform: uppercase;" class="transparent" id="estado_rpt"
                                        name="estado_rpt" disabled=""></b></h4>
                        </div>
                        <div class="modal-body">
                            <input type="hidden" id="id_usuario" name="id_usuario"
                                value="<?php echo $_SESSION['usuario']['id_tecnico'];?>">
                            <input type="hidden" id="opcion" name="opcion" value="actualizar">
                            <div class="form-group">
                                <div class="col-sm-3">
                                    <label>N° REPORTE</label>
                                    <input id="n_reporte" name="n_reporte" type="text" class="form-control"
                                        class="disabled" disabled="">
                                </div>
                                <div class="col-sm-6">
                                    <label>USUARIO</label>
                                    <input id="usuario" name="usuario" type="text" class="form-control" disabled="">
                                </div>
                                <div class="col-sm-3">
                                    <label>EXTENSIÓN</label>
                                    <input id="extension" name="extension" type="text" class="form-control" disabled="">
                                </div>
                                <!-- <div class="col-sm-2">
                    <label>Ubicación</label>
                    <input id="ubicacion" name="ubicacion" type="text" class="form-control" disabled="">
                    </div> -->
                            </div>

                            <div class="form-group">
                                <div class="col-sm-4">
                                    <label>TIPO DE SERVICIO</label>
                                    <input id="servicio" name="servicio" type="text" class="form-control" disabled="">
                                </div>

                                <div class="col-sm-4">
                                    <label>INTERVENCIÓN</label>
                                    <input id="intervencion" name="intervencion" type="text" class="form-control"
                                        disabled="">
                                </div>

                                <div class="col-sm-4">
                                    <label>DESCRIPCIÓN</label>
                                    <input id="descripcion" name="descripcion" type="text" class="form-control"
                                        disabled="">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-12">
                                    <label>OBSERVACIONES DEL USUARIO AL PROBLEMA</label>
                                    <textarea id="usu_observ" name="usu_observ" class="form-control"
                                        id="exampleFormControlTextarea1" rows="3" disabled=""></textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-12">
                                    <label>RESPUESTA DE FALLA</label>
                                    <textarea onkeyup="mayus(this);" id="falla_interna" name="falla_interna"
                                        class="form-control" id="exampleFormControlTextarea1" rows="3"
                                        disabled=""></textarea>
                                </div>
                            </div>

                            <div class="form-group" id="falla">
                                <div class="col-sm-12">
                                    <label> RESPUESTA EXTERNA A LA FALLA</label>
                                    <textarea onkeyup="mayus(this);" id="falla_xterna" name="falla_xterna"
                                        class="form-control" id="exampleFormControlTextarea1" rows="3"
                                        disabled=""></textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-4">
                                    <label> FECHA DE REPORTE</label>
                                    <input id="finicio" name="finicio" type="text" class="form-control" disabled="">
                                </div>
                                <div class="col-sm-4">
                                    <label> FECHA FINALIZADA</label>
                                    <input id="ffinal" name="ffinal" type="text" class="form-control" disabled="">
                                </div>
                                <div class="col-sm-4">
                                    <label> SU EVALUACIÓN DE REPORTE</label>
                                    <input id="evaluacion" name="evaluacion" type="text" class="form-control"
                                        disabled="">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <label>¿POR QUÉ?</label>
                                    <textarea id="observa" name="observa" class="form-control"
                                        id="exampleFormControlTextarea1" rows="2" disabled=""></textarea>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </form>



        <form class="form-horizontal" action="" method="POST">
            <div class="modal fade" id="modalVal" class="col-xs-12 .col-md-12" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalLabel">

                <div class="modal-dialog width" role="document" style="/*margin-top: 7em;*/">
                    <div class="modal-content">
                        <div class="modal-header">

                            <button type="button" onclick="location.href='./'" class="close" data-dismiss="modal"
                                aria-label="Close"><span style="color: black" aria-hidden="true">&times;</span></button>
                            <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span style="color: black"  aria-hidden="true">&times;</span>
</button> -->

                            <h4 class="modal-title" id="exampleModalLabel"><b>
                                    FAVOR DE VALIDAR Y AGREGAR DATOS DEL EQUIPO </b></h4>
                        </div>
                        <div class="modal-body">
                            <input type="hidden" id="id_equipo" name="id_equipo">
                            <input type="hidden" id="opcion" name="opcion" value="actualizar">

                            <div class="form-group">
                                <div class="col-sm-4">
                                    <label>RESPONSABLE </label>
                                    <input id="usua" name="usua" type="text" class="form-control" disabled="">
                                </div>
                                <div class="col-sm-4">
                                    <label>NUMERO DE INVENTARIO</label>
                                    <input id="num_invntraio" name="num_invntraio" type="text" class="form-control">
                                </div>
                                <div class="col-sm-4">
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
                                    <select class="form-control" class="selectpicker" id="tipo_equipo"
                                        name="tipo_equipo" type="text" data-live-search="true">
                                        <option value="0">SELECCIONE TIPO EQUIPO</option>
                                        <option value="LAP TOP ">LAP TOP </option>
                                        <option value="ESCRITORIO">ESCRITORIO</option>
                                    </select>
                                </div>
                                <div class="col-sm-4">
                                    <label>MARCA</label>
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
                                    <label>VERSIÓN WINDOWS</label>
                                    <select class="form-control" selected="true" id="version_windows"
                                        name="version_windows">
                                        <option value="" selected>SELECCIONE</option>
                                        <option value="WINDOWS 7">WINDOWS 7</option>
                                        <option value="WINDOWS 10">WINDOWS 10</option>
                                        <option value="LINUX">LINUX</option>
                                    </select>
                                </div>
                                <div class="col-sm-offset-0 col-sm-3">
                                    <label>VERSIÓN OFFICE</label>
                                    <select class="form-control" selected="true" id="version_office"
                                        name="version_office">
                                        <option value="" selected>SELECCIONE</option>
                                        <option value="2016">2016</option>
                                        <option value="2010">2010</option>
                                        <option value="OTROS">OTROS</option>
                                    </select>
                                </div>
                                <div class="col-sm-3">
                                    <label>PROCESADOR</label>
                                    <select class="form-control" selected="true" id="procesador" name="procesador">
                                        <option value="" selected>SELECCIONE</option>
                                        <option value="INTEL">INTEL</option>
                                        <option value="AMD">AMD</option>
                                    </select>
                                </div>
                                <div class="col-sm-3">
                                    <label>VELOCIDAD PROCESADOR</label>
                                    <input id="velocidad_proc" name="velocidad_proc" type="text" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-4">
                                    <label>CAPACIDAD DE DISCO DURO</label>
                                    <select class="form-control" selected="true" id="disco_duro" name="disco_duro">
                                        <option value="" selected>SELECCIONE</option>
                                        <option value="250 GB">250 GB</option>
                                        <option value="320 GB">320 GB</option>
                                        <option value="500 GB">500 GB</option>
                                        <option value="1 TB">1 TB</option>
                                    </select>
                                </div>
                                <div class="col-sm-4">
                                    <label>CAPACIDAD DE MEMORIA RAM</label>
                                    <input id="memoria_ram" name="memoria_ram" type="text" class="form-control">
                                </div>
                                <div class="col-sm-4">
                                    <label>UNIDAD DE DISCO FLASH</label>
                                    <input id="uni_disc_flax" name="uni_disc_flax" type="text" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-4">
                                    <label>SERIE MONITOR</label>
                                    <input id="serie_monitor" name="serie_monitor" type="text" class="form-control">
                                </div>
                                <div class="col-sm-4">
                                    <label>SERIE TECLADO</label>
                                    <input id="serie_teclado" name="serie_teclado" type="text" class="form-control">
                                </div>
                                <div class="col-sm-4">
                                    <label>SERIE MOUSE</label>
                                    <input id="serie_mouse" name="serie_mouse" type="text" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-4">
                                    <label>DIRECCIÓN IP</label>
                                    <input id="direccion_ip" name="direccion_ip" type="text" class="form-control">
                                </div>
                                <div class="col-sm-4">
                                    <label>SERVICIO INTERNET</label>
                                    <input id="servicio_internet" name="servicio_internet" type="text"
                                        class="form-control">
                                </div>
                                <div class="col-sm-4">
                                    <label>UBICACIÓN DEL EQUIPO</label>
                                    <select class="form-control" class="selectpicker" name="ubicaeqpo" id="ubicaeqpo"
                                        type="text" data-live-search="true">
                                        <option value="0">SELECCIONE</option>
                                        <option value="PLANTA BAJA / VUS">PLANTA BAJA / VUS</option>
                                        <option value="PISO M2">PISO M2</option>
                                        <option value="PISO 1">PISO 1</option>
                                        <option value="PISO 2">PISO 2</option>
                                        <option value="PISO 3">PISO 3</option>
                                        <option value="PISO 4">PISO 4</option>
                                        <option value="PISO 5">PISO 5</option>
                                        <option value="PISO 6">PISO 6</option>
                                        <option value="PISO 7">PISO 7</option>
                                    </select>
                                </div>
                            </div>


                            <div class="form-group"><br>
                                <div class="col-sm-offset-0 col-sm-4">
                                    <button type="button" id="button" class="btn btn-green"
                                        onclick="agrEqpo();">ACEPTAR</button>
                                    <button type="button" class="btn btn-default" data-dismiss="modal">SALIR</button>
                                </div>
                                <b>
                                    <p class="alert alert-danger text-center padding error" id="danger">Error al
                                        agregar datos del equipo </p>
                                </b>

                                <b>
                                    <p class="alert alert-success text-center padding exito" id="success">¡Se
                                        agregaron los datos con éxito!</p>
                                </b>

                                <b>
                                    <p class="alert alert-warning text-center padding aviso" id="empty">Es necesario
                                        agregar los datos que se solicitan </p>
                                </b>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </form>

    </div>
    <!-- /.row -->
    </div>

    <!-- /#wrapper -->
</body>


<script src="../boots/bootstrap/js/bootstrap.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/jquery.dataTables.min.js"></script>
<script src="../js/dataTables.bootstrap.js"></script>
<script src="../js/dataTables.buttons.min.js"></script>
<script src="../boots/metisMenu/metisMenu.min.js"></script>
<script src="../dist/js/sb-admin-2.js"></script>

<script src="../js/mayu.js"></script>
<script src="../js/buttons.bootstrap.min.js"></script>

<!-- <script type="text/javascript" src="calendario/tcal.js"></script> -->
<script type="text/javascript" src="valida/valida.js"></script>
<script src="//oss.maxcdn.com/jquery.bootstrapvalidator/0.5.3/js/bootstrapValidator.min.js"></script>

<script src="//oss.maxcdn.com/momentjs/2.8.2/moment.min.js"></script>
<script src="https://rawgit.com/Eonasdan/bootstrap-datetimepicker/master/src/js/bootstrap-datetimepicker.js"></script>

<!-----DATATABLE RESPONSIVE------>
<!-- <script src="//cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script> -->
<script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/rowreorder/1.2.8/js/dataTables.rowReorder.min.js"></script>


<link rel="stylesheet" type="text/css" href="../boots/bootstrap/css/select2.css"><script type="text/javascript">
$(document).ready(function() {
    // $('#buscador').load('select/buscar.php');
    // $('#select1').load('select/tabla.php');
    // $('#select2').load('select/select.php');    

    $('#buscador').load('select/buscar.php');
    $('#select1').load('select/tabla.php');
    $('#select2').load('select/select.php');
    $('#select3').load('select/penultimo.php');
    $('#select4').load('select/ultimo.php');
    $('#select5').load('select/final.php');
    $('#n_empleado').select2();
});
</script>
<script src="../js/select2.js"></script>
<?php include('../php/index-sistemas.php');?>