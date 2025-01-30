<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prueba</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container m-4 text-md-center">
        <h1>Testiiiing </h1>
        <form method="post">
            <div class="mb-3">
                <label for="" class="form-label">Selecciona el método(OJO:nombre_desarrolladora es la llave principal):</label>
                <select name="metodo" id="" class="form-select">
                    <option value="GET">GET(RECUPERAR DATOS)</option>
                    <option value="POST">POST(INSERTAR DATOS)</option>
                    <option value="PUT">PUT(CAMBIAR DATOS)</option>
                    <option value="REMOVE">REMOVE(BORRAR DATOS)</option>
                </select>
            </div>
            <div class="mb-3" id="datosPost">
                <label for="" class="form-label">DATOS:</label>
                <input type="text" name="id_videojuego" class="form-control" placeholder="Id:" id="">
                <input type="text" name="titulo" class="form-control" placeholder="titulo:" id="">
                <input type="number" name="nombre_desarrolladora" class="form-control" placeholder="nombre_desarrolladora:" id="">
                <input type="number" name="anno_lanzamiento" class="form-control" placeholder="anno_lanzamiento:" id="">
                <input type="number" name="porcentaje_reseñas" class="form-control" placeholder="porcentaje_reseñas:" id="">
                <input type="number" name="horas_duracion" class="form-control" placeholder="horas_duracion:" id="">
            </div>
            <button type="submit" class="btn btn-primary">INSERTAR DATITO</button>
        </form>
    </div>
    <?php
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        $url = "http://localhost/Vinculo/Practicas/API/nucleo_api.php";
        if($_POST["metodo"]=="GET"){
            // *CASO GET:
            if(isset($_POST["titulo"])){
                //*CASO videojuego especificado
                $caso="primarias";
                // primarias:muestre todas las claves primarias
            }else{
                $caso="todo";
                // _todo :muestre toda  la tabla
            }
        }else if($_POST["metodo"]=="POST"){
            if(isset($_POST["id_videojuego"]) || isset($_POST["titulo"])||isset($_POST["nombre_desarrolladora"])||isset($_POST["anno_lanzamiento"])||isset($_POST["porcentaje_reseñas"])||isset($_POST["horas_duracion"])){
                
            }else{
                echo "rellena todas las filas";
            }
        }


        $opciones = [
            "http" => [
                "header" => "Content-Type: application/json",
                "method" => $metodo,
                "caso"=> $caso,
                "content" => json_encode($datos)
            ]
        ];
        $contexto = stream_context_create($opciones);
        try {
            $res = file_get_contents($url, false, $contexto);
            echo "<pre>".htmlspecialchars($res)."</pre>";

        } catch (Exception $e) {
            echo "Error al mandarlo al núcleo ";
        }
    }
    ?>


</body>