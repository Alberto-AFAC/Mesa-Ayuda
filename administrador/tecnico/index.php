<?php session_start();
//si la variable ssesion existe realizara las siguiente evaluacion 
if (isset($_SESSION['usuario'])) {
    //si se ha logeado evaluamos si el usuario que aya ingresado intenta acceder a este directorio no es de tipo administrador, no le es permitido el acceso .. si tipo usuario es distinto de admin , entonces no tiene nada que hacer en este directorio 
    if($_SESSION['usuario']['privilegios'] != "admin"){
        //y se redirecciona al directorio que le corresponde
        header("Location: ../../");
    }
}else{
        //si no exixte quiere decir que nadie se ha logeado y lo regsara al inicio (login)
    header('Location: ../../');
}
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

    <!-- Bootstrap Core CSS -->
    <link href="../../boots/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet"
    href="https://rawgit.com/Eonasdan/bootstrap-datetimepicker/master/build/css/bootstrap-datetimepicker.min.css" />
    <link href="../../boots/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../../dist/css/sb-admin-2.css" rel="stylesheet">
    <link href="../../boots/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="../../css/styles.css">
    <link rel="stylesheet" type="text/css" href="../../datas/dataTables.css">

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
                <?php include("../../usuarios.php");?>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <?php //include("../../php/correos.php");?>
                    <ul class="dropdown-menu dropdown-messages">
                        <li>
                            <a href="#">
                                <div>
                                    <strong>John Smith</strong>
                                    <span class="pull-right text-muted">
                                        <em>Yesterday</em>
                                    </span>
                                </div>
                                <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <strong>John Smith</strong>
                                    <span class="pull-right text-muted">
                                        <em>Yesterday</em>
                                    </span>
                                </div>
                                <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <strong>John Smith</strong>
                                    <span class="pull-right text-muted">
                                        <em>Yesterday</em>
                                    </span>
                                </div>
                                <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a class="text-center" href="#">
                                <strong>Read All Messages</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                    <!-- /.dropdown-messages -->
                </li>
                <!-- /.dropdown -->

                <!-- /.dropdown -->
                <li class="dropdown">
                    <ul class="dropdown-menu dropdown-alerts">
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-comment fa-fw"></i> New Comment
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-twitter fa-fw"></i> 3 New Followers
                                    <span class="pull-right text-muted small">12 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-envelope fa-fw"></i> Message Sent
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-tasks fa-fw"></i> New Task
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-upload fa-fw"></i> Server Rebooted
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a class="text-center" href="#">
                                <strong>See All Alerts</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                    <!-- /.dropdown-alerts -->
                </li>
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                    <!--<li><a href="#" type="button" data-toggle="modal" data-target="#modalEditar"><i class="fa fa-pencil-square-o"></i> Actualizar</a>
                    </li>-->
                    <li><a href="../../conexion/cerrar_session.php"><i class="fa fa-sign-out fa-fw"></i>Cerrar
                    Sesión</a>
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
                    <a href="../"><i class="glyphicon glyphicon-home"></i> Inicio</a>
                </li>
                <li>
                    <a href="#"><i class="glyphicon glyphicon-cog"></i> Registros<span
                        class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
