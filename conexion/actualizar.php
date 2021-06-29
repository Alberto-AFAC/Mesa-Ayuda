	<?php 
include ("conexion.php");
//crear las variables las cuales van almacenar dichos datos provinientes del formulario  
	$opcion = $_POST["opcion"];
	$informacion = [];//<---Arreglo

if($opcion === 'modificar'){

		$id_usuario = $_POST["id_usuario"];
		$usuario = $_POST["usuario"];
		$password = $_POST["password"];
		$pass = $_POST["pass"];
		$pass2 = $_POST["pass2"];

			
		if($password != '' && $pass != '' && $pass2 != '' && $usuario !=''){
				$existe = existe_usuario($password,$id_usuario, $conexion);
			
				if($existe > 0){			
						
					$encryptado =md5($pass);
					$encryptado2 =md5($pass2);
					if($encryptado == $encryptado2){

					if(modificar($password, $pass, $usuario, $id_usuario, $conexion)){
						echo "7";
					}else{	echo "1";	}

				}else{	echo "2";	}
			}else{	echo "3";	}
		}else{	echo "4";	}
	

	}

		function existe_usuario($password,$id_usuario,$conexion){
		$passwor; //= md5($password);
		$passwor = $password;
		$query = "SELECT id_tecnico FROM tecnico WHERE password='$passwor' and id_tecnico = '$id_usuario'";
		$resultado = mysqli_query($conexion, $query);
		$existe_usuario = mysqli_num_rows($resultado);
		return $existe_usuario;
	}

	function modificar($password, $pass, $usuario, $id_usuario,$conexion){
		$passwor = $password;
		$pas = $pass;
$query = "UPDATE tecnico SET password='$pas', usuario='$usuario' WHERE password='$passwor' and 	id_tecnico = '$id_usuario'";
		if (mysqli_query($conexion,$query)) {
						return true;
					}else
						{
							return false;
						}
						$this->conexion->cerrar();
								 	
	}

 ?>