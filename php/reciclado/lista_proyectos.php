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



$query = "SELECT *,
	idproyecto,
	cliente.correo as ccorreo,
	proyecto.nombre as nombre,
	categoria.nombre as categoria,
	cliente.nombre as cnombre,
	cliente.apellidos as capellido,
	DATE_FORMAT(fecha_inicio, '%d/%m/%Y') as finicio,
	DATE_FORMAT(fecha_termino, '%d/%m/%Y') as ftermino,
	proyecto.descripcion
	FROM proyecto 
	inner join cliente on id_cli = id_cliente 
	inner join categoria ON id_cat = id_categoria 
	inner join manejador on id_man = id_manejador 
	WHERE id_man = $id and proyecto.estado = 1 ORDER BY idproyecto desc";	

	$resultado =mysqli_query($conexion,$query);

	if(!$resultado){
		die("error");
	}else{

		while($data = mysqli_fetch_assoc($resultado)){

			$arreglo["data"][] = array_map("utf8_decode", $data);
		}

		if(isset($arreglo) && !empty($arreglo)){

			echo json_encode($arreglo);
		

		}else{

			echo $arreglo = '""';
		}
	}
	mysqli_free_result($resultado);
	mysqli_close($conexion);

?>