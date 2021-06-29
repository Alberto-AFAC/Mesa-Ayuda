 <?php
include ("../../conexion/conexion.php");
?>
<?php 


          $id = $_SESSION['usuario']['id_usu'];
         $idm = $_SESSION['usuario']['privilegios'];


        $query = "SELECT correo FROM usuarios WHERE id_usuario = $id ";
        $result = mysqli_query($conexion,$query);
        $usu = mysqli_fetch_row($result);
?>
<body>

<a target="_Blanck" href="mailto:<?php echo $usu[0];?>"><i class="fa fa-envelope fa-fw"></i> <i ></i>
 </a>

</body>


