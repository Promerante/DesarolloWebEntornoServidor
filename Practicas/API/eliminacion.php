<?php
    require "conexion_pdo.php";
    //Actualiza la ciudad de una desarrolladora de la tabla que ya exista
    echo "<h2 style='text-align:center;'>Eliminacion</h2>";
    try {
        $consulta=$_conexion->prepare("DELETE FROM desarrolladoras WHERE nombre_desarrolladora=:n");

        $consulta->execute([
            "n"=> "Epic Games"
        ]);
        echo "hecho";
    } catch (PDOException $e) {
        echo "ERROR EN LA CONSULTA ".$e->getMessage();
    }

?>