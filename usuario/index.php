<?php  
include ("../../gestor/conexion/conexion.php");
include ("../conexion/conexion.php"); 
session_start(); 
  if (isset($_SESSION['usuario'])) 
    { 
      $id = $_SESSION['usuario']['id_usu'];
    }else{ header('Location: ../../gestor'); }

        $query = "SELECT gstNombr,gstApell,gstNmpld FROM personal
            WHERE gstIdper = $id ";
        $result = mysqli_query($conexion2,$query);
        $usua = mysqli_fetch_row($result);

// if (isset($_SESSION['usuario'])) 
//     { }else{ header('Location: ../'); }
  //evaluaremos si la variable de sesión existe de lo contrario no se hará nada 
  //si la variable sesión existe, se evaluará que tipo de usuario está ingresando de esa manera saber a dónde se debe redireccionar en caso de que ya se haya logeado 
 //  if(isset($_SESSION['gstNmpld'])){
 //    if($_SESSION['gstNmpld']['gstNmpld'] != ''){}    
 // }else{ header('Location: ../');}

     $n_empleado =  $usua[2];

    unset($_SESSION['consulta']);
?>
<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Reporte</title>

    <!-- Bootstrap Core CSS -->
    <link href="../boots/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../boots/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="../boots/morrisjs/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../boots/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <link href="../boots/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">
    <link href="../boots/datatables-responsive/dataTables.responsive.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../css/styles.css">
    <link rel="stylesheet" href="../css/button/estilos.css">
    <script src="../dist/sweetAlert2/sweetalert2.all.min.js"></script>
    <link rel="stylesheet" href="../dist/sweetAlert2/sweetalert2.min.css">
    <link rel="stylesheet" type="text/css" href="../css/styles.css">
    <style>
    #mostrar_segun_html,
    #mostrar_segun_val {
        width: 100px;
    }

    #equipo {
        display: none;
    }
    </style>
</head>
<script>
function Alertaempleado() {
    fecha = new Date();
    hora = fecha.getHours();
    if (hora >= 18 && hora < 24) {
        texto =
            "Es importante tener en cuenta que nuestros técnicos actualmente no se <br> encuentran disponibles por lo que su solicitud se atenderá el dia de mañana.";
    }
    if (hora >= 0 && hora < 8) {
        texto =
            "Es importante tener en cuenta que nuestros técnicos actualmente no se <br> encuentran disponibles por lo que su solicitud se atenderá el dia de mañana.";
    }
    document.getElementById('alerta').innerHTML = texto;
}
</script>

<body onload="Alertaempleado()">
    <div id="wrapper">
        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <?php include("usuarios.php");?>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <?php //include("../php/correo.php");?>
                    <!-- /.dropdown-messages -->
                </li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="../../gestor/conexion/cerrar_session.php"><i
                                    class="fa fa-sign-out fa-fw"></i>CERRAR SESIÓN</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- /.navbar-top-links -->
            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li>
                            <a href="./"><i class="fa fa-home"></i> INICIO</a>
                        </li>
                        <li>
                            <a href="rptCons.php"><i class="fa fa-keyboard-o"></i> REPORTES
                                <!--<span class="fa arrow"></span>-->
                            </a>
                        </li>
                        <li>
                            <a href="rptHist.php"><i class="glyphicon glyphicon-header"></i> HISTORIAL
                                <!--<span class="fa arrow"></span>-->
                            </a>
                        </li>


                    </ul>
                </div>
            </div>
        </nav>


        <?php
ini_set('date.timezone','America/Mexico_City');
$actual = date('Y-m-d');
$hactual = date('H:i:s');
$queri ="SELECT * FROM reporte WHERE n_empleado = $n_empleado AND finicio = '$actual' ORDER BY n_reporte DESC";
$resultado = mysqli_query($conexion, $queri);
    $row = mysqli_fetch_assoc($resultado);

        if(isset($row['n_reporte']) && !empty($row['n_reporte'])){
            $nrprt = $row['n_reporte'];
            $sede = $row['pila'];
            $tecnico = $row['idtec'];  
            $hora = $row['hinicio']; 
            $res = 'SI';       
        }else{
                $nrprt = '';
                $hora = '0000-00-00';
                $res = 'NO';
        }

