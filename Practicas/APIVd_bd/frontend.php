<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prueba</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <?php
    error_reporting(E_ALL);
    ini_set("display errors", 1);
    require "excepcion.php";
    ?>
</head>

<body>
    <div class="d-flex justify-content-center align-items-center vh-100">
        <div class="form-container w-50">
            <h1 class="text-center display-1 ">Testiiiing</h1>
            <form action="" method="post">
                <div class="mb-3">
                    <label for="" class="form-label">Selecciona el método</label>
                    <select name="metodo" id="" class="form-select">
                        <option value="GET">GET (RECUPERAR DATOS)</option>
                        <option value="POST">POST (INSERTAR DATOS)</option>
                        <option value="PUT">PUT (CAMBIAR DATOS)</option>
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
    </div>
    <?php
    try {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $metodo = $_POST["metodo"];
            if (empty($metodo)) {
                // *CASO frontend la lie y el metodo por alguna razon devuelve mal
                throw new MiExcepcion("Ya la esta liando el tontito de FrontEnd", 1);
            } else {
                // Caso metodo seteado y con valor
                switch($metodo){
                    case "PUT":

                        break;
                }
            }
        }
    } catch (MiExcepcion $e) {
        // Importante: noes una excepcion cualquiera. La clase es la mia
        echo $e->mensajePersonalizado();
    }

    ?>
</body>