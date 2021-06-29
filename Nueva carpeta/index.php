<?php  
session_start(); 
	//evaluaremos si la variable de session existe de lo contrario no se ara nada 
	//si la variable session exite, se evaluara que tiepo de usuario esta ingresando de esa manera saber a donde se deve redireccionar en caso de que ya se haya logeado 
	if(isset($_SESSION['usuario'])){
		//si eta logeado con admnistrador lo redireccionara a su direcctorio que le corresponde 
		if($_SESSION['usuario']['privilegios'] == "admin")
		{	header('Location: administrador');
		//si eta logeado con usuario lo redireccionara a su direcctorio que le corresponde 
		}else if($_SESSION['usuario']['privilegios'] == "cliente")
		{	header('Location: cliente');
		//si eta logeado con manejador lo redireccionara a su direcctorio que le corresponde 
		}else if($_SESSION['usuario']['privilegios'] == "manejador")
		{	//si no hay logeo lo regresa a login.
			header('Location: manejador');
		}
	}

?>
<!DOCTYPE html>
<html lang="es">
<title>Darsis</title>
	<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
	<script type="text/javascript" src="js/validacion.js"></script>
<head>
	<meta charset="utf-8">
	<title>Login</title>
    
	<link rel="stylesheet" type="text/css" href="dist/css/style.css">
	<link rel="stylesheet" type="text/css" href="dist/css/styles.css">
</head>
	<body>
	<div class="formulario">
			<div class="error">
				<strong>Datos incorrectos, intente de nuevo por favor</strong>
			</div>
<h1>PROYECTO</h1>
			<div class="alert alert-success text-center" style="display:none;" id="exito">
			<p>Usuario registrado</p>
			</div>
				<form action="" id="form">
				
				<!--<span class="icon-user2"></span>-->
				<label>Usuario</label><br>
				<input type="text" name="usua" pattern="[A-Z,a-z,0-9,_-,ñ,Ñ]{1,15}" required/><!--que hacepte cualquier letra de la A-Z,a-z,0-9,_- pero no haceptara comillas simples o dobles etc.-->
				<br>




				<!--<span class="icon-locked"></span>-->
				<label>Contraseña</label><br>
				<input type="password" name="pass"  pattern="[A-Z,a-z,0-9,_-ñÑ]{1,15}" required /><!--{1,15}<-longitud minima 1 y logitud maxima 15 para que no haya espacio-->
				
				<input type="submit" class="botton" value="Iniciar Sesion" />			
				
				</form>
			</div>
</body>
<!--<div class="icon-user22">-->


</html>





