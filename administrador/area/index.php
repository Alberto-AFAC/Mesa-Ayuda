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

        //$idu = $_SESSION['usuario']['id_usuario'];
       $idu = $_SESSION['usuario']['id_usu'];
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Sistema</title>
    <link href="../../boots/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../../dist/css/sb-admin-2.css" rel="stylesheet">
    <link href="../../boots/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://rawgit.com/Eonasdan/bootstrap-datetimepicker/master/build/css/bootstrap-datetimepicker.min.css"/>
    <link rel="stylesheet" type="text/css" href="../../css/styles.css">
    <script type="text/javascript" src="../../js/funciones.js"></script>
    <script type="text/javascript" src="../../js/area.js"></script>
    <link rel="stylesheet" type="text/css" href="../../datas/dataTables.css">
    <script src="//cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
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
                   <?php// include("../../php/correos.php");?>
                    <ul class="dropdown-menu dropdown-messages">
                        <li>
                            <a href="#">
                                <div>
                                    <strong>John Smith</strong>
                                    <span class="pull-right text-muted">
                                        <em>Yesterday</em>
                                    </span>
                                </div>
                                <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...</div>
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
                                <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...</div>
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
                                <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...</div>
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
                        <li><a href="../../conexion/cerrar_session.php"><i class="fa fa-sign-out fa-fw"></i>Cerrar Sesión</a>
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
                            <a href="#"><i class="glyphicon glyphicon-cog"></i> Registros<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="./"><i class="fa fa-list-alt"></i> Areas</a>
                                </li>
                            <li>
                                    <a href="../usuarios"><i class="glyphicon glyphicon-user"></i> Usuarios</a>
                            </li>
                            <li>
                                    <a href="../equipo"><i class="fa fa-desktop"></i> Equipos</a>
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
            <img src="../../img/afac.png">
                    <h1 class="page-header">Area</h1>                    
                </div>
            </div>

            <div class="row">
                <div id="list" class="col-lg-12">
                    <div class="panel panel-info">                  
                        <div class="panel-heading padding">
                        <b><p style=" padding-top: 0.4em; text-align: center; float: right; width:90%;" class="mensaje"></p></b> 
                                <div class="panel-heading padding">
                                    <button type="button" class="btn btn-default" data-toggle="modal" onclick="openConteiner()"><i class="glyphicon glyphicon-plus"></i> Agregar</button>                                    
                                    <!--<span class="fa fa-refresh"></span>-->
                                 </div>
                            <div class="col-lg-12">
                                                                 <br>        

                                <?php //include("../../html/datas.html");?>
                                <table id="data-table-area" class="table table-striped table-hover"></table>

                            </div>
                        </div>
                    </div>
                </div>
            </div>


        <link rel="stylesheet" type="text/css" href="../../boots/bootstrap/css/select2.css">
        <script src="../../js/jquery-1.12.3.min.js"></script>
        <script src="../../js/select2.js"></script>
        <?php include('../../php/repCons.php');?>    
         <!-- /.row -->

<form class="form-horizontal" action="" method="POST" id="Fregist" onsubmit="return registrar(this)">
    <div class="col-sm-12 col-md-12 col-lg-12" class="modal fade" id="ProyectoRegistrar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content" >
                <div class="modal-header">
                <button type="button" onclick="location.href='./'" class="close" data-dismiss="modal" aria-label="Close" ><span style="color: black"  aria-hidden="true">&times;</span></button>
                <div class="cerrar"><a ><span class="icon-cross"></span></a></div>
                <h4 class="modal-title" id="exampleModalLabel">Agregar</h4>
                </div>
                <div class="modal-body">
                <input type="hidden" id="opcion" name="opcion" value="registrar">            
                <div class="form-group">
                <div class="col-sm-offset-1 col-sm-10">
                <label for="identificador">Identificador:</label>
                <input id="identificador" name="identificador" type="text" class="form-control">
                </div>
                </div>    
                <div class="form-group">
                <div class="col-sm-offset-1 col-sm-10">
                <label for="adscripcion">Area:</label>
                <input id="adscripcion" name="adscripcion" type="text" class="form-control">
                </div>
                </div>
                <div class="form-group">
                <div class="col-sm-offset-1 col-sm-10">
                <label for="id_area">Pertenece A:</label>
                <select style="width: 100%;"  class="form-control" class="selectpicker" name="id_area" id="id_area" type="text" data-live-search="true">
                <option selected></option> 
                <option value="0">Único</option>
                <?php while($rea = mysqli_fetch_row($are)):?>
                <option value="<?php echo $rea[0]?>"><?php echo $rea[1]?></option>
                <?php endwhile; ?>
                </select>
                </div>
                </div>
                <div class="form-group"><br>
                <div class="col-sm-offset-1 col-sm-5">
                <button type="button" class="btn btn-primary" onclick="registrar();">Guardar</button>
                <button type="reset" class="btn btn-primary" id="boton">Vaciar</button>
                </div>
                <b><p class="alert alert-danger text-center padding error" id="error">El area ya esta registrada</p></b>
                <b><p class="alert alert-success text-center padding exito" id="exito">Area registrada</p></b>
                <b><p class="alert alert-warning text-center padding aviso" id="vacio">Llene campos vacíos</p></b>
                </div>
                </div>   
            </div>
        </div>
    </div>
