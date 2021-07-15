<?php include ("../conexion/conexion.php");
session_start();
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

                ini_set('date.timezone','America/Mexico_City');
                $Final= date('d').'/'.date('m').'/'.date('Y');
                $Hfinal=date('H:i:s');
                unset($_SESSION['consulta']);

    $sql = "SELECT gstNmpld, gstNombr, gstApell FROM personal WHERE estado = 0 && gstNmpld != 0";
    $usua = mysqli_query($conexion2,$sql);


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
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://rawgit.com/Eonasdan/bootstrap-datetimepicker/master/build/css/bootstrap-datetimepicker.min.css"/>
    <script type="text/javascript" src="../js/atdRpt.js"></script>
    <link href="../boots/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">
    <link href="../boots/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="../css/styles.css">
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
            <?php //include("../html/atender.html");?>
            <table style="width: 100%" id="data-table-reporte" class="table table-striped table-hover"></table>
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
                                    <div class="alert alert-success text-center padding" style="display:none; color: white;" id="echo">
                                    <p>Contraseña actualizada</p>
                                    </div>

                                    <div class="alert alert-info text-center padding" style="display:none; color: white;" id="invalida">
                                    <p>Comprobación de contraseña no coicide</p>
                                    </div>

                                    <div class="alert alert-danger text-center padding" style="display:none; color: white;" id="falso">
                                    <p>Contraseña incorrecta</p>
                                    </div>

                                    <div class="alert alert-warning text-center padding" style="display:none; color: white;" id="vacio">
                                    <p>Debes escribir contenido en el campo vacio</p>
                                    </div>

                                    <div class="alert alert-danger text-center padding" style="display:none; color: white;" id="error">
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
            <!-- </div> -->            
                    <div class="form-group">
                    <div class="col-sm-offset-0 col-sm-5">
                        <button type="button" class="btn btn-primary" onclick="actualizar();">Actualizar</button>
                        <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Salir</button> -->
                </div></div></div>
            </div>
            </div>
        </div>
    </div>
</form>  


<form class="form-horizontal" action="" method="POST">
    <div class="modal fade" id="modalAtndr" class="col-xs-12 .col-md-12"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">

<div class="modal-dialog width" role="document">
<div class="modal-content">
<div class="modal-header">
<!--<button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="limpiarCampo()"><span style="color: black"  aria-hidden="true">&times;</span>
</button>-->
<button type="button" onclick="location.href='./'" class="close" data-dismiss="modal" aria-label="Close" ><span style="color: black"  aria-hidden="true">&times;</span></button>

<h4 class="modal-title" id="exampleModalLabel"><p>

<!--<a style="color: blue" href='#' type='button' data-toggle='modal' data-target='#modalVal' style='width:100%'>Favor de validar, ¿el equipo de cómputo pertenece al usuario?</a>-->

</p><input type="hidden" id="idequipo">
Atender reporte
</h4> 
</div>
            <div class="modal-body">
                <input type="hidden" id="id_usuario" name="id_usuario" value="<?php echo $_SESSION['usuario']['id_tecnico'];?>">
                <input type="hidden" id="opcion" name="opcion" value="atender">
                    <div class="form-group">                    
                    <div class="col-sm-3">
                    <label>N° reporte</label>
                    <input id="n_reporte" name="n_reporte" type="text" class="form-control" disabled="">
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
                    
                    <p id="divp">
                    ¿Es correcta la descripción del problema que selecciono el usuario?
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
                    <label>Tipo de servicio</label>
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
 -->            <input id="solucion" type="text" class="form-control" disabled="">
                    </div>

                    <div class="col-sm-4">
<!--                     <label>Intervención</label>
 -->             <input id="ultima" type="text" class="form-control" disabled="">
                    </div>                    

                    <div class="col-sm-4">
