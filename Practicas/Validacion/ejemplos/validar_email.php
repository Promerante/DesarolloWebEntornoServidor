<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Validar email</title>
    <style>
        .error {
            color: red;
        }

        .acierto {
            color: green;
        }
    </style>
</head>

<body>
    <?php
    require("funciones.php");
    error_reporting(E_ALL);
    ini_set("display_errors", 1);
    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        $temp_precio = $_GET["precio"];
        $temp_precio = filter_var($temp_precio, FILTER_SANITIZE_NUMBER_FLOAT,FILTER_FLAG_ALLOW_FRACTION);
        if (isset($_GET["descuento"])) $temp_descuento = $_GET["descuento"];
        else $temp_descuento = "";
        if ($temp_precio == "") {
            $err_precio = "El precio es obligatorio";
        } else {
            if (filter_var($temp_precio, FILTER_VALIDATE_FLOAT) == false) {
                $err_precio = "Mete un numero decimal";
            } else {
                if ($temp_precio <= 0) {
                    $err_precio = "El precio no puede ser menor o igual a 0";
                } else {
                    $precio = $temp_precio;
                }
            }
        }
        if ($temp_descuento = "") {
            $err_descuento = "Elige un descuento";
        } elseif (filter_var($temp_descuento, FILTER_VALIDATE_INT) == false) {
            $err_descuento = "Elige un descuento valido";
        } else {
            $descuento_valido = [10, 20, 30];
            if (!in_array($temp_descuento, $descuento_valido)) {
                $err_descuento = "El descuento no esta en la lista,mendrugo";
            } else {
            }
        }
    }
    ?>

    <form action="" method="get">
        <label for="precioLabel">Introduzca un precio:</label>
        <input type="text" name="precio">
        <?php if (isset($err_precio)) echo $err_precio; ?>
        <label for="precio">Elige un descuento:</label>
        <select name="descuento" id="">
            <option disabled selected hidden>-----ELEGIR DISCOUNT------</option>
            <option value="10">10%</option>
            <option value="20">20%</option>
            <option value="30">30%</option>
        </select>
        <?php error_reporting(E_ALL);
        ini_set("display_errors", 1);
        if (isset($err_descuento)) echo $err_descuento; ?>
        <input type="submit" value="Enviar">
        <br><br>

    </form>
    <?php
    $descuento = $_GET["descuento"];
    error_reporting(E_ALL);
    ini_set("display_errors", 1);
    if (isset($descuento) && isset($precio)) {
        $precio_final = calcularDescuento($precio, $descuento);
        echo "<h3 class='acierto'>El producto vale al final: $precio_final</h3>";
    }
    ?>
</body>

</html>