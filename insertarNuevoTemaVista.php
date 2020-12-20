<?php

session_start();

if (!isset($_SESSION['usuario']) || $_SESSION['privilegio'] != "0") {
    echo "Debes iniciar sesión como SUPER ADMIN para poder añadir un nuevo tema <br>";
    echo "<a href='javascript:history.go(-1)'> Volver </a>";
    exit;
}
?>


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

        <form method="post" action="modelo/insertarNuevoTemaModelo.php">
            <div class="form-group">
                <label for="exampleInputText">Tema:</label>
                <input type="text" class="form-control" name="categoria" id="categoria" placeholder="Introduce el nuevo tema ...">
            </div>
            <button type="submit" class="btn btn-primary"> Insertar Tema </button>
        </form>
    </div>
</div>

</body>
</html>

