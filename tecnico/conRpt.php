<?php session_start();
include ("../../gestor/conexion/conexion.php");
include ("../conexion/conexion.php"); 
session_start(); 
  if (isset($_SESSION['usuario'])) 
    { 
      $id = $_SESSION['usuario']['id_usu'];
    }else{ header('Location: ../../gestor'); }
//si la variable ssesion existe realizara las siguiente evaluacion 
    //** if (isset($_SESSION['usuario'])) {
        //si se ha logeado evaluamos si el usuario que aya ingresado intenta acceder a este directorio no es de tipo administrador, no le es permitido el acceso .. si tipo usuario es distinto de admin , entonces no tiene nada que hacer en este directorio 
        //** if($_SESSION['usuario']['privilegios'] != "tecnico"){ header("Location: ../");            } }else{
        //     header('Location: ../');
        // }
        $query = "SELECT * FROM tecnico WHERE id_usu = $id AND baja = 0";
        $resultado = mysqli_query($conexion, $query);
        if($data = mysqli_fetch_array($resultado)){
        $idtecnico = $data['id_tecnico'];    
        }
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

    <title>Reporte</title>

    <!-- Bootstrap Core CSS -->
    <!-- MetisMenu CSS -->
    <link href="../boots/metisMenu/metisMenu.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <!-- Morris Charts CSS -->
    <link href="../boots/morrisjs/morris.css" rel="stylesheet">
    <!-- Custom Fonts -->
    <link href="../boots/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">
    <link href="../boots/datatables-responsive/dataTables.responsive.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="calendario/tcal.css" />
    <link href="//oss.maxcdn.com/jquery.bootstrapvalidator/0.5.2/css/bootstrapValidator.min.css" rel="stylesheet">
    </link>

    <link href="../boots/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">
    <link href="../boots/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css">
    <link rel="stylesheet"
        href="https://rawgit.com/Eonasdan/bootstrap-datetimepicker/master/build/css/bootstrap-datetimepicker.min.css" />
    <link rel="stylesheet" type="text/css" href="../css/styles.css">
    <link rel="stylesheet" type="text/css" href="../datas/dataTables.css">
    <script src="//cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="../js/atdRpt.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.0.0/css/buttons.dataTables.min.css">


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
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#" type="button" data-toggle="modal" data-target="#modalEditar"><i
                                    class="fa fa-pencil-square-o"></i> ACTUALIZAR</a>
                        </li>-
                        <li><a href="../../gestor/conexion/cerrar_session.php"><i class="fa fa-sign-out fa-fw"></i>CERRAR
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
                <div class="col-lg-12">
                    <img src="../img/afac.png" class="imgafac">
                    <h1 class="page-header">CONSULTA DE REPORTES </h1>
                    <?php
                    echo
                    "<marquee style='color: white; background-color: #1489D8;' width='100%' direction='left'>
                        ESTADISTICAS GENERALES MOSTRADAS AL AÑO $fecha
                    </marquee>";
                    ?>
                </div>
            </div>

            <div class="row">
            <?php if($data['sede'] == 'WEB'):?>
            <?php else: ?>
            <div class="col-lg-4 col-md-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <img src="../img/conocimiento.png" width="60px" alt="Bueno" class="img-fluid">
                                </div>
                                <?php 
	                            //*** $idtecnico = $_SESSION['usuario']['id_tecnico'];
                                $query ="SELECT *
                                FROM
                                reporte
                                INNER JOIN evaluacion ON evaluacion.id_reporte = reporte.n_reporte
                                                WHERE idtec = $idtecnico";
                                $resultado = mysqli_query($conexion, $query);
                                $promediototal = 0;
                                while($row = mysqli_fetch_assoc($resultado))
                                {
                                    $promediototal ++;

                                }
                                $query2 ="SELECT *,
                                        SUM(co_tecnico) AS parapromedio
                                        FROM
                                        reporte
                                        INNER JOIN evaluacion ON evaluacion.id_reporte = reporte.n_reporte
                                                        WHERE idtec = $idtecnico";
                                $resultado2 = mysqli_query($conexion, $query2);
                                $row2 = mysqli_fetch_assoc($resultado2);
                                if(isset($row2['parapromedio']) == ''){
                                    $conocimientos = "0";

                                }else {
                                      $conocimientos = $row2['parapromedio'] / $promediototal;
                                      $conocimientos = substr($conocimientos,0,3);
                                }
                                ?>
                                <div class="col-xs-9 text-right">
                                    <div style="color: gray;" class="huge"><?php echo $conocimientos ?></div>
                                    <div>CONOCIMIENTOS</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <img src="../img/actitud.png" width="60px" alt="regular" class="img-fluid">
                                </div>
                                <?php
                                $query3 ="SELECT *,
                                SUM(act_servicio) AS parapromedio
                                FROM
                                reporte
                                INNER JOIN evaluacion ON evaluacion.id_reporte = reporte.n_reporte
                                                WHERE idtec = $idtecnico";
                                $resultado3 = mysqli_query($conexion, $query3);
                                $row3 = mysqli_fetch_assoc($resultado3);
                                if(isset($row3['parapromedio']) == ''){
                                    $servicio = "0";

                                }else {
                                      $servicio = $row3['parapromedio'] / $promediototal;
                                      $servicio = substr($servicio,0,3);
                                }
                                ?>
                                <div class="col-xs-9 text-right">
                                    <div style="color: gray;" class="huge"><?php echo $servicio ?></div>
                                    <div>ACTITUD DE SERVICIO</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <img src="../img/comunicacion.png" width="60px" alt="malo" class="img-fluid">
                                </div>
                                <?php
                                $query4 ="SELECT *,
                                SUM(hab_comun) AS parapromedio
                                FROM
                                reporte
                                INNER JOIN evaluacion ON evaluacion.id_reporte = reporte.n_reporte
                                                WHERE idtec = $idtecnico";
                                $resultado3 = mysqli_query($conexion, $query4);
                                $row4 = mysqli_fetch_assoc($resultado3);
                                if(isset($row4['parapromedio']) == ''){
                                    $habilidades = "0";

                                }else {
                                      $habilidades = $row4['parapromedio'] / $promediototal;
                                      $habilidades = substr($habilidades,0,3);
                                }
                                ?>
                                <div class="col-xs-9 text-right">
                                    <div style="color: gray;" class="huge"><?php echo $habilidades ?></div>
                                    <div>HABILIDADES DE COMUNICACIÓN</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <img src="../img/respuesta.png" width="60px" alt="Bueno" class="img-fluid">
                                </div>
                                <?php
                                $query5 ="SELECT *,
                                SUM(tiempo_resp) AS parapromedio
                                FROM
                                reporte
                                INNER JOIN evaluacion ON evaluacion.id_reporte = reporte.n_reporte
                                                WHERE idtec = $idtecnico";
                                $resultado5 = mysqli_query($conexion, $query5);
                                $row5 = mysqli_fetch_assoc($resultado5);
                                if(isset($row5['parapromedio']) == ''){
                                    $tiempoRespuesta = "0";

                                }else {
                                      $tiempoRespuesta = $row5['parapromedio'] / $promediototal;
                                      $tiempoRespuesta = substr($tiempoRespuesta,0,3);
                                }
                                
                                ?>
                                <div class="col-xs-9 text-right">
                                    <div style="color: gray;" class="huge"><?php echo $tiempoRespuesta ?></div>
                                    <div>TIEMPO DE RESPUESTA</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <img src="../img/solucion.png" width="60px" alt="regular" class="img-fluid">
                                </div>
                                <?php
                                $querySolucion ="SELECT *,
                                SUM(tiempo_soluc) AS parapromedio
                                FROM
                                reporte
                                INNER JOIN evaluacion ON evaluacion.id_reporte = reporte.n_reporte
                                                WHERE idtec = $idtecnico";
                                $resultadoSolucion = mysqli_query($conexion, $querySolucion);
                                $datoSolucion = mysqli_fetch_assoc($resultadoSolucion);
                                if(isset($datoSolucion['parapromedio']) == ''){
                                    $solucion = "0";

                                }else {
                                      $solucion = $datoSolucion['parapromedio'] / $promediototal;
                                      $solucion = substr($solucion,0,3);
                                }
                                ?>
                                <div class="col-xs-9 text-right">
                                    <div style="color: gray;" class="huge"><?php echo $solucion ?></div>
                                    <div>TIEMPO DE SOLUCIÓN</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <img src="../img/calidad.png" width="60px" alt="malo" class="img-fluid">
                                </div>
                                <?php
                                $queryCalidad ="SELECT *,
                                SUM(calidad_genral) AS parapromedio
                                FROM
                                reporte
                                INNER JOIN evaluacion ON evaluacion.id_reporte = reporte.n_reporte
                                                WHERE idtec = $idtecnico";
                                $resultadoCalidad = mysqli_query($conexion, $queryCalidad);
                                $datoCalidad = mysqli_fetch_assoc($resultadoCalidad);
                                if(isset($datoCalidad['parapromedio']) == ''){
                                    $calidadServicio = "0";

                                }else {
                                      $calidadServicio = $datoCalidad['parapromedio'] / $promediototal;
                                      $calidadServicio = substr($calidadServicio,0,3);
                                }
                                ?>
                                <div class="col-xs-9 text-right">
                                    <div style="color: gray;" class="huge"><?php echo $calidadServicio ?></div>
                                    <div>CALIDAD DEL SERVICIO</div>
                                </div>
                            </div>
                        </div>


                    </div>
                    <button style="float: right;" data-toggle="modal" data-target="#exampleModal"
                        class="btn btn-info">CONSULTAR DESEMPEÑO</button>
                </div>
              <?php endif ?>

                <?php
                                                $query ="SELECT
                                
                                                reporte.n_reporte,
                                                reporte.finicio,
                                                reporte.hinicio,
                                                reporte.ffinal,
                                                reporte.hfinal
                                            FROM
                                                reporte
                                                WHERE estado_rpt = 'Finalizado' AND idtec = $idtecnico";
                                                $resultado = mysqli_query($conexion, $query);
                                                $Atiempo=0;
                                                $destiempo=0;
                                                while($row = mysqli_fetch_assoc($resultado)){
                                                    $fechafinalizada1 = new DateTime($row['finicio']."".$row['hinicio']);
                                                    $fechafinalizada2 = new DateTime($row['ffinal']."".$row['hfinal']);
                                                    $intervalo = $fechafinalizada1->diff($fechafinalizada2);
                                                    $totalFinal = $intervalo->format('%H');//00 años 0 meses 0 días 08 horas 0 minutos 0 segundos
                                                  
                                                    if($totalFinal < 12){
                                                        $Atiempo++;
                                                    } 
                                                    if($totalFinal >=12){
                                                        $destiempo++;
                                                    } 

                                               
                                            ?>
                <?php }?>

                <!-- MODAL DE DESEMPEÑO -->
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <p style="text-align: center; font-weight: bold;">RECUERDA ATENDER LAS SOLICITUDES EN
                                    TIEMPO.</p>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="card">
                                            <div class="card-body">
                                                <p style="font-size: 58px; color: gray; text-align:center;"
                                                    class="card-text"><?php echo $Atiempo; ?></p>
                                                <center><span style="background-color: green; font-size: 18px;"
                                                        class="badge">EN TIEMPO</span></center>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="card">
                                            <div class="card-body">
                                                <p style="font-size: 58px; color: gray; text-align:center;"
                                                    class="card-text"><?php echo $destiempo ?></p>
                                                <center><span style="background-color: gray; font-size: 18px;"
                                                        class="badge">FUERA DE TIEMPO</span></center>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary" data-dismiss="modal">CERRAR</button>
                            </div>
                        </div>
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
                                        servicio = 'SISTEMAS'";
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
                    <div style="padding-top: 30px;" class="col-lg-12">
                         <?php if($data['sede']== 'WEB'):?>
                        <table style="width: 100%" id="data-table-consulta-web" class="table table-striped table-hover">
                        <?php else :?>
                        <table style="width: 100%" id="data-table-consulta" class="table table-striped table-hover">
                        <?php endif?>

                        </table>
                    </div>
                </div>
            </div>
            <br><br>


            <?php include('conActu.php');?>


            <form class="form-horizontal" action="" method="POST">
                <div class="modal fade" id="modalDtll" class="col-xs-12 .col-md-12" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabel">

                    <div class="modal-dialog width" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"
                                    onclick="limpiarCampo()"><span style="color: black"
                                        aria-hidden="true">&times;</span>
                                </button>
                                <h4 class="modal-title" id="exampleModalLabel"><b>DETALLES DEL REPORTE - <input
                                            style="text-transform: uppercase;" class="transparent" id="estado_rpt"
                                            name="estado_rpt" disabled=""></b></h4>
                            </div>
                            <div class="modal-body">
                                <input type="hidden" id="id_usuario" name="id_usuario"
                                    value="<?php echo $idtecnico?>">
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
                                        <input id="extension" name="extension" type="text" class="form-control"
                                            disabled="">
                                    </div>
                                    <!-- <div class="col-sm-2">
                    <label>Ubicación</label>
                    <input id="ubicacion" name="ubicacion" type="text" class="form-control" disabled="">
                    </div> -->
                                </div>


                                <div class="form-group">
                                    <div class="col-sm-4">
                                        <label>TIPO DE SERVICIO</label>
                                        <input id="servicio" name="servicio" type="text" class="form-control"
                                            disabled="">
                                    </div>

                                    <div class="col-sm-4">
                                        <label style="color:white;">.</label>
                                        <input id="intervencion" name="intervencion" type="text" class="form-control"
                                            disabled="">
                                    </div>

                                    <div class="col-sm-4">
                                        <label style="color:white;">.</label>
                                        <input id="descripcion" name="descripcion" type="text" class="form-control"
                                            disabled="">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-4">

                                        <input id="solucion" name="solucion" type="text" class="form-control"
                                            disabled="">
                                    </div>

                                    <div class="col-sm-4">

                                        <input id="ultima" name="ultima" type="text" class="form-control" disabled="">
                                    </div>

                                    <div class="col-sm-4">

                                        <input id="final" name="final" type="text" class="form-control" disabled="">
                                    </div>
                                </div>

                                <!--                             <div class="form-group">
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
                            </div> -->

                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <label>OBSERVACIONES DEL USUARIO AL PROBLEMA</label>
                                        <textarea id="usu_observ" name="usu_observ" class="form-control"
                                            id="exampleFormControlTextarea1" rows="3" disabled=""></textarea>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <label>RESPUESTA A LA FALLA</label>
                                        <textarea id="falla_interna" name="falla_interna" class="form-control"
                                            id="exampleFormControlTextarea1" rows="3" disabled=""></textarea>
                                    </div>
                                </div>

                                <div class="form-group" id="falla">
                                    <div class="col-sm-12">
                                        <label> RESPUESTA EXTERNA A LA FALLA</label>
                                        <textarea id="falla_xterna" name="falla_xterna" class="form-control"
                                            id="exampleFormControlTextarea1" rows="3" disabled=""></textarea>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-4">
                                        <label> FECHA REPORTE</label>
                                        <input id="finicio" name="finicio" type="text" class="form-control" disabled="">
                                    </div>
                                    <div class="col-sm-4">
                                        <label> FECHA FINALIZADA</label>
                                        <input id="ffinal" name="ffinal" type="text" class="form-control" disabled="">
                                    </div>
                                    <!-- <div class="col-sm-4">
                                        <label> SU EVALUACIÓN DE REPORTE</label>
                                        <input id="evaluacion" name="evaluacion" type="text" class="form-control"
                                            disabled="">
                                    </div> -->
                                </div>
                                <!-- <div class="form-group">
                                    <div class="col-sm-12">
                                        <label>¿POR QUÉ?</label>
                                        <textarea id="observa" name="observa" class="form-control"
                                            id="exampleFormControlTextarea1" rows="2" disabled=""></textarea>
                                    </div>
                                </div> -->

                            </div>
                        </div>
                    </div>
                </div>
            </form>


        </div>
        <!-- /.row -->
    </div>
    <!-- MODAL DE DETALLES EVALUACIÓN -->
    <!-- /#wrapper -->
