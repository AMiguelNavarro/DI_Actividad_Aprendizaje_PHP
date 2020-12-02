<?php
 function validarUsuario() {
     require '../modelo/login_modelo.php';
     $usuario = getUsuario();

     if (isset($usuario)) {
         header("Location:../vista/comentarios_vista.php");
     }
     include '../vista/comentarios_vista.php';
 }