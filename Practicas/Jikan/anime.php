<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jikan</title>
    <?php
    error_reporting(E_ALL);
    ini_set("display_errors", 1);
    ?>
</head>

<body>


    <?php
    $apiURL = "https://api.jikan.moe/v4/top/anime";
    $curl = curl_init();
    // Iniciar una sesion curl para obtener una estructura de memoria
    // para almacenar la informacion de la solicitud y la respuesta
    curl_setopt($curl, CURLOPT_URL, $apiURL);
    // Establecer la URL a consultar
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    // Devolver el resultado en lugar de imprimirlo en pantalla
    $res = curl_exec($curl);
    // Ejecutar la sesión
    curl_close($curl);
    $res = json_decode($res, true);

    $animes=$res["data"];

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
        <tbody>
            <?php
    foreach($animes as $anime){?>
<tr>
    <td><?= $anime["rank"]?></td>
    <td><a href="infoanime.php?id=<?=$anime["mal_id"]?>"><?=$anime["title"]?></a></td>
    <td><?=$anime["score"]?></td>
    <td><img src="<?=$anime["images"]["jpg"]["image_url"]?>" alt="Imagen de anime" width="100px"/></td>
    
</tr>
    <?php }?>
        </tbody>
    </table>
</body>

</html>