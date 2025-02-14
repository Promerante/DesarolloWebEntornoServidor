<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Evoluciones</title>
    <?php
    error_reporting(E_ALL);
    ini_set("display_errors", 1);
    ?>
</head>

<body>
    <?php
    echo "<h1>Cadena de evoluciones</h1>";
    $evChainURL = "https://pokeapi.co/api/v2/evolution-chain/?limit=50";
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $evChainURL);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $res = curl_exec($curl);
    curl_close($curl);
    $evChain = json_decode($res, true)["results"];
    $cont = 1;
    foreach ($evChain as $cadena) {
        echo "<h3>Cadena de evolucion: " . $cont . "</h3>";
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $cadena["url"]);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $res = curl_exec($curl);
        curl_close($curl);
        $evoluciones = json_decode($res, true)["chain"];
        echo "<p>Pokemon: " . $evoluciones["species"]["name"] . "</p>";
        echo "<p>Pokemon: " . $evoluciones["evolves_to"][0]["species"]["name"] . "</p>";
        if (isset($evoluciones["evolves_to"][0]["evolves_to"][0])) {
            echo "<p>Pokemon: " . $evoluciones["evolves_to"][0]["evolves_to"][0]["species"]["name"] . "</p>";
        }
        echo "<hr><hr>";
        $cont++;
    }
    ?>
</body>

</html>