<?php 

	include ("../conexion/conexion.php");
	$opcion = $_POST["opcion"];

	if($opcion==='guardar'){
	$id_climan=$_POST['id_climan'];
	$comentar=$_POST['comentar'];
	$id_usu=$_POST['id_usu'];
    ini_set('date.timezone','America/Mexico_City');
    $meses = array("Ene","Feb","Mar","Abr","May","Jun","Jul","Ago","Sep","Oct","Nov","Dic");        
    $fecha= date('d').'/'.$meses[date('n')-1].'/'.date('Y');
	$hora= date('h:i a');
	$nombre=$_POST['nombre'];
	


	$sql="INSERT into comentario (id,id_climan,comentar,id_usu,visto,fecha,hora,nombre,estado) values 
	(0,'$id_climan','$comentar','$id_usu',0,'$fecha','$hora','$nombre',1)";
	echo $result=mysqli_query($conexion,$sql);
	
	}else if($opcion==="editar"){

	$id=$_POST['id'];
	$comentar=$_POST['comentar'];
	 ini_set('date.timezone','America/Mexico_City');
    $meses = array("Ene","Feb","Mar","Abr","May","Jun","Jul","Ago","Sep","Oct","Nov","Dic");        
    $fecha= date('d').'/'.$meses[date('n')-1].'/'.date('Y');
	$hora= date('h:i a');

	$sql="UPDATE comentario set comentar='$comentar', fecha='$fecha', hora='$hora' where id='$id'";
	echo $result=mysqli_query($conexion,$sql);

}else if($opcion==="eliminar"){

	$id=$_POST['id'];

	$sql="UPDATE comentario SET estado = 0 where id='$id'";
	echo $result=mysqli_query($conexion,$sql);

}else if($opcion==="actualiza"){

	$id_usu = $_POST['id_usu'];
	
	$sql="UPDATE comentario SET visto = 1 WHERE id_usu = '$id_usu'";
	echo $result=mysqli_query($conexion,$sql);

}
 ?>