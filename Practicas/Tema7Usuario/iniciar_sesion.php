<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <?php
    error_reporting(E_ALL);
    ini_set("display_errors", 1);
    require "../Tema7/conexion.php";
    ?>
</head>

<body>

    <div class="container">

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $usuario = $_POST["usuario"];
            $contraseña = $_POST["contraseña"];
            $consulta = "SELECT * FROM usuarios WHERE  usuario='$usuario'";
            $res=$_conexion->query($consulta);
            $fila=$res->fetch_assoc();
            if(empty($usuario)||empty($contraseña)) echo "Usuario o contraseña vacios";
            else if($res->num_rows==0)echo "Usuario no existe";
            else if(!password_verify($contraseña,$fila["contraseña"]))echo "Contraseña incorrecta";
            else{
                echo "Inicio de sesion correcto";
                session_start();
                $_SESSION["usuario"]=$usuario;
            }
        }
        ?>
        <h1>Formulario de Inicio de sesion :D</h1>
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
                <input type="submit" value="Iniciar Sesion" class="btn btn-primary">
            </div>
        </form>
        <h3>No tienes cuenta?Registrate</h3>
        <a href="registro.php" class="btn btn-secondary">Registrarse</a>
    </div>

</body>

</html>