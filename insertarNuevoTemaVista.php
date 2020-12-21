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
<!--        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">-->
    <link rel="stylesheet" type ="text/css" href="css/estilo.css">
    <title> FORO </title>
</head>
<body>
<div class="header">
    <h1> Foro con PHP </h1>
    <h3> Trabajo final 1ª Evaluación Alberto Miguel Navarro</h3>
</div>

<div class="barra-navegador">
    <a href="index.php"> Temas </a>
</div>


<div class="contenedor-formulario-tema">

    <div class="formulario-tema">

        <form action="modelo/insertarNuevoTemaModelo.php" method="POST">

            <span> <p> Nuevo tema: </p> </span>
            <input type="text" name="categoria" id="categoria" placeholder="Introduce un nuevo tema ...">

            <br><br>
            <input type="submit" value="Insertar tema">

        </form>

    </div>

</div>

</body>
</html>

