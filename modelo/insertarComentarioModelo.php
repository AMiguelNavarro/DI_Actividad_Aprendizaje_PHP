<?php
require_once 'conexion.php';

//Recogemos los datos
$mensaje = $_POST['mensaje'];
$fecha = getdate();
$idTema = $_GET['id_tema'];
$idUsuario = $_SESSION['id_usuario'];

//Se comprueba que no estén en blanco
if (!isset($mensaje)){
    //Error
    echo "Debes escribir un comentario";
} else {
    //Guardar los datos en la bd
    try {
        $sentencia = $conexion->prepare("INSERT INTO comentario (id_usuario, id_tema, fecha, mensaje) VALUES (?,?,?,?)");
        $sentencia->bindParam(1, $idUsuario);
        $sentencia->bindParam(2, $idTema);
        $sentencia->bindParam(3, $fecha);
        $sentencia->bindParam(4, $mensaje);

        $sentencia -> execute();

        header("Location:../index.php");
    } catch (PDOException $e){
        echo "ERROR al guardar los datos en la base de datos " .$e->getMessage();
    }
}
