<?php include ("../conexion/conexion.php");
  
	$opcion = $_POST["opcion"];
	$informacion = [];//<---Arreglo

	if($opcion === 'atender'){

	$nreporte = $_POST['nreporte'];
	$falla_interna = $_POST['falla_interna'];
	$falla_xterna = $_POST['falla_xterna'];
	$estado_rpt = $_POST['estado_rpt'];
	$rspst = $_POST['rspst'];

		ini_set('date.timezone','America/Mexico_City');
		$Final = date('Y').'/'.date('m').'/'.date('d');	
		$Hfinal=date('H:i:s');

	if($rspst =='NO'){
	$servicio  = substr($_POST['servicio'],1);
	$intervencion = substr($_POST['intervencion'],1);
	$descripcion = $_POST['descripcion'];
	
		if(atender($nreporte,$servicio,$intervencion,$descripcion,$falla_interna,$falla_xterna,$estado_rpt,$Final,$Hfinal,$conexion))
			{	echo "$estado_rpt";	}else{	echo "1";	}	

	}else{

		if(atndr($nreporte,$falla_interna,$falla_xterna,$estado_rpt,$Final,$Hfinal,$conexion))
			{	echo "$estado_rpt";	}else{	echo "1";	}
		}
	}

	function atender($nreporte,$servicio,$intervencion,$descripcion,$falla_interna,$falla_xterna,$estado_rpt,$Final,$Hfinal,$conexion){

		$query = "UPDATE reporte SET servicio = '$servicio',intervencion = '$intervencion',descripcion = '$descripcion',falla_interna = '$falla_interna',falla_xterna = '$falla_xterna', ffinal = '$Final', estado_rpt = '$estado_rpt', hfinal = '$Hfinal' WHERE n_reporte=$nreporte";
		if (mysqli_query($conexion,$query)) {
			return true;
			}else
			{
			return false;
			}
		cerrar($conexion);
	}

	function atndr($nreporte,$falla_interna,$falla_xterna,$estado_rpt,$Final,$Hfinal,$conexion){

		$query = "UPDATE reporte SET falla_interna = '$falla_interna',falla_xterna = '$falla_xterna', ffinal = '$Final', estado_rpt = '$estado_rpt', hfinal = '$Hfinal' WHERE n_reporte=$nreporte";	
		if (mysqli_query($conexion,$query)) {
			return true;
			}else
			{
			return false;
			}
		cerrar($conexion);
	}

?>