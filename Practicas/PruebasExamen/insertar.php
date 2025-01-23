<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insertar</title>
    <?php
        error_reporting(E_ALL);
        ini_set("display_errors" , 1);
        require "conexion.php";

    ?>
</head>
</head>
<body>
<?php
        $consulta = "SELECT * FROM desarrolladoras ORDER BY nombre_desarrolladora";
        $resultado = $conn -> query($consulta);
        $desarrolladora = [];
        // var_dump($resultado);

        while($fila = $resultado -> fetch_assoc()){
            array_push($desarrolladora, $fila["nombre_desarrolladora"]);
        
        }

        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $tmp_titulo = $_POST["titulo"];
            $tmp_nombre_desarrolladora = $_POST["nombre_desarrolladora"];
            $tmp_anno_lanzamiento = $_POST["anno_lanzamiento"];
            $tmp_porcentaje_reseñas = $_POST["porcentaje_reseñas"];
            $tmp_horas_duración = $_POST["horas_duracion"];

            if(empty($tmp_titulo)){
                $err_titulo = "No puede estar vacia";
            }else{
                $titulo = $tmp_titulo;
            }

            if(empty($tmp_nombre_desarrolladora)){
                $err_desarrolladora = "TIenes que elegir una de las opciones";
            }else{
                $nombre_desarrolladora = $tmp_nombre_desarrolladora;
            }

            if(empty($tmp_anno_lanzamiento)){
                $err_lanzamiento = "No puede estar vacio";
            }else{
                $anno_lanzamiento=$tmp_anno_lanzamiento;
            }
            if(empty($tmp_porcentaje_reseñas)){
                $err_reseñas = "No puede estar vacio";
            }else{
                $porcentaje_reseñas=$tmp_porcentaje_reseñas;
            }
            if(empty($tmp_horas_duración)){
                $err_duracion = "No puede estar vacio";
            }else{
                $horas_duración=$tmp_horas_duración;
            }
            $consulta2="SELECT MAX(ID)+1 as NextID FROM VIDEOJUEGOS";
            $resultado=$conn->query($consulta2);
            $fila=$resultado->fetch_assoc();
            $nuevo_id=$fila["NextID"];
      
           


            $consulta = "INSERT INTO VIDEOJUEGOS (id,titulo, 
                                    desarrolladora, 
                                    año_lanzamiento, 
                                    porcentaje_reseñas,
                                    duracion)
                                    VALUES
                                    ('$nuevo_id',
                                    '$titulo',
                                    '$nombre_desarrolladora',
                                    $anno_lanzamiento,
                                    $porcentaje_reseñas,
                                    $horas_duración)
                                    ";


            $conn -> query($consulta);
        }

    
    ?>
    <form action="" method="post">
        <label for="titulo">Titulo</label>
        <input type="text" name="titulo" placeholder='<?php echo (isset($err_titulo) ?  $err_titulo :  "") ?>'><br>
        <select name="nombre_desarrolladora" id="">
            <option value="" disabled selected><?php echo (isset($err_desarrolladora) ? $err_desarrolladora : "--ELIJA LA DESARROLLADORA--")?></option>
            <?php foreach($desarrolladora as $nombre){ ?>
                <option value="<?php echo $nombre ?>"><?php echo $nombre ?></option>
            <?php }?>
        </select><br>
        <label for="anno_lanzamiento">anno_lanzamiento:</label>
        <input type="text" name="anno_lanzamiento" placeholder='<?php echo (isset($err_lanzamiento) ?  $err_lanzamiento :  "") ?>'><br>
        <label for="porcentaje_reseñas">Porcentaje reseñas</label>
        <input type="text" name="porcentaje_reseñas" placeholder='<?php echo (isset($err_reseñas) ?  $err_reseñas :  "") ?>'><br>
        <label for="horas_duracion">Duracion</label>
        <input type="text" name = "horas_duracion" placeholder='<?php echo (isset($err_duracion) ?  $err_duracion :  "") ?>'><br>
        <input type="submit" value="Enviar">
    </form>
    
</body>
</html>