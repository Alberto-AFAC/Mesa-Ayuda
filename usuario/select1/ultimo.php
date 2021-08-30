<?php session_start();

  $id=0;

				if(isset($_SESSION['consulta']) && !empty($_SESSION['consulta'])){

				
						 $idp=$_SESSION['consulta'];
             $id = $idp[0];
             $desc = substr($idp, 1);
				
//echo '>'.$id;
switch ($id) {
  case "a": ?>

  <div class="col-sm-offset-0 col-sm-4">
  <select  id="solucion" class="form-control" class="selectpicker" name="solucion" type="text" data-live-search="true">
  <option value="0">SELECCIONE</option>
  <option value="aNO ENCIENDE">NO ENCIENDE</option>
  <option value="bLENTO">LENTO</option>
  <option value="cINSTALACIÓN DE APLICACIONES">INSTALACIÓN DE APLICACIONES</option>
  <option value="dASISTENCIA TÉCNICA">ASISTENCIA TÉCNICA</option>
  </select>
  </div>
  <input type="hidden" name="ultima" id="ultima" value="x">
  <input type="hidden" name="final" id="final" value="x">
<?php break;
  case "b":?>

 <div class="col-sm-offset-0 col-sm-4">
  <select  id="solucion" class="form-control" class="selectpicker" name="solucion" type="text" data-live-search="true">
  <option value="0">SELECCIONE</option>
  <option value="eNO ENCIENDE">NO ENCIENDE</option>
  <option value="fPROBLEMA EN COLORACIÓN">PROBLEMA EN COLORACIÓN</option>
  <option value="gCOMPORTAMIENTO INUSUAL">COMPORTAMIENTO INUSUAL</option>
  </select>
  </div>
  <input type="hidden" name="ultima" id="ultima" value="x">
  <input type="hidden" name="final" id="final" value="x">

<?php break;
  case "c": ?>

  <div class="col-sm-offset-0 col-sm-4">
  <select  id="solucion" class="form-control" class="selectpicker" name="solucion" type="text" data-live-search="true">
  <option value="0">SELECCIONE</option>
  <option value="hNO ENCIENDE">NO ENCIENDE</option>
  <option value="iLENTO">LENTO</option>
  <option value="jINSTALACIÓN DE APLICACIONES">INSTALACIÓN DE APLICACIONES</option>
  <option value="kASISTENCIA TÉCNICA">ASISTENCIA TÉCNICA</option>
  </select>
  </div>
  <input type="hidden" name="ultima" id="ultima" value="x">
  <input type="hidden" name="final" id="final" value="x">
<?php break;
 case "d": ?>

 <div class="col-sm-offset-0 col-sm-4">
  <select  id="solucion" class="form-control" class="selectpicker" name="solucion" type="text" data-live-search="true">
  <option value="0">SELECCIONE</option>
  <option value="lNO ENCIENDE">NO ENCIENDE</option>
  <option value="mPROBLEMA EN COLORACIÓN">PROBLEMA EN COLORACIÓN</option>
  <option value="nCAMBIO DE COLOR COMPORTAMIENTO INUSUAL">CAMBIO DE COLOR COMPORTAMIENTO INUSUAL</option>
  </select>
  </div>
  <input type="hidden" name="ultima" id="ultima" value="x">
  <input type="hidden" name="final" id="final" value="x">
<?php break;
  case "e": ?>

  <div class="col-sm-offset-0 col-sm-4">
  <select  id="solucion" class="form-control" class="selectpicker" name="solucion" type="text" data-live-search="true">
  <option value="0">SELECCIONE</option>
  <option value="oFALLA">FALLA</option>
  </select>
  </div>
  <input type="hidden" name="ultima" id="ultima" value="x">
  <input type="hidden" name="final" id="final" value="x">
<?php break;
  case "f": ?>

  <div class="col-sm-offset-0 col-sm-4">
  <select  id="solucion" class="form-control" class="selectpicker" name="solucion" type="text" data-live-search="true">
  <option value="0">SELECCIONE</option>
  <option value="pFALLA">FALLA</option>
  </select>
  </div>
  <input type="hidden" name="ultima" id="ultima" value="x">
  <input type="hidden" name="final" id="final" value="x">
<?php break;
  case "g": ?>

  <div class="col-sm-offset-0 col-sm-4">
  <select  id="solucion" class="form-control" class="selectpicker" name="solucion" type="text" data-live-search="true">
  <option value="0">SELECCIONE</option>
  <option value="qFALLA">FALLA</option>
  </select>
  </div>
  <input type="hidden" name="ultima" id="ultima" value="x">
  <input type="hidden" name="final" id="final" value="x">
<?php break;
  case "h": ?>

  <div class="col-sm-offset-0 col-sm-4">
  <select  id="solucion" class="form-control" class="selectpicker" name="solucion" type="text" data-live-search="true">
  <option value="0">SELECCIONE</option>
  <option value="rNO ENCIENDE">NO ENCIENDE</option>
  <option value="sLENTO">LENTO</option>
  <option value="tINSTALACIÓN DE APLICACIONES">INSTALACIÓN DE APLICACIONES</option>
  <option value="uASISTENCIA TÉCNICA">ASISTENCIA TÉCNICA</option>
  </select>
  </div>
  <input type="hidden" name="ultima" id="ultima" value="x">
  <input type="hidden" name="final" id="final" value="x">
<?php break;
  case "i": ?>

  <div class="col-sm-offset-0 col-sm-4">
  <select  id="solucion" class="form-control" class="selectpicker" name="solucion" type="text" data-live-search="true">
  <option value="0">SELECCIONE</option>
  <option value="vNO ENCIENDE">NO ENCIENDE</option>
  <option value="wPROBLEMA EN COLORACIÓN">PROBLEMA EN COLORACIÓN</option>
  <option value="xCAMBIO DE COLOR COMPORTAMIENTO INUSUAL">CAMBIO DE COLOR COMPORTAMIENTO INUSUAL</option>
  </select>
  </div>
  <input type="hidden" name="ultima" id="ultima" value="x">
  <input type="hidden" name="final" id="final" value="x">
<?php break;
  case "j": ?>

  <div class="col-sm-offset-0 col-sm-4">
  <select  id="solucion" class="form-control" class="selectpicker" name="solucion" type="text" data-live-search="true">
  <option value="0">SELECCIONE</option>
  <option value="yFALLA">FALLA</option>
  </select>
  </div>  
  <input type="hidden" name="ultima" id="ultima" value="x">
  <input type="hidden" name="final" id="final" value="x">
<?php break;
  case "k": ?>

  <div class="col-sm-offset-0 col-sm-4">
  <select  id="solucion" class="form-control" class="selectpicker" name="solucion" type="text" data-live-search="true">
  <option value="0">SELECCIONE</option>
  <option value="zFALLA">FALLA</option>
  </option>
  </select>
  </div>  
  <input type="hidden" name="ultima" id="ultima" value="x">
  <input type="hidden" name="final" id="final" value="x">
<?php break;
  case "l": ?>

  <div class="col-sm-offset-0 col-sm-4">
  <select  id="solucion" class="form-control" class="selectpicker" name="solucion" type="text" data-live-search="true">
  <option value="0">SELECCIONE</option>
  <option value="9FALLA">FALLA</option>
  </select>
  </div>  
  <input type="hidden" name="ultima" id="ultima" value="x">
  <input type="hidden" name="final" id="final" value="x">
<?php break;
  case "m": ?>

  <div class="col-sm-offset-0 col-sm-4">
  <select  id="solucion" class="form-control" class="selectpicker" name="solucion" type="text" data-live-search="true">
  <option value="0">SELECCIONE</option>
  <option value="8FALLA">FALLA</option>
  <option value="7SOLICITUD">SOLICITUD</option>
  </select>
  </div>  
  <input type="hidden" name="ultima" id="ultima" value="x">
  <input type="hidden" name="final" id="final" value="x">
<?php break;
  case "n": ?>

  <div class="col-sm-offset-0 col-sm-4">
  <select  id="solucion" class="form-control" class="selectpicker" name="solucion" type="text" data-live-search="true">
  <option value="0">SELECCIONE</option>
  <option value="6FALLA">FALLA</option>
  <option value="5SOLICITUD">SOLICITUD</option>
  </select>
  </div>  
  <input type="hidden" name="ultima" id="ultima" value="x">
  <input type="hidden" name="final" id="final" value="x">
<?php break;
  case "o": ?>

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

  <input type="hidden" name="ultima" id="ultima" value="x">
  <input type="hidden" name="final" id="final" value="x">

<?php break;
  case "p": ?>

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

  <input type="hidden" name="ultima" id="ultima" value="x">
  <input type="hidden" name="final" id="final" value="x">

<?php break;
  case "q": ?>

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

  <input type="hidden" name="ultima" id="ultima" value="x">
  <input type="hidden" name="final" id="final" value="x">

<?php break;
  case "r": ?>

  <div class="col-sm-offset-0 col-sm-4">
  <select  id="solucion" class="form-control" class="selectpicker" name="solucion" type="text" data-live-search="true">
  <option value="0">SELECCIONE</option>
  <option value="0INSTALACIÓN/CONFIGURACIÓN">INSTALACIÓN/CONFIGURACIÓN</option>
  <option value="0ASESORÍA GENERAL">ASESORÍA GENERAL</option>
  <option value="0COMPARTIR ESCÁNER">COMPARTIR ESCÁNER</option>
  </select>
  </div> 

  <input type="hidden" name="ultima" id="ultima" value="x">
  <input type="hidden" name="final" id="final" value="x">

<?php break;
  case "s": ?>

  <div class="col-sm-offset-0 col-sm-4">
  <select  id="solucion" class="form-control" class="selectpicker" name="solucion" type="text" data-live-search="true">
  <option value="0">SELECCIONE</option>
  <option value="4FALLA">FALLA</option>
  <option value="3SOLICITUD">SOLICITUD</option>
  </select>
  </div>
  <input type="hidden" name="ultima" id="ultima" value="x">
  <input type="hidden" name="final" id="final" value="x">
<?php break;
  case "t": ?>

  <div class="col-sm-offset-0 col-sm-4">
  <select  id="solucion" class="form-control" class="selectpicker" name="solucion" type="text" data-live-search="true">
  <option value="0">SELECCIONE</option>
  <option value="2RED ALÁMBRICA (ETHERNET)">RED ALÁMBRICA (ETHERNET)</option>
  <option value="1RED INALÁMBRICA (WIFI)">RED INALÁMBRICA (WIFI)</option>
  </select>
  </div>
  <input type="hidden" name="ultima" id="ultima" value="x">
  <input type="hidden" name="final" id="final" value="x">
<?php break;
  case "v": ?>

  <div class="col-sm-offset-0 col-sm-4">
  <select  id="solucion" class="form-control" class="selectpicker" name="solucion" type="text" data-live-search="true">
  <option value="0">SELECCIONE</option>
  <option value="_RED INALÁMBRICA (WIFI)">RED INALÁMBRICA (WIFI)</option>
  </select>
  </div>
  <input type="hidden" name="ultima" id="ultima" value="x">
  <input type="hidden" name="final" id="final" value="x">
<?php break;
  case "u": ?>

  <div class="col-sm-offset-0 col-sm-4">
  <select  id="solucion" class="form-control" class="selectpicker" name="solucion" type="text" data-live-search="true">
  <option value="0">SELECCIONE</option>
  <option value="|RED INALÁMBRICA (WIFI)">RED INALÁMBRICA (WIFI)</option>
  </select>
  </div>
  <input type="hidden" name="ultima" id="ultima" value="x">
  <input type="hidden" name="final" id="final" value="x">
<?php break;
  case "w": ?>

  <div class="col-sm-offset-0 col-sm-4">
  <select  id="solucion" class="form-control" class="selectpicker" name="solucion" type="text" data-live-search="true">
  <option value="0">SELECCIONE</option>
  <option value="0NO ENCIENDE">NO ENCIENDE</option>
  <option value="0BOTONES DAÑADOS">BOTONES DAÑADOS</option>
  <option value="0SE ENCUENTRA REGISTRANDO">SE ENCUENTRA REGISTRANDO</option>
  <option value="0NO SALEN LLAMADAS INTERNAS/LOCALES/CELULAR/L. D. NACIONAL/ L. D. MUNDIAL">NO SALEN LLAMADAS INTERNAS/LOCALES/CELULAR/L. D. NACIONAL/ L. D. MUNDIAL</option>
  <option value="0NO SE ESCUCHA TIMBRE DE LLAMADA">NO SE ESCUCHA TIMBRE DE LLAMADA</option>
  <option value="0NO ME ESCUCHAN">NO ME ESCUCHAN</option>
  <option value="0NO ESCUCHO A LA OTRA PERSONA">NO ESCUCHO A LA OTRA PERSONA</option>
  <option value="0NO REGISTRA LLAMADAS PERDIDAS/RECIBIDAS/REALIZADAS">NO REGISTRA LLAMADAS PERDIDAS/RECIBIDAS/REALIZADAS</option>
  <option value="0NO SIRVE ALTAVOZ">NO SIRVE ALTAVOZ</option>
  <option value="0NO SIRVE BOCINA">NO SIRVE BOCINA</option>
  <option value="0SE ESCUCHA INTERFERENCIA DE AUDIO">SE ESCUCHA INTERFERENCIA DE AUDIO</option>
  </select>
  </div>

  <input type="hidden" name="ultima" id="ultima" value="x">
  <input type="hidden" name="final" id="final" value="x">

<?php break;
  case "x": ?>

  <div class="col-sm-offset-0 col-sm-4">
  <select  id="solucion" class="form-control" class="selectpicker" name="solucion" type="text" data-live-search="true">
  <option value="0">SELECCIONE</option>
  <option value="0ASIGNACIÓN DE EQUIPO TELEFÓNICO">ASIGNACIÓN DE EQUIPO TELEFÓNICO</option>
  <option value="0ACTUALIZACIÓN DE NOMBRE EN PANTALLA">ACTUALIZACIÓN DE NOMBRE EN PANTALLA</option>
  <option value="0ACTUALIZACIÓN DE BOTONES ACCESO DIRECTO">ACTUALIZACIÓN DE BOTONES ACCESO DIRECTO</option>
  <option value="0SOLICITUD DE AMPLIACIÓN DE SERVICIO LOCALES">SOLICITUD DE AMPLIACIÓN DE SERVICIO LOCALES</option>
  <option value="0SOLICITUD DE AMPLIACIÓN DE SERVICIO CELULAR">SOLICITUD DE AMPLIACIÓN DE SERVICIO CELULAR</option>
  <option value="0SOLICITUD DE AMPLIACIÓN DE SERVICIO D. NACIONAL">SOLICITUD DE AMPLIACIÓN DE SERVICIO D. NACIONAL</option>
  <option value="0SOLICITUD DE AMPLIACIÓN DE SERVICIO L. D. MUNDIAL">SOLICITUD DE AMPLIACIÓN DE SERVICIO L. D. MUNDIAL</option>
  <option value="0ACTIVACIÓN DE FUNCIÓN SECRETARIAL">ACTIVACIÓN DE FUNCIÓN SECRETARIAL</option>  
  <option value="0DESVIÓ DE LLAMADAS">DESVIÓ DE LLAMADAS</option>  
  </select>
  </div>
  <input type="hidden" name="ultima" id="ultima" value="x">
  <input type="hidden" name="final" id="final" value="x">

<?php break;
  case "z": ?>

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

  <input type="hidden" name="ultima" id="ultima" value="x">
  <input type="hidden" name="final" id="final" value="x">

<?php 
  break;
  default: }

}else{ ?>
<!-- <div class="col-sm-offset-0 col-sm-4"><select  id="solucion" class="form-control" class="selectpicker" name="solucion" type="text" data-live-search="true" disabled=""><option value="0">SELECCIONE OPCIÓN</option></select></div> -->
<input type="hidden" id="ultima" name="ultima" value="0">
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