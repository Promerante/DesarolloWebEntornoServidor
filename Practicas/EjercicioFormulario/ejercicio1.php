<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario9/10</title>
</head>
<body>
    <h3>1. Ejercicio básico con GET: Crea un formulario que pida el nombre y la edad y los envíe
        usando GET. Luego muestra los datos en la misma página.
    </h3>
    <form action="ejercicio1.php" method="get">
        Nombre: <input type="text" name="nombre" id="nombre" >
        Edad: <input type="number" name="edad">
        <input type="submit" value="Enviar">
    </form>
    <?php
        if ($_SERVER["REQUEST_METHOD"] == "GET") {
        // Recogemos los datos del formulario usando $get
        $nombre = $_GET["nombre"];
        $edad = $_GET['edad'];
        // Mostrar los datos
        echo "Nombre: $nombre <br>";
        echo "Edad: $edad <br>";
        }
    ?>
        <form action="ejercicio1.php" method="get">
        Nombre: <input type="text" name="nombre">
        Edad: <input type="number" name="edad">
        <input type="submit" value="Enviar">
    </form>
    
</body>
</html>