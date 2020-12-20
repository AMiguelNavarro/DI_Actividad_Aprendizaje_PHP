<?php
require_once 'conexion.php';


$sql = "SELECT * FROM usuario WHERE usuario = ?";
$resultado = $conexion -> prepare($sql);

$usuario = htmlentities(addslashes($_POST['usuario']));
$contrasenia = htmlentities(addslashes($_POST['contrasenia']));

// Se utiliza más adelante para comprobar si el usuario está en la base de datos
$contador = 0;

$resultado -> bindParam(1, $usuario);

$resultado -> execute();

$registros = $resultado -> fetchAll(PDO::FETCH_ASSOC);

foreach ($registros as $registro){

     $idUsuario = $registro['id_usuario'];
     $privilegio = $registro['privilegio'];

    if (password_verify($contrasenia, $registro['contraseña'])) {
        // Si entra aquí el contador se aumentará en uno
        $contador++;

    }
}

// Si el contador es mayor que 0 significa que ha entrado en el password_verify y que el usuario existe
if ($contador > 0) {
    // Si el uuario existe en la base de datos crea una sesión y lo manda a los comentarios
    session_start();

    // almacenar el la variable superglobal $_SESSION el nombre de usuario de la persona
    // al estar en a superglobal lo podemos usar en cualqueir sitio
    $_SESSION['usuario'] = $_POST['usuario'];
    $_SESSION['id_usuario'] = $idUsuario;
    $_SESSION['privilegio'] = $privilegio;

    header("Location:../index.php");
} else {
        echo "<p> El usuario no existe </p>";
}


?>

</body>
</html>
