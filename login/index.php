<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login and Registro</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="Css/master.css"> <!--ligamos la carpeta-->
</head>
<body>
    <main>

<div class="contenedor__todo" >
    <div class="caja__trasera">
        <div class="caja__trase-Login">
            <h3>Ya tienes una cuenta?</h3>
            <p>Iniciar sesión para entrar a la pagina</p>
            <button id="btn__iniciarsesion">Iniciar sesión</button>
        </div>
        <div class="caja__trasera-register">
            <h3>Aun no tengo una cuenta?</h3>
            <p>Registrate para entrar a la pagina</p>
            <button id="btn__registrar">Registrarse</button>
        </div>
        </div>
    </div>
</div>
<!--Formulario de Login y registro-->
<div class="contenedor__login-register">
<form action=""class="formulario__login" >
    <h2> Iniciar sesión</h2>
    <input type="text" placeholder="Numero de empleado">
    <input type="password" placeholder="Contraseña">
    <button>Entrar</button>
</form>
<!--Formulario registro--> 
<form action="Php/registro_usuario_be.php" method ="POST" class="formulario__registro">
    <h2>Registrarse</h2>
    <input type="text" placeholder="Nombre" name="nombre_completo">
    <input type="text" placeholder="Apellidos" name="Apellidos">
    <input type="text" placeholder="Correo electronico"name= "correo_electronico">
    <select placeholder="prueba" name="Unidad">
        <option>Unidad Administrativa</option>
        <option>Seleccionar la Unidad</option>
    </select>
    <input type="text" placeholder="Extención" name= "Extención">
    <input type="text" placeholder="Numero de Empleado" name= "numero_de_empledo">
    <button>Registrarse</button>
</form>
</div>
    </main>
    <script src="JS/sript.js"></script>
</body>
</html>