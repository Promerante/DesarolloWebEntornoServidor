<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prueba</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container m-4">
        <h1>Testiiiing </h1>
        <form action="" method="post">
            <div class="mb-3">
                <label for="" class="form-label">Selecciona el método</label>
                <select name="metodo" id="" class="form-select">
                <option value="GET">GET(RECUPERAR DATOS)</option>
                <option value="POST">POST(INSERTAR DATOS)</option>
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
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        $metodo=$_POST["metodo"];
        $url="http://localhost/Vinculo/Practicas/API/PRUEBA_api.php";
        if($metodo=="GET"){
            $ciudad=isset($_POST["ciudad"])&&!empty($_POST["ciudad"])? "?ciudad=".urlencode($_POST["ciudad"]):"";
        }
    }
    ?>
</body>
</html>