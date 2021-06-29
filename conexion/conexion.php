<?php 
	
	//instancia clase mysqli para la conexion al servidor base de datos- 4 parametros 
	$conexion = new mysqli('localhost','root','','control_de_reportes');
	//si mustra un errro al momento de querer conectarse 
	if ($conexion->connect_error):
			echo "Error de Conexión".$conexion->connect_error;
	endif;
?>