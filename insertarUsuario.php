<?php
include 'modelo/conexion.php';
include 'vista/layout/header.php';

if (empty($_POST['usuario']) || empty($_POST['contrasenia']) || empty($_POST['email'])) {
    echo "No puedes dejar campos vacios";
    echo "<p><a href='registro.php'> Volver </a></p>";
} else {
    try {
        $usuario = $_POST['usuario'];
        $contrasenia = $_POST['contrasenia'];
        $email = $_POST['email'];

        // Se cifra la contraseña antes de insertarla
        $contrasenia_cifrada = password_hash($contrasenia, PASSWORD_DEFAULT);

        $sql = "INSERT INTO usuario (usuario, contraseña, email) VALUES (?,?,?)";
        $resultado = $conexion -> prepare($sql);
        $resultado -> bindParam(1, $usuario);
        $resultado -> bindParam(2, $contrasenia_cifrada);
        $resultado -> bindParam(3, $email);

        $resultado -> execute();

        header("Location:enviarMail.php");
    } catch (PDOException $e) {
        echo "Error al insertar el usuario en la base de datos -> " . $e -> getMessage();
    }

}



?>


</body>
</html>