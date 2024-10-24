<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $value = $_POST['form'];
    if ($value == 1) {
        $alumnos = [
            "Juanito" => ["Sist. Informaticos" => 9, "Lenguaje de Marcas" => 5, "BBDD" => 7],
            "Rosa" => ["Sist. Informaticos" => 6, "Lenguaje de Marcas" => 9, "BBDD" => 9],
            "Hector" => ["Sist. Informaticos" => 4, "Lenguaje de Marcas" => 8, "BBDD" => 7],
            "Florencia" => ["Sist. Informaticos" => 6, "Lenguaje de Marcas" => 10, "BBDD" => 8],
            "Eugenio" => ["Sist. Informaticos" => 9, "Lenguaje de Marcas" => 5, "BBDD" => 6],
        ];
        foreach ($alumnos as $alumno => $notas) {
            $contador = 0;
            $totalNotas = 0;
            foreach ($notas as $asignatura => $nota) {
                $totalNotas += $nota;
                $contador++;
            }
            $promedio = $totalNotas / $contador;
            echo "La nota media de $alumno sería: " . $promedio . ".<br>";
        }
    }
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $value = $_POST['form'];
    if ($value == 2) {
        $menor = $_POST['inferior'];
        $mayor = $_POST['superior'];
        if ($menor > $mayor) {
            $temp = $menor;
            $menor = $mayor;
            $mayor = $temp;
        } //Condicional por si los introduce al revés
        $cont = $menor;
        echo "Números perfectos en el rango de $menor a $mayor:<br>";
        while ($cont <= $mayor) {
            if (esPerfecto($cont)) {
                echo "$cont es un número perfecto <br> ";
            }
            $cont++;
        }
    }
}
function esPerfecto($num)
{
    $total = 0;
    for ($i = 1; $i < $num; $i++) {
        if ($num % $i == 0) {
            $total += $i;
        }
    } //Con esto vamos a meter todos los numeros divisibles en la array
    if ($total == $num) {
        return true;
    } else {
        return false;
    }
}

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $operacion = $_GET['operacion'];
    $array1 = [];
    $array2 = [];
    for ($i = 0; $i < 3; $i++) {
        for ($j = 0; $j < 3; $j++) {
            $array1[$i][$j] = rand(1, 10);
            $array2[$i][$j] = rand(1, 10);
        }
    } //Con esto inicializamos y formamos 2 arrays 3x3 con numeros aleatorios.

    echo "Array 1:<br>";
    modoTabla($array1);
    echo "Array 2:<br>";
    modoTabla($array2);
    if ("suma" == strtolower("$operacion")) {
        echo "Resultado de la suma:<br>";
        modoTabla(suma($array1,$array2));
    } elseif ("resta" == strtolower("$operacion")) {
        echo "Resultado de la resta:<br>";
        modoTabla(resta($array1,$array2));
    } else {
        echo "Introduce suma o resta para realizar la operacion";
    }
}

function suma($array1, $array2)
{
    $arraySuma = [];
    for ($i = 0; $i < 3; $i++) {
        for ($j = 0; $j < 3; $j++) {
            $arraySuma[$i][$j] = $array1[$i][$j] + $array2[$i][$j];
        }
    }
    return $arraySuma;
}

function resta($array1, $array2)
{
    $arrayResta = [];
    for ($i = 0; $i < 3; $i++) {
        for ($j = 0; $j < 3; $j++) {
            $arrayResta[$i][$j] = $array1[$i][$j] - $array2[$i][$j];
        }
    }
    return $arrayResta;
}

function modoTabla($array)
{
    $text = '<table style="border-collapse: collapse;">';
    for ($i = 0; $i < 3; $i++) {
        $text .= "<tr style='margin: 0';padding:0>";
        for ($j = 0; $j < 3; $j++) {
            $text .= "<td style='border: 1px solid;margin: 0;padding:20px'>" . $array[$i][$j] . "</td>";
        }
        $text .= "</tr>";
    }
    $text .= "</table>";
    echo $text;
}
