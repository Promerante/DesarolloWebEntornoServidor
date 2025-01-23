<?php
require "conexion_pdo.php";

echo "<h2 style='text-align:center;'>Insercion</h2>";
try {
    $consulta=$_conexion->prepare("INSERT INTO desarrolladoras(id,nombre_desarrolladora,ciudad,anno_fundacion)VALUES(:i,:n,:c,:a)");
    $consulta->execute([
        ":i"=>"8",
        ":n"=>"Epic Games",
        ":c"=>"Toronto",
        ":a"=>"1997"
    ]);
} catch (PDOException $e) {
    echo "Error en la consulta" . $e->getMessage();
}
?>
