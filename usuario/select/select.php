<?php session_start();
  
  $id=0;

				if(isset($_SESSION['consulta']) && !empty($_SESSION['consulta'])){

					if($_SESSION['consulta'] > 0){
						 $idp=$_SESSION['consulta'];
             $id = $idp[0];
             $desc = substr($idp, 1);
					}

switch ($id) {
  case "a":?>

  <div class="col-sm-offset-0 col-sm-4">
  <select  id="descripcion" class="form-control" class="selectpicker" name="descripcion" type="text" data-live-search="true">
  <option value="0">SELECCIONE</option>
  <option value="aCPU">CPU</option>
  <option value="bMONITOR">MONITOR</option>
  </option>
  </select>
  </div>
 

<?php break;
  case "b":?>

 <div class="col-sm-offset-0 col-sm-4">
  <select  id="descripcion" class="form-control" class="selectpicker" name="descripcion" type="text" data-live-search="true">
  <option value="0">SELECCIONE</option>
  <option value="cGENERAL">GENERAL</option>
  <option value="dPANTALLA">PANTALLA</option>
  <option value="eTECLADO">TECLADO</option>
  <option value="fPANEL TÁCTIL/RATÓN">PANEL TÁCTIL/RATÓN</option>
  <option value="gBATERÍA">BATERÍA</option>
  </option>
  </select>
  </div>
 
 
<?php break;
  case "c": ?>

  <div class="col-sm-offset-0 col-sm-4">
  <select  id="descripcion" class="form-control" class="selectpicker" name="descripcion" type="text" data-live-search="true">
  <option value="0">SELECCIONE</option>
  <option value="hGENERAL">GENERAL</option>
  <option value="iPANTALLA">PANTALLA</option>
  <option value="jTECLADO FÍSICO/VIRTUAL">TECLADO FÍSICO/VIRTUAL</option>
  <option value="kPANEL TÁCTIL/RATÓN">PANEL TÁCTIL/RATÓN</option>
  <option value="lBATERÍA">BATERÍA</option>
  </option>
  </select>
  </div>

<?php break;
 case "d": ?>

 <div class="col-sm-offset-0 col-sm-4">
  <select  id="descripcion" class="form-control" class="selectpicker" name="descripcion" type="text" data-live-search="true">
  <option value="0">SELECCIONE</option>
  <option value="mIMPRESIÓN">IMPRESIÓN</option>
  <option value="nESCÁNER">ESCÁNER</option>
  </option>
  </select>
  </div>
 
<?php break;
  case "e": ?>


  <div class="col-sm-offset-0 col-sm-4">
  <select  id="descripcion" class="form-control" class="selectpicker" name="descripcion" type="text" data-live-search="true">
  <option value="0">SELECCIONE</option>
  <option value="oFALLA">FALLA</option>
  <option value="pSOLICITUD">SOLICITUD</option>
  </option>
  </select>
  </div>



<?php break;
  case "f": ?>

  <div class="col-sm-offset-0 col-sm-4">
  <select  id="descripcion" class="form-control" class="selectpicker" name="descripcion" type="text" data-live-search="true">
  <option value="0">SELECCIONE</option>
  <option value="qFALLA">FALLA</option>
  <option value="rSOLICITUD">SOLICITUD</option>
  </option>
  </select>
  </div>

<?php break;
  case "g": ?>

  <div class="col-sm-offset-0 col-sm-4">
  <select  id="descripcion" class="form-control" class="selectpicker" name="descripcion" type="text" data-live-search="true">
  <option value="0">SELECCIONE</option>
  <option value="sEQUIPO DE ESCRITORIO">EQUIPO DE ESCRITORIO</option>
  <option value="tLAPTOP">LAPTOP</option>
  <option value="vTABLET">TABLET</option>
  <option value="uSMARTPHONE">SMARTPHONE</option>
  </option>
  </select>
  </div>

<?php break;
  case "h": ?>

  <div class="col-sm-offset-0 col-sm-4">
  <select  id="descripcion" class="form-control" class="selectpicker" name="descripcion" type="text" data-live-search="true">
  <option value="0">SELECCIONE</option>
  <option value="wFALLA">FALLA</option>
  <option value="xSOLICITUD">SOLICITUD</option>
  </option>
  </select>
  </div>

<?php break;
  case "j": ?>

  <div class="col-sm-offset-0 col-sm-4">
  <select  id="descripcion" class="form-control" class="selectpicker" name="descripcion" type="text" data-live-search="true">
  <option value="0">SELECCIONE</option>
  <option value="yLAPTOP">LAPTOP</option>
  <option value="yPROYECTOR/PANTALLA">PROYECTOR/PANTALLA</option>
  <option value="zDISPOSITIVOS EXTRA (PERIFÉRICOS)">DISPOSITIVOS EXTRA (PERIFÉRICOS)</option>
  </option>
  </select>
  </div>


<?php 
  break;
  default: }

}else{ ?>

<input type="hidden" id="descripcion" name="descripcion" value="0">

<?php } ?>

<script type="text/javascript">
    //$(document).ready(function(){
     // $('#descripcion').select2();
   // });


$(document).ready(function(){
  //$('#descripcion').select2();
$('#descripcion').change(function(){
  $.ajax({ type:"post", 
           data:'valor=' + $('#descripcion').val(),
           url:'session/valor.php',
  success:function(r){
    $('#select3').load('select/penultimo.php');
  }
        });
    });
});    
  </script>
  