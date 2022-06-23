<?php

    $query = "SELECT * FROM tecnico WHERE id_usu = $idu AND baja = 0";
    $resultado = mysqli_query($conexion, $query);
    if($data = mysqli_fetch_array($resultado)){
        $idtecnico = $data['id_tecnico'];    
    }       

    if(!isset($data['privilegios'])){
        header('Location: ../../gestor');
    }                

    if($data['privilegios']=='tecnico'){
        header('Location: ../../gestor');
    }


?>