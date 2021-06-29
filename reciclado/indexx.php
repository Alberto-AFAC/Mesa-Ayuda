<?php include('session_start.php');?>
<!DOCTYPE html>
<html lang="es">
<title></title>
  <script type="text/javascript" src="val/jquery-3.2.1.min.js"></script>
<head>
  <meta charset="utf-8">
  <title>REPORTES</title>
    
  <!--<link rel="stylesheet" type="text/css" href="css/styles.css">-->
  <link rel="stylesheet" type="text/css" href="css/icono/iconos/style.css">
  <link rel="stylesheet" href="css/bootstrap/css/bootstrap.min.css" type="text/css" />
  <link rel="stylesheet" href="css/admn/signup-form.css" type="text/css" />
  <script type="text/javascript" src="val/valida.js"></script>
</head>
<body>
  <div class="container">
    <div class="signup-form-container" style="max-width: 690px;">
      <form action=""  id="form" autocomplete="off">                 
        
        <div class="form-header">
            <h3 class="form-title">
              <a href="index.php"><span class="glyphicon glyphicon-plane"></span></a>
              <b style="color:#0c231e;">Sistema de reporte informático</b> 
            </h3>
          
          <div class="pull-right" id="admin">
            <h3 class="form-title">
              <i class="fa fa-user"></i>
              <img src="img/AFAC_R.png">
            </h3>
          </div>
        </div>

      <div class="rowadmin">                  
        <div class="form-body">
              <div class="form-group">
              <label>Usuario</label>
              <div class="input-group col-md-12">
              <div class="input-group-addon"><span class="glyphicon glyphicon-user"></span></div>
              <!--<input style="background: transparent;" type="text" name="usua" class="form-control" pattern="[0-9]{1,7}" required/>--->
              <input style="background: transparent; width:" type="text" class="form-control" name="tecn" pattern="[A-Z,a-z,0-9,_-,ñ,Ñ]{1,15}" required/>
              </div>
              <span class="help-block" id="error"></span>
              </div>

              <div class="form-group">
              <label>Contraseña</label> 
              <div class="input-group col-md-12">                       
              <div class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></div>
              <input style="background: transparent;" type="password" name="pass" class="form-control" pattern="[A-Z,a-z,0-9,_-ñÑ]{1,15}" required />
              </div> 
              <span class="help-block" id="error"></span>                     
              </div>                                  
        </div>
              <span class="error">Usuario o contraseña incorrecto, intente de nuevo por favor</span>
              <span class="help-block" id="error"></span>


        <div class="form-footer">
        <input style="background: #a12243" type="submit" class="botton" value="Iniciar Sesion" />
        </div>
      </div>
      </form>
    </div>
  </div>

<script src="css/bootstrap/js/bootstrap.min.js"></script>
<script src="css/admn/jquery-1.11.2.min.js"></script>
<script src="css/admn/jquery.validate.min.js"></script>
<script src="css/admn/adminregis.js"></script>
</body>
<!--<div class="icon-user22">-->
</html>