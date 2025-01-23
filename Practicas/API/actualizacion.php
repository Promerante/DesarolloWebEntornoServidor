<?php
    require "conexion_pdo.php";
    //Actualiza la ciudad de una desarrolladora de la tabla que ya exista
    echo "<h2 style='text-align:center;'>ACTUALIZACIÓN</h2>";
    try {
        $consulta=$_conexion->prepare("UPDATE desarrolladoras SET ciudad=:c WHERE nombre_desarrolladora=:n");

        $consulta->execute([
            "c"=> "Varsovia",
            "n"=> "Nintendo"
        ]);
        echo "hecho";
    } catch (PDOException $e) {
        echo "ERROR EN LA CONSULTA ".$e->getMessage();
    }

?>