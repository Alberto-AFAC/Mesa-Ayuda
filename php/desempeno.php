<?php
	include("../conexion/conexion.php");
	session_start();



	$queryD = "SELECT *,
    	SUM(co_tecnico) AS comunicacion,
        SUM(act_servicio) AS servicios,
        SUM(hab_comun) AS hcomunicacion,
        SUM(tiempo_resp) AS tiemporespuesta,
        SUM(tiempo_soluc) AS tiemsolucion,
        SUM(calidad_genral) AS calidad
    FROM reporte
    INNER JOIN evaluacion ON evaluacion.id_reporte = reporte.n_reporte
    GROUP BY idtec";
	$resultadoD = mysqli_query($conexion, $queryD);


	if(!$resultadoD){
		die("error");
	}else{
		while($data = mysqli_fetch_assoc($resultadoD)){

			$arreglo["data"][] = $data; 
		}
		if(isset($arreglo)&&!empty($arreglo)){

			echo json_encode($arreglo);
		}else{

			echo $arreglo='0';
		}
	}
		mysqli_free_result($resultadoD);
		mysqli_close($conexion);


?>