<script type="text/javascript">
var dataSet = [
    <?php
	    // $idtecnico = $_SESSION['usuario']['id_tecnico'];
	    $query = "SELECT 
        DATE_FORMAT(reporte.finicio, '%d/%m/%Y') AS iniciotab,
        DATE_FORMAT(reporte.ffinal, '%d/%m/%Y') as finaltab,
		reporte.n_reporte,
		reporte.finicio, 
		reporte.ffinal,
		reporte.estado_rpt,
		reporte.servicio,
		reporte.intervencion,
		reporte.descripcion,
		reporte.usu_observ,
		reporte.n_reporte,
		reporte.falla_interna,
		reporte.falla_xterna,
		reporte.observa,
		reporte.evaluacion,
		reporte.hinicio,
		reporte.hfinal,
		reporte.idequipo,
        n_empleado empleado
		FROM reporte 
		WHERE  reporte.idtec = '$idtecnico'";
	$resultado = mysqli_query($conexion, $query);
        while($data = mysqli_fetch_array($resultado)){
            $idempleado=$data['empleado'];
         $sql2="SELECT gstNombr,
                          gstApell,
                          gstExTel,
                          gstNmpld
                          FROM personal
                        WHERE
                        gstNmpld = $idempleado";
    $result2=mysqli_query($conexion2,$sql2);
    while($data2=mysqli_fetch_array($result2)){
           $nemple = $data2['gstNmpld'];
        // COMPARTE DATES WITH DATA IS ZERO
        $hoy = date("y-m-d g:i a"); 
        $fecha1 = new DateTime($data['finicio']."".$data['hinicio']);
        $fecha2 = new DateTime($hoy);
        $intervalo = $fecha1->diff($fecha2);
        $total = $intervalo->format('%H hrs %i min');//00 años 0 meses 0 días 08 horas 0 minutos 0 segundos
        // COMPARE DATES WITH DATA IS + 1
        $fechafinalizada1 = new DateTime($data['finicio']."".$data['hinicio']);
        $fechafinalizada2 = new DateTime($data['ffinal']."".$data['hfinal']);
        $intervalo = $fechafinalizada1->diff($fechafinalizada2);
        $totalFinal = $intervalo->format('%H hrs %i min');//00 años 0 meses 0 días 08 horas 0 minutos 0 segundos

        if($data['ffinal'] == '0000-00-00' && $data['hfinal'] == '00:00:00'){
            $tiempos = $total;

        } else {
          
            $tiempos = $totalFinal;

        }


    $querys = "SELECT * FROM prioridad WHERE n_empleado = $nemple AND estado = 0";
    $resultados = mysqli_query($conexion,$querys); 
    if($datas = mysqli_fetch_array($resultados)){
    $prio = $datas["prioridads"];
    }else{
    $prio = 'NORMAL';
    }

            $finaltab = $data['finaltab'];
            $iniciotab = $data['iniciotab']; 
            $fila = $idtecnico;
            $nombre = $data2['gstNombr'];
            $apellidos = $data2['gstApell']; 
            $ubicacion = '';
            $arg = '';
            $extension = $data2['gstExTel'];
            $final = $data['ffinal'];
            $inicio = $data['finicio'];


            // if($data['HORAFINAL'] <= 5 || $data['HORAFINAL'] <=10){
            //     $tTotal = "<span title='A tiempo' style='background-color: green;' class='badge'>".$data['HORAFINAL']." hrs</i></span>";
            // } else if($data['HORAFINAL'] <= 6 || $data['HORAFINAL'] <=15){
            //     $tTotal = "<span title='Fuera de tiempo' style='background-color: black;' class='badge'>".$data['HORAFINAL']." hrs</span>";
            // } else if($data['HORAFINAL'] >= 24 ){
            //     $tTotal = "<span title='Fuera de tiempo' style='background-color: red;' class='badge'>".$data['HORAFINAL']." hrs</span>";
            // } 
            
  $actual = date('d/m/Y');

if($inicio==$actual || $data['estado_rpt'] == 'Por atender' || $data['estado_rpt'] == 'Pendiente'){
        ?>

    ["<?php echo $data['n_reporte'] ?>", "<?php echo $prio ?>", "<?php echo $nombre . " " . $apellidos ?>",
        "<?php echo $extension?>",
        "<?php echo $data['servicio']?>", "<?php echo $iniciotab ?>", "<?php echo $finaltab?>",
        "<?php echo $tiempos ?>", "<?php if($data['estado_rpt'] == 'Por atender'){
                
                // echo "<a href='' type='button' data-toggle='modal' data-target='#modalDtll' class='detalle btn btn-danger' onclick='detalle({$data['n_reporte']})' style='width:100%; font-size:12px;'>Por atender</a>";

                echo "<a href='#' type='button' data-toggle='modal' data-target='#modalAtndr' class='detalle btn btn-danger' onclick='atender({$data['n_reporte']})' style='width:100%; font-size:12px;'>POR ATENDER</a>"; 

                if($data['servicio']=='CÓMPUTO'){ echo "<center><a href='#' type='button' data-toggle='modal' data-target='#modalVal' class='detalle btn btn-default' onclick='atender({$data['n_reporte']})' ><i class='fa fa-desktop text-warning'></i></a></center>";}

                    } 
                      else if($data['estado_rpt'] == 'Pendiente') {
                echo "<a href='#' type='button' data-toggle='modal' data-target='#modalAtndr' class='detalle btn btn-info' onclick='atender({$data['n_reporte']})' style='width:100%; font-size:12px;'>PENDIENTE</a>"; if($data['servicio']=='CÓMPUTO'){ echo "<center><a href='#' type='button' data-toggle='modal' data-target='#modalVal' class='detalle btn btn-default' onclick='atender({$data['n_reporte']})' ><i class='fa fa-desktop text-warning'></i></a></center>";}

                    }else if($data['evaluacion'] =='0' && $data['estado_rpt'] =='Cancelado'){

                echo "<a href='#' type='button' data-toggle='modal' data-target='#modalDtll' class='detalle btn btn-default' onclick='detalle({$data['n_reporte']})' style='width:100%; font-size:12px;'>POR CONFIRMAR</a>"; if($data['servicio']=='CÓMPUTO'){ echo "<center><a href='#' type='button' data-toggle='modal' data-target='#modalVal' class='detalle btn btn-default' onclick='atender({$data['n_reporte']})' ><i class='fa fa-desktop text-warning'></i></a></center>";}

                    } else if($data['evaluacion'] == '0'){

                echo "<a href='#' type='button' data-toggle='modal' data-target='#modalDtll' class='detalle btn btn-default' onclick='detalle({$data['n_reporte']})' style='width:100%; font-size:12px;'>POR EVALUAR</a>"; if($data['servicio']=='CÓMPUTO'){ echo "<center><a href='#' type='button' data-toggle='modal' data-target='#modalVal' class='detalle btn btn-default' onclick='atender({$data['n_reporte']})' ><i class='fa fa-desktop text-warning'></i></a></center>";}

                    } else if($data['estado_rpt'] == 'Finalizado'){
                echo "<a href='#' type='button' data-toggle='modal' data-target='#modalDtll' class='detalle btn btn-success' onclick='detalle({$data['n_reporte']})' style='width:100%; font-size:12px;'>FINALIZADO</a>"; if($data['servicio']=='CÓMPUTO'){ echo "<center><a href='#' type='button' data-toggle='modal' data-target='#modalVal' class='detalle btn btn-default' onclick='atender({$data['n_reporte']})' ><i class='fa fa-desktop text-warning'></i></a></center>";}

                    } 
                    else if($data['evaluacion']=='CANCELADO'){

                echo "<a href='#' type='button' data-toggle='modal' data-target='#modalDtll' class='detalle btn btn-warning' onclick='detalle({$data['n_reporte']})' style='width:100%; font-size:12px;'>CANCELADO</a>"; if($data['servicio']=='CÓMPUTO'){ echo "<center><a href='#' type='button' data-toggle='modal' data-target='#modalVal' class='detalle btn btn-default' onclick='atender({$data['n_reporte']})' ><i class='fa fa-desktop text-warning'></i></a></center>";}
                    }
                 ?>"
    ],
    <?php } 
}
}
?>
];

