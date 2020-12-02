<?php

include 'configuracion/conexion.php';


/**
 * Devuelve un array con todos los comentarios de la base de datos
 * @return array
 */
function getlistadoComentarios() {
    $db = getConexion();
    $sql = 'SELECT * FROM comentario';
    $resultado = $db -> query($sql);

    $comentarios = array();
    while ($comentario = $resultado -> fetch()) {
        $this -> comentarios[] = $comentario;
    }

    return $comentarios;
}


function insertarComentario($fecha, $mensaje) {
    $db = getConexion();
    $sql = 'INSERT INTO comentario (fecha, mensaje) VALUES (, )';
}
