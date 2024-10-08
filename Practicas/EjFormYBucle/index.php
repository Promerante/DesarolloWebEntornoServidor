<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FormulariosYBucles</title>
</head>

<body>
    <!--------------------------------------EJERCICIOS FORMULARIOS + BUCLES WHILE ------------------------------------------ -->
    <h2>Ejercicio 1</h2>
    Pide al usuario que introduzca números enteros uno a uno y suma todos los números introducidos.
    El proceso termina cuando el usuario introduce un 0. Muestra la suma total al finalizar.<br>
    CONSEJITOS: 1) Es mas sencillo si hacéis la etiqueta php en el mismo documento del formulario. 2) Dejad este ejercicio para el final<br>
    
    IMPORTANTE: Debeis de controlar el caso de introducir un 0 en primera instancia<br>

    <h2>
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
            echo "La palabra " . $palabra . " tiene " . $vocales . " vocales.";
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
        Usando un bucle while, muestra todos los números dentro de ese rango que sean divisibles entre 5.
    </h2>
    <form action="index.php" method="post">
        <input type="hidden" name="form" value="4">
        Numero1:<input name="numero1" type="number"></input>
        Numero2:<input name="numero2" type="number"></input>
        <input type="submit" value="Enviar" />
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $value = $_POST['form'];
            if ($value == 4) {
                $num1=$_POST['numero1'];
                $num2=$_POST['numero2'];
                if($num1<$num2){
                    echo "Introduce los numeros en el orden correcto";
                }
                else{
                    $j=$num1;
                    while($j<=$num2){
                        IF($j%5==0){
                            echo $j." ";
                        }
                        $j++;
                    }
                }
            }
        }
        ?>
    </form>

    <h2>Ejercicio 9</h2>
    Pide al usuario que introduzca dos números enteros que representen un rango.
    Usando un bucle while y la función esPrimo(), suma y muestra todos los números primos que se encuentren en ese rango.
    
     <h2>Ejercicio 10</h2>
    Pide al usuario que introduzca una palabra. Usando un bucle while, verifica si la palabra es un palíndromo (se lee igual al derecho que al revés).
    Muestra un mensaje indicando si es o no un palíndromo.

</body>

</html>