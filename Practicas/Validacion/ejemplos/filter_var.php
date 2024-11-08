<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Validacion con filtros</title>
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
    error_reporting(E_ALL);
    ini_set("display_errors", 1);
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $entero = $_POST["numero"];
        if (filter_var($entero, FILTER_VALIDATE_EMAIL) == false) {
            $res_int = "<span class='error'>Por esto tus padres reciben una paguita</span>";
        } else {
            $res_int = "<span class='acierto'>Bien, sabes lo que es un numerin</span>";
        }
    }
    ?>
    <form action="" method="post">
        <label for="numero">Ingrese un número email:</label>
        <input type="text" name="numero" id="">
        <input type="submit" value="ENVIAR">
        <br><br>
        <?php echo $res_int ?>
    </form>
    <?php

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $entero = $_POST["numero"];
        if (filter_var($entero, FILTER_SANITIZE_URL) == false) {
            $res_int = "<span class='error'>Por esto tus padres reciben una paguita</span>";
        } else {
            $res_int = "<span class='acierto'>Bien, sabes lo que es un numerin</span>";
        }
    }
    ?>
    <form action="" method="post">
        <label for="numero">Ingrese un número url:</label>
        <input type="text" name="numero" id="">
        <input type="submit" value="ENVIAR">
        <br><br>
        <?php echo $res_int ?>
    </form>
    <?php

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $entero = $_POST["numero"];
        if (filter_var($entero, FILTER_VALIDATE_BOOLEAN) == false) {
            $res_int = "<span class='error'>Por esto tus padres reciben una paguita</span>";
        } else {
            $res_int = "<span class='acierto'>Bien, sabes lo que es un numerin</span>";
        }
    }
    ?>
    <form action="" method="post">
        <label for="numero">Ingrese un número booleano:</label>
        <input type="text" name="numero" id="">
        <input type="submit" value="ENVIAR">
        <br><br>
        <?php echo $res_int ?>
    </form>
    <?php

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $entero = $_POST["numero"];
        if (filter_var($entero, FILTER_VALIDATE_DOMAIN) == false) {
            $res_int = "<span class='error'>Por esto tus padres reciben una paguita</span>";
        } else {
            $res_int = "<span class='acierto'>Bien, sabes lo que es un numerin</span>";
        }
    }
    ?>
    <form action="" method="post">
        <label for="numero">Ingrese un número entero:</label>
        <input type="text" name="numero" id="">
        <input type="submit" value="ENVIAR">
        <br><br>
        <?php echo $res_int ?>
    </form>
    <?php

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $entero = $_POST["numero"];
        if (filter_var($entero, FILTER_VALIDATE_IP) == false) {
            $res_int = "<span class='error'>Por esto tus padres reciben una paguita</span>";
        } else {
            $res_int = "<span class='acierto'>Bien, sabes lo que es un numerin</span>";
        }
    }
    ?>
    <form action="" method="post">
        <label for="numero">Ingrese un número entero:</label>
        <input type="text" name="numero" id="">
        <input type="submit" value="ENVIAR">
        <br><br>
        <?php echo $res_int ?>
    </form>
    <?php

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $entero = $_POST["numero"];
        if (filter_var($entero, FILTER_VALIDATE_MAC) == false) {
            $res_int = "<span class='error'>Por esto tus padres reciben una paguita</span>";
        } else {
            $res_int = "<span class='acierto'>Bien, sabes lo que es un numerin</span>";
        }
    }
    ?>
    <form action="" method="post">
        <label for="numero">Ingrese un número entero:</label>
        <input type="text" name="numero" id="">
        <input type="submit" value="ENVIAR">
        <br><br>
        <?php echo $res_int ?>
    </form>
</body>

</html>