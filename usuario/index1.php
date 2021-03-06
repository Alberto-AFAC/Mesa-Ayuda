<?php  
session_start(); 
  //evaluaremos si la variable de sesión existe de lo contrario no se hará nada 
  //si la variable sesión existe, se evaluará que tipo de usuario está ingresando de esa manera saber a dónde se debe redireccionar en caso de que ya se haya logeado 
  if(isset($_SESSION['n_empleado'])){
    if($_SESSION['n_empleado']['n_empleado'] != ''){}    
 }else{ header('Location: ../');}

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
</head>

<body>
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
                     <li><a href="../../../gestor/conexion/cerrar_sesion.php"><i class="fa fa-sign-out fa-fw"></i>CERRAR SESIÓN</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- /.navbar-top-links -->
            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li>
                            <a href="./"><i class="fa fa-home"></i> Inicio</a>
                        </li>      
                        <li>
                            <a href="rptCons.php"><i class="fa fa-keyboard-o"></i> Reportes<!--<span class="fa arrow"></span>--></a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <img src="../img/afac.png" style="float: right; width: 90px;margin-top: 0.8em">
                <h1 class="page-header">Generar reporte</h1>
            </div>
        </div>

        <div class="row">   
            <div class="col-lg-12">
                <div class="panel panel-cherri">
                    <div class="panel-heading"></div>
                    
                    <div class="panel-body">
                        <div class="list-group">
                                <form class="form-horizontal" action="" method="POST" id="ConEquipo" onsubmit="return reporte(this)">
                                <script src="https://code.jquery.com/jquery-2.2.2.min.js"></script>           
                                <div id="div1">
                                <div class="radio">
                                <input checked="checked" type="radio" name="catch" value="true" id="pregunta1">
                                <label for="pregunta1">¿El equipo que va reportar está a su cargo?</label>
                                <input type="radio" name="catch" value="false" id="pregunta2">
                                <label for="pregunta2">¿Desea reportar otro equipo de cómputo?</label>
                                </div>
                                <div class="form-group">
                                <div id="equipo"></div>         
                                </div>
                                </div>
                                <div id="div2" style="display: none;">
                                <div class="radio">
                                <p id="divp">
                                ¿El equipo que va reportar está a su cargo? 
                                <input checked="checked" name="select" type="radio" value="si" id="SI" />
                                <label for="SI">SI</label>
                                <input name="select" type="radio" value="no" id="NO" />
                                <label for="NO">NO</label></p>
                                </div>
                                <div class="form-group">
                                <div class="col-sm-offset-0 col-sm-12">
                                <label id="nota1"></label>    
                                <label id="nota2">¡Agregue los datos del equipo que desea reportar!</label>
                                </div>
                                <input id="nempleado" name="nempleado" type="hidden" value="<?php echo $_SESSION['n_empleado']['n_empleado']?>"/>
                                <input id="idequipo" name="idequipo" type="hidden" value="0" />

                                <input id="proceso" name="proceso" value="asignado" type="hidden"/>

                                <div class="col-sm-offset-0 col-sm-4">
                                <select class="form-control" selected="true" id="modelo" name="modelo">
                                <option value="" selected>SELECCIONE MARCA DE EQUIPO</option>
                                <option value="LENOVO">LENOVO</option>
                                <option value="DELL">DELL</option>
                                <option value="HP">HP</option>
                                <option value="OTRO">OTRO</option>
                                </select>
                                </div>

                                <div class="col-sm-offset-0 col-sm-4">
                                <input id="serie" name="serie" type="text" class="form-control" placeholder="Número de serie de la CPU">
                                </div>
                                
                               <div class="col-sm-offset-0 col-sm-4">
                                <select class="form-control" selected="true" id="verwind" name="verwind">                                
                                <option value="" selected>SELECCIONE VERSIÓN WINDOWS</option>
                                  <option value="WINDOWS 7" >WINDOWS 7</option>
                                  <option value="WINDOWS 10" >WINDOWS 10</option>
                                  <option value="UBUNTU" >LINUX</option> 
                                </select>                                
                                </div>

                                </div>
                                </div>
                                <div class="form-group">
                                <div id="buscador"></div>
                                <div id="select1"></div>  
                                <div id="select2"></div>
                                </div>
                                <!--</div>-->
                                <!--ARÉA DE DESCRIPCIÓN-->
                                <div class="was-validated">
                                <div class="col-md-13">
                                <label for="validationTextarea">Observaciones.</label>
                                <!--<div style="color: #6A6507;" class="invalid-feedback"></div>-->
                                <textarea style="font-size: 18px;" id="obser" name="obser" class="form-control is-invalid" id="validationTextarea" rows="3" required></textarea><!--placeholder="Es importante que la descripción sea clara..."-->
                                </div>
                                </div>

                                <div class="form-group"><br>
                                <div class="col-sm-offset-0 col-sm-5">
                                <button type="button" id="button" class="btn btn-green btn-lg" onclick="reporte();">Generar reporte</button>
                                </div>
                                <b><p class="alert alert-danger text-center padding error" id="error">Usted tiene un reporte pendiente del equipo asignado o falta que evalué dicho reporte</p></b>
                                <b><p class="alert alert-success text-center padding reporte" id="exito">¡Su reporte se generó con éxitos, se le asigno un técnico! Para más detalles, de su lado izquierdo: Reportes</p></b>
                                <b><p class="alert alert-warning text-center padding aviso" id="vacio">Llene campos vacíos</p></b>
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
   
</html>
<script type="text/javascript">
   $(document).ready(function(){
      $('#buscador').load('select/buscar.php');
      $('#select1').load('select/tabla.php');
      $('#select2').load('select/select.php');      
   });


</script>
