	<?php
	include("../conexion/conexion.php");
session_start();
	
 $id = $_SESSION['usuario']['id_climan'];

	$query = "SELECT count(*) as contar FROM proyecto INNER JOIN actividades ON idproyecto = id_pro WHERE id_cli = $id and actividades.estado = 1 ";
	$resultado = mysqli_query($conexion, $query);

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

			echo $arreglo = '0';
		}
	}

	mysqli_free_result($resultado);
	mysqli_close($conexion);

?>