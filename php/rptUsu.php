	<?php 
	include ("../conexion/conexion.php");
	// include_once('../php-mailer/class.phpmailer.php');
	// include_once('../php-mailer/class.smtp.php');
	$opcion = $_POST["opcion"];
	$informacion = [];//<---Arreglo

 if($opcion === 'registrar'){

 	$usu_sede = $_POST['sede'];
	$servicio  = substr($_POST['servicio'],1);
	
	if($usu_sede=='AFAC - AIFA' || $usu_sede=='OTRO'){
	$sede = 'LAS FLORES';
	$tipo = 'TEC-';		
	if($servicio=='SISTEMAS'){
	$sede = 'WEB';
	$tipo = 'SIS-';
	}
	}else{
	
	$sede = $_POST['sede'];
	if($servicio=='SISTEMAS'){
	$sede = 'WEB';
	$tipo = 'SIS-';
	}else{
	$sede = $_POST['sede'];
	$tipo = 'TEC-';
	}
	
	}

	$nempleado = $_POST['nempleado'];	
	
	$intervencion = substr($_POST['intervencion'],1);
	$descripcion = substr($_POST['descripcion'],1);
	$solucion = substr($_POST['solucion'],1);
	$ultima = substr($_POST['ultima'],1);
	$final = $_POST['final'];



if(consultar($nempleado,$servicio,$intervencion,$descripcion,$solucion,$ultima,$final,$conexion)){

	$idequipo = $_POST['idequipo'];
	$obser = $_POST['obser'];

	$idtec = selecTec($sede,$conexion);

	ini_set('date.timezone','America/Mexico_City');
	$fenvio= date('Y').'/'.date('m').'/'.date('d');	
	$Hinic=date('H:i');

if(registrar($nempleado,$idequipo,$servicio,$intervencion,$descripcion,$solucion,$ultima,$final,$obser,$fenvio,$Hinic,$sede,$idtec,$conexion)){
//		 echo "0";
		// enviarCorreo($nempleado,$conexion);		
			registrarSede($nempleado,$usu_sede,$conexion);
			$folio_rpt = consultarReporte($conexion);
			echo $tipo.$folio_rpt;			
		 	}else{	echo "1";	}	

		}else{
			echo "1";
		}	
	}else
	

	if($opcion === 'evaluar'){

	$nreporte = $_POST['nreporte'];
	$conocimientos = $_POST['conocimientos'];
	$actitud = $_POST['actitud'];
	$habilidades = $_POST['habilidades'];
	$respuesta = $_POST['respuesta'];
	$solucion = $_POST['solucion'];
	$calidad = $_POST['calidad'];
	$observa = $_POST['observa'];

		if(evaluar($nreporte,$conocimientos,$actitud, $habilidades, $respuesta, $solucion, $calidad,$observa,$conexion)){
		echo "0";

		validaRport($nreporte,$conexion);

		}else{	echo "1";	}	
	}else

	if($opcion === 'registrarRport'){

 	$usu_sede = $_POST['sede'];
	$servicio  = substr($_POST['servicio'],1);

	if($usu_sede=='AFAC - AIFA' || $usu_sede=='OTRO'){
	$sede = 'LAS FLORES';
	}else{
	$sede = $_POST['sede'];
	if($servicio=='SISTEMAS'){
	$sede = 'WEB';
	$tipo = 'SIS-';
	}else{
	$sede = $_POST['sede'];
	}
	$tipo = 'TEC-';
	}

	$nempleado = $_POST['nempleado'];	
	// $servicio  = substr($_POST['servicio'],1);
	$intervencion = substr($_POST['intervencion'],1);
	$descripcion = substr($_POST['descripcion'],1);
	$solucion = substr($_POST['solucion'],1);
	$ultima = substr($_POST['ultima'],1);
	$final = $_POST['final'];

if(consultar($nempleado,$servicio,$intervencion,$descripcion,$solucion,$ultima,$final,$conexion)){

			
	$idequipo = $_POST['idequipo'];
	$obser = $_POST['obser'];
	// $sede = $_POST['sede'];

	$idtec = $_POST['idTec'];

	ini_set('date.timezone','America/Mexico_City');
	$fenvio= date('Y').'/'.date('m').'/'.date('d');	
	$Hinic=date('H:i');

if(registrar($nempleado,$idequipo,$servicio,$intervencion,$descripcion,$solucion,$ultima,$final,$obser,$fenvio,$Hinic,$sede,$idtec,$conexion)){
//		 echo "0";
		// enviarCorreo($nempleado,$conexion);		
			registrarSede($nempleado,$usu_sede,$conexion);
			$folio_rpt = consultarReporte($conexion);
			echo $tipo.$folio_rpt;			
		 	}else{	echo "1";	}	

		}else{
			echo "1";
		}

	}else if($opcion === 'cnfrmrRprt'){

	$nreporte = $_POST['nreporte'];
	$observa = $_POST['observa'];
	$confirmar = $_POST['confirmar'];

		if($confirmar==2){
			$estado = 'Pendiente';
		}else{
			$estado = 'Finalizado';
		}


		if(confirmar($nreporte,$observa,$confirmar,$estado,$conexion)){
		echo "0";
	//	validaRport($nreporte,$conexion);
		}else{	echo "1";	}	
	}