<!--                             <li>
                                <a href="../area"><i class="fa fa-list-alt"></i> Areas</a>
                            </li> -->
                            <li>
                                <a href="../usuarios"><i class="fa fa-users"></i> Usuarios</a>
                            </li>
                            <li>
                                <a href="../equipo"><i class="fa fa-desktop"></i> Equipos</a>
                            </li>
                            <li>
                                <a href="./"><i class="fa fa-street-view"></i> Técnico</a>
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
        <!--<h3 class="text-center" style="border: 1px solid red;"> <small class="mensaje">123</small></h3>-->
        <div class="row">
            <div class="col-lg-12">
                <img src="../../img/afac.png" style="float: right; width: 90px;margin-top: 0.8em">
                <h1 class="page-header">Técnicos</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>

        <script src="../../js/jquery-1.12.3.min.js"></script>
        <?php

        $sql = "SELECT  gstIdper, gstNombr,gstApell FROM personal WHERE estado = 0";
        $usua = mysqli_query($conexion2,$sql);

        $sql = "SELECT  gstIdper, gstNombr,gstApell FROM personal WHERE estado = 0";
        $ausua = mysqli_query($conexion2,$sql);


        $sql = "SELECT id_area, adscripcion FROM area WHERE estado = 0";
        $aree = mysqli_query($conexion,$sql);

   //Select para horario de entrada y salida //
        $sql = "SELECT entrada, salida FROM tecnico WHERE baja = 0";
        $horario = mysqli_query($conexion,$sql);

        $sql = "SELECT id_cargo, cargo FROM cargo WHERE estado = 0";
        $cargo = mysqli_query($conexion,$sql);

        $sql = "SELECT id_cargo, cargo FROM cargo WHERE estado = 0";
        $acargo = mysqli_query($conexion,$sql);            
        ?>

        <!-- /.row -->

        <style type="text/css">
            #cuadro2,
            #Editar,
            #Detalles {
                display: none;
            }
        </style>


        <div class="row">
            <div id="cuadro1" class="col-lg-12">
                <div class="panel panel-default">
                    <div style="padding: 0;" class="panel-heading">
                        <button title="Agregar técnico" type="button" style="color:blue;" class="btn btn-default"
                        data-toggle="modal" onclick="regisTec()"><i
                        class='fa fa-street-view text-info'>+</i></button>
                        <p style="text-align: center; float: right; width:95%;" class="mensaje"></p>
                    </div>
                    <div class="panel-body" style="font-size: 12px;">
                        <table id="data-table-area" class="table table-striped table-bordered"></table>
                    </div>
                </div>
            </div>
        </div>

        <div>
            <form id="EliminarUsuario" action="" method="POST">
                <input type="hidden" id="idtec" name="idtec" value="">
                <input type="hidden" id="opcion" name="opcion" value="eliminar">
                <!-- Modal -->
                <div class="modal fade" id="modalEliminar" tabindex="-1" role="dialog"
                aria-labelledby="modalEliminarLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <!--<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>-->
                            <h4 class="modal-title" id="modalProyectoEliminarLabel">Eliminar usuario</h4>
                        </div>
                        <div class="modal-body">
                            ¿Está seguro de eliminar este usuario? <strong data-name=""></strong>
                            <!--<input id="nombre" name="nombre" />-->
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary"
                            data-dismiss="modal" onclick="eliminar_usuario()">Aceptar</button>
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal -->
        </form>

        <style type="text/css">
            #frmDetalles input,
            textarea {
                border: 1px solid transparent;
            }
        </style>



        <form id="Detalles" class="form-horizontal" action="" method="POST">
            <div id="frmDetalles" class="col-sm-12 col-md-12 col-lg-12" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel">
            <div class="modal-dialog-modi" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></a></button> -->
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><a
                            href="./" style="color: black"><span style="color: black;"
                            aria-hidden="true"
                            class="glyphicon glyphicon-share-alt"></span></a></button>
                            <h4 class="modal-title" id="exampleModalLabel">Información del usuario y sus equipos
                            de computo </h4>
                        </div>
                        <div class="modal-body">
                            <div class="col-sm-offset-1 col-sm-10">
                            </div>
                            <input type="hidden" id="id_usuario" name="id_usuario">
                            <input type="hidden" id="opcion" name="opcion" value="modificar">

                            <div class="form-group">
                            <div class="col-sm-offset-0 col-sm-4" >
                            <label for="Nombre">Nombre</label>
                            <input id="nombre" name="nombre" type="text"  class="form-control" disabled="">
                            </div>
                            <div class="col-sm-offset-0 col-sm-4" >
                            <label for="Correo">Correo</label>
                            <input id="correo" name="correo" type="text"  class="form-control" disabled="">
                            </div>
                            <div class="col-sm-offset-0 col-sm-2">
                            <label for="N° empleado">N° empleado</label>
                            <input id="n_empleado" name="n_empleado" type="text" class="form-control" disabled="">
                            </div> 
                            <div class="col-sm-offset-0 col-sm-2">
                            <label for="Extension">Extension</label>
                            <input id="extension" name="extension" type="text" class="form-control" disabled="">
                            </div> 
                            </div>
                            
                            <div class="form-group">  
                            <div class="col-sm-offset-0 col-sm-3">
                            <label for="Adscripción">Cargo</label>
                            <input id="cargo" name="cargo" type="text" class="form-control" disabled="">
                            </div>  
                            <div class="col-sm-offset-0 col-sm-9">
                            <label for="Adscripción">Adscripción</label>
                            <input id="area" name="area" type="text" class="form-control" disabled="">
                            </div>
                            </div>    
                          
                            <div id="eqpos"></div>
                        </div>
                    </div>
                </div>
            </div>
        </form>



        <form class="form-horizontal" action="" method="POST" onsubmit="return tecnico(this)">
            <div id="cuadro2" class="col-sm-12 col-md-12 col-lg-12" class="modal fade" tabindex="-1"
            role="dialog" aria-labelledby="exampleModalLabel">


            <div class="modal-dialog" role="document">
                <div class="modal-content">

                    <div class="modal-header">
                        <button type="button" id="btn_listar" class="close" data-dismiss="modal"
                        aria-label="Close"><a href="./"><span style="color: black"
                            aria-hidden="true">&times;</span></a></button>


                            <div class="cerrar"><a><span class="icon-cross"></span></a></div>

                            <h4 class="modal-title" id="exampleModalLabel">Agregar Técnico</h4>

                        </div>

                        <div class="modal-body">
                            <!-- <input type="hidden" id="opcion" name="opcion" value="registrar"> -->
                            <div class="form-group">
                                <div class="col-sm-offset-0 col-sm-8">
                                    <label>Nombre personal</label>
                                    <select style="width: 100%" class="form-control" class="selectpicker"
                                    name="idusu" id="idusu" type="text" data-live-search="true">
                                    <option value="">SELECCIONE OPCIÓN </option>
                                    <?php while($rio = mysqli_fetch_row($usua)):?>
                                        <option value="<?php echo $rio[0]?>"><?php echo $rio[1].' '.$rio[2]?>
                                    </option>
                                <?php endwhile; ?>
                            </select>
                        </div>

                        <div class="col-sm-offset-0 col-sm-4">
                            <label>Especialidad </label>
                            <select style="width: 100%" class="form-control" class="selectpicker"
                            name="privilg" id="privilg" type="text" data-live-search="true">
                            <option selected>Seleccione</option>
                            <option value="tecnico">Técnico</option>
                        </select>
                    </div>

                </div>
                <div class="form-group">
                    <div class="col-sm-offset-0 col-sm-6">
                        <label for="usuario">Usuario</label>
                        <input id="usuario" name="usuario" type="text" class="form-control">
                    </div>
                    <div class="col-sm-offset-0 col-sm-6">
                        <label for="password">Contraseña</label>
                        <input id="password" name="password" type="password" class="form-control">
                        <!-- <span toggle="#password" class="fa fa-fw fa-eye field-icon toggle-password"></span> -->
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-0 col-sm-6">
                        <label>Entrada</label>
                        <select style="width: 100%" class="form-control" class="selectpicker"
                        name="entrada" id="entrada" type="text" data-live-search="true">
                        <option selected>Seleecione una opción</option>
                        <option value="08:00:00">08:00:00</option>
                        <option value="09:00:00">09:00:00</option>
                    </select>
                </div>
                <div class="col-sm-offset-0 col-sm-6">
                    <label>Salida</label>
                    <select style="width: 100%" class="form-control" class="selectpicker"
                    name="salida" id="salida" type="text" data-live-search="true">
                    <option selected>Seleecione una opción</option>
                    <option value="18:00:00">18:00:00</option>
                </select>
            </div>
        </div>

        <div class="form-group"><br>
            <div class="col-sm-offset-0 col-sm-2">
                <button type="button" id="button" class="btn btn-block btn-primary"
                onclick="tecnico();">Aceptar</button>
            </div>
            <b>
                <p class="alert alert-danger text-center padding error" id="danger">El técnico ya esta agregado </p>
            </b>

            <b>
                <p class="alert alert-success text-center padding exito" id="exito">¡Se agrego técnico con éxito!</p>
            </b>

            <b>
                <p class="alert alert-warning text-center padding aviso" id="vacio">Llene campos vacíos</p>
            </b>
        </div>

    </div>