</form>

<script type="text/javascript">
    $(document).ready(function(){
            $('#id_area').select2();
    });
    $(document).ready(function(){
            $('#idarea').select2();
    });
    $(document).ready(function(){
            $('#idareas').select2();
    });
</script>

<form id="AreaEliminar" action="" method="POST">
    <input type="hidden" id="id_area" name="id_area" value="">
    <input type="hidden" id="opcion" name="opcion" value="eliminar">
    <div class="modal fade" id="modalEliminar" tabindex="-1" role="dialog" aria-labelledby="modalEliminarLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="modalProyectoEliminarLabel">Eliminar area</h4>
                </div>
                <div class="modal-body">                            
                    ¿Está seguro de eliminar esta area? <strong data-name=""></strong>           
                </div>
                <div class="modal-footer">
                    <button type="button" onclick="eliminararea();" class="btn btn-primary" data-dismiss="modal">Aceptar</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                </div>
            </div>
        </div>
    </div>
</form>

<style type="text/css">
#frmDetalles input,textarea{ border: 1px solid transparent; }
</style>

<form id="frmDetalles" class="form-horizontal" action="" method="POST" >
    <div style="background:white;" id="det1" class="col-sm-12 col-md-12 col-lg-12" class="modal fade" id="modalDetalles" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
        <div class="row">
            <div class="col-sm-offset-1 col-sm-10">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="closeDet1()"><span style="color: black"  aria-hidden="true">&times;</span>
            </button>
            <h4 class="modal-title" id="exampleModalLabel"></h4>
            </div>
                <input type="hidden" id="id_area" name="id_area">
                <input type="hidden" id="opcion" name="opcion" value="modificar">
                    <div class="col-sm-offset-0 col-sm-11" >
                    <b><input id="adscripcion" style="font-size:17px" name="adscripcion" type="text"  class="form-control"></b>
                    </div>   
             <div class="col-sm-offset-0 col-sm-11" >
                <div id="datos" ></div>
            </div>
        </div>
    </div>
</form>

<form id="Detalles" class="form-horizontal" action="" method="POST" >
    <div style="background:white;" id="det2" class="col-sm-12 col-md-12 col-lg-12" class="modal fade" id="modalDetalles" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
        <div class="row">
            <div class="col-sm-offset-1 col-sm-10">
            <button type="button" id="btn_listar" class="close" data-dismiss="modal" aria-label="Close" onclick="closeDet2()"><span style="color: black"  aria-hidden="true">&times;</span>
            </button>
            <h4 class="modal-title" id="exampleModalLabel"></h4>
            </div>
                <input type="hidden" id="id_area" name="id_area">
                <input type="hidden" id="opcion" name="opcion" value="modificar">
                <div class="col-sm-offset-0 col-sm-11" >
                    <b><input id="adscripcion" style="font-size:17px" name="adscripcion" type="text"  class="form-control"></b>
                </div>
            <div class="col-sm-offset-0 col-sm-11" >
                <div id="listareas" ></div>
            </div>
        </div>
    </div>
