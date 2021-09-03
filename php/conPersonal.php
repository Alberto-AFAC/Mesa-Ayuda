<?php
	include("../conexion/conexion.php");


	$query = "SELECT * FROM personal";
	$resultado = mysqli_query($conexion2, $query);

	if(!$resultado){
		die("error");
	}else{


while($data = mysqli_fetch_array($resultado)){ 

		$nempl = $data['gstNmpld'];

		$queri = "SELECT * FROM asignacion WHERE n_emp = '$nempl' ";
$resul = mysqli_query($conexion, $queri);

if($res = mysqli_fetch_array($resul)){

// if($data['estado']==0){
$data['proceso'] = 'asignado';
$arreglo["data"][] = $data; 
// }else {

// 	$data['proceso'] = 'baja';
// 	$arreglo["data"][] = $data; 	
// }


	
}else{




if($data['gstCargo']=='NUEVO INGRESO'){

$data['proceso'] = 'nuevo';
$arreglo["data"][] = $data; 
}else{

$data['proceso'] = 'designado';
$arreglo["data"][] = $data; 	

}

}

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


