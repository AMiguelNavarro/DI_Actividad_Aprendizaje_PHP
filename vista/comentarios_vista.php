<!doctype html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <link rel="stylesheet" type ="text/css" href="../css/estilo_listado_comentarios.css">
        <title> FORO </title>
    </head>
<body>

<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="../index.php">Foro PHP</a>
        </div>
        <ul class="nav navbar-nav">
            <li><a href="#">Cerrar Sesión </a></li>
            <li class="active"><a href="#">Comentarios</a></li>
            <li><a href="#">Temas</a></li>
        </ul>
    </div>
</nav>

<table border="1" width="80%">
    <thead>
    <tr>
        <th> ID COMENTARIO </th>
        <th> ID USUARIO </th>
        <th> ID TEMA </th>
        <th> FECHA </th>
        <th> MENSAJE </th>
    </tr>

<?php
require_once '../modelo/comentarios_modelo.php';
$modelo = new ComentariosModelo();
$array_comentarios = $modelo -> getComentarios();
foreach ($array_comentarios as $coment) {
    echo "<tr>";
        echo "<td>" . $coment['id_comentario'] . " </td>";
        echo "<td>" . $coment['id_usuario'] . " </td>";
        echo "<td>" . $coment['id_tema'] . " </td>";
        echo "<td>" . $coment['fecha'] . " </td>";
        echo "<td>" . $coment['mensaje'] . " </td>";
    echo "</tr>";
}
?>
    </thead>
</table>

</body>
</html>

