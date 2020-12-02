<?php
    // Se abre la sesión
    session_start();

    // Se llama al archivo que contiene la conexión
    require_once 'configuracion/conexion.php';


    function getUsuario() {
        $db = getConexion();
        // Se recogen los valores del login en variables
        $usuario = $_POST['usuario'];
        $contrasenia = $_POST['contrasenia'];

        // Se prepara la consulta sql en un repare statement
        $sentencia = $db -> prepare("SELECT * FROM usuario WHERE usuario = ? and contraseña = ?");

        // Se rellenan los parámetros de la consulta prepare
        $sentencia -> bindParam(1, $usuario);
        $sentencia -> bindParam(2, $contrasenia);


        // Se ejecuta la consulta
        $sentencia -> execute();

        // Se configura el fetch para que devuelva un objeto
        $datos = $sentencia -> fetch(PDO::FETCH_OBJ);

        /*// Se validan los datos
        //Si no existe lo devuelve al login
        if ($datos === false) {
            header("Location:../vista/login_vista.php");
            echo '<p id="texto-error"> Usuario o contraseña incorrectos </p>';

            // Caso ontrario, si sentencia devuelve
        } elseif (isset($sentencia) ){
            echo $_SESSION['usuario'] = $datos -> usuario;
            header("Location:../vista/comentarios_vista.php");
        }*/
        // Devuelve el objeto datos que contiene el usuario y la contraseña
        return $datos;
    }

?>