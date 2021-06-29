<?php
include("../conexion/conexion.php");

$opcion = $_POST["opcion"];
$informacion = [];

if($opcion === 'registrar'){

	$nombre = utf8_encode($_POST["nombre"]);
	$cat_descrip = utf8_encode($_POST["cat_descrip"]);
//	$fecha = date('Y-m-d');

	if(registrar($nombre, $cat_descrip, $conexion)){
		echo "0";
	}else{
		echo "1";
	}
}else if($opcion === 'eliminar'){

	$id_categoria = $_POST["id_categoria"];
			eliminar($id_categoria,$conexion);
}else if($opcion === 'modificar'){

		$id_categoria = $_POST["id_categoria"];
		$nombre = utf8_encode($_POST["nombre"]);
		$cat_descrip = utf8_encode($_POST["cat_descrip"]);

		if($id_categoria != '' && $nombre != '' && $cat_descrip != ''){

			if(modificar($id_categoria, $nombre, $cat_descrip, $conexion)){

				echo "0";
			}else{

				echo "2";
			}

		}else{

			echo "1";
		}


}


function registrar($nombre,$cat_descrip,$conexion){

	$query="SELECT * FROM categoria WHERE nombre='$nombre'";
			$resultado= mysqli_query($conexion,$query);
		if($resultado->num_rows==0){
			$query="INSERT INTO categoria VALUES(0,'$nombre','$cat_descrip',1);";
				if(mysqli_query($conexion,$query)){
					return true;
				}else{
					return false;
				}
				$this->conexion->cerrar();
		}else{

		}
	}

function eliminar($id_categoria,$conexion){

	$query = "UPDATE categoria SET estado = 0 WHERE id_categoria = '$id_categoria'";
	$resultado = mysqli_query($conexion,$query);
	verificar_resultado($resultado); 
	cerrar($conexion);
}

function modificar($id_categoria,$nombre,$cat_descrip,$conexion){

	$query = "UPDATE categoria SET nombre='$nombre', cat_descrip='$cat_descrip' WHERE id_categoria='$id_categoria'";
	if(mysqli_query($conexion,$query)){

		return true;

		}else{

			return false;
		}
	cerrar($conexion);
}
	function verificar_resultado($resultado){
		if(!$resultado) $informacion["respuesta"] = "ERROR";
			else $informacion["respuesta"] = "BIEN";
				echo json_encode($informacion);
	}

function cerrar($conexion){

	mysqli_close($conexion);

}
?>

