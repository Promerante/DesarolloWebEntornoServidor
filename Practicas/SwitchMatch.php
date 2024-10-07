<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <!--<li> Crea un script que utilice una variable con un número del 1 al 7 generado de forma aleatoria para representar los días de la semana (1 para el lunes, 2 para el martes..)</li>
                
    <li> Crea un script donde una variable contenga una calificación de un examen generada de forma aleatoria. Mostrar un "Sobresaliente" si la nota es 10; si es 8 o 9, "Notable"; si es 6 o 7, "Bien"; si es 5, "Aprobao"; si es menor a 5, "Suspenso"</li>
                
    <li> Crea un script donde se elija una operación matemática básica (suma, resta, multiplicación o división). Realiza la opción matemática indicada a través de una variable. NOTA: Debe de haber una variable para elegir la operación matemática y dos variables numéricas para saber con qué dos números vamos a trabajar</li>
                
    <li> Crea un script donde una variable contenga un número del 1 al 7 (puedes usar rand para que este numero se genere aleatoriamente) que represente un día de la semana (1 para lunes, 2 para martes, etc.). Usa match para devolver el nombre del día correspondiente.</li>
                
    <li> Crea un script donde una variable contenga el número del mes (del 1 al 12). Usa match para determinar la estación del año correspondiente según el mes y muestra el resultado. Las estaciones son:

                    Invierno: Diciembre (12), Enero (1), Febrero (2)
                    Primavera: Marzo (3), Abril (4), Mayo (5)
                    Verano: Junio (6), Julio (7), Agosto (8)
                    Otoño: Septiembre (9), Octubre (10), Noviembre (11)</li>
    <li> Crea un script que realice una operación matemática básica (suma, resta, multiplicación o división) entre dos números. Usa match para determinar qué operación realizar según la variable que indique el tipo de operación</li>
    !-->
    <?php $usuario = "Facu"; ?>
    <?php
    echo "<h1>Ejercicio 1.</h1><br>";
    $random = rand(1, 7);
    switch ($random) {
        case 1:
            echo "Lunes.<br>";
            break;
        case 2:
            echo "Martes.<br>";
            break;
        case 3:
            echo "Miercoles.<br>";
            break;
        case 4:
            echo "Jueves.<br>";
            break;
        case 5:
            echo "Viernes.<br>";
            break;
        case 6:
            echo "Sabado.<br>";
            break;
        case 7:
            echo "Domingo.<br>";
            break;
    };
    echo "<h1>Ejercicio 2.</h1><br>";
    $nota = rand(1, 10);
    echo match (true) {
        $nota < 5 => "Suspenso",
        $nota == 5 => "Aprobado",
        5 < $nota && $nota <= 7 => "Bien",
        7 < $nota && $nota <= 10 => "Notable",
        $nota == 10 => "Sobresaliente"
    };
    echo "<br>";
    switch (true){
        case $nota<5:
            echo "Suspenso";
            break;
        case $nota==5:
            echo "Aprobado";
            break;
        case 5<$nota&&$nota<=7:
            echo "Bien";
            break;
        case 8<=$nota&&$nota<=9:
            echo "Notable";
            break;
        case $nota==10:
            echo "Sobresaliente";      
    }
    echo "<br>$nota";



    echo "<h1>Ejercicio 3.</h1><br>";
    $operacion = "/";
    $var1 = 2;
    $var2 = 3;
    switch ($operacion) {
        case "+":
            echo $var1 + $var2;
            break;
        case "-":
            echo $var1 - $var2;
            break;
        case "*":
            echo $var1 * $var2;
            break;
        case "/":
            if ($var2 != 0) {
                echo $var1 / $var2;
            } else {
                "Indeterminado";
            }

            break;
    };
    echo "<h1>Ejercicio 4.</h1><br>";
    echo match ($random) {
        1 => "Lunes",
        2 => "Martes",
        3 => "Miercoles",
        4 => "Jueves",
        5 => "Viernes",
        6 => "Sabado",
        7 => "Domingo"
    };
    echo "<h1>Ejercicio 5.</h1><br>";
    $estacion = rand(1, 12);
    echo match (true) {
        $estacion <= 2 || $estacion == 12 => "Es invierno",
        2 < $estacion && $estacion <= 5 => "Es primavera",
        5 < $estacion && $estacion <= 8 => "Es verano",
        8 < $estacion && $estacion <= 11 => "Es otoño",
    };
    echo "<h1>Ejercicio 6.</h1><br>";
    $var1 = 2;
    $var2 = 6;
    $operacion = "/";

    echo match ($operacion) {
        "+" => $var1 + $var2,
        "-" => $var1 - $var2,
        "*" => $var1 * $var2,
        "/" => $var2 != 0 ? $var1 / $var2 : "Indeterminado"
    };












    ?>
</body>

</html>