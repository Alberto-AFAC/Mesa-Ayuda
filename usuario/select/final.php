<?php session_start();
  
  $id=0;

				if(isset($_SESSION['consulta']) && !empty($_SESSION['consulta'])){

					if($_SESSION['consulta'] > 0){
						 $idp=$_SESSION['consulta'];
             $id = $idp[0];
             $desc = substr($idp, 1);
					}

//echo $id;
switch ($id) {
  case "a":?>

  <div class="col-sm-offset-0 col-sm-4">
  <select  id="final" class="form-control" class="selectpicker" name="final" type="text" data-live-search="true">
  <option value="0">SELECCIONE</option>
  <option value="SIN ACCESO WEB EN USUARIO">SIN ACCESO WEB EN USUARIO</option>
  <option value="SIN ACCESO WEB EN EL ÁREA">SIN ACCESO WEB EN EL ÁREA</option>
  <option value="SIN ACCESO A PÁGINA ESPECÍFICA">SIN ACCESO A PÁGINA ESPECÍFICA</option>
  <option value="NAVEGACIÓN WEB LENTA">NAVEGACIÓN WEB LENTA</option>
  <option value="IP DUPLICADA">IP DUPLICADA</option>
  </select>
  </div>

<?php break;
  case "b":?>

 <div class="col-sm-offset-0 col-sm-4">
  <select  id="final" class="form-control" class="selectpicker" name="final" type="text" data-live-search="true">
  <option value="0">SELECCIONE</option>
  <option value="ACCESO A LA RED">ACCESO A LA RED</option>
  <option value="PÁGINA WEB BLOQUEADA">PÁGINA WEB BLOQUEADA</option>
  <option value="CATEGORÍA DE PÁGINAS WEB BLOQUEADA">CATEGORÍA DE PÁGINAS WEB BLOQUEADA</option>
  </select>
  </div>
 
 
<?php break;
  case "c": ?>

  <div class="col-sm-offset-0 col-sm-4">
  <select  id="final" class="form-control" class="selectpicker" name="final" type="text" data-live-search="true">
  <option value="0">SELECCIONE</option>
  <option value="SIN ACCESO WEB EN USUARIO">SIN ACCESO WEB EN USUARIO</option>
  <option value="SIN ACCESO WEB EN EL ÁREA">SIN ACCESO WEB EN EL ÁREA</option>
  <option value="SIN ACCESO A PÁGINA ESPECÍFICA">SIN ACCESO A PÁGINA ESPECÍFICA</option>
  <option value="NAVEGACIÓN WEB LENTA">NAVEGACIÓN WEB LENTA</option>
  </select>
  </div>

<?php break;
 case "d": ?>

 <div class="col-sm-offset-0 col-sm-4">
  <select  id="final" class="form-control" class="selectpicker" name="final" type="text" data-live-search="true">
  <option value="0">SELECCIONE</option>
  <option value="ACCESO A LA RED">ACCESO A LA RED</option>
  <option value="PÁGINA WEB BLOQUEADA">PÁGINA WEB BLOQUEADA</option>
  <option value="CATEGORÍA DE PÁGINAS WEB BLOQUEADA">CATEGORÍA DE PÁGINAS WEB BLOQUEADA</option>
  </select>
  </div>
 
<?php break;
  case "e": ?>

  <div class="col-sm-offset-0 col-sm-4">
  <select  id="final" class="form-control" class="selectpicker" name="final" type="text" data-live-search="true">
  <option value="0">SELECCIONE</option>
  <option value="SIN ACCESO WEB EN USUARIO">SIN ACCESO WEB EN USUARIO</option>
  <option value="SIN ACCESO WEB EN EL ÁREA">SIN ACCESO WEB EN EL ÁREA</option>
  <option value="SIN ACCESO A PÁGINA ESPECÍFICA">SIN ACCESO A PÁGINA ESPECÍFICA</option>
  <option value="NAVEGACIÓN WEB LENTA">NAVEGACIÓN WEB LENTA</option>
  </select>
  </div>

<?php break;
  case "f": ?>

  <div class="col-sm-offset-0 col-sm-4">
  <select  id="final" class="form-control" class="selectpicker" name="final" type="text" data-live-search="true">
  <option value="0">SELECCIONE</option>

  <option value="ACCESO A LA RED">ACCESO A LA RED</option>
  <option value="PÁGINA WEB BLOQUEADA">PÁGINA WEB BLOQUEADA</option>
  <option value="CATEGORÍA DE PÁGINAS WEB BLOQUEADA">CATEGORÍA DE PÁGINAS WEB BLOQUEADA</option>
  </select>
  </div>

<?php break;
  case "g": ?>

  <div class="col-sm-offset-0 col-sm-4">
  <select  id="final" class="form-control" class="selectpicker" name="final" type="text" data-live-search="true">
  <option value="0">SELECCIONE</option>
  <option value="SIN ACCESO WEB EN USUARIO">SIN ACCESO WEB EN USUARIO</option>
  <option value="SIN ACCESO WEB EN EL ÁREA">SIN ACCESO WEB EN EL ÁREA</option>
  <option value="SIN ACCESO A PÁGINA ESPECÍFICA">SIN ACCESO A PÁGINA ESPECÍFICA</option>
  <option value="NAVEGACIÓN WEB LENTA">NAVEGACIÓN WEB LENTA</option>
  </select>
  </div>

<?php break;
  case "h": ?>

  <div class="col-sm-offset-0 col-sm-4">
  <select  id="final" class="form-control" class="selectpicker" name="final" type="text" data-live-search="true">
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
<!-- <div class="col-sm-offset-0 col-sm-4"><select  id="final" class="form-control" class="selectpicker" name="final" type="text" data-live-search="true" disabled=""><option value="0">SELECCIONE OPCIÓN</option></select></div> -->
<input type="hidden" id="final" name="final" value="0">
<?php } ?>


  