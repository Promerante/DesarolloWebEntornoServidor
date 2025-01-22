<?php
//Config pa la conexion con la bd
    $_host="localhost";
    $_bd="videojuegos_bd";
    $_usuario="root";
    $_contrasenia=""; 

    //Crear la conexion usando PD(PHP Data Object)
    try{
        $_conexion=new PDO("mysql:host=$_host;dbname:$_bd;charset=utf8",$_usuario,$_contrasenia);
    }catch(PDOException $e){
        die("Error: No se puede conectar al BBDD->".$e->getMessage());
    }

?>