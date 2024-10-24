<?php
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    // Recogemos los datos del formulario usando $get
    $nombre = $_GET["nombre"];
    $edad = $_GET['edad'];
    // Mostrar los datos
    echo "Nombre: $nombre <br>";
    echo "Edad: $edad <br>";
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $value = $_POST['form'];
    //Ejercicio 2
    if ($value == 2) {
        $nombre = $_POST['nombre'];
        $edad = $_POST['edad'];
        $correo = $_POST['correo'];
        // Verificamos que no estén vacíos
        if (empty($nombre) || empty($edad) || empty($correo)) {
            echo "Por favor, completa todos los campos.";
        } elseif ($edad <= 0) {
            echo "Introduce una edad valida";
        } else {
            echo "Nombre: " . htmlspecialchars($nombre) . "<br>";
            echo "Edad: " . htmlspecialchars($edad) . "<br>";
            echo "Correo: " . htmlspecialchars($correo) . "<br>";
        }
    }
    //Ejercicio 3
    if ($value == 3) {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $usuario = $_POST['usuario'];
            $comentario = $_POST['comentario'];

            if (strlen($comentario) < 10) {
                echo "El comentario no es lo suficientemente largo <br>";
            } else {
                echo "Usuario:" . $usuario . "<br>Dice:" . $comentario;
            }
        }
    }
}
?>
