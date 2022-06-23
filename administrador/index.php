<?php 
include ("../../gestor/conexion/conexion.php");
include ("../conexion/conexion.php"); 
session_start(); 
if (isset($_SESSION['usuario'])){ 
$idu = $_SESSION['usuario']['id_usu'];    
}else{ header('Location: ../../gestor'); }

    include('acceso.php');

   ini_set('date.timezone','America/Mexico_City');
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

    <title>Sistema</title>

    <!-----------DATA TABLE RESPONSIVE---------->
    <link rel="stylesheet" href="https://cdn.datatables.net/rowreorder/1.2.8/css/rowReorder.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.dataTables.min.css">
    <!-- MetisMenu CSS -->
    <link href="../boots/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">
    <link href="../boots/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="../css/styles.css">
    <script type="text/javascript" src="../js/funciones.js"></script>
    <script type="text/javascript" src="../js/area.js"></script>
    <link rel="stylesheet" type="text/css" href="../datas/dataTables.css">
    <link rel="stylesheet" type="text/css" href="../../gestor/css/responsive.css">
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

                <!-- /.dropdown -->

                <!-- /.dropdown -->
                <?php include('notif.php');?>
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a id="icon-usu" class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <!--<li><a href="#" type="button" data-toggle="modal" data-target="#modalEditar"><i class="fa fa-pencil-square-o"></i> Actualizar</a>
                    </li>-->
                        <li><a href="#" type="button" data-toggle="modal" data-target="#modalEditar"><i
                                    class="fa fa-pencil-square-o"></i> ACTUALIZAR</a>
                        </li>

                        <li><a href="../../gestor/conexion/session_cerrar.php"><i class="fa fa-sign-out fa-fw"></i>CERRAR
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
                            <a href="./"><i class="glyphicon glyphicon-home"></i> INICIO<span
                                    class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="historial.php"><i class="fa fa-list-alt"></i> HISTORIAL</a>
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
                        <?php if($data['privilegios']=='super_admin'){ ?>
                        <li><a href="../usuario"><i class="fa fa-pencil-square-o"></i> GENERAR REPORTE</a></li>
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
                    <img src="../img/afac.png" style="float: right; width: 90px;margin-top: 0.8em">
                    <h1 class='page-header'>ADMINISTRADOR</h1>
                    <?php
                    echo
                    "<marquee style='text-transform: uppercase; color: white; background-color: #1489D8;' width='100%' direction='left'>
                        Estadisticas generales mostradas al mes de $fecha
                    </marquee>";
                    ?>
                </div>

                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">


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
                                      servicio != 'SISTEMAS' AND
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
        

            <?php include('conActu.php');?>

            <!--MODAL EVALUATION STADISTICS-->

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
</button>
onclick="location.href='./'" -->
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                        style="color: black" aria-hidden="true">&times;</span></button>

                                <h4 class="modal-title" id="exampleModalLabel">
                                    <p>

                                        <!--<a style="color: blue" href='#' type='button' data-toggle='modal' data-target='#modalVal' style='width:100%;font-size: 12px;'>Favor de validar, ¿el equipo de cómputo pertenece al usuario?</a>-->

                                    </p><input type="hidden" id="idequipo"><b>
                                        REPORTE POR ATENDER</b>
                                </h4>
                            </div>
                            <div class="modal-body">
                                <input type="hidden" id="id_usuario" name="id_usuario"
                                    value="<?php echo $idtecnico;?>">
                                <input type="hidden" id="opcion" name="opcion" value="atender">
                                <div class="form-group">
                                    <div class="col-sm-3">
                                        <label>N° REPORTE</label>
                                        <input id="n_reporte" name="n_reporte" type="text" class="form-control"
                                            disabled="">
                                    </div>
                                    <div class="col-sm-6">
                                        <label>USUARIO</label>
                                        <input id="gstNombr" name="gstNombr" type="text" class="form-control"
                                            disabled="">
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
                                        <label> RESPUESTA EXTERNA DE LA FALLA</label>
                                        <textarea id="falla_xterna" name="falla_xterna" class="form-control"
                                            id="exampleFormControlTextarea1" rows="3"></textarea>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-3">
                                        <label> FECHA REPORTE</label>
                                        <input id="finicio" name="finicio" type="text" class="form-control" disabled="">
                                    </div>

                                    <br>
                                    <div class="col-sm-4">
                                        <label>¿REQUIERE REASIGNAR TÉCNICO?</label><br>
                                        <label for="SI">SI</label>
                                        <input name="OK" type="radio" value="SI" id="SI" />
                                        <label for="NO">NO</label>
                                        <input name="OK" type="radio" value="NO" id="NO" checked="checked" />
                                    </div>

                                    <div class="col-sm-5" id="asignado">
                                        <label>TÉCNICO ASIGNADO</label>
                                        <input class="form-control" selected="true" id="nomtec" name="nomtec"
                                            disabled="">
                                    </div>
                                    <div class="col-sm-12" style="display: none;" id="reasigar">
                                        <label>REASIGNAR TÉCNICO</label>
                                        <select style="width: 100%" class="form-control" class="selectpicker" id="idtec"
                                            name="idtec" type="text" data-live-search="true">
                                            <option value="0">SELECCIONE...</option>
                                            <?php 
                                    $query = "SELECT * FROM tecnico WHERE baja = 0 AND privilegios='tecnico'";
                                    $resultado = mysqli_query($conexion, $query);
                                    while($datas = mysqli_fetch_assoc($resultado)){
                                    $idper = $datas['id_usu'];
                                    $idtec = $datas['id_tecnico'];
                                    $sede = $datas['sede'];
                                    $quer = "SELECT gstIdper,gstNombr,gstApell FROM personal WHERE gstIdper = $idper AND estado = 0";
                                    $result = mysqli_query($conexion2,$quer);    
                                    while($usuario = mysqli_fetch_row($result)):?>
                                            <option value="<?php echo $sede.','.$idtec?>">
                                                <?php echo $usuario[1].' '.$usuario[2].' &#10132; '.''.$sede?>
                                            </option>
                                            <?php endwhile; } ?>
                                        </select>
                                    </div>

                                    <!--      <div class="col-sm-4">
                    <button type="button" class="btn btn-warning" id="asignartec" onclick="tecReasignar();">REASIGNAR TÉCNICO</button>        
                    </div> -->
                                </div>


                                <div class="form-group" style="display: none;" id="button"><br>
                                    <div class="col-sm-offset-0 col-sm-4">
                                        <button type="button" class="btn btn-green"
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
                <div id="cuadro1" class="col-lg-12">
                    <div class="panel panel-default">

                        <div class="panel-body">
                            <ul class="nav nav-tabs" role="tablist">
                                <li role="presentation" class="active"><a style="color: gray;" href="#home"
                                        aria-controls="home" role="tab" data-toggle="tab">PENDIENTES Y POR ATENDER</a>
                                </li>
                                <li role="presentation"><a style="color: gray;" href="#profile" aria-controls="profile"
                                        role="tab" data-toggle="tab">DESEMPEÑO PERSONAL TÉCNICO</a></li>
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane active" id="home"><br><br>
                                    <table id="data-table-administrador" class="table table-striped table-bordered"
                                        width="100%" cellspacing="0"></table>

                                </div>
                                <div role="tabpanel" class="tab-pane" id="profile"><br><br>
                                <table id="data-table-promedio" class="table table-striped table-bordered"
                                        width="100%" cellspacing="0"></table>
                                </div>
                            </div>




                        </div>
                    </div>

                </div>


                <!-- Nav tabs -->

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
<script src="../js/status.js"></script>


<!-----DATATABLE RESPONSIVE------>
<!-- <script src="//cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script> -->
<script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/rowreorder/1.2.8/js/dataTables.rowReorder.min.js"></script>


<script>
$(window).load(function() {
    $(".loader").fadeOut("slow");
});
</script>
<?php include('../php/admin-index.php');?>

</html>