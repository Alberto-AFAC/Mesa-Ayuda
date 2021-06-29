
<?php
    include 'conexion_be.php';

    $nombre_completo = $_POST['nombre_completo'];
    $correo_electronico = $_POST ['correo_electronico'];
    $numero_de_empledo =$_POST['numero_de_empledo'];
    $usuario =$_POST['usuario'];

    $query = "INSERT INTO usuarios(nombre_completo, correo_electronico, numero_de_empledo, usuario)
              VALUES('$nombre_completo', '$correo_electronico', '$numero_de_empledo', '$usuario')";

    $ejecutar =mysqli_query($conexion, $query);
    
    if ($ejecutar){
        echo'<script type="text/javascript">
                alert("ALta de registro Correcta");
                 window.location="../index.php";
            </script>';
    }    
?>