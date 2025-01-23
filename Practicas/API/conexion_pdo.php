<?php
//Config pa la conexion con la bd
    $_host="localhost";
    $_bd="videojuegos_bd";
    $_usuario="root";
    $_contrasenia=""; 

    //Crear la conexion usando PD(PHP Data Object)
    try{
        //CREAMOS EL OBJETO PDO pq este incluye la info para interactuar con la bd y realizar consultas
        $_conexion=new PDO("mysql:host=$_host;dbname=$_bd;charset=utf8",$_usuario,$_contrasenia);
        //Configurar PDO  para lanzar excepciones en caso de haber un error:
        $_conexion-> setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

    }catch(PDOException $e){
        die("Error: No se puede conectar al BBDD->".$e->getMessage());
    }

?>