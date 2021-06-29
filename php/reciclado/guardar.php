	<?php 
include ("../conexion/conexion.php");
//crear las variables las cuales van almacenar dichos datos provinientes del formulario  
	$opcion = $_POST["opcion"];
	$informacion = [];//<---Arreglo
//menu opcional switch para llamar las funciones con susu respectivos parametros
if($opcion === 'modificar'){

		$id_usuario = $_POST["id_usuario"];
		$usuario = utf8_decode($_POST["usuario"]);
		$password = $_POST["password"];
		$pass = $_POST["pass"];

		if($usuario != '' && $password != '' && $pass != ''){
			$existe = existe_usuario($id_usuario,$usuario, $conexion);
				//if($existe == 0){//si es mayor a cero ejemplo 1 mayor que 0

					$encryptado =md5($password);
					$encryptado2 =md5($pass);
					if($encryptado == $encryptado2){

				if(modificar($id_usuario,$usuario,$password,$conexion)){

							echo "0";

				}else{	echo "1";	}

			}else{	echo "2";	}

	//	}else{	echo "3";	}

	}else{ echo "4";	}
}
//funcion de modificar usuario, se menciona los parametros que resivira las funciones, SET setear dichos campos de las cuales obtendremos el valor. se modificara usuario tomando encuanta su ID
		function existe_usuario($id_usuario,$usuario, $conexion){
		$query = "SELECT id_usuario FROM usuarios WHERE usuario='$usuario';";
		$resultado = mysqli_query($conexion, $query);
		//la funcion mysqli_num_rows devolvera el numero de filas en este caso solo sera uno ya que verificara si esque existe o no. si existe retornara el valos de uno en caso contrario sera cero.
		$existe_usuario = mysqli_num_rows($resultado);
		return $existe_usuario;
	}
	function modificar($id_usuario,$usuario, $password,$conexion){
			$pass = md5($password);
		$query = "UPDATE usuarios SET usuario='$usuario',password='$pass' WHERE id_usuario=$id_usuario";

		if (mysqli_query($conexion,$query)) {
						return true;
					}else
						{
							return false;
						}
						cerrar($conexion);
									 	
	}



	function cerrar($conexion){
			mysqli_close($conexion);
		}
 ?>