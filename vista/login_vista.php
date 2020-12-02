<?php
// Compueba si se ha iniciado sesión, en caso de ser así redirecciona a los comentarios
    session_start();
    if (isset($_SESSION['usuario'])) {
        header("Location:comentarios_vista.php");
    } else {
?>

<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" type ="text/css" href="../css/estilo_login.css">
    <title> FORO </title>
</head>
<body>
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="../index.php">Foro PHP</a>
            </div>
            <ul class="nav navbar-nav">
                <li class="active"><a href="../index.php">Inicio</a></li>
            </ul>
        </div>
    </nav>

    <div id="contenedor-login-padre" class="container">
        <div id="contenedor-login-hijo">
            <h2> Inicia Sesión </h2>
            <form method="post" action="../modelo/login_modelo.php">
                <div class="form-group">
                    <label for="usuario"> Usuario: </label>
                    <input type="text" name="usuario" class="form-control" id="usuario" placeholder="Introduce tu usuario ...">
                </div>
                <div class="form-group">
                    <label for="pwd"> Contraseña: </label>
                    <input type="password" name="contrasenia" class="form-control" id="contrasenia" placeholder="Introduce tu contraseña ...">
                </div>

                <button type="submit" class="btn btn-default"> Acceder </button>
            </form>
        </div>
    </div>
    <div id="contenedor-errores">

    </div>
</body>
</html>
<?php
    }
    ?>

