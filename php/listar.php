<?php

	include ("../conexion/conexion.php");

	$query = "SELECT id_usuario,nombre,apellidos,usuario,password,privilegios from usuarios inner join cliente ON id_climan = id_cliente where privilegios = 'cliente' and cliente.estado = 1 union SELECT  id_usuario, nombre,apellidos,usuario,password,privilegios from usuarios inner join manejador ON id_climan = id_manejador where privilegios = 'manejador' and manejador.estado = 1 ORDER BY id_usuario DESC";
	$resultado = mysqli_query($conexion, $query);

	if (!$resultado) {
		die("error");//EN CASO DE NO HABER RESULTADO
	}else{//arreglo -funcion , parametro de resultado
		while($data = mysqli_fetch_assoc($resultado)){
			//variable arreglo..para no tener problemas con la comas,comillas,tilde etc
			$arreglo["data"][] = array_map("utf8_decode",$data);	
		}//al tener toda los datos en data de la variable arreglo lo pasamos formato json

		if(isset($arreglo) && !empty($arreglo)) {
					echo json_encode($arreglo);
			}else
			{
					echo $arreglo='""';				
			}
	}
	mysqli_free_result($resultado);
	mysqli_close($conexion);