?>


        <div id="page-wrapper">
            <div class="row">


                <div class="col-lg-12">
                    <img src="../img/afac.png" style="float: right; width: 90px;margin-top: 0.8em">
                    <h1 class="page-header">GENERAR REPORTE</h1>
                    <p style="text-transform: uppercase; font-size: 13px; text-align: right;" id="alerta"></p>
                </div>


            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-cherri">
                        <div class="panel-heading"></div>

                        <div class="panel-body">
                            <div class="list-group">
                                <form class="form-horizontal" action="" method="POST" id="ConEquipo"
                                    onsubmit="return reporte(this)">
                                    <script src="https://code.jquery.com/jquery-2.2.2.min.js"></script>

                                    <div id="div2" style="display: none;">
                                        <!--<div class="radio">
                                <p id="divp">
                                ¿El equipo que va reportar está a su cargo? 
                                <input checked="checked" name="select" type="radio" value="si" id="SI" />
                                <label for="SI">SI</label>
                                <input name="select" type="radio" value="no" id="NO" />
                                <label for="NO">NO</label></p>
                                </div> -->
                                        <div class="form-group">
                                            <!--                           <div class="col-sm-offset-0 col-sm-12">
                                <label id="nota1"></label>    
                                <label id="nota2">¡Agregue los datos del equipo que desea reportar!</label>
                                </div> -->
                                            <input id="nempleado" name="nempleado" type="hidden"
                                                value="<?php echo $n_empleado?>" />

                                            <input id="idequipo" name="idequipo" type="hidden" value="0" />

                                            <!-- <input id="proceso" name="proceso" value="asignado" type="hidden"/> -->

                                            <!-- <div class="col-sm-offset-0 col-sm-4">
                                <select class="form-control" selected="true" id="modelo" name="modelo">
                                <option value="" selected>SELECCIONE MARCA DEL CPU</option>
                                <option value="LENOVO">LENOVO</option>
                                <option value="DELL">DELL</option>
                                <option value="HP">HP</option>
                                <option value="OTRO">OTRO</option>
                                </select>
                                </div> -->

                                            <!--<div class="col-sm-offset-0 col-sm-4">
                                <input id="serie" name="serie" type="text" class="form-control" placeholder="Número de serie de la CPU">
                                </div>-->

                                            <!--<div class="col-sm-offset-0 col-sm-4">
                                <select class="form-control" selected="true" id="verwind" name="verwind">                                
                                <option value="" selected>SELECCIONE VERSIÓN WINDOWS</option>
                                  <option value="WINDOWS 7" >WINDOWS 7</option>
                                  <option value="WINDOWS 10" >WINDOWS 10</option>
                                  <option value="LINUX" >LINUX</option> 
                                </select>                                
                                </div>-->

                                        </div>
                                    </div>
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
                                    <!-- <div class="form-group">
                                <div id="equipo"></div>         
                                </div> -->


                                    <div id="div1">
                                        <!--                                 <div class="radio">
                                <input checked="checked" type="radio" name="catch" value="true" id="pregunta1">
                                <label for="pregunta1">¿Reportar equipo de computo?</label>
                                <input type="radio" name="catch" value="false" id="pregunta2">
                                <label for="pregunta2">¿Desea reportar otro equipo de cómputo?</label>
                                </div> -->
                                        <div class="form-group">
                                            <div id="equipo"></div>
                                        </div>
                                    </div>
                                    <!--</div>-->
                                    <!--ARÉA DE DESCRIPCIÓN-->
                                    <div class="was-validated">
                                        <div class="col-md-13">
                                            <label for="validationTextarea">OBSERVACIONES</label>
                                            <!--<div style="color: #6A6507;" class="invalid-feedback"></div>-->
                                            <textarea style="font-size: 18px;" onkeyup="mayus(this);" id="obser"
                                                name="obser" class="form-control is-invalid" id="validationTextarea"
                                                rows="3" required></textarea>
                                            <!--placeholder="Es importante que la descripción sea clara..."-->
                                        </div>
                                    </div>

                                    <div class="form-group"><br>
                                        <div class="col-sm-offset-0 col-sm-5">


                                            <?php 

$date = new DateTime($hora);
$date->modify('+10 minute');
$hr_rprt = $date->format('H:i:s');
$hactual;
$h1 = strtotime($hr_rprt);
$h2 = strtotime($hactual);

