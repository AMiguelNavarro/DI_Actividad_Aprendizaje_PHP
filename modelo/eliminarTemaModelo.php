<?php

require_once "conexion.php";

session_start();

$idTema = $_GET['id_tema'];


try {

    $sql = "DELETE FROM tema where id_tema = ?";

    $resultado = $conexion -> prepare($sql);
    $resultado -> bindParam(1, $idTema);
    $resultado -> execute();


    header("Location:../index.php");

} catch (PDOException $pdoe) {
    $pdoe -> getMessage();
}
