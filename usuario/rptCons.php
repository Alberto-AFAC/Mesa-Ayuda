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
        $numEmp = $usua[2];

  //evaluaremos si la variable de sesión existe de lo contrario no se hará nada 
  //si la variable sesión existe, se evaluará que tipo de usuario está ingresando de esa manera saber a dónde se debe redireccionar en caso de que ya se haya logeado
//*** if(isset($_SESSION['gstNmpld'])){
//     if($_SESSION['gstNmpld']['gstNmpld'] != ''){}    
// }else{ header('Location: ../');}
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
    <link href="../boots/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">
    <link href="../boots/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <script src="https://code.jquery.com/jquery-3.6.0.js"
        integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="../css/styles.css">
    <link rel="stylesheet" type="text/css" href="../datas/dataTables.css">
    <style>
    #customers {
        font-family: Arial, Helvetica, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }

    #customers td,
    #customers th {
        border: 1px solid #ddd;
        padding: 8px;
    }

    #customers tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    #customers tr:hover {
        background-color: #ddd;
    }

    #customers th {
        padding-top: 8px;
        padding-bottom: 1px;
        text-align: left;
        background-color: #1489D8;
        color: white;
    }
    </style>
</head>

<body>
    <div id="wrapper">
        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <?php include("usuarios.php");?>
            </div>
            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <!--Notificación de correos-->
                    <?php //include("../php/correo.php");?>
                </li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li>
                            <a href="../../gestor/conexion/cerrar_session.php"><i class="fa fa-sign-out fa-fw"></i>CERRAR
                                SESIÓN</a>
                        </li>
                    </ul>
                </li>
            </ul>
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
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <img src="../img/afac.png" class="imgafac">
                    <h1 class="page-header">CONSULTAR REPORTE</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-cherri">
                        <div class="panel-heading"></div>
                    </div>
                </div>
                <div class="panel-body">
                    <div class="col-lg-12">

                        <table id="data-table-reporte" class="table table-striped table-hover"></table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <form class="form-horizontal" action="" method="POST" onsubmit="return evlRpt(this)">
        <div class="modal fade" id="modalEval" class="col-xs-12 .col-md-12" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel">

            <div class="modal-dialog width" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <!--<button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="limpiarCampo()"><span style="color: black"  aria-hidden="true">&times;</span>
