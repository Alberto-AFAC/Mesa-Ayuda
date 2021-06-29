<?php  
session_start(); 
	//evaluaremos si la variable de session existe de lo contrario no se ara nada 
	//si la variable session exite, se evaluara que tiepo de usuario esta ingresando de esa manera saber a donde se deve redireccionar en caso de que ya se haya logeado 
	if(isset($_SESSION['usuario'])){
		//si eta logeado con admnistrador lo redireccionara a su direcctorio que le corresponde 
		if($_SESSION['usuario']['privilegios'] == "admin")
		{	header('Location: administrador');
		//si eta logeado con usuario lo redireccionara a su direcctorio que le corresponde 
		}else if($_SESSION['usuario']['privilegios'] == "tecnico")
		{	header('Location: tecnico');
		//si eta logeado con manejador lo redireccionara a su direcctorio que le corresponde 
		}
	}

?>
<!DOCTYPE html>
<html lang="es">
<title></title>
	<script type="text/javascript" src="jsr/jquery-3.2.1.min.js"></script>
	<script type="text/javascript" src="jsr/validacion.js"></script>
<head>
	<meta charset="utf-8">
	<title>REPORTES</title>
    
	<link rel="stylesheet" type="text/css" href="css/styles.css">
	<link rel="stylesheet" type="text/css" href="css/icono/iconos/style.css">
</head>
	<body>
	<div class="formulario" style="background: url(img/img.jpg);">
			
			<h1></h1>
			<!--<div class="alert alert-success text-center" style="display:none;" id="exito">
			<p>Usuario registrado</p>
			</div>-->
				<form action="" id="form">				
				<!--<span class="icon-user2"></span>-->

				<label>Ingrese Número de Empleado</label><br>
				<input type="text" name="usua" pattern="[0-9]{1,7}" required/><!--que hacepte cualquier letra de la A-Z,a-z,0-9,_- pero no haceptara comillas simples o dobles etc.-->
				<br>
				<!--<span class="icon-locked"></span>-->
				<!--<label>Contraseña</label><br>
				<input type="password" name="pass"  pattern="[A-Z,a-z,0-9,_-ñÑ]{1,15}" required />-->

				<input type="submit" class="botton" value="Iniciar Sesion" />							
				</form>
					<div class="error">
				<strong>Número de Empleado incorrecto, intente de nuevo por favor</strong>
			</div>


<div id="spanu"><a href="indexx.php"><span class="icon-user2"></span></a></div>
			</div>

</body>
<!--<div class="icon-user22">-->
</html>





