<html>
    <head>
        <title>
            PHP Ejercicios
        </title>
        <?php $usuario = "Facu";?>
    </head>
    <body>
        <h1>Bienvenidos al maravilloso mundo de los ejercicios de PHP</h1>

        <ol>
            <li> Crea un array con cinco números. Utiliza un bucle para sumar todos los elementos del array y muestra el resultado de la suma</li>
            <li> Crea un array de números del 1 al 5. Pide al usuario que introduzca un número (cread una variable $num_usuario) y comprueba si el numero esta en el array. Mostrar un mensaje según el resultado</li>
            <li> Crea un array con números del 1 al 10, recorre el array y muestra sólo los impares</li>
            <li> Crea un array de números desordenados y utiliza la función correspondiente para ordenarlos de forma ascendente. Muestra el array antes y después de ordenarlo</li>
            <li> Crea un array con varios elementos y usa la función correspondiente para contar cuántos elementos tiene el array, muestra el resultado</li>
            <li> Crea un array asociativo que contenga la información de una persona (nombre, apellido1 y edad). Muestra los valores USANDO LAS CLAVES</li>
            <li> Crear un array de números desordenados, recorrer el array para encontrar el número más grande y el más pequeño, mostrarlos por pantalla</li>
            <li> Crear un array vacío, llenarlo gracias a un bucle con números del 1 al 10, mostrar el array completo y a continuación crearme otro array con el orden de los valores invertidos, es decir, si el 1 estaba en la posicion 0 del array, ahora que este en la 9</li>
            <li> Crear un array con los nombres de 10 videojuegos (si no se te ocurre pregunta al de al lado), usa un bucle para mostrar cada juego en una línea diferente</li>
            <li> Crea dos arrays, uno con numeros pares y otro con impares, usa la función correspondiente para combinar ambos arrays y después otra función para ordenarlos</li>
        </ol>

        <h2>Nota!!</h2>
        Hacedme el favor de separar cada ejercicio con etiquetas html, quiero una página ordenada y legible, en clase hemos visto cómo se hacía.
        <?php echo "<br> $usuario";?>
        <h1>Ejercicio 1</h1>
        <?php
        $array1=[1,2,3,4,5];
        $sumatorio=0;
        
        for($i=0;$i<sizeof($array1);$i++){
            $sumatorio+=$array1[$i];
        }
        print_r($sumatorio);
        echo " es el sumatorio de los valores de la array"."<br>";
        
        echo "<h1>Ejercicio 2 </h1>"."<br>";
        $num_usuario=1;
        if(in_array($num_usuario,$array1)){
            echo "el numero ";print_r($num_usuario);echo " esta en la array";
        }
        else{
            echo "el numero ";print_r($num_usuario);echo " no esta en la array";
        }

        echo "<h1>Ejercicio 3 </h1>"."<br>";
        $array2=[1,2,3,4,5,6,7,8,9,10];
        for($k=0;$k<sizeof($array2);$k++){
            if($array2[$k]%2!=0){
                print_r($array2[$k]);
                echo " ";
            }
        }

        echo "<h1>Ejercicio 4 </h1>"."<br>";
        $arrayDesordenado=[88,2,6,34];
        echo "Array desordenada:"."<br>";
        print_r($arrayDesordenado);
        asort($arrayDesordenado);
        echo "<br>"."Array ordenada:"."<br>";  
        print_r($arrayDesordenado);

        echo "<h1>Ejercicio 5</h1>"."<br>";
        $array5=[1,2,3,4,5];
        print_r($array5);
        echo "<br>"."La array de este ejercicio tiene ".count($array5)." elementos.";

        echo "<h1>Ejercicio 6</h1>"."<br>";
        $arrayNombre=["Facundo","Benitez","23"];
        echo "El alumno de la array es ".$arrayNombre[0]." ".$arrayNombre[1]." tiene la siguiente edad:".$arrayNombre[2]; 

        echo "<h1>Ejercicio 7</h1>"."<br>";
        $arrayDesordenado=[88,2,6,34];//La he inicializado de nuevo copiando y pegando solo para que este desordenado nuevamente.
        echo "Array desordenada:"."<br>";
        print_r($arrayDesordenado);
        echo "<br>";
        $maximo=0;
        $minimo=99;//Supongamos como en este ejemplo que sabemos que no hay numero mas grande que 99 para facilitar el codigo
        for($i=0;$i<sizeof($arrayDesordenado);$i++){
            if($maximo<$arrayDesordenado[$i]){
                $maximo=$arrayDesordenado[$i];
            }
            if($minimo>$arrayDesordenado[$i]){
                $minimo=$arrayDesordenado[$i];
            }
        }
        echo "El elemento con mayor valor es: ".$maximo." mientras que el minimo es ".$minimo."<br>";
        
        echo "<h1>Ejercicio 8</h1>"."<br>";
        $arrayVacia=[];
        for($j=1;$j<=10;$j++){
            array_push($arrayVacia,$j);
        }
        print_r($arrayVacia);
        echo "<br>";
        arsort($arrayVacia);
        $arrayInvertida=$arrayVacia;
        print_r($arrayInvertida);
        echo "<br>";

        echo "<h1>Ejercicio 9</h1>"."<br>";
        $arrayJuegos=["RD2","Overwatch","Slay the spire","LOL","Isaac","Persona 3","RE2 Remake","For honor","Dead Cells","MTG Arena"];
            echo "Los juegos en la array son: "."<br>";
        for($k=0;$k<sizeof($arrayJuegos);$k++){
            echo $arrayJuegos[$k]."<br>";
        }

        echo "<h1>Ejercicio 10</h1>"."<br>";
        $impares=[1,3,5,7,9];
        $pares=[2,4,6,8,10];
        $arrayCompleto=array_merge($impares,$pares);
        print_r($arrayCompleto);
        echo "<br>";
        asort($arrayCompleto);
        print_r($arrayCompleto);
        

        ?>
    </body>
</html>