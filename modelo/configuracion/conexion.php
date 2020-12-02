<?php

/**
 * Devuelve la conexión a la base de datos
 * @return PDO
 */
function getConexion() {
    $nombrebd = 'foro';
    $usuario = 'administrador';
    $contrasenia = 'administrador';

    try {
        $driver = "mysql:host=localhost;dbname=$nombrebd";
        $conexion = new PDO($driver, $usuario, $contrasenia, array(PDO::ATTR_PERSISTENT => true));
        // ERRMODE_EXCEPTION para que si hay un fallo, se lance una excepción capturable y se controle correctamente
        // ATTR_ERRMODE determina lo que ocurrira si se produce un fallo en una operación con la bas de datos
        $conexion -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo "Error de conexión: " . $e -> getMessage();

    }
    return $conexion;
}


