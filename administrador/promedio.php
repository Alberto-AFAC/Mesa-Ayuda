<?php session_start();
//si la variable ssesion existe realizara las siguiente evaluacion 
    // if (isset($_SESSION['usuario'])) {
    //     //si se ha logeado evaluamos si el usuario que aya ingresado intenta acceder a este directorio no es de tipo administrador, no le es permitido el acceso .. si tipo usuario es distinto de admin , entonces no tiene nada que hacer en este directorio 
    //     if($_SESSION['usuario']['privilegios'] != "tecnico"){
    //         //y se redirecciona al directorio que le corresponde
    //         header("Location: ../");
    //         }
    //     }else{
    //         //si no exixte quiere decir que nadie se ha logeado y lo regsara al inicio (login)
    //         header('Location: ../');
    //     }

        //$idu = $_SESSION['usuario']['id_usuario'];
       
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
    <link rel="stylesheet"
        href="https://rawgit.com/Eonasdan/bootstrap-datetimepicker/master/build/css/bootstrap-datetimepicker.min.css" />
    <link rel="stylesheet" type="text/css" href="../css/styles.css">
    <link rel="stylesheet" type="text/css" href="../datas/dataTables.css">
    <script src="//cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" language="javascript" src="../datas/jquery-3.js"></script>

    <script type="text/javascript" src="../js/atdRpt.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


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
                        <li><a href="../conexion/cerrar_session.php"><i class="fa fa-sign-out fa-fw"></i>CERRAR
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
            <?php
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
    }
}
 ?>
            <div class="row">
                <div class="col-lg-12">
                    <img src="../img/afac.png" class="imgafac">
                    <h1 class="page-header">DESEMPEÑO GENERAL PERSONAL SERVICIO TÉCNICO </h1>
                </div>
            </div>

            <div class="row">
                <div class="form-group">
                    <div class="col-sm-9">
                        <canvas id="piechart-licencias"></canvas>
                    </div>
                    <script>
                    <?php 
$datos = base64_decode($_GET['data']);
$totalPro ="SELECT *
FROM
reporte
INNER JOIN evaluacion ON evaluacion.id_reporte = reporte.n_reporte
                WHERE idtec = $datos";
$resultado = mysqli_query($conexion, $totalPro);
$promediototal = 0;
while($row = mysqli_fetch_assoc($resultado))
{
    $promediototal ++;

}
   
    $queryReportes = "SELECT n_reporte,
    SUM(evaluacion.co_tecnico) AS sumaComunicacion,
    SUM(evaluacion.act_servicio) AS actitud,
    SUM(evaluacion.hab_comun) AS habilidad,
    SUM(evaluacion.tiempo_resp) AS tiempo,
    SUM(evaluacion.tiempo_soluc) AS solucion,
    SUM(evaluacion.calidad_genral) AS calidad,
		reporte.idtec,
    evaluacion.estado
    FROM
    reporte
    INNER JOIN evaluacion ON evaluacion.id_reporte = reporte.n_reporte
    where idtec = '$datos'"; 
    $resEvaluacion = mysqli_query($conexion, $queryReportes);

                         ?>
                    var piechar = new Chart(document.getElementById("piechart-licencias"), {
                        type: 'bar',
                        data: {
                            <?php  
        while($dataEvaluaciones = mysqli_fetch_array($resEvaluacion)){
            if(isset($dataEvaluaciones['sumaComunicacion']) == ''){
                $conocimientos = "0";

            }else {
                  $conocimientos = $dataEvaluaciones['sumaComunicacion'] / $promediototal;
                  $conocimientos = substr($conocimientos,0,3);
            }
            if(isset($dataEvaluaciones['actitud']) == ''){
                $actitudTecnico = "0";

            }else {
                  $actitudTecnico = $dataEvaluaciones['actitud'] / $promediototal;
                  $actitudTecnico = substr($actitudTecnico,0,3);
            }
            if(isset($dataEvaluaciones['habilidad']) == ''){
                $habilidadTecnico = "0";

            }else {
                  $habilidadTecnico = $dataEvaluaciones['habilidad'] / $promediototal;
                  $habilidadTecnico = substr($habilidadTecnico,0,3);
            }
            if(isset($dataEvaluaciones['tiempo']) == ''){
                $tiempoTecnico = "0";

            }else {
                  $tiempoTecnico = $dataEvaluaciones['tiempo'] / $promediototal;
                  $tiempoTecnico = substr($tiempoTecnico,0,3);
            }
            if(isset($dataEvaluaciones['solucion']) == ''){
                $solucionTecnico = "0";

            }else {
                  $solucionTecnico = $dataEvaluaciones['solucion'] / $promediototal;
                  $solucionTecnico = substr($solucionTecnico,0,3);
            }
            if(isset($dataEvaluaciones['calidad']) == ''){
                $calidadTecnico = "0";

            }else {
                  $calidadTecnico = $dataEvaluaciones['calidad'] / $promediototal;
                  $calidadTecnico = substr($calidadTecnico,0,3);
            }
            $desempeño = $conocimientos + $actitudTecnico + $habilidadTecnico + $tiempoTecnico + $solucionTecnico + $calidadTecnico;
            if($desempeño >= 50){
                $finalPromedio = "<span style='font-weight: bold; color: green;'>EXCELENTE DESEMPEÑO, SEGUN LAS EVALUACIONES DE CADA USUARIO</span>";

            }else{
                $finalPromedio = "<span style='font-weight: bold; color: red;'>BAJO DESEMPEÑO, SEGUN LAS EVALUACIONES DE CADA USUARIO</span>";
            }
            ?>
                            labels: ["CONOCIMIENTOS DEL TÉCNICO", "ACTITUD DE SERVICIO DEL TÉCNICO",
                                "HABILIDADES DE COMUNICACIÓN DEL TÉCNICO", "TIEMPO DE RESPUESTA",
                                "TIEMPO DE SOLUCIÓN", "CALIDAD GENERAL DEL SERVICIO RECIBIDO"
                            ],
                            datasets: [{
                                label: "EVALUACIÓN DE SERVICIO",
                                backgroundColor: ["#337ab7", "#095892"],
                                borderWidth: 0,
                                data: ["<?php echo $conocimientos ?>","<?php echo $actitudTecnico ?>","<?php echo $habilidadTecnico ?>","<?php echo $tiempoTecnico ?>","<?php echo $solucionTecnico ?>","<?php echo $calidadTecnico ?>"]
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
                    <?php 

    $datos = base64_decode($_GET['data']);
    $datosCliente = "SELECT
	id_tecnico,
	usuario,
	sede,
	activo
FROM
	tecnico
	INNER JOIN reporte ON idtec = tecnico.id_tecnico
WHERE
    idtec = '$datos'"; 
    $resEvaluacion = mysqli_query($conexion, $datosCliente);
    $dataCliente = mysqli_fetch_array($resEvaluacion);
    if($dataCliente['activo'] == 0){
        $status = "<p class='badge' style='background-color: green; color: white; font-size: 17px;'>ESTATUS: DISPONIBLE</p>";

    } else{
        $status = "<p class='badge' style='background-color: orange; color: white; font-size: 17px;'>ESTATUS: NO DISPONIBLE</p>";
    }
    ?>
                    <div style="text-align: center;" class="col-sm-3">
                        <p style="color: gray; font-size: 17px;">USUARIO: <?php echo $dataCliente['usuario']?></p>
                        <p style="color: gray; font-size: 17px;">SEDE: <?php echo $dataCliente['sede']?></p>
                        <?php echo $status ?>
                        <?php echo $finalPromedio ?>
                    </div>
                </div>


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

</html>