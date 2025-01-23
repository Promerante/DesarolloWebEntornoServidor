<?php
    require "conexion_pdo.php";
    /*
    Consulta sencilla con query().Recuperar todos lo datos de la tabla desarrolladora y 
    mostrarlos.
    */
    echo "<h2 style='text-align: center;'>Recuperacion de datos de DESARROLLADORAS</h2>";
    try{
        $res=$_conexion->query("Select* FROM desarrolladoras");
        while($fila=$res->fetch()){
            
            echo "ID:".$fila["id"]."|Desarrolladora:".$fila["nombre_desarrolladora"].
            "|Ciudad:".$fila["cidudad"]."|Año de fundacion:".$fila["anno_fundacion"]."<br>";
        }
        echo "<br><br>";
        $res2=$_conexion->query("Select* FROM desarrolladoras");
        foreach($res2 as $filas){
            echo "ID:".$filas["id"]."|Desarrolladora:".$filas["nombre_desarrolladora"].
            "|Ciudad:".$filas["cidudad"]."|Año de fundacion:".$filas["anno_fundacion"]."<br>";
        }
    }catch(PDOException $e){
        echo "ERROR en la consulta".$e->getMessage();

    }
?>