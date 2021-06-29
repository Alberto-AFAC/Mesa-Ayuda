	<?php 
include ("../conexion/conexion.php");
  
	$opcion = $_POST["opcion"];
	$informacion = [];//<---Arreglo

 if($opcion === 'registrar'){
			
	$id_area = $_POST['id_area'];
	$adscripcion = $_POST['adscripcion'];
	$identificador = $_POST['identificador'];

if(registrar($identificador,$adscripcion,$id_area,$conexion)){
		echo "0";
			}else{	echo "1";	}
	
	}else if($opcion === 'modificar'){
	
		$id_area = $_POST['id_area'];
		$idarea = $_POST['idarea'];			
		$adscripcion = $_POST['adscripcion'];
		$identificador = $_POST['identificador'];
	
		if($id_area != '' && $adscripcion != '' && $identificador != ''){
			if(modificar($identificador,$adscripcion,$id_area,$idarea,$conexion)){
				echo "0";
				}else{	echo "2";	}
					}else{	echo "1";	}

	}else if($opcion === 'eliminar'){

		$id_area = $_POST['id_area'];

		eliminar($id_area, $conexion);
	}	

function registrar($identificador,$adscripcion, $id_area, $conexion){
	$query="SELECT * FROM area WHERE adscripcion='$adscripcion' and estado = 0 ";
	$resultados = mysqli_query($conexion,$query);
	if($resultados->num_rows == 0){
		$query = "INSERT INTO area VALUES(0,'$identificador','$adscripcion','$id_area',0);";
			if (mysqli_query($conexion,$query)){		
				return true;
				}else{
					return false;
					}
	cerrar($conexion);
	}								 	
}

function modificar($identificador,$adscripcion,$id_area,$idarea, $conexion){
	$query = "UPDATE area SET identificador='$identificador', adscripcion='$adscripcion', id_sub=$idarea WHERE id_area=$id_area and estado=0";
		if (mysqli_query($conexion,$query)) {
			return true;
				}else{
					return false;
					}
	cerrar($conexion);
}

	function eliminar($id_area, $conexion){
		$query = "UPDATE area SET estado = 1 WHERE id_area = $id_area";
		$resultado = mysqli_query($conexion, $query);
		verificar_resultado($resultado);
		cerrar($conexion);
	}
//funcion verificar_resultado tiene como parametro RESULTADO
	function verificar_resultado($resultado){
		//si no hay resultado que marque una respuesta de error 
		if(!$resultado) $informacion["respuesta"] = "ERROR";
		//si hay resultado respuesta de bien
			else $informacion["respuesta"] = "BIEN";
			//todo codificado a formato JSON esta variable va hacer un arreglo 
				echo json_encode($informacion);
	}

	function cerrar($conexion){
		mysqli_close($conexion);
	}
 ?>