<?php include('../conexion/conexion.php');?>
<script type="text/javascript">
     $.fn.datepicker.dates['en'] = {
        days: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
        daysShort: ['Dom', 'Lun', 'Mar', 'Mié', 'Juv', 'Vie', 'Sáb'],
        daysMin: ['Do', 'Lu', 'Ma', 'Mi', 'Ju', 'Vi', 'Sá'],
        months: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre',
            'Octubre', 'Noviembre', 'Diciembre'
        ],
        monthsShort: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'],
        today: "Hoy",
        clear: "Clear",
        format: "yyyy/dd/mm",
        titleFormat: "MM yyyy",
        /* Leverages same syntax as 'format' */
        weekStart: 0
    };
$(document).ready(function() {
    $('.input-daterange input').each(function() {
        $(this).datepicker('clearDates');

    });
   
    // Extend dataTables search
    $.fn.dataTable.ext.search.push(
        function(settings, data, dataIndex) {
            var min = $('#min-date').val();
            var max = $('#max-date').val();
            var createdAt = data[3] || 0; // Our date column in the table

            if (
                (min == "" || max == "") ||
                (moment(createdAt).isSameOrAfter(min) && moment(createdAt).isSameOrBefore(max))
            ) {
                return true;
            }
            return false;
        }
    );
    var dataSet = [
        <?php
        $query1 = "SELECT 
        n_reporte,
        n_empleado empleado,
        DATE_FORMAT(finicio, '%Y-%m-%d' ) AS finicio,
        DATE_FORMAT(ffinal, '%Y-%m-%d' ) AS ffinal,
        YEAR(finicio) AS año,
        evaluacion,
        estado_rpt,
        id_usu 
        FROM reporte
        INNER JOIN tecnico ON idtec = id_tecnico 
        WHERE 	MONTH ( finicio ) = MONTH (
        CURRENT_DATE ()) 
        AND estado_rpt = 'Finalizado' || estado_rpt = 'Cancelado'
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

        ?>

        ["<?php echo $data['año']."-".$data['n_reporte']?>",
            "<?php echo  $data2['gstNombr']." ".$data2['gstApell']?>", "<?php echo  $data['finicio']?>",
            "<?php echo  $data['ffinal']?>", "<?php echo  $data3['gstNombr'].' '.$data3['gstApell']?>",
            "<?php 

        if($data['estado_rpt'] == 'Finalizado'){
                
                echo "<a href='#' type='button' data-toggle='modal' data-target='#modalAtndr' class='detalle btn btn-default' onclick='atender({$data['n_reporte']})' style='width:100%;font-size: 12px;'>FINALIZADO</a>";

                    }else if($data['estado_rpt'] == 'Cancelado'){
                echo "<a href='#' type='button' data-toggle='modal' data-target='#modalAtndr' class='detalle btn btn-default' onclick='atender({$data['n_reporte']})' style='width:100%;font-size: 12px;'>CANCELADO</a>";

                    } 
                      ?>",
            "<a href='evaluacion.php?data=<?php echo $data['n_reporte']?>' type='button'  class='detalle btn btn-default' style='width:100%;font-size: 12px;'>EVALUACIÓN</a>"
        ],
        <?php } } }?>
    ];

    var tableGenerarReporte = $('#data-table-administrador').DataTable({

        "order": [
            [5, "desc"]
        ],
        "language": {
            "searchPlaceholder": "Buscar datos...",
            "url": "//cdn.datatables.net/plug-ins/1.10.25/i18n/Spanish.json"
        },
        dom: 'Bfrtip',
        buttons: [{
                // title: 'AGENCIA FEDERAL DE AVIACIÓN CIVIL',
                title: '',
                extend: 'print',
                text: '<span class="glyphicon glyphicon-file"> IMPRIMIR REPORTE</span>',
                className: "addNewRecord",
                // orientation: 'portrait',
                customize: function(win) {
                    $(win.document.body)
                        .css('font-size', '6pt')
                        .prepend(
                            '<img src="" style="position:absolute; top:0; left:0;" />'
                        );

                    $(win.document.body).find('table')
                        .addClass('compact')
                        .css('font-size', 'inherit');
                }

            }
            // 'copy', 'csv', 'excel', 'pdf', 'print'
            // 'print'
        ],
        orderCellsTop: true,
        fixedHeader: true,
        responsive: true,
        data: dataSet,
        columns: [{
                title: "FOLIO"
            },
            {
                title: "NOMBRE USUARIO"
            },
            {
                title: "INICIO"
            },
            {
                title: "FINALIZA"
            },
            {
                title: "TÉCNICO"
            },
            {
                title: "DETALLES"
            },
            {
                title: "EVALUACION"
            }
        ],
    });

    // $('.date-range-filter').change(function() {
    //     var table = $('#data-table-administrador').DataTable();
    //     table.draw();
    // });


    // $('.date-range-filter').datepicker();
    $('.date-range-filter').change(function() {
    tableGenerarReporte.draw();
});

