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



<div class="contenedor-formulario-comentario">
    <div class="formulario-comentario"">

        <form method="post" action="modelo/insertarComentarioModelo.php?id_tema=<?php $idtema= $_GET['id_tema']; echo $idtema; ?>&tema=<?php $tema = $_GET['tema']; echo $tema;?>">

            <span class="texto-nuevo-comentario">  Nuevo comentario:  </span>
            <input type="text" name="mensaje" id="mensaje" placeholder="Introduce un nuevo comentario ..." class="input-comentario-nuevo">

            <br><br>
            <input type="submit" value="Insertar comentario" class="boton-nuevo-comentario">
        </form>
    </div>
</div>

</body>
</html>




