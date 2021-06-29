<?php session_start();
include ("../conexion/conexion.php");
//si la variable ssesion existe realizara las siguiente evaluacion 
    if (isset($_SESSION['usuario'])) {
        //si se ha logeado evaluamos si el usuario que aya ingresado intenta acceder a este directorio no es de tipo administrador, no le es permitido el acceso .. si tipo usuario es distinto de admin , entonces no tiene nada que hacer en este directorio 
        if($_SESSION['usuario']['privilegios'] != "admin"){
            //y se redirecciona al directorio que le corresponde
            header("Location: ../");
            }
        }else{
            //si no exixte quiere decir que nadie se ha logeado y lo regsara al inicio (login)
            header('Location: ../');
        }

      //echo $id = $_SESSION['usuario']['id_climan'];
 ?>

<div class="tab">
<?php 
$sql = "SELECT DISTINCT id_manejador, manejador.nombre, manejador.apellidos FROM manejador INNER JOIN comentario ON id_manejador = id_usu WHERE comentario.estado = 1";
				$result=mysqli_query($conexion,$sql);
				$total = 0;
				while($ver=mysqli_fetch_row($result)){ 
					$total++;
					$tot = $ver[0];		
					?>
<button class="tablinks" onclick="openCity(event, <?php echo $ver[0]?>)"><?php echo $ver[1]?></button>

<?php
 }

  ?>
</div>				 
<?php 

if(isset($tot) && !empty($tot)){
		
for($n=1; $n<=$tot; $n++){
?>
<div id="<?php echo $n;?>" class="tabcontent">


<?php
$sql="SELECT id,nombre,apellidos,comentar,fecha,hora,id_manejador FROM comentario INNER JOIN manejador ON id_usu = id_manejador WHERE comentario.estado = 1 and id_usu = $n";
		
				$result=mysqli_query($conexion,$sql);
				while($ver=mysqli_fetch_row($result)){ 

				 $datos=   $ver[0]."||".
						   $ver[1]."||".
						   $ver[2]."||".
						   $ver[3];
?>

<div class="row">
	<div class="col-sm-12">
			<tr>	
				<button type="button" class="close" onclick="preguntarSiNo('<?php echo $ver[0] ?>')" style="margin-left: 0.3em"><span aria-hidden="true">&times;</span></button>

				<button class="close" data-toggle="modal" data-target="#modalEdicion" onclick="agregaform('<?php echo $datos ?>')"><span aria-hidden="true" style="font-size: 13px;" class="glyphicon glyphicon-pencil"></span>
				</button>

				<td><b><?php echo $ver[1].' '.$ver[2]; ?></b></td>
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<?php echo $ver[4].' - '.$ver[5];?>

				<tr>
				<td><textarea style="border-left: 1px solid white;border-right: 1px solid white;"  rows="3" id="comentar" name="comentar" type="text" class="form-control"><?php echo $ver[3] ?></textarea></td>
			
			</tr>
			<br><br>
			<?php 
		}
			 ?>
	
	</div>
</div>

</div>
<?php 
}
}
?>

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