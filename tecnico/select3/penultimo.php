<?php session_start();
  
  $id=0;//esto comentalo y ponle el defaul 0

				if(isset($_SESSION['consulta']) && !empty($_SESSION['consulta'])){

					
						 $idp=$_SESSION['consulta'];
             $id = $idp[0];
             $desc = substr($idp, 1);
             ?>
             <?php
					
//echo '>'.$id;
switch ($id) /*aCPU*/{
  case "a":?>

  <div class="col-sm-offset-0 col-sm-4">
  <select  id="solucion" class="form-control" class="selectpicker" name="solucion" type="text" data-live-search="true">
  <option value="0">SELECCIONE</option>
  <option value="aNO ENCIENDE">NO ENCIENDE</option>
  <option value="bLENTO">LENTO</option>
  <option value="cINSTALACIÓN DE APLICACIONES">INSTALACIÓN DE APLICACIONES</option>
  <option value="dASISTENCIA TÉCNICA">ASISTENCIA TÉCNICA</option>

  </select>
  </div>
  <input type="hidden" name="final" id="final" value="x">
<?php break;
  case "b": /*bMONITOR*/?>

 <div class="col-sm-offset-0 col-sm-4">
  <select  id="solucion" class="form-control" class="selectpicker" name="solucion" type="text" data-live-search="true">
  <option value="0">SELECCIONE</option>
  <option value="eNO ENCIENDE">NO ENCIENDE</option>
  <option value="fPROBLEMA EN COLORACIÓN">PROBLEMA EN COLORACIÓN</option>
  <option value="gCOMPORTAMIENTO INUSUAL">COMPORTAMIENTO INUSUAL</option>
  </select>
  </div>
  <input type="hidden" name="final" id="final" value="x">
 
<?php break;
  case "c": /*TECLADO*/?>

  <div class="col-sm-offset-0 col-sm-4">
  <select  id="solucion" class="form-control" class="selectpicker" name="solucion" type="text" data-live-search="true">
  <option value="0">SELECCIONE</option>
  <option value="hFALLA">FALLA</option>
  </select>
  </div>
  <input type="hidden" name="final" id="final" value="x">
<?php break;
 case "d": /*RATÓN*/?>

 <div class="col-sm-offset-0 col-sm-4">
  <select  id="solucion" class="form-control" class="selectpicker" name="solucion" type="text" data-live-search="true">
  <option value="0">SELECCIONE</option>
  <option value="iFALLA">FALLA</option>
  </select>
  </div>
  <input type="hidden" name="final" id="final" value="x">
<?php break;
  case "e": /*DISPOSITIVOS EXTRA (PERIFÉRICOS)*/?>

  <div class="col-sm-offset-0 col-sm-4">
  <select  id="solucion" class="form-control" class="selectpicker" name="solucion" type="text" data-live-search="true">
  <option value="0">SELECCIONE</option>
  <option value="jMICRÓFONO">MICRÓFONO</option>
  <option value="kWEBCAM">WEBCAM</option>
  <option value="lBOCINAS">BOCINAS</option>
  </select>
  </div>
<?php break;
  case "f": /*GENERAL*/?>
  <div class="col-sm-offset-0 col-sm-4">
  <select  id="solucion" class="form-control" class="selectpicker" name="solucion" type="text" data-live-search="true">
  <option value="0">SELECCIONE</option>
  <option value="mNO ENCIENDE">NO ENCIENDE</option>
  <option value="nLENTO">LENTO</option>
  <option value="oINSTALACIÓN DE APLICACIONES">INSTALACIÓN DE APLICACIONES</option>
  <option value="pASISTENCIA TÉCNICA ">ASISTENCIA TÉCNICA </option>
  </select>
  </div>
<?php break;
  case "g": /*PANTALLA*/?>

  <div class="col-sm-offset-0 col-sm-4">
  <select  id="solucion" class="form-control" class="selectpicker" name="solucion" type="text" data-live-search="true">
  <option value="0">SELECCIONE</option>
  <option value="qNO ENCIENDE">NO ENCIENDE</option>
  <option value="rPROBLEMA EN COLORACIÓN ">PROBLEMA EN COLORACIÓN </option>
  <option value="sCAMBIO DE COLOR COMPORTAMIENTO INUSUAL">CAMBIO DE COLOR COMPORTAMIENTO INUSUAL</option>
  </select>
  </div>

<?php break;
  case "h": /*TECLADO*/?>

  <div class="col-sm-offset-0 col-sm-4">
  <select  id="solucion" class="form-control" class="selectpicker" name="solucion" type="text" data-live-search="true">
  <option value="0">SELECCIONE</option>
  <option value="tFALLA">FALLA</option>
  </select>
  </div>
  <input type="hidden" name="final" id="final" value="x">
<?php break;
  case "i": /*PANEL TÁCTIL/RATÓN*/?>

  <div class="col-sm-offset-0 col-sm-4">
  <select  id="solucion" class="form-control" class="selectpicker" name="solucion" type="text" data-live-search="true">
  <option value="0">SELECCIONE</option>
  <option value="uFALLA">FALLA</option>
  </select>
  </div>

  <input type="hidden" name="final" id="final" value="x">
<?php break;
  case "j": /*BATERÍA*/?>

  <div class="col-sm-offset-0 col-sm-4">
  <select  id="solucion" class="form-control" class="selectpicker" name="solucion" type="text" data-live-search="true">
  <option value="0">SELECCIONE</option>
  <option value="vFALLA">FALLA</option>
  </select>
  </div>  
  <input type="hidden" name="final" id="final" value="x">


<?php break;
  case "k": /*TABLETA-GENERAL*/?>

  <div class="col-sm-offset-0 col-sm-4">
  <select  id="solucion" class="form-control" class="selectpicker" name="solucion" type="text" data-live-search="true">
  <option value="0">SELECCIONE</option>
  <option value="wNO ENCIENDE">NO ENCIENDE</option>
  <option value="xLENTO">LENTO</option>
  <option value="yINSTALACIÓN DE APLICACIONES">INSTALACIÓN DE APLICACIONES</option>
  <option value="zASISTENCIA TÉCNICA">ASISTENCIA TÉCNICA</option>
  </option>
  </select>
  </div>  
  <input type="hidden" name="final" id="final" value="x">
<?php break;
  case "l": /*TABLETA-PANTALLA*/?>

  <div class="col-sm-offset-0 col-sm-4">
  <select  id="solucion" class="form-control" class="selectpicker" name="solucion" type="text" data-live-search="true">
  <option value="0">SELECCIONE</option>
  <option value="1NO ENCIENDE">NO ENCIENDE</option>
  <option value="2PROBLEMA EN COLORACIÓN">PROBLEMA EN COLORACIÓN</option>
  <option value="3CAMBIO DE COLOR COMPORTAMIENTO INUSUAL">CAMBIO DE COLOR COMPORTAMIENTO INUSUAL</option>
  </select>
  </div>  

  <input type="hidden" name="final" id="final" value="x">
<?php break;
  case "m": /*TECLADO FÍSICO/VIRTUAL*/?>

  <div class="col-sm-offset-0 col-sm-4">
  <select  id="solucion" class="form-control" class="selectpicker" name="solucion" type="text" data-live-search="true">
  <option value="0">SELECCIONE</option>
  <option value="4FALLA">FALLA</option>
  </select>
  </div>  
  <input type="hidden" name="final" id="final" value="x">
<?php break;
  case "n": /*PANEL TÁCTIL/RATÓN*/?>

  <div class="col-sm-offset-0 col-sm-4">
  <select  id="solucion" class="form-control" class="selectpicker" name="solucion" type="text" data-live-search="true">
  <option value="0">SELECCIONE</option>
  <option value="5FALLA">FALLA</option>
  </select>
  </div>  
  <input type="hidden" name="final" id="final" value="x">
<?php break;
  case "o": /*BATERÍA*/?>

  <div class="col-sm-offset-0 col-sm-4">
  <select  id="solucion" class="form-control" class="selectpicker" name="solucion" type="text" data-live-search="true">
  <option value="0">SELECCIONE</option>
  <option value="6FALLA">FALLA</option>
  </select>
  </div> 
  <input type="hidden" name="final" id="final" value="x">
  
<?php break;
  case "p": ?>

  <div class="col-sm-offset-0 col-sm-4">
  <select  id="solucion" class="form-control" class="selectpicker" name="solucion" type="text" data-live-search="true">
  <option value="0">SELECCIONE</option>
  <option value="7FALLA">FALLA</option>
  <option value="8SOLICITUD">SOLICITUD</option>
  </select>
  </div> 
  <input type="hidden" name="final" id="final" value="x">

<?php break;
  case "q": ?>

  <div class="col-sm-offset-0 col-sm-4">
  <select  id="solucion" class="form-control" class="selectpicker" name="solucion" type="text" data-live-search="true">
  <option value="0">SELECCIONE</option>
  <option value="9FALLA">FALLA</option>
  <option value="/SOLICITUD">SOLICITUD</option>
  </select>
  </div> 

  <input type="hidden" name="final" id="final" value="x">

<?php break;
  case "r": ?>

  <div class="col-sm-offset-0 col-sm-4">
  <select  id="solucion" class="form-control" class="selectpicker" name="solucion" type="text" data-live-search="true">
  <option value="0">SELECCIONE</option>
  <option value="0NO IMPRIME">NO IMPRIME</option>
  <option value="0HOJA ATORADA">HOJA ATORADA</option>
  <option value="0MALA CALIDAD">MALA CALIDAD</option>
  <option value="0ARRUGADA LAS HOJAS">ARRUGADA LAS HOJAS</option>
  <option value="0RUIDOS AL IMPRIMIR">RUIDOS AL IMPRIMIR</option>
  </select>
  </div> 
  <input type="hidden" name="ultima" id="ultima" value="xx">
  <input type="hidden" name="final" id="final" value="x">

<?php break;
  case "s": ?>

  <div class="col-sm-offset-0 col-sm-4">
  <select  id="solucion" class="form-control" class="selectpicker" name="solucion" type="text" data-live-search="true">
  <option value="0">SELECCIONE</option>
  <option value="0FALTA CONSUMIBLE">FALTA CONSUMIBLE</option>
  <option value="0INSTALACIÓN/CONFIGURACIÓN">INSTALACIÓN/CONFIGURACIÓN</option>
  <option value="0ASESORÍA GENERAL">ASESORÍA GENERAL</option>
  <option value="0REUBICACIÓN DE EQUIPO">REUBICACIÓN DE EQUIPO</option>
  <option value="0COMPARTIR IMPRESORA">COMPARTIR IMPRESORA</option>
  </select>
  </div>
  <input type="hidden" name="ultima" id="ultima" value="xx"> 
  <input type="hidden" name="final" id="final" value="x">
<?php break;
  case "t": ?>

  <div class="col-sm-offset-0 col-sm-4">
  <select  id="solucion" class="form-control" class="selectpicker" name="solucion" type="text" data-live-search="true">
  <option value="0">SELECCIONE</option>
  <option value="0NO ESCANEA">NO ESCANEA</option>
  <option value="0HOJA ATORADA">HOJA ATORADA</option>
  <option value="0MALA CALIDAD">MALA CALIDAD</option>
  <option value="0ARRUGADA LAS HOJAS">ARRUGADA LAS HOJAS</option>
  <option value="0RUIDOS AL ESCANEAR">RUIDOS AL ESCANEAR</option>
  <option value="0LÍNEA EN ESCANEO">LÍNEA EN ESCANEO</option>

  </select>
  </div>
  <input type="hidden" name="ultima" id="ultima" value="xx">
  <input type="hidden" name="final" id="final" value="x">
<?php break;
  case "v": ?>

  <div class="col-sm-offset-0 col-sm-4">
  <select  id="solucion" class="form-control" class="selectpicker" name="solucion" type="text" data-live-search="true">
  <option value="0">SELECCIONE</option>
  <option value="0INSTALACIÓN/CONFIGURACIÓN">INSTALACIÓN/CONFIGURACIÓN</option>
  <option value="0ASESORÍA GENERAL">ASESORÍA GENERAL</option>
  <option value="0COMPARTIR ESCÁNER">COMPARTIR ESCÁNER</option>
  </select>
  </div>
  <input type="hidden" name="ultima" id="ultima" value="xx">
  <input type="hidden" name="final" id="final" value="x">
<?php break;
  case "u": ?>

  <div class="col-sm-offset-0 col-sm-4">
  <select  id="solucion" class="form-control" class="selectpicker" name="solucion" type="text" data-live-search="true">
  <option value="0">SELECCIONE</option>
  <option value="*FALLA">FALLA</option>
  <option value="-SOLICITUD">SOLICITUD</option>

  </select>
  </div>
  <input type="hidden" name="ultima" id="ultima" value="xx">
  <input type="hidden" name="final" id="final" value="x">
<?php break;
  case "w": ?>

  <div class="col-sm-offset-0 col-sm-4">
  <select  id="solucion" class="form-control" class="selectpicker" name="solucion" type="text" data-live-search="true">
  <option value="0">SELECCIONE</option>
  <option value="_RED ALÁMBRICA (ETHERNET) ">RED ALÁMBRICA (ETHERNET)</option> 
  <option value="_RED INALÁMBRICA (WIFI)  ">RED INALÁMBRICA (WIFI) </option> 
  </select>
  </div>
  <input type="hidden" name="final" id="final" value="x">

<?php break;
  case "x": ?>

  <div class="col-sm-offset-0 col-sm-4">
  <select  id="solucion" class="form-control" class="selectpicker" name="solucion" type="text" data-live-search="true">
  <option value="0">SELECCIONE</option>
  <option value=".RED INALÁMBRICA (WIFI)">RED INALÁMBRICA (WIFI)</option>  
  </select>
  </div>
  <input type="hidden" name="final" id="final" value="x">

<?php break;
  case "y": ?>

  <div class="col-sm-offset-0 col-sm-4">
  <select  id="solucion" class="form-control" class="selectpicker" name="solucion" type="text" data-live-search="true">
  <option value="0">SELECCIONE</option>
  <option value="0NO ENCIENDE"> NO ENCIENDE</option>
  <option value="0BOTONES DAÑADOS"> BOTONES DAÑADOS</option>
  <option value="0SE ENCUENTRA REGISTRANDO"> SE ENCUENTRA REGISTRANDO</option>
  <option value="0NO SALEN LLAMADAS INTERNAS/LOCALES/CELULAR/L. D. NACIONAL/ L. D. MUNDIAL"> NO SALEN LLAMADAS INTERNAS/LOCALES/CELULAR/L. D. NACIONAL/ L. D. MUNDIAL</option>
  <option value="0NO SE ESCUCHA TIMBRE DE LLAMADA"> NO SE ESCUCHA TIMBRE DE LLAMADA</option>
  <option value="0NO ME ESCUCHAN"> NO ME ESCUCHAN</option>
  <option value="0NO ESCUCHO A LA OTRA PERSONA"> NO ESCUCHO A LA OTRA PERSONA</option>
  <option value="0NO REGISTRA LLAMADAS PERDIDAS/RECIBIDAS/REALIZADAS"> NO REGISTRA LLAMADAS PERDIDAS/RECIBIDAS/REALIZADAS</option>
  <option value="0NO SIRVE ALTAVOZ"> NO SIRVE ALTAVOZ</option>
  <option value="0NO SIRVE BOCINA"> NO SIRVE BOCINA</option>
  <option value="0SE ESCUCHA INTERFERENCIA DE AUDIO"> SE ESCUCHA INTERFERENCIA DE AUDIO</option>
  </select>
  </div>

  <input type="hidden" name="ultima" id="ultima" value="xx">
  <input type="hidden" name="final" id="final" value="x">


<?php break;
  case "z": ?>

  <div class="col-sm-offset-0 col-sm-4">
  <select  id="solucion" class="form-control" class="selectpicker" name="solucion" type="text" data-live-search="true">
  <option value="0">SELECCIONE</option>
  <option value="=ASIGNACIÓN DE EQUIPO TELEFÓNICO">ASIGNACIÓN DE EQUIPO TELEFÓNICO</option>
  <option value="=ACTUALIZACIÓN DE NOMBRE EN PANTALLA">ACTUALIZACIÓN DE NOMBRE EN PANTALLA</option>
  <option value="=ACTUALIZACIÓN DE BOTONES ACCESO DIRECTO">ACTUALIZACIÓN DE BOTONES ACCESO DIRECTO</option>
  <option value=",SOLICITUD DE AMPLIACIÓN DE SERVICIO">SOLICITUD DE AMPLIACIÓN DE SERVICIO</option>
  <option value="=ACTIVACIÓN DE FUNCIÓN SECRETARIAL">ACTIVACIÓN DE FUNCIÓN SECRETARIAL</option>
  <option value="=DESVIÓ DE LLAMADAS">DESVIÓ DE LLAMADAS</option>
  </select>
  </div>

<?php break;
  case "1": ?>
  <input type="hidden" name="solucion" id="solucion" value="xx">
  <input type="hidden" name="ultima" id="ultima" value="xx">
  <input type="hidden" name="final" id="final" value="x">

<?php break;
  case "2": ?>
  
  <div class="col-sm-offset-0 col-sm-4">
  <select  id="solucion" class="form-control" class="selectpicker" name="solucion" type="text" data-live-search="true">
  <option value="0">SELECCIONE</option>
  <option value="0MICRÓFONO">MICRÓFONO</option>
  <option value="0WEBCAM">WEBCAM</option>
  <option value="0BOCINAS">BOCINAS</option>
  <option value="0CONEXIÓN INALÁMBRICA INTERNET">CONEXIÓN INALÁMBRICA INTERNET</option>
  <option value="0CABLES Y/O ADAPTADORES DE AUDIO/VIDEO">CABLES Y/O ADAPTADORES DE AUDIO/VIDEO</option>
  </select>
  </div>

  <input type="hidden" name="ultima" id="ultima" value="xx">
  <input type="hidden" name="final" id="final" value="x">

<?php 
  break;
  default: }

}else{ ?>
<!-- <div class="col-sm-offset-0 col-sm-4"><select  id="solucion" class="form-control" class="selectpicker" name="solucion" type="text" data-live-search="true" disabled=""><option value="0">SELECCIONE OPCIÓN</option></select></div> -->
<input type="hidden" id="solucion" name="solucion" value="x">
<?php } ?>

<script type="text/javascript">
 


$(document).ready(function(){
 // $('#solucion').select2();
$('#solucion').change(function(){
  $.ajax({ type:"post", 
           data:'valor=' + $('#solucion').val(),
           url:'session/valor.php',
  success:function(r){
    $('#select4').load('select/ultimo.php');
    console.log("Si esta entrando" + $('#solucion').val());
  }
        });
    });
});

  </script>
  