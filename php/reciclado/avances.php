	<?php
	include("../conexion/conexion.php");

	 session_start();
  if (isset($_SESSION['usuario'])) {
            if($_SESSION['usuario']['privilegios'] != "manejador"){
                header("Location: ../");
                }
            }else{
                header('Location: ../');
            }
	
  $id = $_SESSION['usuario']['id_climan'];

	$query = "
SELECT 
    id_avances,
    id_activ, 
    actividades.nombre as actividad, 
    prioridad, 
    actividades.resultado as tareas, 
    (prioridad / actividades.resultado) as resul_x_tarea, 
    realizado, 
    (realizado * (prioridad / actividades.resultado)) as total,
    id_man 

    FROM proyecto 
    inner join actividades 
    ON idproyecto = id_pro 
    inner join avances 
    ON id_activ = id_actividad
    WHERE id_man = $id and proyecto.estado = 1 ORDER BY idproyecto desc

	";
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

	/*$Jquery = "SELECT count(*) as contar FROM tareas WHERE estado = 1";
	$resul = mysqli_query($conexion, $Jquery);

	if(!$resul){
		die("error");
	}else{

		while($datos = mysqli_fetch_assoc($resul)){

			$arreglos["dato"][] = array_map("utf8_decode", $datos);
		}

		if(isset($arreglos) && !empty($arreglos))
		{
			echo json_encode($arreglos);
		}else{

			echo $arreglos = '0';
		}
	}*/
	mysqli_free_result($resultado);
	mysqli_close($conexion);

?>