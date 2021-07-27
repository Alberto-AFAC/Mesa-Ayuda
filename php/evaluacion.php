<?php
header('Content-Type: application/json');
	include("../conexion/conexion.php");
	session_start();
	
	$query = "SELECT
    idtec,
    usuarios.id_usuario,
    usuarios.nombre,
    usuarios.apellidos,
    COUNT( CASE WHEN evaluacion = 'BUENO' THEN 1 END ) AS Bueno,
    COUNT( CASE WHEN evaluacion = 'REGULAR' THEN 1 END ) AS Regular,
    COUNT( CASE WHEN evaluacion = 'MALO' THEN 1 END ) AS Malo,
    COUNT( CASE WHEN evaluacion = 'CANCELADO' THEN 1 END ) AS Cancelado
 FROM
 reporte
   INNER JOIN tecnico ON reporte.idtec = tecnico.id_tecnico
  INNER JOIN usuarios ON tecnico.id_usu = usuarios.id_usuario 
GROUP BY
idtec";
	$resultado = mysqli_query($conexion, $query);
    $data = array();
    foreach ($resultado as $row) {
      $data[] = $row;
    }
    $resultado->close();

  


print json_encode($data);
?>