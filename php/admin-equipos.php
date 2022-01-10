<script type="text/javascript">
        var dataSet = [
        <?php

        $queri = "SELECT * FROM personal ORDER BY gstIdper ASC";
        $resultados = mysqli_query($conexion2,$queri);
        $n=0;
        while($dato = mysqli_fetch_array($resultados)){

        $nombre = $dato['gstNombr'].' '.$dato['gstApell'];
        $n_emp =$dato['gstNmpld'];
        

        $query = "SELECT * FROM equipo 
        INNER JOIN asignacion ON id_equi = id_equipo 
        WHERE n_emp = $n_emp AND equipo.estado = 0 ORDER BY id_equipo ASC";
        $resultado = mysqli_query($conexion, $query);
       
        while($data = mysqli_fetch_array($resultado)){
       $n++;
             $id = $data['id_equipo'];
  //          $data['identificador'];
    //        $data['adscripcion'];

if($data['proceso']=='asignado'){   ?>    
    
    ['<?php echo $n?>','<?php echo $data['num_invntraio']?>','<?php echo $data['marca_cpu']?>','<?php echo $data['serie_cpu']?>','<?php echo $data['direccion_ip']?>','<?php echo $nombre?>',"<?php if($data['num_invntraio'] == '0'){

echo "<a title='Faltan datos del equipo' href='javascript:openEqpo()' onclick='eqpoedit({$id})' class='detalle btn btn-warning'><i class='fa fa-desktop'></i></a> <button title='Eliminar equipo' type='button' class='eliminar btn btn-default' data-toggle='modal' data-target='#modalEliminar' onclick='eliminar({$id})'><li class='fa fa-trash-o text-danger'></li></button> ";
}else{
echo "<a title='Editar equipo de computo' href='javascript:openEqpo()' onclick='eqpoedit({$id})' class='detalle btn btn-success'><i class='fa fa-desktop'></i></a> <button title='Eliminar equipo' type='button' class='eliminar btn btn-default' data-toggle='modal' data-target='#modalEliminar' onclick='eliminar({$id})'><li class='fa fa-trash-o text-danger'></li></button> ";
}
    ?>"],

<?php 
}else if($data['proceso']=='asignado'){   ?> 

    ['<?php echo $n?>','<?php echo $data['num_invntraio']?>','<?php echo $data['marca_cpu']?>','<?php echo $data['serie_cpu']?>','<?php echo $data['direccion_ip']?>','<p style="color:red;"><?php echo $nombre.'<br> YA NO LABORA '?></p>',"<?php if($data['num_invntraio'] == '0'){

echo "<a title='Faltan datos del equipo' href='javascript:openEqpo()' onclick='eqpoedit({$id})' class='detalle btn btn-warning'><i class='fa fa-desktop'></i></a> <button title='Eliminar equipo' type='button' class='eliminar btn btn-default' data-toggle='modal' data-target='#modalEliminar' onclick='eliminar({$id})'><li class='fa fa-trash-o text-danger'></li></button> ";
}else{
echo "<a title='Editar equipo de computo' href='javascript:openEqpo()' onclick='eqpoedit({$id})' class='detalle btn btn-success'><i class='fa fa-desktop'></i></a> <button title='Eliminar equipo' type='button' class='eliminar btn btn-default' data-toggle='modal' data-target='#modalEliminar' onclick='eliminar({$id})'><li class='fa fa-trash-o text-danger'></li></button> ";
}
    ?>"],



<?php }else if($data['proceso']=='designado'){ ?>

    ['<?php echo $n?>','<?php echo $data['num_invntraio']?>','<?php echo $data['marca_cpu']?>','<?php echo $data['serie_cpu']?>','<?php echo $data['direccion_ip']?>','<?php echo 'NO ASIGNADO'?>',"<?php if($data['num_invntraio'] == '0'){

echo "<a title='Faltan datos del equipo' href='javascript:openEqpo()' onclick='eqpoedit({$id})' class='detalle btn btn-warning'><i class='fa fa-desktop'></i></a> <button title='Eliminar equipo' type='button' class='eliminar btn btn-default' data-toggle='modal' data-target='#modalEliminar' onclick='eliminar({$id})'><li class='fa fa-trash-o text-danger'></li></button> ";
}else{
echo "<a title='Editar equipo de computo' href='javascript:openEqpo()' onclick='eqpoedit({$id})' class='detalle btn btn-success'><i class='fa fa-desktop'></i></a> <button title='Eliminar equipo' type='button' class='eliminar btn btn-default' data-toggle='modal' data-target='#modalEliminar' onclick='eliminar({$id})'><li class='fa fa-trash-o text-danger'></li></button> ";
}
    ?>"],

<?php } 
}
}?>
];

var tableGenerarReporte = $('#data-table-area').DataTable({
            "order": [
            [0, "desc"]
        ],
    rowReorder: {
            selector: 'td:nth-child(3)'
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
    {title: "N°"},
    {title: "N° INVENTARIO"},    
    {title: "MARCA"},
    {title: "N° SERIE"},
    {title: "DIRECCIÓN-IP"},    
    {title: "ASIGNADO"},
    {title: "ACCIÓN", "width": "10%"}

    ],
    });

    </script>
