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
    
    session_start();
    if(isset( $_SESSION["usuario"]))echo "Hey YA ESTAS CON UN USUARIO";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $usuario = $_POST["usuario"];
        $contraseña = $_POST["contraseña"];
        $contraseñaCifrada=password_hash($contraseña,PASSWORD_DEFAULT);
        if(!empty($usuario)&&!empty($contraseña)&&strlen($usuario)<=50&&strlen($usuario)<=255&& !duplicado($usuario,$_conexion)){//NO COMPRUEBA SI METE UN USUARIO DE MISMO NOMBRE
            $consulta = "INSERT INTO usuarios(usuario,contraseña) VALUES ('$usuario' , '$contraseñaCifrada');";
            $_conexion->query($consulta);
        }
        else if(empty($usuario)||empty($contraseña)) echo "Usuario o Contraseña vacias";
        else if(strlen($usuario)>50||strlen($usuario)>255) echo "Usuario o Contraseña demasiado largas";
        else if(duplicado($usuario,$_conexion))echo "Usuario ya existente";
        else echo "ERROR DESCONOCIDO";

        
    }
    
    
    function duplicado($usuario,$_conexionA){
        $consulta="SELECT * FROM usuarios ";
        $usuarios=[];
        
        $res=$_conexionA->query($consulta);
        
        while($fila=$res->fetch_assoc()){
            array_push($usuarios,$fila["usuario"]);
        }
        $boolean=false;
        foreach( $usuarios as $usuarioArray){
            if($usuarioArray==$usuario) $boolean=true;
        }
        return $boolean;
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