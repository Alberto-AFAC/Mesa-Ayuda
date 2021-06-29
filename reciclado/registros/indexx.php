<!DOCTYPE html>
<?php require("../../conexion/conexion.php"); ?>
<html>
<head>
  <title>Bootstrap-select test page</title>

  <meta charset="utf-8">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
  <link rel="stylesheet" href="../../dist/css/bootstrap-select.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
  <script src="../../dist/js/bootstrap-select.js"></script>
</head>
<body>

<br>
<br>
<br>



<?php

 $sql = "SELECT id_manejador, nombre, apellidos from manejador";
    $result = mysqli_query($conexion,$sql);

  /*$sql = "SELECT id_categoria, nombre_categoria from categoria";
    $resulta = mysqli_query($conexion,$sql);   */

  ?>
  
  <select class="selectpicker" id="nombre" name="nombre" data-live-search="true">
    <option value="0">Selecione un nombre</option>
    
    <?php while($ver = mysqli_fetch_row($result)):?>

      <option value="<?php echo $ver[0]?>"><?php echo $ver[1]."".$ver[2]?></option>

    <?php endwhile; ?>

  </select>

<br><br>


<!--<select class="selectpicker" id="nombre" name="nombre" data-live-search="true">
    <option value="0">Selecione categoria</option>
    
    <?php while($verr = mysqli_fetch_row($resulta)):?>

      <option value="<?php echo $verr[0]?>"><?php echo $verr[1]?></option>

    <?php endwhile; ?>

  </select>-->




</body>
</html>
