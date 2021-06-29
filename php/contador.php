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
//echo $id;
$query = "SELECT 
    idproyecto,
    proyecto.id_man,
    proyecto.nombre as proyecto,
    DATE_FORMAT(proyecto.fecha_inicio, '%d/%m/%Y') as finicio,
    DATE_FORMAT(proyecto.fecha_termino, '%d/%m/%Y') as ftermino,
    proyecto.descripcion as pro_desc,
    count(*) as actividds,
    id_activ, 
    empresa
    FROM proyecto
    INNER JOIN actividades
    ON idproyecto = id_pro
    INNER JOIN cliente
    ON id_cliente = id_cli
    WHERE proyecto.id_man = $id and actividades.estado = 1 
    GROUP BY id_pro 
    ORDER BY idproyecto";
//  WHERE proyecto.id_man = $id and proyecto.estado = 1 ORDER BY idproyecto desc";

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

			echo $arreglo = '0';
		}
	}
	mysqli_free_result($resultado);
	mysqli_close($conexion);

?>