$('#my-table_filter').hide();

});

// Re-draw the table when the a date range filter changes

//Cierre de la función
// $('#min, #max').on('change', function() {
//     tableGenerarReporte.draw();
// });
// });

//GRÁFICA PARA MEDIR EL EQUIPO DE COMPUTO
// GRAFICA QUE PERMITE RECIBIR EL VALOR DE LAS EVALUACIONES DEL REPORTE
<?php 

    $datos = $_GET['data'];
    $queryReportes = "SELECT n_reporte,
    evaluacion.co_tecnico,
    evaluacion.act_servicio,
    evaluacion.hab_comun,
    evaluacion.tiempo_resp,
    evaluacion.tiempo_soluc,
    evaluacion.calidad_genral,
    evaluacion.estado
    FROM
    reporte
    INNER JOIN evaluacion ON evaluacion.id_reporte = reporte.n_reporte
    where n_reporte = '$datos'"; 
    $resEvaluacion = mysqli_query($conexion, $queryReportes);
                         ?>
var piechar = new Chart(document.getElementById("piechart-licencias"), {
    type: 'bar',
    data: {
        <?php  while($dataEvaluaciones = mysqli_fetch_array($resEvaluacion)){ ?>
        labels: ["CONOCIMIENTOS DEL TÉCNICO", "ACTITUD DE SERVICIO DEL TÉCNICO",
            "HABILIDADES DE COMUNICACIÓN DEL TÉCNICO", "TIEMPO DE RESPUESTA", "TIEMPO DE SOLUCIÓN",
            "CALIDAD GENERAL DEL SERVICIO RECIBIDO"
        ],
        datasets: [{
            label: "EVALUACIÓN DE SERVICIO",
            backgroundColor: ["#337ab7", "#095892"],
            borderWidth: 0,
            data: ["<?php echo $dataEvaluaciones['co_tecnico'] ?>",
                "<?php echo $dataEvaluaciones['act_servicio']?>",
                "<?php echo $dataEvaluaciones['hab_comun']?>",
                "<?php echo $dataEvaluaciones['tiempo_resp']?>",
                "<?php echo $dataEvaluaciones['tiempo_soluc']?>",
                "<?php echo $dataEvaluaciones['calidad_genral']?>"
            ]
        }, ]
        <?php } ?>

    },
    options: {
        responsive: true,
        plugins: {
            // legend: {
            //   position: 'top',
            // },
            title: {
                display: true,
                // text: 'Aqui va el titulo'
            }
        },
        scales: {
            y: {
                beginAtZero: true
            }
        }
    },
});





<?php 
            $query = "SELECT
       	    COUNT( CASE WHEN servicio = 'COMPUTO' THEN 1 END ) AS COMPUTOPRINCIPAL,
            COUNT( CASE WHEN intervencion = 'ESCRITORIO' THEN 1 END ) AS INVERVENCIONE,
            COUNT( CASE WHEN intervencion = 'LAPTOP' THEN 1 END ) AS INVERVENCIONL,
            COUNT( CASE WHEN intervencion = 'TABLETA' THEN 1 END ) AS INVERVENCIONT
            FROM
            reporte";
        $resultado = mysqli_query($conexion, $query);
?>
var piechar = new Chart(document.getElementById("piechart-servicios"), {
    type: 'polarArea',
    data: {
        <?php while($row = mysqli_fetch_array($resultado)){ ?>
        labels: ["Escritorio", "Laptop", "Tableta", "Total"],
        datasets: [{
            label: "Sistemas",
            backgroundColor: ["#006E6D", "#009C9A", "#00D6D4", "#5ED0CF"],
            borderWidth: 0,
            data: ["<?php echo $row['INVERVENCIONE']?>", "<?php echo $row['INVERVENCIONL']?>",
                "<?php echo $row['INVERVENCIONT']?>", "<?php echo $row['COMPUTOPRINCIPAL']?>"
            ]
        }]
        <?php }?>
    },
    options: {
        responsive: true,
        plugins: {
            legend: {
                position: 'top',
            },
            title: {
                display: true,
                text: 'COMPUTO'
            }
        }
    },
});

