<?php session_start();
//si la variable ssesion existe realizara las siguiente evaluacion 
    if (isset($_SESSION['usuario'])) {
        //si se ha logeado evaluamos si el usuario que aya ingresado intenta acceder a este directorio no es de tipo administrador, no le es permitido el acceso .. si tipo usuario es distinto de admin , entonces no tiene nada que hacer en este directorio 
        if($_SESSION['usuario']['privilegios'] != "tecnico"){
            //y se redirecciona al directorio que le corresponde
            header("Location: ../");
            }
        }else{
            //si no exixte quiere decir que nadie se ha logeado y lo regsara al inicio (login)
            header('Location: ../');
        }

        //$idu = $_SESSION['usuario']['id_usuario'];
       
?>
<!DOCTYPE html>
<html lang="es">

<head>

    <meta name="tipo_contenido"  content="text/html;" http-equiv="content-type" charset="utf-8">
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
    <link href="//oss.maxcdn.com/jquery.bootstrapvalidator/0.5.2/css/bootstrapValidator.min.css" rel="stylesheet"></link>

    <link href="../boots/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">
    <link href="../boots/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://rawgit.com/Eonasdan/bootstrap-datetimepicker/master/build/css/bootstrap-datetimepicker.min.css"/>
    <link rel="stylesheet" type="text/css" href="../css/styles.css">
    <link rel="stylesheet" type="text/css" href="../datas/dataTables.css">
    <script src="//cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" language="javascript" src="../datas/jquery-3.js"></script>
    <script type="text/javascript" src="../js/atdRpt.js"></script>


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
                    <li><a href="#" type="button" data-toggle="modal" data-target="#modalEditar"><i class="fa fa-pencil-square-o"></i> Actualizar</a>
                    </li>-
                        <li><a href="../conexion/cerrar_session.php"><i class="fa fa-sign-out fa-fw"></i>Cerrar Sesión</a>
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
                            <a href="./"><i class="glyphicon glyphicon-home"></i> Inicio</a>
                        </li>
                        <li>
                            <a href="conRpt.php"><i class="fa fa-keyboard-o"></i> Consultar reportes</a>
                            <!-- <a href="#"><i class="fa fa-desktop"></i> Consultar equipos</a> -->
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
             <img src="../img/afac.png" class="imgafac">
             <h1 class="page-header">Consulta de reportes </h1>
        </div>
    </div>
    <div class="row">   
    <div class="col-lg-4 col-md-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <img src="../img/like.svg" width="60px" alt="Bueno" class="img-fluid">
                                </div>
                                <?php 
	                             $idtecnico = $_SESSION['usuario']['id_tecnico'];
                                $query ="SELECT 'calificacion', COUNT( CASE WHEN evaluacion = 'BUENO' THEN 1 END ) AS excelente,
                                                                COUNT(CASE WHEN evaluacion = 'REGULAR' THEN 1 END) AS regular,
                                                                COUNT(CASE WHEN evaluacion = 'MALO' THEN 1 END) AS malo                    
                                                FROM
                                                    reporte
                                                WHERE idtec = $idtecnico";
                                $resultado = mysqli_query($conexion, $query);
                                $row = mysqli_fetch_assoc($resultado);
                                ?>
                                <div class="col-xs-9 text-right text-success">
                                    <div class="huge"><?php echo $row['excelente'] ?></div>
                                    <div>Bueno</div>
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
                                <img src="../img/manos-abiertas.svg" width="60px" alt="regular" class="img-fluid">
                                </div>
                                <div class="col-xs-9 text-right text-warning">
                                    <div class="huge"><?php echo $row['regular'] ?></div>
                                    <div>Regular</div>
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
                                <img src="../img/dislike.svg" width="60px" alt="malo" class="img-fluid">
                                </div>
                                <div class="col-xs-9 text-right text-danger">
                                    <div class="huge"><?php echo $row['malo'] ?></div>
                                    <div>Malo</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
         <div class="panel-body">
            <div class="col-lg-12">
            <?php //include("../html/consultar.html");?>
            <table style="width: 100%" id="data-table-consulta" class="table table-striped table-hover"></table>
            </div>
         </div>   
    </div>

    <form id="frmEditar" class="form-horizontal" action="" method="POST">
    <div class="modal fade" id="modalEditar" class="col-sm-12 col-md-12 col-lg-12"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
        <div class="modal-dialog" role="document">
        <div class="col-md-8 col-md-offset-3">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" id="btnlistar" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="exampleModalLabel">Actualizar Contraseña</h4>
                                    <div class="alert alert-success text-center" style="display:none;" id="echo">
                                    <p>Contraseña actualizado</p>
                                    </div>

                                    <div class="alert alert-info text-center" style="display:none;" id="invalida">
                                    <p>Comprobación de contraseña no coicide</p>
                                    </div>

                                    <div class="alert alert-danger text-center" style="display:none;" id="falso">
                                    <p>Contraseña incorrecto</p>
                                    </div>

                                    <div class="alert alert-warning text-center" style="display:none;" id="vacio">
                                    <p>Debes escribir contenido en el campo vacio</p>
                                    </div>

                                    <div class="alert alert-danger text-center" style="display:none;" id="error">
                                    <p>No se pudo actualizar los datos</p>
                                    </div>
                </div>

            <div class="modal-body">
                <input type="hidden" id="id_usuario" name="id_usuario" value="<?php echo $_SESSION['usuario']['id_tecnico'];?>">
                <input type="hidden" id="opcion" name="opcion" value="actualizar">
                    <div class="form-group">
                    <div class="col-sm-12">
                    <label for="usuario">Usuario</label>
                    <input id="usuario" name="usuario" type="text" class="form-control" value="<?php echo $_SESSION['usuario']['usuario'];?>" disabled>
                    </div>
                    </div> 
                    
                    <div class="form-group">
                    <div class="col-sm-12">
                    <label for="password">Contraseña</label>
                    <input id="password" name="password" type="text" class="form-control">
                    </div>
                    </div>
                    
                    <div class="form-group">
                    <div class="col-sm-12">
                    <label for="pass">Nueva Contraseña</label>
                    <input id="pass" name="pass" type="text" class="form-control">
                    </div>
                    </div>
                    <div class="form-group">
                    <div class="col-sm-12">
                    <label for="pass2">Corroborar su nueva contraseña</label>
                    <input id="pass2" name="pass2" type="text" class="form-control" >
                    </div>
                    </div>                     
            </div>            
                <div class="modal-footer">
                        <button type="button" class="btn btn-primary" onclick="actualizar();">Actualizar</button>
                </div>
            </div>
            </div>
        </div>
    </div>
