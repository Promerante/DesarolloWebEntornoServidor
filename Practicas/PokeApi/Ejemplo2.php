<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejemplo 2</title>
    <?php
    error_reporting(E_ALL);
    ini_set("display_errors",1);
    ?>
</head>
<body>
<!-- Buscame pokemons que sean del mismo grupo de huevo al 815,peso mas de 50 tipo agua-->
 <h1> Primero obtenemos los grupos de huevos que tiene el pokemon</h1>
 <?php 
 $deseado=$_GET["egg_groups"];
 $apiURL="https://pokeapi.co/api/v2/pokemon-species/815/";//Enlace a la api del pokemon buscado
 $curl=curl_init();
 curl_setopt($curl,CURLOPT_URL,$apiURL);
 curl_setopt($curl,CURLOPT_RETURNTRANSFER,true);
 $res=curl_exec($curl);
 curl_close($curl);
 $pokemon=json_decode($res,true);
 $grupoHuevos=$pokemon["egg_groups"];
 var_dump($grupoHuevos);

 ?>
</body>
</html>