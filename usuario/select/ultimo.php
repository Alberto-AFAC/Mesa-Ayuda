<?php session_start();

  $id=0;

				if(isset($_SESSION['consulta']) && !empty($_SESSION['consulta'])){

				
						 $idp=$_SESSION['consulta'];
             $id = $idp[0];
             $desc = substr($idp, 1);
				
//echo $id;
switch ($id) {
  /*CPU*/
  case "a": ?>
  <div class="col-sm-offset-0 col-sm-4">
  <select name="ultima" id="ultima" class="form-control" class="selectpicker" type="text" data-live-search="true">
  <option value="0">SELECCIONE</option>
  <option value="0LEDS ENCENDIDOS">LEDS ENCENDIDOS</option>
  <option value="0VENTILADOR ACELERADO">VENTILADOR ACELERADO</option>
  <option value="0ALARMA ACTIVA">ALARMA ACTIVA</option>
  <option value="0EQUIPO DESCONECTADO">EQUIPO DESCONECTADO</option>

  </select>
  </div>
  <input type="hidden" name="final" id="final" value="x">
<?php break;
  case "b":?>

 <div class="col-sm-offset-0 col-sm-4">
  <select name="ultima" id="ultima" class="form-control" class="selectpicker" type="text" data-live-search="true">
  <option value="0">SELECCIONE</option>
  <option value="0PASMADO POR COMPLETO">PASMADO POR COMPLETO</option>
  <option value="0LENTO AL INICIAR">LENTO AL INICIAR</option>
  <option value="0LENTO AL EJECUTAR UNA APLICACIÓN ES ESPECÍFICO">LENTO AL EJECUTAR UNA APLICACIÓN ES ESPECÍFICO</option>
  </select>

  </div>
  <input type="hidden" name="final" id="final" value="x">

<?php break;
  case "c": ?>

  <div class="col-sm-offset-0 col-sm-4">
  <select name="ultima" id="ultima" class="form-control" class="selectpicker" type="text" data-live-search="true">
  <option value="0">SELECCIONE</option>
  <option value="0FORMATEO/INSTALACIÓN DE /ZIADO">FORMATEO/INSTALACIÓN DE /ZIADO</option>
  <option value="0PAQUETERÍA DE OFICINA">PAQUETERÍA DE OFICINA</option>
  <option value="0TIPO DE LETRA INSTITUCIONAL">TIPO DE LETRA INSTITUCIONAL</option>
  <option value="0OTRO SOFTWARE">OTRO SOFTWARE</option>

  </select>
  </div>
  <input type="hidden" name="final" id="final" value="x">
<?php break;
 case "d": ?>

 <div class="col-sm-offset-0 col-sm-4">
  <select name="ultima" id="ultima" class="form-control" class="selectpicker" type="text" data-live-search="true">
  <option value="0">SELECCIONE</option>
  <option value="0CONFIGURACIÓN/PERSONALIZACIÓN">CONFIGURACIÓN/PERSONALIZACIÓN</option>
  <option value="0RESPALDO DE INFORMACIÓN">RESPALDO DE INFORMACIÓN</option>
  <option value="0ASESORÍA GENERAL">ASESORÍA GENERAL</option>
  <option value="0REUBICACIÓN DE EQUIPO">REUBICACIÓN DE EQUIPO</option>
  <option value="0CONFIGURACIÓN DE CARPETA COMPARTIDA">CONFIGURACIÓN DE CARPETA COMPARTIDA</option>
  </select>
  </div>
  <input type="hidden" name="final" id="final" value="x">
<?php break;
  case "e": /*MONITOR*/?>

  <div class="col-sm-offset-0 col-sm-4">
  <select name="ultima" id="ultima" class="form-control" class="selectpicker" type="text" data-live-search="true">
  <option value="0">SELECCIONE</option>
  <option value="0PANTALLA NEGRA">PANTALLA NEGRA</option>
  <option value="0PANTALLA AZUL">PANTALLA AZUL</option>
  <option value="0PANTALLA DAÑADA">PANTALLA DAÑADA</option>
  <option value="0BOTÓN DAÑADO">BOTÓN DAÑADO</option>
  <option value="0DESCONECTADO">DESCONECTADO</option>
  </select>
  </div>
  <input type="hidden" name="final" id="final" value="x">
<?php break;
  case "f": ?>

  <div class="col-sm-offset-0 col-sm-4">
  <select name="ultima" id="ultima" class="form-control" class="selectpicker" type="text" data-live-search="true">
  <option value="0">SELECCIONE</option>
  <option value="0PANTALLA MUY CLARA">PANTALLA MUY CLARA</option>
  <option value="0PANTALLA MUY OSCURA">PANTALLA MUY OSCURA</option>
  <option value="0IMAGEN DIFUMINADA">IMAGEN DIFUMINADA</option>
  <option value="0CAMBIO DE COLOR">CAMBIO DE COLOR</option>
  </select>
  </div>

  <input type="hidden" name="final" id="final" value="x">
<?php break;
  case "g": ?>

  <div class="col-sm-offset-0 col-sm-4">
  <select name="ultima" id="ultima" class="form-control" class="selectpicker" type="text" data-live-search="true">
  <option value="0">SELECCIONE</option>
  <option value="0ICONOS PARPADEAN">ICONOS PARPADEAN</option>
  <option value="0LÍNEAS CON MOVIMIENTO (VERTICALES-HORIZONTALES)">LÍNEAS CON MOVIMIENTO (VERTICALES-HORIZONTALES)</option>
  <option value="0IMAGEN ROTADA (90°-180°-270°-360°)">IMAGEN ROTADA (90°-180°-270°-360°)</option>
  </select>
  </div>
  <input type="hidden" name="final" id="final" value="x">
<?php break;
  case "h": ?>

  <div class="col-sm-offset-0 col-sm-4">
  <select name="ultima" id="ultima" class="form-control" class="selectpicker" type="text" data-live-search="true">
  <option value="0">SELECCIONE</option>
  <option value="0NO FUNCIONAN LAS TECLAS NUMÉRICAS">NO FUNCIONAN LAS TECLAS NUMÉRICAS</option>
  <option value="0NO FUNCIONA NINGUNA TECLA">NO FUNCIONA NINGUNA TECLA</option>
  <option value="0TECLAS INTERCAMBIADAS AL ESCRIBIR">TECLAS INTERCAMBIADAS AL ESCRIBIR</option>
  <option value="0NO FUNCIONAN SÍMBOLOS">NO FUNCIONAN SÍMBOLOS</option>
  <option value="0DERRAME DE LÍQUIDO">DERRAME DE LÍQUIDO</option>
  </select>
  </div>
  <input type="hidden" name="final" id="final" value="x">
<?php break;
  case "i": ?>

  <div class="col-sm-offset-0 col-sm-4">
  <select name="ultima" id="ultima" class="form-control" class="selectpicker" type="text" data-live-search="true">
  <option value="0">SELECCIONE</option>
  <option value="0NO ENCIENDE LUZ DE LA BASE">NO ENCIENDE LUZ DE LA BASE</option>
  <option value="0CURSOR SIN MOVIMIENTO">CURSOR SIN MOVIMIENTO</option>
  <option value="0NO SE REFLEJA ADECUADAMENTE EL DESPLAZAMIENTO">NO SE REFLEJA ADECUADAMENTE EL DESPLAZAMIENTO</option>
  <option value="0RUEDA/BOTÓN DE DESPLAZAMIENTO">RUEDA/BOTÓN DE DESPLAZAMIENTO</option>
  <option value="0DOBLE CLIC LOS BOTONES NO RESPONDEN (IZQUIERDO/DERECHO">DOBLE CLIC LOS BOTONES NO RESPONDEN (IZQUIERDO/DERECHO)</option>
  </select>
  </div>
  <input type="hidden" name="final" id="final" value="x">

<?php break;
  case "j": /*DISPOSITIVOS EXTRA (PERIFÉRICOS)*/?>

  <div class="col-sm-offset-0 col-sm-4">
  <select name="ultima" id="ultima" class="form-control" class="selectpicker" type="text" data-live-search="true">
  <option value="0">SELECCIONE</option>
  <option value="aFALLA">FALLA</option>
  </select>
  </div>  
<?php break;
  case "k": ?>

  <div class="col-sm-offset-0 col-sm-4">
  <select name="ultima" id="ultima" class="form-control" class="selectpicker" type="text" data-live-search="true">
  <option value="0">SELECCIONE</option>
  <option value="bFALLA">FALLA</option>
  </option>
  </select>
  </div>  
<?php break;
  case "l": ?>

  <div class="col-sm-offset-0 col-sm-4">
  <select name="ultima" id="ultima" class="form-control" class="selectpicker" type="text" data-live-search="true">
  <option value="0">SELECCIONE</option>
  <option value="cFALLA">FALLA</option>
  </select>
  </div>  

<?php break;
  case "m": ?>

  <div class="col-sm-offset-0 col-sm-4">
  <select name="ultima" id="ultima" class="form-control" class="selectpicker" type="text" data-live-search="true">
  <option value="0">SELECCIONE</option>
  <option value="0LEDS ENCENDIDOS">LEDS ENCENDIDOS</option>
  <option value="0VENTILADOR ACELERADO">VENTILADOR ACELERADO</option>
  <option value="0ALARMA ACTIVA">ALARMA ACTIVA</option>
  </select>
  </div>  

  <input type="hidden" name="final" id="final" value="x">
<?php break;
  case "n": ?>

  <div class="col-sm-offset-0 col-sm-4">
  <select name="ultima" id="ultima" class="form-control" class="selectpicker" type="text" data-live-search="true">
  <option value="0">SELECCIONE</option>
  <option value="0PASMADO POR COMPLETO">PASMADO POR COMPLETO</option>
  <option value="0LENTO AL INICIAR">LENTO AL INICIAR</option>
  <option value="0LENTO AL EJECUTAR UNA APLICACIÓN ES ESPECÍFICO">LENTO AL EJECUTAR UNA APLICACIÓN ES ESPECÍFICO</option>
  </select>
  </div>  
  <input type="hidden" name="final" id="final" value="x">
<?php break;
  case "o": ?>

  <div class="col-sm-offset-0 col-sm-4">
  <select name="ultima" id="ultima" class="form-control" class="selectpicker" type="text" data-live-search="true">
  <option value="0">SELECCIONE</option>
  <option value="0FORMATEO/INSTALACIÓN DE SISTEMA OPERATIVO ACTUALZIADO">FORMATEO/INSTALACIÓN DE SISTEMA OPERATIVO ACTUALZIADO</option>
  <option value="0PAQUETERÍA DE OFICINA">PAQUETERÍA DE OFICINA</option>
  <option value="0TIPO DE LETRA INSTITUCIONAL">TIPO DE LETRA INSTITUCIONAL</option>
  <option value="0OTRO SOFTWARE">OTRO SOFTWARE</option>  
  </select>
  </div> 
  <input type="hidden" name="final" id="final" value="x">

<?php break;
  case "p": ?>

  <div class="col-sm-offset-0 col-sm-4">
  <select name="ultima" id="ultima" class="form-control" class="selectpicker" type="text" data-live-search="true">
  <option value="0">SELECCIONE</option>
  <option value="0CONFIGURACIÓN/PERSONALIZACIÓN">CONFIGURACIÓN/PERSONALIZACIÓN</option>
  <option value="0RESPALDO DE INFORMACIÓN">RESPALDO DE INFORMACIÓN</option>
  <option value="0ASESORÍA GENERAL">ASESORÍA GENERAL</option>
  <option value="0CONFIGURACIÓN DE CARPETA COMPARTIDA">CONFIGURACIÓN DE CARPETA COMPARTIDA</option>
  </select>
  </div> 
  <input type="hidden" name="final" id="final" value="x">

<?php break;
  case "q": /*PANTALLA*/?>

  <div class="col-sm-offset-0 col-sm-4">
  <select name="ultima" id="ultima" class="form-control" class="selectpicker" type="text" data-live-search="true">
  <option value="0">SELECCIONE</option>
  <option value="0PANTALLA NEGRA">PANTALLA NEGRA</option>
  <option value="0PANTALLA AZUL">PANTALLA AZUL</option>
  <option value="0PANTALLA DAÑADA">PANTALLA DAÑADA</option>
  </select>
  </div> 
  <input type="hidden" name="final" id="final" value="x">

<?php break;
  case "r": ?>

  <div class="col-sm-offset-0 col-sm-4">
  <select name="ultima" id="ultima" class="form-control" class="selectpicker" type="text" data-live-search="true">
  <option value="0">SELECCIONE</option>
  <option value="0PANTALLA MUY CLARA">PANTALLA MUY CLARA</option>
  <option value="0PANTALLA MUY OSCURA">PANTALLA MUY OSCURA</option>
  <option value="0IMAGEN DIFUMINADA">IMAGEN DIFUMINADA</option>
  </select>
  </div> 
  <input type="hidden" name="final" id="final" value="x">

<?php break;
  case "s": ?>

  <div class="col-sm-offset-0 col-sm-4">
  <select name="ultima" id="ultima" class="form-control" class="selectpicker" type="text" data-live-search="true">
  <option value="0">SELECCIONE</option>
  <option value="0ICONOS PARPADEAN">ICONOS PARPADEAN</option>
  <option value="0LÍNEAS CON MOVIMIENTO (VERTICALES-HORIZONTALES)">LÍNEAS CON MOVIMIENTO (VERTICALES-HORIZONTALES)</option>
  <option value="0IMAGEN ROTADA (90°-180°-270°-360°)">IMAGEN ROTADA (90°-180°-270°-360°)</option>
  </select>
  </div>
  <input type="hidden" name="final" id="final" value="x">
<?php break;
  case "t": ?>

  <div class="col-sm-offset-0 col-sm-4">
  <select name="ultima" id="ultima" class="form-control" class="selectpicker" type="text" data-live-search="true">
  <option value="0">SELECCIONE</option>
  <option value="0NO FUNCIONAN LAS TECLAS NUMÉRICAS">NO FUNCIONAN LAS TECLAS NUMÉRICAS</option>
  <option value="0NO FUNCIONA NINGUNA TECLA">NO FUNCIONA NINGUNA TECLA</option>
  <option value="0TECLAS INTERCAMBIADAS AL ESCRIBIR">TECLAS INTERCAMBIADAS AL ESCRIBIR</option>
  <option value="0NO FUNCIONAN SÍMBOLOS">NO FUNCIONAN SÍMBOLOS</option>
  <option value="0DERRAME DE LÍQUIDO">DERRAME DE LÍQUIDO</option>
  </select>
  </div>
  <input type="hidden" name="final" id="final" value="x">
<?php break;
  case "u": ?>

  <div class="col-sm-offset-0 col-sm-4">
  <select name="ultima" id="ultima" class="form-control" class="selectpicker" type="text" data-live-search="true">
  <option value="0">SELECCIONE</option>
  <option value="0CURSOR SIN MOVIMIENTO">CURSOR SIN MOVIMIENTO</option>
  <option value="0NO SE REFLEJA ADECUADAMENTE EL DESPLAZAMIENTO">NO SE REFLEJA ADECUADAMENTE EL DESPLAZAMIENTO</option>
  <option value="0DOBLE CLIC">DOBLE CLIC</option>
  <option value="0LOS BOTONES NO RESPONDEN (IZQUIERDO/DERECHO)">LOS BOTONES NO RESPONDEN (IZQUIERDO/DERECHO)</option>
  </select>
  </div>
  <input type="hidden" name="final" id="final" value="x">
<?php break;
  case "v": ?>

  <div class="col-sm-offset-0 col-sm-4">
  <select name="ultima" id="ultima" class="form-control" class="selectpicker" type="text" data-live-search="true">
  <option value="0">SELECCIONE</option>
  <option value="0SE CALIENTA">SE CALIENTA</option>
  <option value="0NO CARGA EN ABSOLUTO">NO CARGA EN ABSOLUTO</option>
  <option value="0NO DURA LA CARGA">NO DURA LA CARGA</option>
  <option value="0INFLADA">INFLADA</option>
  </select>
  </div>
  <input type="hidden" name="final" id="final" value="x">
<?php break;
  case "w": ?>
  <div class="col-sm-offset-0 col-sm-4">
  <select name="ultima" id="ultima" class="form-control" class="selectpicker" type="text" data-live-search="true">
  <option value="0">SELECCIONE</option>    
  <option value="0LEDS ENCENDIDOS">LEDS ENCENDIDOS</option>
  </select>
  </div>
  <input type="hidden" name="final" id="final" value="x">

<?php break;
  case "x": ?>
  <div class="col-sm-offset-0 col-sm-4">
  <select name="ultima" id="ultima" class="form-control" class="selectpicker" type="text" data-live-search="true">
  <option value="0">SELECCIONE</option>
  <option value="0PASMADO POR COMPLETO">PASMADO POR COMPLETO</option>
  <option value="0LENTO AL INICIAR">LENTO AL INICIAR</option>
  <option value="0LENTO AL EJECUTAR UNA APLICACIÓN ES ESPECÍFICO">LENTO AL EJECUTAR UNA APLICACIÓN ES ESPECÍFICO</option>
  </select>
  </div>
  <input type="hidden" name="final" id="final" value="x">

<?php break;
  case "y": ?>

  <div class="col-sm-offset-0 col-sm-4">
  <select name="ultima" id="ultima" class="form-control" class="selectpicker" type="text" data-live-search="true">
  <option value="0">SELECCIONE</option>
  <option value="0FORMATEO/INSTALACIÓN DE SISTEMA OPERATIVO ACTUALIZADO">FORMATEO/INSTALACIÓN DE SISTEMA OPERATIVO ACTUALIZADO</option>
  <option value="0PAQUETERÍA DE OFICINA">PAQUETERÍA DE OFICINA</option>
  <option value="0TIPO DE LETRA INSTITUCIONAL">TIPO DE LETRA INSTITUCIONAL</option>
  <option value="0OTRO SOFTWARE">OTRO SOFTWARE</option>
  <input type="hidden" name="final" id="final" value="x">
  </select>
  </div>
<?php break;
  case "z": ?>

  <div class="col-sm-offset-0 col-sm-4">
  <select name="ultima" id="ultima" class="form-control" class="selectpicker" type="text" data-live-search="true">
  <option value="0">SELECCIONE</option>
  <option value="0CONFIGURACIÓN/PERSONALIZACIÓN">CONFIGURACIÓN/PERSONALIZACIÓN</option>
  <option value="0RESPALDO DE INFORMACIÓN">RESPALDO DE INFORMACIÓN</option>
  <option value="0ASESORÍA GENERAL">ASESORÍA GENERAL</option>
  <option value="0CONFIGURACIÓN DE CARPETA COMPARTIDA">CONFIGURACIÓN DE CARPETA COMPARTIDA</option>
  <input type="hidden" name="final" id="final" value="x">
  </select>
  </div>
<?php break;
  case "1": ?>

  <div class="col-sm-offset-0 col-sm-4">
  <select name="ultima" id="ultima" class="form-control" class="selectpicker" type="text" data-live-search="true">
  <option value="0">SELECCIONE</option>
  <option value="0PANTALLA NEGRA">PANTALLA NEGRA</option>
  <option value="0PANTALLA AZUL">PANTALLA AZUL</option>
  <option value="0PANTALLA DAÑADA">PANTALLA DAÑADA</option>
  <input type="hidden" name="final" id="final" value="x">
  </select>
  </div>
<?php break;
  case "2": ?>

  <div class="col-sm-offset-0 col-sm-4">
  <select name="ultima" id="ultima" class="form-control" class="selectpicker" type="text" data-live-search="true">
  <option value="0">SELECCIONE</option>
  <option value="0PANTALLA MUY CLARA">PANTALLA MUY CLARA</option>
  <option value="0PANTALLA MUY OSCURA">PANTALLA MUY OSCURA</option>
  <option value="0IMAGEN DIFUMINADA">IMAGEN DIFUMINADA</option>
  <input type="hidden" name="final" id="final" value="x">
  </select>
  </div>
  <?php break;
  case "3": ?>

  <div class="col-sm-offset-0 col-sm-4">
  <select name="ultima" id="ultima" class="form-control" class="selectpicker" type="text" data-live-search="true">
  <option value="0">SELECCIONE</option>
  <option value="0ICONOS PARPADEAN">ICONOS “PARPADEAN”</option>
  <option value="0LÍNEAS CON MOVIMIENTO (VERTICALES-HORIZONTALES)">LÍNEAS CON MOVIMIENTO (VERTICALES-HORIZONTALES)</option>
  <input type="hidden" name="final" id="final" value="x">
  </select>
  </div>
  <?php break;
  case "4": ?>

  <div class="col-sm-offset-0 col-sm-4">
  <select name="ultima" id="ultima" class="form-control" class="selectpicker" type="text" data-live-search="true">
  <option value="0">SELECCIONE</option>
  <option value="0NO FUNCIONAN LAS TECLAS NUMÉRICAS">NO FUNCIONAN LAS TECLAS NUMÉRICAS</option>
  <option value="0NO FUNCIONA NINGUNA TECLA">NO FUNCIONA NINGUNA TECLA</option>
  <option value="0TECLAS INTERCAMBIADAS AL ESCRIBIR">TECLAS INTERCAMBIADAS AL ESCRIBIR</option>
  <option value="0NO FUNCIONAN SÍMBOLOS">NO FUNCIONAN SÍMBOLOS</option>
  <option value="0DERRAME DE LÍQUIDO">DERRAME DE LÍQUIDO</option>
  <input type="hidden" name="final" id="final" value="x">
  </select>
  </div>
    <?php break;
  case "5": ?>

  <div class="col-sm-offset-0 col-sm-4">
  <select name="ultima" id="ultima" class="form-control" class="selectpicker" type="text" data-live-search="true">
  <option value="0">SELECCIONE</option>
  <option value="0CURSOR SIN MOVIMIENTO">CURSOR SIN MOVIMIENTO</option>
  <option value="0NO SE REFLEJA ADECUADAMENTE EL DESPLAZAMIENTO">NO SE REFLEJA ADECUADAMENTE EL DESPLAZAMIENTO</option>
  <option value="0DOBLE CLIC">DOBLE CLIC</option>
  <option value="0LOS BOTONES NO RESPONDEN (IZQUIERDO/DERECHO)">LOS BOTONES NO RESPONDEN (IZQUIERDO/DERECHO)</option>
  <input type="hidden" name="final" id="final" value="x">
  </select>
  </div>
    <?php break;
  case "6": ?>

  <div class="col-sm-offset-0 col-sm-4">
  <select name="ultima" id="ultima" class="form-control" class="selectpicker" type="text" data-live-search="true">
  <option value="0">SELECCIONE</option>
  <option value="0SE CALIENTA">SE CALIENTA</option>
  <option value="0NO CARGA EN ABSOLUTO">NO CARGA EN ABSOLUTO</option>
  <option value="0NO DURA LA CARGA">NO DURA LA CARGA</option>
  <option value="0INFLADA">INFLADA</option>
  <input type="hidden" name="final" id="final" value="x">
  </select>
  </div>
    <?php break;
  case "7": ?>
  <div class="col-sm-offset-0 col-sm-4">
  <select name="ultima" id="ultima" class="form-control" class="selectpicker" type="text" data-live-search="true">
  <option value="0">SELECCIONE</option>
  <option value="0NO IMPRIME">NO IMPRIME</option>
  <option value="0HOJA ATORADA">HOJA ATORADA</option>
  <option value="0MALA CALIDAD">MALA CALIDAD</option>
  <option value="0ARRUGADA LAS HOJAS">ARRUGADA LAS HOJAS</option>
  <option value="0RUIDOS AL IMPRIMIR">RUIDOS AL IMPRIMIR</option>
  <input type="hidden" name="final" id="final" value="x">
  </select>
  </div>
      <?php break;
  case "8": ?>
  <div class="col-sm-offset-0 col-sm-4">
  <select name="ultima" id="ultima" class="form-control" class="selectpicker" type="text" data-live-search="true">
  <option value="0">SELECCIONE</option>
  <option value="0FALTA CONSUMIBLE">FALTA CONSUMIBLE</option>
  <option value="0INSTALACIÓN/CONFIGURACIÓN">INSTALACIÓN/CONFIGURACIÓN</option>
  <option value="0ASESORÍA GENERAL">ASESORÍA GENERAL</option>
  <option value="0REUBICACIÓN DE EQUIPO">REUBICACIÓN DE EQUIPO</option>
  <input type="hidden" name="final" id="final" value="x">
  </select>
  </div>
      <?php break;
  case "9": ?>
  <div class="col-sm-offset-0 col-sm-4">
  <select name="ultima" id="ultima" class="form-control" class="selectpicker" type="text" data-live-search="true">
  <option value="0">SELECCIONE</option>
  <option value="0NO ESCANEA">NO ESCANEA</option>
  <option value="0HOJA ATORADA">HOJA ATORADA</option>
  <option value="0MALA CALIDAD">MALA CALIDAD</option>
  <option value="0ARRUGADA LAS HOJAS">ARRUGADA LAS HOJAS</option>
  <option value="0RUIDOS AL ESCANEAR">RUIDOS AL ESCANEAR</option>
  <option value="0LÍNEA EN ESCANEO">LÍNEA EN ESCANEO</option>
  <input type="hidden" name="final" id="final" value="x">
     </select>
  </div>
      <?php break;
  case "/": ?>
  <div class="col-sm-offset-0 col-sm-4">
  <select name="ultima" id="ultima" class="form-control" class="selectpicker" type="text" data-live-search="true">
  <option value="0">SELECCIONE</option>
  <option value="0INSTALACIÓN/CONFIGURACIÓN">INSTALACIÓN/CONFIGURACIÓN</option>
  <option value="0ASESORÍA GENERAL">ASESORÍA GENERAL</option>
  <option value="0REUBICACIÓN DE EQUIPO">REUBICACIÓN DE EQUIPO</option>
  <input type="hidden" name="final" id="final" value="x">
  </select>
  </div>

      <?php break;
  case "*": ?>

  <div class="col-sm-offset-0 col-sm-4">
  <select name="ultima" id="ultima" class="form-control" class="selectpicker" type="text" data-live-search="true">
  <option value="0">SELECCIONE</option>
  <option value="0SIN ACCESO WEB EN USUARIO">SIN ACCESO WEB EN USUARIO</option>
  <option value="0SIN ACCESO WEB EN EL ÁREA">SIN ACCESO WEB EN EL ÁREA</option>
  <option value="0SIN ACCESO A PÁGINA ESPECÍFICA">SIN ACCESO A PÁGINA ESPECÍFICA</option>
  <option value="0NAVEGACIÓN WEB LENTA">NAVEGACIÓN WEB LENTA</option>
  <option value="0IP DUPLICADA">IP DUPLICADA</option>
  <input type="hidden" name="final" id="final" value="x">
  </select>
  </div>
      <?php break;
  case "-": ?>

  <div class="col-sm-offset-0 col-sm-4">
  <select name="ultima" id="ultima" class="form-control" class="selectpicker" type="text" data-live-search="true">
  <option value="0">SELECCIONE</option>
  <option value="0ACCESO A LA RED">ACCESO A LA RED</option>
  <option value="0PÁGINA WEB BLOQUEADA">PÁGINA WEB BLOQUEADA</option>
  <option value="0CATEGORÍA DE PÁGINAS WEB BLOQUEADA">CATEGORÍA DE PÁGINAS WEB BLOQUEADA</option>
  <input type="hidden" name="final" id="final" value="x">
  </select>
  </div>
      <?php break;
  case "_": ?>
  <div class="col-sm-offset-0 col-sm-4">
  <select name="ultima" id="ultima" class="form-control" class="selectpicker" type="text" data-live-search="true">
  <option value="0">SELECCIONE</option>
  <option value="dFALLA">FALLA</option>
  <option value="eSOLICITUD">SOLICITUD</option>
    </select>
  </div>
  
  <?php break;
  case ".": ?>
  <div class="col-sm-offset-0 col-sm-4">
  <select name="ultima" id="ultima" class="form-control" class="selectpicker" type="text" data-live-search="true">
  <option value="0">SELECCIONE</option>
  <option value="fFALLA">FALLA</option>
  <option value="gSOLICITUD">SOLICITUD</option>
  </select>
  </div>

<?php break;
  case ",": ?>

  <div class="col-sm-offset-0 col-sm-4">
  <select name="ultima" id="ultima" class="form-control" class="selectpicker" type="text" data-live-search="true">
  <option value="0">SELECCIONE</option>
  <option value="0LOCALES">LOCALES</option>
  <option value="0CELULAR">CELULAR</option>
  <option value="0L. D. NACIONAL">L. D. NACIONAL</option>
  <option value="0L. D. MUNDIAL">L. D. MUNDIAL</option>
  </select>
  </div>
  <input type="hidden" name="final" id="final" value="x">

<?php break;
  case "=": ?>
  <input type="hidden" name="ultima" id="ultima" value="xx">
    <input type="hidden" name="final" id="final" value="x">
<?php 
  break;
  default: }

}else{ ?>
<!-- <div class="col-sm-offset-0 col-sm-4"><select name="ultima" id="ultima" class="form-control" class="selectpicker" type="text" data-live-search="true" disabled=""><option value="0">SELECCIONE OPCIÓN</option></select></div> -->
<input type="hidden" id="ultima" name="ultima" value="x">
<?php } ?>

<script type="text/javascript">



$(document).ready(function(){
 // $('#solucion').select2();
$('#ultima').change(function(){
  $.ajax({ type:"post", 
           data:'valor=' + $('#ultima').val(),
           url:'session/valor.php',
  success:function(r){
    $('#select5').load('select/final.php');
    console.log("Si esta entrando" + $('#ultima').val());
  }
        });
    });
});

  </script>