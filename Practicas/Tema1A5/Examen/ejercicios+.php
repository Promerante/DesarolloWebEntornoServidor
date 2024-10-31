<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $value = $_POST['form'];
    if ($value == 1) {
        $pascal = array(array(1), array(1, 1));
        $filas = $_POST['filas'];
        for ($i = 0; $i <= $filas; $i++) {
            if ($i > 1) {
                $pascal[$i] = array();
                for ($j = 0; $j <= count($pascal[$i - 1]); $j++) {
                    if ($j == 0 || $j == count($pascal[$i - 1])) {
                        $pascal[$i][$j] = 1;
                    } else {
                        $pascal[$i][$j] = $pascal[$i - 1][$j] + $pascal[$i - 1][$j - 1];
                    }
                }
            }
        }
        echo "<pre>";
        print_r(mostrarPascalInvertida($pascal));
        echo "</pre>";
        mostrarPascalInvertida($pascal);
    }
}
    function mostrarPascalInvertida($pascal){
        //Primero invertimos el orden
        $pascalInv=[];
        $cont=0;
        for($i=count($pascal)-1;$i>=0;$i--){
            $pascalInv[$cont]=$pascal[$i];
            $cont++;
        }
        //Ahora lo rellenamos de 0;
        for($i=0;$i<count($pascalInv);$i++){
            while(count($pascalInv[$i])!=count($pascalInv[0]))
                array_unshift($pascalInv[$i],0);
        }
        //Y ahora lo imprimimos
        for($i=0;$i<count($pascalInv);$i++){
            echo "&nbsp;&nbsp;";
            for($j=0;$j<count($pascalInv[$i]);$j++){
                if($pascalInv[$i][$j]==0){
                    echo "&nbsp;&nbsp;";
                }
                else{
                    echo $pascalInv[$i][$j]."&nbsp;&nbsp;";
                }
            }
            echo "<br>";
        }
        return $pascalInv;
    }

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $value = $_POST['form'];
    if ($value == 2) {
        $filas = $_POST['filas'];
        $array = array();
        $num = 2;
        for ($i = 0; $i <= $filas; $i++) {
            $array[$i] = array();
            if ($i > 0) {
                for ($j = 0; $j <= count($array[$i - 1])+1; $j++) {
                    if(esPrimo($num)){
                        $array[$i][$j]=$num;
                        $num++;
                    }
                    else{
                        $num++;
                    }
                }
            }
            else{
                if(esPrimo($num)){
                    $array[0][0]=$num;
                    $num++;
                }
            }
        }
        echo "<pre>";
        print_r($array);
        echo "</pre>";
    }
}
function esPrimo($num)
{
    for ($i = 2; $i < $num; $i++) {
        if ($num % $i == 0) {
            return false;
        }
    }
    return true;
}

