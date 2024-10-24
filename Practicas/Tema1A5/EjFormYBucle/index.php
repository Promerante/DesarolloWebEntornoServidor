<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FormulariosYBucles</title>
</head>

<body>
    <!--------------------------------------EJERCICIOS FORMULARIOS + BUCLES WHILE ------------------------------------------ -->
    <h2>
        Ejercicio 1
        Pide al usuario que introduzca números enteros uno a uno y suma todos los números introducidos.
        El proceso termina cuando el usuario introduce un 0. Muestra la suma total al finalizar.<br>
        CONSEJITOS:
        1) Es mas sencillo si hacéis la etiqueta php en el mismo documento del formulario. <br>
        2) Dejad este ejercicio para el final<br>
        IMPORTANTE: Debeis de controlar el caso de introducir un 0 en primera instancia<br>
    </h2>
    <?php
    $suma = 0;
    $numGuardado = "";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $elec = $_POST["form"];
        if ($elec == "7") {
            $arraySum = [];
            $numGuardado = $_POST["guard"];
            $numero = $_POST["numero"];
            echo ($numero);
            if ($numero != 0) {
                $numGuardado .= "$numero,";
            } else {

                $arraySum = explode(",", $numGuardado);
                foreach ($arraySum as $num) {
                    $suma += (int)($num);
                }
                echo "El resultado de la suma de $numGuardado es:<br>
                            $suma";
                $suma = 0;
                $numGuardado = "";
            }
        }
    }
    ?>
    <form action="index.php" method="post">
        <input type="hidden" name="form" value="7">
        <input type="hidden" name="guard" value="<?php echo $numGuardado; ?>">
        Numero<input type="number" name="numero" id="" required>
        <input type="submit" value="Enviar">

    </form>
    <h2>
        Ejercicio 2:Crea un array de 10 números aleatorios entre 1 y 100. Usando un bucle while,
        recorre el array para encontrar y mostrar el número máximo y el número mínimo.<br>
    </h2>
    <?php
    $array2 = array(); //Inicializamos array, notese que no se puede marcar el tamaño en java, como si fueran "dinamicas"
    $max;
    $min;
    $j = 0; //marcador del bucle while
    for ($i = 0; $i < 10; $i++) {
        $array2[$i] = rand(1, 100);
    } //Con esto rellenamos la array
    while ($j < count($array2)) {
        if (empty($max) ||  $max < $array2[$j]) {
            $max = $array2[$j];
        }
        if (empty($min) || $min > $array2[$j]) {
            $min = $array2[$j];
        }
        $j++;
    }
    echo "La array esta hecha, el valor máximo en ella es " . $max . " y el valor mínimo es " . $min . "<br>";
    ?>
    <h2>
        Ejercicio 3:Crea un array con 5 números aleatorios entre 1 y 50. Usando un bucle while,
        invierte el orden de los elementos del array y muestra el array invertido.
    </h2>
    <?php
    $array3 = array();
    $marcador = 0;
    for ($i = 0; $i < 5; $i++) {
        $array3[$i] = rand(1, 50);
    }
    print_r($array3);
    echo "<br>El array con orden invertido<br>";
    while ($marcador < (count($array3) / 2)) { //Con este while invertimos el orden de los elemento de la array
        $temp = $array3[(count($array3) - 1) - $marcador];
        $array3[(count($array3) - 1) - $marcador] = $array3[$marcador];
        $array3[$marcador] = $temp;
        $marcador++;
    }
    print_r($array3);
    ?>
    <h2>
        Ejercicio 4:Pide al usuario que introduzca una palabra.
        Usando un bucle while, recorre la palabra y cuenta cuántas vocales tiene. Muestra el número total de vocales al final.
        RECOMENDACIÓN: Usar "strtolower()" para pasar la palabra a minúsucula entera y "strlen()" para contar la longitud de un string
    </h2>
    <form action="index.php" method="post">
        <input type="hidden" name="form" value="1">
        <textarea name="palabra" type="text"></textarea>
        <input type="submit" value="Enviar" />
    </form>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $value = $_POST['form'];
        if ($value == 1) { //Aqui empieza el boton del ejercicio 4
            $palabra = strtolower($_POST['palabra']);
            $marcador = 0;
            $vocales = 0;
            while ($marcador < strlen($palabra)) {
                if ($palabra[$marcador] == 'a' || $palabra[$marcador] == 'e' || $palabra[$marcador] == 'i' || $palabra[$marcador] == 'o' || $palabra[$marcador] == 'u') {
                    $vocales++;
                }
                $marcador++;
            }
            echo "La palabra " . $palabra . " tiene " . $vocales . " vocales.<br>";
        }
        if ($value == 1) {
            $palabra2 = strtolower($_POST['palabra']);
            $marcador = 0;
            $marcador2 = 0;
            $vocalesCont = 0;
            $vocales = "aeiou";
            while ($marcador < strlen($palabra2)) {
                while ($marcador2 < strlen($vocales)) {
                    if ($palabra2[$marcador] == $vocales[$marcador2]) {
                        $vocalesCont++;
                    }
                    $marcador2++;
                }
                $marcador++;
                $marcador2 = 0;
            }
            echo "La palabra " . $palabra2 . " tiene " . $vocalesCont . " vocales. Por el metodo 2";
        }
    }

    ?>
    <h2>
        Ejercicio 5:Pide al usuario que introduzca un número entero positivo.
        Usando un bucle while, calcula y muestra la suma de los dígitos de ese número.
        Por ejemplo, si el número es 123, la suma será 6 (1 + 2 + 3).
    </h2>
    <form action="index.php" method="post">
        <input type="hidden" name="form" value="2">
        <input name="numero" type="number"></input>
        <input type="submit" value="Enviar" />
    </form>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $value = $_POST['form'];
        if ($value == 2) {
            $numero = $_POST['numero'];
            $marcador = 0;
            $total = 0;
            while ($marcador < strlen($numero)) {
                $total += $numero[$marcador];
                $marcador++;
            }
            echo "El numero " . $numero . " tiene como suma total de sus digitos: " . $total;
            //Otra forma de hacerlo.
            $total2 = 0;
            while ($numero > 0) {
                $total2 += $numero % 10;
                $numero /= 10;
            }
            echo "<br>La forma que pide el profesor da de total " . $total2;
        }
    }
    ?>
    <h2>
        Ejercicio 6:Crea un array vacío. Usando un bucle while, llena el array con los 10 primeros números pares (empezando desde el 2).
        Muestra el array al final.
    </h2>
    <?php
    $array6 = array();
    $temp = 1;
    while ($temp <= 10) {
        array_push($array6, $temp * 2);
        $temp++;
    }
    print_r($array6);
    ?>
    <h2>
        Ejercicio 7:Pide al usuario que introduzca un número N (menor o igual a 20).
        Usando un bucle while, genera y muestra los primeros N números de la serie de Fibonacci.
        Si no sabéis qué es esta serie, buscad por internet o preguntar a Ale.
    </h2>
    <form action="index.php" method="post">
        <input type="hidden" name="form" value="3">
        <input name="numero" type="number"></input>
        <input type="submit" value="Enviar" />
    </form>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $value = $_POST['form'];
        if ($value == 3) {
            $n = $_POST['numero'];
            if ($n > 20) {
                echo "Pon un numero menor a 20";
            } else {
                $marcador = 1;
                $temp = 0;
                $temp2 = 1;
                $temp3 = 0;
                echo $temp . " ";
                while ($marcador < $n) {
                    $temp3 = $temp2 + $temp;
                    echo $temp3 . " ";
                    $temp = $temp2;
                    $temp2 = $temp3;
                    $marcador++;
                }
            }
        }
    }
    ?>
    <h2>
        Ejercicio 8:Pide al usuario que introduzca dos números enteros que representen un rango.
        Usando un bucle while, muestra todos los números dentro de ese rango que sean divisibles entre 2,3,5 y de todos a la vez.
    </h2>
    <form action="index.php" method="post">
        <input type="hidden" name="form" value="4">
        Numero1:<input name="numero1" type="number"></input>
        Numero2:<input name="numero2" type="number"></input>
        <input type="submit" value="Enviar" />
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            function div2($num){
                if ($num % 2 == 0) {
                    return true;
                }
                return false;
            }
            function div3($num){
                if ($num % 3 == 0) {
                    return true;
                }
                return false;
            }
            function div5($num){
                if ($num % 5 == 0) {
                    return true;
                }
                return false;
            }

            $value = $_POST['form'];
            if ($value == 4) {
                $num1 = $_POST['numero1'];
                $num2 = $_POST['numero2'];
                if ($num1 > $num2) {
                    $temp = $num2;
                    $num2 = $num1;
                    $num1 = $temp;
                } //OJO: entonces num2 siempre sera el mayor y num1 el menor
                $j=$num1;
                $array2=[];
                $array3=[];
                $array5=[];
                $array235=[];
                while ($j <= $num2) {
                    if(div2($j)){
                        array_push($array2,$j);
                    }
                    if(div3($j)){
                        array_push($array3,$j);
                    }
                    if(div5($j)){
                        array_push($array5,$j);
                    }
                    if(div2($j)&&div3($j)&&div5($j)){
                        array_push($array235,$j);
                    }
                    $j++;
                }
                echo "<br>Dado el número $num1 y el $num2:<br>";
                echo "Divisible entre 2: ";
                print_r($array2);
                echo"<br>";
                echo "Divisible entre 3: ";
                print_r($array3);
                echo "<br>";
                echo "Divisible entre 5: ";
                print_r($array5);
                echo"<br>";
                echo "Divisible entre 2,3 y 5: ";
                print_r($array235);
                echo"<br>";
            }
        }
        ?>
    </form>
    <h2>
        Ejercicio 9: Pide al usuario que introduzca dos números enteros que representen un rango.
        Usando un bucle while y la función esPrimo(), suma y muestra todos los números primos que se encuentren en ese rango.
    </h2>
    <form action="index.php" method="post">
        <input type="hidden" name="form" value="5">
        Numero1:<input name="numero1" type="number"></input>
        Numero2:<input name="numero2" type="number"></input>
        <input type="submit" value="Enviar" />
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $value = $_POST['form'];
            if ($value == 5) {
                $num1 = $_POST['numero1'];
                $num2 = $_POST['numero2'];
                $arrayPrimo = array();
                $arraySumPrimo = array();
                if ($num1 > $num2) {
                    $temp = $num2;
                    $num2 = $num1;
                    $num1 = $temp;
                } //OJO: entonces num2 siempre sera el mayor y num1 el menor
                while ($num1 <= $num2) {
                    $esPrimo = true;
                    for ($a = 2; $a < $num1; $a++) {
                        if ($num1 % $a == 0) {
                            $esPrimo = false;
                        }
                    }
                    if ($esPrimo) {
                        array_push($arrayPrimo, $num1);
                        $sumatoria = 0;
                        for ($b = 0; $b < count($arrayPrimo); $b++) {
                            $sumatoria += $arrayPrimo[$b];
                        }
                        array_push($arraySumPrimo, $sumatoria);
                    }
                    $num1++;
                }
                echo "<br>";
                print_r($arrayPrimo);
                echo "<br>";
                print_r($arraySumPrimo);
            }
        }
        ?>
    </form>
    <h2>
        Ejercicio 10:Pide al usuario que introduzca una palabra. Usando un bucle while, verifica si la palabra es un palíndromo (se lee igual al derecho que al revés).
        Muestra un mensaje indicando si es o no un palíndromo.
    </h2>
    <form action="index.php" method="post">
        <input type="hidden" name="form" value="6">
        Palabra:<input name="palabra" type="text"></input>
        <input type="submit" value="Enviar" />
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $value = $_POST['form'];
            if ($value == 6) {
                $palabra = $_POST['palabra'];
                $palindromo = true;
                $arrayPalabra = str_split($palabra);
                $cont = 0;
                while ($cont < count($arrayPalabra) / 2) {
                    if ($arrayPalabra[$cont] != $arrayPalabra[(count($arrayPalabra) - 1 - $cont)]) {
                        $palindromo = false;
                        break;
                    }
                    $cont++;
                }
                if ($palindromo) {
                    echo "<br>La palabra " . $palabra . " es un palindromo<br>";
                } else {
                    echo "<br>La palabra " . $palabra . " no es un palindromo<br>";
                }
            }
        }
        ?>
    </form>
</body>

</html>