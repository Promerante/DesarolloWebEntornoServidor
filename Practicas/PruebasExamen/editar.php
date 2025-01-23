<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar</title>
    <?php
    error_reporting(E_ALL);
    ini_set("display_errors", 1);
    require "conexion.php";
    ?>
</head>

<body>
    <?php
    // echo "<h1>".  $_GET['id_videojuego'] . "</h1><br>";
    if (!isset($_GET["id"])) die("ERROR: No se ha encontrado un id que editar");
    else $id = $_GET['id'];



    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $titulo = $_POST["titulo"];
        $nombre_desarrolladora = $_POST["nombre_desarrolladora"];
        $anno_lanzamiento = $_POST["anno_lanzamiento"];
        $porcenaje_reseñas = $_POST["porcentaje_reseñas"];
        $horas_duracion = $_POST["horas_duracion"];

        $consulta = "UPDATE videojuegos SET
                            titulo = '$titulo',
                            desarrolladora = '$nombre_desarrolladora',
                            año_lanzamiento = $anno_lanzamiento,
                            porcentaje_reseñas = $porcenaje_reseñas,
                            duracion = '$horas_duracion'
                            WHERE id = $id";

        $conn->query($consulta);
    }
    $consulta = "SELECT * FROM desarrolladoras ORDER BY nombre_desarrolladora";
    $resultado = $conn->query($consulta);
    $desarrolladora = [];
    // var_dump($resultado);
    $consulta = "Select * FROM videojuegos where id= $id ";
    $juego = ($conn->query(($consulta)));

    while ($fila = $resultado->fetch_assoc()) {
        array_push($desarrolladora, $fila["nombre_desarrolladora"]);
    }

    if ($juego->num_rows == 0) die("No existe una fila con ID $id");
    else $juego = $juego->fetch_assoc();

    $titulo = $juego["titulo"] ?? "";
    $nombre_desarrolladora = $juego["nombre_desarrolladora"] ?? "";
    $anno_lanzamiento = $juego["anno_lanzamiento"] ?? "";
    $porcenaje_reseñas = $juego["porcentaje_reseñas"] ?? "";
    $horas_duración = $juego["horas_duracion"] ?? "";
    ?>
    <form action="" method="POST">
        <label for="titulo">Titulo</label>
        <input type="text" name="titulo" value="<?php echo $titulo ?>"><br>
        <select name="nombre_desarrolladora">
            <!-- <option value="" disabled selected>--ELIJA LA DESARROLLADORA--</option> -->
            <?php foreach ($desarrolladora as $nombre) { ?>
                <option value="<?php echo $nombre ?>" <?php if ($nombre == $nombre_desarrolladora) echo "selected"; ?>> <?php echo $nombre ?> </option>
            <?php } ?>
        </select><br>
        <label for="anno_lanzamiento">anno_lanzamiento:</label>
        <input type="text" name="anno_lanzamiento" value="<?php echo $anno_lanzamiento ?>"><br>
        <label for="porcentaje_reseñas">Porcentaje reseñas</label>
        <input type="text" name="porcentaje_reseñas" value="<?php echo $porcenaje_reseñas ?>"><br>
        <label for="horas_duracion">Duracion</label>
        <input type="text" name="horas_duracion" value="<?php echo $horas_duración ?>"><br>
        <input type="submit" value="Enviar">


    </form>

</body>

</html>