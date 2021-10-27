<?php include('../conexion/conexion.php');?>
<script type="text/javascript">
$(document).ready(function() {
  $('.input-daterange input').each(function() {
                $(this).datepicker('clearDates');
               
            });
            $.fn.datepicker.dates['en'] = {
    days: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
    daysShort: ['Dom','Lun','Mar','Mié','Juv','Vie','Sáb'],
    daysMin:  ['Do','Lu','Ma','Mi','Ju','Vi','Sá'],
    months: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
    monthsShort: ['Ene','Feb','Mar','Abr', 'May','Jun','Jul','Ago','Sep', 'Oct','Nov','Dic'],
    today: "Hoy",
    clear: "Clear",
    format: "mm/dd/yyyy",
    titleFormat: "MM yyyy", /* Leverages same syntax as 'format' */
    weekStart: 0
};
    // Extend dataTables search
    $.fn.dataTable.ext.search.push(
                function(settings, data, dataIndex) {
                    var min = $('#min').val();
                    var max = $('#max').val();
                    var createdAt = data[2] || 3; // Our date column in the table

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
        DATE_FORMAT(finicio, '%d-%m-%Y' ) AS finicio,
        DATE_FORMAT(ffinal, '%d-%m-%Y' ) AS ffinal,
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

            if($data['evaluacion'] == '0'){
                $eva = "SIN EVALUAR";
            } else {
                $eva = $data['evaluacion'];
            }


        ?>

    ["<?php echo $data['año']."-".$data['n_reporte']?>","<?php echo  $data2['gstNombr']." ".$data2['gstApell']?>","<?php echo  $data['finicio']?>","<?php echo  $data['ffinal']?>","<?php echo  $data3['gstNombr'].' '.$data3['gstApell']?>",
        "<?php 

        if($data['estado_rpt'] == 'Finalizado'){
                
                echo "<a href='#' type='button' data-toggle='modal' data-target='#modalAtndr' class='detalle btn btn-default' onclick='atender({$data['n_reporte']})' style='width:100%;font-size: 12px;'>$eva </a>";

                    }else if($data['estado_rpt'] == 'Cancelado'){
                echo "<a href='#' type='button' data-toggle='modal' data-target='#modalAtndr' class='detalle btn btn-default' onclick='atender({$data['n_reporte']})' style='width:100%;font-size: 12px;'>$eva</a>";

                    } 
                      ?>"
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
          title: 'Departamento de Soporte Técnico',
          extend: 'print',
          text: '<span class="glyphicon glyphicon-file"> IMPRIMIR REPORTE</span>',
          className: "addNewRecord",
          // orientation: 'portrait',
          customize: function (win) {
            $(win.document.body)
                        .css( 'font-size', '10pt' )
                        .prepend(
                            '<img src="" style="position:absolute; top:0; left:0;" />'
                        );
 
                    $(win.document.body).find( 'table' )
                        .addClass( 'compact' )
                        .css( 'font-size', 'inherit' );
            }
        
        }
            // 'copy', 'csv', 'excel', 'pdf', 'print'
            // 'print'
        ],

        // dom: 'Bfrtip',
        // buttons: [

        //     'copy', 'csv', 'excel',
        //     {
        //     extend: 'pdfHtml5',
        //     messageTop: 'AGENCIA FEDERAL DE AVIACIÓN CIVIL',
        //     download: 'open',
        //     title: 'AGENCIA FEDERAL DE AVIACIÓN CIVIL',
        //     text: 'Descargar PDF',
        //     pageSize: 'A4',

        // }],
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
            }
        ],
    });

    $('.date-range-filter').change(function() {
                var table = $('#data-table-administrador').DataTable();
                table.draw();
            });


            $('.date-range-filter').datepicker();
         
});
    //Cierre de la función
    // $('#min, #max').on('change', function() {
    //     tableGenerarReporte.draw();
    // });
// });

//GRÁFICA PARA MEDIR EL EQUIPO DE COMPUTO
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
        labels: ["Escritorio", "Laptop", "Tableta","Total"
        ],
        datasets: [{
            label: "Sistemas",
            backgroundColor: ["#006E6D","#009C9A","#00D6D4","#5ED0CF"],
            borderWidth: 0,
            data: ["<?php echo $row['INVERVENCIONE']?>","<?php echo $row['INVERVENCIONL']?>","<?php echo $row['INVERVENCIONT']?>","<?php echo $row['COMPUTOPRINCIPAL']?>"]
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
        labels: ["M-Funcional", "Impr", "Escann","Total"
        ],
        datasets: [{
            label: "Sistemas",
            backgroundColor: ["#00CF4B","#00F358","#37FF80","#91FFB9"],
            borderWidth: 0,
            data: ["<?php echo $row['INVERVENCIONM']?>","<?php echo $row['INVERVENCIONI']?>","<?php echo $row['INVERVENCIONES']?>","<?php echo $row['IMPRESIONPRINCIPAL']?>"]
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
        labels: ["Internet", "Telefonía","Total"
        ],
        datasets: [{
            label: "Sistemas",
            backgroundColor: ["#000075","#2424D1","#3636FF"],
            borderWidth: 0,
            data: ["<?php echo $row['INVERVENCIONINT']?>","<?php echo $row['INVERVENCIONTEL']?>","<?php echo $row['COMUNICACIONESPRINCIPAL']?>"]
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
        labels: ["Préstamo de equipo","Total"
        ],
        datasets: [{
            label: "Sistemas",
            backgroundColor: ["#FF6609","#FF8C47"],
            borderWidth: 0,
            data: ["<?php echo $row['INVERVENCIONPREST']?>","<?php echo $row['PROGRAMACIONPRIN']?>"]
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
</script>