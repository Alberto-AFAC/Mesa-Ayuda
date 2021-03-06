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
//** if(isset($_SESSION['gstNmpld'])){
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

    <!-----------DATA TABLE RESPONSIVE---------->
    <link rel="stylesheet" href="https://cdn.datatables.net/rowreorder/1.2.8/css/rowReorder.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.dataTables.min.css">

    <link href="../boots/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">
    <link href="../boots/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="../css/styles.css">
   <link rel="stylesheet" type="text/css" href="../datas/dataTables.css">
   <link rel="stylesheet" type="text/css" href="../../gestor/css/responsive.css">
</head>
<body>
    <div id="wrapper">
        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header" id="perfil">
               <?php include("usuarios.php");?>
            </div>
            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown"><!--Notificación de correos-->                    
                   <?php //include("../php/correo.php");?>
                </li>          
                 <li class="dropdown">
                    <a id="icon-usu" class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">                   
                        <li>
                            <a href="../../gestor/conexion/cerrar_session.php"><i class="fa fa-sign-out fa-fw"></i>CERRAR SESIÓN</a>
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
                            <a href="rptCons.php"><i class="fa fa-keyboard-o"></i> REPORTES<!--<span class="fa arrow"></span>--></a>
                        </li>
                        <li>
                            <a href="rptHist.php"><i class="glyphicon glyphicon-header"></i> HISTORIAL<!--<span class="fa arrow"></span>--></a>
                        </li> 

                    </ul>
                </div>
            </div>
        </nav>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12" id="header">
                     <img src="../img/afac.png" class="imgafac">
                     <h1 class="page-header">HISTORIAL REPORTE</h1>
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

                    <table id="data-table-reporte" width="100%" class="table table-striped table-hover"></table>
                    </div>
                 </div>   
            </div>
        </div>
      </div>  

<form class="form-horizontal" action="" method="POST" onsubmit="return evlRpt(this)">
    <div class="modal fade" id="modalEval" class="col-xs-12 .col-md-12"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">

<div class="modal-dialog width" role="document">
<div class="modal-content">
<div class="modal-header">
<!--<button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="limpiarCampo()"><span style="color: black"  aria-hidden="true">&times;</span>
</button>-->
<button type="button" onclick="location.href='rptCons.php'" class="close" data-dismiss="modal" aria-label="Close" ><span style="color: black"  aria-hidden="true">&times;</span></button>
<h4 class="modal-title" id="exampleModalLabel">Evaluar reporte - <input class="transparent" id="estado_rpt" name="estado_rpt" disabled=""></h4>
</div>
            <div class="modal-body">
                <input type="hidden" id="opcion" name="opcion" value="evaluar">
                    <div class="form-group">                    
                    <div class="col-sm-3">
                    <label>N° reporte</label>
                    <input id="nreporte" name="nreporte" type="text" class="form-control" disabled="">
                    </div>
                    <div class="col-sm-5">
                    <label>Técnico</label>
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
                    <label>Observaciones</label>  
                    <textarea id="usu_observ" name="usu_observ" class="form-control" id="exampleFormControlTextarea1" rows="3" disabled=""></textarea>
                    </div>
                    </div>

                    <div class="form-group">
                    <div class="col-sm-12">
                    <label>Respuesta de falla</label> 
                    <textarea id="falla_interna" name="falla_interna" class="form-control" id="exampleFormControlTextarea1" rows="3" disabled=""></textarea>
                    </div>
                    </div>
                    
                    <div class="form-group" id="externo">
                    <div class="col-sm-12">
                    <label> Respuesta externa de la falla</label>
                    <textarea id="falla_xterna" name="falla_xterna" class="form-control" id="exampleFormControlTextarea1" rows="3" disabled=""></textarea>
                    </div>
                    </div>                     

                    <div class="form-group">
                    <div class="col-sm-6">
                    <label> Fecha reporte</label>
                    <input id="finicio" name="finicio" type="text" class="form-control" disabled="">
                    </div>
                    <div class="col-sm-6">
                    <label> Fecha finalizada</label>
                    <input id="ffinal" name="ffinal" type="text" class="form-control" disabled="">
                    </div>                    
                    </div>
                    <p><b>Su opinión es muy importante para nosotros:</b></p>
                    <p id="div1">
                    ¿Como le pareció el servicio?
                    <label for="BUENO">BUENO</label>
                    <input name="evaluacion" type="radio" value="BUENO" id="BUENO" />
                    <label for="REGULAR">REGULAR</label>
                    <input name="evaluacion" type="radio" value="REGULAR" id="REGULAR" />
                    <label for="MALO">MALO</label>
                    <input name="evaluacion" type="radio" value="MALO" id="MALO" />
                    </p>
                    <p id="div2">
                        <label for="Cancelado">Cancelado</label>
                        <input name="evaluacion" type="radio" value="CANCELADO" id="CANCELADO" />
                    <p>
                   <div class="form-group" id="externo">
                    <div class="col-sm-12">
                    <label>Describa ¿Por qué?</label>
                    <textarea id="observa" name="observa" class="form-control" id="exampleFormControlTextarea1" rows="2"></textarea>
                    </div>
                    </div> 
                               
            <div class="form-group"><br>
            <div class="col-sm-offset-0 col-sm-5">
            <button type="button" id="button" class="btn btn-green btn-lg" onclick="evlRpt();">Aceptar</button>
            </div>
            <b><p class="alert alert-danger text-center padding error" id="error">Error al evaluar técnico</p></b>
            <b><p class="alert alert-success text-center padding exito" id="exito">¡El técnico ha sido evaluado con éxito!</p></b>
            <b><p class="alert alert-warning text-center padding aviso" id="vacio">Es necesario que evalué al técnico</p></b>
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

