<?php 
	require_once "../../conexion/conexion.php";
	
	$sql="SELECT * from proyecto";
	$result=mysqli_query($conexion,$sql);

	?>
		<button type="button" id="btn_listar" class="close" data-dismiss="modal" aria-label="Close"><a href="ingresar_actividades.php"><span aria-hidden="true" class="glyphicon glyphicon-share-alt"></span></a></button> 
	<?php

$sql = "SELECT * FROM proyecto WHERE estado = 1 and resultado = 0 ORDER BY idproyecto DESC";
$pro = mysqli_query($conexion,$sql);

	if($pro->num_rows == 0){ 	}else{
	
	}

 ?>
<div class="row">
	<div class="col-sm-4"></div>

  

	<div class="col-sm-4">
		<select  id="buscadorvivo" class="form-control" class="selectpicker" type="text" data-live-search="true">	
			<option value="0">Selecione proyecto</option>
			<?php while($proyec = mysqli_fetch_row($pro)):?>
      <option value="<?php echo $proyec[0]?>"><?php echo utf8_decode($proyec[1])?></option>

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
						$('#tabla').load('tabla.php');
					}
				});
			});
		});
	</script>