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
         id_usu,
         hinicio,
         hfinal
         FROM reporte
         INNER JOIN tecnico ON idtec = id_tecnico 
         WHERE servicio !='SISTEMAS'
        --  WHERE   MONTH ( finicio ) = MONTH (
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
           $nemple = $data2['gstNmpld'];

            if($data['ffinal'] == '0000-00-00'){
                $NA = "Sin fecha";

            } else {
                $NA = $data['ffinal'].'-'.$data['hfinal'];
            };
            if($data['evaluacion'] == '0'){
                $eva = "SIN EVALUAR";
            } else {
                $eva = $data['evaluacion'];
            }


$querys = "SELECT * FROM prioridad WHERE n_empleado = $nemple AND estado = 0";
$resultados = mysqli_query($conexion,$querys); 
if($datas = mysqli_fetch_array($resultados)){
$prio = $datas["prioridads"];
  

}else{
$prio = 'NORMAL';
}


if($data['estado_rpt'] == 'Por atender'){
        ?>

    ["<?php echo 'TEC-'.$data['n_reporte']?>", "<?php echo $prio ?>",
        "<?php echo  $data2['gstNombr'].' '.$data2['gstApell']?>",
        "<?php echo  $data2['gstExTel']?>", "<?php echo $data['finicio'].'-'.$data['hinicio']?>",
        "<?php echo $NA?>", "<?php echo  $data3['gstNombr'].' '.$data3['gstApell']?>",

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

    ["<?php echo 'TEC-'.$data['n_reporte']?>", "<?php echo $prio ?>",
        "<?php echo  $data2['gstNombr'].' '.$data2['gstApell']?>",
        "<?php echo  $data2['gstExTel']?>", "<?php echo $data['finicio'].'-'.$data['hinicio']?>",
        "<?php echo $NA?>", "<?php echo  $data3['gstNombr'].' '.$data3['gstApell']?>",

        "<?php 
             echo "<a href='#' type='button' data-toggle='modal' data-target='#modalAtndr' class='detalle btn btn-info' onclick='atender({$data['n_reporte']})' style='width:100%;font-size: 12px;'>PENDIENTE</a>";

                    ?>"],

    <?php  } ?>

    <?php }  }} ?>
];
//       

var tableGenerarReporte = $('#data-table-administrador').DataTable({
         rowReorder: {
            selector: 'td:nth-child(3)'
        },
    responsive: true,
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

// EVALUACION CON PROMEDIO DE CADA TÉCNICO
var dataSet = [
    <?php
         $query1 = "SELECT
                      id_tecnico,
                      id_usu,
                      reporte.idtec,
                      reporte.n_reporte,
                        sede
                        
                    FROM
                      reporte
                      INNER JOIN tecnico ON idtec = id_tecnico
                      INNER JOIN evaluacion ON evaluacion.id_reporte = reporte.n_reporte
                    WHERE
                      MONTH ( finicio ) = MONTH (
                      CURRENT_DATE ()) 
                    GROUP BY
                      id_usu";
  $resultado = mysqli_query($conexion, $query1);
    $contadorPersonas = 0;
        while($data = mysqli_fetch_array($resultado)){
            
            $idper = $data['id_usu'];
            $sql2="SELECT gstIdper,
            gstNombr,
            gstApell,
            gstExTel,
            gstNmpld
            FROM personal
        WHERE
        gstIdper = $idper";
$result2=mysqli_query($conexion2,$sql2);

    while($data2=mysqli_fetch_array($result2)){         
        $contadorPersonas ++;
    ?>

    ["<?php echo 'TEC-'.$data['n_reporte'] ?>","<?php echo $data2['gstNombr'].' '.$data2['gstApell']?>","<?php echo $data2['gstNmpld']?>","<?php echo $data['sede']?>","<a href='promedio.php?data=<?php echo base64_encode($data['idtec'])?>' type='button'  class='detalle btn btn-default' style='width:100%;font-size: 12px;'>EVALUACION</a>"],
    <?php } } ?>

];
//       





var tableGenerarReporte = $('#data-table-promedio').DataTable({
     rowReorder: {
            selector: 'td:nth-child(3)'
        },
    responsive: true,
    "language": {
        "searchPlaceholder": "Buscar datos...",
        "url": "//cdn.datatables.net/plug-ins/1.10.25/i18n/Spanish.json"
    },
    "order": [
        [0, "asc"]
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
            title: "NOMBRE"
        },
        {
            title: "N° EMPLEADO"
        },
        {
            title: "SEDE"
        },
        {
            title: "DETALLES"
        }
    ],
});
// TODO HASTA AQUI TERMINA







// TABLE DE LA EVALUACIÓN DE LOS TÉCNICOS
var dataSet = [<?php 
                
               $query1 = "SELECT
               * 
           FROM
               reporte
               INNER JOIN evaluacion ON evaluacion.id_reporte = reporte.n_reporte 
               INNER JOIN tecnico ON tecnico.id_tecnico = reporte.idtec
               GROUP BY id_usu";
            $resultado = mysqli_query($conexion, $query1);
            $contador = 0;
              while($data = mysqli_fetch_array($resultado)){
                ?>["<?php echo $data['usuario']?>", "<?php echo $data['n_empleado']?>", "<?php echo $data['sede']?>",
        "<button data-toggle='modal' data-target='#exampleModal' onclick='desempeno(<?php echo $data['idtec'] ?>);' class='btn btn-info btn-sm' style='width: 100%;'><i class='fa fa-calendar-check-o' aria-hidden='true'></i> DESEMPEÑO</button>"
        ],
    <?php } ?>

];



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
         id_usu,
         hinicio,
         hfinal
         FROM reporte
         INNER JOIN tecnico ON idtec = id_tecnico 
         WHERE servicio != 'SISTEMAS' AND MONTH ( finicio ) = MONTH (
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
                $NA = $data['ffinal'].'-'.$data['hfinal'];
            };
            if($data['evaluacion'] == '0'){
                $eva = "SIN EVALUAR";
            } else {
                $eva = $data['evaluacion'];
            }


if($data['estado_rpt'] == 'Finalizado'){
        ?>

    ["<?php echo $data['año']."-".'TEC-'.$data['n_reporte']?>", "<?php echo  $data2['gstNombr'].' '.$data2['gstApell']?>",
        "<?php echo $data['finicio'].'-'.$data['hinicio']?>",
        "<?php echo $NA?>", "<?php echo  $data3['gstNombr'].' '.$data3['gstApell']?>",

        "aqui va"],

    <?php } ?>
    <?php }  }} ?>
];
//       





