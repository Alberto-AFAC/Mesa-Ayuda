<?php
	include("../conexion/conexion.php");
	$query ="SELECT 
	idproyecto,
	proyecto.nombre as proyecto,
	DATE_FORMAT(proyecto.fecha_inicio, '%d/%m/%Y') as finicio,
	DATE_FORMAT(proyecto.fecha_termino, '%d/%m/%Y') as ftermino,
	proyecto.descripcion as pro_desc,
	count(*) as actividds,
	id_activ, 
	empresa
	FROM proyecto
	INNER JOIN actividades
	ON idproyecto = id_pro
	INNER JOIN cliente
	ON id_cliente = id_cli
	WHERE actividades.estado = 1 and proyecto.estado = 1
	GROUP BY id_pro	
	ORDER BY idproyecto";
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