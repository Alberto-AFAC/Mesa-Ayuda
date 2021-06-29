<?php
	include("../conexion/conexion.php");
	session_start();
	$idtecnico = $_SESSION['usuario']['id_tecnico'];
	$query = "
	SELECT 
	usuarios.nombre,
	usuarios.apellidos,
	usuarios.ubicacion,
	usuarios.extension,
	reporte.n_reporte,
	reporte.finicio,
	reporte.ffinal,
	reporte.estado_rpt,
	reporte.servicio,
	reporte.intervencion,
	reporte.descripcion,
	reporte.usu_observ,
	reporte.n_reporte,
	reporte.falla_interna,
	reporte.falla_xterna,
	reporte.observa,
	reporte.evaluacion,
	reporte.hinicio,
	reporte.hfinal,
	reporte.idequipo
	FROM usuarios 
	LEFT JOIN reporte ON usuarios.n_empleado = reporte.n_empleado
	WHERE reporte.idtec = '$idtecnico'";
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

