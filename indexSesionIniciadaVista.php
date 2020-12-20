<?php
include 'modelo/conexion.php';

session_start();

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

<?php

// Obtencion de resultados por consulta
try {
    $statement = $conexion->prepare('SELECT DISTINCT tema.categoria, tema.id_tema, COUNT(comentario.mensaje) as comentarios FROM tema LEFT JOIN comentario on tema.id_tema = comentario.id_tema GROUP BY tema.categoria ORDER BY tema.id_tema DESC');
    $statement-> execute();

    $comentarios = $statement->fetchAll(PDO::FETCH_ASSOC);


    if ($_SESSION['privilegio'] == "0") {
        $mensaje = "SUPER ADMIN";
    } elseif ($_SESSION['privilegio'] == "1") {
        $mensaje = "MODERADOR";
    }

    // Se visualizan todos los datos en una tabla
    // Se muestran los links necesarios para ver sin paginar o paginados.
    // El parametro ?page, nos indicará al tener valor 1 que es primera página de resultados posibles
    echo "<p><b> Listado de temas |</b> Bienvenid@ " . $_SESSION['usuario'] . " $mensaje</p>";
    echo "<table border='1' cellpadding='10'>";
    echo "<tr> <th>Tema</th> <th>Nº de Comentarios</th><th></th> <th></th></tr>";

    foreach ($comentarios as $comentario) {
        echo "<tr>";
        echo "<td>" ,$comentario['categoria'], "</td>";
        echo "<td>" ,$comentario['comentarios'], "</td>";

        $idTema = $comentario['id_tema'];

        echo "<td><a href='temasSesionIniciadaVista.php?id_tema=$idTema'> Ver tema </a></td>";

        if ($_SESSION['privilegio'] == "0") {
            echo "<td><a href='modelo/eliminarTemaModelo.php?id_tema=$idTema'> Eliminar Tema </a></td>";
        }

        echo "</tr>";
    }

    echo"</table>";
} catch (PDOException $pdoe){
    echo "Error al mostrar los datos ", $pdoe->getMessage();
}

if (isset($_SESSION['privilegio']) && $_SESSION['privilegio'] == "0") {
    echo "<p><a href='insertarNuevoTemaVista.php'>Añadir un nuevo tema </a></p>";
}

?>

<p><a href="cerrarSesion.php"> Cerrar sesión</a></p>


</body>
</html>
