<?php
	include("../conexion/conexion.php");
	session_start();
	
	$query = "SELECT gstIdper,gstNombr,gstApell,gstNmpld FROM personal WHERE personal.estado = 0 && gstIdper != 0 ORDER BY gstIdper ASC";

	$resultado = mysqli_query($conexion2, $query);

	if(!$resultado){
		die("error");
	}else{
		while($data = mysqli_fetch_assoc($resultado)){

	 	$nemple = $data['gstNmpld'];
	

		$queriy = "SELECT * FROM prioridad WHERE n_empleado = $nemple AND estado = 0";
		$result = mysqli_query($conexion, $queriy);

		if($rest = mysqli_fetch_array($result)){

		$data['prio'] = $ridad = $rest["prioridads"];
		$arreglo["data"][] = $data;

		}else{
		$data['prio'] = '0';
		$arreglo["data"][] = $data;

		}

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