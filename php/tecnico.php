	<?php 
include ("../conexion/conexion.php");
//crear las variables las cuales van almacenar dichos datos provinientes del formulario  
	$opcion = $_POST["opcion"];
	$informacion = [];//<---Arreglo
//menu opcional switch para llamar las funciones con susu respectivos parametros
if($opcion === 'modificar'){
		$idtec = $_POST['idtec'];
		$idusu = $_POST['aidusu'];
		$privilg = $_POST['aprivilg'];
		$usuario = $_POST['ausuario'];
		$password = $_POST['apassword'];
		$entrada = $_POST['aentrada'];
		$salida = $_POST['asalida'];
		$activo = $_POST['activo'];
		$observ = $_POST['observ'];
		//$orden = $_POST['orden'];
		if($idtec != '' && $idusu!= '' && $privilg != '' && $usuario != '' && $password != '' && $entrada != '' && $salida != ''){
		if(modificar($idtec, $idusu, $privilg, $usuario, $password,$entrada,$salida,$activo,$observ, $conexion)){
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


$idusu = $_POST['idusu'];
$privilg = $_POST['privilg'];
$usuario = $_POST['usuario'];
$password = $_POST['password'];
$entrada = $_POST['entrada'];
$salida = $_POST['salida'];


if(registrar($idusu,$usuario,$password,$privilg,$entrada,$salida,$conexion))
					{
						echo "0";
					}
					else{
						echo "1";
					}
	}	
function registrar($idusu,$usuario,$password,$privilg,$entrada,$salida,$conexion){

	$query="SELECT * FROM tecnico WHERE id_usu='$idusu' AND baja= 0";
		$resultados = mysqli_query($conexion,$query);
		if($resultados->num_rows == 0)
		{
		$query = "INSERT INTO tecnico VALUES(0, '$idusu','$usuario','$password','$privilg','$entrada','$salida',0,'',0);";
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
	function modificar($idtec, $idusu, $privilg, $usuario, $password,$entrada,$salida,$activo,$observ,$conexion){
		$query = "UPDATE tecnico SET usuario='$usuario',password='$password',privilegios='$privilg',entrada='$entrada',salida='$salida',activo='$activo',observ='$observ' WHERE id_tecnico=$idtec";
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

	function cerrar($conexion){
		mysqli_close($conexion);
	}
 ?>