</body>

<script src="../js/jquery-1.12.3.min.js"></script>
<script src="//cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<script src="../boots/bootstrap/js/bootstrap.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/jquery.dataTables.min.js"></script>
<script src="../js/dataTables.bootstrap.js"></script>
<script src="../js/dataTables.buttons.min.js"></script>
<script src="../boots/metisMenu/metisMenu.min.js"></script>
<script src="../dist/js/sb-admin-2.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js"></script>


<!--     <script src="//cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
    <script src="../js/buttons.bootstrap.min.js"></script>

    <script type="text/javascript" src="calendario/tcal.js"></script> 

    <script src="//oss.maxcdn.com/jquery.bootstrapvalidator/0.5.3/js/bootstrapValidator.min.js"></script>
    <script type="text/javascript" src="valida/valida.js"></script>
    <script src="//oss.maxcdn.com/momentjs/2.8.2/moment.min.js"></script>
    <script src="https://rawgit.com/Eonasdan/bootstrap-datetimepicker/master/src/js/bootstrap-datetimepicker.js"></script> 
 -->
<!--<script type="text/javascript" src="../js/atdRpt.js"></script>-->
<script>
    // TABLA DE REPORTE PARA USUARIOS QUE ATIENDEN SISTEMAS
var dataSet = [
    <?php
	    //** $idtecnico = $_SESSION['usuario']['id_tecnico'];
        $query = "SELECT 
        reporte.n_reporte,
        reporte.finicio comparacioni,
        reporte.ffinal comparacionf,
        DATE_FORMAT(reporte.finicio, '%d/%m/%Y') as finicio,
        DATE_FORMAT(reporte.ffinal, '%d/%m/%Y') as ftermino,
        reporte.estado_rpt,
        reporte.servicio,
        reporte.intervencion,
        reporte.descripcion,
        reporte.usu_observ,
        reporte.n_reporte,
        reporte.falla_interna,
        reporte.falla_xterna,
        reporte.observa,
        reporte.evaluacion,
        reporte.hinicio,
        reporte.hfinal,
        reporte.idequipo,
        n_empleado empleado
        FROM reporte 
        WHERE  reporte.idtec = '$idtecnico'";
    $resultado = mysqli_query($conexion, $query);
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

            $fila = $idtecnico;
            $nombre = $data2['gstNombr'];
            $apellidos = $data2['gstApell']; 
            $servicio= $data['servicio'];
            $extension = $data2['gstExTel'];
            $final = $data['ftermino'];
            $inicio = $data['finicio'];

 
if($data['evaluacion'] == '0' && $data['estado_rpt'] =='Finalizado'){
    ?>["<?php echo $data['n_reporte']?>", "<?php echo  $nombre." ".$apellidos?>",
        "<?php echo $extension?>",
        "<?php echo $servicio?>", "<?php echo $inicio ?>", "<?php echo $final ?>",
        "<?php echo "<a href='#' type='button' data-toggle='modal' data-target='#modalDtll' class='detalle btn btn-default' onclick='detalle({$data['n_reporte']})' style='width:100%; font-size:12px;'>FALTA SU EVALUACIÓN</a>";?>",
        "<span style='color: gray'>NO DISPONIBLE</span>"
    ],
    <?php }else if($data['evaluacion'] != '0'){ ?>["<?php echo  $data['n_reporte']?>",
        "<?php echo  $nombre." ".$apellidos?>", "<?php echo $extension?>", "<?php echo $servicio?>",
        "<?php echo $inicio ?>", "<?php echo $final ?>",


        "<?php 
if($data['evaluacion']=='CANCELADO'){
    echo "<a href='#' type='button' data-toggle='modal' data-target='#modalDtll' class='detalle btn btn-default' onclick='detalle({$data['n_reporte']})' style='width:100%; font-size:12px;'>DETALLES</a>";

}else if($data['evaluacion']=='1'){
        echo "<a href='#' type='button' data-toggle='modal' data-target='#modalDtll' class='detalle btn btn-success' onclick='detalle({$data['n_reporte']})' style='width:100%; font-size:12px;'>FINALIZADO</a>";
}




?>", "<a href='evaluacion.php?data=<?php echo base64_encode($data['n_reporte'])?>' type='button' class='detalle btn btn-default'  style='width:100%; font-size:12px;'>DETALLES</a>"
        ],

    <?php }else if($data['evaluacion'] == '0' && $data['estado_rpt'] == 'Cancelado'){ ?>[
        "<?php echo  $data['n_reporte']?>", "<?php echo  $nombre." ".$apellidos?>", "<?php echo $extension?>",
        "<?php echo $servicio?>", "<?php echo $inicio ?>", "<?php echo $final ?>",
        "<?php echo "<a href='#' type='button' data-toggle='modal' data-target='#modalDtll' class='detalle btn btn-default' onclick='detalle({$data['n_reporte']})' style='width:100%; font-size:12px;'>FALTA QUE CONFIRME</a>";?>","<span style='color: gray;'>NO DISPONIBLE</span>"
    ],
    <?php  } 
    }  
} ?>
];
var tableGenerarReporte = $('#data-table-consulta').DataTable({
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
            title: "NOMBRE USUARIO"
        },
        {
            title: "EXT."
        },
        {
            title: "SERVICIO"
        },
        {
            title: "REPORTE"
        },
        {
            title: "TERMINO"
        },
        {
            title: "ESTADO"
        },
        {
            title: "EVALUACIÓN"
        }
    ],
});

