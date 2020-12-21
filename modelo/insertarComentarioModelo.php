<?php

session_start();

require_once 'conexion.php';

//Recogemos los datos
$fecha = date("Y-m-d");
$idTema = $_GET['id_tema'];
$mensaje = $_POST['mensaje'];
$tema = $_GET['tema'];

//Se comprueba que no estén en blanco
if (!isset($mensaje) || $mensaje = '') {

    echo "Debes escribir un comentario";

} else {

    //Guardar los datos en la bd
    try {

        $sentencia = $conexion->prepare("INSERT INTO comentario (id_usuario, id_tema, fecha, mensaje) VALUES (?,?,?,?)");
        $sentencia->bindParam(1, $_SESSION['id_usuario']);
        $sentencia->bindParam(2, $idTema);
        $sentencia->bindParam(3, $fecha);
        $sentencia->bindParam(4, $_POST['mensaje']);

        $sentencia->execute();

        header('Location:../temasSesionIniciadaVista.php?id_tema=' . $idTema . '&tema=' . $tema);

    } catch (PDOException $e) {
        echo "ERROR al guardar los datos en la base de datos " . $e->getMessage();
    }
}