</div>
</div>
</div>
</form>


<form id="Editar" class="form-horizontal" action="" method="POST">

    <div id="frmEditar" class="col-sm-12 col-md-12 col-lg-12" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel">

    <div class="modal-dialog" role="document">
        <div class="modal-content">

         <div class="modal-header">
                        <button type="button" id="btn_listar" class="close" data-dismiss="modal"
                        aria-label="Close"><a href="./"><span style="color: black"
                            aria-hidden="true">&times;</span></a></button>


                            <div class="cerrar"><a><span class="icon-cross"></span></a></div>

                            <h4 class="modal-title" id="exampleModalLabel">Actualizar Técnico</h4>

                        </div>
                            <div class="modal-body">

         
                            <input type="hidden" id="idtec" name="idtec">
                            <div class="form-group">
                                <div class="col-sm-offset-0 col-sm-8">
                                    <label>Nombre</label>
                                    <select style="width: 100%" class="form-control" class="selectpicker"
                                    name="aidusu" id="aidusu" type="text" data-live-search="true" disabled="">
                            
                                    <?php while($ario = mysqli_fetch_row($ausua)):?>
                                        <option value="<?php echo $ario[0]?>" selected><?php echo $ario[1].' '.$ario[2]?>
                                    </option>
                                <?php endwhile; ?>
                            </select>
                        </div>

                        <div class="col-sm-offset-0 col-sm-4">
                            <label>Especialidad </label>
                            <select style="width: 100%" class="form-control" class="selectpicker"
                            name="aprivilg" id="aprivilg" type="text" data-live-search="true">                         
                            <option value="tecnico">Técnico</option>
                        </select>
                    </div>

                </div>
                <div class="form-group">
                    <div class="col-sm-offset-0 col-sm-6">
                        <label for="usuario">Usuario</label>
                        <input id="ausuario" name="ausuario" type="text" class="form-control">
                    </div>
                    <div class="col-sm-offset-0 col-sm-6">
                        <label for="password">Contraseña</label>
                        <input id="apassword" name="apassword" type="password" class="form-control">
                        <!-- <span toggle="#password" class="fa fa-fw fa-eye field-icon toggle-password"></span> -->
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-0 col-sm-6">
                        <label>Entrada</label>
                        <select style="width: 100%" class="form-control" class="selectpicker"
                        name="aentrada" id="aentrada" type="text" data-live-search="true">
                        <option value="0">Seleecione una opción</option>
                        <option value="08:00:00">08:00:00</option>
                        <option value="09:00:00">09:00:00</option>
                    </select>
                </div>
                <div class="col-sm-offset-0 col-sm-6">
                    <label>Salida</label>
                    <select style="width: 100%" class="form-control" class="selectpicker"
                    name="asalida" id="asalida" type="text" data-live-search="true">
                    <option value="0">Seleecione una opción</option>
                    <option value="18:00:00">18:00:00</option>
                </select>
            </div>
        </div>


                <div class="form-group">
                    <div class="col-sm-offset-0 col-sm-4">
                        <label>Actividades</label>
                        <select style="width: 100%" class="form-control" class="selectpicker"
                        name="activo" id="activo" type="text" data-live-search="true">
                        <option>Seleecione</option>
                        <option value="0">Activo</option>
                        <option value="1">Inactivo</option>
                    </select>
                </div>
                <div class="col-sm-offset-0 col-sm-8">
                    <label>Razón</label>
                    <select style="width: 100%" class="form-control" class="selectpicker"
                    name="observ" id="observ" type="text" data-live-search="true">
                    <option value="x">Seleecione</option>
                    <option value="VACACIONES">VACACIONES</option>
                    <option value="MEDICO">MEDICO</option>
                    <option value="ASUNTO PERSONAL">ASUNTO PERSONAL</option>
                </select>
            </div>
        </div>


        <div class="form-group"><br>
            <div class="col-sm-offset-0 col-sm-2">
                <button type="button" id="button" class="btn btn-block btn-primary"
                onclick="modificar();">Aceptar</button>
            </div>
