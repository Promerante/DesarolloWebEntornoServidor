<?php
function matrizTraspuesta()
{
    $array = [];
    $cont = 1;
    for ($i = 0; $i < 3; $i++) {
        $array[$i] = [];
        for ($j = 0; $j < 3; $j++) {
            $array[$i][$j] = $cont;
            $cont++;
        }
    }
    echo "<pre>";
    print_r($array);
    echo "</pre>";
    $arrayTras = [];
    for ($i = 0; $i < count($array); $i++) {
        $arrayTras[$i] = [];
        for ($j = 0; $j < count($array[$i]); $j++) {
            $arrayTras[$i][$j] = $array[$j][$i];
        }
    }

    echo "<pre>";
    print_r($arrayTras);
    echo "</pre>";
}
