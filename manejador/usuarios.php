<?php
include ("../conexion/conexion.php");
?>
<?php 
       if (isset($_SESSION['usuario'])) {
        if($_SESSION['usuario']['privilegios'] != "manejador"){
            header("Location: ../");
            }
        }else{
            header('Location: ../');
        }

         $id = $_SESSION['usuario']['id_climan'];
        $query = "SELECT nombre,apellidos FROM manejador inner JOIN usuarios ON id_manejador = $id ";
        $result = mysqli_query($conexion,$query);
        $usu = mysqli_fetch_row($result);
?>
<body>
     <a class="navbar-brand" href="./">Darsis - Sistema de Gestión de Proyectos - Bienvenido <?php echo utf8_decode($usu[0])." ".utf8_decode($usu[1]);?></a>
</body>

