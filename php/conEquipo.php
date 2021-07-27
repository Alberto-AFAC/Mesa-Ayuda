<?php
	include("../conexion/conexion.php");
	session_start();
	$numEmp = $_SESSION['gstNmpld']['gstNmpld'];
	$query = "
	SELECT marca_cpu,serie_cpu,version_windows,id_equipo,proceso,tipo_equipo
	FROM equipo 
	INNER JOIN asignacion 
	ON id_equi = id_equipo 
	WHERE n_emp = $numEmp";
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


