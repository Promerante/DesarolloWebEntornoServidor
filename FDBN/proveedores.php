<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proveedores</title>
    <?php
    error_reporting(E_ALL);
    ini_set("display_errors", 1);
    require "conexion.php";
    session_start();
    // Esto lo hago para que esta pagina solo entre si la sesion esta creada, que solo se crea si el login es correcto,si no redirige al inicio de sesion
    if (!isset($_SESSION["usuario"])) {
        header("location: usuario/login.php");
        exit;
    }
    ?>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>

<body>
    <table class="table">
        <tr>
            <th>nombre_proveedor</th>
            <th>ciudad</th>
            <th>telefono</th>
        </tr>
        <?php
        $consulta = "SELECT * FROM proveedores";
        $res = $_conexion->query($consulta);
        while ($fila = $res->fetch_assoc()) {
            echo "<tr><td>{$fila['nombre_proveedor']}</td>";
            echo "<td>{$fila['ciudad']}</td>";
            echo "<td>{$fila['telefono']}</td></tr>";
        }
        ?>
    </table>
    <a href="index.php" class="btn btn-primary">Volver al menú principal</a>
</body>

</html>