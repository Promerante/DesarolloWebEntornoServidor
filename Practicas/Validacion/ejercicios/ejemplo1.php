<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EjercicioCasero</title>
</head>
<body>
    <?php
    //EJEMPLO DE VALIDACION PHP: https://www.w3schools.com/php/php_form_validation.asp
    error_reporting(E_ALL);
    ini_set("display_errors",1);
    //Configuracion inicial para mostrar errores en la página.
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        $ejercicio=$_POST["ejercicio"];
        if($ejercicio==1){
            //Con esto vamos gestionando y activando el ejercicio segun el valor dado, es como la manera de crear eventos en php
            if(!empty($_POST["nombre"])){
                $temp_nombre=$_POST["nombre"];
                //Con esto comprobamos que recibimos un nombre,puede estar vacio y genera problemas
                if(preg_match("/^[a-zA-ZáéíóúÁÉÍÓÚ]{3,}$/",$temp_nombre)){
                    /*Ahora hemos verificado que el nombre a verificar es:
                        *No hay espacios en blanco.
                        *Tiene solo los caracteres detallados.No acepta numeros, caracteres especiales y letras especiales excepto aquellas con tildes.
                        *Tiene que tener al menos 3 carácteres aceptados.
                        *
                    */
                    $nombre=$temp_nombre;
                    //Hacemos una variable para asegurarnos que cuando trabajemos con el luego, es uno válido
                }
                else{
                    $errorNombre="*Nombre no válido.";
                }
            }else{
                $errorNombre="*Este campo es obligatorio.";
            }
            if(!empty($_POST["email"])){
                $temp_email=$_POST["email"];
                if(filter_var($temp_email,FILTER_VALIDATE_EMAIL)){
                    //Con esto usamos un método nativo que comprueba si la variable introducida tiene la estructura de un email.//
                    $email=$temp_email;
                }
                else{
                    $errorEmail="*Email no válido.";
                }
            }else{
                $errorEmail="*Este campo es obligatorio.";
            }
            if(!empty($_POST["pagina"])){
                $temp_pagina=$_POST["pagina"];
                if(filter_var($temp_pagina,FILTER_VALIDATE_URL)){
                    //Con esto usamos un método nativo que comprueba si la variable introducida tiene la estructura de un email.//
                    $web=$temp_pagina;
                }
                else{
                    $errorWeb="*Web no válido.";
                }
            }
            if(!empty($_POST["genero"]))$genero=$_POST["genero"];
            else $errorGenero="*Este campo es obligatorio.";
        }
    }
    ?>
    <h1>PHP FORM VALIDATION EXAMPLE</h1>

    <form action="" method="post">
        <input type="hidden" name="ejercicio" value="1">
        <span>Nombre:</span><input type="text" name="nombre" id="">
        <?php
        if(isset($errorNombre))echo "<b style='color:red'>$errorNombre</b>"
        ?>
        <br>
        <span>E-mail:</span><input type="text" name="email" id="">
        <?php
        if(isset($errorEmail))echo "<b style='color:red'>$errorEmail</b>"
        ?>
        <br>
        <span>Website:(opcional)</span><input type="text" name="pagina" id="">
        <?php
        if(isset($errorWeb))echo "<b style='color:red'>$errorWeb</b>"
        ?>
        <br>    
        <span>Comentarios:</span><textarea name="comentario" id="" cols="30" rows="10"></textarea>    
        <br>
        <span>Género:</span>
        <span>Mujer:</span><input type="radio" name="genero" value="mujer">
        <span>Hombre:</span><input type="radio" name="genero" value="hombre">
        <span>Otro:</span><input type="radio" name="genero" value="otro">
        <?php
        if(isset($errorGenero))echo "<b style='color:red'>$errorGenero</b>"
        ?>
        <br>
        <br>
        <input type="submit" value="Enviar">
    </form>

    <h1>Salida:</h1>
    <?php
    if(isset($nombre)&&isset($email)&&isset($genero)){
        $texto="Genial,eres un tontito llamado $nombre que ha puesto su correo: $email en una pagina de mierda que lo ha creado un marron que:<br>";
        if(isset($web)){
            $texto." Tiene la siguiente pagina $web <br>";
        }
        if(!empty($_POST["comentario"])){
            $comentario =htmlspecialchars($_POST['comentario'],ENT_QUOTES,"UTF-8");
            $texto.=" Encima escribe este comentario:$comentario. Que no lo va a leer ni su puta madre que estas solo";
        }
        $texto2=htmlspecialchars($_SERVER["PHP_SELF"]);
        $texto.="con el siguiente genero: $genero ";
        echo "<span>$texto </span>";
    }
    ?>

</body>
</html>