<?php
	include("../conexion/conexion.php");
	session_start();
	$numEmp = $_SESSION['n_empleado']['n_empleado'];
	$query = "
	SELECT 
	reporte.n_reporte,
	usuarios.nombre,
	usuarios.apellidos,
	usuarios.ubicacion,
	usuarios.extension,
	reporte.finicio,
	reporte.hinicio,
	reporte.evaluacion,
	reporte.estado_rpt,
	reporte.descripcion,
	reporte.ffinal,
	reporte.hfinal,
	reporte.servicio,
	reporte.intervencion,
	reporte.falla_interna,
	reporte.falla_xterna,
	reporte.observa,
	reporte.usu_observ
	FROM reporte
	RIGHT JOIN tecnico
	ON id_tecnico = idtec
	LEFT JOIN usuarios
	ON id_usuario = id_usu
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


