	<?php
	include("../conexion/conexion.php");

session_start();
	
 $id = $_SESSION['usuario']['id_climan'];
 $idu = $_SESSION['usuario']['id_usuario'];


	$query = "SELECT count(*) as conteo FROM comentario WHERE estado = 1 and visto = 0 and id_usu = $idu";
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
	mysqli_free_result($resultado);
	mysqli_close($conexion);

?>