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
    <!--    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">-->
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

<div class="main">
    <div class="columna-izquierda">

<?php

// Obtencion de resultados por consulta
try {
    $tema = $_GET['tema'];
    $idTema = $_GET['id_tema'];
    $statement = $conexion->prepare('SELECT mensaje, fecha, usuario, categoria, u.id_usuario, c.id_comentario from comentario c INNER join usuario u on c.id_usuario = u.id_usuario INNER JOIN tema t on t.id_tema = c.id_tema where t.id_tema =' . $idTema . ' ORDER BY c.id_comentario DESC');
    $statement-> execute();

    $comentarios = $statement->fetchAll(PDO::FETCH_ASSOC);

    if ($_SESSION['privilegio'] == "0") {
        $mensaje = "ADMIN";
    } elseif ($_SESSION['privilegio'] == "1") {
        $mensaje = "MODERADOR";
    }

    echo '<div class="tarjeta">';
        echo "<div class='titulo-tema'>";
            echo "<h1> Tema: " . $tema . "</h1>";
            echo "<p><a href='nuevoComentarioVista.php?id_tema=$idTema&tema=$tema'> Añadir un nuevo comentario </a></p>";
        echo "</div>";
    echo "</div>";


    foreach ($comentarios as $comentario) {

        echo '<div class="tarjeta">';

            echo '<h3>'. $comentario['mensaje'] .'</h3>';

            echo '<p> Fecha del comentario 🠚 ' . $comentario['fecha'] . '</p>';
            echo '<p> Usuario 🠚 ' . $comentario['usuario'] . '</p>';

            $idUsuarioComentario = $comentario['id_usuario'];
            $idComentario = $comentario['id_comentario'];
            if ($idUsuarioComentario == $_SESSION['id_usuario'] || $_SESSION['privilegio'] == "0"){
                echo "<td>" ,"<a href='modelo/eliminarComentarioModelo.php?id_tema=$idTema&id_usuario=$idUsuarioComentario&id_comentario=$idComentario&tema=$tema'> Eliminar </a>", "</td>";
            }

        //        Fin del div tarjeta
        echo '</div>';

    }

} catch (PDOException $pdoe){
    echo "Error al mostrar los datos ", $pdoe->getMessage();
}

?>

    </div>

    <div class="columna-derecha">

        <div class="tarjeta">

            <div class="texto-sesion-iniciada">

                <p> Bienvenido <span class="texto-privilegio"> <?php echo $_SESSION['usuario'] . " " . $mensaje ?> </span> </p>

            </div>

            <div class="enlace-cerrar-sesión">
                <a href="cerrarSesion.php"> Cerrar Sesión </a>
            </div>
        </div>

    </div>

    <!-- Final div main   -->
</div>


<div class="pie-pagina">

    <footer>
        <h2> © Foro Alberto Miguel Navarro </h2>
    </footer>

</div>


</body>
</html>
