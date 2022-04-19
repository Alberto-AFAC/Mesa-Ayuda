
<script type="text/javascript">
      var dataSet = [
        <?php
          $query = "SELECT * FROM personal 
          
          WHERE personal.estado = 0 && gstIdper != 0 ORDER BY gstIdper ASC";
             $resultado = mysqli_query($conexion2, $query);
        while($data = mysqli_fetch_array($resultado)){
           $id = $data['gstIdper'];
           $nemple = $data['gstNmpld'];
            $nombre = $data['gstNombr'];
            $apellidos = $data['gstApell'];
            $nemple = $data['gstNmpld'];
            $cargo = $data['gstCargo'];
            $area = '';

            if($nemple == 0){

                $detalle_usuario = "<a title='Detalles usuario' type='button' data-target='#frmDetalles' onclick='datos_detalle({$id})' class='detalle btn btn-default'><i class='fa fa-desktop text-silver'></i></a>";
            }else{
                $detalle_usuario = "<a title='Detalles usuario' type='button' data-target='#frmDetalles' onclick='datos_detalle({$id})' class='detalle btn btn-success'><i class='fa fa-desktop text-silver'></i></a>";
            }

     
     $querys = "SELECT * FROM prioridad WHERE n_empleado = $nemple AND estado = 0";
        $resultados = mysqli_query($conexion,$querys);
        if($data = mysqli_fetch_array($resultados)){
            $ridad = $data["prioridads"];

            
            if($ridad=='ALTA'){
            $prio = '<a title="Asignar prioridad" type="button" data-target="#frmDetalles" onclick="datos_prioridad('.$id.')" class="detalle btn btn-success">'.$ridad.'</a>';
            }else if($ridad=='MEDIA'){
            $prio = '<a title="Asignar prioridad" type="button" data-target="#frmDetalles" onclick="datos_prioridad('.$id.')" class="detalle btn btn-info">'.$ridad.'</a>';
            }else if($ridad=='BAJA'){
            $prio = '<a title="Asignar prioridad" type="button" data-target="#frmDetalles" onclick="datos_prioridad('.$id.')" class="detalle btn btn-warning">'.$ridad.'</a>';
            }


            }else{
            $prio = '<a title="Asignar prioridad" type="button" data-target="#frmDetalles" onclick="datos_prioridad('.$id.')" class="detalle btn btn-default">NORMAL</a>';    
            }

        $query = "SELECT * FROM asignacion WHERE n_emp = $nemple AND estado = 0";
        // $queri = "SELECT * FROM personal ORDER BY gstIdper ASC";
        $resultados = mysqli_query($conexion,$query);
        $n=0;
        if($data = mysqli_fetch_array($resultados)){


        ?>
    
    ['<?php echo $nemple;?>','<?php echo $nombre?>','<?php echo $apellidos?>' ,'<?php echo $cargo ?>' , '<?php echo $prio ?>' ,"<?php 

echo $detalle_usuario ?>"],

<?php }else{ ?>
    ['<?php echo $nemple;?>','<?php echo $nombre?>','<?php echo $apellidos?>' ,'<?php echo $cargo ?>', '<?php echo $prio ?>' ,"<?php 

echo "<a title='Detalles usuario' type='button' data-target='#frmDetalles' onclick='datos_detalle({$id})' class='detalle btn btn-default'><i class='glyphicon glyphicon-user text-silver'></i></a>";?>"],
<?php
}
 }?>
];

var tableGenerarReporte = $('#data-table-area').DataTable({
          
   rowReorder: {
            selector: 'td:nth-child(2)'
        },
    responsive: true,

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
    {title: "PRIORIDAD"},    
    {title: "ACCIÓN", "width": "10%"}    
    ],
    });

</script>