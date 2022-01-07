
<script type="text/javascript">
      var dataSet = [
        <?php
         $query = "SELECT * FROM personal 
          
          WHERE personal.estado = 1 && gstIdper != 0 ORDER BY gstIdper ASC";
             $resultado = mysqli_query($conexion2, $query);
        while($data = mysqli_fetch_array($resultado)){
           $id = $data['gstIdper'];
           $nemple = $data['gstNmpld'];
            $nombre = $data['gstNombr'];
            $apellidos = $data['gstApell'];
            $nemple = $data['gstNmpld'];
            $cargo = $data['gstCargo'];
            $area = '';
     
        $query = "SELECT *,count(n_emp) AS ttl FROM asignacion WHERE n_emp = $nemple AND estado = 0";
        // $queri = "SELECT * FROM personal ORDER BY gstIdper ASC";
        $resultados = mysqli_query($conexion,$query);
        $n=0;
        if($data = mysqli_fetch_array($resultados) ){

            if($data['ttl']!=0){            
        ?>
    
    ['<?php echo $nemple;?>','<?php echo $nombre?>','<?php echo $apellidos?>' ,'<?php echo $cargo ?>' ,"<?php 

    echo "   <a title='Detalles usuario' type='button' data-target='#frmDetalles' onclick='datos_detalle({$id})' class='detalle btn btn-success'>({$data['ttl']}) <i class='fa fa-desktop text-silver'> </i></a>";?>"
    ],

<?php }else{ ?>
    ['<?php echo $nemple;?>','<?php echo $nombre?>','<?php echo $apellidos?>' ,'<?php echo $cargo ?>' ,"<?php 
    echo "   <a title='Detalles usuario' type='button' data-target='#frmDetalles' onclick='datos_detalle({$id})' class='detalle btn btn-default'><i class='glyphicon glyphicon-user text-silver'></i></a>";?>"
    ],
<?php       }        
        }
    }?>
];
var tableGenerarReporte = $('#data-table-area').DataTable({
    "language": {
    "searchPlaceholder": "Buscar datos...",
    "url": "//cdn.datatables.net/plug-ins/1.10.25/i18n/Spanish.json"
    },
    orderCellsTop: true,
    fixedHeader: true,
    data: dataSet,
    columns: [
    {title: "N° EMP"},
    {title: "NOMBRE"},
    {title: "APELLIDOS"},
    {title: "CARGO"},   
    {title: "ACCIÓN"}    
    ],
    });

</script>