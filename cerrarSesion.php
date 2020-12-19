<?php
    session_start();

    if (!isset($_SESSION['id_usuario'])) {
        echo "No has iniciado sesión <br>";
        echo "<a href='javascript:history.go(-1)'> Volver </a>";
        exit;
    }

    session_destroy();
    header("Location:index.php");
?>

