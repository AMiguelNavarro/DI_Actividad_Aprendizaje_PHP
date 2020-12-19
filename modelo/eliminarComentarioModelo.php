<?php

require_once "conexion.php";

session_start();

if (!isset($_SESSION['usuario'])) {
    echo "Debes iniciar sesión para eliminar un comentario <br>";
    echo "<a href='javascript:history.go(-1)'> Volver </a>";
    exit;
}

if ($_GET['id_usuario'] != $_SESSION['id_usuario']) {
    echo "Este comentario no lo has escrito tu, no puedes eliminarlo <br>";
    echo "<a href='javascript:history.go(-1)'> Volver </a>";
    return;
}


try {

    $sql = "DELETE FROM comentario where id_comentario = " . $_GET['id_comentario'];
    $statement = $conexion -> prepare($sql);
    $statement -> execute();

    header("Location:../temasSesionIniciadaVista.php?id_tema=" . $_GET['id_tema']);

} catch (PDOException $pdoe) {
    echo "Error al eliminar el comentario de la base de datos " . $pdoe -> getMessage();
}
