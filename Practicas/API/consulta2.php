<?php
    require "conexion_pdo.php";
    //Consulta con prepare() y execute()
    //Recupera una fila especifica de la tabla desarrolladoras usando una consulta

    try{
        $consulta=$_conexion->prepare("SELECT * FROM desarrolladoras WHERE nombre_desarrolladora= :nombre");
        $consulta->execute(["nombre"=>"Valve"]);
        //Manda la consulta con el parámetro dinámico

        while($fila=$consulta->fetch()){
            //fetch(): recupera la primera fila que coincide y si es cierto devuelve true, si no, false
            var_dump($fila);
            if($fila==false){
                echo "no se encontro desarrolladora<br>";
            }
        }
    }catch(PDOException $e){
        echo "Error en la consulta:".$e->getMessage();
    }
?>