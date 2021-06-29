<?php
	include ("../conexion/conexion.php");
  

	$opcion = $_POST["opcion"];
	$informacion = [];//<---Arreglo

	if($opcion === 'registrar'){

			$nombre = utf8_encode($_POST['nombre']);
			$descripcion = utf8_encode($_POST['descripcion']);
		  	$finicio = $_POST['finicio'];
	  		$ftermino = $_POST['ftermino'];
			$idproyecto = $_POST['idproyecto'];

$Y = substr($finicio, -4);
 $m = substr($finicio, 3,2);
 $d = substr($finicio, 0,2);

 $fecha_inicio = $Y.'/'. $m .'/'. $d;

 $Y = substr($ftermino, -4);
 $m = substr($ftermino, 3,2);
 $d = substr($ftermino, 0,2);

 $fecha_termino = $Y.'/'. $m .'/'. $d;

if(registrar($nombre,$descripcion,$fecha_inicio,$fecha_termino,$idproyecto,$conexion))
					{
						echo "0";
					}
					else{
						echo "1";
					}
	}else if($opcion === 'modificar'){

		$id_activ = $_POST['id_activ'];
		$nombre = utf8_encode($_POST['nombre']);
		$act_descrip = utf8_encode($_POST['act_descrip']);
		$finicio = $_POST['finicio'];
		$ftermino = $_POST['ftermino'];
		$ffinal = $_POST['ffinal'];

		$yf = substr($ffinal, -4);
		$mf = substr($ffinal, 3,2);
		$df = substr($ffinal, 0,2);

		$yi = substr($finicio, -4);
		$mi = substr($finicio, 3,2);
		$di = substr($finicio, 0,2);
		//echo "<br>";
		$fecha_inicio = $yi.'/'. $mi .'/'. $di;

		$Yt = substr($ftermino, -4);
		$mt = substr($ftermino, 3,2);
		$dt = substr($ftermino, 0,2);
		//echo "<br>";
		$fecha_termino = $Yt.'/'. $mt .'/'. $dt;

			$fi = mktime($yi,$mi,$di);
			$ft = mktime($Yt,$mt,$dt);
			$ff = mktime($yf,$mf,$df); 
				
		if($fi <= $ft){
		if($nombre != '' && $act_descrip != ''){
		if($ff >= $ft){
		if(editar_actividad($nombre, $act_descrip, $fecha_termino, $id_activ, $conexion)){	
			   echo "0"; 
			}else{ echo "2";	}
				}else{ echo "3"; }
					}else{ echo "1"; }
						}else{ echo "3";	}

	}else if($opcion === 'eliminar'){

		 $id_activ = $_POST['id_activ'];
	 	 $id_pro = $_POST['id_pro'];

		eliminar($id_activ, $id_pro, $conexion);
	}

function registrar($nombre,  $descripcion, $fecha_inicio, $fecha_termino, $idproyecto,$conexion){

	$query = "SELECT * FROM actividades WHERE nombre = '$nombre' AND estado = 1 ";
	$resultado = mysqli_query($conexion,$query);
		if($resultado->num_rows == 0){

			$query = "INSERT INTO actividades VALUES(0, '$nombre', '$descripcion', '$fecha_inicio', '$fecha_termino', '$idproyecto',0,1);";
			if(mysqli_query($conexion, $query)){
			$query = "UPDATE proyecto SET resultado = resultado + 1 WHERE idproyecto = $idproyecto";
				mysqli_query($conexion, $query);

				return true;
			}else{
				return false;
			}
			$this->conexio->cerrar();
		}else{}	
	}

function editar_actividad($nombre,$act_descrip,$fecha_termino,$id_activ, $conexion){
		$query = "UPDATE actividades SET nombre='$nombre',descripcion='$act_descrip',fecha_termino='$fecha_termino' WHERE id_activ=$id_activ";
		if (mysqli_query($conexion,$query)) {
						return true;
					}else
						{
							return false;
						}
						$this->conexion->cerrar();
	}
	function eliminar($id_activ, $id_pro, $conexion){
			$query = "UPDATE actividades SET estado = 0 WHERE id_activ = $id_activ";
			if(mysqli_query($conexion, $query)){
				$query = "UPDATE proyecto SET resultado = resultado - 1 WHERE idproyecto = $id_pro";
				$resultado = mysqli_query($conexion,$query);
				verificar_resultado($resultado);
			}else{
				verificar_resultado($resultado);
				}
			cerrar($conexion);
		}
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


