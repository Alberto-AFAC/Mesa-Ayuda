<?php
	include("../conexion/conexion.php");
    header('Content-Type: application/json');
	session_start();
	
	$query1 = "SELECT 
         n_reporte,
         n_empleado empleado,
         DATE_FORMAT(finicio, '%d/%m/%Y' ) AS finicio,
         DATE_FORMAT(ffinal, '%d/%m/%Y' ) AS ffinal,
        YEAR(finicio) AS anio,
         evaluacion,
         estado_rpt,
         id_usu
         FROM reporte
         INNER JOIN tecnico ON idtec = id_tecnico 
         WHERE 	MONTH ( finicio ) = MONTH (CURRENT_DATE ()) 
     ORDER BY
         n_reporte DESC";
	$resultado = mysqli_query($conexion, $query1);
    if(!$resultado){
		die("Error");
	}else{
        while($data = mysqli_fetch_array($resultado)){
            $idempleado=$data['empleado'];
            $idper = $data['id_usu'];
            $sql2="SELECT gstNombr,
                          gstApell,
                          gstExTel,
                          gstNmpld
                          FROM personal
                        WHERE
                        gstNmpld = $idempleado";
    $result2=mysqli_query($conexion2,$sql2);
    // if(!$result2){
	// 	die("Error en segunda consulta");
	// }else{
    while($data2=mysqli_fetch_array($result2)){

            $sql3="SELECT gstNombr,
                          gstApell,
                          gstExTel,
                          gstNmpld
                          FROM personal
                        WHERE
                        gstIdper = $idper";
    $result3=mysqli_query($conexion2,$sql3);
    while($data3=mysqli_fetch_array($result3)){         
        // $ext = $dato['gstExTel'];
        // $nombre = $dato['gstNombr'];
        // $apellidos = $dato['gstApell'];
        // $idpersona = $dato['gstIdper'];
            if($data['ffinal'] == '0000-00-00'){
                $NA = "Sin fecha";

            } else {
                $NA = $data['ffinal'];
            };
            if($data['evaluacion'] == '0'){
                $eva = "SIN EVALUAR";
            } else {
                $eva = $data['evaluacion'];
            }

	
    if($data['estado_rpt'] == 'Finalizado'){
      
	 $admin[] = [ $data["anio"],$data["n_reporte"],$data2["gstNombr"],$data2["gstApell"],$data["finicio"]];
       
   

    }
}
    }

		}
	}



			if(isset($admin)&&!empty($admin )){

			$json_string = json_encode(array( 'data' => $admin ));
			echo $json_string;
			}else{

			echo $admin ='SIN DATOS';
			}

		mysqli_free_result($resultado);
		mysqli_close($conexion);

?>
