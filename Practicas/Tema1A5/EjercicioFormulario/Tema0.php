<?php $usuario = "Facu";?>
<html>
    <head>
        <title>Arrays</title>
    </head>
    <body>
        <h1>VAMOS A SALIR A LAS 9:35 AM</h1>
        <?php echo "<br> $usuario";?>
        <h1>Fundamentos array</h1>
        <?php   
            $mi_array=[1,3,5,7,9];
            print_r($mi_array);
            echo "<br>";
            $mi_array[5]=11;
            print_r($mi_array);
            echo"<br>";
            $mi_array[7]=15;
            print_r($mi_array);
            echo"<br>".sizeof($mi_array) ;//$mi_array[6] (???)

            //FUNCIONES DE ARRAYS Y DICCIONARIOS.
            echo"<br>";
            $mi_array[3]=4;
            ksort($mi_array);//Ordena de menor a mayor por las claves numericas.
            print_r($mi_array);
            asort($mi_array);//Ordena las variables del array manteniendo la asociasion con las claves
            echo"<br>";
            print_r($mi_array);
            krsort($mi_array);//Ordena de mayor a menor segun las claves numeros
            echo"<br>";
            print_r($mi_array);
            echo"<br>";
            arsort($mi_array);
            print_r($mi_array);
            echo"<br>";
        ?>
        <h2>Funciones útiles para arrays</h2>
        <?php
            $pares=[2,4,6,8,10];
            print_r($pares);
            echo"<br>".count($pares)." es el numero de elementos en la array pares";
            $primerValor=reset($pares);//Devuelve el primer valor del array y resetea el iterador interno.
            echo "<br>".$primerValor."<br>";
            $ultimaClave=count($pares)-1;
            echo $pares[$ultimaClave]." este es el último valor<br>";
        ?>
        <h2>Mas funciones</h2>
        <?php
            $ejemplo1=[];
            for($i=1;$i<=10;$i++){
                array_push($ejemplo1,$i);
            }
            print_r($ejemplo1);
            echo"<br>";
            array_pop($ejemplo1);
            print_r($ejemplo1);
            echo "<br>";

            array_unshift($ejemplo1,0);
            print_r($ejemplo1);
            echo "<br>";
            
            $impares=[1,3,5,7,9];
            $pares=[2,4,6,8,10];
            $arrayCompleto=array_merge($impares,$pares);
            print_r($arrayCompleto);
            echo "<br>";
            asort($arrayCompleto);
            print_r($arrayCompleto);
            echo "<br>";
            unset($arrayCompleto[3]);//Borra una clave en especifico con su valor correspondiente
            print_r($arrayCompleto);
            echo "<br>";

        
        ?>

        <?PHP
            echo "<h1>Switch y MATCH </h1><br>";
            //SWITCH Y MATCH
            $VAR=rand(1,4);
            switch ($VAR){
                case 1:
                    echo "uno<br>";
                    break;
                default:
                    echo "otro numero<br>";
            }
            $dia=4;
            $nombreDia=match($dia){
                1=> "Lunes<br>",
                2=>"Martes<br>",
                default=> "Otro dia de la semana<br>"
            };
            echo $nombreDia;

        ?>
        
    </body>
</html>