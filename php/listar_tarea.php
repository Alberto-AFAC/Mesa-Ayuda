<?php
	include("../conexion/conexion.php");
	$query ="SELECT 
	id_activ,
	actividades.nombre as actividad,
	DATE_FORMAT(actividades.fecha_inicio, '%d/%m/%Y') as finicio,
	DATE_FORMAT(actividades.fecha_termino, '%d/%m/%Y') as ftermino,
	actividades.descripcion as act_desc,
	count(*) as tareas,
	id_tareas,
	id_pro,
	id_act,
	proyecto.nombre as proyecto
	FROM actividades
	INNER JOIN tareas
	ON id_activ = id_act
	INNER JOIN proyecto
	ON idproyecto = id_pro
	WHERE tareas.estado = 1 
	GROUP BY id_act	
	ORDER BY id_activ";
	
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