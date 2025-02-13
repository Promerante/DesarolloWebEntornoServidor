<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Practica 2</title>
</head>

<body>

    <?php
    error_reporting(E_ALL);
    ini_set("display_errors", 1);
    /*IMPORTANTE: todos los datos numéricos a introducir(lado,radio base y altura.) todos tienen el mismo proceso de validación.
    numeros reales positivos, por lo que podemos validarlos y sanitizarlos de la misma manera.
    */
    $arrayDatos = [];
    /*Aqui introduciremos los datos a estudiar.MARCADOR IMPORTANTE:
        0-LADO
        1-RADIO
        2-BASE
        3-ALTURA
    */
    $arrayErrores = [];
    //En esta nueva array guardaremos sus respectivos errores;
    $arrayDatosValidos = [];
    //Y en esta los ya totalmente válidos
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if ($_POST["form"] == 1) { //EJERCICIO 1
            //NOMBRE:
            if (!empty($_POST["nombre"])) { //Por si el espacio esta vaciío,especialmente útil al principio de la página
                $temp_nombre = htmlspecialchars($_POST['nombre'], ENT_QUOTES, "UTF-8"); //Controlo inyecciones de código
                $temp_nombre = trim($temp_nombre); //Quita espacios al inicio y al final
                $temp_nombre = preg_replace("/\s+/", " ", $temp_nombre); //Cambio si hay mas de un espacio en blanco en medio por solo uno
                $nombre = $temp_nombre;
            } else { //SIhace falta"preg_match("/^[a-zA-ZáéíóúÁÉÍÓÚ]{3,}$/",$temp_nombre)"
                $errNombre = "Campo obligatorio";
            }
            if (!empty($_POST["lado"]) || $_POST["lado"] == 0) $arrayDatos[0] = $_POST["lado"];
            else $arrayErrores[0] = "Campo obligatorio";
            if (!empty($_POST["radio"]) || $_POST["radio"] == 0) $arrayDatos[1] = $_POST["radio"];
            else $arrayErrores[1] = "Campo obligatorio";
            if (!empty($_POST["base"]) || $_POST["base"] == 0) $arrayDatos[2] = $_POST["base"];
            else $arrayErrores[2] = "Campo obligatorio";
            if (!empty($_POST["altura"]) || $_POST["radio"] == 0) $arrayDatos[3] = $_POST["altura"];
            else $arrayErrores[3] = "Campo obligatorio";
            //Entra en la array siempre que no esten vacia(incluido 0)
            foreach ($arrayDatos as $dato => $valor) {
                if (!filter_var($arrayDatos[$dato], FILTER_VALIDATE_FLOAT)) {
                    $arrayErrores[$dato] = "No has introducido un número";
                } elseif ($arrayDatos[$dato] < 0) {
                    $arrayErrores[$dato] = "No se permite número negativo";
                } else {
                    $arrayDatosValidos[$dato] = $arrayDatos[$dato];
                }
            }
        } //Hasta aqui los números
        $arrayFiguras = ["cuadrado", "triangulo", "circulo"];
        if (empty($_POST["figura"])) {
            $temp_figura = $_POST["figura"];
            if (in_array($temp_figura, $arrayFiguras)) {
                $figura = $temp_figura;
            } else {
                $errFigura = "Error interno(cuidado frontendo o hacker)";
            }
        } else {
            $errFigura = "Campo obligatorio";
        }
        //Y ahora por ultimo para acoplar todas las partes
        $aceptado = [];
        if (isset($nombre) && isset($arrayDatos[0]) && isset($figura)) {
            //CASO CUADRADO
            $booleanCuadrado = true;
        } else if (isset($nombre) && isset($arrayDatosValidos[1]) && isset($figura)) {
            //CASO CIRCULO
            $booleanCirculo = true;
        } else if (isset($nombre) && isset($figura) && isset($arrayDatosValidos[1]) && isset($arrayDatosValidos[3])) {
            //CASO TRIANGULO
            $booleanTriangulo = true;
        }
    }
    ?>


    <h1>Ejercicio 1</h1>
    <form action="" method="post">
        <input type="hidden" name="form" value="1">
        <span>Figura</span><select name="figura">
            <option value="" disabled selected></option>
            <option value="cuadrado">Cuadrado</option>
            <option value="triangulo">Triangulo</option>
            <option value="circulo">Circulo</option>
        </select>
        <?php
        if (isset($errFigura)) echo "<span style='color:red'>*$errFigura</span>"
        ?>
        <br>
        <span>Tu nombre:</span><input type="text" name="nombre">
        <?php
        if (isset($errNombre)) echo "<span style='color:red'>*$errNombre</span>"
        ?>
        <br>
        <span>Lado:</span><input type="text" name="lado">
        <?php
        if (isset($arrayErrores[0]) && !(isset($booleanCuadrado) || isset($booleanCirculo) || isset($booleanTriangulo))) echo "<span style='color:red'>*$arrayErrores[0]</span>"
        ?>
        <br>
        <span>Radio:</span><input type="text" name="radio">
        <?php
        if (isset($arrayErrores[1]) && !(isset($booleanCuadrado) || isset($booleanCirculo) || isset($booleanTriangulo))) echo "<span style='color:red'>*$arrayErrores[1]</span>"
        ?>
        <br>
        <span>Base(triangulo):</span><input type="text" name="base">
        <?php
        if (isset($arrayErrores[2]) && !(isset($booleanCuadrado) || isset($booleanCirculo) || isset($booleanTriangulo))) echo "<span style='color:red'>*$arrayErrores[2]</span>"
        ?>
        <br>
        <span>Altura(triangulo):</span><input type="text" name="altura">
        <?php
        if (isset($arrayErrores[3]) && !(isset($booleanCuadrado) || isset($booleanCirculo) || isset($booleanTriangulo))) echo "<span style='color:red'>*$arrayErrores[3]</span>"
        ?>
        <br>
        <input type="submit" value="Enviar">
    </form>

    <?php
    if (isset($nombre) && isset($booleanCirculo, $booleanCuadrado, $booleanTriangulo)) echo "<h3 style='color:green'>Tu nombre es $nombre y:</h3><br>";
    if (isset($booleanCuadrado)) {
        $area = $arrayDatosValidos[0] * $arrayDatosValidos[0];
        echo "<h3 style='color:green'>El area de tu cuadrado es:$area</h3>";
    }
    if (isset($booleanCirculo)) {
        $area = 3.14 * $arrayDatosValidos[1];
        echo "<h3 style='color:green'>El area de tu circulo es:$area</h3>";
    }
    if (isset($booleanCirculo)) {
        $area = $arrayDatosValidos[2] * $arrayDatosValidos[3] / 2;
        echo "<h3 style='color:green'>El area de tu triangulo es:$area</h3>";
    }


    ?>


</body>

</html>