<!--             <b>
                <p class="alert alert-danger text-center padding error" id="danger">El técnico ya esta agregado </p>
            </b> -->

            <b>
                <p class="alert alert-success text-center padding exito" id="exitos">¡Se actualizo técnico con éxito!</p>
            </b>

            <b>
                <p class="alert alert-warning text-center padding aviso" id="vacios">Llene campos vacíos</p>
            </b>
        </div>

  


</div>
</div>
</div>
</div>
</form>
</div>

</div>
<!-- /.row -->
</div>
<!-- /#page-wrapper -->

<!-- /#wrapper -->
</body>


<!--<script src="js/jquery-1.12.3.js"></script>-->
<script src="../../js/bootstrap.min.js"></script>
<script src="../../js/jquery.dataTables.min.js"></script>
<script src="../../js/dataTables.bootstrap.js"></script>
<!--botones DataTables-->
<!-- <script src="../../js/dataTables.buttons.min.js"></script>
<script src="../../js/buttons.bootstrap.min.js"></script> -->
<!--Libreria para exportar Excel-->
<script src="../../js/jszip.min.js"></script>
<!--Librerias para exportar PDF-->
<script src="../../js/pdfmake.min.js"></script>
<script src="../../js/vfs_fonts.js"></script>
<!--Librerias para botones de exportación-->
<script src="../../js/buttons.html5.min.js"></script>

