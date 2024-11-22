<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    error_reporting(E_ALL);
    ini_set("display_errors", 1);

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        //NOMBRE:
        $temp_nombre = $_POST["nombre"];
        if (empty($temp_nombre)) {
            $errNombre = "Campo obligatorio";
        } else if (!preg_match("/^(?=.*[A-Z])(?=.*[a-z])[a-zA-Z]{5,15}$/",  $temp_nombre)) {
            $errNombre = "El nombre de usuario debe tener entre 3 a 15 caracteres, una minuscula y otra mayuscula";
        } else {
            $temp_nombre=htmlspecialchars($temp_nombre,ENT_QUOTES,"UTF-8");
            $temp_nombre = trim($temp_nombre); //Quita espacios al inicio y al final
            $nombre = $temp_nombre;
        }
        //EMAIL:
        $temp_email = $_POST["email"];
        if (empty($temp_email)) {
            $errorEmail = "Campo obligatorio";
        } else {
            $temp_email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
        } //Santizado
        if (filter_var($temp_email, FILTER_VALIDATE_EMAIL)) {
            $email = $temp_email;
        } else {
            $errorEmail = "Error email incluso habiendo sanitizado";
        }
        //Contraseña
        $temp_cont = $_POST["contraseña"];
        if (empty($temp_cont)) {
            $errorContraseña = "Campo obligatorio";
        } else if (!preg_match("/(?=.*[A-Z])(?=.*[a-z])(?=.*[@$!*?&])[a-zA-Z@$!*?&]{8,15}$/", $temp_cont)) {
            $errorContraseña = "La contraseña debe tener al menos entre 8 y 15 caracteres, y tener uno de estos caracteres @ $ ! % * ? &";
        }else{
            $contraseña=$temp_cont;
        }
    }
    ?>



    <form method="post">

        <span>Nombre de Usuario:</span><input type="text" name="nombre">
        <?php
        if (isset($errNombre)) echo "<b style='color:red'>$errNombre</b>"
        ?>
        <br>
        <span>Correo Electronico:</span><input type="text" name="email">
        <?php
        if (isset($errorEmail)) echo "<b style='color:red'>$errorEmail</b>"
        ?>
        <br>
        <span>Contraseña:</span><input type="text" name="contraseña" id="">
        <?php
        if (isset($errorContraseña)) echo "<b style='color:red'>$errorContraseña</b>"
        ?>
        <br>

        <input type="submit" value="Registrarse">
        <?php
            if(isset($nombre,$email,$contraseña)){
                echo "<pre>
                $nombre
                $email
                </pre>
                ";
            }
            
        ?>
       
    </form>

</body>

</html>