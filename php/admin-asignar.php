<script type="text/javascript">
        var dataSet = [
        <?php

        $query = "SELECT * FROM equipo 
        INNER JOIN asignacion ON id_equi = id_equipo 
        WHERE equipo.estado = 0 ORDER BY id_equipo ASC";
        // $queri = "SELECT * FROM personal ORDER BY gstIdper ASC";
        $resultados = mysqli_query($conexion,$query);
        $n=0;
        while($data = mysqli_fetch_array($resultados)){

        $n_emp =$data['n_emp'];
        

        // $query = "SELECT * FROM equipo 
        // INNER JOIN asignacion ON id_equi = id_equipo 
        // WHERE n_emp = 0 AND equipo.estado = 0 ORDER BY id_equipo ASC";
        $queri = "SELECT * FROM personal WHERE estado = 1 AND gstNmpld = $n_emp ORDER BY gstIdper ASC";
        $resultado = mysqli_query($conexion2, $queri);
       
        if($dato = mysqli_fetch_array($resultado)){
       $n++;
        $nombre = $dato['gstNombr'].' '.$dato['gstApell'];

             $id = $data['id_equipo'];
  //          $data['identificador'];
    //        $data['adscripcion'];
if($data['proceso']=='asignado'){   ?> 

    ['<?php echo $n?>','<?php echo $data['num_invntraio']?>','<?php echo $data['marca_cpu']?>','<?php echo $data['serie_cpu']?>','<p style="color:red;"><?php echo $nombre.'<br> YA NO LABORA '?></p>',"<?php if($data['num_invntraio'] == '0'){

echo "<a title='Faltan datos del equipo' href='javascript:openEqpo()' onclick='eqpoedit({$id})' class='detalle btn btn-default'><i class='fa fa-desktop text-info'></i></a> <button title='Eliminar equipo' type='button' class='eliminar btn btn-default' data-toggle='modal' data-target='#modalEliminar' onclick='eliminar({$id})'><li class='fa fa-trash-o text-danger'></li></button> ";
}else{
echo "<a title='Editar equipo de computo' href='javascript:openEqpo()' onclick='eqpoedit({$id})' class='detalle btn btn-success'><i class='fa fa-desktop'></i></a> <button title='Eliminar equipo' type='button' class='eliminar btn btn-default' data-toggle='modal' data-target='#modalEliminar' onclick='eliminar({$id})'><li class='fa fa-trash-o text-danger'></li></button> ";
}
    ?>"],



<?php } 

}else{

       $n++;


             $id = $data['id_equipo'];

if($data['proceso']=='designado'){ ?>

    ['<?php echo $n?>','<?php echo $data['num_invntraio']?>','<?php echo $data['marca_cpu']?>','<?php echo $data['serie_cpu']?>','<?php echo 'NO ASIGNADO'?>',"<?php if($data['num_invntraio'] == '0'){

echo "<a title='Faltan datos del equipo' href='javascript:openEqpo()' onclick='eqpoedit({$id})' class='detalle btn btn-default'><i class='fa fa-desktop text-info'></i></a> <button title='Eliminar equipo' type='button' class='eliminar btn btn-default' data-toggle='modal' data-target='#modalEliminar' onclick='eliminar({$id})'><li class='fa fa-trash-o text-danger'></li></button> ";
}else{
echo "<a title='Editar equipo de computo' href='javascript:openEqpo()' onclick='eqpoedit({$id})' class='detalle btn btn-success'><i class='fa fa-desktop'></i></a> <button title='Eliminar equipo' type='button' class='eliminar btn btn-default' data-toggle='modal' data-target='#modalEliminar' onclick='eliminar({$id})'><li class='fa fa-trash-o text-danger'></li></button> ";
}
    ?>"],

<?php } 

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
    {title: "N°"},
    {title: "N° INVENTARIO"},    
    {title: "MARCA"},
    {title: "N° SERIE"},
    {title: "ASIGNADO"},
    {title: "ACCIÓN"}

    ],
    });

    </script>
