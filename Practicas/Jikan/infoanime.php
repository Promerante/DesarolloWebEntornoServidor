<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php
    error_reporting(E_ALL);
    ini_set("display_errors", 1);

    ?>
</head>

<body>
    <?php
    $id = $_GET["id"];
    $apiUrl = "https://api.jikan.moe/v4/anime/$id/full";
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $apiUrl);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $res = curl_exec($curl);
    curl_close($curl);
    $res = json_decode($res, true);
    $anime = $res["data"];
    ?>
    <h1>
        <?= $anime["title_japanese"] ?>
    </h1>
    <h1><?= $anime["score"] ?></h1>

    <h1><?= $anime["rank"] ?></h1>
    <h1><?= $anime["year"] ?></h1>
    <img src="<?= $anime["images"]["jpg"]["image_url"] ?>" alt="weaboo" width="200px">
    <h3>Estudios
        <p>
            <?php
            $estudios = $anime["studios"];
            foreach ($estudios as $estudio) {
                echo "<p>Nombre del estudio: " . $estudio["name"] . " URL del estudio:  " . $estudio["url"] . "</p>";
            }
            ?>
        </p>
    </h3>
    <h3>Sinopsis</h3>
    <p><?= $anime["synopsis"] ?></p>
    <h3>Trailer</h3>
    <iframe src="<?= $anime["trailer"]["embed_url"] ?>"></iframe>
    <h3>Relacionados</h3>
    <p>
        <?php 
        foreach($anime["relations"] as $relacionado){
            $entradas=$relacionado["entry"];
            foreach($entradas as $caracteristicas){
            //     if($caracteristicas["type"]=="anime")
            // }
            if($caracteristicas["type"]=="anime"){
                echo $caracteristicas["mal_id"];
                echo $caracteristicas["name"];

                echo "<br>";
            } 
            }
        }
        ?>
    </p>

</body>

</html>