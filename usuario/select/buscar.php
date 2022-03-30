
  <div class="col-sm-offset-0 col-sm-4">
  <select  id="servicio" class="form-control" class="selectpicker" name="servicio" type="text" data-live-search="true">
                <option value="x">TIPODE SERVICIO</option>
                <option value="1CÓMPUTO">CÓMPUTO</option>
                <option value="2IMPRESIÓN">IMPRESIÓN</option>
                <option value="3COMUNICACIONES">COMUNICACIONES </option>
                <option value="4PROGRAMACIÓN DE EVENTOS/REUNIONES">PROGRAMACIÓN DE EVENTOS/REUNIONES</option>
                <option value="5SISTEMAS">SISTEMAS</option>
				
		</select>
	</div>


	<script type="text/javascript">
		$(document).ready(function(){
			$('#servicio').change(function(){
				$.ajax({
					type:"post",
					data:'valor=' + $('#servicio').val(),
					url:'session/',
					success:function(r){
						$('#select1').load('select/tabla.php');
					}
				});
			});
		});

	</script>
	