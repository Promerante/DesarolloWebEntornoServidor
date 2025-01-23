<?php
    error_reporting(E_ALL);
    ini_set("display_errors",1);

    $serverName = "localhost";
    $usuario = "facu";
    $contraseña = "facu";
    $dataBase = "prueba_bd";
    //crear conexión
    $conn = new mysqli($serverName, $usuario, $contraseña, $dataBase);

    if($conn -> connect_error){
        die("Error de conexión:" . $conn -> connect_error);
    }
    

    // $conn -> close();
?>