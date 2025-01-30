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
                <label for="" class="form-label">DATOS PARA POST:</label>
                <input type="text" name="nombre_desarrolladora" class="form-control" placeholder="Nombre:" id="">
                <input type="text" name="ciudad" class="form-control" placeholder="Ciudad:" id="">
                <input type="number" name="anno_fundacion" class="form-control" placeholder="Año:" id="">
            </div>
            <button type="submit" class="btn btn-primary">INSERTAR DATITO</button>
        </form>
    </div>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Cuando dé al boton submit
        $metodo = $_POST["metodo"];
        // Recojo el dato para enviar el método a hacer
        $url = "http://localhost/Vinculo/Practicas/API/nucleo_api.php";
        //Recoge la url del núcleo
        if ($metodo == "GET") {
            // *CASO GET:
            if (isset($_POST["nombre_desarrolladora"])) {
                $nombre = "?nombre_desarrolladora=" . urlencode(trim($_POST["nombre_desarrolladora"]));
                //Si esta definido,tome el post, le quite espacios al principio y final y lo ponga modo url
                $url=$url.htmlspecialchars($nombre) ;
                echo "Url generada: " .$url. " <br>";
              
            }

            // $ciudad=isset($_POST["ciudad"])&&!empty($_POST["ciudad"])? "?ciudad=".urlencode($_POST["ciudad"]):"";
            //Para este caso solo necesito 
            try {
                $res=file_get_contents($url);
                echo "<pre>".htmlspecialchars($res)."</pre>";

            } catch (Exception $e) {
                echo "Error al realizar la solicitud".$e->getMessage();
            }
        } else if ($metodo == "POST" || $metodo == "PUT" || $metodo == "DELETE") {
            $datos = [];
            if ($metodo == "POST" || $metodo == "PUT") {
                $datos = [
                    "nombre_desarrolladora" => $_POST["nombre_desarrolladora"],
                    "ciudad" => $_POST["ciudad"],
                    "anno_fundacion" => $_POST["anno_fundacion"]
                ];
            } else if ($metodo == "DELETE") {
                $datos = [
                    "nombre_desarrolladora" => $_POST["nombre_desarrolladora"]
                ];
            }
            $opciones = [
                "http" => [
                    "header" => "Content-Type: application/json",
                    "method" => $metodo,
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
    }
    ?>