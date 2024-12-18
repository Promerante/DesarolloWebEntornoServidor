<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="" rel=""/>
</head>
<body>
    <?
    $_servidor="localhost";
    $_usuario="admin";
    $_contrasenia="admin";
    $_bd="videojuegos_bd";
    $_conexion= new mysqli($_servidor,$_usuario,$_contrasenia,$_bd);
    if($_conexion->connect_error){
        die("Error de conexión: ".$_conexion->connect_error);
    }
    ?>
    
</body>
</html>