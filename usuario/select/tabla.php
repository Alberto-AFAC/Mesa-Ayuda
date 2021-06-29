
<?php session_start();

				if(isset($_SESSION['consulta']) && !empty($_SESSION['consulta'])){

					if($_SESSION['consulta'] > 0){
						 $idp=$_SESSION['consulta'];
             $id = $idp[0];
					}


switch ($id) {
  case "1":?>
            <div class="col-sm-offset-0 col-sm-4">
            <select  id="intervencion" class="form-control" class="selectpicker" name="intervencion" type="text" data-live-search="true">
            <option value="x">SERVICIO DE IMPRESORA</option>
            <option value="1MULTIFUNCIONAL">MULTIFUNCIONAL</option>
            <option value="1IMPRESORA">IMPRESORA</option>
            <option value="1SCANNER">SCANNER</option>
            <option value="1OTROS">OTROS</option>
            </option>
            </select>
            </div>

                  <!--Resetear select-->
                  
                  <script type="text/javascript">
                  reset();
                  </script>
<?php break;
  case "2":?>
            <div class="col-sm-offset-0 col-sm-4">
            <select  id="intervencion" class="form-control" class="selectpicker" name="intervencion" type="text" data-live-search="true">
            <option value="x">PROGRAMAS</option>
            <option value="2SISTEMA OPERATIVO">SISTEMA OPERATIVO</option>
            <option value="2POWER POINT">POWER POINT</option>
            <option value="2ADOBE PDF">ADOBE PDF</option>
            <option value="2CORREO">CORREO</option>
            <option value="2OFFICE">OFFICE</option>
            <option value="2EXCEL">EXCEL</option>
            <option value="2WORD">WORD</option>
            <option value="2OTROS">OTROS</option>
            </option>
            </select>
            </div>

              <!--Resetear select-->
              
              <script type="text/javascript">
              reset();
              </script>
<?php break;
  case "3":?>
 
             <div class="col-sm-offset-0 col-sm-4">
            <select  id="intervencion" class="form-control" class="selectpicker" name="intervencion" type="text" data-live-search="true">
            <option value="x">HARDWARE</option>
            <option value="3MONITOR">MONITOR</option>
            <option value="3TECLADO">TECLADO</option>
            <option value="3MOUSE">MOUSE</option>
            <option value="3CPU">CPU</option>
            <option value="3OTROS">OTROS</option>
            </option>
            </select>
            </div>

              <!--Resetear select-->
              
              <script type="text/javascript">
              reset();
              </script>

 <?php break;
   case "4":?>
            <div class="col-sm-offset-0 col-sm-4">
            <select  id="intervencion" class="form-control" class="selectpicker" name="intervencion" type="text" data-live-search="true">
            <option value="x">SISTEMA</option>
            <option value="4SIA FINANCIEROS">SIA FINANCIEROS</option>
            <option value="4SIA MATERIALES">SIA MATERIALES</option>
            <option value="4TARANTELLA">TARANTELLA</option>
            <option value="4LICENCIAS">LICENCIAS</option>
            <option value="4INGRESOS">INGRESOS</option>
            <option value="4PEGASUS">PEGASUS</option>
            <option value="4META4">META4</option>
            <option value="4SICOP">SICOP</option>
            <option value="4SIAR">SIAR</option>
            <option value="4SIAC">SIAC</option>
            <option value="4OTROS">OTROS</option>
            </option>
            </select>
            </div>
              <!--Resetear select-->
              
              <script type="text/javascript">
              reset();
              </script>
<?php break;
  case "5":?>

           <div class="col-sm-offset-0 col-sm-4">
            <select  id="intervencion" class="form-control" class="selectpicker" name="intervencion" type="text" data-live-search="true">
            <option value="x">SISTEMA</option>
            <option value="5TELEFONÍA">TELEFONÍA</option>
            <option value="5INTERNET">INTERNET</option>
            <option value="5OTROS">OTROS</option>
            </option>
            </select>
            </div>

              <!--Resetear select-->
              
              <script type="text/javascript">
              reset();
              </script>
<?php break;
  case "6":?>
            <div class="col-sm-offset-0 col-sm-4">
            <select  id="intervencion" class="form-control" class="selectpicker" name="intervencion" type="text" data-live-search="true">
            <option value="x">SISTEMA</option>
            <option value="2SISTEMA OPERATIVO">SISTEMA OPERATIVO</option>
            <option value="2PÁGINA WEB">PÁGINA WEB</option>
            <option value="2APLICACIÓN">APLICACIÓN</option>
            <option value="2CORREO">CORREO</option>
            <option value="2OTROS">OTROS</option>
            </option>
            </select>
            </div>
              <!--Resetear select-->
              
              <script type="text/javascript">
              reset();
              </script>
<?php break;
  default:?>
<!--Resetear select-->
<input type="hidden" name="intervencion" id="intervencion" value="x">
<input type="hidden" name="descrip" id="descrip" value="x">
<script type="text/javascript">
  reset();
</script>
<?php }
}else{ ?>
<div class="col-sm-offset-0 col-sm-4"><select  id="intervencion" class="form-control" class="selectpicker" name="intervencion" type="text" data-live-search="true" disabled=""><option value="x">SELECCIONE OPCIÓN</option></select></div>
<?php } ?>
    	
  
<!--Select global-->
<script type="text/javascript">
$(document).ready(function(){
  $('#intervencion').select2();
$('#intervencion').change(function(){
  $.ajax({ type:"post", 
           data:'valor=' + $('#intervencion').val(),
           url:'session/valor.php',
  success:function(r){
    $('#select2').load('select/select.php');
  }
        });
    });
});

function reset(){
  $.ajax({
    type:"post",
    data:'valor=' + $('#intervencion').val(),
    url:'session/valor.php',
      success:function(r){
      $('#select2').load('select/select.php');
        }
      });
}
</script>