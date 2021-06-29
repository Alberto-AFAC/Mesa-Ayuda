<?php
	include("../conexion/conexion.php");
	$query ="SELECT *, 
	DATE_FORMAT(fecha_inicio, '%d/%m/%Y') as finicio,
	DATE_FORMAT(fecha_termino, '%d/%m/%Y') as ftermino
	FROM tareas WHERE estado = 1 ORDER BY id_tareas ASC";
	$resultado =mysqli_query($conexion,$query);

	if(!$resultado){
		die("error");
	}else{

		while($data = mysqli_fetch_assoc($resultado)){

			$arreglo["data"][] = array_map("utf8_decode", $data);
		}

		if(isset($arreglo) && !empty($arreglo))
		{
			echo json_encode($arreglo);
		}else{

			echo $arreglo = '""';
		}
	}
	mysqli_free_result($resultado);
	mysqli_close($conexion);

?>