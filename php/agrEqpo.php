	<?php 
include ("../conexion/conexion.php");
  
	$opcion = $_POST["opcion"];
	$informacion = [];//<---Arreglo

if($opcion === 'agreqpo'){
			
		$num_invntraio = $_POST['num_invntraio'];
		$marca_cpu = $_POST['marca_cpu'];
		$serie_cpu = $_POST['serie_cpu'];
		$memoria_ram = $_POST['memoria_ram'];
		$procesador = $_POST['procesador'];
		$velocidad_proc = $_POST['velocidad_proc'];
		$uni_disc_flax = $_POST['uni_disc_flax'];
		$disco_duro = $_POST['disco_duro'];
		$serie_teclado = $_POST['serie_teclado'];
		$serie_monitor = $_POST['serie_monitor'];
		$version_windows = $_POST['version_windows'];
		$version_office = $_POST['version_office'];
		$serie_mouse = $_POST['serie_mouse'];
		$direccion_ip = $_POST['direccion_ip'];
		$nombre_equipo = $_POST['nombre_equipo'];
		$servicio_internet = $_POST['servicio_internet'];
		$tipo_equipo = $_POST['tipo_equipo'];
		$ubicacion = $_POST['ubicacion'];
		$n_empleado = $_POST['n_empleado'];
		$asignado = $_POST['asignado'];

   if(agregarEqpo($n_empleado,$asignado,$num_invntraio,$marca_cpu,$serie_cpu,$memoria_ram,$procesador,$velocidad_proc,$uni_disc_flax,$disco_duro,$serie_teclado,$serie_monitor,$version_windows,$version_office,$serie_mouse,$direccion_ip,$nombre_equipo,$servicio_internet,$tipo_equipo,$ubicacion,$conexion))
   		{	echo "0";	}else{	echo "1";	}	
	}else 
	if($opcion === 'eliminar'){

		$ideqpo = $_POST['ideqpo'];

		eliminar($ideqpo, $conexion);
	}else if($opcion === 'actualizar'){

		$num_invntraio = $_POST['num_invntraio'];
		$marca_cpu = $_POST['marca_cpu'];
		$serie_cpu = $_POST['serie_cpu'];
		$memoria_ram = $_POST['memoria_ram'];
		$procesador = $_POST['procesador'];
		$velocidad_proc = $_POST['velocidad_proc'];
		$uni_disc_flax = $_POST['uni_disc_flax'];
		$disco_duro = $_POST['disco_duro'];
		$serie_teclado = $_POST['serie_teclado'];
		$serie_monitor = $_POST['serie_monitor'];
		$version_windows = $_POST['version_windows'];
		$version_office = $_POST['version_office'];
		$serie_mouse = $_POST['serie_mouse'];
		$direccion_ip = $_POST['direccion_ip'];
		$nombre_equipo = $_POST['nombre_equipo'];
		$servicio_internet = $_POST['servicio_internet'];
		$tipo_equipo = $_POST['tipo_equipo'];
		$ubicacion = $_POST['ubicacion'];
		$id_equipo = $_POST['id_equipo'];

		$cambio = $_POST['cambio'];

		if($cambio=='NO'){

		$n_empleado = $_POST['n_empleado'];
		$asignado = $_POST['asignado'];
		asignarUsu($n_empleado,$id_equipo,$asignado,$conexion);

		}else{}


		   if(actualEqpo($id_equipo,$num_invntraio,$marca_cpu,$serie_cpu,$memoria_ram,$procesador,$velocidad_proc,$uni_disc_flax,$disco_duro,$serie_teclado,$serie_monitor,$version_windows,$version_office,$serie_mouse,$direccion_ip,$nombre_equipo,$servicio_internet,$tipo_equipo,$ubicacion,$conexion))
   		{	echo "0";	}else{	echo "1";	}	
	}	


function actualEqpo($id_equipo,$num_invntraio,$marca_cpu,$serie_cpu,$memoria_ram,$procesador,$velocidad_proc,$uni_disc_flax,$disco_duro,$serie_teclado,$serie_monitor,$version_windows,$version_office,$serie_mouse,$direccion_ip,$nombre_equipo,$servicio_internet,$tipo_equipo,$ubicacion,$conexion){
	$query = "UPDATE equipo SET
num_invntraio = '$num_invntraio',marca_cpu = '$marca_cpu',
serie_cpu = '$serie_cpu',memoria_ram = '$memoria_ram',procesador = '$procesador',
velocidad_proc = '$velocidad_proc',uni_disc_flax = '$uni_disc_flax',disco_duro = '$disco_duro',
serie_teclado = '$serie_teclado',serie_monitor = '$serie_monitor',
version_windows = '$version_windows',version_office = '$version_office',
serie_mouse = '$serie_mouse',direccion_ip = '$direccion_ip',nombre_equipo = '$nombre_equipo',
servicio_internet = '$servicio_internet',tipo_equipo = '$tipo_equipo',ubicacion = '$ubicacion'
	WHERE id_equipo = $id_equipo and estado=0";
		if (mysqli_query($conexion,$query)) {
			return true;
				}else{
					return false;
					}
	cerrar($conexion);
}

function agregarEqpo(
	$n_empleado,
	$asignado,
	$num_invntraio,
	$marca_cpu,
	$serie_cpu,
	$memoria_ram,
	$procesador,
	$velocidad_proc,
	$uni_disc_flax,
	$disco_duro,
	$serie_teclado,
	$serie_monitor,
	$version_windows,
	$version_office,
	$serie_mouse,
	$direccion_ip,
	$nombre_equipo,
	$servicio_internet,
	$tipo_equipo,
	$ubicacion,$conexion){
	$query="SELECT * FROM equipo WHERE serie_cpu = '$serie_cpu' AND estado = 0";
	$resultados = mysqli_query($conexion,$query);
	if($resultados->num_rows == 0){
		$query = "INSERT INTO equipo VALUES(
0,
'$num_invntraio',
'$marca_cpu',
'$serie_cpu',
'$memoria_ram',
'$procesador',
'$velocidad_proc',
'$uni_disc_flax',
'$disco_duro',
'$serie_teclado',
'$serie_monitor',
'$version_windows',
'$version_office',
'$serie_mouse',
'$direccion_ip',
'$nombre_equipo',
'$servicio_internet',
'$tipo_equipo',
'$ubicacion',
0);";
			if (mysqli_query($conexion,$query)){

			$queri = "INSERT INTO asignacion(id_equi,n_emp,proceso) SELECT id_equipo,$n_empleado,'$asignado' FROM equipo ORDER BY id_equipo DESC LIMIT 1";
			mysqli_query($conexion,$queri);

				return true;
				}else{
					return false;
					}
	cerrar($conexion);
	}
}


	function eliminar($ideqpo, $conexion){
	$query = "UPDATE equipo SET estado = 1 WHERE id_equipo = $ideqpo";
	$resultado = mysqli_query($conexion, $query);
	verificar_resultado($resultado);
	cerrar($conexion);
	}
	
	function asignarUsu($n_empleado,$id_equipo,$asignado,$conexion){
		$query = "UPDATE asignacion SET n_emp = '$n_empleado', proceso = '$asignado' WHERE id_equi = $id_equipo";	
				if (mysqli_query($conexion,$query)) {
			return true;
				}else{
					return false;
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