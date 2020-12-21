
<?php
include 'modelo/conexion.php';

session_start();

if (isset($_SESSION['usuario'])) {
    header('Location:indexSesionIniciadaVista.php?usuario='.$_SESSION['usuario'].'&id_usuario='.$_SESSION['id_usuario'].'&privilegio='.$_SESSION['privilegio']);
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
    <a href="index.php"> Inicio </a>
</div>

<div class="main">
<div class="columna-izquierda">

    <?php

    // Obtencion de resultados por consulta
    try {
        $statement = $conexion->prepare('SELECT DISTINCT tema.categoria, tema.id_tema, COUNT(comentario.mensaje) as comentarios FROM tema LEFT JOIN comentario on tema.id_tema = comentario.id_tema GROUP BY tema.categoria ORDER BY tema.id_tema DESC');
        $statement-> execute();

        $comentarios = $statement->fetchAll(PDO::FETCH_ASSOC);

        foreach ($comentarios as $comentario) {

            echo '<div class="tarjeta">';

            echo '<h2>'. $comentario['categoria'] .'</h2>';

            echo '<div class="numero-comentarios-contenedor"> Numero de comentarios: <span class="numero-comentarios">' . $comentario['comentarios'] . '</span> </div>';

            $idTema = $comentario['id_tema'];

            echo "<a href='temasVista.php?id_tema=$idTema'>Ver tema</a>";

            //        Fin del div tarjeta
            echo '</div>';
        }

//        Final del div columna izda
    echo '</div>';




    } catch (PDOException $pdoe){
        echo "Error al mostrar los datos ", $pdoe->getMessage();
    }


    ?>


    <div class="columna-derecha">

        <div class="tarjeta">

            <h2> Inicia Sesión </h2>

            <form action="modelo/comprobarLoginModelo.php" method="POST">

                <span> <p> Usuario: </p></span>
                <input type="text" name="usuario" id="usuario">
                <span> <p> Contraseña: </p></span>
                <input type="password" name="contrasenia" id="contrasenia">

                <br>
                <input type="submit" value="Iniciar Sesión">

            </form>

        </div>

        <div class="tarjeta">

            <h2> Regístrate </h2>

            <form action="modelo/comprobarRegistroModelo.php" method="POST">
                <span> <p> Usuario: </p></span>
                <input type="text" name="usuario" id="usuario">
                <span> <p> Contraseña: </p></span>
                <input type="password" name="contrasenia" id="contrasenia">
                <span> <p> Email: </p></span>
                <input type="text" name="email" id="email">

            </form>

        </div>

<!---->
solo cuando este iniciada la sesion <!--        <div class="tarjeta">-->
<!---->

<!---->
<!--        </div>-->

    </div>



    <!-- Final div main -->
</div>

<div id="texto-cerrar-sesion">

</div>


<div class="pie-pagina">

    <footer>
        <h2> © Foro Alberto Miguel Navarro </h2>
    </footer>

</div>

</body>
</html>

