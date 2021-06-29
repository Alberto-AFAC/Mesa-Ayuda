<?php

/*echo $ftermino = "27/11/2017";

echo "<br>"; 
$fecha_termino = date('Y/m/d', strtotime($ftermino));
echo "<br>";

echo $fecha_termino;
echo "<br>";
echo $Y = substr($ftermino, -4);
echo $m = substr($ftermino, 3,2);
echo $d = substr($ftermino, 0,2);
echo "<br>";
echo $fecha = $Y.'/'. $m .'/'. $d;
?>


<!doctype html>
<html>
<head>
<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
<script type="text/javascript"> 
$(document).ready(function(){ 
$("#boton").click(function(){
var nombre = $("#nombre").val();
var apellidos = $("#apellidos").val();
$("#saludo").html('Hola ' + nombre + apellidos);
}); 
}); 
</script>
</head>
<body>
<form action="javascript:void(0);">
<label>Nombre</label>
<input type="text" id="nombre" />
<label>Apellido</label>
<input type="text" id="apellidos" />
<div id="saludo"></div>

<input type="button" id="boton" value="Mostrar nombre" />

</form>
</body>
</html>


<!doctype html>
<html>
<head>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript"> 
$(document).ready(function(){
$("#value_1").keyup(function(){
var valor = $(this).val();
$("#value_2").val(valor);
});
}); 
</script>
</head>
<body>
<form action="javascript:void(0);">
Escribir algo
<input type="text" id="value_1" />
<br />
<textarea id="value_2" cols="50" rows="10"></textarea>
</form>
</body>
</html>
<?php
$fechafinal = '10/07/2018';
$finicio = '10/02/2018';
$ftermino ='09/01/2018';

$yf = substr($fechafinal, -4);
$mf = substr($fechafinal, 3,2);
$df = substr($fechafinal, 0,2);
//echo "<br>";
echo  $fecha_inicio = $yf.'/'. $mf .'/'. $df;


$yi = substr($finicio, -4);
$mi = substr($finicio, 3,2);
$di = substr($finicio, 0,2);
echo "<br>";
echo  $fecha_inicio = $yi.'/'. $mi .'/'. $di;

$Yt = substr($ftermino, -4);
$mt = substr($ftermino, 3,2);
$dt = substr($ftermino, 0,2);
echo "<br>";
echo  $fecha_termino = $Yt.'/'. $mt .'/'. $dt;
echo "<br>";
//$datetime1 = new DateTime('2009-10-11');
// $fe = new Date($Y.'/'.$m.'/'.$d);
$fei = mktime($yi,$mi,$di);
$fet = mktime($Yt,$mt,$dt); 
$fef = mktime($yf,$mf,$df); 
echo $fei;
echo "<br>";
echo $fet;

//    
if($fef >= $fet){

echo "estable";
}else{
echo "no";
}

if($fei <= $fet){

echo "estable";
}else{
echo "no";
}
*/


?>

<link href="boots/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<script src="js/jquery-1.12.3.min.js"></script>



<link href="//oss.maxcdn.com/jquery.bootstrapvalidator/0.5.2/css/bootstrapValidator.min.css" rel="stylesheet"></link>
<link rel="stylesheet" href="https://rawgit.com/Eonasdan/bootstrap-datetimepicker/master/build/css/bootstrap-datetimepicker.min.css
"/>

  <!--<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>-->
  <script src="//oss.maxcdn.com/jquery.bootstrapvalidator/0.5.3/js/bootstrapValidator.min.js"></script>
  <script type="text/javascript" src="validator.js"></script>
  <script src="//oss.maxcdn.com/momentjs/2.8.2/moment.min.js"></script>
  <script src="https://rawgit.com/Eonasdan/bootstrap-datetimepicker/master/src/js/bootstrap-datetimepicker.js"></script>



<body>
<form id="registrationForm" method="post" class="form-horizontal mitad" action="#">



<h2>Formulario de Registro</h2>

<div class="form-group">
<label class="col-lg-3 control-label">Nombres</label>
<div class="col-lg-3">
<input type="text" class="form-control" name="nombre" />
</div>
</div>

<div class="form-group">
<label class="col-lg-3 control-label">Apellidos</label>
<div class="col-lg-3">
<input type="text" class="form-control" name="apellido" />
</div>
</div>

<div class="form-group">
<label class="col-lg-3 control-label">Correo Electrónico</label>
<div class="col-lg-3">
<input type="text" class="form-control" name="email" />
</div>
</div>

<div class="form-group">
<label class="col-lg-3 control-label">Teléfono</label>
<div class="col-lg-3">
<input type="text" class="form-control" name="telefono" />
</div>
</div>

<div class="form-group">
<label class="col-lg-3 control-label">Teléfono Celular</label>
<div class="col-lg-3">
<input type="text" class="form-control" name="telefono_cel" />
</div>
</div> 

<div class="form-group">
<div class="col-lg-9 col-lg-offset-3">
<button type="submit" class="btn btn-success left">Registrarse</button>
</div>
</div>

</form>
</body>

<script type="text/javascript">
$('#registrationForm').bootstrapValidator({

feedbackIcons:{
valid: 'glyphicon glyphicon-ok',
invalid: 'glyphicon glyphicon-remove',
validating: 'glyphicon glyphicon-refresh'
},

fields:{
nombre: {
validators: {
notEmpty: {
message: 'El nombre es requerido'
}
  }
    },

apellido: {
validators: {
notEmpty: {
message: 'El apellido es requerido'
}
  }
    },

email: {
validators: {
notEmpty: {
message: 'El correo es requerido'
},

emailAddress: {
message: 'El correo electronico no es valido'
}
  }
    },

telefono: {
message: 'El teléfono no es valido',
validators: {
notEmpty: {
message: 'El teléfono es requerido y no puede ser vacio'

},

regexp: {
regexp: /^[0-9]+$/,
message: 'El teléfono solo puede contener números'
}
  }
    },

telefono_cel: {
message: 'El teléfono no es valido',
validators: {
regexp: {
regexp: /^[0-9]+$/,
message: 'El teléfono solo puede contener números'
}
  }
    },
      }
        });
</script>