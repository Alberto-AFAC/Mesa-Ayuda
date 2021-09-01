<?php session_start();
  
  $id=0;

				if(isset($_SESSION['consulta']) && !empty($_SESSION['consulta'])){

			
						 $idp=$_SESSION['consulta'];
             $id = $idp[0];
             $desc = substr($idp, 1);
            
					
switch ($id) {
  case "a"://  echo $_SESSION['consulta'];?>

  <div class="col-sm-offset-0 col-sm-4">
  <select  id="descripcion" class="form-control" class="selectpicker" name="descripcion" type="text" data-live-search="true">
  <option value="0">SELECCIONE</option>
  <option value="aCPU">CPU</option>
  <option value="bMONITOR">MONITOR</option>
  <option value="cTECLADO">TECLADO</option>
  <option value="dRATÓN">RATÓN</option>
  <option value="eDISPOSITIVOS EXTRA (PERIFÉRICOS)">DISPOSITIVOS EXTRA (PERIFÉRICOS)</option>
  </option>
  </select>
  </div>
 

<?php break;
  case "b": ?>
 <div class="col-sm-offset-0 col-sm-4">
  <select  id="descripcion" class="form-control" class="selectpicker" name="descripcion" type="text" data-live-search="true">
  <option value="0">SELECCIONE</option>
  <option value="fGENERAL">GENERAL</option>
  <option value="gPANTALLA">PANTALLA</option>
  <option value="hTECLADO">TECLADO</option>
  <option value="iPANEL TÁCTIL/RATÓN">PANEL TÁCTIL/RATÓN</option>
  <option value="jBATERÍA">BATERÍA</option>
  </option>
  </select>
  </div>
 
 
  <?php break;
    case "c": ?>

    <div class="col-sm-offset-0 col-sm-4">
    <select  id="descripcion" class="form-control" class="selectpicker" name="descripcion" type="text" data-live-search="true">
    <option value="0">SELECCIONE</option>
    <option value="kGENERAL">GENERAL</option>
    <option value="lPANTALLA">PANTALLA</option>
    <option value="mTECLADO FÍSICO/VIRTUAL">TECLADO FÍSICO/VIRTUAL</option>
    <option value="nPANEL TÁCTIL/RATÓN">PANEL TÁCTIL/RATÓN</option>
    <option value="oBATERÍA">BATERÍA</option>
    </option>
    </select>
    </div>

<?php break;
 case "d": ?>

 <div class="col-sm-offset-0 col-sm-4">
  <select  id="descripcion" class="form-control" class="selectpicker" name="descripcion" type="text" data-live-search="true">
  <option value="0">SELECCIONE</option>
  <option value="pIMPRESIÓN">IMPRESIÓN</option>
  <option value="qESCÁNER">ESCÁNER</option>
  </option>
  </select>
  </div>
 
<?php break;
  case "e": ?>


  <div class="col-sm-offset-0 col-sm-4">
  <select  id="descripcion" class="form-control" class="selectpicker" name="descripcion" type="text" data-live-search="true">
  <option value="0">SELECCIONE</option>
  <option value="rFALLA">FALLA</option>
  <option value="sSOLICITUD">SOLICITUD</option>
  </option>
  </select>
  </div>



<?php break;
  case "f": ?>

  <div class="col-sm-offset-0 col-sm-4">
  <select  id="descripcion" class="form-control" class="selectpicker" name="descripcion" type="text" data-live-search="true">
  <option value="0">SELECCIONE</option>
  <option value="tFALLA">FALLA</option>
  <option value="vSOLICITUD">SOLICITUD</option>
  </option>
  </select>
  </div>

<?php break;
  case "g": ?>

  <div class="col-sm-offset-0 col-sm-4">
  <select  id="descripcion" class="form-control" class="selectpicker" name="descripcion" type="text" data-live-search="true">
  <option value="0">SELECCIONE</option>
  <option value="uEQUIPO DE ESCRITORIO">EQUIPO DE ESCRITORIO</option>
  <option value="wLAPTOP">LAPTOP</option>
  <option value="xTABLET">TABLET</option>
  <option value="xSMARTPHONE">SMARTPHONE</option>
  </option>
  </select>
  </div>

<?php break;
  case "h": ?>

  <div class="col-sm-offset-0 col-sm-4">
  <select  id="descripcion" class="form-control" class="selectpicker" name="descripcion" type="text" data-live-search="true">
  <option value="0">SELECCIONE</option>
  <option value="yFALLA">FALLA</option>
  <option value="zSOLICITUD">SOLICITUD</option>
  </option>
  </select>
  </div>

<?php break;
  case "i": ?>

  <div class="col-sm-offset-0 col-sm-4">
  <select  id="descripcion" class="form-control" class="selectpicker" name="descripcion" type="text" data-live-search="true">
  <option value="0">SELECCIONE</option>
  <option value="1LAPTOP">LAPTOP</option>
  <option value="1PROYECTOR/PANTALLA">PROYECTOR/PANTALLA</option>
  <option value="2DISPOSITIVOS EXTRA (PERIFÉRICOS)">DISPOSITIVOS EXTRA (PERIFÉRICOS)</option>
  </option>
  </select>
  </div>
  

<?php 
  break;
  default: }

}else{ ?>

<input type="hidden" id="descripcion" name="descripcion" value="x">

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
    console.log("Si esta entrando aqui" + $('#descripcion').val())
  }
        });
    });
});    
  </script>
  