<?php
	include("../conexion/conexion.php");
	session_start();
	$numEmp = $_SESSION['gstNmpld']['gstNmpld'];
	$query = "
	SELECT 
	reporte.n_reporte,
	reporte.finicio,
	reporte.hinicio,
	reporte.evaluacion,
	reporte.estado_rpt,
	reporte.descripcion,
	reporte.solucion,
	reporte.ultima,
	reporte.final,
	reporte.ffinal,
	reporte.hfinal,
	reporte.servicio,
	reporte.intervencion,
	reporte.falla_interna,
	reporte.falla_xterna,
	reporte.observa,
	reporte.usu_observ,
	tecnico.id_usu
	FROM reporte
	RIGHT JOIN tecnico
	ON id_tecnico = idtec
	WHERE reporte.n_empleado= $numEmp ORDER BY reporte.n_empleado DESC";
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


