      <?php
        $sql = "SELECT id_area, adscripcion FROM area WHERE estado = 0 and id_sub = 0 ORDER BY id_area ASC";
        $are = mysqli_query($conexion,$sql);
        $sql = "SELECT id_area, adscripcion FROM area WHERE estado = 0 and id_sub = 0 ORDER BY id_area ASC" ;
        $aree = mysqli_query($conexion,$sql);
        $sql = "SELECT id_area, adscripcion FROM area WHERE estado = 0 ORDER BY id_area ASC";
        $areed = mysqli_query($conexion,$sql);
        ?>
  