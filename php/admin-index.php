<?php 
include('../conexion/conexion.php');
?>
<script type="text/javascript">
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
         FROM REPORTE
         INNER JOIN tecnico ON idtec = id_tecnico 
        --  WHERE 	MONTH ( finicio ) = MONTH (
        --  CURRENT_DATE ()) 
    
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
         "<?php echo  $data2['gstExTel']?>", "<?php echo $data['finicio']?>",
        "<?php echo $NA?>","<?php echo  $data3['gstNombr'].' '.$data3['gstApell']?>",

        "<?php if($data['estado_rpt'] == 'Por atender'){
                
                echo "<a href='#' type='button' data-toggle='modal' data-target='#modalAtndr' class='detalle btn btn-danger' onclick='atender({$data['n_reporte']})' style='width:100%;font-size: 12px;'>POR ATENDER</a>";

                    } 
                      else if($data['evaluacion'] =='0' && $data['estado_rpt'] =='Cancelado'){

                // echo "<a href='#' type='button' data-toggle='modal' data-target='#modalDtll' class='detalle btn btn-default' onclick='detalle({$data['n_reporte']})' style='width:100%;font-size: 12px;'>Por confirmar</a>";

                    } else if($data['evaluacion'] == '0'){

                echo "<a href='#' type='button' data-toggle='modal' data-target='#modalDtll' class='detalle btn btn-default' onclick='detalle({$data['n_reporte']})' style='width:100%;font-size: 12px;'>POR EVALUAR</a>";

                    }  
                    ?> "],

    <?php }  if($data['estado_rpt'] == 'Pendiente'){ ?>

    ["<?php echo   $data['año']."-".$data['n_reporte']?>", "<?php echo  $data2['gstNombr'].' '.$data2['gstApell']?>",
         "<?php echo  $data2['gstExTel']?>", "<?php echo $data['finicio']?>",
        "<?php echo $NA?>","<?php echo  $data3['gstNombr'].' '.$data3['gstApell']?>",

        "<?php 
             echo "<a href='#' type='button' data-toggle='modal' data-target='#modalAtndr' class='detalle btn btn-info' onclick='atender({$data['n_reporte']})' style='width:100%;font-size: 12px;'>PENDIENTE</a>";

                    ?>"],

<?php  } ?>

        <?php }  }} ?>
];
//       

var tableGenerarReporte = $('#data-table-administrador').DataTable({
    "language": {
        "searchPlaceholder": "Buscar datos...",
        "url": "//cdn.datatables.net/plug-ins/1.10.25/i18n/Spanish.json"
    },
    "order": [
        [6, "desc"]
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
            title: "EXT."
        },
        {
            title: "FECHA REPORTE"
        },
        {
            title: "FECHA TERMINO"
        },
        {
            title: "TÉCNICO"
        },
        {
            title: "ESTADO"
        }
    ],
});

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
         FROM REPORTE
         INNER JOIN tecnico ON idtec = id_tecnico 
         WHERE 	MONTH ( finicio ) = MONTH (
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
        "<?php echo $NA?>","<?php echo  $data3['gstNombr'].' '.$data3['gstApell']?>",

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
    pageLength : 5,
    lengthMenu: [[5, 10, 20, -1], [5, 10, 20, 'Todos']],
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
         FROM REPORTE
         INNER JOIN tecnico ON idtec = id_tecnico 
         WHERE 	MONTH ( finicio ) = MONTH (
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
        "<?php echo $NA?>","<?php echo  $data3['gstNombr'].' '.$data3['gstApell']?>",

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
    pageLength : 5,
    lengthMenu: [[5, 10, 20, -1], [5, 10, 20, 'Todos']],
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
         FROM REPORTE
         INNER JOIN tecnico ON idtec = id_tecnico 
         WHERE 	MONTH ( finicio ) = MONTH (
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
        "<?php echo $NA?>","<?php echo  $data3['gstNombr'].' '.$data3['gstApell']?>",

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
    pageLength : 5,
    lengthMenu: [[5, 10, 20, -1], [5, 10, 20, 'Todos']],
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
         FROM REPORTE
         INNER JOIN tecnico ON idtec = id_tecnico 
         WHERE 	MONTH ( finicio ) = MONTH (
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
        "<?php echo $NA?>","<?php echo  $data3['gstNombr'].' '.$data3['gstApell']?>",

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
    pageLength : 5,
    lengthMenu: [[5, 10, 20, -1], [5, 10, 20, 'Todos']],
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