// TABLE QUE GENERAN LOS REPORTES EN WEB
var dataSet = [
    <?php
	    //** $idtecnico = $_SESSION['usuario']['id_tecnico'];
        $query = "SELECT 
        reporte.n_reporte,
        reporte.finicio comparacioni,
        reporte.ffinal comparacionf,
        DATE_FORMAT(reporte.finicio, '%d/%m/%Y') as finicio,
        DATE_FORMAT(reporte.ffinal, '%d/%m/%Y') as ftermino,
        reporte.estado_rpt,
        reporte.servicio,
        reporte.intervencion,
        reporte.descripcion,
        reporte.usu_observ,
        reporte.n_reporte,
        reporte.falla_interna,
        reporte.falla_xterna,
        reporte.observa,
        reporte.evaluacion,
        reporte.hinicio,
        reporte.hfinal,
        reporte.idequipo,
        n_empleado empleado
        FROM reporte
        WHERE servicio = 'SISTEMAS'";
    $resultado = mysqli_query($conexion, $query);
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

            $fila = $idtecnico;
            $nombre = $data2['gstNombr'];
            $apellidos = $data2['gstApell']; 
            $servicio= $data['servicio'];
            $extension = $data2['gstExTel'];
            $final = $data['ftermino'];
            $inicio = $data['finicio'];

 
if($data['evaluacion'] == '0' && $data['estado_rpt'] =='Finalizado'){
    ?>["<?php echo $data['n_reporte']?>", "<?php echo  $nombre." ".$apellidos?>",
        "<?php echo $extension?>",
        "<?php echo $servicio?>", "<?php echo $inicio ?>", "<?php echo $final ?>",
        "<?php echo "<a href='#' type='button' data-toggle='modal' data-target='#modalDtll' class='detalle btn btn-default' onclick='detalle({$data['n_reporte']})' style='width:100%; font-size:12px;'>FALTA SU EVALUACIÓN</a>";?>",
        "<span style='color: gray'>NO DISPONIBLE</span>"
    ],
    <?php }else if($data['evaluacion'] != '0'){ ?>["<?php echo  $data['n_reporte']?>",
        "<?php echo  $nombre." ".$apellidos?>", "<?php echo $extension?>", "<?php echo $servicio?>",
        "<?php echo $inicio ?>", "<?php echo $final ?>",


        "<?php 
if($data['evaluacion']=='CANCELADO'){
    echo "<a href='#' type='button' data-toggle='modal' data-target='#modalDtll' class='detalle btn btn-default' onclick='detalle({$data['n_reporte']})' style='width:100%; font-size:12px;'>DETALLES</a>";

}else if($data['evaluacion']=='1'){
        echo "<a href='#' type='button' data-toggle='modal' data-target='#modalDtll' class='detalle btn btn-success' onclick='detalle({$data['n_reporte']})' style='width:100%; font-size:12px;'>FINALIZADO</a>";
}




?>", "<a href='evaluacion.php?data=<?php echo base64_encode($data['n_reporte'])?>' type='button' class='detalle btn btn-default'  style='width:100%; font-size:12px;'>DETALLES</a>"
        ],

    <?php }else if($data['evaluacion'] == '0' && $data['estado_rpt'] == 'Cancelado'){ ?>[
        "<?php echo  $data['n_reporte']?>", "<?php echo  $nombre." ".$apellidos?>", "<?php echo $extension?>",
        "<?php echo $servicio?>", "<?php echo $inicio ?>", "<?php echo $final ?>",
        "<?php echo "<a href='#' type='button' data-toggle='modal' data-target='#modalDtll' class='detalle btn btn-default' onclick='detalle({$data['n_reporte']})' style='width:100%; font-size:12px;'>FALTA QUE CONFIRME</a>";?>","<span style='color: gray;'>NO DISPONIBLE</span>"
    ],
    <?php  } 
    }  
} ?>
];
$(document).ready(function() {
var tableGenerarReporte = $('#data-table-consulta-web').DataTable({    
    dom: 'Bfrtip',
    buttons: [
           'excel'
        ], 
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
            title: "NOMBRE USUARIO"
        },
        {
            title: "EXT."
        },
        {
            title: "SERVICIO"
        },
        {
            title: "REPORTE"
        },
        {
            title: "TERMINO"
        },
        {
            title: "ESTADO"
        },
        {
            title: "EVALUACIÓN"
        }
    ],
});

} );
function evaluacionID(idEvaluacion) {
    alert(idEvaluacion)

}

