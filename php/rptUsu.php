	<?php 
	include ("../conexion/conexion.php");
	// include_once('../php-mailer/class.phpmailer.php');
	// include_once('../php-mailer/class.smtp.php');
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

	$idtec = selecTec($conexion);
	
	if($idequipo == 0){
		registraEqpo($nempleado,$modelo,$serie,$verwind,$proceso,$conexion);
	}

ini_set('date.timezone','America/Mexico_City');
$fenvio= date('Y').'/'.date('m').'/'.date('d');	
$Hinic=date('H:i');

if(registrar($nempleado,$servicio,$intervencion,$descripcion,$obser,$idequipo,$fenvio,$Hinic,$idtec,$conexion)){
//		 echo "0";
		// enviarCorreo($nempleado,$conexion);		
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

function selecTec($conexion){

$query = "SELECT idtec FROM reporte ORDER BY n_reporte DESC ";
$res = mysqli_query($conexion,$query);
$result = mysqli_fetch_row($res);
if(!empty($result[0])){	$idtecnico = $result[0];	}else{	$idtecnico = 0;	}
$query = "SELECT id_tecnico,nombre,apellidos FROM usuarios 
		  INNER JOIN tecnico ON id_usuario = id_usu 
		  WHERE privilegios = 'tecnico' AND activo = 0 AND baja = 0 ORDER BY id_tecnico ASC ";
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

function registrar($nempleado,$servicio,$intervencion,$descripcion,$obser,$idequipo,$fenvio,$Hinic,$idtec,$conexion){
	// $query="SELECT * FROM asignacion  
	// 		INNER JOIN reporte
	// 		ON n_emp = n_empleado
	// 		INNER JOIN equipo
	// 		ON id_equi = id_equipo
	// 		WHERE n_emp = '$nempleado' AND id_equi = '$idequipo' AND estado_rpt = 'Pendiente'";
	// $resultados = mysqli_query($conexion,$query);
	// if($resultados->num_rows == 0){

$query = "INSERT INTO reporte(n_empleado,idequipo,servicio,intervencion,descripcion,usu_observ,falla_interna,falla_xterna,finicio,hinicio,ffinal,hfinal,evaluacion,observa,estado_rpt,pila,idtec) SELECT '$nempleado',id_equipo,'$servicio','$intervencion','$descripcion','$obser','0','0','$fenvio','$Hinic','0','0','0','0','Pendiente','0','$idtec' FROM equipo ORDER BY id_equipo DESC LIMIT 1";
	
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

// function enviarCorreo($nempleado,$conexion){
// 	// AQUÍ SE CREA Y ENVÍA EL REPORTE PARA EL TECNICO

// 		$query = "SELECT MAX(reporte.n_reporte),
// 		usuarios.nombre,
// 		usuarios.apellidos,
// 		usuarios.ubicacion,
// 		usuarios.extension,
// 		usuarios.correo,
// 		reporte.n_empleado,
// 		reporte.finicio,
// 		reporte.hinicio,
// 		reporte.descripcion,
// 		reporte.ffinal,
// 		reporte.hfinal,
// 		reporte.servicio,
// 		reporte.intervencion,
// 		reporte.falla_interna,
// 		reporte.falla_xterna,
// 		reporte.observa,
// 		reporte.usu_observ 
// 	FROM
// 		reporte
// 		RIGHT JOIN tecnico ON id_tecnico = idtec
// 		LEFT JOIN usuarios ON id_usuario = id_usu 
// 	WHERE
// 		reporte.n_empleado = $nempleado";		
// 		$resultados = mysqli_query($conexion,$query);
// 		$fila   = mysqli_fetch_assoc($resultados);
// 		$fila['n_reporte'];
// 		$mail = new PHPMailer();
// 		$mail->IsSMTP();
// 		$mail->SMTPAuth = true;
// 		$mail->SMTPSecure = "ssl";
// 		$mail->CharSet = "Content-Type: text/html; charset=utf-8";
// 		$mail->Host = "smtp.gmail.com";
// 		$mail->Port = 465;
// 		$mail->Username ='jmondragonescamilla@gmail.com';
// 		$mail->Password = 'ELVIS_wolf97';

// 		$mail->AddAddress('jmondragonescamilla@gmail.com');
// 		$mail->Subject = "SOLICITUD DE SERVICIO";
// 		$msg = "<center><img src='https://www.aeropuertodetoluca.com.mx/en/admin/images/iconos-autoridad/autoridad-aeronautica.png' width='320px;' alt='imagen de cabezera' disabled></center><table width='100%'><br>
// 			<tr><td bgcolor='#00A7B5' align='center'><span style='font-size: 19px; color: white'>SOLICITUD DE SERVICIO</span></td></tr>
// 			<tr><td style='text-align: center; font-size: 15px;'>Folio: ".$fila['n_reporte']."</td></tr>
// 			<tr><td style='text-align: center; font-size: 15px;'>N° Empleado: </td></tr>
// 			<tr><td style='text-align: center; font-size: 15px;'>Tipo de curso: </td></tr>
// 			<tr><td style='text-align: center; font-size: 15px;'>Fecha Inicio: </td></tr>
// 			<tr><td style='text-align: center; font-size: 15px;'>Hora: </td></tr>
// 			<tr><td style='text-align: center; font-size: 15px;'>Cargo: </td></tr>
// 			<tr><td style='text-align: center; font-size: 15px;'>Sede del curso: </td></tr>
// 			<tr><td style='text-align: center; font-size: 15px;'>Modalidad: </td></tr>
// 			<hr><center>
// 			<font color='#a1a1a1'>NOTA IMPORTANTE: Este correo se genera automaticamente. Por favor no responda o reenvie correos a de esta cuenta de e-mail.
// 			</center><hr>
// 			</table>";
// 		$mail->MsgHTML($msg);
// 		$mail->send();

// 	}


	function cerrar($conexion){
		mysqli_close($conexion);
	}
 ?>