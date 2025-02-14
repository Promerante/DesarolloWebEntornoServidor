<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informacion del pokemon</title>
    <?php
    error_reporting(E_ALL);
    ini_set("display_errors", 1);
    ?>
</head>

<body>
    <?php
    $name = $_GET["name"];
    echo "<h1>" . ucfirst($name) . "</h1>";
    $pokemonURL = "https://pokeapi.co/api/v2/pokemon/" . $name;
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $pokemonURL);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $res = curl_exec($curl);
    curl_close($curl);
    $pokemon = json_decode($res, true);
    echo "<h3>Altura: " . $pokemon["height"] . "</h3><br>";
    echo "<h3>Peso: " . $pokemon["weight"] . "</h3><br>";
    echo "<h3>Id: " . $pokemon["id"] . "</h3><br>";
    echo "<h3>Tipos:</h3><br><ul>";
    foreach ($pokemon["types"] as $espacioTipo) {
        echo "<li>" . ucfirst($espacioTipo["type"]["name"]) . "</li>";
        // Importante el primero type, cada tipo tiene si es el primero o segundo en el atributo slot y luego
        // tiene la array que guarda el nombre y su direccion
    }
    echo "</ul>"
    ?>
</body>

</html>