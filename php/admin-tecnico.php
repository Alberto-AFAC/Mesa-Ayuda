<script type="text/javascript">
    var dataSet = [
    <?php
    if($data['privilegios']=='admin'){
      $opcion = "!= 'WEB'";
      $privil = "!= 'super_admin'";
    }else if($data['privilegios']=='super_admin'){
      $opcion = "!= 'x'";
      $privil = "!= 'x'";
    }else{
      $opcion = "= 'WEB'";    
      $privil = "!= 'super_admin'";
    }

        $query = "SELECT * FROM tecnico 
        WHERE sede $opcion AND baja = 0 AND privilegios $privil ";
        $resultado = mysqli_query($conexion, $query);
        while($data = mysqli_fetch_array($resultado)){
           $idusu = $data['id_usu'];
            $horario = $data['entrada'].' a '.$data['salida']; 
            $usuario = $data['usuario'];
            $idtec = $data['id_tecnico'];
            $activo = $data['activo'];
            $observ = $data['observ'];
            $inactivo = 'INACTIVO';
            // $privilegios = strtoupper($data['privilegios']);

            if(strtoupper($data['privilegios'])== 'ADMIN'){
                $privilegios = 'ADMINISTRADOR';
            } else if(strtoupper($data['privilegios'])== 'TECNICO') {
                $privilegios = 'TÉCNICO';
            }else{
                $privilegios = 'SUPER ADMINISTRADOR';
            }

        $queri = "SELECT * FROM personal 
            WHERE gstIdper = $idusu ORDER BY gstIdper ASC";
    $resultados = mysqli_query($conexion2,$queri);
    while($data = mysqli_fetch_array($resultados)){
       $id = $data['gstIdper'];
       $nombre = $data['gstNombr'].' '.$data['gstApell'];

       if($activo==0){

       ?>

       ['<?php echo $id;?>', '<?php echo $nombre ?>',
       '<?php echo $privilegios?>', '<?php echo $horario?>', "<?php 

// echo "<a href='javascript:openEdt1()' onclick='aredit({$id})' class='detalle btn btn-default'><i class='fa fa-pencil-square-o text-info'></i></a> <button type='button' class='eliminar btn btn-default' data-toggle='modal' data-target='#modalEliminar' onclick='eliminar({$id})'><li class='fa fa-trash-o text-danger'></li></button> ";

       echo "<a title='Editar técnico' type='button' data-target='#frmEditar' onclick='datos_editar({$id})' class='editar btn btn-default'><i class='fa fa-pencil-square-o text-info'></i></a>  <a title='Detalles técnico' type='button' data-target='#frmDetalles' onclick='datos_detalle({$id})' class='detalle btn btn-default'><i class='glyphicon glyphicon-user text-silver'></i></a> <a title='Dar de baja técnico' type='button' class='eliminar btn btn-default' data-toggle='modal' data-target='#modalEliminar' onclick='datos_eliminar({$idtec})' ><i class='fa fa-trash-o text-danger'></i></a>";?>"
       ],
      
   <?php }else{ ?>


       ['<?php echo $id;?>', '<?php echo $nombre ?>',
       '<?php echo $privilegios?>', '<?php echo $inactivo.' - '.$observ.'<p style="color:silver; padding:0; margin:0;">'.$horario.'</p>' ?>', "<?php 

// echo "<a href='javascript:openEdt1()' onclick='aredit({$id})' class='detalle btn btn-default'><i class='fa fa-pencil-square-o text-info'></i></a> <button type='button' class='eliminar btn btn-default' data-toggle='modal' data-target='#modalEliminar' onclick='eliminar({$id})'><li class='fa fa-trash-o text-danger'></li></button> ";

       echo "<a title='Editar técnico' type='button' data-target='#frmEditar' onclick='datos_editar({$id})' class='editar btn btn-default'><i class='fa fa-pencil-square-o text-info'></i></a>  <a title='Detalles técnico' type='button' data-target='#frmDetalles' onclick='datos_detalle({$id})' class='detalle btn btn-default'><i class='glyphicon glyphicon-user text-silver'></i></a> <a title='Dar de baja técnico' type='button' class='eliminar btn btn-default' data-toggle='modal' data-target='#modalEliminar' onclick='datos_eliminar({$idtec})' ><i class='fa fa-trash-o text-danger'></i></a>";


       ?>"


       ],


<?php
    } 
  }
}
   ?>
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
    "order": [
    [0, "desc"]
    ],
    orderCellsTop: true,
    fixedHeader: true,
    data: dataSet,
    columns: [{
        title: "ID"
    },
    {
        title: "NOMBRE"
    },
    {
        title: "PRIVILEGIOS"
    },
    {
        title: "HORARIO"
    },
    {
        title: "ACCIÓN"
    }
    ],
});
</script>