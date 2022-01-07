<?php 
	
	//instancia clase mysqli para la conexion al servidor base de datos- 4 parametros 
	 $conexion = new mysqli('localhost','root','','control_de_reportes');
	 $conexion2 = new mysqli('localhost','root','','gestor');

	//instancia clase mysqli para la conexion al servidor base de datos- 4 parametros 
	//$conexion = new mysqli('localhost','u683645102_afac','Agencia.SCT2021.','u683645102_reportes');
	//$conexion2 = new mysqli('localhost','u683645102_root','Agencia.SCT2021.','u683645102_gestor');
	//si mustra un errro al momento de querer conectarse 
	
	if ($conexion->connect_error):
			echo "Error de Conexión".$conexion->connect_error;
	endif;

	if ($conexion2->connect_error):
			echo "Error de Conexión".$conexion2->connect_error;
	endif;
?>