<!--                     <label>Descripción</label>
 -->               <input id="final" type="text" class="form-control" disabled="">
                    </div>

                    <input type="hidden" name="rspst" id="rspst" value="SI">

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
                    <textarea onkeyup="mayus(this);" id="falla_interna" name="falla_interna" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
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
                    <textarea onkeyup="mayus(this);" id="falla_xterna" name="falla_xterna" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                    </div>
                    </div>                    

                    <div class="form-group">
                    <div class="col-sm-4">
                    <label> Fecha reporte</label>
                    <input id="finicio" name="finicio" type="text" class="form-control"  disabled="">
                    </div>
                    <div class="col-sm-4">
                    <label> Fecha finalizada</label>
                    <input type="text" value="<?php echo $Final.' a las '.$Hfinal.' hrs'?>" class="form-control"  disabled="">
                    </div>

                    <div class="col-sm-4">
                    <label>Estado del reporte</label>
                    <select class="form-control" selected="true" id="estado_rpt" name="estado_rpt">
                    <option value="Por atender">Por atender</option>
                    <option value="Finalizado" >Finalizado</option>
                    <option value="Pendiente" >Pendiente</option>
                    <option value="Cancelado" >Cancelado</option> 
                    </select>                                
                    </div>

                    </div> 


            <div class="form-group"><br>
            <div class="col-sm-offset-0 col-sm-5">
            <button type="button" id="button" class="btn btn-green" onclick="atdRpt();">Aceptar</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">Salir</button>

            </div>
            <b><p class="alert alert-danger text-center padding error" id="errors">Error al agregar datos de solicitud </p></b>

            <b><p class="alert alert-danger text-center padding error" id="pndnt">¡El reporte está Por atender! </p></b>

            <b><p class="alert alert-info text-center padding exito" id="procso">¡El reporte está Pendiente!</p></b>

            <b><p class="alert alert-success text-center padding error" id="canclado">¡El reporte se ha cancelado !</p></b>

            <b><p class="alert alert-success text-center padding exito" id="exitos">¡El reporte ha finalizado  !</p></b>
            
            <b><p class="alert alert-warning text-center padding aviso" id="vacios">Llene campos vacíos</p></b>
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
                    <textarea onkeyup="mayus(this);" id="falla_interna" name="falla_interna" class="form-control" id="exampleFormControlTextarea1" rows="3"  disabled=""></textarea>
                    </div>
                    </div>
                    
                    <div class="form-group" id="falla">
                    <div class="col-sm-12">
                    <label> Respuesta externa de la falla</label>
                    <textarea onkeyup="mayus(this);" id="falla_xterna" name="falla_xterna" class="form-control" id="exampleFormControlTextarea1" rows="3"  disabled=""></textarea>
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



<form class="form-horizontal" action="" method="POST">
    <div class="modal fade" id="modalVal" class="col-xs-12 .col-md-12"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">

<div class="modal-dialog width" role="document" style="/*margin-top: 7em;*/">
<div class="modal-content">
<div class="modal-header">

<button type="button" onclick="location.href='./'" class="close" data-dismiss="modal" aria-label="Close" ><span style="color: black"  aria-hidden="true">&times;</span></button>
<!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span style="color: black"  aria-hidden="true">&times;</span>
</button> -->

<h4 class="modal-title" id="exampleModalLabel">
Favor de validar y agregar datos del  equipo </h4>  
</div>
            <div class="modal-body">
                <input type="hidden" id="id_equipo" name="id_equipo">
                <input type="hidden" id="opcion" name="opcion" value="actualizar">

