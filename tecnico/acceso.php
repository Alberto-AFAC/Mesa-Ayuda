<?php

$query = "SELECT * FROM tecnico WHERE id_usu = $id AND baja = 0";
$resultado = mysqli_query($conexion, $query);
if($data = mysqli_fetch_array($resultado)){

$idtecnico = $data['id_tecnico'];    
$sede = $data['sede'];    
    
}

if(!isset($data['privilegios'])){
header('Location: ../../');
}                

if($data['privilegios']=='admin'){
header('Location: ../../');
}


?>