//GRÁFICA PARA MEDIR EL SERVICIO DE IMPRESION
<?php 
            $query = "SELECT
            COUNT( CASE WHEN servicio = 'IMPRESION' THEN 1 END ) AS IMPRESIONPRINCIPAL,
            COUNT( CASE WHEN intervencion = 'MULTIFUNCIONAL' THEN 1 END ) AS INVERVENCIONM,
            COUNT( CASE WHEN intervencion = 'IMPRESORA' THEN 1 END ) AS INVERVENCIONI,
            COUNT( CASE WHEN intervencion = 'ESCANER' THEN 1 END ) AS INVERVENCIONES
            FROM
            reporte";
        $resultado = mysqli_query($conexion, $query);
?>
var piechar = new Chart(document.getElementById("piechart-impresion"), {
    type: 'polarArea',
    data: {
        <?php while($row = mysqli_fetch_array($resultado)){ ?>
        labels: ["M-Funcional", "Impr", "Escann", "Total"],
        datasets: [{
            label: "Sistemas",
            backgroundColor: ["#00CF4B", "#00F358", "#37FF80", "#91FFB9"],
            borderWidth: 0,
            data: ["<?php echo $row['INVERVENCIONM']?>", "<?php echo $row['INVERVENCIONI']?>",
                "<?php echo $row['INVERVENCIONES']?>", "<?php echo $row['IMPRESIONPRINCIPAL']?>"
            ]
        }]
        <?php }?>
    },
    options: {
        responsive: true,
        plugins: {
            legend: {
                position: 'top',
            },
            title: {
                display: true,
                text: 'IMPRESIÓN'
            }
        }
    },
});
//GRÁFICA PARA MEDIR EL SERVICIO DE COMUNICACIONES
<?php 
            $query = "SELECT
            COUNT( CASE WHEN servicio = 'COMUNICACIONES' THEN 1 END ) AS COMUNICACIONESPRINCIPAL,
            COUNT( CASE WHEN intervencion = 'INTERNET' THEN 1 END ) AS INVERVENCIONINT,
            COUNT( CASE WHEN intervencion = 'TELEFONÍA' THEN 1 END ) AS INVERVENCIONTEL,
            COUNT( CASE WHEN servicio = 'PROGRAMACIÓN DE EVENTOS/REUNIO' THEN 1 END ) AS PROGRAMACIONPRIN,
            COUNT( CASE WHEN intervencion = 'PRÉSTAMO DE EQUIPO' THEN 1 END ) AS INVERVENCIONPREST
            FROM
            reporte";
        $resultado = mysqli_query($conexion, $query);
?>
var piechar = new Chart(document.getElementById("piechart-comunicaciones"), {
    type: 'polarArea',
    data: {
        <?php while($row = mysqli_fetch_array($resultado)){ ?>
        labels: ["Internet", "Telefonía", "Total"],
        datasets: [{
            label: "Sistemas",
            backgroundColor: ["#000075", "#2424D1", "#3636FF"],
            borderWidth: 0,
            data: ["<?php echo $row['INVERVENCIONINT']?>", "<?php echo $row['INVERVENCIONTEL']?>",
                "<?php echo $row['COMUNICACIONESPRINCIPAL']?>"
            ]
        }]
        <?php }?>
    },
    options: {
        responsive: true,
        plugins: {
            legend: {
                position: 'top',
            },
            title: {
                display: true,
                text: 'COMUNICACIONES'
            }
        }
    },
});
//GRÁFICA PARA MEDIR LA PROGRAMACIÓN DE EVENTOS Y REUNIONES
<?php 
            $query = "SELECT
            COUNT( CASE WHEN servicio = 'PROGRAMACIÓN DE EVENTOS/REUNIO' THEN 1 END ) AS PROGRAMACIONPRIN,
            COUNT( CASE WHEN intervencion = 'PRÉSTAMO DE EQUIPO' THEN 1 END ) AS INVERVENCIONPREST
            FROM
            reporte";
        $resultado = mysqli_query($conexion, $query);
?>
var piechar = new Chart(document.getElementById("piechart-eventos"), {
    type: 'polarArea',
    data: {
        <?php while($row = mysqli_fetch_array($resultado)){ ?>
        labels: ["Préstamo de equipo", "Total"],
        datasets: [{
            label: "Sistemas",
            backgroundColor: ["#FF6609", "#FF8C47"],
            borderWidth: 0,
            data: ["<?php echo $row['INVERVENCIONPREST']?>", "<?php echo $row['PROGRAMACIONPRIN']?>"]
        }]
        <?php }?>
    },
    options: {
        responsive: true,
        plugins: {
            legend: {
                position: 'top',
            },
            title: {
                display: true,
                text: 'PROGRAMACIÓN DE EVENTOS/REUNIONES'
            }
        }
    },
});

function evaluaciont(principal) {
    alert(principal);
}
</script>