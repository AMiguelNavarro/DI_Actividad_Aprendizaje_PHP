<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" type ="text/css" href="css/estilo.css">
    <title> FORO </title>
</head>
<body>
<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="index.php">Foro PHP</a>
        </div>
    </div>
</nav>

    <div id="contenedor-formulario-padre">
        <div id="contenedor-formulario-hijo">

            <form method="post" action="modelo/comprobarLogin.php">
                <div class="form-group">
                    <label for="exampleInputEmail1">Usuario:</label>
                    <input type="text" class="form-control" name="usuario" id="usuario" placeholder="Introduce tu usuario ...">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Contraseña:</label>
                    <input type="password" class="form-control" name="contrasenia" id="contrasenia" placeholder="Contraseña ...">
                </div>
                <button type="submit" class="btn btn-primary">Inicia Sesión</button>
                <p>¿No tienes cuenta? <a href="registro.php"> REGÍSTRATE </a></p>
            </form>
        </div>
    </div>
    <div id="contenedor-errores">
    </div>
</body>
</html>



