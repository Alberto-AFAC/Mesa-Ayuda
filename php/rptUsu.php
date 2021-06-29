	<?php 
include ("../conexion/conexion.php");
  
	$opcion = $_POST["opcion"];
	$informacion = [];//<---Arreglo

 if($opcion === 'registrar'){
			
	$nempleado = $_POST['nempleado'];
	$servicio  = substr($_POST['servicio'],1);
	$intervencion = substr($_POST['intervencion'],1);
	$descripcion = $_POST['descripcion'];
	$obser = $_POST['obser'];

	$idequipo = $_POST['idequipo'];
	$modelo = $_POST['modelo'];
	$serie = $_POST['serie'];
	$verwind = $_POST['verwind'];
	$proceso = $_POST['proceso'];

	if($idequipo == 0){
		registraEqpo($nempleado,$modelo,$serie,$verwind,$proceso,$conexion);
	}

ini_set('date.timezone','America/Mexico_City');
$fenvio= date('Y').'/'.date('m').'/'.date('d');	
$Hinic=date('H:i');

if(registrar($nempleado,$servicio,$intervencion,$descripcion,$obser,$idequipo,$fenvio,$Hinic,$conexion)){
		echo "0";
			}else{	echo "1";	}	
	}

	if($opcion === 'evaluar'){

	$nreporte = $_POST['nreporte'];
	$evaluacion = $_POST['evaluacion'];
	$observa = $_POST['observa'];

		if(evaluar($nreporte,$evaluacion,$observa,$conexion)){
		echo "0";
		}else{	echo "1";	}	
	}

function registrar($nempleado,$servicio,$intervencion,$descripcion,$obser,$idequipo,$fenvio,$Hinic,$conexion){
	$query="SELECT * FROM asignacion  
			INNER JOIN reporte
			ON n_emp = n_empleado
			INNER JOIN equipo
			ON id_equi = id_equipo
			WHERE n_emp = '$nempleado' AND id_equi = '$idequipo' AND estado_rpt = 'Pendiente'";
	$resultados = mysqli_query($conexion,$query);
	if($resultados->num_rows == 0){

//		$query = "INSERT INTO reporte VALUES(0,'$nempleado','$servicio','$intervencion','$descripcion','0','0','$fenvio','0','0','0','0','$obser','Pendiente','0',2)";
//agregar reporte y id equipo
$query = "INSERT INTO reporte(n_empleado,idequipo,servicio,intervencion,descripcion,usu_observ,falla_interna,falla_xterna,finicio,hinicio,ffinal,hfinal,evaluacion,observa,estado_rpt,pila,idtec) SELECT '$nempleado',id_equipo,'$servicio','$intervencion','$descripcion','$obser','0','0','$fenvio','$Hinic','0','0','0','0','Pendiente','0',2 FROM equipo ORDER BY id_equipo DESC LIMIT 1";

			if (mysqli_query($conexion,$query)){		
				return true;
				}else{
					return false;
					}
	cerrar($conexion);
	}								 	
}

function registraEqpo($nempleado,$modelo,$serie,$verwind,$proceso,$conexion){
	$query="SELECT * FROM equipo WHERE serie_cpu = '$serie' AND estado = 0";
	$resultados = mysqli_query($conexion,$query);
	if($resultados->num_rows == 0){
		$query = "INSERT INTO equipo VALUES(0,0,'0','$modelo','$serie','0','0','0','0','0','0','0','$verwind','0','0','0','0','0','0','0',0);";
			if (mysqli_query($conexion,$query)){

			$queri = "INSERT INTO asignacion(id_equi,n_emp,proceso) SELECT id_equipo,$nempleado,'$proceso' FROM equipo ORDER BY id_equipo DESC LIMIT 1";
			mysqli_query($conexion,$queri);

				return true;
				}else{
					return false;
					}
	cerrar($conexion);
	}
}
	function evaluar($nreporte,$evaluacion,$observa,$conexion){

		$query = "UPDATE reporte SET evaluacion='$evaluacion',observa='$observa' WHERE n_reporte=$nreporte";
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