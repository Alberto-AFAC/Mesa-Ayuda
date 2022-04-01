<?php session_start();

  $id=0;

				if(isset($_SESSION['consulta']) && !empty($_SESSION['consulta'])){

				
						 $idp=$_SESSION['consulta'];
             $id = $idp[0];
             $desc = substr($idp, 1);
					

echo $id;
switch ($id) {
  case "j":?>

  <div class="col-sm-offset-0 col-sm-4">
  <select  id="sistemas" class="form-control" class="selectpicker" name="sistemas" type="text" data-live-search="true">
  <option value="0">SELECCIONE</option>
  <option value="NO CAPTURA LA VOZ">NO CAPTURA LA VOZ</option>
  <option value="NO ENCIENDE">NO ENCIENDE</option>
  <option value="NO LO RECONOCE EL EQUIPO">NO LO RECONOCE EL EQUIPO</option>
  </select>
  </div>

<?php break;
  case "b":?>

 <div class="col-sm-offset-0 col-sm-4">
  <select  id="sistemas" name="sistemas" class="form-control" class="selectpicker" type="text" data-live-search="true">
  <option value="0">SELECCIONE</option>
  <option value="NO CAPTURA EL VIDEO">NO CAPTURA EL VIDEO</option>
  <option value="NO ENCIENDE">NO ENCIENDE</option>
  <option value="NO LO RECONOCE EL EQUIPO">NO LO RECONOCE EL EQUIPO</option>
  </select>
  </div>

<?php break;
  case "c": ?>

  <div class="col-sm-offset-0 col-sm-4">
  <select  id="sistemas" class="form-control" class="selectpicker" name="sistemas" type="text" data-live-search="true">
  <option value="0">SELECCIONE</option>
  <option value="NO SE ESCUCHA EL AUDIO">NO SE ESCUCHA EL AUDIO</option>
  <option value="NO ENCIENDE">NO ENCIENDE</option>
  <option value="NO LO RECONOCE EL EQUIPO">NO LO RECONOCE EL EQUIPO</option>
  </select>
  </div>

<?php break;
 case "d": ?>

 <div class="col-sm-offset-0 col-sm-4">
  <select  id="sistemas" class="form-control" class="selectpicker" name="sistemas" type="text" data-live-search="true">
  <option value="0">SELECCIONE</option>
  <option value="SIN ACCESO WEB EN USUARIO">SIN ACCESO WEB EN USUARIO</option>
  <option value="SIN ACCESO WEB EN EL ÁREA">SIN ACCESO WEB EN EL ÁREA</option>
  <option value="SIN ACCESO A PÁGINA ESPECÍFICA">SIN ACCESO A PÁGINA ESPECÍFICA</option>
  <option value="NAVEGACIÓN WEB LENTA">NAVEGACIÓN WEB LENTA</option>
  <option value="IP DUPLICADA">IP DUPLICADA</option>
  </select>
  </div>

<?php break;
  case "e": ?>

  <div class="col-sm-offset-0 col-sm-4">
  <select  id="sistemas" class="form-control" class="selectpicker" name="sistemas" type="text" data-live-search="true">
  <option value="0">SELECCIONE</option>
  <option value="ACCESO A LA RED">ACCESO A LA RED</option>
  <option value="PÁGINA WEB BLOQUEADA">PÁGINA WEB BLOQUEADA</option>
  <option value="CATEGORÍA DE PÁGINAS WEB BLOQUEADA">CATEGORÍA DE PÁGINAS WEB BLOQUEADA</option>
  </select>
  </div>

<?php break;
  case "f": ?>

  <div class="col-sm-offset-0 col-sm-4">
  <select  id="sistemas" class="form-control" class="selectpicker" name="sistemas" type="text" data-live-search="true">
  <option value="0">SELECCIONE</option>
  <option value="SIN ACCESO WEB EN USUARIO">SIN ACCESO WEB EN USUARIO</option>
  <option value="SIN ACCESO WEB EN EL ÁREA">SIN ACCESO WEB EN EL ÁREA</option>
  <option value="SIN ACCESO A PÁGINA ESPECÍFICA">SIN ACCESO A PÁGINA ESPECÍFICA</option>
  <option value="NAVEGACIÓN WEB LENTA">NAVEGACIÓN WEB LENTA</option>
  </select>
  </div>

<?php break;
  case "g": ?>

  <div class="col-sm-offset-0 col-sm-4">
  <select  id="sistemas" class="form-control" class="selectpicker" name="sistemas" type="text" data-live-search="true">
  <option value="0">SELECCIONE</option>
  <option value="ACCESO A LA RED">ACCESO A LA RED</option>
  <option value="PÁGINA WEB BLOQUEADA">PÁGINA WEB BLOQUEADA</option>
  <option value="CATEGORÍA DE PÁGINAS WEB BLOQUEADA">CATEGORÍA DE PÁGINAS WEB BLOQUEADA</option> 
  </select>
  </div>

<?php 
  break;
  default: }

}else{ ?>
<!-- <div class="col-sm-offset-0 col-sm-4"><select  id="sistemas" class="form-control" class="selectpicker" name="sistemas" type="text" data-live-search="true" disabled=""><option value="0">SELECCIONE OPCIÓN</option></select></div> -->
<input type="hidden" id="sistemas" name="sistemas" value="x">
<?php } ?>