<!--                     <div class="form-group">
                    <div class="col-sm-12">
                    <label>
                    ¿el equipo de cómputo pertenece al usuario?
                    Seleccione usuario a quien pertenece el equipo </label>            
                    </div>              
                    <div class="col-sm-8">
                    <select style="width: 100%" class="form-control" class="selectpicker" id="n_empleado" name="n_empleado" type="text" data-live-search="true">
                    <option selected>Seleccione usuarion</option> 
                    <?php //while($usuario = mysqli_fetch_row($usua)):?>
                    <option value="<?php //echo $usuario[0]?>"><?php //echo $usuario[1].' '.$usuario[2]?></option>
                    <?php //endwhile; ?>
                    </select>
                    </div>
                    <div class="col-sm-4">
                    <select class="form-control" name="asignado" id="asignado">
                    <option value="0">Eleija Opción</option>
                    <option value="asignado">Pertenece</option>
                    <option value="designado">No pertenece</option>
                    </select>
                    </div>                    
                    </div> -->

                    <div class="form-group">                    
                    <div class="col-sm-4">
                    <label>Número sigctic</label>
                    <input id="num_sigtic" name="num_sigtic" type="text" class="form-control" class="disabled">
                    </div>
                    <div class="col-sm-4">
                    <label>Numero de inventario</label>
                    <input id="num_invntraio" name="num_invntraio" type="text" class="form-control">
                    </div>                    
                    <div class="col-sm-4">
                    <label>Serie</label>
                    <input id="serie_cpu" name="serie_cpu" type="text" class="form-control">
                    </div>        
                    </div>
                    <div class="form-group">
                    <div class="col-sm-4">
                    <label>Modelo</label>
                    <input id="nombre_equipo" name="nombre_equipo" type="text" class="form-control">
                    </div> 
                    <div class="col-sm-4">
                    <label>Tipo del equipo</label>
                    <select  class="form-control" class="selectpicker" id="tipo_equipo" name="tipo_equipo" type="text" data-live-search="true">
                    <option value="0">Seleccione tipo equipo</option> 
                    <option value="LAP TOP ">LAP TOP </option>
                    <option value="ESCRITORIO">ESCRITORIO</option>
                    </select>
                    </div>
                    <div class="col-sm-4">
                    <label>Marca</label>    
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
                    <label>Versión Windows</label>
                    <select class="form-control" selected="true" id="version_windows" name="version_windows">                   
                    <option value="" selected>SELECCIONE</option>
                    <option value="WINDOWS 7" >WINDOWS 7</option>
                    <option value="WINDOWS 10" >WINDOWS 10</option>
                    <option value="LINUX" >LINUX</option> 
                    </select>                                
                    </div>
                    <div class="col-sm-offset-0 col-sm-3">
                    <label>Versión office</label>
                    <select class="form-control" selected="true" id="version_office" name="version_office">                   
                    <option value="" selected>SELECCIONE</option>
                    <option value="2016" >2016</option>
                    <option value="2010" >2010</option>
                    <option value="OTROS" >OTROS</option> 
                    </select>                                
                    </div>
                    <div class="col-sm-3">
                    <label>Procesador</label>       
                    <select class="form-control" selected="true" id="procesador" name="procesador">                   
                    <option value="" selected>SELECCIONE</option>
                    <option value="INTEL" >INTEL</option>
                    <option value="AMED" >AMED</option>
                    </select> 
                    </div>
                    <div class="col-sm-3">
                    <label>Velocidad del procesador</label>
                    <input id="velocidad_proc" name="velocidad_proc" type="text" class="form-control">
                    </div>
                     </div>   
                    <div class="form-group">
                    <div class="col-sm-4">
                    <label>Capacidad de disco duro</label>             
                    <select class="form-control" selected="true" id="disco_duro" name="disco_duro">                   
                    <option value="" selected>SELECCIONE</option>
                    <option value="250 GB" >250 GB</option>
                    <option value="320 GB" >320 GB</option>
                    <option value="500 GB" >500 GB</option>
                    <option value="1 TB" >1 TB</option>
                    </select> 
                    </div>
                    <div class="col-sm-4">
                    <label>Capacidad de memoria RAM</label>
                    <input id="memoria_ram" name="memoria_ram" type="text" class="form-control">
                    </div>                         
                    <div class="col-sm-4">
                    <label>Unidad de disco flash</label>
                    <input id="uni_disc_flax" name="uni_disc_flax" type="text" class="form-control">
                    </div>                    
                    </div>
                    <div class="form-group">
                    <div class="col-sm-4">
                    <label>Serie monitor</label>
                    <input id="serie_monitor" name="serie_monitor" type="text" class="form-control" >
                    </div>                                        
                    <div class="col-sm-4">
                    <label>Serie teclado</label>
                    <input id="serie_teclado" name="serie_teclado" type="text" class="form-control"  >
                    </div>
                    <div class="col-sm-4">
                    <label>Serie mouse</label>
                    <input id="serie_mouse" name="serie_mouse" type="text" class="form-control" >
                    </div> 
                    </div>
                    <div class="form-group">         
                    <div class="col-sm-4">
                    <label>Dirección IP</label>
                    <input id="direccion_ip" name="direccion_ip" type="text" class="form-control" >
                    </div>
                    <div class="col-sm-4">
                    <label>Servicio internet</label>
                    <input id="servicio_internet" name="servicio_internet" type="text" class="form-control" >
                    </div>                    
                    <div class="col-sm-4">
                    <label>Ubicación del equipo</label>
                    <select  class="form-control" class="selectpicker" name="ubicaeqpo" id="ubicaeqpo" type="text" data-live-search="true">
                    <option value="0">Selecione</option> 
                    <option value="Planta baja / vus">Planta baja / vus</option>
                    <option value="Piso m2">Piso m2</option>
                    <option value="Piso 1">Piso 1</option>
                    <option value="Piso 2">Piso 2</option>
                    <option value="Piso 3">Piso 3</option>
                    <option value="Piso 4">Piso 4</option>
                    <option value="Piso 7">Piso 7</option>
                    </select>
                    </div>
                    </div>


                    <div class="form-group"><br>
                    <div class="col-sm-offset-0 col-sm-5">
                    <button type="button" id="button" class="btn btn-green" onclick="agrEqpo();">Aceptar</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Salir</button>
                    </div>
                    <b><p class="alert alert-danger text-center padding error" id="danger">Error al agregar datos del equipo </p></b>

                    <b><p class="alert alert-success text-center padding exito" id="success">¡Se agregaron los datos con éxito!</p></b>

                    <b><p class="alert alert-warning text-center padding aviso" id="empty">Es necesario agregar los datos que se solicitan </p></b>
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

    <script src="../js/mayu.js" ></script>
    <script src="../js/buttons.bootstrap.min.js"></script>
    
    <script type="text/javascript" src="calendario/tcal.js"></script> 

    <script src="//oss.maxcdn.com/jquery.bootstrapvalidator/0.5.3/js/bootstrapValidator.min.js"></script>
    <script type="text/javascript" src="valida/valida.js"></script>
    <script src="//oss.maxcdn.com/momentjs/2.8.2/moment.min.js"></script>
    <script src="https://rawgit.com/Eonasdan/bootstrap-datetimepicker/master/src/js/bootstrap-datetimepicker.js"></script> 

