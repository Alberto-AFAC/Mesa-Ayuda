	<?php 
include ("../conexion/conexion.php");
  
	$opcion = $_POST["opcion"];
	$informacion = [];//<---Arreglo

if($opcion === 'agreqpo'){
			
		$num_sigtic = $_POST['num_sigtic'];
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
		$id_equipo = $_POST['id_equipo'];
		$asignado = $_POST['asignado'];

		asignarUsu($n_empleado,$id_equipo,$asignado,$conexion);

   if(agregarEqpo($id_equipo,$num_sigtic,$num_invntraio,$marca_cpu,$serie_cpu,$memoria_ram,$procesador,$velocidad_proc,$uni_disc_flax,$disco_duro,$serie_teclado,$serie_monitor,$version_windows,$version_office,$serie_mouse,$direccion_ip,$nombre_equipo,$servicio_internet,$tipo_equipo,$ubicacion,$conexion))
   		{	echo "0";	}else{	echo "1";	}	
	}


function agregarEqpo($id_equipo,$num_sigtic,$num_invntraio,$marca_cpu,$serie_cpu,$memoria_ram,$procesador,$velocidad_proc,$uni_disc_flax,$disco_duro,$serie_teclado,$serie_monitor,$version_windows,$version_office,$serie_mouse,$direccion_ip,$nombre_equipo,$servicio_internet,$tipo_equipo,$ubicacion,$conexion){
	$query = "UPDATE equipo SET
num_sigtic = '$num_sigtic',num_invntraio = '$num_invntraio',marca_cpu = '$marca_cpu',
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
	
	function asignarUsu($n_empleado,$id_equipo,$asignado,$conexion){
		$query = "UPDATE asignacion SET n_emp = '$n_empleado', proceso = '$asignado' WHERE id_equi = $id_equipo";	
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