// if($h1 >= $h2){
// echo "a tiempo";
// }else{
// echo "fuera de tiempo";
// }

//echo $hora;
if($h1 <= $h2){
?>


                                            <button style="font-size: 13px;" type="button" class="btn btn-green btn-lg"
                                                id="button1" data-toggle="modal"
                                                data-target="#exampleModalCenter">GENERAR REPORTE</button>
                                            <?php }else{ ?>

                                            <button style="font-size: 13px;" type="button" id="button"
                                                onclick="reporte10min();" class="btn btn-primary">GENERAR
                                                REPORTE</button>

                                            <input type="hidden" name="sedeTec" id="sedeTec"
                                                value="<?php echo $sede ?>">
                                            <input type="hidden" name="tecnico" id="tecnico"
                                                value="<?php echo $tecnico ?>">

                                            <?php } ?>

                                            <!-- <button type="button" id="button" class="btn btn-green btn-lg" onclick="reporte();">Generar reporte</button> -->
                                            <!--THIS CONTAINER IS FOR CHARGUE THE MODAL FUNCTION -->
                                            <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
                                                aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <p style="text-align: center; font-size: 20px;"
                                                                class="modal-title" id="exampleModalLongTitle">
                                                                ¡ATENCIÓN!</p>
                                                            <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close"> -->
                                                            <!-- <span aria-hidden="true">&times;</span> -->
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p
                                                                style="text-transform: uppercase; text-align: center; font-size: 18px;">
                                                                Para poder continuar es necesario indicar la SEDE en la
                                                                que te encuentras</p>
                                                            <br><select class="form-control" id="sede" name="sede">

                                                                <?php $query ="SELECT DISTINCT sede FROM tecnico WHERE id_tecnico != 0 AND baja = 0";
                                    $resultado = mysqli_query($conexion, $query); ?>
                                                                <option value="0" selected>SELECIONAR SEDE...</option>
                                                                <?php while($row = mysqli_fetch_assoc($resultado)){ ?>
                                                                <option value="<?php echo $row['sede']?>">
                                                                    <?php echo $row['sede']?></option>
                                                                <?php } ?>

                                                            </select>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">CERRAR</button>
                                                            <button style="font-size: 13px;" type="button" id="button"
                                                                onclick="reporte();" class="btn btn-primary">GENERAR
                                                                REPORTE</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <b>
                                            <p style="text-transform: uppercase;"
                                                class="alert alert-danger text-center padding reportea" id="error">Su
                                                reporte con la descripción del problema ya está asignada, para más
                                                detalles de su lado izquierdo </p>
                                        </b>
                                        <b>
                                            <p style="text-transform: uppercase;"
                                                class="alert alert-success text-center padding reporte" id="exito">¡Su
                                                reporte se generó con éxito, se le asigno un técnico!, Para más detalles
                                                de su lado izquierdo: Reportes</p>
                                        </b>
                                        <b>
                                            <p style="text-transform: uppercase;"
                                                class="alert alert-warning text-center padding reportev" id="vacio">
                                                Llene campos vacíos</p>
                                        </b>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</body>

<link rel="stylesheet" type="text/css" href="../administrador/librerias/select2/css/select2.css">
<script src="../administrador/librerias/jquery-1.12.3.min.js"></script>
<script src="../administrador/librerias/alertifyjs/alertify.js"></script>
<script src="../administrador/librerias/select2/js/select2.js"></script>
<script src="../boots/bootstrap/js/bootstrap.min.js"></script>
<script src="../dist/js/sb-admin-2.js"></script>
<script src="../boots/metisMenu/metisMenu.min.js"></script>
<script src="../js/mayu.js"></script>
<script src="../js/conEqp.js"></script>

</html>
<script type="text/javascript">
$(document).ready(function() {
    $('#buscador').load('select/buscar.php');
    $('#select1').load('select/tabla.php');
    $('#select2').load('select/select.php');
    $('#select3').load('select/penultimo.php');
    $('#select4').load('select/ultimo.php');
    $('#select5').load('select/final.php');

    $('#servicio').select2();
    $('#intervencion').select2();
    $('#descripcion').select2();
    $('#solucion').select2();
    $('#ultima').select2();
});
</script>