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
        
           


        ?>
    </body>
</html>