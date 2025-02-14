<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos</title>
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
    <?php
    // var_dump($_SESSION["admin"])
    // OJO:como siempre tiene que haber una sesion creada aquí, si o si debería tener un session admin para comprobar su rol:
    if ($_SESSION["admin"] == 1) {
        $admin = true;
        $enlAdmin = '<a href="nuevo.php" class="btn btn-primary">Nuevo producto</a>';
    } else {
        $admin = false;
    }
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // *CASO QUE LE DE ALGUNA ACCION
        $id = isset($_POST["id_producto"]) ? $_POST["id_producto"] : "";
        if ($id != "") {
            // *CASO HAY ID: por lo que será editar:
            $consulta = "SELECT * FROM productos WHERE id_producto = '$id'";
            $res = $_conexion->query($consulta);
            if ($res->num_rows > 0) {
                // *CASO NO 
                $consulta = "DELETE FROM productos WHERE id_producto = $id";
                $_conexion->query($consulta);
            }
        }
    }
    ?>
    <h1>Productos</h1>
    <!-- Redirigimos a la misma pagina pero dandole los valores deseados a la variables por la URL-->
    <a href="?orden=precio&direccion=ASC" class="btn btn-primary">Ordenar por precio ascendente</a>
    <a href="?orden=precio&direccion=DESC" class="btn btn-primary">Ordenar por precio descendente</a>
    <a href="?orden=id_producto&direccion=ASC" class="btn btn-primary">Ordenar por ID ascendente</a>
    <a href="?orden=id_producto&direccion=DESC" class="btn btn-primary">Ordenar por ID descendente</a>
    <?php
    $orden = isset($_GET['orden'])?$_GET['orden']:"id_producto";
    $direccion = isset($_GET['direccion'])?$_GET['direccion']:"";
    ?>
    <table class="table">
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Categoria</th>
            <th>Precio</th>
            <th>Stock</th>
            <th>Proveedor</th>
            <?php echo $admin ? "<th>Editar</th><th>Borrar</th>" : "";
            $consulta = "SELECT * FROM productos ORDER BY $orden $direccion";
            $res = $_conexion->query($consulta);
            while ($fila = $res->fetch_assoc()) {
                echo "<tr>";
                echo "<td>{$fila['id_producto']}</td>";
                echo "<td>{$fila['nombre_producto']}</td>";
                echo "<td>{$fila['categoria_producto']}</td>";
                echo "<td>{$fila['precio']}</td>";
                echo "<td>{$fila['stock']}</td>";
                echo "<td>{$fila['nombre_proveedor']}</td>";
                // echo "</tr>";

                if ($admin) {
                    echo "<td>
                                <a class='btn btn-primary' href='editar.php?id_producto={$fila['id_producto']}'>Editar</a>
                            </td>
                            <td>
                                <form method='post'>
                                    <input type='hidden' name='id_producto' value='{$fila['id_producto']}'>
                                    <button class='btn btn-primary' type='submit'>Borrar</button>
                                </form>
                              </td></tr>";
                }
            }
            ?>

    </table>
    <a href="index.php" class="btn btn-primary">Volver al menú principal</a>


</body>

</html>