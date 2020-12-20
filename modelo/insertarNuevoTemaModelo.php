<?php

require_once "conexion.php";

session_start();

$idUsuario = $_SESSION['id_usuario'];
$categoria = $_POST['categoria'];

try {

    $sql = "INSERT INTO tema (id_usuario, categoria) VALUES (?,?)";

    $sentencia = $conexion -> prepare($sql);

    $sentencia -> bindParam(1, $idUsuario);
    $sentencia -> bindParam(2, $categoria);

    $sentencia -> execute();

    header("Location:../index.php");

} catch (PDOException $pdoe) {
    $pdoe -> getMessage();
}


