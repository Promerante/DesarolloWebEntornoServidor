<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php
    error_reporting(E_ALL);
    ini_set("display_errors", 1);
    require "conexion.php";
    session_start();
    if (!isset($_SESSION["usuario"])) {
        header("location: usuario/login.php");
        exit;
    } else if ($_SESSION["admin"] != 1) {
        // *CASO NO SEA ADMIN
        session_destroy();
        header("location: usuario/login.php");
        exit;
    }
    ?>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <?php
    $consulta = "SELECT * FROM proveedores";
    $resultado = $_conexion->query($consulta);
    $proveedores = [];
    while ($fila = $resultado->fetch_assoc()) {
        array_push($proveedores, $fila["nombre_proveedor"]);
    }
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nombre_producto = isset($_POST["nombre_producto"]) ? htmlspecialchars(trim($_POST["nombre_producto"])) : "";
        $categoria_producto = isset($_POST["categoria_producto"]) ? htmlspecialchars(trim($_POST["categoria_producto"])) : "";
        $precio = isset($_POST["precio"]) ? $_POST["precio"] : "";
        $stock = isset($_POST["stock"]) ? $_POST["stock"] : "";
        $nombre_proveedor = isset($_POST["nombre_proveedor"]) ? $_POST["nombre_proveedor"] : "";
        $errores = false;
        if ($nombre_producto === "") {
            $err_nombre_producto = "<p>El título no puede estar vacio</p>";
            $errores = true;
        }
        if ($categoria_producto === "") {
            $err_categoria_producto = "<p>La categoria no puede estar vacia.</p>";
            $errores = true;
        }
        if (!is_numeric($precio)) {
            $err_precio = "<p>El precio no puede estar vacio</p>";
            $errores = true;
        } else if ($precio < 0) {
            $err_precio = "<p>El precio no puede ser menor a cero</p>";
            $errores = true;
        }
        if (!is_numeric($stock)) {
            $err_stock = "<p>El stock no puede estar vacio</p>";
            $errores = true;
        } else if ($stock < 0) {
            $err_stock = "<p>El stock no puede ser menor a cero</p>";
            $errores = true;
        }
        if (!$errores) {
            $consulta = "INSERT INTO productos(nombre_producto,categoria_producto,precio,stock,nombre_proveedor) VALUES 
            ('$nombre_producto','$categoria_producto','$precio','$stock','$nombre_proveedor')";
            if ($_conexion->query($consulta)) {
                echo "<h1>AÑADIDOOO :D.</h1>";
            } 
        }
    }
    ?>
    <form method="post">
        <label for="nombre_producto">Nombre:</label>
        <input type="text" name="nombre_producto" value="">
        <?= isset($err_nombre_producto)?$err_nombre_producto:"" ?>
        <br><br>
        <label for="nombre_proveedor">Proveedor:</label>
        <select name="nombre_proveedor">
            <option value="" disabled selected>ELIJA PROVEEDOR</option>
            <?php
            foreach ($proveedores as $proveedor) {
                echo "<option value='".$proveedor."'>$proveedor</option>";
            }
            ?>
        </select>
        <?= $err_nombre_proveedor ?? "" ?>
        <br><br>
        <label for="categoria_producto">Categoria:</label>
        <input type="text" name="categoria_producto" value="">
        <?= isset($err_categoria_producto)?$err_categoria_producto:"" ?>
        <br><br>
        <label for="precio">Precio:</label>
        <input type="text" name="precio" value="">
        <?= isset($err_precio)?$err_precio:"" ?>
        <br><br>
        <label for="stock">Stock:</label>
        <input type="text" name="stock" value="">
        <?= isset($err_stock)?$err_stock:"" ?>
        <br><br>
        <input type="submit" value="CREAR">
        <a href="productos.php" class="btn btn-primary">Volver</a>
    </form>
</body>

</html>