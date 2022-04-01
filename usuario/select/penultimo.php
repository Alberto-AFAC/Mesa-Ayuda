<?php session_start();
  
  $id=0;//esto comentalo y ponle el defaul 0

				if(isset($_SESSION['consulta']) && !empty($_SESSION['consulta'])){

					
						 $idp=$_SESSION['consulta'];
             $id = $idp[0];
             $desc = substr($idp, 1);
             ?>
             <?php
					
//cho '>'.$id;
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
 
<?php break;
  case "c": /*TECLADO*/?>

  <div class="col-sm-offset-0 col-sm-4">
  <select  id="solucion" class="form-control" class="selectpicker" name="solucion" type="text" data-live-search="true">
  <option value="0">SELECCIONE</option>
  <option value="hFALLA">FALLA</option>
  </select>
  </div>
<?php break;
 case "d": /*RATÓN*/?>

 <div class="col-sm-offset-0 col-sm-4">
  <select  id="solucion" class="form-control" class="selectpicker" name="solucion" type="text" data-live-search="true">
  <option value="0">SELECCIONE</option>
  <option value="iFALLA">FALLA</option>
  </select>
  </div>
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

<?php break;
  case "i": /*PANEL TÁCTIL/RATÓN*/?>

  <div class="col-sm-offset-0 col-sm-4">
  <select  id="solucion" class="form-control" class="selectpicker" name="solucion" type="text" data-live-search="true">
  <option value="0">SELECCIONE</option>
  <option value="uFALLA">FALLA</option>
  </select>
  </div>

<?php break;
  case "j": /*BATERÍA*/?>

  <div class="col-sm-offset-0 col-sm-4">
  <select  id="solucion" class="form-control" class="selectpicker" name="solucion" type="text" data-live-search="true">
  <option value="0">SELECCIONE</option>
  <option value="vFALLA">FALLA</option>
  </select>
  </div>  

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

<?php break;
  case "o": /*BATERÍA*/?>

  <div class="col-sm-offset-0 col-sm-4">
  <select  id="solucion" class="form-control" class="selectpicker" name="solucion" type="text" data-live-search="true">
  <option value="0">SELECCIONE</option>
  <option value="6FALLA">FALLA</option>
  </select>
  </div> 
  
<?php break;
  case "p": ?>

  <div class="col-sm-offset-0 col-sm-4">
  <select  id="solucion" class="form-control" class="selectpicker" name="solucion" type="text" data-live-search="true">
  <option value="0">SELECCIONE</option>
  <option value="7FALLA">FALLA</option>
  <option value="8SOLICITUD">SOLICITUD</option>
  </select>
  </div> 

<?php break;
  case "q": ?>

  <div class="col-sm-offset-0 col-sm-4">
  <select  id="solucion" class="form-control" class="selectpicker" name="solucion" type="text" data-live-search="true">
  <option value="0">SELECCIONE</option>
  <option value="9FALLA">FALLA</option>
  <option value="/SOLICITUD">SOLICITUD</option>
  </select>
  </div> 

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

<?php break;
  case "w": ?>

  <div class="col-sm-offset-0 col-sm-4">
  <select  id="solucion" class="form-control" class="selectpicker" name="solucion" type="text" data-live-search="true">
  <option value="0">SELECCIONE</option>
  <option value="_RED ALÁMBRICA (ETHERNET) ">RED ALÁMBRICA (ETHERNET)</option> 
  <option value="_RED INALÁMBRICA (WIFI)  ">RED INALÁMBRICA (WIFI) </option> 
  </select>
  </div>

<?php break;
  case "x": ?>

  <div class="col-sm-offset-0 col-sm-4">
  <select  id="solucion" class="form-control" class="selectpicker" name="solucion" type="text" data-live-search="true">
  <option value="0">SELECCIONE</option>
  <option value=".RED INALÁMBRICA (WIFI)">RED INALÁMBRICA (WIFI)</option>  
  </select>
  </div>

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
  <!-- SISTEMAS -->
  <?php break;
  case "3": ?>
  
  <div class="col-sm-offset-0 col-sm-6">
  <select  id="solucion" class="form-control" class="selectpicker" name="solucion" type="text" data-live-search="true">
  <option value="0">SELECCIONE</option>
  <option value="0NO PERMITE LA DESCARGA DE DOCUMENTOS PUBLICADOS">NO PERMITE LA DESCARGA DE DOCUMENTOS PUBLICADOS</option>
  <option value="0NO SE VISUALIZA EL CONTENIDO DEL PORTAL">NO SE VISUALIZA EL CONTENIDO DEL PORTAL</option>
  </select>
  </div>
  <input type="hidden" name="ultima" id="ultima" value="xx">
  <input type="hidden" name="final" id="final" value="x">




  
  <?php break;
  case "4": ?>
  
  <div class="col-sm-offset-0 col-sm-6">
  <select  id="solucion" class="form-control" class="selectpicker" name="solucion" type="text" data-live-search="true">
  <option value="0">SELECCIONE</option>
  <option value="0LOCALIZACIÓN DE INFORMACIÓN ESPECIFICA">LOCALIZACIÓN DE INFORMACIÓN ESPECIFICA</option>
  </select>
  </div>
  <input type="hidden" name="ultima" id="ultima" value="xx">
  <input type="hidden" name="final" id="final" value="x">

  <?php break;
  case "5": ?>
  
  <div class="col-sm-offset-0 col-sm-6">
  <select  id="solucion" class="form-control" class="selectpicker" name="solucion" type="text" data-live-search="true">
  <option value="0">SELECCIONE</option>
  <option value="0PUBLICACIÓN DE DOCUMENTO NUEVO">PUBLICACIÓN DE DOCUMENTO NUEVO</option>
  <option value="0MODIFICACIÓN DE DOCUMENTO EXISTENTE">MODIFICACIÓN DE DOCUMENTO EXISTENTE</option>
  <option value="0BAJA DE DOCUMENTO EXISTENTE">BAJA DE DOCUMENTO EXISTENTE</option>
  <option value="0CREACIÓN DE UN NUEVO MÓDULO">CREACIÓN DE UN NUEVO MÓDULO</option>
  <option value="0MODIFICACIÓN DE UN NUEVO MÓDULO EXISTENTE">MODIFICACIÓN DE UN NUEVO MÓDULO EXISTENTE</option>
  <option value="0BAJA DE UN MODULO EXISTENTE">BAJA DE UN MODULO EXISTENTE</option>
  <option value="0OTROS">OTROS (ESPECIFICAR EN OBSERVACIONES)</option>


  </select>
  </div>
  <input type="hidden" name="ultima" id="ultima" value="xx">
  <input type="hidden" name="final" id="final" value="x">

  <?php break;
  case "6": ?>
  
  <div class="col-sm-offset-0 col-sm-6">
  <select  id="solucion" class="form-control" class="selectpicker" name="solucion" type="text" data-live-search="true">
  <option value="0">SELECCIONE</option>
  <option value="0NO FINALIZA EL PROCESO DE CAPTURA DE UNA INSPECCIÓN">NO FINALIZA EL PROCESO DE CAPTURA DE UNA INSPECCIÓN</option>
  <option value="0NO RESUELVE LA SOLICITUD DEL USUARIO">NO RESUELVE LA SOLICITUD DEL USUARIO</option>
  <option value="0PROBLEMAS EN LAS COMUNICACIONES">PROBLEMAS EN LAS COMUNICACIONES</option>
  <option value="0OTROS">OTROS (ESPECIFICAR EN OBSERVACIONES)</option>


  </select>
  </div>
  <input type="hidden" name="ultima" id="ultima" value="xx">
  <input type="hidden" name="final" id="final" value="x">

  <?php break;
  case "7": ?>
  
  <div class="col-sm-offset-0 col-sm-6">
  <select  id="solucion" class="form-control" class="selectpicker" name="solucion" type="text" data-live-search="true">
  <option value="0">SELECCIONE</option>
  <option value="0NO SE GUARDARON LOS DATOS REGISTRADOS DE UNA INSPECCIÓN">NO SE GUARDARON LOS DATOS REGISTRADOS DE UNA INSPECCIÓN</option>
  <option value="0NO SE LOCALIZAN INSPECCIONES DE INSPECCIONES REGISTRADOS ANTERIORMENTE">NO SE LOCALIZAN INSPECCIONES DE INSPECCIONES REGISTRADOS ANTERIORMENTE</option>
  <option value="0OTROS">OTROS (ESPECIFICAR EN OBSERVACIONES)</option>


  </select>
  </div>
  <input type="hidden" name="ultima" id="ultima" value="xx">
  <input type="hidden" name="final" id="final" value="x">

  <?php break;
  case "8": ?>
  
  <div class="col-sm-offset-0 col-sm-6">
  <select  id="solucion" class="form-control" class="selectpicker" name="solucion" type="text" data-live-search="true">
  <option value="0">SELECCIONE</option>
  <option value="0NO RECONOCE USUARIO/CONTRASEÑA">NO RECONOCE USUARIO/CONTRASEÑA</option>
  <option value="0NO PERMITE GENERAR UNA NUEVA CONTRASEÑA">NO PERMITE GENERAR UNA NUEVA CONTRASEÑA</option>
  <option value="0OTROS">OTROS (ESPECIFICAR EN OBSERVACIONES)</option>


  </select>
  </div>
  <input type="hidden" name="ultima" id="ultima" value="xx">
  <input type="hidden" name="final" id="final" value="x">

  <?php break;
  case "9": ?>
  
  <div class="col-sm-offset-0 col-sm-6">
  <select  id="solucion" class="form-control" class="selectpicker" name="solucion" type="text" data-live-search="true">
  <option value="0">SELECCIONE</option>
  <option value="0NO GENERA EL NÚMERO DE SOLICITUD">NO GENERA EL NÚMERO DE SOLICITUD</option>
  <option value="0NO FINALIZA EL PROCESO DE REGISTRO DE UNA SOLICITUD">NO FINALIZA EL PROCESO DE REGISTRO DE UNA SOLICITUD </option>
  <option value="0NO PERMITE LA CARGA DE DOCUMENTOS DE SOPORTE">NO PERMITE LA CARGA DE DOCUMENTOS DE SOPORTE</option>
  <option value="0NO IMPRIME LICENCIA DE PERSONAL TÉCNICO AERONÁUTICO">NO IMPRIME LICENCIA DE PERSONAL TÉCNICO AERONÁUTICO</option>
  <option value="0NO IMPRIME EL REPORTE DE LA LICENCIA PROVISIONAL">NO IMPRIME EL REPORTE DE LA LICENCIA PROVISIONAL</option>
  <option value="0PROBLEMAS EN LAS COMUNICACIONES">PROBLEMAS EN LAS COMUNICACIONES</option>
  <option value="0OTROS">OTROS (ESPECIFICAR EN OBSERVACIONES)</option>


  </select>
  </div>
  <input type="hidden" name="ultima" id="ultima" value="xx">
  <input type="hidden" name="final" id="final" value="x">

  <?php break;
  case "-": ?>
  
  <div class="col-sm-offset-0 col-sm-6">
  <select  id="solucion" class="form-control" class="selectpicker" name="solucion" type="text" data-live-search="true">
  <option value="0">SELECCIONE</option>
  <option value="0NO SE GUARDARON LOS DATOS REGISTRADOS DE UNA SOLICITUD">NO SE GUARDARON LOS DATOS REGISTRADOS DE UNA SOLICITUD</option>
  <option value="0NO SE PLASMAN LOS DATOS DE UNA LICENCIAS">NO SE PLASMAN LOS DATOS DE UNA LICENCIAS</option>
  <option value="0NO SE VISUALIZA LA TOTALIDAD DE DATOS EN EL REPORTE DE LICENCIA PROVISIONAL">NO SE VISUALIZA LA TOTALIDAD DE DATOS EN EL REPORTE DE LICENCIA PROVISIONAL</option>
  <option value="0OTROS">OTROS (ESPECIFICAR EN OBSERVACIONES)</option>


  </select>
  </div>
  <input type="hidden" name="ultima" id="ultima" value="xx">
  <input type="hidden" name="final" id="final" value="x">

  
  <?php break;
  case "[": ?>
  
  <div class="col-sm-offset-0 col-sm-6">
  <select  id="solucion" class="form-control" class="selectpicker" name="solucion" type="text" data-live-search="true">
  <option value="0">SELECCIONE</option>
  <option value="0NO FINALIZA EL PROCESO DE REGISTRO DE UN TRÁMITE">NO FINALIZA EL PROCESO DE REGISTRO DE UN TRÁMITE</option>
  <option value="0NO PERMITE EJECUTAR LA FIRMA ELECTRÓNICA">NO PERMITE EJECUTAR LA FIRMA ELECTRÓNICA</option>
  <option value="0NO FIRMA CORRECTAMENTE UNA RESOLUCIÓN LA FIRMA ELECTRÓNICA">NO FIRMA CORRECTAMENTE UNA RESOLUCIÓN LA FIRMA ELECTRÓNICA</option>
  <option value="0NO SE TURNA UN TRÁMITE A UN ANALISTA">NO SE TURNA UN TRÁMITE A UN ANALISTA</option>
  <option value="0NO IMPRIME EL OFICIO DE RESOLUCIÓN DE TRÁMITE">NO IMPRIME EL OFICIO DE RESOLUCIÓN DE TRÁMITE</option>
  <option value="0NO PERMITE REALIZAR LOS CÁLCULOS DEL TRÁMITE SCT02-069">NO PERMITE REALIZAR LOS CÁLCULOS DEL TRÁMITE SCT02-069</option>
  <option value="0NO RESUELVE LA PETICIÓN DEL USUARIO">NO RESUELVE LA PETICIÓN DEL USUARIO</option>
  <option value="0NO SE LOCALIZA INFORMACIÓN REFERENTE A LOS PLANES Y PROGRAMAS">NO SE LOCALIZA INFORMACIÓN REFERENTE A LOS PLANES Y PROGRAMAS</option>
  <option value="0NO SE PUEDE FINALIZAR UN TRÁMITE DE PLANES Y PROGRAMAS">NO SE PUEDE FINALIZAR UN TRÁMITE DE PLANES Y PROGRAMAS</option>
  <option value="0NO SE LOCALIZA INFORMACIÓN REFERENTE A LOS CENTROS DE CAPACITACIÓN">NO SE LOCALIZA INFORMACIÓN REFERENTE A LOS CENTROS DE CAPACITACIÓN</option>
  <option value="0NO SE PUEDE FINALIZAR UN TRÁMITE DE CENTROS DE CAPACITACIÓN">NO SE PUEDE FINALIZAR UN TRÁMITE DE CENTROS DE CAPACITACIÓN</option>
  <option value="0NO SE LOCALIZA INFORMACIÓN REFERENTE A LOS INICIOS DE CURSOS">NO SE LOCALIZA INFORMACIÓN REFERENTE A LOS INICIOS DE CURSOS</option>
  <option value="0NO SE PUEDE FINALIZAR UN TRÁMITE DE INICIOS DE CURSOS">NO SE PUEDE FINALIZAR UN TRÁMITE DE INICIOS DE CURSOS</option>
  <option value="0PROBLEMAS EN LAS COMUNICACIONES">PROBLEMAS EN LAS COMUNICACIONES</option>
  <option value="0OTROS">OTROS (ESPECIFICAR EN OBSERVACIONES)</option>


  </select>
  </div>

  <input type="hidden" name="ultima" id="ultima" value="xx">
  <input type="hidden" name="final" id="final" value="x">

  <?php break;
  case "]": ?>
  
  <div class="col-sm-offset-0 col-sm-6">
  <select  id="solucion" class="form-control" class="selectpicker" name="solucion" type="text" data-live-search="true">
  <option value="0">SELECCIONE</option>
  <option value="0NO SE GUARDARON LOS DATOS REGISTRADOS DE UN TRÁMITE">NO SE GUARDARON LOS DATOS REGISTRADOS DE UN TRÁMITE</option>
  <option value="0NO SE LOCALIZAN DATOS DE TRÁMITES REGISTRADOS ANTERIORMENTE">NO SE LOCALIZAN DATOS DE TRÁMITES REGISTRADOS ANTERIORMENTE</option>
  <option value="0OTROS">OTROS (ESPECIFICAR EN OBSERVACIONES)</option>


  </select>
  </div>
  <input type="hidden" name="ultima" id="ultima" value="xx">
  <input type="hidden" name="final" id="final" value="x">

  <?php break;
  case "{": ?>
  
  <div class="col-sm-offset-0 col-sm-6">
  <select  id="solucion" class="form-control" class="selectpicker" name="solucion" type="text" data-live-search="true">
  <option value="0">SELECCIONE</option>
  <option value="0NO RECONOCE USUARIO/CONTRASEÑA">NO RECONOCE USUARIO/CONTRASEÑA</option>
  <option value="0NO PERMITE GENERAR UNA NUEVA CONTRASEÑA">NO PERMITE GENERAR UNA NUEVA CONTRASEÑA</option>
  <option value="0OTROS">OTROS (ESPECIFICAR EN OBSERVACIONES)</option>


  </select>
  </div>
  <input type="hidden" name="ultima" id="ultima" value="xx">
  <input type="hidden" name="final" id="final" value="x">


  <?php break;
  case ",": ?>
  
  <div class="col-sm-offset-0 col-sm-6">
  <select  id="solucion" class="form-control" class="selectpicker" name="solucion" type="text" data-live-search="true">
  <option value="0">SELECCIONE</option>
  <option value="0NO FINALIZA EL PROCESO DE REGISTRO DE UN TRÁMITE">NO FINALIZA EL PROCESO DE REGISTRO DE UN TRÁMITE</option>
  <option value="0NO IMPRIME EL CERTIFICADO DE MATRÍCULA">NO IMPRIME EL CERTIFICADO DE MATRÍCULA </option>
  <option value="0NO RESPONDE A LA SOLICITUD DEL USUARIO">NO RESPONDE A LA SOLICITUD DEL USUARIO </option>
  <option value="0PROBLEMAS EN LAS COMUNICACIONES">PROBLEMAS EN LAS COMUNICACIONES</option>
  <option value="0OTROS">OTROS (ESPECIFICAR EN OBSERVACIONES)</option>


  </select>
  </div>
  <input type="hidden" name="ultima" id="ultima" value="xx">
  <input type="hidden" name="final" id="final" value="x">


  <?php break;
  case ":": ?>
  
  <div class="col-sm-offset-0 col-sm-6">
  <select  id="solucion" class="form-control" class="selectpicker" name="solucion" type="text" data-live-search="true">
  <option value="0">SELECCIONE</option>
  <option value="0NO SE GUARDARON LOS DATOS REGISTRADOS DE UN TRÁMITE">NO SE GUARDARON LOS DATOS REGISTRADOS DE UN TRÁMITE</option>
  <option value="0NO SE LOCALIZAN DATOS DE TRÁMITES REGISTRADOS ANTERIORMENTE">NO SE LOCALIZAN DATOS DE TRÁMITES REGISTRADOS ANTERIORMENTE </option>
  <option value="0OTROS">OTROS (ESPECIFICAR EN OBSERVACIONES)</option>


  </select>
  </div>
  <input type="hidden" name="ultima" id="ultima" value="xx">
  <input type="hidden" name="final" id="final" value="x">


  <?php break;
  case ";": ?>
  
  <div class="col-sm-offset-0 col-sm-6">
  <select  id="solucion" class="form-control" class="selectpicker" name="solucion" type="text" data-live-search="true">
  <option value="0">SELECCIONE</option>
  <option value="0NO RECONOCE USUARIO/CONTRASEÑA">NO RECONOCE USUARIO/CONTRASEÑA</option>
  <option value="0NO PERMITE GENERAR UNA NUEVA CONTRASEÑA">NO PERMITE GENERAR UNA NUEVA CONTRASEÑA</option>
  <option value="0TARANTELLA NO PERMITE INTERACTUAR CON EL SISTEMA">TARANTELLA NO PERMITE INTERACTUAR CON EL SISTEMA</option>
  <option value="0OTROS">OTROS (ESPECIFICAR EN OBSERVACIONES)</option>


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
  