var tableGenerarReporte = $('#data-table-finalizados').DataTable({
     rowReorder: {
            selector: 'td:nth-child(3)'
        },
    responsive: true,
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
         id_usu,
         hinicio,
         hfinal
         FROM reporte
         INNER JOIN tecnico ON idtec = id_tecnico 
         WHERE servicio != 'SISTEMAS' AND MONTH ( finicio ) = MONTH (
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
                $NA = $data['ffinal'].'-'.$data['hfinal'];
            };
            if($data['evaluacion'] == '0'){
                $eva = "SIN EVALUAR";
            } else {
                $eva = $data['evaluacion'];
            }


if($data['estado_rpt'] == 'Por atender'){
        ?>

    ["<?php echo $data['año']."-".'TEC-'.$data['n_reporte']?>", "<?php echo  $data2['gstNombr'].' '.$data2['gstApell']?>",
        "<?php echo $data['finicio'].'-'.$data['hinicio']?>",
        "<?php echo $NA?>", "<?php echo  $data3['gstNombr'].' '.$data3['gstApell']?>",

        "aqui va"],

    <?php } ?>
    <?php }  }} ?>
];
//       

var tableGenerarReporte = $('#data-table-por-atender').DataTable({
     rowReorder: {
            selector: 'td:nth-child(3)'
        },
    responsive: true,
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
         id_usu,
         hinicio,
         hfinal
         FROM reporte
         INNER JOIN tecnico ON idtec = id_tecnico 
         WHERE servicio != 'SISTEMAS' AND MONTH ( finicio ) = MONTH (
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
                $NA = $data['ffinal'].'-'.$data['hfinal'];
            };
            if($data['evaluacion'] == '0'){
                $eva = "SIN EVALUAR";
            } else {
                $eva = $data['evaluacion'];
            }


if($data['estado_rpt'] == 'Pendiente'){
        ?>

    ["<?php echo $data['año']."-".'TEC-'.$data['n_reporte']?>", "<?php echo  $data2['gstNombr'].' '.$data2['gstApell']?>",
        "<?php echo $data['finicio'].'-'.$data['hinicio']?>",
        "<?php echo $NA?>", "<?php echo  $data3['gstNombr'].' '.$data3['gstApell']?>",

        "aqui va"],

    <?php } ?>
    <?php }  }} ?>
];
//       

var tableGenerarReporte = $('#data-table-pendiente').DataTable({
     rowReorder: {
            selector: 'td:nth-child(3)'
        },
    responsive: true,
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
         id_usu,
         hinicio,
         hfinal
         FROM reporte
         INNER JOIN tecnico ON idtec = id_tecnico 
         WHERE servicio != 'SISTEMAS' AND MONTH ( finicio ) = MONTH (
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
                $NA = $data['ffinal'].'-'.$data['hfinal'];
            };
            if($data['evaluacion'] == '0'){
                $eva = "SIN EVALUAR";
            } else {
                $eva = $data['evaluacion'];
            }


if($data['estado_rpt'] == 'Cancelado'){
        ?>

    ["<?php echo $data['año']."-".'TEC-'.$data['n_reporte']?>", "<?php echo  $data2['gstNombr'].' '.$data2['gstApell']?>",
        "<?php echo $data['finicio'].'-'.$data['hinicio']?>",
        "<?php echo $NA?>", "<?php echo  $data3['gstNombr'].' '.$data3['gstApell']?>",

        "aqui va"],

    <?php } ?>
    <?php }  }} ?>
];
//       

var tableGenerarReporte = $('#data-table-cancelado').DataTable({
     rowReorder: {
            selector: 'td:nth-child(3)'
        },
    responsive: true,
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