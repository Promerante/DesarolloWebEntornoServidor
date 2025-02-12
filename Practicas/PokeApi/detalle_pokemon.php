<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mas detalle</title>
    <?php
    error_reporting(E_ALL);
    ini_set("display_errors",true); 
    ?>
</head>
<body>
    <?php
    $input= $_GET['name'];
    $apiURL="https://pokeapi.co/api/v2/pokemon/$input";
    $curl=curl_init();
    curl_setopt($curl,CURLOPT_URL,$apiURL);
    curl_setopt($curl,CURLOPT_RETURNTRANSFER,true);
    $res=curl_exec($curl);
    curl_close($curl);
    $datos=json_decode($res,true);
    echo "<h1>".ucfirst($datos["name"])."</h1>";
    echo "<p>Altura:".ucfirst($datos["height"])."cm</p>";
    echo "<p>Peso:".ucfirst($datos["weight"])."mg</p>";
    echo "<img src='".$datos["sprites"]["front_default"]."'/>";

    ?>
    
</body>
</html>