</button>-->
                        <button type="button" onclick="location.href='rptCons.php'" class="close" data-dismiss="modal"
                            aria-label="Close"><span style="color: black" aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="exampleModalLabel"><b>EVALUAR REPORTE - <input class="transparent"
                                    style="text-transform: uppercase;" id="estado_rpt" name="estado_rpt"
                                    disabled=""></b></h4>
                    </div>
                    <div class="modal-body">
                        <div class="jumbotron">
                            <div class="container">
                                <p style='font-size: 12px; text-align: justify;'>EL DEPARTAMENTO DE SOPORTE TÉCNICO Y
                                    REDES, SE ESMERA
                                    PARA
                                    OFRECER CONSISTENTEMENTE EL MEJOR
                                    SOPORTE TÉCNICO POSIBLE Y SUPERAR SUS EXPECTATIVAS DE LOS SERVICIOS INFORMÁTICOS
                                    BRINDADOS.
                                    POR LO TANTO, AGRADECEMOS SU VALIOSO APOYO A FIN DE QUE SE TOME ALGUNOS MINUTOS PARA
                                    COMPARTIR CON NOSOTROS SU RETROALIMENTACIÓN ACERCA DE SU EXPERIENCIA CON EL SOPORTE,
                                    PARA
                                    QUE PODAMOS CONTINUAR MEJORANDO NUESTRO SERVICIO.</p>
                                <input type="hidden" id="opcion" name="opcion" value="evaluar">
                                <span style="font-weight: bold; font-size: 12px;">ID: <input
                                        style=" background: transparent; border:none;" id="nreporte" name="nreporte"
                                        type="text" disabled></span><br>
                                <span style="font-weight: bold; font-size: 12px;">CATEGORÍA: <input
                                        style=" background: transparent; border:none;" id="servicio" name="servicio"
                                        type="text" disabled></span><br>
                                <span style="font-weight: bold; font-size: 12px;">SUBCATEGORÍA: <input
                                        style=" background: transparent; border:none;" id="intervencion"
                                        name="intervencion" type="text" disabled></span><br>
                                <span style="font-weight: bold; font-size: 12px;">FECHA DE SOLICITUD: <input
                                        style=" background: transparent; border:none;" id="finicio" name="finicio"
                                        type="text" disabled></span><br>
                                <span style="font-weight: bold; font-size: 12px;">FECHA DE RESOLUCIÓN: <input
                                        style=" background: transparent; border:none;" id="ffinal" name="ffinal"
                                        type="text" disabled></span><br>
                                <span style="font-weight: bold; font-size: 12px;">TÉCNICO ASIGNADO: <input
                                        style="width: 50%; background: transparent; border:none;" id="usuario"
                                        name="usuario" type="text" disabled></span><br><br>
                                <p style='font-size: 12px; text-align: justify;'>POR FAVOR, CALIFIQUE SU SATISFACCIÓN
                                    CON EL SOPORTE TÉCNICO TELEFÓNICO O EN SITIO QUE RECIBIÓ; EN DONDE 1 ES TOTALMENTE
                                    INSATISFECHO Y 10 EXTREMADAMENTE SATISFECHO, 0 NO SE APLICA</p>
                                <input type="hidden" id="opcion" name="opcion" value="evaluar">
                                <!-- TABLE TO EVALUATION -->
                                <table id="customers" style="width:100%">
                                    <tr>
                                        <th></th>
                                        <th>1</th>
                                        <th>2</th>
                                        <th>3</th>
                                        <th>4</th>
                                        <th>5</th>
                                        <th>6</th>
                                        <th>7</th>
                                        <th>8</th>
                                        <th>9</th>
                                        <th>10</th>
                                    </tr>
                                    <tr>
                                        <td style='font-weight: bold; font-size: 12px;'>CONOCIMIENTOS DEL TÉCNICO</td>
                                        <td><label>
                                                <input type="radio" value="1" name="conocimientos">
                                            </label></td>
                                        <td><label>
                                                <input type="radio" value="2" name="conocimientos">
                                            </label></td>
                                        <td><label>
                                                <input type="radio" value="3" name="conocimientos">
                                            </label></td>
                                        <td><label>
                                                <input type="radio" value="4" name="conocimientos">
                                            </label></td>
                                        <td><label>
                                                <input type="radio" value="5" name="conocimientos">
                                            </label></td>
                                        <td><label>
                                                <input type="radio" value="6" name="conocimientos">
                                            </label></td>
                                        <td><label>
                                                <input type="radio" value="7" name="conocimientos">
                                            </label></td>
                                        <td><label>
                                                <input type="radio" value="8" name="conocimientos">
                                            </label></td>
                                        <td><label>
                                                <input type="radio" value="9" name="conocimientos">
                                            </label></td>
                                        <td><label>
                                                <input type="radio" value="10" name="conocimientos">
                                            </label></td>
                                    </tr>
                                    <tr>
                                        <td style='font-weight: bold; font-size: 12px;'>ACTITUD DE SERVICIO DEL TÉCNICO
                                        </td>
                                        <td><label>
                                                <input type="radio" value="1" name="actitud">
                                            </label></td>
                                        <td><label>
                                                <input type="radio" value="2" name="actitud">
                                            </label></td>
                                        <td><label>
                                                <input type="radio" value="3" name="actitud">
                                            </label></td>
                                        <td><label>
                                                <input type="radio" value="4" name="actitud">
                                            </label></td>
                                        <td><label>
                                                <input type="radio" value="5" name="actitud">
                                            </label></td>
                                        <td><label>
                                                <input type="radio" value="6" name="actitud">
                                            </label></td>
                                        <td><label>
                                                <input type="radio" value="7" name="actitud">
                                            </label></td>
                                        <td><label>
                                                <input type="radio" value="8" name="actitud">
                                            </label></td>
                                        <td><label>
                                                <input type="radio" value="9" name="actitud">
                                            </label></td>
                                        <td><label>
                                                <input type="radio" value="10" name="actitud">
                                            </label></td>
                                    </tr>
                                    <tr>
                                        <td style='font-weight: bold; font-size: 12px;'>HABILIDADES DE COMUNICACIÓN DEL
                                            TÉCNICO</td>
                                        <td><label>
                                                <input type="radio" value="1" name="habilidades">
                                            </label></td>
                                        <td><label>
                                                <input type="radio" value="2" name="habilidades">
                                            </label></td>
                                        <td><label>
                                                <input type="radio" value="3" name="habilidades">
                                            </label></td>
                                        <td><label>
                                                <input type="radio" value="4" name="habilidades">
                                            </label></td>
                                        <td><label>
                                                <input type="radio" value="5" name="habilidades">
                                            </label></td>
                                        <td><label>
                                                <input type="radio" value="6" name="habilidades">
                                            </label></td>
                                        <td><label>
                                                <input type="radio" value="7" name="habilidades">
                                            </label></td>
                                        <td><label>
                                                <input type="radio" value="8" name="habilidades">
                                            </label></td>
                                        <td><label>
                                                <input type="radio" value="9" name="habilidades">
                                            </label></td>
                                        <td><label>
                                                <input type="radio" value="10" name="habilidades">
                                            </label></td>
                                    </tr>
                                    <tr>
                                        <td style='font-weight: bold; font-size: 12px;'>TIEMPO DE RESPUESTA</td>
                                        <td><label>
                                                <input type="radio" value="1" name="respuesta">
                                            </label></td>
                                        <td><label>
                                                <input type="radio" value="2" name="respuesta">
                                            </label></td>
                                        <td><label>
                                                <input type="radio" value="3" name="respuesta">
                                            </label></td>
                                        <td><label>
                                                <input type="radio" value="4" name="respuesta">
                                            </label></td>
                                        <td><label>
                                                <input type="radio" value="5" name="respuesta">
                                            </label></td>
                                        <td><label>
                                                <input type="radio" value="6" name="respuesta">
                                            </label></td>
                                        <td><label>
                                                <input type="radio" value="7" name="respuesta">
                                            </label></td>
                                        <td><label>
                                                <input type="radio" value="8" name="respuesta">
                                            </label></td>
                                        <td><label>
                                                <input type="radio" value="9" name="respuesta">
                                            </label></td>
                                        <td><label>
                                                <input type="radio" value="10" name="respuesta">
                                            </label></td>
                                    </tr>
                                    <tr>
                                        <td style='font-weight: bold; font-size: 12px;'>TIEMPO DE SOLUCIÓN</td>
                                        <td><label>
                                                <input type="radio" value="1" name="solucion">
                                            </label></td>
                                        <td><label>
                                                <input type="radio" value="2" name="solucion">
                                            </label></td>
                                        <td><label>
                                                <input type="radio" value="3" name="solucion">
                                            </label></td>
                                        <td><label>
                                                <input type="radio" value="4" name="solucion">
                                            </label></td>
                                        <td><label>
                                                <input type="radio" value="5" name="solucion">
                                            </label></td>
                                        <td><label>
                                                <input type="radio" value="6" name="solucion">
                                            </label></td>
                                        <td><label>
                                                <input type="radio" value="7" name="solucion">
                                            </label></td>
                                        <td><label>
                                                <input type="radio" value="8" name="solucion">
                                            </label></td>
                                        <td><label>
                                                <input type="radio" value="9" name="solucion">
                                            </label></td>
                                        <td><label>
                                                <input type="radio" value="10" name="solucion">
                                            </label></td>
                                    </tr>
                                    <tr>
                                        <td style='font-weight: bold; font-size: 12px;'>CALIDAD GENERAL DEL SERVICIO
                                            RECIBIDO</td>
                                        <td><label>
                                                <input type="radio" value="1" name="calidad">
                                            </label></td>
                                        <td><label>
                                                <input type="radio" value="2" name="calidad">
                                            </label></td>
                                        <td><label>
                                                <input type="radio" value="3" name="calidad">
                                            </label></td>
                                        <td><label>
                                                <input type="radio" value="4" name="calidad">
                                            </label></td>
                                        <td><label>
                                                <input type="radio" value="5" name="calidad">
                                            </label></td>
                                        <td><label>
                                                <input type="radio" value="6" name="calidad">
                                            </label></td>
                                        <td><label>
                                                <input type="radio" value="7" name="calidad">
                                            </label></td>
                                        <td><label>
                                                <input type="radio" value="8" name="calidad">
                                            </label></td>
                                        <td><label>
                                                <input type="radio" value="9" name="calidad">
                                            </label></td>
                                        <td><label>
                                                <input type="radio" value="10" name="calidad">
                                            </label></td>
                                    </tr>
                                </table><br><br>
                                <p style='font-weight: bold; font-size: 12px; text-align: justify;'>BRINDE CUALQUIER
                                    COMENTARIO ADICIONAL ACERCA DE SU EXPERIENCIA</p>
                                <div>
                                    <textarea style='font-weight: bold; font-size: 12px; text-align: justify;' onkeyup="mayus(this);"
                                        placeholder="(SUS COMENTARIOS DETALLADOS NOS AYUDARÁN A MEJORAR SU EXPERIENCIA.)"
                                        id="observa" name="observa" class="form-control"
                                        id="exampleFormControlTextarea1" rows="2"></textarea><br>
                                    <p style='font-weight: bold; font-size: 12px; text-align: justify;'> *NO SUMINISTRE
                                        INFORMACIÓN CONFIDENCIAL O INFORMACIÓN QUE PERTENEZCA A ALGUNA PERSONA
                                        ESPECÍFICAMENTE.</p>
                                    <br>
                                    <p style='font-size: 12px; text-align: justify;'> APRECIAMOS QUE
                                        DEDIQUE EL TIEMPO A COMPARTIR SUS OPINIONES. SU RETROALIMENTACIÓN ES
                                        INCREÍBLEMENTE VALIOSA PARA NOSOTROS A FIN DE MEJORAR AÚN MÁS SU EXPERIENCIA CON
                                        NOSOTROS.</p>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-offset-0 col-sm-4">
                                <button type="button" id="button" class="btn btn-green"
                                    onclick="evlRpt();">ACEPTAR</button>
                            </div>
                            <b>
                                <p class="alert alert-danger text-center padding error" id="error">Error al evaluar
                                    técnico</p>
                            </b>
                            <b>
                                <p class="alert alert-success text-center padding exito" id="exito">¡El técnico ha sido
                                    evaluado con éxito!</p>
                            </b>
                            <b>
                                <p class="alert alert-warning text-center padding aviso" id="vacio">Es necesario que
                                    evalué al técnico</p>
                            </b>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>