<script src="../../boots/metisMenu/metisMenu.min.js"></script>
<script src="../../dist/js/sb-admin-2.js"></script>
<!--    <script type="text/javascript" src="calendario/tcal.js"></script> -->

<script src="//oss.maxcdn.com/jquery.bootstrapvalidator/0.5.3/js/bootstrapValidator.min.js"></script>
<!--    <script type="text/javascript" src="valida/valida.js"></script>-->
<script src="//oss.maxcdn.com/momentjs/2.8.2/moment.min.js"></script>
<script src="https://rawgit.com/Eonasdan/bootstrap-datetimepicker/master/src/js/bootstrap-datetimepicker.js"></script>
<script type="text/javascript" src="../../js/tecnico.js"></script>

<link rel="stylesheet" type="text/css" href="../../boots/bootstrap/css/select2.css">
<script type="text/javascript">
    $(document).ready(function() {
        $('#idusu').select2();
        //$('#aidusu').select2();
        $('#idarea').select2();
        $('#hora').select2();
    });
//show password and hide
$(".toggle-password").click(function() {

    $(this).toggleClass("fa-eye fa-eye-slash");
    var input = $($(this).attr("toggle"));
    if (input.attr("type") == "password") {
        input.attr("type", "text");
    } else {
        input.attr("type", "password");
    }
});
</script>
<script src="../../js/select2.js"></script>


<script type="text/javascript">
    $(document).on("ready", function() {
//ocultar();
});

    var dataSet = [
    <?php
        $query = "SELECT * FROM tecnico 
        WHERE baja = 0";
        $resultado = mysqli_query($conexion, $query);
        while($data = mysqli_fetch_array($resultado)){
           $idusu = $data['id_usu'];
            $horario = $data['entrada'].' a '.$data['salida']; 
            $usuario = $data['usuario'];
            $idtec = $data['id_tecnico'];


        $queri = "SELECT * FROM personal 
            WHERE gstIdper = $idusu AND estado = 0 ORDER BY gstIdper ASC";
    $resultados = mysqli_query($conexion2,$queri);
    while($data = mysqli_fetch_array($resultados)){
       $id = $data['gstIdper'];
       $nombre = $data['gstNombr'].' '.$data['gstApell'];



       ?>

       ['<?php echo $id;?>', '<?php echo $nombre ?>',
       '<?php echo 'Pendiente'?>', '<?php echo $usuario?>', '<?php echo $horario?>', "<?php 

// echo "<a href='javascript:openEdt1()' onclick='aredit({$id})' class='detalle btn btn-default'><i class='fa fa-pencil-square-o text-info'></i></a> <button type='button' class='eliminar btn btn-default' data-toggle='modal' data-target='#modalEliminar' onclick='eliminar({$id})'><li class='fa fa-trash-o text-danger'></li></button> ";

       echo "<a title='Editar técnico' type='button' data-target='#frmEditar' onclick='datos_editar({$id})' class='editar btn btn-default'><i class='fa fa-pencil-square-o text-info'></i></a>  <a title='Detalles técnico' type='button' data-target='#frmDetalles' onclick='datos_detalle({$id})' class='detalle btn btn-default'><i class='glyphicon glyphicon-user text-silver'></i></a> <a title='Dar de baja técnico' type='button' class='eliminar btn btn-default' data-toggle='modal' data-target='#modalEliminar' onclick='datos_eliminar({$idtec})' ><i class='fa fa-trash-o text-danger'></i></a>";


       ?>"


       ],
   <?php } 
}
   ?>
   ];

   var tableGenerarReporte = $('#data-table-area').DataTable({
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
        title: "ID"
    },
    {
        title: "NOMBRE"
    },
    {
        title: "PRIVILEGIOS"
    },
    {
        title: "USUARIO"
    },
    {
        title: "HORARIO"
    },
    {
        title: "ACCIÓN"
    }
    ],
});
</script>

</html>
<!-- <a title='Restablecer contraseña' type='button' data-target='#frmEditar' onclick='datos_editar({$id})' class='editar btn btn-default'><i class='fa fa-lock text-warning'></i></a> -->
<!-- <a href='#' type='button' data-toggle='modal' data-target='#modalVal' class='detalle btn btn-default' onclick='atender({$id})' ><i class='fa fa-desktop'></i></a> -->