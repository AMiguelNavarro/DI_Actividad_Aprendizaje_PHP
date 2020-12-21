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

if ($_SESSION['privilegio'] == "0") {
    echo '<div class="tarjeta">';
    echo '<div class="enlace-nuevo-tema">';
    echo '<a href="insertarNuevoTemaVista.php"> Añadir un nuevo tema </a>';
    echo '</div>';
    echo '</div>';
}

// Obtencion de resultados por consulta
try {
    $statement = $conexion->prepare('SELECT DISTINCT tema.categoria, tema.id_tema, COUNT(comentario.mensaje) as comentarios FROM tema LEFT JOIN comentario on tema.id_tema = comentario.id_tema GROUP BY tema.categoria ORDER BY tema.id_tema DESC');
    $statement-> execute();

    $comentarios = $statement->fetchAll(PDO::FETCH_ASSOC);


    if ($_SESSION['privilegio'] == "0") {
        $mensaje = "ADMIN";
    } elseif ($_SESSION['privilegio'] == "1") {
        $mensaje = "MODERADOR";
    }

    foreach ($comentarios as $comentario) {

        echo '<div class="tarjeta">';

        echo '<h2>'. $comentario['categoria'] .'</h2>';

        echo '<div class="numero-comentarios-contenedor"> Numero de comentarios: <span class="numero-comentarios">' . $comentario['comentarios'] . '</span> </div>';

        $idTema = $comentario['id_tema'];
        $tema = $comentario['categoria'];

        echo "<a href='temasSesionIniciadaVista.php?id_tema=$idTema&tema=$tema'>Ver tema</a>";

        if ($_SESSION['privilegio'] == "0") {
            echo "<br>";
            echo "<a href='modelo/eliminarTemaModelo.php?id_tema=$idTema'> Eliminar Tema </a>";
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

                    <p> Bienvenido <span class="texto-privilegio"> <?php echo $_SESSION['usuario'] . " " . $mensaje ?></p> </span>

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
