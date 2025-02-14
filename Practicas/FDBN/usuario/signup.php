<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrarse</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <?php
    error_reporting(E_ALL);
    ini_set("display_errors", 1);
    require "../conexion.php";
    ?>
</head>

<body>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $usuario = $_POST["usuario"];
        $contraseña = $_POST["contraseña"];
        // Recogemos valores del checkbox{TRUE:"on"/FALSE:""}
        $admin = isset($_POST["admin"]) ? $_POST["admin"] : "";
        if (empty($usuario)) {
            // *Caso usuario vacio
            $errUsuario = "Usuario vacio";
        } else {
            // *Caso usario tiene algo, como solo se requiere que esten rellenado independiente a su contenido, con esta validacion basta.
            $usuario = htmlspecialchars(trim($usuario));
        }
        if (empty($contraseña)) {
            // *Caso usuario vacio
            $errContraseña = "Contraseña vacía";
        } else {
            // *Con esto: quitamos espacion a los lados,evitamos inyecciones de codigo y luego lo encriptamos
            $contraseña = password_hash(htmlspecialchars(trim($contraseña)), PASSWORD_DEFAULT);
        }
        if($admin=="on"){
            $admin=true;
        }else{
            $admin=false;
        }
       
        if(!(isset($errUsuario)||isset($errContraseña))){
            // *Caso no haya errores(de admin no hay nada que controlar)
            $consulta="INSERT INTO usuarios VALUES('$usuario', '$contraseña', '$admin')";
            $_conexion->query($consulta);
            echo "<h2>Usuario introducido correctamente :D</h2>";
        }
        // PARA MI: Admin{facu/facu}noAdmin{noAdmin/123}
    }
    ?>
    <form method="post">
        <div class="mb-3">
            <label class="form-label">Usuario:</label>
            <input type="text" class="form-control" name="usuario">
            <?php if(isset($errUsuario))echo "<b>$errUsuario</b>"; ?>
        </div>
        <div class="mb-3">
            <label class="form-label">Contraseña:</label>
            <input type="password" class="form-control" name="contraseña">
            <?php if(isset($errContraseña))echo "<b>$errContraseña</b>"; ?>

        </div>
        <div class="mb-3">
            <label class="form-label">Eres admin?</label>
            <input type="checkbox" name="admin">
        </div>
        <div class="mb-3">
            <input type="submit" value="Registrar usuario" class="btn btn-primary">
        </div>
    </form>
    <b>Si estas registrado:</b>
    <a href="login.php" class="btn btn-secondary">Iniciar Sesion</a>
</body>

</html>