<?php
include ("../../gestor/conexion/conexion.php");
include ("../conexion/conexion.php");
session_start(); 
  $id = $_SESSION['usuario']['id_usu'];

        $query = "SELECT gstNombr,gstApell,gstNmpld FROM personal
            WHERE gstIdper = $id ";
        $result = mysqli_query($conexion2,$query);
        $usua = mysqli_fetch_row($result);
     $query = "SELECT gstNombr,gstApell FROM personal
            WHERE gstIdper = $id ";
        $result = mysqli_query($conexion2,$query);
        $usu = mysqli_fetch_row($result);        
//si la variable ssesion existe realizara las siguiente evaluacion 

  //evaluaremos si la variable de session existe de lo contrario no se ara nada 
  //si la variable session exite, se evaluara que tiepo de usuario esta ingresando de esa manera saber a donde se deve redireccionar en caso de que ya se haya logeado 

/*         $id = $_SESSION['usuario']['id_climan'];
        $query = "SELECT nombre,apellidos FROM usuarios inner JOIN usuarios ON id_cliente = $id  ";
        $result = mysqli_query($conexion,$query);
        $usu = mysqli_fetch_row($result);*/
?>
<a class="navbar-brand inhabilitado" title="Menú de acceso" href="../../gestor/menu/">BIENVENIDO - <?php echo $usu[0].''.$usu[1];?></a>
<a class="navbar-brand habilitado" href="../../gestor/menu/"><?php echo $usu[0].''.$usu[1];?></a>