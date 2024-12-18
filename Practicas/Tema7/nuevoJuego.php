<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NuevoVideojuego</title>
    <?php
    error_reporting(E_ALL);
    ini_set("display_errors", 1);
    require "conexion.php";

    ?>
</head>

<body>
    <?php
    $consulta = "Select * FROM desarolladoras ORDER BY nombre_desarrolladora";
    $resultado = $_conexion->query($consulta);
    $desarrolladoras = [];
    var_dump($resultado);
    while ($fila = $resultado->fetch_assoc()) {
        array_push($desarrolladoras, $fila["nombre_desarrolladora"]);
    }
    // print_r($desarrolladoras);
    ?>
    <form action="" method="get">
        <input type="text" name="titulo" id="">
        <select name="desarrolladoras" id="">
            <option value="" selected disabled>--ELIJA LA DESARROLLADORA--</option>
            <?php foreach ($desarrolladoras as $desarrolladora) { ?>
                <option value="<?php echo $desarrolladora ?>"><?php echo $desarrolladora ?></option>
            <?php } ?>

        </select>
        <label for="anno_lanzamiento">Lanzamiento:</label>
        <input type="text" name="anno_lanzamiento">
        <label for="porcentaje_reseñas">Reseñas:</label>
        <input type="text" name="porcentaje_reseñas">
        <label for="horas_duracion">Duracion:</label>
        <input type="text" name="horas_duracion">

    </form>

</body>

</html>