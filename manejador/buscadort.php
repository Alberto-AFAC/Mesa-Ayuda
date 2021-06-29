<?php 
session_start();
	require_once "../conexion/conexion.php";
	
	$sql="SELECT * from actividades";
	$result=mysqli_query($conexion,$sql);

	$id = $_SESSION['usuario']['id_climan'];

	?>
		<button type="button" id="btn_listar" class="close" data-dismiss="modal" aria-label="Close"><a href="tarea.php"><span aria-hidden="true" class="glyphicon glyphicon-share-alt"></span></a></button> 
	<?php
$sql = "SELECT actividades.id_activ,actividades.nombre FROM manejador inner join proyecto on id_manejador = id_man inner join actividades on idproyecto = id_pro WHERE actividades.estado = 1 and actividades.resultado = 0 and id_man = $id ORDER BY id_activ DESC";

$act = mysqli_query($conexion,$sql);

 ?>
<div class="row">
	<div class="col-sm-4"></div>

  

	<div class="col-sm-4">
		<select  id="buscadorvivo" class="form-control" class="selectpicker" type="text" data-live-search="true">	
			<option value="0">Selecione actividad</option>
			<?php while($activi = mysqli_fetch_row($act)):?>
      <option value="<?php echo $activi[0]?>"><?php echo utf8_decode($activi[1])?></option>

			<?php endwhile; ?>

		</select>
	</div>
</div>

	<script type="text/javascript">
		$(document).ready(function(){
			$('#buscadorvivo').select2();

			$('#buscadorvivo').change(function(){
				$.ajax({
					type:"post",
					data:'valor=' + $('#buscadorvivo').val(),
					url:'consulta.php',
					success:function(r){
						$('#tabla').load('tablat.php');
					}
				});
			});
		});
	</script>