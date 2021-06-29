	<?php 
include ("../conexion/conexion.php");
  
	$opcion = $_POST["opcion"];
	$informacion = [];//<---Arreglo

if($opcion === 'modificar'){

		$id_avances = $_POST['id_avances'];	
		$prioridad = $_POST['prioridad'];

if($id_avances != '' && $prioridad != ''){

				if(modificar($id_avances, $prioridad, $conexion)){
					echo "0";
				}else{
					echo "2";
				}
		}else{
							echo "1";			
		}
	}else if($opcion === 'editar'){

		$id_avances = $_POST['id_avances'];	
		$total = $_POST['total'];

if($id_avances != '' && $total != ''){

				if(editar($id_avances, $total, $conexion)){
					echo "0";
				}else{
					echo "2";
				}
		}else{
							echo "1";			
		}
	}	


function modificar($id_avances,$prioridad, $conexion){
		$query = "UPDATE avances SET prioridad='$prioridad' WHERE id_avances=$id_avances";
		if (mysqli_query($conexion,$query)) {
						return true;
					}else
						{
							return false;
						}
						cerrar($conexion);
		//verificar_resultado($resultado);
		//cerrar($conexion);									 	
	}


function editar($id_avances,$total, $conexion){
		$query = "UPDATE avances SET total='$total' WHERE id_avances=$id_avances";
		if (mysqli_query($conexion,$query)) {
						return true;
					}else
						{
							return false;
						}
						cerrar($conexion);
		//verificar_resultado($resultado);
		//cerrar($conexion);									 	
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