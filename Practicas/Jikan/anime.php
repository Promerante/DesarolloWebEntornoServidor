<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jikan</title>
    <?php
error_reporting(E_ALL);
ini_set("display_errors",1);
?>
</head>
<body>


<?php
$apiURL="https://api.jikan.moe/v4/top/anime";
$curl=curl_init();
// Iniciar una sesion curl para obtener una estructura de memoria
// para almacenar la informacion de la solicitud y la respuesta
curl_setopt($curl,CURLOPT_URL,$apiURL);
// Establecer la URL a consultar
curl_setopt($curl,CURLOPT_RETURNTRANSFER,true);
// Devolver el resultado en lugar de imprimirlo en pantalla
$res=curl_exec($curl);
// Ejecutar la sesión
curl_close($curl);
$res=json_decode($res,true);
var_dump($res);

?>
    <table>
        <thead>
            <tr>
                <th>Posicion</th>
                <th>Titulo</th>
                <th>Nota</th>
                <th>Imagen</th>
            </tr>
        </thead>
    </table>
</body>
</html>