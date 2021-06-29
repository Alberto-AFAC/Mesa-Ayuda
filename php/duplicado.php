	<?php
	include("../conexion/conexion.php");

	$query = "SELECT usuario, COUNT(*) Total,estado FROM usuarios WHERE estado = 1 and usuario != '' GROUP BY usuario HAVING COUNT(*) > 1";
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