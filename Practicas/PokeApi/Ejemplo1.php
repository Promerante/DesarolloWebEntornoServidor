<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejemplo1</title>
    <?php
    error_reporting(E_ALL);
    ini_set("display_errors",true); 
    ?>
    <style>
        .tabla{
            border-collapse: collapse;
            border: 2 px solid black;
        }
        .imagen{
            width: 50px;
            height: auto;
            border: 2 px solid green;
        }
    </style>
</head>
<body>
    <!-- Vamos a intentar recopilar todos los datos posibles de la  baya 20 a la 40 -->
    <h1>Vallas:</h1>
    <?php
    $URL="https://pokeapi.co/api/v2/berry/?offset=20&limit=20";
    $curl=curl_init();
    curl_setopt($curl,CURLOPT_URL,$URL);
    curl_setopt($curl,CURLOPT_RETURNTRANSFER,true);
    $res=curl_exec($curl);
    curl_close($curl);
    $datos=json_decode($res,true);
    $bayas=$datos["results"];
    ?>
    <table class="tabla">
    <?php
    foreach ($bayas as $baya) {
        echo "<tr>";
        $curlBaya=curl_init();
        $bayaURL=$baya["url"];
        curl_setopt($curlBaya,CURLOPT_URL,$bayaURL);
        curl_setopt($curlBaya,CURLOPT_RETURNTRANSFER,true);
        $resBaya=curl_exec($curlBaya);
        curl_close($curlBaya);
        $infBaya=json_decode($resBaya,true);
        echo "<th>".$infBaya["name"]."</th>";
        echo "<th class='imagen'><img src='https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/items/".$infBaya["name"]. "-berry.png'/>";
        // Aqui la columna con los nombres
        $itemBayaURL=$infBaya["item"]["url"];

        echo "</tr>";
    }
    ?>
    </table>


</body>
</html>