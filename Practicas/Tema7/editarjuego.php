<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Juegos</title>
    <?php
    error_reporting(E_ALL);
    ini_set("display_errors", 1);
    require "conexion.php";
    ?>

</head>

<body>
    <?php
    //$id_videojuego="";
    echo "<h1>" . $_GET["id_videojuego"] . "</h1>";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $id_videojuego = $_GET["id_videojuego"];
        $titulo = $_POST["titulo"];
        $nombre_desarrolladora = $_POST["nombre_desarrolladora"];
        $anno_lanzamiento = $_POST["anno_lanzamiento"];
        $porcentaje_reseñas = $_POST["porcentaje_reseñas"];
        $horas_duracion = $_POST["horas_duracion"];

        $consulta = "UPDATE videojuegos SET     
        titulo= '$titulo',
        nombre_desarrolladora='$nombre_desarrolladora',
        anno_lanzamiento='$anno_lanzamiento',
        porcentaje_reseñas= '$porcentaje_reseñas',
        horas_duracion = '$horas_duracion'
        WHERE id_videojuego= '$id_videojuego'
        ";
        $_conexion->query($consulta);
    }

    $consulta = "SELECT * FROM desarrolladoras";
    $desarrolladoras = [];
    $res = $_conexion->query($consulta);
    while ($fila = $res->fetch_assoc()) {
        array_push($desarrolladoras, $fila["nombre_desarrolladora"]);
    }
    if (!isset($_GET["id_videojuego"])) die("ERROR: No se ha encontrado una id que editar");
    else $id_videojuego = $_GET["id_videojuego"];

    $consulta = "SELECT * FROM videojuegos WHERE id_videojuego= $id_videojuego";
    $res = $_conexion->query($consulta);
    if ($res->num_rows == 0) die("ERROR: No existe una fila con el id: $id_videojuego");
    else $juego = $res->fetch_assoc();
    $titulo = $juego["titulo"] ?? "";
    $anno_lanzamiento = $juego["anno_lanzamiento"] ?? "";
    $porcentaje_reseñas = $juego["porcentaje_reseñas"] ?? "";
    $horas_duracion = $juego["horas_duracion"] ?? "";



    ?>
    <form action="" method="post">
        <label for="titulo">Título:</label>
        <input type="text" name="titulo" value="<?php echo $titulo ?>">
        <select name="nombre_desarrolladora">
            <option value="<?php echo $juego["nombre_desarrolladora"] ?>" selected>
                <?php echo $juego["nombre_desarrolladora"] ?>
            </option>
        <?php
        foreach($desarrolladoras as $desarrolladora){
            if($desarrolladora!=$juego["nombre_desarrolladora"]){
                echo "<option value='$desarrolladora'>$desarrolladora </option>";
            }
        }
        ?>
        </select>
        <label for="anno_lanzamiento">Año de lanzamiento:</label>
        <input type="text" name="anno_lanzamiento" value="<?php echo $anno_lanzamiento ?>">
        <label for="porcentaje_reseñas">Porcentaje de reseñas:</label>
        <input type="text" name="porcentaje_reseñas" value="<?php echo $porcentaje_reseñas ?>">
        <label for="horas_duracion">Duracion:</label>
        <input type="text" name="horas_duracion" value="<?php echo $horas_duracion ?>">
        <input type="submit" value="Enviar">
        <input type="hidden" name="id_videojuego" value="<?php echo $juego["id_videojuego"] ?>">
    </form>

</body>

</html>