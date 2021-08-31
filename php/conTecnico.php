<?php
	include("../conexion/conexion.php");

	$nrepor = $_POST['nrepor'];

	$query = "SELECT * FROM reporte INNER JOIN tecnico ON reporte.idtec = tecnico.id_tecnico WHERE n_reporte = $nrepor";
	$resultado = mysqli_query($conexion, $query);
	$datas = mysqli_fetch_assoc($resultado);
	$idper = $datas['id_usu'];
	$nempl = $datas['n_empleado'];

	$query = "SELECT * FROM personal WHERE gstIdper = $idper || gstNmpld = $nempl ";
	$resultado = mysqli_query($conexion2, $query);

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


