<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Ejercicio extra caja fuerte</h2>
    <?php
    $valoresIntroducidos = [];
    $clave = [5, 8, 6, 9];
    $acertaste =false;
    $fallaste = false;
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $elec = $_POST["form"];
            if($elec == "10"){
                $valoresIntroducidos= isset($_POST["caja"]) ? convertirArray($_POST["caja"]) : [];
                array_push($valoresIntroducidos, (int)$_POST["clave"]);
                if(compContra($clave, $valoresIntroducidos)){
                    echo "Numero correcto<br>";

                    if(count($clave) == count($valoresIntroducidos)){
                        $acertaste = true;
                        echo "Has accedido a la caja fuerte";
                        $valoresIntroducidos = [];
                     }
                }else{
                    $fallaste = true;
                    echo "Numero Incorrecto. Vuelve a empezar";
                    $valoresIntroducidos = [];
                 }
            }
        }
        

    function convertirArray($valor){
        $convertido = [];
        for($i = 0; $i < strlen($valor) ; $i++){
            array_push($convertido, $valor[$i]);
        }
        return $convertido;

    }

    function compContra($contra, $intro){
        for($i = 0; $i < count($intro); $i++){
            if($contra[$i] != $intro[$i]){
                return false;
            }
        }
        return true;

    }    

    function lista($array){
        $string = "";
        for($i = 0; $i < count($array); $i++){
            $string .= $array[$i];
        }

        return $string;
    }
    ?>
    <form action="tesoro.php" method="post">
        <input type="number" name="clave" id="" min="0" max= "9">
        <input type="hidden" name="caja" value="<?php echo (lista($valoresIntroducidos));?>">
        <input type="hidden" name="form" value="10">
        <input type="submit" value="Comprobar">
    </form>
    <?php if($acertaste){?>
        Introduciste la clave correcta  <?php echo lista($clave)?>
    <?php }?>

    <?php if($fallaste){?>
        Introduciste la clave incorrecta 
    <?php }?>

</body>
</html>