<?php 


if(isset($_GET['data'])&&!empty($_GET['data'])){
    $datos = $_GET['data'];
}else{
    $datos = '';
}

    $queryReportes = "SELECT n_reporte,
    evaluacion.co_tecnico,
    evaluacion.act_servicio,
    evaluacion.hab_comun,
    evaluacion.tiempo_resp,
    evaluacion.tiempo_soluc,
    evaluacion.calidad_genral,
    evaluacion.estado
    FROM
    reporte
    INNER JOIN evaluacion ON evaluacion.id_reporte = reporte.n_reporte
    where n_reporte = '$datos'"; 
    $resEvaluacion = mysqli_query($conexion, $queryReportes);
                         ?>
var piechar = new Chart(document.getElementById("piechart-licencias"), {
    type: 'bar',
    data: {
        <?php  while($dataEvaluaciones = mysqli_fetch_array($resEvaluacion)){ ?>
        labels: ["CONOCIMIENTOS DEL TÉCNICO","ACTITUD DE SERVICIO DEL TÉCNICO","HABILIDADES DE COMUNICACIÓN DEL TÉCNICO","TIEMPO DE RESPUESTA","TIEMPO DE SOLUCIÓN","CALIDAD GENERAL DEL SERVICIO RECIBIDO"],
        datasets: [{
            label: "EVALUACIÓN DE SERVICIO",
            backgroundColor: ["#337ab7", "#095892"],
            borderWidth: 0,
            data: ["<?php echo $dataEvaluaciones['co_tecnico'] ?>","<?php echo $dataEvaluaciones['act_servicio']?>","<?php echo $dataEvaluaciones['hab_comun']?>","<?php echo $dataEvaluaciones['tiempo_resp']?>","<?php echo $dataEvaluaciones['tiempo_soluc']?>","<?php echo $dataEvaluaciones['calidad_genral']?>"
            ]
        }, ]
        <?php } ?>

    },
    options: {
        responsive: true,
        plugins: {
            // legend: {
            //   position: 'top',
            // },
            title: {
                display: true,
                // text: 'Aqui va el titulo'
            }
        },
        scales: {
            y: {
                beginAtZero: true
            }
        }
    },
});






</script>

</html>