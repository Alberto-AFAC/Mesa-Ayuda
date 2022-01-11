	<?php 
include ("../conexion/conexion.php");
//crear las variables las cuales van almacenar dichos datos provinientes del formulario  
	$opcion = $_POST["opcion"];
	$informacion = [];//<---Arreglo
//menu opcional switch para llamar las funciones con susu respectivos parametros
if($opcion === 'modificar'){

		$id_usuario = $_POST['id_usuario'];
		$nombre = $_POST['nombre'];
		$apellidos = $_POST['apellidos'];
		$idarea = $_POST['idarea'];
		$extension = $_POST['extension'];
		$correo = $_POST['correo'];
		$ubicacion = $_POST['ubicacion'];
		$n_empleado = $_POST['n_empleado'];
		//$orden = $_POST['orden'];
		if($nombre != '' && $apellidos != '' && $idarea != '' && $extension != '' && $correo != '' && $ubicacion != '' && $n_empleado != ''){
		if(modificar($nombre, $apellidos,$idarea, $extension, $correo,$ubicacion,$n_empleado, $id_usuario, $conexion)){
					echo "0";
				}else{
						echo "2";
				 		}
							}else{
								echo "1";
								}

	}else if($opcion === 'eliminar'){
		$id_usuario = $_POST["id_usuario"];
					eliminar($id_usuario, $conexion);

	}else if($opcion === 'registrar'){
			$nombre = $_POST['nombre'];
			$apellidos = $_POST['apellidos'];
			$id_cargo = $_POST['id_cargo'];
			$id_area = $_POST['id_area'];
			$extension = $_POST['extension'];
			$correo = $_POST['correo'];
			$ubicacion = $_POST['ubicacion'];
			$n_empleado = $_POST['n_empleado'];
		//si ningun campo estan vacios entra en la lines que sigue, en caso contrario si algun campo se encuentra vacia  
if(registrar($nombre,$apellidos,$id_cargo,$id_area,$extension,$correo,$ubicacion,$n_empleado,$conexion))
					{
						echo "0";
					}
					else{
						echo "1";
					}
	}else if($opcion === 'agregar'){

	$nempleo = $_POST['nempleo'];
	$prioridad = $_POST['prioridad'];

	if(ggrprrdd($nempleo,$prioridad,$conexion))
	{	echo "0";	}else{	echo "1";	}

	}else if($opcion === 'editar'){

	$nempleo = $_POST['nempleo'];
	$prioridad = $_POST['prioridad'];

	if(dtrprrdd($nempleo,$prioridad,$conexion))
	{	echo "0";	}else{	echo "1";	}

	}	
function registrar($nombre,$apellidos,$id_cargo,$id_area,$extension,$correo,$ubicacion,$n_empleado,$conexion){

	$query="SELECT * FROM usuarios WHERE nombre='$nombre' AND apellidos='$apellidos' AND estado = 0 OR n_empleado='$n_empleado' AND estado = 0";
		$resultados = mysqli_query($conexion,$query);
		if($resultados->num_rows == 0)
		{
		$query = "INSERT INTO usuarios VALUES(0, '$nombre','$apellidos','$id_cargo','$id_area','$extension','$correo','$ubicacion','$n_empleado',0);";
			if (mysqli_query($conexion,$query)) {		
		
				return true;
						
					}else
						{
							return false;
						}
						$this->conexion->cerrar();
		}else{		
	}								 	
}
	function modificar($nombre,$apellidos,$idarea,$extension,$correo,$ubicacion,$n_empleado,$id_usuario,$conexion){
		$query = "UPDATE usuarios SET nombre='$nombre',apellidos='$apellidos',area_ads='$idarea',extension='$extension',correo='$correo',ubicacion='$ubicacion',n_empleado='$n_empleado' WHERE id_usuario=$id_usuario";
		if (mysqli_query($conexion,$query)) {
						return true;
					}else
						{
							return false;
						}
		//verificar_resultado($resultado);
		cerrar($conexion);									 	
	}
	function eliminar($id_usuario, $conexion){
	//	$query = "UPDATE cliente SET estado = 0 WHERE id_cliente = $id_cliente";
		$query = "UPDATE usuarios set estado = 1 WHERE id_usuario = $id_usuario ";
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
	function ggrprrdd($nempleo,$prioridad,$conexion){

		$query = "INSERT INTO prioridad VALUES(0,'$prioridad','$nempleo',0);";
		if (mysqli_query($conexion,$query)) {		
			return true;
		}else{
			return false;
		}
		$this->conexion->cerrar();		
	}

	function dtrprrdd($nempleo,$prioridad,$conexion){

	$query = "UPDATE prioridad SET prioridads='$prioridad' WHERE n_empleado=$nempleo";
	if (mysqli_query($conexion,$query)) {
	return true;
	}else
	{
	return false;
	}
	//verificar_resultado($resultado);
	cerrar($conexion);	

	}


	function cerrar($conexion){
		mysqli_close($conexion);
	}
 ?>