<!-------CANCELADO------->

   <form class="form-horizontal" action="" method="POST" onsubmit="return evlRpt(this)">
        <div class="modal fade" id="modalEvalCancelado" class="col-xs-12 .col-md-12" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel">

            <div class="modal-dialog width" role="document">
                <div class="modal-content">
                    <div class="modal-header">

                        <button type="button" onclick="location.href='rptCons.php'" class="close" data-dismiss="modal"
                            aria-label="Close"><span style="color: black" aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="exampleModalLabel"><b>EVALUAR REPORTE - <input class="transparent"
                                    style="text-transform: uppercase;" id="estado_rpt" name="estado_rpt"
                                    disabled=""></b></h4>
                    </div>
                    <div class="modal-body">
                        <div class="jumbotron">
                            <div class="container">
                                <input id="nreporte" name="nreporte" type="hidden" disabled>
                                <!-- TABLE TO EVALUATION -->
                     
                                <p style='font-weight: bold; font-size: 12px; text-align: justify;'>COMENTE MOTIVO DE CANCELACIÓN </p>
                                <div>
                                    <textarea style='font-weight: bold; font-size: 12px; text-align: justify;' onkeyup="mayus(this);"
                                        placeholder="(SUS COMENTARIOS DETALLADOS NOS AYUDARÁN A MEJORAR SU EXPERIENCIA.)"
                                        id="observac" name="observac" class="form-control"
                                        id="exampleFormControlTextarea1" rows="2"></textarea><br>
                                    <p style='font-weight: bold; font-size: 12px; text-align: justify;'> *NO SUMINISTRE
                                        INFORMACIÓN CONFIDENCIAL O INFORMACIÓN QUE PERTENEZCA A ALGUNA PERSONA
                                        ESPECÍFICAMENTE.</p>
                                    <br>
                                    <p style='font-size: 12px; text-align: justify;'> APRECIAMOS QUE
                                        DEDIQUE EL TIEMPO A COMPARTIR SUS OPINIONES. SU RETROALIMENTACIÓN ES
                                        INCREÍBLEMENTE VALIOSA PARA NOSOTROS A FIN DE MEJORAR AÚN MÁS SU EXPERIENCIA CON
                                        NOSOTROS.</p>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-offset-0 col-sm-4">
                                <button type="button" id="button" class="btn btn-green"
                                    onclick="evlRptCancela();">ACEPTAR</button>
                            </div>
                            <b>
                                <p class="alert alert-danger text-center padding error" id="errorc">Error al evaluar
                                    técnico</p>
                            </b>
                            <b>
                                <p class="alert alert-success text-center padding exito" id="exitoc">¡Se cancelo reporte con éxito!</p>
                            </b>
                            <b>
                                <p class="alert alert-warning text-center padding aviso" id="vacioc">Es necesario comentar reporte cancelado</p>
                            </b>
                        </div>
                    </div>
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

                        <h4 class="modal-title" id="exampleModalLabel">DETALLES DEL REPORTE</h4>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" id="opcion" name="opcion" value="evaluar">
                        <div class="form-group">
                            <div class="col-sm-2">
                                <label>N° REPORTE</label>
                                <input id="nreporte" name="nreporte" type="text" class="form-control" disabled="">
                            </div>
                            <div class="col-sm-4">
                                <label>TÉCNICO</label>
                                <input id="usuario" name="usuario" type="text" class="form-control" disabled="">
                            </div>
                            <div class="col-sm-2">
                                <label>EXTENSIÓN</label>
                                <input id="extension" name="extension" type="text" class="form-control" disabled="">
                            </div>
                            <div class="col-sm-4">
                                <label>CORREO</label>
                                <input id="correo" name="correo" type="text" class="form-control" disabled="">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-4">
                                <label>TIPO DE SERVICIO</label>
                                <input id="servicio" name="servicio" type="text" class="form-control" disabled="">
                            </div>

                            <div class="col-sm-4">
                                <label style="color:white;">.</label>
                                <input id="intervencion" name="intervencion" type="text" class="form-control"
                                    disabled="">
                            </div>

                            <div class="col-sm-4">
                                <label style="color:white;">.</label>
                                <input id="descripcion" name="descripcion" type="text" class="form-control" disabled="">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-4">

                                <input id="solucion" name="solucion" type="text" class="form-control" disabled="">
                            </div>

                            <div class="col-sm-4">

                                <input id="ultima" name="ultima" type="text" class="form-control" disabled="">
                            </div>

                            <div class="col-sm-4">

                                <input id="final" name="final" type="text" class="form-control" disabled="">
                            </div>
                        </div>

                        <div class="form-group" id="obsrvcns">
                            <div class="col-sm-12">
                                <label>OBSERVACIONES</label>
                                <textarea id="usu_observ" name="usu_observ" class="form-control"
                                    id="exampleFormControlTextarea1" rows="3" disabled=""></textarea>
                            </div>
                        </div>

                        <div class="form-group" id="rspsta">
                            <div class="col-sm-12">
                                <label>RESPUESTA DE FALLA</label>
                                <textarea id="falla_interna" name="falla_interna" class="form-control"
                                    id="exampleFormControlTextarea1" rows="3" disabled=""></textarea>
                            </div>
                        </div>

                        <div class="form-group" id="falla">
                            <div class="col-sm-12">
                                <label>RESPUESTA EXTERNA DE LA FALLA</label>
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
                            <div class="col-sm-4" id="pndint1">
                                <label> SU EVALUACIÓN DE REPORTE</label>
                                <input id="evaluacion" name="evaluacion" type="text" class="form-control" disabled="">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12" id="pndint2">
                                <label>¿POR QUÉ?</label>
                                <textarea onkeyup="mayus(this);" id="observa" name="observa" class="form-control"
                                    id="exampleFormControlTextarea1" rows="2" disabled=""></textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>

