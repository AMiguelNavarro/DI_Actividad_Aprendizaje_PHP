<!doctype html>
<?php
include 'vista/layout/header_index.php';
?>
<body>
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="index.php">Foro PHP</a>
            </div>
            <ul class="nav navbar-nav">
                <li class="active"><a href="index.php">Inicio</a></li>
                <li><a href="vista/comentarios_vista.php">Comentarios</a></li>
            </ul>
        </div>
    </nav>



    <div class="container">
        <div class="jumbotron text-center">
            <h1>Foro de Desarrollo de Interfaces</h1>
            <p>Trabajo final 1ª Evaluación Alberto Miguel Navarro</p>
        </div>
    </div>

    <div id="contenedor-inicio">
        <p> Inicia Sesión para acceder a los comentarios y los temas del foro <i>(Se desbloquearán 2 pestañas en la barra de navegación)</i></p>
        <p>  O </p>
        <p> Regístrate en caso de no tener cuenta </p>

        <div id="contenedor-enlaces">
            <a href="vista/login_vista.php" id="enlace-inicio-sesion"> Iniciar Sesión </a>
            <a href="vista/registro_vista.php" id="enlace-registro"> Registrarse </a>

        </div>

    </div>
</body>
</html>