</form>


<form id="EditarArea" class="form-horizontal" action="" method="POST" >
    <div id="edt1" class="col-sm-12 col-md-12 col-lg-12" class="modal fade" id="EditarModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
        <div class="modal-dialog-modi" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" id="btn_listar" class="close" data-dismiss="modal" aria-label="Close" onclick="closeEdt1()"><span style="color: black"  aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title" id="exampleModalLabel">Actualizar</h4>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="id_area" name="id_area" value="0">
                    <input type="hidden" id="opcion" name="opcion" value="modificar">
                    <div class="form-group">
                    <div class="col-sm-offset-1 col-sm-10">
                    <label for="identificador">Identificador</label>
                    <input id="identificador" name="identificador" type="text" class="form-control">
                    </div>
                    </div>
                    <div class="form-group">
                    <div class="col-sm-offset-1 col-sm-10">
                    <label for="adscripcion">Adscripción</label>
                    <input id="adscripcion" name="adscripcion" type="text" class="form-control">
                    </div>
                    </div>   
                    <input type="hidden" name="idarea" id="idareas" value="0">
  <!--               <div class="form-group">
                    <div class="col-sm-offset-1 col-sm-10">
                    <label for="id_area">Pertenece A:</label>
                    <select style="width: 100%;" class="form-control" class="selectpicker" name="idarea" id="idareas" type="text" data-live-search="true" value="0">
                    <option value="0">Único</option>
                    <?php while($reaed = mysqli_fetch_row($areed)):?>
                    <option value="<?php echo $reaed[0]?>"><?php echo $reaed[1]?></option>
                    <?php endwhile; ?>
                    </select>
                    </div>
                    </div> -->
                    <div class="form-group"><br>
                    <div class="col-sm-offset-1 col-sm-5">
                    <button type="button" class="btn btn-primary" onclick="editAra()">Guardar</button>
                    </div>
                    <b><p class="alert alert-danger text-center padding error" id="errore">No se pudo actualizar area</p></b>
                    <b><p class="alert alert-success text-center padding exito" id="exitoe">Area actualizada</p></b>
                    <b><p class="alert alert-warning text-center padding aviso" id="avisoe">Llene campos vacíos</p></b>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>


   <!-- <form id="AreaEditar" class="form-horizontal" action="" method="POST" >
 <div id="cuadro7" class="col-sm-12 col-md-12 col-lg-12" class="modal fade" id="EditarModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">

    <div class="modal-dialog" role="document">
    <div class="modal-content">

        <div class="modal-header">
        <button type="button" class="close" onclick="Deta();" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

        <h4 class="modal-title" id="exampleModalLabel">Actualizar</h4>
        <div class="alert alert-danger text-center" style="display:none; color:black;" id="areafallas">
        <p>Error no se pudo actualizar area</p>
        </div>
        <div class="alert alert-success text-center" style="display:none; color:black;" id="areaechos">
        <p>Area actualizada</p>
        </div>
        <div class="alert alert-warning text-center" style="display:none; color:black;" id="areavacios">
        <p>Debes escribir contenido en el campo vacio</p>
        </div>
        </div>

    <div class="modal-body">

    <input type="hidden" id="id_area" name="id_area" value="0">
    <input type="hidden" id="opcion" name="opcion" value="modificar">

    <div class="form-group">
    <div class="col-sm-offset-1 col-sm-10">
    <label for="adscripcion">Adscripción</label>
    <input id="adscripcion" name="adscripcion" type="text" class="form-control">
    </div>
    </div>   
    <input type="hidden" id="idareas" name="idarea" value="0">
    <!--<div class="form-group">
    <div class="col-sm-offset-1 col-sm-10">
    <label for="id_area">Pertenece A:</label> 
   <select  class="form-control" class="selectpicker" name="idarea" id="idareas" type="text" data-live-search="true" value="0">
    <option value="0">Único</option>
    <?php while($reaed = mysqli_fetch_row($areed)):?>
      <option value="<?php echo $reaed[0]?>"><?php echo $reaed[1]?></option>
    <?php endwhile; ?>
    </select>
    </div>
    </div>--
    <div class="form-group"><br>
    <div class="col-sm-offset-1 col-sm-5">
    <button type="button" class="btn btn-primary" onclick="actualizar_area();">Guardar</button>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </form>-->

