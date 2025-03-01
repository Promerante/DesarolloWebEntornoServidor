<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de sesion</title>
    <?php
    error_reporting(E_ALL);
    ini_set("display_errors", 1);
    require "../conexion.php";
    session_start();
    if (isset($_SESSION["usuario"])) {
        // *CASO SESION YA CREADA: en ese caso ya tiene cuenta activa, redirigimos al index
        header("location: ../index.php");
        exit;
    }
    ?>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $usuario = $_POST["usuario"];
        $contraseña = $_POST["contraseña"];
        $consulta = "SELECT * FROM usuarios WHERE usuario='$usuario'";
        $res = $_conexion->query($consulta)->fetch_assoc();
        // var_dump($res);
        if (empty($usuario)) {
            $errUsuario = "Usuario Vacio";
            
        } else if (empty($res)){
            $errUsuario="No existe este usario";
        }else{
            // *CASO USUARRIO ENCONTRADO(ahora contraseña):
            // 
            if(empty($contraseña)){
                $errContraseña = "Contraseña vacía";
            }else if (!password_verify($contraseña,$res["contrasena"])) {
                $errContraseña = "Contraseña incorrecta";
            }else{
                // *CASO USUARIO Y CONTRASEÑA CORRECTA:creamos sesion le damos o le otorgamos los nuevos valore valor a usuario y admin(contraseña no por seguridad)
                session_start();
                $_SESSION["usuario"] = $usuario;
                // PARA MI: Admin{1}noAdmin{0}
                $_SESSION["admin"]=$res["admin"];
                header("location: ../index.php");
            }
        }
    }
    ?>
    <h1>Inicia sesión:</h1>
    <form method="post">
        <div class="mb-3">
            <label class="form-label">Usuario:</label>
            <input type="text" class="form-control" name="usuario">
            <?php if(isset($errUsuario))echo"<b>$errUsuario</b>"; ?>
        </div>
        <div class="mb-3">
            <label class="form-label">Contraseña</label>
            <input type="password" class="form-control" name="contraseña">
            <?php if(isset($errContraseña))echo"<b>$errContraseña</b>"; ?>
        </div>
        <div class="mb-3">
            <input type="submit" value="Iniciar sesión" class="btn btn-primary">
        </div>
    </form>
    <h3>Si no tienes cuenta, registrate:</h3>
    <a href="signup.php" class="btn btn-primary">Registrate</a>

</body>

</html>