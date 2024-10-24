<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Matrices</title>
</head>
<body>
    <h1>Suma elementos</h1>
    Crea un array bidimensional de 4x4 que contenga números enteros. Escribe un programa que muestre el array con el separador "-" entre cada elemento del array y calcule la suma de todos sus elementos.
    <?php
        $matriz = array(
            array(1,2,3,4),
            array(5,6,7,8),
            array(9,10,11,12),
            array(13,14,15,16)
        );

        $suma = 0;

        //Sumar los elementos del array
        for($i=0; $i < 4; $i++){
            for($j=0; $j < 4; $j++){
                $suma+=$matriz[$i][$j];
            }
        }

        //Mostrar matriz
        echo "Matriz: <br>";
        for($i=0; $i < 4; $i++){
            for($j=0; $j < 4; $j++){
                if($j==0){
                    echo "||- ".$matriz[$i][$j]." - ";
                }elseif($j>0 && $j!=3){
                    echo $matriz[$i][$j]." - ";
                }else{
                    echo $matriz[$i][$j]." -||";
                }
            }
            echo "<br>";
        }

    ?>

    <h1>Matriz identidad</h1>
    Crea una matriz identidad de 4x4. Una matriz identidad tiene 1 en la diagonal principal y 0 en el resto de puestos de la matriz. Muestra la matriz resultante con bucles.
    <?php
        $matriz = array();

        // Crear la matriz identidad
        for ($i = 0; $i < 4; $i++) {
            for ($j = 0; $j < 4; $j++) {
                if ($i == $j) {
                    $matriz[$i][$j] = 1;
                } else {
                    $matriz[$i][$j] = 0;
                }
            }
        }
        
        // Mostrar la matriz identidad
        echo "Matriz identidad:<br>";
        for ($i = 0; $i < 4; $i++) {
            for ($j = 0; $j < 4; $j++) {
                echo $matriz[$i][$j] . " ";
            }
            echo "<br>";
        }
    ?>

    <h1>Transpuesta de una matriz</h1>
    Dada una matriz 3x3, escribe un programa que calcule y muestre su respuesta.
    La transpuesta de una matriz es otra matriz en la que las filas son las columnas y viceversa.
    <?php

        $matriz = array(
        array(1, 2, 3),
        array(4, 5, 6),
        array(7, 8, 9)
        );

        $transpuesta = array();

        // Calcular la transpuesta
        for ($i = 0; $i < 3; $i++) {
            for ($j = 0; $j < 3; $j++) {
                $transpuesta[$i][$j] = $matriz[$j][$i];
            }
        }

        // Mostrar la matriz original
        echo "Matriz original:<br>";
        for ($i = 0; $i < 3; $i++) {
            for ($j = 0; $j < 3; $j++) {
                echo $matriz[$i][$j] . " ";
            }
            echo "<br>";
        }

        echo "<br>Matriz transpuesta:<br>";
        // Mostrar la transpuesta
        for ($i = 0; $i < 3; $i++) {
            for ($j = 0; $j < 3; $j++) {
                echo $transpuesta[$i][$j] . " ";
            }
            echo "<br>";
        }
        ?>
    <h1>Multiplicación de matrices</h1>
    Crea dos matrices bidimensionales de 2x2 con números enteros. Escribe un programa que calcule el producto de dos matrices y muestre el resultado.
    En una multiplicación de matrices, el número de columnas de la primera matriz debe coincidir con el número de filas de la segunda matriz.
    Para multiplicar dos matrices de 2x2, el resultado también será una matriz de 2x2.
    <pre>
    Ejemplo:
    Dadas dos matrices A y B:  A: a11 a12  y  B: b11 b12
                                  a21 a22        b21 b22
    
    La multiplicación de A x B se calcularía tal que así:

    Resultado = [ (a11*b11 + a12*b21) (a11*b12 + a12*b22) ]
                [ (a21*b11 + a22*b21) (a21*b12 + a22*b22) ]

    Ejemplo con números:
    Matriz A:
                1 2
                3 4

    Matriz B:
                5 6
                7 8

    Resultado de A x B:
                19 22
                43 50
    </pre>
    <?php
        $matrizA = array(
            array(1, 2),
            array(3, 4)
        );
        
        $matrizB = array(
            array(5, 6),
            array(7, 8)
        );
        
        $resultado = array();
        
        // Calcular la multiplicación de matrices
        for ($i = 0; $i < 2; $i++) {
            for ($j = 0; $j < 2; $j++) {
                $resultado[$i][$j] = 0;
                for ($k = 0; $k < 2; $k++) {
                    $resultado[$i][$j] += $matrizA[$i][$k] * $matrizB[$k][$j];
                }
            }
        }
        
        // Mostrar la matriz A
        echo "Matriz A:<br>";
        for ($i = 0; $i < 2; $i++) {
            for ($j = 0; $j < 2; $j++) {
                echo $matrizA[$i][$j] . " ";
            }
            echo "<br>";
        }
        
        // Mostrar la matriz B
        echo "<br>Matriz B:<br>";
        for ($i = 0; $i < 2; $i++) {
            for ($j = 0; $j < 2; $j++) {
                echo $matrizB[$i][$j] . " ";
            }
            echo "<br>";
        }
        
        // Mostrar el resultado de la multiplicación
        echo "<br>Resultado de A x B:<br>";
        for ($i = 0; $i < 2; $i++) {
            for ($j = 0; $j < 2; $j++) {
                echo $resultado[$i][$j] . " ";
            }
            echo "<br>";
        }
    ?>

    <h1>Media de una matriz</h1>
    Escribe un programa que calcule la media de todos los valores de una matriz bidimensional de 4x3 (4 filas y 3 columnas). Después muestra la media.
    <?php
        $matriz = array(
        array(4, 5, 6),
        array(7, 8, 9),
        array(1, 2, 3),
        array(10, 11, 12)
        );

        $suma = 0;
        $totalElementos = 0;

        // Calcular la suma de los elementos y contar cuántos hay
        for ($i = 0; $i < 4; $i++) {
            for ($j = 0; $j < 3; $j++) {
                $suma += $matriz[$i][$j];
                $totalElementos++;
            }
        }

        // Calcular el promedio
        $promedio = $suma / $totalElementos;

        // Mostrar la matriz
        echo "Matriz:<br>";
        for ($i = 0; $i < 4; $i++) {
            for ($j = 0; $j < 3; $j++) {
                echo $matriz[$i][$j] . " ";
            }
            echo "<br>";
        }

        // Mostrar el promedio
        echo "<br>Promedio de todos los elementos: " . $promedio;
        $cursos=[
            "Curso1" => ["Clase1" => 15,"Clase2" =>20,"Clase3" =>16],
            "Curso2" => ["Clase1" => 19,"Clase2" =>21,"Clase3" =>6],
            "Curso3" => ["Clase1" => 14,"Clase2" =>29,"Clase3" =>19]
        ];
            echo "<pre>";
            print_r($cursos);
            echo "</pre>";
            $mayorMedia=0;
            $cursoConMayorMedia="";
            foreach($cursos as $curso => $clases){
                $totalAlumno=0;
                $numClases=0;
                foreach($clases as $clase => $alumno){
                    $totalAlumno+=$alumno;
                    $numClases++;
                }
                $media=$totalAlumno/$numClases;
                echo "La media del curso ".$curso."es: ".$media;
                if($mayorMedia<$media){
                    $mayorMedia=$media;
                    $cursoConMayorMedia=$curso;
                }
            }
            echo "<br>El curso con mayor media es $cursoConMayorMedia y su media es $mayorMedia<br>";
            for($i=0;$i<count($cursos);$i++){
                print_r($cursos[$i]);
            }
    ?>
</body>
</html>