<h4 class="modal-title" id="exampleModalLabel"><b>DETALLES DEL REPORTE</b></h4>
</div>
            <div class="modal-body">
                <input type="hidden" id="opcion" name="opcion" value="evaluar">
                    <div class="form-group">                    
                    <div class="col-sm-3">
                    <label>N° REPORTE</label>
                    <input id="nreporte" name="nreporte" type="text" class="form-control" disabled="">
                    </div>
                    <div class="col-sm-5">
                    <label>TÉCNICO</label>
                    <input id="usuario" name="usuario" type="text" class="form-control" disabled="">
                    </div>                    
                    <div class="col-sm-2">
                    <label>EXTENSIÓN</label>
                    <input id="extension" name="extension" type="text" class="form-control" disabled="">
                    </div>
                    <div class="col-sm-2">
                    <label>UBICACIÓN</label>
                    <input id="ubicacion" name="ubicacion" type="text" class="form-control" disabled="">
                    </div>                    
                    </div>

                    <div class="form-group">
                    <div class="col-sm-4">
                    <label>TIPO DE SERVICIO</label>
                    <input id="servicio" name="servicio" type="text" class="form-control" disabled="">
                    </div>

                    <div class="col-sm-4">
                    <label style="color:white;">.</label>
                    <input id="intervencion" name="intervencion" type="text" class="form-control" disabled="">
                    </div>                    

                    <div class="col-sm-4">
                    <label style="color:white;">.</label>
                    <input id="descripcion" name="descripcion" type="text" class="form-control" disabled="">
                    </div>
                    </div>

                    <div class="form-group">
                    <div class="col-sm-4">
                    <label style="color:white;">.</label>
                    <textarea id="solucion" name="solucion" class="form-control"
                                    id="exampleFormControlTextarea1" rows="1" disabled=""></textarea>
                    </div>

                    <div class="col-sm-4">
                    <label style="color:white;">.</label>
                    <input id="ultima" name="ultima" type="text" class="form-control" disabled="">
                    </div>                    

                    <div class="col-sm-4">
                    <label style="color:white;">.</label>
                    <input id="final" name="final" type="text" class="form-control" disabled="">
                    </div>
                    </div>
                    <div class="form-group" id="obsrvcns">
                    <div class="col-sm-12">
                    <label>OBSERVACIONES</label>  
                    <textarea id="usu_observ" name="usu_observ" class="form-control" id="exampleFormControlTextarea1" rows="3" disabled=""></textarea>
                    </div>
                    </div>
                    
                    <div class="form-group" id="rspsta">
                    <div class="col-sm-12">
                    <label>RESPUESTA DE FALLA</label>  
                    <textarea id="falla_interna" name="falla_interna" class="form-control" id="exampleFormControlTextarea1" rows="3" disabled=""></textarea>
                    </div>
                    </div>
                    
                    <div class="form-group" id="falla">
                    <div class="col-sm-12">
                    <label>RESPUESTA EXTERNA DE LA FALLA</label>
                    <textarea id="falla_xterna" name="falla_xterna" class="form-control" id="exampleFormControlTextarea1" rows="3" disabled=""></textarea>
                    </div>
                    </div>                     

                    <div class="form-group">
                    <div class="col-sm-4">
                    <label>FECHA REPORTE</label>
                    <input id="finicio" name="finicio" type="text" class="form-control" disabled="">
                    </div>
                    <div class="col-sm-4">
                    <label>FECHA FINALIZADA</label>
                    <input id="ffinal" name="ffinal" type="text" class="form-control" disabled="">
                    </div>                    
                    <!-- <div class="col-sm-4" id="pndint1">
                    <label>SU EVALUACIÓN DE REPORTE</label>
                    <input id="evaluacion" name="evaluacion" type="text" class="form-control" disabled="">
                    </div> -->
                    </div>
                   <!-- <div class="form-group">
                    <div class="col-sm-12" id="pndint2">
                    <label>¿POR QUÉ?</label>
                    <textarea onkeyup="mayus(this);" id="observa" name="observa" class="form-control" id="exampleFormControlTextarea1" rows="2" disabled=""></textarea>
                    </div>
                    </div>                              -->
            </div> 
            </div>
            </div>
        </div>
