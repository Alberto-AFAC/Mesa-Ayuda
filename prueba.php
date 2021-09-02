<?php
include('conexion/conexion.php');

// $query = "SELECT idtec FROM reporte ORDER BY n_reporte DESC ";
// $res = mysqli_query($conexion,$query);
// $result = mysqli_fetch_row($res);
// //selecionamos el ultimo ID técnico de la fila reportes

// if(!empty($result[0])){
// 	echo 'Ultimo ID de la tabla reportes:->'.$idtecnico = $result[0];
// 	echo '<br>';
// 	echo '<br>';

// }else{
// 	echo 'Sino hay registros en la tabla que por defecto de:->'.$idtecnico = 0;
// 	echo '<br>';
// 	echo '<br>';

// }


// echo 'Comparamos ID técnico de la tabla reportes con ID técnico de la tabla de técnicos<br>
// 	  ID técnico reportes es mayor o igual a ID técnico tabla técnicos <br> 
// 	  Muestrame el autoincremento partiendo desde cero'; 
// 	echo '<br>';
// 		echo '<br>';

// $query = "SELECT id_tecnico,nombre,apellidos FROM usuarios 
// 		  INNER JOIN tecnico ON id_usuario = id_usu 
// 		  WHERE privilegios = 'tecnico' AND activo = 0 AND baja = 0 ORDER BY id_tecnico ASC ";
// $result = mysqli_query($conexion,$query);

// $n=0;
// while ($res = mysqli_fetch_row($result)) {


// echo'compara----> '.$res[0];
// echo '<br>';

// if($idtecnico >= $res[0]){
// echo 'resultado de conteo-->'.$n++;
// echo '<br>';
// echo'resultado de comparación----> '.$res[0];
// echo '<br>';
// echo '<br>';
// }
// $pila[] = array($res[0]);

// }
// echo '<br>';
// echo 'Resultado final del coteo--->'.$n;
// echo '<br>';
// echo '<br>';

// if(!empty($pila[$n][0])){
// 	echo 'Proximo técnico: '.$pila[$n][0];
// }else{
// 	echo 'Proximo técnico: '.$pila[0][0];
// }

$sede = 'LAS FLORES';
$idtec = selecTec($conexion,$sede);


echo $idtec;

function selecTec($conexion,$sede){

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
}	


// echo "<br>";

// $valor1 = '11';
// $valor2 = 'CIAAC';

// $valor3 = $valor1.','.$valor2;

// $valor3;

//  $valor = explode(',', $valor3);
//  echo $valor[1];

?>