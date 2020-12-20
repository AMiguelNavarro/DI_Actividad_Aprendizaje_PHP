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
    $idTema = $_GET['id_tema'];
    $statement = $conexion->prepare('SELECT mensaje, fecha, usuario, u.id_usuario, c.id_comentario from comentario c INNER join usuario u on c.id_usuario = u.id_usuario INNER JOIN tema t on t.id_tema = c.id_tema where t.id_tema =' . $idTema . ' ORDER BY c.id_comentario DESC');
    $statement-> execute();

    $comentarios = $statement->fetchAll(PDO::FETCH_ASSOC);

    // Se visualizan todos los datos en una tabla
    // Se muestran los links necesarios para ver sin paginar o paginados.
    // El parametro ?page, nos indicará al tener valor 1 que es primera página de resultados posibles
    echo "<p><b> Listado de comentarios </b></p>";
    echo "<table border='1' cellpadding='10'>";
    echo "<tr> <th> Comentario </th> <th> Fecha </th> <th> Usuario </th><th></th> <th></th></tr>";

    foreach ($comentarios as $comentario) {
        echo "<tr>";
        echo "<td>" ,$comentario['mensaje'], "</td>";
        echo "<td>" ,$comentario['fecha'], "</td>";
        echo "<td>" ,$comentario['usuario'], "</td>";
        $idUsuarioComentario = $comentario['id_usuario'];
        $idComentario = $comentario['id_comentario'];

        if ($idUsuarioComentario == $_SESSION['id_usuario'] || $_SESSION['privilegio'] == "0"){
            echo "<td>" ,"<a href='modelo/eliminarComentarioModelo.php?id_tema=$idTema&id_usuario=$idUsuarioComentario&id_comentario=$idComentario'> Eliminar </a>", "</td>";
        }


        echo "</tr>";
    }



    echo"</table>";
} catch (PDOException $pdoe){
    echo "Error al mostrar los datos ", $pdoe->getMessage();
}

    echo "<p><a href='nuevoComentarioVista.php?id_tema=$idTema'> Añadir un nuevo comentario </a></p>";
?>

<p><a href="index.php"> Volver al inicio</a></p>


<!--Solo si es usuario está registrado-->

<p><a href="cerrarSesion.php"> Cerrar sesión</a></p>


</body>
</html>
