<?php
$conexion = new mysqli('localhost','root','','control_de_reportes');
$query1 = "SELECT 
         n_reporte,
         n_empleado empleado,
         DATE_FORMAT(finicio, '%d/%m/%Y' ) AS finicio,
         DATE_FORMAT(ffinal, '%d/%m/%Y' ) AS ffinal,
         reporte.evaluacion,
         reporte.estado_rpt 
         FROM REPORTE
         WHERE 	MONTH ( finicio ) = MONTH (
         CURRENT_DATE ()) 
         AND estado_rpt = 'Por atender'
     ORDER BY
         n_reporte DESC";
	$resultado = mysqli_query($conexion, $query1);
        while($data = mysqli_fetch_array($resultado)){   
            $idempleado=$data['empleado'];
            $conexion2 = new mysqli('localhost','root','','gestor');
            $sql2="SELECT gstNombr,
                          gstApell
                          FROM personal
                        WHERE
                        gstNmpld = $idempleado";
    $result2=mysqli_query($conexion2,$sql2);
    while($data2=mysqli_fetch_array($result2)){
    }
}
//   $query1 = "SELECT 
//          reporte.n_reporte,
//                      tecnico.usuario,
//          reporte.hinicio,
//          DATE_FORMAT(reporte.finicio, '%d/%m/%Y') as finicio,
//          reporte.evaluacion,
//          reporte.estado_rpt,
//          reporte.descripcion,
//          DATE_FORMAT(reporte.ffinal, '%d/%m/%Y') as ftermino,
//          reporte.hfinal,
//          reporte.servicio,
//          reporte.intervencion,
//          reporte.falla_interna,
//          reporte.falla_xterna,
//          reporte.observa,
//          reporte.usu_observ,
//          tecnico.id_usu cursos                
//          FROM reporte
//              RIGHT JOIN tecnico
//              ON id_tecnico = idtec
//              WHERE reporte.n_empleado = '12345678'";
// $resultado = mysqli_query($conexion, $query1);
// while($dato = mysqli_fetch_array($resultado)){
//     $idpersona=$dato['cursos'];
//     $conexion2 = new mysqli('localhost','root','','gestor');
//     $sql2="SELECT gstIdper,
// 	gstNombr,
// 	gstApell,
// 	gstExTel 
//     FROM
// 	personal 
//     WHERE
// 	gstIdper = $idpersona";
//     $result2=mysqli_query($conexion2,$sql2);
//     while($mostrar2=mysqli_fetch_array($result2)){
// 		echo $mostrar2['gstNombr'];
// 		echo $dato['n_reporte'];
// 	}
// }
		?>