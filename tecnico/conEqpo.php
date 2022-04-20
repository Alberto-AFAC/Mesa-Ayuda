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
    <link rel="stylesheet" type="text/css" href="calendario/tcal.css" />
    <link href="//oss.maxcdn.com/jquery.bootstrapvalidator/0.5.2/css/bootstrapValidator.min.css" rel="stylesheet"></link>
    <link rel="stylesheet" href="https://rawgit.com/Eonasdan/bootstrap-datetimepicker/master/build/css/bootstrap-datetimepicker.min.css"/>
    <link rel="stylesheet" type="text/css" href="../css/styles.css">

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
                        <li><a href="../../../gestor/conexion/cerrar_sesion.php"><i class="fa fa-sign-out fa-fw"></i>Cerrar Sesión</a>
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
                            <a href="#"><i class="fa fa-keyboard-o"></i> Reportes<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="conRpt.php"><i class="fa fa-list-alt"></i> Consultar</a>
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
             <img src="../img/afac.png" class="imgafac">
             <h1 class="page-header">Atender reporte</h1>
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
            <?php include("../html/atender.html");?>
            </div>
         </div>   
    </div>

<?php include('conActu.php');?>

<form class="form-horizontal" action="" method="POST">
    <div class="modal fade" id="modalAtndr" class="col-xs-12 .col-md-12"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">

<div class="modal-dialog width" role="document">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="limpiarCampo()"><span style="color: black"  aria-hidden="true">&times;</span>
</button>
<h4 class="modal-title" id="exampleModalLabel">Atender reporte</h4>
</div>
            <div class="modal-body">
                <input type="hidden" id="id_usuario" name="id_usuario" value="<?php echo $_SESSION['usuario']['id_tecnico'];?>">
                <input type="hidden" id="opcion" name="opcion" value="actualizar">
                    <div class="form-group">                    
                    <div class="col-sm-3">
                    <label>N° reporte</label>
                    <input id="n_reporte" name="n_reporte" type="text" class="form-control">
                    </div>
                    <div class="col-sm-5">
                    <label>Usuario</label>
                    <input id="usuario" name="usuario" type="text" class="form-control">
                    </div>                    
                    <div class="col-sm-2">
                    <label>Extension</label>
                    <input id="extension" name="extension" type="text" class="form-control">
                    </div>
                    <div class="col-sm-2">
                    <label>Ubicación</label>
                    <input id="ubicacion" name="ubicacion" type="text" class="form-control">
                    </div>                    
                    </div>

                    <div class="form-group">
                    <div class="col-sm-4">
                    <label>Tipo de servicio</label>
                    <input id="servicio" name="servicio" type="text" class="form-control">
                    </div>

                    <div class="col-sm-4">
                    <label>Intervención</label>
                    <input id="intervencion" name="intervencion" type="text" class="form-control">
                    </div>                    

                    <div class="col-sm-4">
                    <label>Descripción</label>
                    <input id="descripcion" name="descripcion" type="text" class="form-control">
                    </div>
                    </div>
                    
                    <div class="form-group">
                    <div class="col-sm-12">
                    <label>Respuesta de falla</label> 
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                    </div>
                    </div>

                    <p id="divp">
                    ¿El soporte es externo?
                    <label for="SI">SI</label>
                    <input name="select" type="radio" value="si" id="SI" />
                    <label for="NO">NO</label>
                    <input name="select" type="radio" value="no" id="NO" />
                    </p>
                    
                    <div class="form-group" id="externo" style="display: none;">
                    <div class="col-sm-12">
                    <label> Respuesta externa de la falla</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                    </div>
                    </div>                     

                    <div class="form-group">
                    <div class="col-sm-6">
                    <label> Fecha reporte</label>
                    <input id="finicio" name="finicio" type="text" class="form-control" >
                    </div>
                    <div class="col-sm-6">
                    <label> Fecha finalizada</label>
                    <input id="ffinal" name="ffinal" type="text" class="form-control" >
                    </div>                    
                    </div> 

            </div>            
                <div class="modal-footer">
                        <button type="button" class="btn btn-primary" onclick="atdRpt();">Atender</button>
                </div>
            </div>
            </div>
        </div>
