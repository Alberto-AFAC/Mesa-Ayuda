<?php session_start();
include ("../conexion/conexion.php");
//si la variable ssesion existe realizara las siguiente evaluacion 
 if (isset($_SESSION['usuario'])) {
        if($_SESSION['usuario']['privilegios'] != "cliente"){
            header("Location: ../");
            }
        }else{
            header('Location: ../');
        }

      $id = $_SESSION['usuario']['id_climan'];
      $idc = $_SESSION['usuario']['id_usuario'];


$sql = "

SELECT 
comentario.id, 
comentario.id_climan, 
comentario.comentar, 
comentario.id_usu, 
comentario.visto, 
comentario.fecha, 
comentario.hora, 
comentario.nombre, 
comentario.estado, 
manejador.nombre, 
manejador.apellidos 
FROM usuarios 
INNER JOIN manejador 
ON id_manejador = id_climan 
INNER JOIN comentario 
ON id_usuario = id_usu 
WHERE 
usuarios.privilegios != 'cliente' 
and 
comentario.id_climan = $idc 
and 
comentario.visto = 0 
and comentario.estado = 1 order by id asc

 ";
    $con =0;   
$result=mysqli_query($conexion,$sql);
                while($ver=mysqli_fetch_row($result)){ 

                 $datos=   $ver[0]."||".
                           $ver[1]."||".
                           $ver[2]."||".
                           $ver[7];
                     $ve = $ver[4];
                          $con++;  
?>
<br><br>
<div id="echo">
<div class="row">
    <div class="col-sm-12">
            <tr>    
                <button type="button" class="close" onclick="preguntarSiNo('<?php echo $ver[0] ?>')" style="margin-left: 0.3em"><span aria-hidden="true">&times;</span></button>

                <button class="close" data-toggle="modal" data-target="#modalEdicion" onclick="agregaform('<?php echo $datos ?>')"><span aria-hidden="true" style="font-size: 13px;" class="glyphicon glyphicon-pencil"></span>
                </button>

                <?php if($ver[1]==$idc){?>
                <td><b>Para:&nbsp;&nbsp;<?php echo utf8_decode($ver[9]).' '.utf8_decode($ver[10]);?></b></td>
                <?php }else {?>
                <td><b><?php echo $ver[7]; ?></b></td>
                <?php } ?>

                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <?php echo $ver[5].' - '.$ver[6];?>

                <tr>

          
        <td><textarea style="border-left: 1px solid white;background:#FBFDFD; border-right: 1px solid white;"  rows="3" id="comentar" name="comentar" type="text" class="form-control"><?php echo $ver[2] ?></textarea></td>

             
            
            </tr>
            <?php 
        }
             ?>
    
    </div>
</div>
</div>


<div class="tab">
<?php 
$sql = "

SELECT DISTINCT id_climan,nombre FROM comentario WHERE id_usu = $idc and estado = 1 ORDER BY id_climan ASC
/*SELECT DISTINCT id_usu, nombre from comentario where id_climan = $id and estado = 1 order by id_usu asc
SELECT DISTINCT id_manejador, manejador.nombre, manejador.apellidos FROM manejador INNER JOIN comentario ON id_manejador = id_usu WHERE comentario.estado = 1 and id_manejador != $id order by id_manejador asc
*/

";
                $result=mysqli_query($conexion,$sql);
                $total = 0;
                while($ver=mysqli_fetch_row($result)){ 
                $total++;
                $tot = $ver[0];                 
                 $ver[0].' '.$ver[1];
                ?>
<button class="tablinks" onclick="openCity(event, <?php echo utf8_decode($ver[0])?>)"><?php echo utf8_decode($ver[1])?></button>

<?php
 }
 ?>

<?php
if(isset($tot) && !empty($tot)){


for($n=1; $n<=$tot; $n++){


?>
</div>

<div id="<?php echo $n;?>" class="tabcontent">


<?php
$sql="SELECT * FROM comentario 
WHERE 
id_climan = $idc and estado = 1 and id_usu = $n
or 
id_usu = $idc and estado = 1 and id_climan = $n
order by id asc";
        
                $result=mysqli_query($conexion,$sql);
                while($ver=mysqli_fetch_row($result)){ 

                 $datos=   $ver[0]."||".
                           $ver[1]."||".
                           $ver[2]."||".
                           $ver[7];     
                    $ve = $ver[4];                   
?>
<br><br>
<div class="row">
    <div class="col-sm-12">
            <tr>    
                <button type="button" class="close" onclick="preguntarSiNo('<?php echo $ver[0] ?>')" style="margin-left: 0.3em"><span aria-hidden="true">&times;</span></button>

                <button class="close" data-toggle="modal" data-target="#modalEdicion" onclick="agregaform('<?php echo $datos ?>')"><span aria-hidden="true" style="font-size: 13px;" class="glyphicon glyphicon-pencil"></span>
                </button>

                <?php if($ver[1]==$idc){?>
                <td><b><?php echo "Yo";?></b></td>
                <?php }else {?>
                <td><b><?php echo utf8_decode($ver[7]);?></b></td>
                <?php } ?>

                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <?php echo $ver[5].' - '.$ver[6];?>

                <tr>

                <?php  if($ve==0){
                    ?>
                <td><textarea style="border-left: 1px solid white;background: #f1f1f1; border-right: 1px solid white;"  rows="3" id="comentar" name="comentar" type="text" class="form-control"><?php echo $ver[2] ?></textarea></td>

                <?php  }else if($ve==1){ ?>
                <td><textarea style="border-left: 1px solid white;border-right: 1px solid white;"  rows="3" id="comentar" name="comentar" type="text" class="form-control"><?php echo $ver[2] ?></textarea></td>
                <?php }?>
            
            </tr>

    </div>
</div>


<?php 
    }
        }
            }
?>
</div>

<script>
function openCity(evt, cityName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(cityName).style.display = "block";
    evt.currentTarget.className += " active";
}

</script>

<style>
body {}

/* Style the tab */
.tab {
    overflow: hidden;
    border: 1px solid #ccc;
    background-color: #f1f1f1;
}

/* Style the buttons inside the tab */
.tab button {
    background-color: inherit;
    float: left;
    border: none;
    outline: none;
    cursor: pointer;
    padding: 12px 14px;
    transition: 0.3s;
    font-size: 14px;
}

/* Change background color of buttons on hover */
.tab button:hover {
    background-color: #ddd;
}

/* Create an active/current tablink class */
.tab button.active {
    background-color: #ccc;
}

/* Style the tab content */
.tabcontent {
    display: none;
}
</style>