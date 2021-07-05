<?php
	include("../conexion/conexion.php");

	$query = "SELECT * FROM reporte 
			INNER JOIN tecnico ON reporte.idtec = tecnico.id_tecnico
			INNER JOIN usuarios ON tecnico.id_usu = usuarios.id_usuario
			";
	$resultado = mysqli_query($conexion, $query);

	if(!$resultado){
		die("error");
	}else{
		while($data = mysqli_fetch_assoc($resultado)){

			$arreglo["data"][] = $data; 
		}
		if(isset($arreglo)&&!empty($arreglo)){

			echo json_encode($arreglo);
		}else{

			echo $arreglo='0';
		}
	}
		mysqli_free_result($resultado);
		mysqli_close($conexion);

?>


