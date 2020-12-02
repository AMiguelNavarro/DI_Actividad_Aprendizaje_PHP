<?php
include '../controlador/comentarios_controller.php';
?>


<?php
include 'vista/layout/header_index.php';
?>
<body>
<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="#">Foro PHP</a>
        </div>
        <ul class="nav navbar-nav">
            <li><a href="#">Cerrar Sesión </a></li>
            <li class="active"><a href="#">Comentarios</a></li>
            <li><a href="#">Temas</a></li>
        </ul>
    </div>
</nav>

<?php
include '../modelo/configuracion/conexion.php';

try {
    // Configurar Prepare Statement
    $db = getConexion();
    $sql = 'SELECT * FROM comentario';
    $sentencia = $db -> prepare($sql);
    $sentencia -> execute();

    // Almacenamos el resultado en un array asociativo (Fetch all para que traiga todos los datos de golpe)
    $resultado = $sentencia -> fetchAll(PDO::FETCH_ASSOC);

    // Se visualizan los datos en una tabla
    echo "<table border='1' cellpadding='10'>";
    echo ""; //TODO hacer en base a pdf MVC
} catch (PDOException $e) {
    echo 'ERROR' . $e -> getMessage();
}
?>
<table border="1" width="80%">
    <thead>
        <tr>
            <th> ID COMENTARIO </th>
            <th> ID USUARIO </th>
            <th> ID TEMA </th>
            <th> FECHA </th>
            <th> MENSAJE </th>
        </tr>
    </thead>
</table>

</body>
</html>
<?php