function selecTec($sede,$conexion){

ini_set('date.timezone','America/Mexico_City');
$actual=date('H:i:00');
$hora = $actual;

///////////BUSQUEDA TÉCNICOS EN UN RANGO DE HORA ENTRADA A 18:00:00//////////////
$query="SELECT id_tecnico FROM tecnico 
		  WHERE sede = '$sede' AND activo = 0 AND baja = 0 AND '$hora' BETWEEN entrada AND salida ORDER BY id_tecnico ASC ";
	$resultados = mysqli_query($conexion,$query);
	if($resultados->num_rows == 0){
///////////BUSQUEDA TÉCNICOS EN UN RANGO DE HORA ENTRADA ANTES DE LAS 09:00:00//////////////
$query="SELECT id_tecnico FROM tecnico 
		  WHERE  sede = '$sede' AND activo = 0 AND baja = 0 AND '08:00:00' >= entrada ORDER BY id_tecnico ASC ";
	$resultados = mysqli_query($conexion,$query);
	if($resultados->num_rows == 0){
//SI EL REPORTE SE GENERA DESPUÉS DE LAS 18:00:00 SE ASIGNA A LOS TÉCNICOS QUE ENTRAN ANTES DE LAS 09:00:00//
			$query = "SELECT idtec FROM reporte WHERE pila = '$sede' ORDER BY n_reporte DESC ";
			$res = mysqli_query($conexion,$query);
			$result = mysqli_fetch_row($res);
			if(!empty($result[0])){	$idtecnico = $result[0];	}else{	$idtecnico = 0;	}
			$query = "SELECT id_tecnico FROM tecnico 
					  WHERE sede = '$sede' AND activo = 0 AND baja = 0 ORDER BY id_tecnico ASC ";
			$result = mysqli_query($conexion,$query);
			$n=0;
			while ($res = mysqli_fetch_row($result)) {
			if($idtecnico >= $res[0]){
			$n++;
			}
			$idtec[] = array($res[0]);
			}
			if(!empty($idtec[$n][0])){
				return $idtec[$n][0];
			}else{
				return $idtec[0][0];
			}		

	}else{

///////////TÉCNICOS EN UN RANGO DE HORA ENTRADA A 18:00:00//////////////

		$query = "SELECT idtec FROM reporte WHERE pila = '$sede' ORDER BY n_reporte DESC ";
		$res = mysqli_query($conexion,$query);
		$result = mysqli_fetch_row($res);
		if(!empty($result[0])){	$idtecnico = $result[0];	}else{	$idtecnico = 0;	}
		$query = "SELECT id_tecnico FROM tecnico 
		  WHERE sede = '$sede' AND activo = 0 AND baja = 0 AND '08:00:00' >= entrada ORDER BY id_tecnico ASC ";
		$result = mysqli_query($conexion,$query);
		$n=0;
		while ($res = mysqli_fetch_row($result)) {
		if($idtecnico >= $res[0]){
		$n++;
		}
		$idtec[] = array($res[0]);
		}
		if(!empty($idtec[$n][0])){
		return $idtec[$n][0];
		}else{
		return $idtec[0][0];
			}
		}
	}else{
///////////TÉCNICOS EN UN RANGO DE HORA ENTRADA A 18:00:00//////////////
	$query = "SELECT idtec FROM reporte WHERE pila = '$sede' ORDER BY n_reporte DESC ";
	$res = mysqli_query($conexion,$query);
	$result = mysqli_fetch_row($res);
	if(!empty($result[0])){	$idtecnico = $result[0];	}else{	$idtecnico = 0;	}
	$query = "SELECT id_tecnico FROM tecnico 
			  WHERE sede = '$sede' AND privilegios = 'tecnico' AND activo = 0 AND baja = 0 AND '$hora' BETWEEN entrada AND salida ORDER BY id_tecnico ASC ";
	$result = mysqli_query($conexion,$query);
	$n=0;
	while ($res = mysqli_fetch_row($result)) {
	if($idtecnico >= $res[0]){
	$n++;
	}
	$idtec[] = array($res[0]);
	}
	if(!empty($idtec[$n][0])){
		return $idtec[$n][0];
	}else{
		return $idtec[0][0];
	}
  }
}	

