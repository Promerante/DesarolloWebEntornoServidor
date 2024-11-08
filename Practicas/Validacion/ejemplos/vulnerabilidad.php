<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vulnerabilidad</title>
</head>
<body>
<form action="" method="post">
    <input type="text" name="comentario">
    <input type="submit" value="Enviar">
</form>    
<!--<script>alert("Has sido hackeado");
    document.body.innerHTML="<h1>Sitio hackiado</h1>"
</script>-->
<form action="" method="get">
    <input type="text" name="comentario">
    <input type="submit" value="Enviar">
</form>
</body>
</html>
<?php
    error_reporting(E_ALL);
    ini_set("display_errors",1);
if($_SERVER["REQUEST_METHOD"]=="GET"){
    if(!isset($edad)){
        echo "La variable \$edad no existe";
    }
    
}
?>
