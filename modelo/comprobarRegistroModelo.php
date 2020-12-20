<?php

require_once "conexion.php";

$usuario = htmlentities(addslashes($_POST['usuario']));
$contrasenia = htmlentities(addslashes($_POST['contrasenia']));
$email = htmlentities(addslashes($_POST['email']));

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "Dirección de email incorrecta";
    exit();
}
if (!isset($usuario) || !isset($contrasenia)) {
    echo "Debes rellenar los campos de usuario y contraseña";
    exit();
}


$contraseniaCifrada = password_hash($contrasenia, PASSWORD_DEFAULT);

try {

    $sqlInsertar = "INSERT INTO usuario (usuario, contraseña, email) VALUES (?,?,?)";

    $resultado = $conexion -> prepare($sqlInsertar);

    $resultado -> bindParam(1, $usuario);
    $resultado -> bindParam(2, $contraseniaCifrada);
    $resultado -> bindParam(3, $email);

    $resultado -> execute();

    header("Location:../index.php");

} catch (PDOException $pdoe) {
    $pdoe -> getMessage();
}


