<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio1</title>
    <?php
    error_reporting(E_ALL);
    ini_set("display_errors", 1);
    ?>
    <style>
        .container {
            display: flex;
        }
    </style>
</head>

<body>
    <?php
    //Con esto vamos a recoger mediante la API los primeros 50 pokemons como es solicitado
    $apiURL = "https://pokeapi.co/api/v2/pokemon/?limit=50";
    // Inicializa la peticion
    $curl = curl_init();
    //Otorga a la peticion a que direccion URL va a pedirla
    curl_setopt($curl, CURLOPT_URL, $apiURL);
    // Hace que los datos recogidos se guarden en una variable
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    // Ejecutamos
    $res = curl_exec($curl);
    // Finalizamos la peticion
    curl_close($curl);
    // Transformamos la array en un array asociativo y guardamos solo el resultado que es la array necesaria con los pokemons y su URL
    $pokemons = json_decode($res, true)["results"];
    foreach ($pokemons as $pokemon) {
        echo "<div class='container'>";
        echo "<h3>" . ucfirst($pokemon["name"]) . "</h3>";
        // Imprime el nombre
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $pokemon["url"]);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $res = curl_exec($curl);
        curl_close($curl);
        $imagen = json_decode($res, true)["sprites"]["front_default"];
        echo "<img src='" . $imagen . "'></div><br><br>";
        echo "<a href='infoPokemon.php/?name=" . $pokemon["name"] . "'>Más información sobre " . ucfirst($pokemon["name"]) . "</a> ";
    }
    ?>
</body>

</html>