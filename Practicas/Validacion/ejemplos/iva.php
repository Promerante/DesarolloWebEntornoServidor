<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IVA</title>
</head>
<body>
    <?php
    require ("funciones.php");
    error_reporting(E_ALL);
    ini_set("display_errors", 1);
    if($_SERVER["REQUEST_METHOD"]=="POST"){ 
        $tempPrecio=filter_var(!isset($tempPrecio)?$_POST["precio"]:0,FILTER_SANITIZE_NUMBER_FLOAT);
        if($tempPrecio<0 || empty($tempPrecio)){
            $errorPrecio="Introduzca un precio válido";
        }
        else{
            $precio=$tempPrecio;
        }
        $tempImpuesto=!isset($tempImpuesto)?$_POST["impuesto"]:"";
        if(in_array($tempImpuesto,["general","reducido","superReducido"])){
            $impuesto=$tempImpuesto;
        }
        else{
            $errorImpuesto="Introduzca un impuesto valido";
        }
    }

    
    ?>
    <form action="" method="post">
        <label for="precioLabel">Introduzca el precio:</label>
        <input type="text" name="precio" id="">
        
        <select name="impuesto" id="">
            <option disabled selected hidden>------ELEGIR IMPUESTO------</option>
            <option value="general">General(21%)</option>
            <option value="reducido">Reducido(10%)</option>
            <option value="superReducido">Super Reducido(4%)</option>
        </select>
        <input type="submit" value="ENVIAR">
        <br>
        <?php if(isset($errorPrecio))echo "$errorPrecio";if(isset($errorImpuesto))echo "$errorImpuesto";?>
        <br>
    </form>
    <?php
        if(isset($precio, $impuesto)){
            $precio=calcularIVA($precio,$impuesto);
            echo "<h3>El producto vale al final: $precio</h3>";
        }
    ?>

</body>
</html>