</body>
<script src="../js/mayu.js"></script>
<script src="../js/conEqp.js"></script>
<script src="../boots/bootstrap/js/bootstrap.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/jquery.dataTables.min.js"></script>
<script src="../js/dataTables.bootstrap.js"></script>
<script src="../js/dataTables.buttons.min.js"></script>
<script src="../boots/metisMenu/metisMenu.min.js"></script>
<script src="../dist/js/sb-admin-2.js"></script>
<script type="text/javascript">
var dataSet = [
    <?php
	     // $numEmp = $_SESSION['gstNmpld']['gstNmpld'];
         $query = "SELECT 
            tecnico.id_usu,
            reporte.n_reporte,
            reporte.hinicio,
            DATE_FORMAT(reporte.finicio, '%d/%m/%Y') as finicio,
            reporte.evaluacion,
            reporte.estado_rpt,
            reporte.descripcion,
            DATE_FORMAT(reporte.ffinal, '%d/%m/%Y') as ftermino,
            reporte.hfinal,
            reporte.servicio,
            reporte.intervencion,
            reporte.falla_interna,
            reporte.falla_xterna,
            reporte.observa,
            reporte.usu_observ
                FROM reporte
                RIGHT JOIN tecnico
                ON id_tecnico = idtec
                WHERE reporte.n_empleado= $numEmp ORDER BY reporte.n_empleado DESC";
             $resultado = mysqli_query($conexion, $query);
        while($data = mysqli_fetch_array($resultado)){
            $fila = $data['n_reporte'];
            $final = $data['ftermino'];
            $inicio = $data['finicio'];
            $idtecnico=$data['id_usu'];
            $sql2="SELECT gstNombr,
                          gstNmpld,
                          gstApell,
                          gstExTel
                          FROM personal
                          WHERE
                          gstIdper = $idtecnico";
            $result2=mysqli_query($conexion2,$sql2);
            while($dato=mysqli_fetch_array($result2)){
                $ext = $dato['gstExTel'];
                $nombre = $dato['gstNombr'];
                $apellidos = $dato['gstApell'];
                // $idpersona = $dato['gstIdper'];

if($data['estado_rpt'] == 'Por atender'){

        ?>["<?php echo  $data['n_reporte']?>", "<?php echo  $nombre." ".$apellidos?>", "<?php echo $ext?>",
        "<?php echo $data['servicio']?>", "<?php echo $inicio?>", "<?php echo $final?>",
        "<?php                   
                echo "<a href='' type='button' data-toggle='modal' data-target='#modalDtll' class='detalle btn btn-danger' onclick='detalle({$data['n_reporte']})' style='width:100%; font-size:12px;'>POR ATENDER</a>"; ?>"
    ],
    <?php 

}else if($data['estado_rpt'] == 'Pendiente'){ ?>

    ["<?php echo  $data['n_reporte']?>", "<?php echo  $nombre." ".$apellidos?>", "<?php echo $ext?>",
        "<?php echo $data['servicio']?>", "<?php echo $inicio?>", "<?php echo $final?>",
        "<?php 

                      
                echo "<a href='#' type='button' data-toggle='modal' data-target='#modalDtll' class='detalle btn btn-info' onclick='detalle({$data['n_reporte']})' style='width:100%; font-size:12px;'>PENDIENTE</a>";?>"
    ],

    <?php }else if($data['estado_rpt'] == 'Cancelado' && $data['evaluacion'] == '0'){ ?>

    ["<?php echo  $data['n_reporte']?>", "<?php echo  $nombre." ".$apellidos?>", "<?php echo $ext?>",
        "<?php echo $data['servicio']?>", "<?php echo $inicio?>", "<?php echo $final?>", "<?php 

                echo "<a href='#' type='button' data-toggle='modal' data-target='#modalEvalCancelado' class='detalle btn btn-default' onclick='evaluar({$data['n_reporte']})' style='width:100%; font-size:12px;'>CONFIRMAR</a>";                        
                    
                 ?>"
    ],


    <?php }else if($data['evaluacion'] == '0'){ ?>

    ["<?php echo  $data['n_reporte']?>", "<?php echo  $nombre." ".$apellidos?>", "<?php echo $ext?>",
        "<?php echo $data['servicio']?>", "<?php echo $inicio?>", "<?php echo $final?>", "<?php 

                echo "<a href='#' type='button' data-toggle='modal' data-target='#modalEval' class='detalle btn btn-default' onclick='evaluar({$data['n_reporte']})' style='width:100%; font-size:12px;'>EVALUAR</a>";                        
                    
                 ?>"
    ],


    <?php } 
        }
            }?>
];

var tableGenerarReporte = $('#data-table-reporte').DataTable({
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
            title: "TÉCNICO ASIGNADO"
        },
        {
            title: "EXT."
        },
        {
            title: "TIPO DE SERVICIO"
        },
        {
            title: "ENVIO"
        },
        {
            title: "TERMINO"
        },
        {
            title: "ESTADO"
        }
    ],
});
</script>

</html>