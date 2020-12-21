<?php

require_once "conexion.php";

session_start();

try {

    $tema = $_GET['tema'];

    $sql = "DELETE FROM comentario where id_comentario = " . $_GET['id_comentario'];
    $statement = $conexion -> prepare($sql);
    $statement -> execute();

    header("Location:../temasSesionIniciadaVista.php?id_tema=" . $_GET['id_tema'] . "&tema=$tema");

} catch (PDOException $pdoe) {
    echo "Error al eliminar el comentario de la base de datos " . $pdoe -> getMessage();
}
