<?php
include ("conexion/conexion.php");
?>
<?php 
/*//si la variable ssesion existe realizara las siguiente evaluacion 
    if (isset($_SESSION['usuario'])) {
        //si se ha logeado evaluamos si el usuario que aya ingresado intenta acceder a este directorio no es de tipo administrador, no le es permitido el acceso .. si tipo usuario es distinto de admin , entonces no tiene nada que hacer en este directorio 
        if($_SESSION['usuario']['privilegios'] != "admin"){
            //y se redirecciona al directorio que le corresponde
            header("Location: ../");
            }
        }else{
            //si no exixte quiere decir que nadie se ha logeado y lo regsara al inicio (login)
            header('Location: ../');
        }*/

         $id = $_SESSION['usuario']['id_usu'];
        $query = "SELECT nombre,apellidos FROM usuarios inner JOIN tecnico ON id_usuario = $id ";
        $result = mysqli_query($conexion,$query);
        $usu = mysqli_fetch_row($result);
?>
<body>
     <a class="navbar-brand" href="./">REPORTES - BIENVENIDO <?php echo $usu[0];?></a>
</body>