<?php
    $_servidor = "localhost";
    $_usuario = "root"; 
    $_contrasena = ""; 
    $_BBDD = "tienda_bd";
    $_conexion = new mysqli($_servidor,$_usuario,$_contrasena,$_BBDD);
    if ($_conexion->connect_error) {
        die("Error de conexion: " . $_conexion->connect_error);
        $_conexion -> close();
    }
?>
