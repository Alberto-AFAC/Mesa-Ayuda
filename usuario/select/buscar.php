
  <div class="col-sm-offset-0 col-sm-4">
		<select  id="servicio" class="form-control" class="selectpicker" name="servicio" type="text" data-live-search="true">
                <option value="x">TIPODE SERVICIO</option>
                <option value="1IMPRESORA/MULTIFUNCIONALES">IMPRESORA/MULTIFUNCIONALES</option>
                <option value="2SISTEMAS_APLICATIVOS">SISTEMAS APLICATIVOS</option>
                <option value="3EQUIPO DE CÓMPUTO">EQUIPO DE CÓMPUTO </option>
                <option value="4SISTEMAS">SISTEMAS</option>
                <option value="5RED">RED</option>
                <option value="6OTROS">OTROS</option>
				
		</select>
	</div>


	<script type="text/javascript">
		$(document).ready(function(){
			$('#servicio').select2();

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
	