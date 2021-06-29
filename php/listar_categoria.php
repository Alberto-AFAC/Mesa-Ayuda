<?php
	include("../conexion/conexion.php");

	$query ="SELECT * FROM categoria WHERE estado = 1 ORDER BY id_categoria desc";
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