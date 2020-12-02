<?php
include 'configuracion/conexion.php';

class ComentariosModelo {
    private $db;
    private $comentarios;

    // Se encarga de conectar con l base de datos
    public function __construct(){
        require_once 'configuracion/conexion.php';
        $db = Conectar::getConexion(); // Se guarda la conexión en la variable $db
        $this -> comentarios = array(); // instancia el array que  tendrá los comentarios
    }


    /**
     * Devuelve un array con los comentarios de la base de datos
     * @return array
     */
    public function  getComentarios() {
        $consultaSQL = $this -> db -> query ("SELECT * FROM comentario");

        // Pasa el contenido del array de la consulta al array de comentarios
        while ($filas = $consultaSQL -> fetchAll(PDO::FETCH_ASSOC)) {
            $this -> comentarios[] = $filas;
        }

        return $this->comentarios; // Devuelve el array con los comentarios

    }
}