var tableGenerarReporte = $('#data-table-reporte').DataTable({
    "language": {
        "searchPlaceholder": "Buscar datos...",
        "url": "//cdn.datatables.net/plug-ins/1.10.25/i18n/Spanish.json"
    },
    "order": [
        [1, "asc"],
        [0, "asc"]
    ],
    orderCellsTop: true,
    fixedHeader: true,
    data: dataSet,
    columns: [{
            title: "N°"
        },
        {
            title: "PRIORIDAD"
        },
        {
            title: "NOMBRE USUARIO"
        },
        {
            title: "EXT."
        },
        {
            title: "SERVICIO"
        },
        {
            title: "INICIO"
        },
        {
            title: "TERMINO"
        },
        {
            title: "RETARDO"
        },
        {
            title: "ESTADO"
        }
    ],
});
// ESTADISTICAS Y ESTATÚS DE REPORTE
// TODO FINALIZADOS
var dataSet = [
    <?php
         $query1 = "SELECT 
         n_reporte,
         n_empleado empleado,
         DATE_FORMAT(finicio, '%d/%m/%Y' ) AS finicio,
         DATE_FORMAT(ffinal, '%d/%m/%Y' ) AS ffinal,
        YEAR(finicio) AS año,
         evaluacion,
         estado_rpt,
         id_usu
         FROM reporte
         INNER JOIN tecnico ON idtec = id_tecnico 
         WHERE servicio = 'SISTEMAS' AND MONTH ( finicio ) = MONTH (
         CURRENT_DATE ()) 
    
     ORDER BY
         n_reporte DESC";
	$resultado = mysqli_query($conexion, $query1);
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
        ?>

    ["<?php echo $data['año']."-".$data['n_reporte']?>", "<?php echo  $data2['gstNombr'].' '.$data2['gstApell']?>",
        "<?php echo $data['finicio']?>",
        "<?php echo $NA?>", "<?php echo  $data3['gstNombr'].' '.$data3['gstApell']?>",

        "aqui va"],

    <?php } ?>
    <?php }  }} ?>
];
//       





