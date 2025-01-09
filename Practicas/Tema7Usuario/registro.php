<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <?php
    error_reporting(E_ALL);
    ini_set("display_errors", 1);
    require "../Tema7/conexion.php";
    ?>
</head>

<body>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $usuario = $_POST["usuario"];
        $contraseña = $_POST["contraseña"];
        $consulta = "INSERT INTO usuarios(usuario,contraseña) VALUES ('$usuario' , '$contraseña');";
        $_conexion->query($consulta);
    }
    ?>

    <div class="container">
        <h1>Formulario de registro :D</h1>
        <form method="post" enctype="multipart/form-data" class="col-4">
            <div class="mb-3">
                <label class="form-label">Usuario</label>
                <input type="text" name="usuario" class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label">Contraseña</label>
                <input type="password" name="contraseña" class="form-control">
            </div>
            <div class="mb-3">
                <input type="submit" value="Registrarse" class="btn btn-primary">
            </div>
        </form>
        <h3>Si ya tienes cuenta, inicia sesión</h3>
        <a href="iniciar_sesion.php" class="btn btn-secondary">Iniciar sesión</a>
    </div>

</body>

</html>