<!-- Inicializar numeros_acumulados si no existe
$numeros_acumulados = isset($_POST['numeros_acumulados']) ? $_POST['numeros_acumulados'] : '';
-----------------------------------Ejercicios repaso avanzado -------------------------------->

<h1>
    Ladronzuelo!!!! <br>
    Queremos abrir una caja fuerte. 
    Para ello debemos de introducir 4 cifras. Número por número. 
    En caso de que los cuatro números sean correctos se abrirá la caja fuerte felicitándonos y reseteando las variables para un nuevo intento de abrir la caja fuerte.
    En caso de que fallemos en una de las cuatro cifras se reseteará el intento empezando desde la primera cifra de nuevo.
    Para los pros: Cuando acabéis el ejercicio y funcione correctamente, añadidme una funcionalidad en la que aparezca una imagen de una bomba en caso de que el usuario falle a la hora poner las cuatro cifras y
    otra imagen de un tesoro en caso de que la caja fuerte sea abierta. Para ello, podéis usar la siguiente estructura:
</h1>
<?php

?>
<form action="index2.php" method="post">
    <input type="hidden" name="form" value="1">
    <input type="hidden" name="guard" value="<?php echo $numGuardado; ?>">
    Numero<input type="number" name="numero" id="" required>
    <input type="submit" value="Enviar">
</form>