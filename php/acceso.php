<?php
include ("../../gestor/conexion/conexion.php");
include ("../conexion/conexion.php"); 
session_start(); 
if (isset($_SESSION['usuario'])){
	$id = $_SESSION['usuario']['id_usu'];
}else{ 
	header('Location: ../../gestor'); 
}
$query = "SELECT * FROM tecnico WHERE id_usu = $id AND baja = 0";
$resultado = mysqli_query($conexion, $query);
if($data = mysqli_fetch_array($resultado)){

	// echo $data['privilegios'];

	if($data['privilegios']=='admin'){
		header('Location: ../administrador');
	}else if($data['privilegios']=='super_admin'){
		header('Location: ../administrador');
	}else if($data['privilegios']=='tecnico'){
		header('Location: ../tecnico');
	}else if($data['privilegios']=='admin-web'){
	}else{
	header('Location: ../usuario'); 			
	}

}else{	
	header('Location: ../usuario'); 	
}
?>