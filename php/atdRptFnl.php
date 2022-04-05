<?php include ("../conexion/conexion.php");
  
	$opcion = $_POST["opcion"];
	$informacion = [];//<---Arreglo

	if($opcion === 'atender'){

	$nreporte = $_POST['nreporte'];
	$falla_interna = $_POST['falla_interna'];
	$falla_xterna = $_POST['falla_xterna'];
	$estado_rpt = $_POST['estado_rpt'];
	$rspst = $_POST['rspst'];
	$sede = $_POST['sede'];

		ini_set('date.timezone','America/Mexico_City');
		$Final = date('Y').'/'.date('m').'/'.date('d');	
		$Hfinal=date('H:i:s');

	if($rspst =='NO'){
	$servicio  = substr($_POST['servicio'],1);
	$intervencion = substr($_POST['intervencion'],1);
	$descripcion = substr($_POST['descripcion'],1);
	$solucion = substr($_POST['solucion'],1);
	$ultima = substr($_POST['ultima'],1);
	$final = $_POST['final'];

	
		if(atender($nreporte,$servicio,$intervencion,$descripcion,$solucion,$ultima,$final,$falla_interna,$falla_xterna,$estado_rpt,$Final,$Hfinal,$conexion))
			{	echo "$estado_rpt";	
				saveSede($nreporte,$sede,$conexion);
	}else{	echo "1";	}	

	}else{

		if(atndr($nreporte,$falla_interna,$falla_xterna,$estado_rpt,$Final,$Hfinal,$conexion))
			{	echo "$estado_rpt";	
				saveSede($nreporte,$sede,$conexion);
			}else{	echo "1";	}
		}
	}

	function atender($nreporte,$servicio,$intervencion,$descripcion,$solucion,$ultima,$final,$falla_interna,$falla_xterna,$estado_rpt,$Final,$Hfinal,$conexion){

		$query = "UPDATE reporte SET servicio = '$servicio',intervencion = '$intervencion',descripcion = '$descripcion',solucion='$solucion',ultima='$ultima',final='$final',falla_interna = '$falla_interna',falla_xterna = '$falla_xterna', ffinal = '$Final', estado_rpt = '$estado_rpt', hfinal = '$Hfinal',evaluacion='0' WHERE n_reporte=$nreporte";
		if (mysqli_query($conexion,$query)) {
			return true;
			}else
			{
			return false;
			}
		cerrar($conexion);
	}

	function atndr($nreporte,$falla_interna,$falla_xterna,$estado_rpt,$Final,$Hfinal,$conexion){

		$query = "UPDATE reporte SET falla_interna = '$falla_interna',falla_xterna = '$falla_xterna', ffinal = '$Final', estado_rpt = '$estado_rpt', hfinal = '$Hfinal',evaluacion='0' WHERE n_reporte=$nreporte";	
		if (mysqli_query($conexion,$query)) {
			return true;
			}else
			{
			return false;
			}
		cerrar($conexion);
	}

	function saveSede($nreporte,$sede,$conexion){
		$query = "UPDATE sede SET titulo = '$sede' WHERE idrep=$nreporte";	
		if (mysqli_query($conexion,$query)) {
			return true;
			}else
			{
			return false;
			}
		cerrar($conexion);		
	}

?>