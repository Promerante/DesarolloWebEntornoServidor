<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calorias</title>
</head>

<body>
    <?php
    error_reporting(E_ALL);
    ini_set("display_errors", 1);
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if ($_POST["ejercicio"] == "1") {
            if (!empty($_POST["edad"]) || $_POST["edad"] == 0) {
                $tempEdad = $_POST["edad"];
                if (filter_var($tempEdad, FILTER_VALIDATE_INT)) {
                    if ($tempEdad >= 0) {//0 LO ACEPTA
                        $edad = $tempEdad;
                    } else {
                        $errorEdad = "Sigues en el vientre de tu madre?";
                    }
                } else {
                    $errorEdad = "2+2 te sale decimales?";
                }
            } else {
                $errorEdad = "Este campo es obligatorio.";
            }

            if (!empty($_POST["peso"]) || $_POST["peso"] == 0) {
                $tempPeso = $_POST["peso"];
                if (filter_var($tempPeso, FILTER_VALIDATE_FLOAT)) {
                    if ($tempPeso >= 0) {
                        $peso = $tempPeso;
                    } else {
                        $errorPeso = "Peso negativo...Eres Mou o que?";
                    }
                } else {
                    $errorPeso = "2+2 te sale decimales?(no es un numero)";
                }
            } else {
                $errorPeso = "Este campo es obligatorio.";
            }

            if (!empty($_POST["altura"]) || $_POST["altura"] == 0) {
                $tempAltura = $_POST["altura"];
                if (filter_var($tempAltura, FILTER_VALIDATE_INT)) {
                    if ($tempAltura >= 0 && $tempAltura <= 220) {
                        $altura = $tempAltura;
                    } else {
                        $errorAltura = "Que tal estar bajo el piso o ser un puto tronco(altura fuera del intervalo)";
                    }
                } else {
                    $errorAltura = "Tu numero favorito es papaya?";
                }
            } else {
                $errorAltura = "Este campo es obligatorio.";
            }

            if (!empty($_POST["genero"])) { //ESTO EN TEORIA ME CONTROLA SI PASA DE VALOR "",por lo que ya deberia escoger
                $tempGenero = $_POST["genero"];
                if ($tempGenero == "hombre" || $tempGenero == "mujer") {
                    $genero = $tempGenero;
                } else {
                    $errorGenero = "COMO NARICES HAS LLEGADO AQUI HACKER??Eso o eres un frontend muy tonto";
                }
            } else {
                $errorGenero = "Este campo es obligatorio.";
            }

            if (!empty($_POST["actividad"])) { //ESTO EN TEORIA ME CONTROLA SI PASA DE VALOR "",por lo que ya deberia escoger
                $tempAct = $_POST["actividad"];
                $actividades = ["Sedentario", "Ligero", "Moderado", "Activo"];
                if (in_array($tempAct, $actividades)) {
                    $actividad = $tempAct;
                } else {
                    $errorActividad = "COMO NARICES HAS LLEGADO AQUI HACKER??Eso o eres un frontend muy tonto";
                }
            } else {
                $errorActividad = "Este campo es obligatorio.";
            }
        }
    }
    ?>
    <form action="" method="post">
        <input type="hidden" name="ejercicio" value="1">
        <span>Edad:</span><input type="text" name="edad" id="">
        <?php
        if (isset($errorEdad)) echo "<b style='color:red'>$errorEdad</b>"
        ?>
        <br>
        <span>Peso(kg):</span><input type="text" name="peso" id="">
        <?php
        if (isset($errorPeso)) echo "<b style='color:red'>$errorPeso</b>"
        ?>
        <br>
        <span>Altura(cm):</span><input type="text" name="altura" id="">
        <?php
        if (isset($errorAltura)) echo "<b style='color:red'>$errorAltura</b>"
        ?>
        <br>
        <span>Genero:</span><select name="genero" id="">
            <option value="" disabled selected></option>
            <option value="hombre">Hombre</option>
            <option value="mujer">Mujer</option>
        </select>
        <?php
        if (isset($errorGenero)) echo "<b style='color:red'>$errorGenero</b>"
        ?>
        <br>
        <span>Nivel de actividad:</span><select name="actividad" id="">
            <option value="" disabled selected></option>
            <option value="Sedentario">Sedentario</option>
            <option value="Ligero">Ligero</option>
            <option value="Moderado">Moderado</option>
            <option value="Activo">Activo</option>
        </select>
        <?php
        if (isset($errorActividad)) echo "<b style='color:red'>$errorActividad</b>"
        ?>
        <br>
        <input type="submit" value="Enviar">
    </form>

    <?php
    if(isset($edad,$peso,$altura,$genero,$actividad)){
        
    }
    ?>
</body>

</html>