var tableGenerarReporte = $('#data-table-finalizados').DataTable({

    "language": {
        "searchPlaceholder": "Buscar datos...",
        "url": "//cdn.datatables.net/plug-ins/1.10.25/i18n/Spanish.json"
    },
    "order": [
        [0, "desc"]
    ],
    pageLength: 5,
    lengthMenu: [
        [5, 10, 20, -1],
        [5, 10, 20, 'Todos']
    ],
    orderCellsTop: true,
    fixedHeader: true,
    data: dataSet,
    columns: [{
            title: "N°"
        },
        {
            title: "USUARIO"
        },
        {
            title: "INICIO"
        },
        {
            title: "TERMINO"
        },
        {
            title: "TÉCNICO"
        }
    ],
});

// TODO POR ATENDER


var dataSet = [
    <?php
         $query1 = "SELECT 
         n_reporte,
         n_empleado empleado,
         DATE_FORMAT(finicio, '%d/%m/%Y' ) AS finicio,
         DATE_FORMAT(ffinal, '%d/%m/%Y' ) AS ffinal,
        YEAR(finicio) AS año,
         evaluacion,
         estado_rpt,
         id_usu
         FROM reporte
         INNER JOIN tecnico ON idtec = id_tecnico 
         WHERE servicio = 'SISTEMAS' AND MONTH ( finicio ) = MONTH (
         CURRENT_DATE ()) 
    
     ORDER BY
         n_reporte DESC";
	$resultado = mysqli_query($conexion, $query1);
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


if($data['estado_rpt'] == 'Por atender'){
        ?>

    ["<?php echo $data['año']."-".$data['n_reporte']?>", "<?php echo  $data2['gstNombr'].' '.$data2['gstApell']?>",
        "<?php echo $data['finicio']?>",
        "<?php echo $NA?>", "<?php echo  $data3['gstNombr'].' '.$data3['gstApell']?>",

        "aqui va"],

    <?php } ?>
    <?php }  }} ?>
];
//       

var tableGenerarReporte = $('#data-table-por-atender').DataTable({

    "language": {
        "searchPlaceholder": "Buscar datos...",
        "url": "//cdn.datatables.net/plug-ins/1.10.25/i18n/Spanish.json"
    },
    "order": [
        [0, "desc"]
    ],
    pageLength: 5,
    lengthMenu: [
        [5, 10, 20, -1],
        [5, 10, 20, 'Todos']
    ],
    orderCellsTop: true,
    fixedHeader: true,
    data: dataSet,
    columns: [{
            title: "N°"
        },
        {
            title: "USUARIO"
        },
        {
            title: "INICIO"
        },
        {
            title: "TERMINO"
        },
        {
            title: "TÉCNICO"
        }
    ],
});