<!--<form id="frmEditar" class="form-horizontal" action="" method="POST" >
<div id="cuadro3" class="col-sm-12 col-md-12 col-lg-12" class="modal fade" id="modalEditar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">


<div class="modal-dialog" role="document">
<div class="modal-content">

<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Close"><a href="./" style="color: black"><span aria-hidden="true">&times;</span></a></button>

<h4 class="modal-title" id="exampleModalLabel">Actualizar Area</h4>
<div class="alert alert-danger text-center" style="display:none; color:black;" id="falla">
<p>Error no se pudo actualizar area</p>
</div>
<div class="alert alert-success text-center" style="display:none; color:black;" id="echo">
<p>Area actualizada</p>
</div>
    <div class="alert alert-warning text-center" style="display:none; color:black;" id="avacio">
<p>Debes escribir contenido en el campo vacio</p>
</div>
    </div>

    <div class="modal-body">

    <input type="hidden" id="id_area" name="id_area" value="0">    
    <input type="hidden" id="opcion" name="opcion" value="modificar">

    <div class="form-group">
    <div class="col-sm-offset-1 col-sm-10">
    <label for="adscripcion">Adscripción</label>
    <input id="adscripcion" name="adscripcion" type="text" class="form-control">
    </div>
    </div>   
    <div class="form-group">
    <div class="col-sm-offset-1 col-sm-10">
    <label for="id_area">Pertenece A:</label>
   <select  class="form-control" class="selectpicker" name="idarea" id="idarea" type="text" data-live-search="true" value="0">
    <option value="0">Único</option>
    <?php while($reae = mysqli_fetch_row($aree)):?>
      <option value="<?php echo $reae[0]?>"><?php echo $reae[1]?></option>
    <?php endwhile; ?>
    </select>
    </div>
    </div>
    <div class="form-group"><br>
    <div class="col-sm-offset-1 col-sm-5">
    <button type="button" class="btn btn-primary" onclick="modificar();">Guardar</button>
    
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </form>-->

        </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->
            <!-- /#wrapper -->
</body>
    <script src="../../js/bootstrap.min.js"></script>
    <script src="../../js/jquery.dataTables.min.js"></script>
    <script src="../../js/dataTables.bootstrap.js"></script>  
    <script src="../../js/dataTables.buttons.min.js"></script>
    <script src="../../boots/metisMenu/metisMenu.min.js"></script>
    <script src="../../dist/js/sb-admin-2.js"></script>
    <script type="text/javascript">
        var dataSet = [
        <?php
      
          $query = "SELECT * FROM area WHERE estado = 0 ORDER BY id_area ASC";
             $resultado = mysqli_query($conexion, $query);
        while($data = mysqli_fetch_array($resultado)){
           $id = $data['id_area'];
            $data['identificador'];
            $data['adscripcion'];
           
        ?>
    
    ['<?php echo $data['identificador']?>','<?php echo $data['adscripcion']?>',"<?php 

echo "<a href='javascript:openEdt1()' onclick='aredit({$id})' class='detalle btn btn-default'><i class='fa fa-pencil-square-o text-info'></i></a> <button type='button' class='eliminar btn btn-default' data-toggle='modal' data-target='#modalEliminar' onclick='eliminar({$id})'><li class='fa fa-trash-o text-danger'></li></button> ";

    ?>"


    ],
<?php } ?>
];

var tableGenerarReporte = $('#data-table-area').DataTable({
    "language": {
    "searchPlaceholder": "Buscar datos...",
    "url": "//cdn.datatables.net/plug-ins/1.10.25/i18n/Spanish.json"
    },
    orderCellsTop: true,
    fixedHeader: true,
    data: dataSet,
    columns: [
    {title: "IDENTIFICADOR"},
    {title: "ÁREA"},
    {title: "ACCIÓN"}

    ],
    });

    </script>


</html>
<!--<script type="text/javascript">
    function abreModal(obj) {
  alert(obj.name);
}
</script>
<a href="javascript:abreModal({ 'name':'John'});">
     Pulsador
</a>*/