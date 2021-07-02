	<?php 
include ("../conexion/conexion.php");
//crear las variables las cuales van almacenar dichos datos provinientes del formulario  
	$opcion = $_POST["opcion"];
	$informacion = [];//<---Arreglo
//menu opcional switch para llamar las funciones con susu respectivos parametros
if($opcion === 'asignar'){

		$n_reporte = $_POST["n_reporte"];
		$idtec = $_POST["idtec"];

	if(reasignar($n_reporte,$idtec,$conexion))
		{	echo "0";	}else{	echo "1";	}


}

function reasignar($n_reporte,$idtec,$conexion){
	$query = "UPDATE reporte SET idtec='$idtec' WHERE n_reporte=$n_reporte";
		if (mysqli_query($conexion,$query)) {
			return true;
				}else{
					return false;
					}
	cerrar($conexion);
}


	function cerrar($conexion){
			mysqli_close($conexion);
		}
 ?>