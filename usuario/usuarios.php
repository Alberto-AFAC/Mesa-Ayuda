<?php
include ("../conexion/conexion.php");
//si la variable ssesion existe realizara las siguiente evaluacion 

  //evaluaremos si la variable de session existe de lo contrario no se ara nada 
  //si la variable session exite, se evaluara que tiepo de usuario esta ingresando de esa manera saber a donde se deve redireccionar en caso de que ya se haya logeado 

/*         $id = $_SESSION['usuario']['id_climan'];
        $query = "SELECT nombre,apellidos FROM usuarios inner JOIN usuarios ON id_cliente = $id  ";
        $result = mysqli_query($conexion,$query);
        $usu = mysqli_fetch_row($result);*/
?>
<body>
<a class="navbar-brand" href="./">BIENVENIDO - <?php echo $_SESSION['gstNmpld']['gstNombr'].' '.$_SESSION['gstNmpld']['gstApell'];?></a>
</body>