</form>

</body>
    <!-----DATATABLE RESPONSIVE------>
    <script src="//cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/rowreorder/1.2.8/js/dataTables.rowReorder.min.js"></script>

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
            $sql2="SELECT gstNmpld,
                          gstNombr,                          
                          gstApell,
                          gstExTel
                          FROM personal
                          WHERE
                          gstIdper = $idtecnico";
            $result2=mysqli_query($conexion2,$sql2);
            while($data2=mysqli_fetch_array($result2)){

                $nombre = $data2[1];
                $apellidos = $data2[2];
                $ext = $data2[3];

                if($data[9]=='SISTEMAS'){
                    $folio = 'SIS';
                }else{
                    $folio = 'TEC';
                }

if($data['evaluacion'] == '1'){
        ?>
    
    ["<?php echo  $folio.'-'.$data['n_reporte']?>","<?php echo  $nombre." ".$apellidos?>","<?php echo  $ext ?>","<?php echo $data['servicio']?>","<?php echo $inicio?>","<?php echo $final?>","<?php 

                  if($data['estado_rpt']=='Finalizado'){
            echo "<a href='#' type='button' data-toggle='modal' data-target='#modalDtll' class='detalle btn btn-success' onclick='detalle({$data['n_reporte']})' style='width:100%; font-size:12px;'>FINALIZADO </a>";
            
                  }else{
            echo "<a href='#' type='button' data-toggle='modal' data-target='#modalDtll' class='detalle btn btn-warning' onclick='detalle({$data['n_reporte']})' style='width:100%; font-size:12px;'>CANCELADO </a>";
                  }  
                     
                 ?>"
],
<?php } }
}
?>
];

var tableGenerarReporte = $('#data-table-reporte').DataTable({
   rowReorder: {
            selector: 'td:nth-child(2)'
        },
    responsive: true,

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
    {title: "TÉCNICO ASIGNADO"},
    {title: "EXT."},
    {title: "TIPO DE SERVICIO"},
    {title: "FECHA ENVIO"},
    {title: "FECHA TERMINO"},
    {title: "ESTADO"}
    ],
    });

    </script>
</html>
