<?php
	include ("../../gestor/conexion/conexion.php");
	include("../conexion/conexion.php");
	session_start();
	$id = $_SESSION['usuario']['id_usu'];
	$query = "SELECT gstNombr,gstApell,gstNmpld FROM personal
	WHERE gstIdper = $id ";
	$result = mysqli_query($conexion2,$query);
	$usua = mysqli_fetch_row($result);	 
	$numEmp = $usua[2];

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


