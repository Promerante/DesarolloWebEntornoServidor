<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Indice</title>
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
    ?>
    <div class="container text-center">
        <h1>
            Bienvenido
            <?php echo $admin ? $_SESSION["usuario"] . ".<br>Está en modo admin" : $_SESSION["usuario"] ?>
            <!-- Lo siento -->
        </h1>
        <p>Elige una opción:</p>
        <a href="productos.php" class="btn btn-primary ">Productos</a>
        <a href="proveedores.php" class="btn btn-primary ">Proveedores</a>
        <?php echo isset($enlAdmin) ? $enlAdmin : ""; ?>
        <a href="usuario/logout.php" class="btn btn-primary">Cerrar sesión</a>
    </div>



</body>

</html>