</form>  


<form class="form-horizontal" action="" method="POST">
    <div class="modal fade" id="modalDtll" class="col-xs-12 .col-md-12"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">

<div class="modal-dialog width" role="document">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="limpiarCampo()"><span style="color: black"  aria-hidden="true">&times;</span>
</button>
<h4 class="modal-title" id="exampleModalLabel">Detalles del reporte - <input class="transparent" id="estado_rpt" name="estado_rpt" disabled=""></h4>  
</div>
            <div class="modal-body">
                <input type="hidden" id="id_usuario" name="id_usuario" value="<?php echo $_SESSION['usuario']['id_tecnico'];?>">
                <input type="hidden" id="opcion" name="opcion" value="actualizar">
                    <div class="form-group">                    
                    <div class="col-sm-3">
                    <label>N° reporte</label>
                    <input id="n_reporte" name="n_reporte" type="text" class="form-control" class="disabled" disabled="">
                    </div>
                    <div class="col-sm-5">
                    <label>Usuario</label>
                    <input id="usuario" name="usuario" type="text" class="form-control" disabled="">
                    </div>                    
                    <div class="col-sm-2">
                    <label>Extension</label>
                    <input id="extension" name="extension" type="text" class="form-control" disabled="">
                    </div>
                    <div class="col-sm-2">
                    <label>Ubicación</label>
                    <input id="ubicacion" name="ubicacion" type="text" class="form-control" disabled="">
                    </div>                    
                    </div>

                    <div class="form-group">
                    <div class="col-sm-4">
                    <label>Tipo de servicio</label>
                    <input id="servicio" name="servicio" type="text" class="form-control" disabled="">
                    </div>

                    <div class="col-sm-4">
                    <label>Intervención</label>
                    <input id="intervencion" name="intervencion" type="text" class="form-control" disabled="">
                    </div>                    

                    <div class="col-sm-4">
                    <label>Descripción</label>
                    <input id="descripcion" name="descripcion" type="text" class="form-control" disabled="">
                    </div>
                    </div>

                    <div class="form-group">
                    <div class="col-sm-12">
                    <label>Observaciones del usuario al problema</label> 
                    <textarea id="usu_observ" name="usu_observ" class="form-control" id="exampleFormControlTextarea1" rows="3"  disabled=""></textarea>
                    </div>
                    </div>

                    <div class="form-group">
                    <div class="col-sm-12">
                    <label>Respuesta de falla</label> 
                    <textarea id="falla_interna" name="falla_interna" class="form-control" id="exampleFormControlTextarea1" rows="3"  disabled=""></textarea>
                    </div>
                    </div>
                    
                    <div class="form-group" id="falla">
                    <div class="col-sm-12">
                    <label> Respuesta externa de la falla</label>
                    <textarea id="falla_xterna" name="falla_xterna" class="form-control" id="exampleFormControlTextarea1" rows="3"  disabled=""></textarea>
                    </div>
                    </div>                     

                    <div class="form-group">
                    <div class="col-sm-4">
                    <label> Fecha reporte</label>
                    <input id="finicio" name="finicio" type="text" class="form-control"  disabled="">
                    </div>
                    <div class="col-sm-4">
                    <label> Fecha finalizada</label>
                    <input id="ffinal" name="ffinal" type="text" class="form-control" disabled="">
                    </div>                    
                    <div class="col-sm-4">
                    <label> Su evaluación de reporte</label>
                    <input id="evaluacion" name="evaluacion" type="text" class="form-control" disabled="">
                    </div>
                    </div>
                   <div class="form-group">
                    <div class="col-sm-12">
                    <label>Porque</label>
                    <textarea id="observa" name="observa" class="form-control" id="exampleFormControlTextarea1" rows="2" disabled=""></textarea>
                    </div>
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
             var dataSet = [
        <?php
	    $idtecnico = $_SESSION['usuario']['id_tecnico'];
		$query = "SELECT 
		usuarios.nombre,
		usuarios.apellidos,
		usuarios.ubicacion,
		usuarios.extension,
		reporte.n_reporte,
        DATE_FORMAT(reporte.finicio, '%d/%m/%Y') as finicio,
        DATE_FORMAT(reporte.ffinal, '%d/%m/%Y') as ffinal,        
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
		reporte.idequipo
		FROM usuarios 
		LEFT JOIN reporte ON usuarios.n_empleado = reporte.n_empleado
		WHERE reporte.idtec = '$idtecnico'";
	$resultado = mysqli_query($conexion, $query);
        while($data = mysqli_fetch_array($resultado)){
            $fila = $idtecnico;
 
if($data['evaluacion'] == 0 && $data['estado_rpt'] =='Finalizado'){
    ?>
    ["<?php echo  $data['n_reporte']?>","<?php echo  $data['nombre']." ".$data['apellidos']?>","<?php echo $data['ubicacion']?>","<?php echo $data['extension']?>","<?php echo $data['finicio']?>","<?php echo $data['ffinal']?>","<?php echo "<a href='#' type='button' data-toggle='modal' data-target='#modalDtll' class='detalle btn btn-default' onclick='detalle({$data['n_reporte']})' style='width:100%'>Falta su evaluación</a>";?>"],
<?php }else if($data['evaluacion'] != '0'){ ?>
    ["<?php echo  $data['n_reporte']?>","<?php echo  $data['nombre']." ".$data['apellidos']?>","<?php echo $data['ubicacion']?>","<?php echo $data['extension']?>","<?php echo $data['finicio']?>","<?php echo $data['ffinal']?>","<?php echo "<a href='#' type='button' data-toggle='modal' data-target='#modalDtll' class='detalle btn btn-default' onclick='detalle({$data['n_reporte']})' style='width:100%'>{$data['evaluacion']}</a>";?>"],
<?php }else if($data['evaluacion'] == '0' && $data['estado_rpt'] == 'Cancelado'){ ?> 
    ["<?php echo  $data['n_reporte']?>","<?php echo  $data['nombre']." ".$data['apellidos']?>","<?php echo $data['ubicacion']?>","<?php echo $data['extension']?>","<?php echo $data['finicio']?>","<?php echo $data['ffinal']?>","<?php echo "<a href='#' type='button' data-toggle='modal' data-target='#modalDtll' class='detalle btn btn-default' onclick='detalle({$data['n_reporte']})' style='width:100%'>Falta que confirme</a>";?>"],
<?php  } 
    }   ?>
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
    columns: [
    {title: "N°"},
    {title: "Nombre usuario"},
    {title: "Ubicación"},
    {title: "Extensión"},
    {title: "Reporte"},
    {title: "Termino"},
    {title: "Estado"}
    ],
    });
        </script>
</html>
