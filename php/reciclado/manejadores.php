	<?php 
include ("../conexion/conexion.php");
//crear las variables las cuales van almacenar dichos datos provinientes del formulario  
	$opcion = $_POST["opcion"];
	$informacion = [];//<---Arreglo
//menu opcional switch para llamar las funciones con susu respectivos parametros
if($opcion === 'modificar'){

		$id_manejador = $_POST['id_manejador'];
		$nombre = utf8_encode($_POST['nombre']);
		$apellidos = utf8_encode($_POST['apellidos']);
		$telefono = $_POST['telefono'];
		$celular = $_POST['celular'];
		$correo = utf8_encode($_POST['correo']);
		//$usuario = $_POST["usuario"];
			
		if($nombre != '' && $apellidos != '' && $telefono != '' && $celular != '' && $correo != ''){
			
if(modificar($nombre, $apellidos, $telefono, $celular, $correo, $id_manejador, $conexion))
					{
						echo "0";
					}else
					{
						echo "2";
					}
				/*}*/
			}else{
				echo "1";
			}

	}else if($opcion === 'eliminar'){
		$id_manejador = $_POST["id_manejador"];
					eliminar($id_manejador, $conexion);

	}else if($opcion === 'registrar'){
			$nombre = utf8_encode($_POST['nombre']);
			$apellidos = utf8_encode($_POST['apellidos']);
			$telefono = $_POST['telefono'];
			$celular = $_POST['celular'];
			$correo = utf8_encode($_POST['correo']);
						
	  
			if(registrar($nombre,$apellidos,$telefono,$celular,$correo,$conexion))
					{
						echo "0";
					}
					else{
						echo "1";
					}
	}	
function registrar($nombre, $apellidos,$telefono,$celular,$correo, $conexion){

	$query="SELECT * FROM manejador WHERE nombre='$nombre' and apellidos='$apellidos' and estado = 1 ";
		$resultados = mysqli_query($conexion,$query);
		if($resultados->num_rows == 0)
		{
		$query = "INSERT INTO manejador VALUES(0, '$nombre','$apellidos','$telefono','$celular','$correo',1);";
			if (mysqli_query($conexion,$query)) {		
				$query = "INSERT INTO usuarios(id_climan,estado,privilegios) SELECT id_manejador,estado,'manejador' FROM manejador order by id_manejador desc limit 1";
				mysqli_query($conexion, $query);	
				return true;
						
					}else
						{
							return false;
						}
						$this->conexion->cerrar();
		}else{		
	}								 	
}

	function modificar($nombre,$apellidos,$telefono,$celular,$correo,$id_manejador, $conexion){
		$query = "UPDATE manejador SET nombre='$nombre',apellidos='$apellidos',telefono='$telefono', celular='$celular',correo='$correo' WHERE id_manejador=$id_manejador";
		if (mysqli_query($conexion,$query)) {
						return true;
					}else
						{
							return false;
						}
						$this->conexion->cerrar();
		//verificar_resultado($resultado);
		//cerrar($conexion);									 	
	}
	function eliminar($id_manejador, $conexion){
		$query = "UPDATE manejador,usuarios set manejador.estado = 0, usuarios.estado = 0 WHERE id_manejador = $id_manejador and id_climan = $id_manejador and privilegios = 'manejador'";
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