function consultarReporte($conexion){

$query = "SELECT n_reporte FROM reporte ORDER BY n_reporte DESC LIMIT 1";
$result = mysqli_query($conexion,$query);
while ($res = mysqli_fetch_row($result)) {
		return $res[0];
	}
}

function consultar($nempleado,$servicio,$intervencion,$descripcion,$solucion,$ultima,$final,$conexion){

$query="SELECT * FROM reporte WHERE 
n_empleado = $nempleado AND
servicio = '$servicio' AND
intervencion = '$intervencion' AND
descripcion = '$descripcion' AND
solucion = '$solucion' AND
ultima = '$ultima' AND
final = '$final' AND
evaluacion = '0'";
$resultado= mysqli_query($conexion,$query);
		if($resultado->num_rows==0){
		return true;
		}else{
		return false;	
		}
		$this->conexion->cerrar();
}


function registrar($nempleado,$idequipo,$servicio,$intervencion,$descripcion,$solucion,$ultima,$final,$obser,$fenvio,$Hinic,$sede,$idtec,$conexion){

$query = "INSERT INTO reporte VALUES(0,'$nempleado','$idequipo','$servicio','$intervencion','$descripcion','$solucion','$ultima','$final','$obser','0','0','$fenvio','$Hinic','0','0','0','0','Por atender','$sede','$idtec');";
			if (mysqli_query($conexion,$query)){		
				
				return true;
				}else{
					return false;
					}
	cerrar($conexion);
	//}								 	
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
	
	function evaluar($nreporte,$conocimientos,$actitud, $habilidades,$respuesta, $solucion, $calidad, $observa,$conexion){
		$query = "INSERT INTO evaluacion VALUES(0,$nreporte,'$conocimientos','$actitud','$habilidades','$respuesta', '$solucion', '$calidad','$observa',0)";
		if (mysqli_query($conexion,$query)) {
			return true;
			}else
			{
			return false;
			}
		cerrar($conexion);
	}

	function validaRport($nreporte,$conexion){

	$query = "UPDATE reporte SET evaluacion = '1' WHERE n_reporte = $nreporte";
	if(mysqli_query($conexion,$query)){

		return true;

		}else{

			return false;
		}
	cerrar($conexion);

	}

	function confirmar($nreporte,$observa,$confirmar,$estado,$conexion){

	$query = "UPDATE reporte SET evaluacion = '$confirmar', observa ='$observa', estado_rpt = '$estado' WHERE n_reporte = $nreporte";
	if(mysqli_query($conexion,$query)){

		return true;

		}else{

			return false;
		}
		cerrar($conexion);		
	}

	function registrarSede($nempleado,$usu_sede,$conexion){	
	// INSERT INTO sede VALUES(0,$nempleado,0,'$usu_sede',0)
	$query = "INSERT INTO sede(nmple,idrep,titulo) SELECT $nempleado,n_reporte,'$usu_sede' FROM reporte ORDER BY n_reporte DESC LIMIT 1";


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