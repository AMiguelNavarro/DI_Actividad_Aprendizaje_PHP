<?php
include 'modelo/conexion.php';

session_start();

if (isset($_SESSION['usuario'])) {
    header('Location:temasSesionIniciadaVista.php?usuario='.$_SESSION['usuario']);
}

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
    $idTema = $_GET['id_tema'];
    $tema = $_GET['tema'];

    $statement = $conexion->prepare('SELECT mensaje, fecha, usuario, categoria from comentario c INNER join usuario u on c.id_usuario = u.id_usuario INNER JOIN tema t on t.id_tema = c.id_tema where t.id_tema =' . $idTema . ' ORDER BY c.id_comentario DESC');
    $statement-> execute();

    $comentarios = $statement->fetchAll(PDO::FETCH_ASSOC);

    echo '<div class="tarjeta">';
        echo "<div class='titulo-tema'>";
            echo "<h1> Tema: " . $tema . "</h1>";
        echo "</div>";
    echo "</div>";

    foreach ($comentarios as $comentario) {

        echo '<div class="tarjeta">';

            echo '<h3>'. $comentario['mensaje'] .'</h3>';

            echo '<p> Fecha del comentario 🠚 ' . $comentario['fecha'] . '</p>';
            echo '<p> Usuario 🠚 ' . $comentario['usuario'] . '</p>';

        //        Fin del div tarjeta
        echo '</div>';

    }

    echo "</div>";

} catch (PDOException $pdoe){
    echo "Error al mostrar los datos ", $pdoe->getMessage();
}

?>

        <div class="columna-derecha">

            <div class="tarjeta">

                <h2> Inicia Sesión </h2>

                <form action="modelo/comprobarLoginModelo.php" method="POST">

                    <span> <p> Usuario </p></span>
                    <input type="text" name="usuario" id="usuario">
                    <span> <p> Contraseña </p></span>
                    <input type="password" name="contrasenia" id="contrasenia">

                    <br> <br>
                    <input type="submit" value="Iniciar Sesión" class="boton-inicio-sesion">

                </form>

            </div>

            <div class="tarjeta">

                <h2> Regístrate </h2>

                <form action="modelo/comprobarRegistroModelo.php" method="POST">
                    <span> <p> Usuario </p></span>
                    <input type="text" name="usuario" id="usuario">
                    <span> <p> Contraseña </p></span>
                    <input type="password" name="contrasenia" id="contrasenia">
                    <span> <p> Email </p></span>
                    <input type="text" name="email" id="email">

                    <br> <br>
                    <input type="submit" value="Regístrate" class="boton-registrarse">

                </form>

            </div>

        <!-- Fin del div columna derecha-->
        </div>

        <!-- Final div main -->
    </div>

    <div class="pie-pagina">

        <footer>
            <h2> © Foro Alberto Miguel Navarro </h2>
        </footer>

    </div>



</body>
</html>



