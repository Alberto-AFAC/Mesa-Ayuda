
<?php session_start();

				if(isset($_SESSION['consulta']) && !empty($_SESSION['consulta'])){

					if($_SESSION['consulta'] > 0){
						 $idp=$_SESSION['consulta'];
             $id = $idp[0];
					}
//echo $id;

switch ($id) {
  case "1":?>
            <div class="col-sm-offset-0 col-sm-4">
            <select  id="intervencion" class="form-control" class="selectpicker" name="intervencion" type="text" data-live-search="true">
            <option value="0">SELECCIONE</option>
            <option value="aESCRITORIO">ESCRITORIO</option>
            <option value="bLAPTOP">LAPTOP</option>
            <option value="cTABLETA">TABLETA</option>
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
            <option value="0">SELECCIONE</option>
            <option value="dMULTIFUNCIONAL">MULTIFUNCIONAL</option>
            <option value="eIMPRESORA">IMPRESORA</option>
            <option value="fESCÁNER">ESCÁNER</option>
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
            <option value="0">SELECCIONE</option>
            <option value="gINTERNET">INTERNET</option>
            <option value="hTELEFONÍA">TELEFONÍA</option>
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
            <option value="0">SELECCIONE</option>
            <option value="iPRÉSTAMO DE EQUIPO">PRÉSTAMO DE EQUIPO</option>
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
            <option value="0">SELECCIONE</option>
            <option value="jAFAC">AFAC</option>
            <option value="kCASS">CASS</option>
            <option value="lE-LICENCIAS">E-LICENCIAS</option>
            <option value="mSIAC">SIAC</option>
            <option value="nSIAR">SIAR</option>
            <option value="oCOMPETENCIA LINGUISTICA">COMPETENCIA LINGÜISTICA</option>
            <option value="pCAPACITACIÓN AFAC">CAPACITACIÓN AFAC</option>
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
            <option value="0">SELECCIONE</option>
            <option value="xCAPACITACIÓN AFAC">CAPACITACIÓN AFAC</option>
            <option value="xLINGÜÍSTICA">LINGÜÍSTICA</option>
            </option>
            </select>
            </div>
              <!--Resetear select-->
              
              <script type="text/javascript">
              reset();
              </script>
              <input type="hidden" name="descripcion" id="descripcion" value="0x">
              <input type="hidden" name="solucion" id="solucion" value="0x">
              <input type="hidden" name="ultima" id="ultima" value="0x">
              <input type="hidden" name="final" id="final" value="x">


 <?php break;
   case "x":?>

            <input type="hidden" id="intervencion" name="intervencion" value="x">
              <!--Resetear select-->
            <script type="text/javascript">
            reset();
            </script>
<?php break;

  default:?>
<!--Resetear select-->
<input type="hidden" name="intervencion" id="intervencion" value="x">
<script type="text/javascript">
  reset();
</script>
<?php }
}else{ ?>
 
<input type="hidden" id="intervencion" name="intervencion" value="x">

<?php } ?>
    	
  
<!--Select global-->
<script type="text/javascript">
$(document).ready(function(){
//  $('#intervencion').select2();
$('#intervencion').change(function(){
  $.ajax({ type:"post", 
           data:'valor=' + $('#intervencion').val(),
           url:'session/valor.php',
  success:function(r){
    $('#select2').load('select/select.php');
    // console.log("aqui perro--chupas"+ $('#intervencion').val());
  }
        });
    });
});

function reset(){
  $.ajax({
    type:"post",
    data:'valor=' + 0,
    url:'session/valor.php',
      success:function(r){
      $('#select2').load('select/select.php');
      $('#select3').load('select/penultimo.php');
      $('#select4').load('select/ultimo.php');
      $('#select5').load('select/final.php');

        }
  })
}
</script>