//TODO REALIZANDO
var dataSet = [
    <?php
         $query1 = "SELECT 
         n_reporte,
         n_empleado empleado,
         DATE_FORMAT(finicio, '%d/%m/%Y' ) AS finicio,
         DATE_FORMAT(ffinal, '%d/%m/%Y' ) AS ffinal,
        YEAR(finicio) AS año,
         evaluacion,
         estado_rpt,
         id_usu
         FROM reporte
         INNER JOIN tecnico ON idtec = id_tecnico 
         WHERE servicio = 'SISTEMAS' AND MONTH ( finicio ) = MONTH (
         CURRENT_DATE ()) 
    
     ORDER BY
         n_reporte DESC";
	$resultado = mysqli_query($conexion, $query1);
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


if($data['estado_rpt'] == 'Pendiente'){
        ?>

    ["<?php echo $data['año']."-".$data['n_reporte']?>", "<?php echo  $data2['gstNombr'].' '.$data2['gstApell']?>",
        "<?php echo $data['finicio']?>",
        "<?php echo $NA?>", "<?php echo  $data3['gstNombr'].' '.$data3['gstApell']?>",

        "aqui va"],

    <?php } ?>
    <?php }  }} ?>
];
//       

var tableGenerarReporte = $('#data-table-pendiente').DataTable({

    "language": {
        "searchPlaceholder": "Buscar datos...",
        "url": "//cdn.datatables.net/plug-ins/1.10.25/i18n/Spanish.json"
    },
    "order": [
        [0, "desc"]
    ],
    pageLength: 5,
    lengthMenu: [
        [5, 10, 20, -1],
        [5, 10, 20, 'Todos']
    ],
    orderCellsTop: true,
    fixedHeader: true,
    data: dataSet,
    columns: [{
            title: "N°"
        },
        {
            title: "USUARIO"
        },
        {
            title: "INICIO"
        },
        {
            title: "TERMINO"
        },
        {
            title: "TÉCNICO"
        }
    ],
});
// TODO CANCELADO

var dataSet = [
    <?php
         $query1 = "SELECT 
         n_reporte,
         n_empleado empleado,
         DATE_FORMAT(finicio, '%d/%m/%Y' ) AS finicio,
         DATE_FORMAT(ffinal, '%d/%m/%Y' ) AS ffinal,
        YEAR(finicio) AS año,
         evaluacion,
         estado_rpt,
         id_usu
         FROM reporte
         INNER JOIN tecnico ON idtec = id_tecnico 
         WHERE servicio = 'SISTEMAS' AND MONTH ( finicio ) = MONTH (
         CURRENT_DATE ()) 
    
     ORDER BY
         n_reporte DESC";
	$resultado = mysqli_query($conexion, $query1);
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


if($data['estado_rpt'] == 'Cancelado'){
        ?>

    ["<?php echo $data['año']."-".$data['n_reporte']?>", "<?php echo  $data2['gstNombr'].' '.$data2['gstApell']?>",
        "<?php echo $data['finicio']?>",
        "<?php echo $NA?>", "<?php echo  $data3['gstNombr'].' '.$data3['gstApell']?>",

        "aqui va"],

    <?php } ?>
    <?php }  }} ?>
];
//       

var tableGenerarReporte = $('#data-table-cancelado').DataTable({

    "language": {
        "searchPlaceholder": "Buscar datos...",
        "url": "//cdn.datatables.net/plug-ins/1.10.25/i18n/Spanish.json"
    },
    "order": [
        [0, "desc"]
    ],
    pageLength: 5,
    lengthMenu: [
        [5, 10, 20, -1],
        [5, 10, 20, 'Todos']
    ],
    orderCellsTop: true,
    fixedHeader: true,
    data: dataSet,
    columns: [{
            title: "N°"
        },
        {
            title: "USUARIO"
        },
        {
            title: "INICIO"
        },
        {
            title: "TERMINO"
        },
        {
            title: "TÉCNICO"
        }
    ],
});
</script>