<link rel="stylesheet" type="text/css" href="../boots/bootstrap/css/select2.css">
<script type="text/javascript">
$(document).ready(function(){
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
<script type="text/javascript">
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
        -- TIMESTAMPDIFF( HOUR, reporte.hinicio, NOW()) AS tiempo_transcurrido
		IF(reporte.hfinal = 00-00-00, TIMESTAMPDIFF( HOUR, reporte.finicio, NOW()), TIMESTAMPDIFF(HOUR, reporte.finicio, reporte.ffinal)) AS FechaFinal
		FROM usuarios 
		LEFT JOIN reporte ON usuarios.n_empleado = reporte.n_empleado
		WHERE  reporte.idtec = '$idtecnico'";
	$resultado = mysqli_query($conexion, $query);
        while($data = mysqli_fetch_array($resultado)){
            $fila = $idtecnico;
            $nombre = '';
            $apellidos = ''; 
               // ini_set('date.timezone','America/Mexico_City');
               //  $Final= date('d').'/'.date('m').'/'.date('Y');

            $final = $data['ftermino'];
            $inicio = $data['finicio'];


            if($data['FechaFinal'] <= 5){
                $tTotal = "<span title='A tiempo' style='background-color: green;' class='badge'>".$data['FechaFinal']." hrs</i></span>";
            } else if($data['FechaFinal'] >= 6 ){
                $tTotal = "<span title='Fuera de tiempo' style='background-color: black;' class='badge'>".$data['FechaFinal']." hrs</span>";
            } else if($data['FechaFinal'] >= 10 ){
                $tTotal = "<span title='Fuera de tiempo' style='background-color: red;' class='badge'>".$data['FechaFinal']." hrs</span>";
            } 
            
  $actual = date('d/m/Y');

if($inicio==$actual || $data['estado_rpt'] == 'Por atender' || $data['estado_rpt'] == 'Pendiente' || $data['evaluacion']=='CANCELADO'){
        ?>
    
    ["<?php echo  $data['n_reporte']?>","<?php echo $data['nombre'] . " " . $data['apellidos'] ?>","<?php echo $data['ubicacion']?>","<?php echo $data['extension']?>","<?php echo $inicio?>","<?php echo $final?>","<?php echo $tTotal ?>","<?php if($data['estado_rpt'] == 'Por atender'){
                
                // echo "<a href='' type='button' data-toggle='modal' data-target='#modalDtll' class='detalle btn btn-danger' onclick='detalle({$data['n_reporte']})' style='width:100%'>Por atender</a>";

                echo "<a href='#' type='button' data-toggle='modal' data-target='#modalAtndr' class='detalle btn btn-danger' onclick='atender({$data['n_reporte']})' style='width:70%'>{$data['estado_rpt']}</a> <a href='#' type='button' data-toggle='modal' data-target='#modalVal' class='detalle btn btn-default' onclick='atender({$data['n_reporte']})' ><i class='fa fa-desktop text-warning'></i></a>";

                    } 
                      else if($data['estado_rpt'] == 'Pendiente') {
                echo "<a href='#' type='button' data-toggle='modal' data-target='#modalAtndr' class='detalle btn btn-info' onclick='atender({$data['n_reporte']})' style='width:70%'>{$data['estado_rpt']}</a> <a href='#' type='button' data-toggle='modal' data-target='#modalVal' class='detalle btn btn-default' onclick='atender({$data['n_reporte']})' ><i class='fa fa-desktop text-warning'></i></a>";

                    }else if($data['evaluacion'] =='0' && $data['estado_rpt'] =='Cancelado'){

                echo "<a href='#' type='button' data-toggle='modal' data-target='#modalDtll' class='detalle btn btn-default' onclick='detalle({$data['n_reporte']})' style='width:70%'>Por confirmar</a> <a href='#' type='button' data-toggle='modal' data-target='#modalVal' class='detalle btn btn-default' onclick='atender({$data['n_reporte']})' ><i class='fa fa-desktop text-warning'></i></a>";

                    } else if($data['evaluacion'] == '0'){

                echo "<a href='#' type='button' data-toggle='modal' data-target='#modalDtll' class='detalle btn btn-default' onclick='detalle({$data['n_reporte']})' style='width:70%'>Por evaluar</a> <a href='#' type='button' data-toggle='modal' data-target='#modalVal' class='detalle btn btn-default' onclick='atender({$data['n_reporte']})' ><i class='fa fa-desktop'></i></a>";

                    } else if($data['estado_rpt'] == 'Finalizado'){
                echo "<a href='#' type='button' data-toggle='modal' data-target='#modalDtll' class='detalle btn btn-success' onclick='detalle({$data['n_reporte']})' style='width:70%'>{$data['estado_rpt']}</a> <a href='#' type='button' data-toggle='modal' data-target='#modalVal' class='detalle btn btn-default' onclick='atender({$data['n_reporte']})' ><i class='fa fa-desktop text-warning'></i></a>";
                    } else if($data['evaluacion']=='CANCELADO'){

                echo "<a href='#' type='button' data-toggle='modal' data-target='#modalDtll' class='detalle btn btn-warning' onclick='detalle({$data['n_reporte']})' style='width:70%'>{$data['estado_rpt']}</a> <a href='#' type='button' data-toggle='modal' data-target='#modalVal' class='detalle btn btn-default' onclick='atender({$data['n_reporte']})' ><i class='fa fa-desktop text-warning'></i></a>";
                    }
                 ?>"
],
<?php } 
}?>
];

var tableGenerarReporte = $('#data-table-reporte').DataTable({
    "language": {
    "searchPlaceholder": "Buscar datos...",
    "url": "//cdn.datatables.net/plug-ins/1.10.25/i18n/Spanish.json"
    },
        "order": [
            [7, "desc"]
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
    {title: "Tiempo"},
    {title: "Estado"}
    ],
    });

    </script>

