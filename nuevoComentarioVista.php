<?php

session_start();

if (!isset($_SESSION['usuario'])) {
    echo "Debes iniciar sesión para añadir un nuevo comentario <br>";
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

        <form method="post" action="">
            <div class="form-group">
                <label for="exampleInputText">Mensaje:</label>
                <input type="text" class="form-control" name="mensaje" id="mensaje" placeholder="Introduce tu mensaje ...">
            </div>
            <input type="submit" name="submit" value="Insertar Usuario"/>
        </form>
    </div>
</div>

</body>
</html>

<?php
require_once 'modelo/conexion.php';
if (isset($_POST['submit'])) {
    //Recogemos los datos
    $mensaje = $_POST['mensaje'];
    $fecha = date("Y-m-d");

    //Se comprueba que no estén en blanco
    if (!isset($mensaje) || $mensaje = '') {

        echo "Debes escribir un comentario";

    } else {

        //Guardar los datos en la bd
        try {

            $sentencia = $conexion->prepare("INSERT INTO comentario (id_usuario, id_tema, fecha, mensaje) VALUES (?,?,?,?)");
            $sentencia->bindParam(1, $_SESSION['id_usuario']);
            $sentencia->bindParam(2, $_GET['id_tema']);
            $sentencia->bindParam(3, $fecha);
            $sentencia->bindParam(4, $_POST['mensaje']);

            $sentencia->execute();

            header('Location:temasSesionIniciadaVista.php?id_tema=' . $_GET['id_tema']);

        } catch (PDOException $e) {
            echo "ERROR al guardar los datos en la base de datos " . $e->getMessage();
        }
    }
}