</form>  

<form class="form-horizontal" action="" method="POST">
    <div class="modal fade" id="modalDtlls" class="col-xs-12 .col-md-12"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">

<div class="modal-dialog width" role="document">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="limpiarCampo()"><span style="color: black"  aria-hidden="true">&times;</span>
</button>
<h4 class="modal-title" id="exampleModalLabel">Detalles reporte</h4>
</div>
            <div class="modal-body">
                <input type="hidden" id="id_usuario" name="id_usuario" value="<?php echo $_SESSION['usuario']['id_tecnico'];?>">
                <input type="hidden" id="opcion" name="opcion" value="actualizar">
                    <div class="form-group">                    
                    <div class="col-sm-3">
                    <label>N° reporte</label>
                    <input id="n_reporte" name="n_reporte" type="text" class="form-control">
                    </div>
                    <div class="col-sm-5">
                    <label>Usuario</label>
                    <input id="usuario" name="usuario" type="text" class="form-control">
                    </div>                    
                    <div class="col-sm-2">
                    <label>Extension</label>
                    <input id="extension" name="extension" type="text" class="form-control">
                    </div>
                    <div class="col-sm-2">
                    <label>Ubicación</label>
                    <input id="ubicacion" name="ubicacion" type="text" class="form-control">
                    </div>                    
                    </div>

                    <div class="form-group">
                    <div class="col-sm-4">
                    <label>Tipo de servicio</label>
                    <input id="servicio" name="servicio" type="text" class="form-control">
                    </div>

                    <div class="col-sm-4">
                    <label>Intervención</label>
                    <input id="intervencion" name="intervencion" type="text" class="form-control">
                    </div>                    

                    <div class="col-sm-4">
                    <label>Descripción</label>
                    <input id="descripcion" name="descripcion" type="text" class="form-control">
                    </div>
                    </div>
                    
                    <div class="form-group">
                    <div class="col-sm-12">
                    <label>Respuesta de falla</label> 
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                    </div>
                    </div>

                    <p id="divp">
                    ¿El soporte es externo?
                    <label for="SI">SI</label>
                    <input name="select" type="radio" value="si" id="SI" />
                    <label for="NO">NO</label>
                    <input name="select" type="radio" value="no" id="NO" />
                    </p>
                    
                    <div class="form-group" id="externo" style="display: none;">
                    <div class="col-sm-12">
                    <label> Respuesta externa de la falla</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                    </div>
                    </div>                     

                    <div class="form-group">
                    <div class="col-sm-6">
                    <label> Fecha reporte</label>
                    <input id="finicio" name="finicio" type="text" class="form-control" >
                    </div>
                    <div class="col-sm-6">
                    <label> Fecha finalizada</label>
                    <input id="ffinal" name="ffinal" type="text" class="form-control" >
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


    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/jquery.dataTables.min.js"></script>
    <script src="../js/dataTables.bootstrap.js"></script>
    <!--botones DataTables-->   
    <script src="../js/dataTables.buttons.min.js"></script>
    <script src="../js/buttons.bootstrap.min.js"></script>
    <script src="../boots/metisMenu/metisMenu.min.js"></script>
    <script src="../dist/js/sb-admin-2.js"></script>
    <script type="text/javascript" src="calendario/tcal.js"></script> 

    <script src="//oss.maxcdn.com/jquery.bootstrapvalidator/0.5.3/js/bootstrapValidator.min.js"></script>
    <script type="text/javascript" src="valida/valida.js"></script>
    <script src="//oss.maxcdn.com/momentjs/2.8.2/moment.min.js"></script>
    <script src="https://rawgit.com/Eonasdan/bootstrap-datetimepicker/master/src/js/bootstrap-datetimepicker.js"></script> 
    <script src="../boots/bootstrap/js/bootstrap.min.js"></script>
    <!--<script type="text/javascript" src="../js/atdRpt.js"></script>-->   
</html>
