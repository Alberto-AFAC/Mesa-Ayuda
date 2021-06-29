<?php
	include("../conexion/conexion.php");
 session_start();
  if (isset($_SESSION['usuario'])) {
            if($_SESSION['usuario']['privilegios'] != "cliente"){
                header("Location: ../");
                }
            }else{
                header('Location: ../');
            }
	
 $id = $_SESSION['usuario']['id_climan'];

/*ini_set('date.timezone','America/Mexico_City');
$meses = array("01","02","03","04","05","06","07","08","09","10","11","12");
$fecha= date('d').'/'.$meses[date('n')-1].'/'.date('Y');
$di = substr($fecha, 0,2);
$me = substr($fecha, 3,2);
$an = substr($fecha, -4);
$presente = mktime($di,$me,$an);*/

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
    WHERE proyecto.id_cli = $id and actividades.estado = 1 
    GROUP BY id_pro 
    ORDER BY idproyecto";
//  WHERE proyecto.id_man = $id and proyecto.estado = 1 ORDER BY idproyecto desc";

	$resultado =mysqli_query($conexion,$query);

	if(!$resultado){
		die("error");
	}else{

		while($data = mysqli_fetch_assoc($resultado)){

/*$di = substr($data['ftermino'], 0,2);
$me = substr($data['ftermino'], 3,2);
$an = substr($data['ftermino'], -4);
$termino = mktime($di,$me,$an);*/

    //if($presente >= $termino){

            $arreglo["data"][] = array_map("utf8_decode", $data);
   // }else{
    //}
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