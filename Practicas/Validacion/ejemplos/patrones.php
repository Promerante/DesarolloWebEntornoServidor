<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patrones PHP</title>
</head>

<body>
    <?php
    /*PATRONES COMUNES:
        \d: digito (0 a 9)
        \s: espacio en blanco
        \w: caracter alfanumerico (digito o letra)
        +: uno o mas
        *: cero o mas
        ^: comienza con
        $: termina con
        {}: numero de caracteres del mismo
        []: define un conjunto de caracteres aceptables
        (?=.): es una expresion de busqueda anticipada positiva que verifica que la condicion dentro de los parentesis
        este presente en algun lugar de la cadena 
    */
    $cadena = "abc123";
    if (preg_match("/\d+/", $cadena)) {
        echo "la cadena tiene numeros<br>";
    }
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        //Ejercicio 1
        if ($_POST["form"] == "ej1") {
            $telf = $_POST["telefono"];
            if (preg_match("/^\d{9}$/", $telf)) {
                echo "Telefono valido<br>";
            } else {
                echo "Telefono NO valido <br>";
            }
        }
        //Ejercicio 2
        if ($_POST["form"] == "ej2") {
            $cp = $_POST["cp"];
            if (preg_match("/^[1-5]\d{4}$/", $cp)) {
                echo "CP Valido <br>";
            } else {
                echo "CP NO Valido <br>";
            }
        }
        //Ejercicio 3
        /*
        Valida el nombre de usuario para que tenga entre 3 a 15 caracteres,puede contener letras,numeros,guiones y guiones bajos pero no otros caracteres especiales
        */
        if ($_POST["form"] == "ej3") {
            $usuario = $_POST["usuario"];
            if (preg_match("/^[a-zA-Z0-9_-]{3,15}$/", $usuario)) {
                echo "Usuario Valido <br>";
            } else {
                echo "Usuario NO Valido <br>";
            }
        }
        //Ejercicio 4
        /*

        */
        if ($_POST["form"] == "ej4") {
            $correo = $_POST["correo"];
            if (preg_match("/^[\w.-]+@[a-zA-Z\d.-]+\.[a-zA-Z]{2,6}$/", $correo)) {
                echo "Correo Valido <br>";
            } else {
                echo "Correo NO Valido <br>";
            }
        }
        //Ejercicio 5
        /*
        Haz que una contraseña tenga almenos 8 caracteres una mayus una minus, un numero y un caracter especial
        */
        if ($_POST["form"] == "ej5") {
            $contraseña = $_POST["contraseña"];
            if (preg_match("/(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[@$!*?&])[a-zA-Z\d@$!*?&]{8,}$/", $contraseña)) {
                echo "Contraseña Valido <br>";
            } else {
                echo "Contraseña NO Valido <br>";
            }
        }
    }
    ?>
    <form action="" method="post">
        <input type="hidden" value="ej1" name="form">
        <input type="text" name="telefono" id="">
        <input type="submit" value="Enviar">
    </form>
    <h1>Ejercicio2</h1>
    <form action="" method="post">
        <input type="hidden" value="ej2" name="form">
        <input type="text" name="cp" id="">
        <input type="submit" value="Enviar">
    </form>
    <h1>Ejercicio3</h1>
    <form action="" method="post">
        <input type="hidden" value="ej3" name="form">
        <input type="text" name="usuario" id="">
        <input type="submit" value="Enviar">
    </form>
    <h1>Ejercicio4</h1>
    <form action="" method="post">
        <input type="hidden" value="ej4" name="form">
        <input type="text" name="correo" id="">
        <input type="submit" value="Enviar">
    </form>
    <h1>Ejercicio5</h1>
    <form action="" method="post">
        <input type="hidden" value="ej5" name="form">
        <input type="text" name="contraseña" id="">
        <input type="submit" value="Enviar">
    </form>
</body>

</html>